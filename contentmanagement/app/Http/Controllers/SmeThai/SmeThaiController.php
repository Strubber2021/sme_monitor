<?php

namespace App\Http\Controllers\SmeThai;

use App\Http\Controllers\Controller;
use App\Services\SmeThai\SmeThaiCompanyLogoService;
use App\Services\SmeThai\SmeThaiCounterDownloadService;
use App\Services\SmeThai\SmeThaiCounterViewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class SmeThaiController extends Controller
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
                'page_name' => 'Smethai',
                'side_name' => 'smethai',
                'page_name_th' => 'หน้าหลัก',
			    'page_name_th_url' => '/smethai',
                'page_name_v1' => null,
                'page_name_v1_url' => null,
                'page_name_v2' => null,
                'page_name_v2_url' => null,
                'counter' => SmeThaiCounterViewService::getCounter(),
                'download' => SmeThaiCounterDownloadService::getCounter(),
                'company_logo' => SmeThaiCompanyLogoService::countAllComapanyLogo(),
            ];
            
            return view('pages.smethai.dashboard-smethai')->with($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
