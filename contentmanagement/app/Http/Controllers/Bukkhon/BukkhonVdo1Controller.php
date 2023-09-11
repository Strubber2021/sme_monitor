<?php

namespace App\Http\Controllers\Bukkhon;

use App\Constants\AppConstants;
use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use App\Services\Bukkhon\BukkhonVdo1Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;

class BukkhonVdo1Controller extends Controller
{
    public function __construct()
    {   

    }
      
    public function index()
    {
        try {   
            $getAllVdoOriginal = BukkhonVdo1Service::getAllVdo();
            $getAllVdoOriginal['page_number'] = null;
            if ($getAllVdoOriginal['links'] != null) {
                $setAllImage = $getAllVdoOriginal;
                $spliceFirstArray = array_splice($setAllImage['links'], 1);
                array_pop($spliceFirstArray);
                $getAllVdoOriginal['page_number'] = $spliceFirstArray;
            }
            $data = [
                'breadcrumb_name' => 'LINK VDO 1',
                'page_name' => 'Bukkhon/vdo1',
                'side_name' => 'bukkhon',
                'page_name_th' => 'หน้าหลัก',
			    'page_name_th_url' => '/bukkhon',
                'page_name_v1' => 'vdo1',
                'page_name_v1_url' => '/bukkhon/vdo/1',
                'page_name_v2' => null,
                'page_name_v2_url' => null,
                'vdoshowup' => $getAllVdoOriginal
            ];
            return view('pages.bukkhon.bukkhon-vdo-1')->with($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create(Request $request){
        try { 

            $request->validate([
                'vdo_name' => 'required|string|max:250',
                'vdo_link' => 'required|string|max:250',
            ]);

            $result = BukkhonVdo1Service::create($request);
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }

    public function destroy(Request $request, $id){
        try {
            $result = BukkhonVdo1Service::destroy($id);

            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }
    /*
    public function index(Request $request){
        try { 

        } catch (\Throwable $th) {
            throw $th;
        } 
    }
    */
}
