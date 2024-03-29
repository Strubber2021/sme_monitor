<?php 
namespace App\Services\SmeThai;

use App\Http\Controllers\admin\RepoController;
use App\Models\SmeThai\SmeThaiCounterDownloadModel;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class SmeThaiCounterDownloadService 
{
    public function create($request)
    {
      try {
        $data = [
          'counter' => $request->get('counter'),
          'created_at' => DB::raw('getdate()'),
          'created_by' => Cookie::get('name'),
        ];
        unset($data['counter_id']);
        
        return SmeThaiCounterDownloadModel::create($data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function update($request)
    {
      try {
        $data = [
          'counter' => $request->get('counter'),
          'update_at' => DB::raw('getdate()'),
          'update_by' => Cookie::get('name'),
        ];
        $id = $request->get('counter_id');
        return SmeThaiCounterDownloadModel::update($id,$data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function getCounter()
    {
      try {
        
        return SmeThaiCounterDownloadModel::getCounter();
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    /*
    public function getAllVdo()
    {
      try {
        return SmeThaiCounterDownloadModel::getAllVdo()->toArray();
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function destroy($id)
    {
      try {
        return SmeThaiCounterDownloadModel::destroy($id);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function countAllVdo(){
      try {
        return SmeThaiCounterDownloadModel::countAllVdo();
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    */
}
?>