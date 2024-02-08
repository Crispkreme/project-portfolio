<?php

namespace App\Http\Controllers;

use App\Contracts\AboutContract;
use App\Contracts\CategoryContract;
use App\Contracts\BlogContract;
use App\Contracts\ContactDetailContract;
use App\Contracts\PortfolioContract;
use App\Contracts\ContactContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    protected $aboutContract;
    protected $portfolioContract;
    protected $categoryContract;
    protected $blogContract;
    protected $contactDetailContract;
    protected $contactContract;

    public function __construct(
        AboutContract $aboutContract,
        PortfolioContract $portfolioContract,
        CategoryContract $categoryContract,
        BlogContract $blogContract,
        ContactDetailContract $contactDetailContract,
        ContactContract $contactContract,
    ) {
        $this->aboutContract = $aboutContract;
        $this->portfolioContract = $portfolioContract;
        $this->categoryContract = $categoryContract;
        $this->blogContract = $blogContract;
        $this->contactDetailContract = $contactDetailContract;
        $this->contactContract = $contactContract;
    }

    public function index()
    {   
        try {

            $details = $this->contactDetailContract->getContactDetailByUserId(1);

            return view('index', [
                'details' => $details,
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

    public function about()
    {    
        try {

            $aboutpage = $this->aboutContract->findAbout(1);
            $details = $this->contactDetailContract->getContactDetailByUserId(1);

            return view('about',  [
                'aboutpage' => $aboutpage,
                'details' => $details,
            ]);

        } catch (Exception $e) {

            Log::error('Error in about: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while loading the about.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function service()
    {
        try {

            $details = $this->contactDetailContract->getContactDetailByUserId(1);

            return view('service', [
                'details' => $details,
            ]);

        } catch (Exception $e) {

            Log::error('Error in service: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while loading the service.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function portfolio(){

        try {

            $portfolio = $this->portfolioContract->getPortfolio();
            $details = $this->contactDetailContract->getContactDetailByUserId(1);
            
            return view('portfolio',  [
                'portfolio' => $portfolio,
                'details' => $details,
            ]);

        } catch (Exception $e) {

            Log::error('Error in portfolio: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while loading the portfolio.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function blog()
    {
        try {

            $categories = $this->categoryContract->getCategory('blog_category', 'ASC');
            $details = $this->contactDetailContract->getContactDetailByUserId(1);
            $allblogs = $this->blogContract->getBlog(3);

            return view('blog',  [
                'categories' => $categories,
                'allblogs' => $allblogs,
                'details' => $details,
            ]);

        } catch (Exception $e) {

            Log::error('Error in blog: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while loading the blog.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    // contact functionality
    public function contact()
    {
        try {

            $details = $this->contactDetailContract->getContactDetailByUserId(1);

            return view('contact',  [
                'details' => $details,
            ]);

        } catch (Exception $e) {

            Log::error('Error in contact: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while loading the contact.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function storeMessage(Request $request)
    {
        DB::beginTransaction();

        try {

            // Validating the request data
            $params = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'nullable|string|max:255',
                'phone' => 'required|string|max:20',
                'message' => 'nullable|string',
            ]);

            if (is_null($params['subject'])) {
                $params['subject'] = "Inquiry";
            }

            // Creating an array of parameters
            $messageParams = [
                'name' => $params['name'],
                'email' => $params['email'],
                'subject' => $params['subject'],
                'phone' => $params['phone'],
                'message' => $params['message'],
            ];

            $this->contactContract->storeContact($messageParams);

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Inquiry send successfully!',
            ];

            return redirect()->route('index')->with($notification);

        } catch (Exception $e) {

            DB::rollback();

            Log::error('Error in storeUser: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return back()->with($notification);
        }
    }
}
