<?php

namespace App\Http\Controllers;

use App\Contracts\SliderContract;

use App\Http\Requests\CreateSliderRequest;
use App\Http\Requests\UpdateSliderRequest;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Laravel\Facades\Image;

class SliderController extends Controller
{
    protected $sliderContract;

    public function __construct(
        SliderContract $sliderContract,
    ) {
        $this->sliderContract = $sliderContract;
    }

    public function storeSlider(CreateSliderRequest $request)
    {
        try {

            $params = $request->validated();

            if($request->hasFile('images')){
                $imageFile = $request->file('images');
                $filename = time() . '.' . $imageFile->getClientOriginalExtension();
                
                $directory = public_path('storage/sliders/');
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }
                
                $image = Image::read($imageFile);
                $image->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($directory . $filename);
                $params['images'] = $filename;
            }

            $this->sliderContract->storeSlider($params);

            $notification = [
                'message' => 'successfully created slider',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);

        } catch (Exception $e) {
       
            Log::error('Error in storeSlider: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred in storeSlider.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function getSlider()
    {
        try {
            
            $sliders = $this->sliderContract->getSlider();

            return view('backend.slider.index', ['sliders' => $sliders]);

        } catch (Exception $e) {

            Log::error('Error in getSlider: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred in getSlider.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function editSlider($id)
    {
        try {
            
            $slider = $this->sliderContract->getSliderById($id);
            return view('backend.slider.update', ['slider' => $slider]);

        } catch (Exception $e) {

            Log::error('Error in editSlider: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred in editSlider.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function updateSlider(UpdateSliderRequest $request, $id)
    {
        try {
            $params = $request->validated();
            
            $oldSlider = $this->sliderContract->getSliderById($id);
            
            if($request->hasFile('images')) {

                $imageFile = $request->file('images');
                $filename = time() . '.' . $imageFile->getClientOriginalExtension();
                
                $directory = public_path('storage/sliders/');
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }
                
                $image = Image::read($imageFile);
                $image->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($directory . $filename);
                $params['images'] = $filename;
    
                if ($oldSlider->images) {
                    $oldImagePath = $directory . $oldSlider->images;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            } else {
                $params['images'] = $oldSlider->images;
            }

            $this->sliderContract->updateSlider($id, $params);
    
            $notification = [
                'message' => 'Successfully updated slider',
                'alert-type' => 'success',
            ];
    
            return redirect()->back()->with($notification);
    
        } catch (Exception $e) {
    
            Log::error('Error in updateSlider: ' . $e->getMessage());
    
            $notification = [
                'message' => 'An error occurred in updateSlider.',
                'alert-type' => 'error',
            ];
    
            return redirect()->back()->with($notification);
        }
    }

    public function activeSlider($id)
    {
        try {

            $this->sliderContract->statusSlider($id, 1);
    
            $notification = [
                'message' => 'Successfully updated slider',
                'alert-type' => 'success',
            ];
    
            return redirect()->back()->with($notification);
    
        } catch (Exception $e) {
    
            Log::error('Error in activeSlider: ' . $e->getMessage());
    
            $notification = [
                'message' => 'An error occurred in activeSlider.',
                'alert-type' => 'error',
            ];
    
            return redirect()->back()->with($notification);
        }
    }

    public function inactiveSlider($id)
    {
        try {

            $this->sliderContract->statusSlider($id, 0);
    
            $notification = [
                'message' => 'Successfully updated slider',
                'alert-type' => 'success',
            ];
    
            return redirect()->back()->with($notification);
    
        } catch (Exception $e) {
    
            Log::error('Error in inactiveSlider: ' . $e->getMessage());
    
            $notification = [
                'message' => 'An error occurred in inactiveSlider.',
                'alert-type' => 'error',
            ];
    
            return redirect()->back()->with($notification);
        }
    }
}
