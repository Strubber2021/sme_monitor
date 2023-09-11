<?php 
namespace App\Services\Bukkhon;

use App\Http\Controllers\admin\RepoController;
use App\Models\Bukkhon\BukkhonAd3Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class BukkhonAd3Service 
{
    public function storeImg($imageName)
    {
      try {
        $data = [
          'banner_path' => 'assets/images/bukkhon/ad3/'.$imageName,
          'created_at' => DB::raw('getdate()'),
          'created_by' => Cookie::get('name')
        ];
        return BukkhonAd3Model::storeImg($data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function getAllImage()
    {
      try {        
        $rs = BukkhonAd3Model::getAllImage()->toArray();
        
        foreach ($rs['data'] as $key => $value) {
          $value->dateText = RepoController::monthIdToThaiShortName(date_format(date_create($value->created_at),"m")).' '.date_format(date_create($value->created_at),"d").', '.date_format(date_create($value->created_at),"Y");
          $explodePath = explode('/',$value->banner_path);
          $value->imgName = $explodePath[4];
        }
        
        return $rs;
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function destroyImg($imgId){
      try {
        return BukkhonAd3Model::destroyImg($imgId);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function countAllImage(){
      try {
        return BukkhonAd3Model::countAllImage();
      } catch (\Throwable $th) {
        throw $th;
      }
    }
}
?>