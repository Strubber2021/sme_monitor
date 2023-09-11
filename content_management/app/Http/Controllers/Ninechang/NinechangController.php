<?php

namespace App\Http\Controllers\Ninechang;

use App\Http\Controllers\Controller;
use App\Services\LoginManagementService;
use App\Services\Ninechang\NinechangAd1Service;
use App\Services\Ninechang\NinechangAd2Service;
use App\Services\Ninechang\NinechangAd3Service;
use App\Services\Ninechang\NinechangCompanyLogoService;
use App\Services\Ninechang\NinechangCounterDownloadService;
use App\Services\Ninechang\NinechangVdo1Service;
use App\Services\Ninechang\NinechangVdo2Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class NinechangController extends Controller
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
                'page_name' => 'Ninechang',
                'side_name' => 'ninechang',
                'page_name_th' => 'หน้าหลัก',
			    'page_name_th_url' => '/ninechang',
                'page_name_v1' => null,
                'page_name_v1_url' => null,
                'page_name_v2' => null,
                'page_name_v2_url' => null,
                'ad1' => NinechangAd1Service::countAllImage(),
                'ad2' => NinechangAd2Service::countAllImage(),
                'ad3' => NinechangAd3Service::countAllImage(),
                'vdo1' => NinechangVdo1Service::countAllVdo(),
                'vdo2' => NinechangVdo2Service::countAllVdo(),
                'company_logo' => NinechangCompanyLogoService::countAllComapanyLogo(),
                'download' => NinechangCounterDownloadService::getCounter(),
            ];
            return view('pages.ninechang.dashboard-ninechang')->with($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
