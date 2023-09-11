<?php

namespace App\Http\Controllers\Bukkhon;

use App\Constants\AppConstants;
use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use App\Services\Bukkhon\BukkhonAd3Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;

class BukkhonAd3Controller extends Controller
{
    public function __construct()
    {   

    }
    
    public function index()
    {
        try {
            $getAllImageOriginal = BukkhonAd3Service::getAllImage();
            $getAllImageOriginal['page_number'] = null;
            if ($getAllImageOriginal['links'] != null) {
                $setAllImage = $getAllImageOriginal;
                $spliceFirstArray = array_splice($setAllImage['links'], 1);
                array_pop($spliceFirstArray);
                $getAllImageOriginal['page_number'] = $spliceFirstArray;
            }
            
            $data = [
                'breadcrumb_name' => 'BANNER AD3',
                'page_name' => 'Bukkhon/ad3',
                'side_name' => 'bukkhon',
                'page_name_th' => 'หน้าหลัก',
			    'page_name_th_url' => '/bukkhon',
                'page_name_v1' => 'ad3',
                'page_name_v1_url' => '/bukkhon/ads/3',
                'page_name_v2' => null,
                'page_name_v2_url' => null,
                'imgshowup' => $getAllImageOriginal
            ];
            return view('pages.bukkhon.bukkhon-ads-3')->with($data);
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
            $request->image->move(public_path('assets/images/bukkhon/ad3'), $imageName);
            $result =  BukkhonAd3Service::storeImg($imageName);

            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }

    public function destroyImg($imgId,$imgName)
    {
        try {
        $path =  public_path("/assets/images/bukkhon/ad3/").$imgName;
        $isExists =  File::exists($path);
        
        if ($isExists) {
            unlink($path);
        }
        $result =  BukkhonAd3Service::destroyImg($imgId);
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }   
}
