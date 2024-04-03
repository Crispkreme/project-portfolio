<?php

namespace App\Http\Controllers;

use App\Contracts\AboutContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FrontendController extends Controller
{
    protected $aboutContract;

    public function __construct(
        AboutContract $aboutContract,
    ) {
        $this->aboutContract = $aboutContract;
    }
    
    public function index()
    {
        try {
            
            $about = $this->aboutContract->getAboutByStatusId(1);

            return view('welcome', ['about' => $about]);

        } catch (Exception $e) {

            Log::error('Error in index: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }
}
