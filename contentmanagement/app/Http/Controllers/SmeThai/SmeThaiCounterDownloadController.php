<?php

namespace App\Http\Controllers\SmeThai;

use App\Constants\AppConstants;
use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use App\Services\SmeThai\SmeThaiCounterDownloadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class SmeThaiCounterDownloadController extends Controller
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
                'page_name' => 'Smethai/ยอดดาวน์โหลด',
                'side_name' => 'smethai',
                'page_name_th' => 'หน้าหลัก',
			    'page_name_th_url' => '/smethai',
                'page_name_v1' => 'ยอดดาวน์โหลด',
                'page_name_v1_url' => '/smethai/counter/download',
                'page_name_v2' => null,
                'page_name_v2_url' => null,
                'counter' => SmeThaiCounterDownloadService::getCounter()
            ];
            return view('pages.smethai.smethai-counter-download')->with($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'counter' => 'required',
            ]);

            $result =  SmeThaiCounterDownloadService::create($request);

            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'counter' => 'required',
            ]);

            $result =  SmeThaiCounterDownloadService::update($request);
            
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }

    

    /*
    public function storeImg(Request $request)
    {
        try {
            $request->validate([
                'counter' => 'required',
            ]);

            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }
    */
}
