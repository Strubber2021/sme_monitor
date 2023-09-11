<?php

namespace App\Http\Controllers;

use App\Constants\AppConstants;
use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;

class testController extends Controller
{
    public function __construct()
    {   

    }
    
    public function index()
    {
        try {
            
            $img = [
                array(
                    "assets/images/image_web_1-01.jpg",
                    "assets/images/image_web_1-01.jpg"
                ),
                array(
                    "assets/images/image_web_1-01.jpg",
                    "assets/images/image_web_1-01.jpg"
                ),
                array(
                    "assets/images/image_web_1-01.jpg",
                ),
            ];

            $imgArray = [
                array(
                    "id" => null,
                    "path" => "assets/images/image_web_1-01.jpg"
                ),
                array(
                    "id" => null,
                    "path" => "assets/images/image_web_2-01.jpg"
                ),
                array(
                    "id" => null,
                    "path" => "assets/images/image_web_3-01.jpg"
                ),
                array(
                    "id" => null,
                    "path" => "assets/images/image_web_4-01.jpg"
                ),
                array(
                    "id" => null,
                    "path" => "assets/images/image_web_5-01.jpg"
                )
            ];

            //หาจำนวนหน้ากระดาษ --------------------------------------------------------------------------------------
            $num_rows = count($imgArray);
            $perpage = 2;
            
            if($num_rows<=$perpage)
            {
                $num_pages =1;
            }
            else if(($num_rows % $perpage)==0)
            {
                $num_pages =($num_rows/$perpage) ;
            }
            else
            {
                $num_pages =($num_rows/$perpage)+1;
                $num_pages = (int)$num_pages;
            }
            // dd($num_pages);
            //--------------------------------------------------------------------------------------------------------
            $imgforloops = [];
            $imgResponse = [];
            $lapID = 0;
            $lap = 0;
            foreach ($imgArray as $key => $value) {
                if ($lap <= 1) {
                    $value['id'] = $lapID;
                }
            }
            // dd(count($imgforloops));
            dd($imgResponse);
















            $data = [
                "num_pages" => $num_pages,
                "img" => $imgResponse
            ];
            return view('test')->with($data);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}
