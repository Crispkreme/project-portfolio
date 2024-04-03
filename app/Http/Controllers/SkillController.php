<?php

namespace App\Http\Controllers;

use App\Contracts\SkillContract;
use App\Http\Requests\CreateSkillRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Laravel\Facades\Image;

class SkillController extends Controller
{
    protected $skillContract;

    public function __construct(
        SkillContract $skillContract,
    ) {
        $this->skillContract = $skillContract;
    }

    public function getSkill()
    {
        try {
            
            $skills = $this->skillContract->getSkill();

            return view('backend.skill.index', ['skills' => $skills]);

        } catch (Exception $e) {

            Log::error('Error in getSlider: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function storeAbout(CreateSkillRequest $request)
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

            $this->skillContract->storeSkill($params);

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
}
