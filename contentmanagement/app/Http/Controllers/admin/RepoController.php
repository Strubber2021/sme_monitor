<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\LoginManagementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class RepoController extends Controller
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
      
    public function monthIdToThaiShortName($monthId)
    {
        try {
            $month = [
                'ม.ค.' => '01',
                'ก.พ.' => '02',
                'มี.ค.' => '03',
                'เม.ย.' => '04',
                'พ.ค.' => '05',
                'มิ.ย.' => '06',
                'ก.ค.' => '07',
                'ส.ค.' => '08',
                'ก.ย.' => '09',
                'ต.ค.' => '10',
                'พ.ย.' => '11',
                'ธ.ค.' => '12',
            ];
            return array_search($monthId,$month);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
