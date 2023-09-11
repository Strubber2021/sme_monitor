<?php

namespace App\Helpers;

class JsonResult
{
    public static  function jsonResult($data = null, $errors = null,  $message = "",  $success = true, $message_ex  = "")
    {
        $json['data'] = $data;
        $json['message'] = $message;
        $json['message_ex'] = $message_ex;
        $json['success'] = $success;
        $json['errors'] =  $errors;
        // return $json;
        return response()->json($json);
    }

    public static function resultSuccess($data = null,  $message = "", $message_ex = "")
    {
        return self::jsonResult($data, null, $message, true, $message_ex);
    }

    public static function resultErrors($errors = null,  $message = "", $message_ex = "")
    {

        return self::jsonResult(null, $errors, $message, false, $message_ex);
    }

    public static function errors($errors = null,  $message = "", $message_ex = "")
    {
        return self::jsonResult(null, $errors, $message, false, $message_ex);
    }

    public static function success($data = null,  $message = "", $message_ex = "")
    {
        return self::jsonResult($data, null, $message, true, $message_ex);
    }
}
