<?php 
namespace App\Services;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class LoginManagementService 
{
    public static function isAuth()
    {
      $user_info =  Cookie::get('username');
      if (empty($user_info)) {
        return false;
      }
      return true;
    }
}
?>