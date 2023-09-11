<?php

namespace App\Services\SME;

use App\Helpers\JsonResult;
use App\Http\Controllers\RepoController;
use App\Models\BindingAccountModel;
use App\Models\DropdownModel;
use App\Models\EmployeeModel;
use App\Models\SPN\EmployersModel as Employer;
use App\Models\SPN\EmployersProfileModel;
use App\Models\SysUserModel;
use App\Services\CompanyService;
use App\Services\EmployeeService;
use App\Services\QrtokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    public static function login($email, $password)
    {
        try {
            $sql = 'SELECT * FROM [SPN_HRM_04DB].[dbo].[employers]  where email =  ?';
            $results = DB::select($sql, [$email]);

            if (count($results) == 0) {
                return JsonResult::errors(null, 'ไม่พบผู้ประกอบการนี้ ในระบบ');
            }
            $employer = $results[0];
            if (Hash::check($password, $employer->password) == false) {
                return JsonResult::errors(null, 'รหัสผ่านไม่ถูกต้อง');
            }

            // dd($employer);
            Cookie::queue('spn_employer', $employer->id, 3600);
            unset($employer->password);
            return JsonResult::success($employer);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function chk_login($email, $password)
    {
        try {
            $user = Auth::user();
            $sql = 'SELECT * FROM [SPN_HRM_04DB].[dbo].[employers]  where email =  ?';
            $results = DB::select($sql, [$email]);

            if (count($results) == 0) {
                return JsonResult::errors(null, 'ไม่พบผู้ประกอบการนี้ ในระบบ');
            }
            $employer = $results[0];
            if (Hash::check($password, $employer->password) == false) {
                $chk = false;

                return JsonResult::errors(null, 'รหัสผ่านไม่ถูกต้อง');
            }
            $data = [
                'email' => $email,
                'password' => $password
            ];
            return JsonResult::success($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
