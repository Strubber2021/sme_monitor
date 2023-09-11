<?php 
namespace App\Services\Ninechang;

use App\Http\Controllers\admin\RepoController;
use App\Models\Ninechang\NinechangCounterDownloadModel;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class NinechangCounterDownloadService 
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
        
        return NinechangCounterDownloadModel::create($data);
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
        return NinechangCounterDownloadModel::update($id,$data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function getCounter()
    {
      try {
        
        return NinechangCounterDownloadModel::getCounter();
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    /*
    public function getAllVdo()
    {
      try {
        return NinechangCounterDownloadModel::getAllVdo()->toArray();
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function destroy($id)
    {
      try {
        return NinechangCounterDownloadModel::destroy($id);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function countAllVdo(){
      try {
        return NinechangCounterDownloadModel::countAllVdo();
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    */
}
?>