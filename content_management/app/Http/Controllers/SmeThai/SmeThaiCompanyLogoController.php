<?php

namespace App\Http\Controllers\SmeThai;

use App\Constants\AppConstants;
use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use App\Services\SmeThai\SmeThaiCompanyLogoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;

class SmeThaiCompanyLogoController extends Controller
{
    public function __construct()
    {   

    }
      
    public function index()
    {
        try {
            $getAllImageOriginal = SmeThaiCompanyLogoService::getAllImage();
            $getAllImageOriginal['page_number'] = null;
            if ($getAllImageOriginal['links'] != null) {
                $setAllImage = $getAllImageOriginal;
                $spliceFirstArray = array_splice($setAllImage['links'], 1);
                array_pop($spliceFirstArray);
                $getAllImageOriginal['page_number'] = $spliceFirstArray;
            }

            $data = [
                'breadcrumb_name' => 'BANNER Company Logo',
                'page_name' => 'SmeThai/Company logo',
                'side_name' => 'smethai',
                'page_name_th' => 'หน้าหลัก',
			    'page_name_th_url' => '/smethai',
                'page_name_v1' => 'company logo',
                'page_name_v1_url' => '/smethai/company/logo',
                'page_name_v2' => null,
                'page_name_v2_url' => null,
                'imgshowup' => $getAllImageOriginal
            ];
            return view('pages.smeThai.smeThai-company-logo')->with($data);
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
            $request->image->move(public_path('assets/images/smeThai/company'), $imageName);
            $result =  SmeThaiCompanyLogoService::storeImg($imageName,$request);

            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }

    public function destroyImg($imgId,$imgName)
    {
        try {
        $path =  public_path("/assets/images/smeThai/company/").$imgName;
        $isExists =  File::exists($path);
        
        if ($isExists) {
            unlink($path);
        }
        $result =  SmeThaiCompanyLogoService::destroyImg($imgId);
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }   
}
