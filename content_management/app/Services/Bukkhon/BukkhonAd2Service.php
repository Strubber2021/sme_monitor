<?php 
namespace App\Services\Bukkhon;

use App\Http\Controllers\admin\RepoController;
use App\Models\Bukkhon\BukkhonAd2Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class BukkhonAd2Service 
{
    public function storeImg($imageName)
    {
      try {
        $data = [
          'banner_path' => 'assets/images/bukkhon/ad2/'.$imageName,
          'created_at' => DB::raw('getdate()'),
          'created_by' => Cookie::get('name')
        ];
        return BukkhonAd2Model::storeImg($data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function getAllImage()
    {
      try {        
        $rs = BukkhonAd2Model::getAllImage()->toArray();
        
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
        return BukkhonAd2Model::destroyImg($imgId);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function countAllImage(){
      try {
        return BukkhonAd2Model::countAllImage();
      } catch (\Throwable $th) {
        throw $th;
      }
    }
}
?>