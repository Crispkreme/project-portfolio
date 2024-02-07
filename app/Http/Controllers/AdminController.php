<?php

namespace App\Http\Controllers;

use App\Contracts\AboutContract;
use App\Contracts\MultiImageContract;
use App\Contracts\PortfolioContract;

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
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    protected $sliderContract;
    protected $aboutContract;
    protected $multiImageContract;
    protected $portfolioContract;

    public function __construct(
        SliderContract $sliderContract,
        AboutContract $aboutContract,
        MultiImageContract $multiImageContract,
        PortfolioContract $portfolioContract,
    ) {
        $this->sliderContract = $sliderContract;
        $this->aboutContract = $aboutContract;
        $this->multiImageContract = $multiImageContract;
        $this->portfolioContract = $portfolioContract;
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

    // ABOUT FUNCTIONALITY
    public function about()
    {
        try {

            $userId = Auth::user()->id;
            $abouts = $this->aboutContract->getAboutByUser($userId);

            return view('home.about.index', [
                'abouts' => $abouts,
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
    public function createAbout()
    {
        try {

            return view('home.about.create');

        } catch (Exception $e) {

            Log::error('Error in index: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while loading the index.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function storeAbout(Request $request)
    {
        DB::beginTransaction();

        try {

            $userId = Auth::user()->id;

            $params = $request->validate([
                'user_id' => 'nullable|integer|max:255',
                'title' => 'nullable|string|max:255',
                'short_title' => 'nullable|string|max:255',
                'short_description' => 'nullable',
                'long_description' => 'nullable',
                'about_image' => 'nullable|file',
            ]);

            if ($request->has('about_image')) {
                $imageData = base64_decode($params['about_image']);
                $imageExtension = File::extension($request->file('about_image')->getClientOriginalName());
                $imageName = Str::random(20) . '.' . $imageExtension;
                Storage::disk('public')->put('upload/about/' . $imageName, $imageData);
                $imagePath = 'upload/about/' . $imageName;
            } else {
                $imagePath = null;
            }

            $messageParams = [
                'user_id' => $userId,
                'title' => $params['title'],
                'short_title' => $params['short_title'],
                'short_description' => $params['short_description'],
                'long_description' => $params['long_description'],
                'about_image' => $imagePath,
            ];

            $this->aboutContract->storeAbout($messageParams);

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'About successfully added!',
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
    public function editAbout($id)
    {
        try {

            $about = $this->aboutContract->findAbout($id);

            return view('home.about.edit', ['about' => $about]);

        } catch (Exception $e) {

            Log::error('Error in index: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while loading the index.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    // MULTI IMAGE
    public function multiImage()
    {
        try {

            $userId = Auth::user()->id;
            $multiImages = $this->multiImageContract->getMultiImage($userId);

            return view('home.multi-image.index', [
                'multiImages' => $multiImages,
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
    public function createMultiImage()
    {
        try {

            return view('home.multi-image.create');

        } catch (Exception $e) {

            Log::error('Error in index: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while loading the index.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function storeMultiImage(Request $request)
    {
        try {
            $userId = Auth::user()->id;

            $request->validate([
                'user_id' => 'nullable|integer|max:255',
                'multi_image' => 'nullable|array',
                'multi_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('multi_image')) {
                foreach ($request->file('multi_image') as $image) {
                    $imageExtension = $image->getClientOriginalExtension();
                    $imageName = Str::random(20) . '.' . $imageExtension;
                    $image->storeAs('public/upload/multi-image', $imageName);

                    $messageParams = [
                        'user_id' => $userId,
                        'multi_image' => 'upload/multi-image/' . $imageName,
                    ];

                    $this->multiImageContract->storeMultiImage($messageParams);
                }
            }

            $notification = [
                'message' => 'Images uploaded successfully.',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);
        } catch (Exception $e) {
            Log::error('Error in storeMultiImage: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while uploading images.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function editMultiImage($id)
    {
        try {
            $multiImage = $this->multiImageContract->findMultiImage($id);

            return view('home.multi-image.edit', [
                'multiImage' => $multiImage,
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
    public function updateMultiImage(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            
            $userId = Auth::user()->id;
            
            $request->validate([
                'user_id' => 'nullable|integer|max:255',
                'multi_image' => 'nullable|file',
                'multi_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $multiImage = $this->multiImageContract->findMultiImage($id);

            if ($request->hasFile('multi_image')) {
                Storage::disk('public')->delete($multiImage->multi_image);
            }

            if ($request->hasFile('multi_image')) {
                $imageExtension = $request->file('multi_image')->getClientOriginalExtension();
                $imageName = Str::random(20) . '.' . $imageExtension;
                $imagePath = $request->file('multi_image')->storeAs('upload/multi-image/', $imageName, 'public');
            } else {
                $imagePath = $multiImage->multi_image;
            }

            $messageParams = [
                'user_id' => $userId,
                'multi_image' => $imagePath,
            ];
            
            $this->multiImageContract->updateMultiImage($id, $messageParams);

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Image updated successfully!',
            ];

            return redirect()->route('index')->with($notification);

        } catch (Exception $e) {
            dd($e);
            DB::rollback();

            Log::error('Error in updateMultiImage: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return back()->with($notification);
        }
    }

    // PORTFOLIO FUNCTIONALITY
    public function portfolio()
    {
        try {

            $userId = Auth::user()->id;
            $portfolios = $this->portfolioContract->getPortfolio($userId);

            return view('home.portfolio.index', [
                'portfolios' => $portfolios,
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
    public function createPortfolio()
    {
        try {

            return view('home.portfolio.create');

        } catch (Exception $e) {

            Log::error('Error in index: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while loading the index.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function editPortfolio($id)
    {
        
    }
    public function updatePortfolio($id)
    {
        
    }
}
 