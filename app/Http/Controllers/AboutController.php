<?php

namespace App\Http\Controllers;

use App\Contracts\AboutContract;
use App\Http\Requests\CreateAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Laravel\Facades\Image;

class AboutController extends Controller
{
    protected $aboutContract;

    public function __construct(
        AboutContract $aboutContract,
    ) {
        $this->aboutContract = $aboutContract;
    }

    public function getAbout()
    {
        try {
            
            $abouts = $this->aboutContract->getAbout();

            return view('backend.about.index', ['abouts' => $abouts]);

        } catch (Exception $e) {

            Log::error('Error in getSlider: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function storeAbout(CreateAboutRequest $request)
    {
        try {

            $params = $request->validated();

            if($request->hasFile('about_image')){
                $imageFile = $request->file('about_image');
                $filename = time() . '.' . $imageFile->getClientOriginalExtension();
                
                $directory = public_path('storage/abouts/');
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }
                
                $image = Image::read($imageFile);
                $image->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($directory . $filename);
                $params['about_image'] = $filename;
            } else {
                $params['about_image'] = null; 
            }

            $this->aboutContract->storeAbout($params);

            $notification = [
                'message' => 'successfully created about',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);

        } catch (Exception $e) {
       
            Log::error('Error in storeAbout: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function editAbout($id)
    {
        try {
            
            $about = $this->aboutContract->getAboutById($id);
            
            return view('backend.about.update', ['about' => $about]);

        } catch (Exception $e) {

            Log::error('Error in editAbout: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function updateAbout(UpdateAboutRequest $request, $id)
    {
        try {
            $params = $request->validated();
            
            $oldSlider = $this->aboutContract->getAboutById($id);
            
            if($request->hasFile('about_image')) {

                $imageFile = $request->file('about_image');
                $filename = time() . '.' . $imageFile->getClientOriginalExtension();
                
                $directory = public_path('storage/abouts/');
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }
                
                $image = Image::read($imageFile);
                $image->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($directory . $filename);
                $params['about_image'] = $filename;
    
                if ($oldSlider->about_image) {
                    $oldImagePath = $directory . $oldSlider->about_image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            } else {
                $params['about_image'] = $oldSlider->about_image;
            }

            $this->aboutContract->updateAbout($id, $params);
    
            $notification = [
                'message' => 'Successfully updated about',
                'alert-type' => 'success',
            ];
    
            return redirect()->back()->with($notification);
    
        } catch (Exception $e) {
    
            Log::error('Error in updateAbout: ' . $e->getMessage());
    
            $notification = [
                'message' => 'An error occurred.',
                'alert-type' => 'error',
            ];
    
            return redirect()->back()->with($notification);
        }
    }

    public function activeAbout($id)
    {
        try {

            $this->aboutContract->statusAbout($id, 1);
    
            $notification = [
                'message' => 'Successfully updated about',
                'alert-type' => 'success',
            ];
    
            return redirect()->back()->with($notification);
    
        } catch (Exception $e) {
    
            Log::error('Error in activeAbout: ' . $e->getMessage());
    
            $notification = [
                'message' => 'An error occurred.',
                'alert-type' => 'error',
            ];
    
            return redirect()->back()->with($notification);
        }
    }

    public function inactiveAbout($id)
    {
        try {

            $this->aboutContract->statusAbout($id, 0);
    
            $notification = [
                'message' => 'Successfully updated about',
                'alert-type' => 'success',
            ];
    
            return redirect()->back()->with($notification);
    
        } catch (Exception $e) {
    
            Log::error('Error in inactiveAbout: ' . $e->getMessage());
    
            $notification = [
                'message' => 'An error occurred.',
                'alert-type' => 'error',
            ];
    
            return redirect()->back()->with($notification);
        }
    }
}
