<?php

namespace App\Http\Controllers\FindChang;

use App\Http\Controllers\Controller;
use App\Services\FindChang\FindChangAd1Service;
use App\Services\FindChang\FindChangAd2Service;
use App\Services\FindChang\FindChangAd3Service;
use App\Services\FindChang\FindChangAd4Service;
use App\Services\FindChang\FindChangCompanyLogoService;
use App\Services\FindChang\FindChangCounterDownloadService;
use App\Services\FindChang\FindChangCounterReviewService;
use App\Services\FindChang\FindChangTopCompanyService;
use App\Services\FindChang\FindChangVdo1Service;
use App\Services\FindChang\FindChangVdo2Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class FindChangController extends Controller
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
                'page_name' => 'Findchang',
                'side_name' => 'findchang',
                'page_name_th' => 'หน้าหลัก',
			    'page_name_th_url' => '/findchang',
                'page_name_v1' => null,
                'page_name_v1_url' => null,
                'page_name_v2' => null,
                'page_name_v2_url' => null,
                'ad1' => FindChangAd1Service::countAllImage(),
                'ad2' => FindChangAd2Service::countAllImage(),
                'ad3' => FindChangAd3Service::countAllImage(),
                'vdo1' => FindChangVdo1Service::countAllVdo(),
                'vdo2' => FindChangVdo2Service::countAllVdo(),
                'company_logo' => FindChangCompanyLogoService::countAllComapanyLogo(),
                'download' => FindChangCounterDownloadService::getCounter(),
                'review' => FindChangCounterReviewService::getCounter(),
            ];
            return view('pages.findchang.dashboard-findchang')->with($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
