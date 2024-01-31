<?php

namespace App\Http\Controllers;

use App\Contracts\SliderContract;

use App\Models\Slider;

use App\Models\User;

use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    protected $sliderContract;

    public function __construct(
        SliderContract $sliderContract,
    ) {
        $this->sliderContract = $sliderContract;
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully', 
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } // End Method 
    public function Profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));

    }// End Method 
    public function EditProfile(){

        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));
    }// End Method 
    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_image')) {
           $file = $request->file('profile_image');

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/admin_images'),$filename);
           $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully', 
            'alert-type' => 'info'
        );

        return redirect()->route('admin.profile')->with($notification);

    }// End Method
    public function ChangePassword(){

        return view('admin.admin_change_password');

    }// End Method
    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        } else{
            session()->flash('message','Old password is not match');
            return redirect()->back();
        }

    }// End Method

    // UPDATED FUNCTIONALITY
    public function login()
    {
        try {

            return view('auth.login');

        } catch (Exception $e) {

            Log::error('Error in index: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while loading the index.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function slider()
    {
        try {

            $userId = Auth::user()->id;
            $sliders = $this->sliderContract->getSliderByUser($userId);

            return view('home.sliders.index', [
                'sliders' => $sliders,
            ]);

        } catch (Exception $e) {

            Log::error('Error in index: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while loading the index.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function createSlider()
    {   
        try {

            return view('home.sliders.create');

        } catch (Exception $e) {

            Log::error('Error in index: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while loading the index.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function storeSlider(Request $request)
    {
        DB::beginTransaction();

        try {

            $userId = Auth::user()->id;
            
            $params = $request->validate([
                'user_id' => 'nullable|integer|max:255',
                'title' => 'nullable|string|max:255',
                'sub_title' => 'nullable|string|max:255',
                'image' => 'nullable|file',
                'video_url' => 'nullable|string',
            ]);

            if ($request->has('image')) {
                $imageData = base64_decode($params['image']);
                $imageExtension = File::extension($request->file('image')->getClientOriginalName());
                $imageName = Str::random(20) . '.' . $imageExtension;
                Storage::disk('public')->put('upload/sliders/' . $imageName, $imageData);
                $imagePath = 'upload/sliders/' . $imageName;
            } else {
                $imagePath = null;
            }

            $messageParams = [
                'user_id' => $userId,
                'title' => $params['title'],
                'sub_title' => $params['sub_title'],
                'image' => $imagePath,
                'video_url' => $params['video_url'],
            ];

            $this->sliderContract->storeSlider($messageParams);

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Inquiry sent successfully!',
            ];

            return redirect()->route('index')->with($notification);

        } catch (Exception $e) {

            DB::rollback();

            Log::error('Error in storeSlider: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return back()->with($notification);
        }
    }
    public function updateActiveStatusSlider($id)
    {
        DB::beginTransaction();

        try {

            $slider = Slider::findOrFail($id);
            $slider->update([
                'isActive' => 1,
            ]);

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Status updated successfully!',
            ];

            return back()->with($notification);

        } catch (Exception $e) {

            DB::rollback();

            Log::error('Error in updateActiveStatusSlider: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return back()->with($notification);
        }
    }
    public function updateInactiveStatusSlider($id)
    {
        DB::beginTransaction();

        try {

            $slider = Slider::findOrFail($id);
            $slider->update([
                'isActive' => 0,
            ]);

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Status updated successfully!',
            ];

            return back()->with($notification);

        } catch (Exception $e) {
            
            DB::rollback();

            Log::error('Error in updateActiveStatusSlider: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return back()->with($notification);
        }
    }
    public function updateActiveDisplaySlider($id)
    {
        DB::beginTransaction();

        try {

            $slider = Slider::findOrFail($id);
            $slider->update([
                'isDisplay' => 1,
            ]);

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Status updated successfully!',
            ];

            return back()->with($notification);

        } catch (Exception $e) {

            DB::rollback();

            Log::error('Error in updateActiveStatusSlider: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return back()->with($notification);
        }
    }
    public function updateInactiveDisplaySlider($id)
    {
        DB::beginTransaction();

        try {

            $slider = Slider::findOrFail($id);
            $slider->update([
                'isDisplay' => 0,
            ]);

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Status updated successfully!',
            ];

            return back()->with($notification);

        } catch (Exception $e) {
            
            DB::rollback();

            Log::error('Error in updateActiveStatusSlider: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return back()->with($notification);
        }
    }
    public function editSlider($id)
    {
        try {
            $slider = $this->sliderContract->findSlider($id);

            return view('home.sliders.edit', [
                'slider' => $slider,
            ]);

        } catch (Exception $e) {

            Log::error('Error in index: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while loading the index.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function updateSlider(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            
            $userId = Auth::user()->id;
            
            $params = $request->validate([
                'user_id' => 'nullable|integer|max:255',
                'title' => 'nullable|string|max:255',
                'sub_title' => 'nullable|string|max:255',
                'image' => 'nullable|file',
                'video_url' => 'nullable|string',
            ]);

            $slider = $this->sliderContract->findSlider($id);

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($slider->image);
            }

            if ($request->hasFile('image')) {
                $imageExtension = $request->file('image')->getClientOriginalExtension();
                $imageName = Str::random(20) . '.' . $imageExtension;
                $imagePath = $request->file('image')->storeAs('upload/sliders', $imageName, 'public');
            } else {
                $imagePath = $slider->image;
            }

            $messageParams = [
                'user_id' => $userId,
                'title' => $params['title'],
                'sub_title' => $params['sub_title'],
                'image' => $imagePath,
                'video_url' => $params['video_url'],
            ];

            $this->sliderContract->updateSlider($id, $messageParams);

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Slider updated successfully!',
            ];

            return redirect()->route('index')->with($notification);

        } catch (Exception $e) {

            DB::rollback();

            Log::error('Error in updateSlider: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return back()->with($notification);
        }
    }

}
 