<?php

namespace App\Http\Controllers\Jobth;

use App\Constants\AppConstants;
use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use App\Services\Jobth\JobthTopCompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;

class JobthTopCompanyController extends Controller
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
            $getAllImageOriginal = JobthTopCompanyService::getAllImage();
            $getAllImageOriginal['page_number'] = null;
            if ($getAllImageOriginal['links'] != null) {
                $setAllImage = $getAllImageOriginal;
                $spliceFirstArray = array_splice($setAllImage['links'], 1);
                array_pop($spliceFirstArray);
                $getAllImageOriginal['page_number'] = $spliceFirstArray;
            }

            $data = [
                'breadcrumb_name' => 'Top Company',
                'page_name' => 'Jobth/top company',
                'side_name' => 'jobth',
                'page_name_th' => 'หน้าหลัก',
			    'page_name_th_url' => '/jobth',
                'page_name_v1' => 'Top Company',
                'page_name_v1_url' => '/jobth/top/company',
                'page_name_v2' => null,
                'page_name_v2_url' => null,
                'imgshowup' => $getAllImageOriginal
            ];
            return view('pages.jobth.jobth-top-company')->with($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'company_banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'conpany_name' => 'required|string|max:255',
                'content_detail' => 'required|string|max:255',
            ]);

            $company_logo_path = date('YmdHis').'_'.Cookie::get('username').'.'.$request->company_logo->extension();       
            $request->company_logo->move(public_path('assets/images/jobth/topcompany'), $company_logo_path);

            $company_banner_path = date('YmdHis').'_'.Cookie::get('username').'.'.$request->company_banner->extension();       
            $request->company_banner->move(public_path('assets/images/jobth/topcompany'), $company_banner_path);

            $result = JobthTopCompanyService::create($request, $company_logo_path, $company_banner_path);
            
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }
    
    public function changeStatus($id,$status)
    {
        try { 
            $result = JobthTopCompanyService::changeStatus($id,$status);
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }

    public function destroy($id)
    {
        try { 
            $result = JobthTopCompanyService::destroy($id);
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }
    /*
    public function create(Request $request)
    {
        try { 
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }
    */
}
