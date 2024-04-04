<?php

namespace App\Http\Controllers;

use App\Contracts\ExperienceContract;
use App\Contracts\SkillContract;
use App\Http\Requests\CreateExperienceRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExperienceController extends Controller
{
    protected $experienceContract;
    protected $skillContract;

    public function __construct(
        ExperienceContract $experienceContract,
        SkillContract $skillContract,
    ) {
        $this->experienceContract = $experienceContract;
        $this->skillContract = $skillContract;
    }

    public function getExperience()
    {
        try {
            
            $experiences = $this->experienceContract->getExperience();
            $skills = $this->skillContract->getSkill();

            return view('backend.experience.index', [
                'experiences' => $experiences,
                'skills' => $skills,
            ]);

        } catch (Exception $e) {

            Log::error('Error in getSlider: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function storeExperience(CreateExperienceRequest $request)
    {
        try {
            dd($request);
            $params = $request->validated();

            $this->experienceContract->storeExperience($params);

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
