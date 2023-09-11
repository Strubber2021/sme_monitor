<?php

namespace App\Http\Controllers\Jobth;

use App\Http\Controllers\Controller;
use App\Services\Jobth\JobthAd1Service;
use App\Services\Jobth\JobthAd2Service;
use App\Services\Jobth\JobthAd4Service;
use App\Services\Jobth\JobthTopCompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class JobthController extends Controller
{
    public function __construct()
    {   
        /*
        $this->middleware(function ($request, $next) {
            if (LoginManagementService::isAuth() == true) {
                return $next($request);
            }else{
                return redirect('/login');
            }
        });
        */
        // $this->middleware('chkLogin');
    }
      
    public function index()
    {
        try {
            $data = [
                'breadcrumb_name' => 'HOME',
                'page_name' => 'Jobth',
                'side_name' => 'jobth',
                'page_name_th' => 'หน้าหลัก',
			    'page_name_th_url' => '/jobth',
                'page_name_v1' => null,
                'page_name_v1_url' => null,
                'page_name_v2' => null,
                'page_name_v2_url' => null,
                'ad1' => JobthAd1Service::countAllImage(),
                'ad2' => JobthAd2Service::countAllImage(),
                'ad3' => JobthTopCompanyService::countAllImage(),
                'ad4' => JobthAd4Service::countAllImage(),
            ];
            return view('pages.jobth.dashboard-jobth')->with($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
