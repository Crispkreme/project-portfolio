<?php

namespace App\Http\Controllers;

use App\Contracts\SkillContract;
use App\Http\Requests\CreateSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
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

    public function storeSkill(CreateSkillRequest $request)
    {
        try {

            $params = $request->validated();
            
            if($request->hasFile('skill_image')){
                $imageFile = $request->file('skill_image');
                $filename = time() . '.' . $imageFile->getClientOriginalExtension();
                
                $directory = public_path('storage/skills/');
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }
                
                $image = Image::read($imageFile);
                $image->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($directory . $filename);
                
                $params['skill_image'] = $filename;
            } else {
                $params['skill_image'] = null; 
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

    public function editSkill($id)
    {
        try {
            
            $skill = $this->skillContract->getSkillById($id);
            
            return view('backend.skill.index', ['skill' => $skill]);

        } catch (Exception $e) {

            Log::error('Error in editSkill: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function updateSkill(UpdateSkillRequest $request, $id)
    {
        try {

            $params = $request->validated();
            
            $oldSlider = $this->skillContract->getSkillById($id);
            
            if($request->hasFile('skill_image')) {

                $imageFile = $request->file('skill_image');
                $filename = time() . '.' . $imageFile->getClientOriginalExtension();
                
                $directory = public_path('storage/skills/');
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }
                
                $image = Image::read($imageFile);
                $image->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($directory . $filename);
                $params['skill_image'] = $filename;
    
                if ($oldSlider->skill_image) {
                    $oldImagePath = $directory . $oldSlider->skill_image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            } else {
                $params['skill_image'] = $oldSlider->skill_image;
            }

            $this->skillContract->updateSkill($id, $params);
    
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
}
