<?php

namespace App\Http\Controllers;

use App\Contracts\AboutContract;
use App\Contracts\PortfolioContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    protected $aboutContract;
    protected $portfolioContract;

    public function __construct(
        AboutContract $aboutContract,
        PortfolioContract $portfolioContract,
    ) {
        $this->aboutContract = $aboutContract;
        $this->portfolioContract = $portfolioContract;
    }

    public function index()
    {   
        try {

            return view('index');

        } catch (Exception $e) {

            Log::error('Error in index: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while updating the brand.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function about()
    {    
        try {

            $aboutpage = $this->aboutContract->findAbout(1);

            return view('about',  [
                'aboutpage' => $aboutpage,
            ]);

        } catch (Exception $e) {

            Log::error('Error in about: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while updating the brand.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function service()
    {
        try {

            return view('service');

        } catch (Exception $e) {

            Log::error('Error in index: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while updating the brand.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function portfolio(){

        try {

            $portfolio = $this->portfolioContract->getPortfolio();

            return view('portfolio',  [
                'portfolio' => $portfolio,
            ]);

        } catch (Exception $e) {

            Log::error('Error in about: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while updating the brand.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }
}
