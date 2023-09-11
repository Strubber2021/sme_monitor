<?php

namespace App\Http\Controllers\FindChang;

use App\Constants\AppConstants;
use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use App\Services\FindChang\FindChangCompanyLogoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;

class FindChangCompanyLogoController extends Controller
{
    public function __construct()
    {   

    }
      
    public function index()
    {
        try {
            $getAllImageOriginal = FindChangCompanyLogoService::getAllImage();
            $getAllImageOriginal['page_number'] = null;
            if ($getAllImageOriginal['links'] != null) {
                $setAllImage = $getAllImageOriginal;
                $spliceFirstArray = array_splice($setAllImage['links'], 1);
                array_pop($spliceFirstArray);
                $getAllImageOriginal['page_number'] = $spliceFirstArray;
            }

            $data = [
                'breadcrumb_name' => 'BANNER Company Logo',
                'page_name' => 'FindChang/Company logo',
                'side_name' => 'findchang',
                'page_name_th' => 'หน้าหลัก',
			    'page_name_th_url' => '/findchang',
                'page_name_v1' => 'company logo',
                'page_name_v1_url' => '/findchang/company/logo',
                'page_name_v2' => null,
                'page_name_v2_url' => null,
                'imgshowup' => $getAllImageOriginal
            ];
            return view('pages.findchang.findchang-company-logo')->with($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    } 

    public function storeImg(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'company_name' => 'required',
                'short_name' => 'required',
            ]);
        
            $imageName = date('YmdHis').'_'.Cookie::get('username').'.'.$request->image->extension();       
            $request->image->move(public_path('assets/images/findchang/company'), $imageName);
            $result =  FindChangCompanyLogoService::storeImg($imageName,$request);

            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }

    public function destroyImg($imgId,$imgName)
    {
        try {
        $path =  public_path("/assets/images/findchang/company/").$imgName;
        $isExists =  File::exists($path);
        
        if ($isExists) {
            unlink($path);
        }
        $result =  FindChangCompanyLogoService::destroyImg($imgId);
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }   
}
