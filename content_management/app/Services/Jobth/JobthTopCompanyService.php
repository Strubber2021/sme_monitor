<?php 
namespace App\Services\Jobth;

use App\Http\Controllers\admin\RepoController;
use App\Models\Jobth\JobthTopCompanyModel;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class JobthTopCompanyService 
{
    public function create($request, $company_logo_path, $company_banner_path)
    {
      try { 
        $data = [
          'company_logo' => 'assets/images/jobth/topcompany/'.$company_logo_path,
          'company_banner' => 'assets/images/jobth/topcompany/'.$company_banner_path,
          'conpany_name' => $request->get('conpany_name'),
          'content_detail' => $request->get('content_detail'),
          'created_at' => DB::raw('getdate()'),
          'created_by' => Cookie::get('name'),
          'is_active' => $request->get('is_active'),
        ]; 

        return JobthTopCompanyModel::create($data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function getAllImage()
    {
      try {        
        $rs = JobthTopCompanyModel::getAllImage()->toArray();
        
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
        return JobthTopCompanyModel::changeStatus($id, $data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function destroy($id)
    {
      try {
        return JobthTopCompanyModel::destroy($id);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function countAllImage(){
      try {
        return JobthTopCompanyModel::countAllImage();
      } catch (\Throwable $th) {
        throw $th;
      }
    }
}
?>