<?php

namespace App\Http\Controllers;

use App\Contracts\ExperienceContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExperienceController extends Controller
{
    protected $experienceContract;

    public function __construct(
        ExperienceContract $experienceContract,
    ) {
        $this->experienceContract = $experienceContract;
    }

    public function getExperience()
    {
        try {
            
            $experiences = $this->experienceContract->getExperience();

            return view('backend.experience.index', ['experiences' => $experiences]);

        } catch (Exception $e) {

            Log::error('Error in getSlider: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }
}
