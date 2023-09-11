<?php

namespace App\Http\Controllers\Bukkhon;

use App\Http\Controllers\Controller;
use App\Services\Bukkhon\BukkhonAd1Service;
use App\Services\Bukkhon\BukkhonAd2Service;
use App\Services\Bukkhon\BukkhonAd3Service;
use App\Services\Bukkhon\BukkhonCompanyLogoService;
use App\Services\Bukkhon\BukkhonCounterDownloadService;
use App\Services\Bukkhon\BukkhonVdo1Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class BukkhonController extends Controller
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
                'page_name' => 'Bukkhon',
                'side_name' => 'bukkhon',
                'page_name_th' => 'หน้าหลัก',
			    'page_name_th_url' => '/bukkhon',
                'page_name_v1' => null,
                'page_name_v1_url' => null,
                'page_name_v2' => null,
                'page_name_v2_url' => null,
                'ad1' => BukkhonAd1Service::countAllImage(),
                'ad2' => BukkhonAd2Service::countAllImage(),
                'ad3' => BukkhonAd3Service::countAllImage(),
                'vdo1' => BukkhonVdo1Service::countAllVdo(),
                'company_logo' => BukkhonCompanyLogoService::countAllComapanyLogo(),
                'download' => BukkhonCounterDownloadService::getCounter(),
            ];
            return view('pages.bukkhon.dashboard-bukkhon')->with($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
