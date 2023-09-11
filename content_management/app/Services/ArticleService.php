<?php 
namespace App\Services;

use App\Http\Controllers\admin\RepoController;
use App\Models\ArticleModel;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class ArticleService 
{
    public function getAllProjectSme()
    {
      try {        
        return ArticleModel::getAllProjectSme();
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function create($imageName, $request){
      try {
        $data = [
          'article_image' => 'assets/images/article/'.$imageName,
          'article_name' => $request['article_name'],
          'article_preview' => $request['article_preview'],
          'article_detail' => $request['article_detail'],
          'post_in_ninec' => $request['post_in_ninec'],
          'post_in_bukk' => $request['post_in_bukk'],
          'post_in_sme_th' => $request['post_in_sme_th'],
          'post_in_job_th' => $request['post_in_job_th'],
          'post_in_find_chang' => $request['post_in_find_chang'],
          'created_at' => DB::raw('getdate()'),
          'created_by' => Cookie::get('name'),
          'is_active' => $request['is_active'],
        ];
        return ArticleModel::create($data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function destroy($id){
      try {
        return ArticleModel::destroy($id);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function getAllImage()
    {
      try {        
        $rs = ArticleModel::getAllImage()->toArray();
        
        foreach ($rs['data'] as $key => $value) {
          $value->dateText = RepoController::monthIdToThaiShortName(date_format(date_create($value->created_at),"m")).' '.date_format(date_create($value->created_at),"d").', '.date_format(date_create($value->created_at),"Y");
          /*
          $explodePath = explode('/',$value->banner_path);
          $value->imgName = $explodePath[4];
          */
        }
        
        return $rs;
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function changeStatus($id, $status)
    {
      try {
        if ($status == '1') {
          $data['is_active'] = 0;
        }else{
          $data['is_active'] = 1;
        }
        return ArticleModel::changeStatus($id, $data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function get($id){
      try {
        return ArticleModel::get($id);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function update($imageName, $request){
      try {
        $id = $request['id'];
        $data = [
          'article_image' => $imageName != null ? 'assets/images/article/'.$imageName : null,
          'article_name' => $request['article_name'],
          'article_preview' => $request['article_preview'],
          'article_detail' => $request['article_detail'],
          'post_in_ninec' => $request['post_in_ninec'],
          'post_in_bukk' => $request['post_in_bukk'],
          'post_in_sme_th' => $request['post_in_sme_th'],
          'post_in_job_th' => $request['post_in_job_th'],
          'post_in_find_chang' => $request['post_in_find_chang'],
          'update_at' => DB::raw('getdate()'),
          'update_by' => Cookie::get('name'),
          'is_active' => $request['is_active'],
        ];
        if(is_null($imageName)){
          unset($data['article_image']);
        }
        
        return ArticleModel::update($id, $data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    /*
    public function countAllVdo(){
      try {
        return SmeThaiCounterViewModel::countAllVdo();
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    */
}
?>