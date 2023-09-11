<?php 
namespace App\Services\Ninechang;

use App\Http\Controllers\admin\RepoController;
use App\Models\Ninechang\NinechangCompanyLogoModel;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class NinechangCompanyLogoService 
{
    public function storeImg($imageName,$request)
    {
      try {
        $data = [
          'company_name' => $request->get('company_name'),
          'short_name' => $request->get('short_name'),
          'image_path' => 'assets/images/ninechang/company/'.$imageName,
          'created_at' => DB::raw('getdate()'),
          'created_by' => Cookie::get('name')
        ];
        return NinechangCompanyLogoModel::storeImg($data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function getAllImage()
    {
      try {        
        $rs = NinechangCompanyLogoModel::getAllImage()->toArray();
        
        foreach ($rs['data'] as $key => $value) {
          $value->dateText = RepoController::monthIdToThaiShortName(date_format(date_create($value->created_at),"m")).' '.date_format(date_create($value->created_at),"d").', '.date_format(date_create($value->created_at),"Y");
          $explodePath = explode('/',$value->image_path);
          $value->imgName = $explodePath[4];
        }
        
        return $rs;
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function destroyImg($imgId){
      try {
        return NinechangCompanyLogoModel::destroyImg($imgId);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function countAllComapanyLogo(){
      try {
        return NinechangCompanyLogoModel::countAllComapanyLogo();
      } catch (\Throwable $th) {
        throw $th;
      }
    }
}
?>