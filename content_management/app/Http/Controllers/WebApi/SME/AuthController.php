<?php

namespace App\Http\Controllers\WebApi\SME;

use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use App\Services\SME\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller
{
    protected function validatorLoginSME(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string',
            'password' => 'required',
        ]);
    }
    public function login(Request $req)
    {
        try {
            $remember_me = $req->post('remember_me');
            $username =  trim($req->post('username'));
            $password =   trim($req->post('password'));
            
            $validator  =  $this->validatorLoginSME(array(
                'username' => $username,
                'password' => $password,
            ));

            if ($validator->fails()) {
                $errs =  $validator->errors()->get('*');
                return JsonResult::errors($errs, 'รูปแบบไม่ถูกต้อง');
            }
            
            $sql = 'SELECT username,name FROM [ST_MASTER].[dbo].[Login_smemonitor]  where username =  ? and password = ?';
            $results = DB::select($sql, [$username,$password]);

            if (count($results) == 0) {
                return JsonResult::errors(null, 'ไม่พบผู้ใช้งานนี้ ในระบบ');
            }

            $user = $results[0];

            /*
            if (Hash::check($password, $employer->password) == false) {
                return JsonResult::errors(null, 'รหัสผ่านไม่ถูกต้อง');
            }
            */

            if ($remember_me == "true") {
                Cookie::queue('username', $user->username);
                Cookie::queue('name', $user->name);
            }else{
                Cookie::queue('username', $user->username, 14400);
                Cookie::queue('name', $user->name, 14400);
            }

            return JsonResult::success($user);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function chk_login(Request $req)
    {
        try {
            $username =  trim($req->post('username'));
            $password =   trim($req->post('password'));
            $validator  =  $this->validatorLoginSME(array(
                'username' => $username,
                'password' => $password,
            ));
            $results = AuthService::chk_login($username,$password);
            return $results;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }

    public function ajax_logout(Request $request)
    {
        try {
            Session::flush();
            Auth::logout();

            Cookie::queue(Cookie::forget('username'));
            Cookie::queue(Cookie::forget('name'));
            
            return JsonResult::success();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}