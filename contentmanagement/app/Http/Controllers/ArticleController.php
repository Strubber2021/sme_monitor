<?php

namespace App\Http\Controllers;

use App\Constants\AppConstants;
use App\Helpers\JsonResult;
use App\Http\Controllers\Controller;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function __construct()
    {   

    }
      
    public function index()
    {
        try {

            $getAllImageOriginal = ArticleService::getAllImage();
            $getAllImageOriginal['page_number'] = null;
            if ($getAllImageOriginal['links'] != null) {
                $setAllImage = $getAllImageOriginal;
                $spliceFirstArray = array_splice($setAllImage['links'], 1);
                array_pop($spliceFirstArray);
                $getAllImageOriginal['page_number'] = $spliceFirstArray;
            }
            $data = [
                'breadcrumb_name' => 'Article',
                'page_name' => 'article',
                'side_name' => 'article',
                'page_name_th' => 'หน้าหลัก',
			    'page_name_th_url' => '/article',
                'page_name_v1' => null,
                'page_name_v1_url' => null,
                'page_name_v2' => null,
                'page_name_v2_url' => null,
                'project_sme' => ArticleService::getAllProjectSme()->toArray(),
                'imgshowup' => $getAllImageOriginal
            ];
            return view('pages.article')->with($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    } 
    public function create(Request $request)
    {
        try {
            $request->validate([
                'article_name' => 'required',
                'article_preview' => 'required',
                'article_detail' => 'required',
                // 'post_in' => 'required',
            ]);

            $imageName = date('YmdHis').'_'.Cookie::get('username').'.'.$request->article_image->extension();       
            $request->article_image->move(public_path('assets/images/article'), $imageName);
            $result =  ArticleService::create($imageName, $request);
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }

    public function get($id)
    {
        try {
            $result =  ArticleService::get($id);
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }   

    public function update(Request $request)
    {
        try {
            // dd($request->all());
            $imageName = null;
            if ($request->get('article_image') != "undefined") {
                if ($request->get('old_image') != null) {
                    $old_image = public_path($request->get('old_image'));
                    $isExists =  File::exists($old_image);
                    if ($isExists) {
                        unlink($old_image);
                    }
                }
                $imageName = date('YmdHis').'_'.Cookie::get('username').'.'.$request->article_image->extension();       
                $request->article_image->move(public_path('assets/images/article'), $imageName);
            }

            $result =  ArticleService::update($imageName, $request);
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }   

    public function destroy($id)
    {
        try {
            $article = ArticleService::get($id);
            if($article->article_image != "" || !is_null($article->article_image)){
                $image = public_path($article->article_image);
                $isExists =  File::exists($image);
                if ($isExists) {
                    unlink($image);
                }
            }

            $result =  ArticleService::destroy($id);
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }   

    public function changeStatus($id,$status)
    {
        try { 
            $result = ArticleService::changeStatus($id,$status);
            return JsonResult::success($result);
        } catch (\Throwable $e) {
            return JsonResult::errors($e->getMessage(), AppConstants::ERROR_CONTACT_ADMIN);
        }
    }
}
