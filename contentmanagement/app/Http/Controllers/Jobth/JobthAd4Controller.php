<?php

namespace App\Http\Controllers\Jobth;

use App\Constants\AppConstants;
use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use App\Services\LoginManagementService;
use App\Services\Jobth\JobthAd4Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;

class JobthAd4Controller extends Controller
{
    public function __construct()
    {   

    }
    
    public function index()
    {
        try {
            $getAllImageOriginal = JobthAd4Service::getAllImage();
            $getAllImageOriginal['page_number'] = null;
            if ($getAllImageOriginal['links'] != null) {
                $setAllImage = $getAllImageOriginal;
                $spliceFirstArray = array_splice($setAllImage['links'], 1);
                array_pop($spliceFirstArray);
                $getAllImageOriginal['page_number'] = $spliceFirstArray;
            }

            $data = [
                'breadcrumb_name' => 'BANNER AD4',
                'page_name' => 'Jobth/ad4',
                'side_name' => 'jobth',
                'page_name_th' => 'หน้าหลัก',
			    'page_name_th_url' => '/jobth',
                'page_name_v1' => 'ad4',
                'page_name_v1_url' => '/jobth/ads/4',
                'page_name_v2' => null,
                'page_name_v2_url' => null,
                'imgshowup' => $getAllImageOriginal
            ];
            return view('pages.jobth.jobth-ads-4')->with($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function storeImg(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            $imageName = date('YmdHis').'_'.Cookie::get('username').'.'.$request->image->extension();       
            $request->image->move(public_path('assets/images/jobth/ad4'), $imageName);
            $result =  JobthAd4Service::storeImg($imageName);

            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }

    public function destroyImg($imgId,$imgName)
    {
        try {
        $path =  public_path("/assets/images/jobth/ad4/").$imgName;
        $isExists =  File::exists($path);
        
        if ($isExists) {
            unlink($path);
        }
        $result =  JobthAd4Service::destroyImg($imgId);
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }   
}
