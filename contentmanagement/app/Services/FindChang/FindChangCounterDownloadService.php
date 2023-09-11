<?php 
namespace App\Services\FindChang;

use App\Http\Controllers\admin\RepoController;
use App\Models\FindChang\FindChangCounterDownloadModel;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class FindChangCounterDownloadService 
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
        
        return FindChangCounterDownloadModel::create($data);
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
        return FindChangCounterDownloadModel::update($id,$data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function getCounter()
    {
      try {
        
        return FindChangCounterDownloadModel::getCounter();
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    /*
    public function getAllVdo()
    {
      try {
        return FindChangCounterDownloadModel::getAllVdo()->toArray();
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function destroy($id)
    {
      try {
        return FindChangCounterDownloadModel::destroy($id);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function countAllVdo(){
      try {
        return FindChangCounterDownloadModel::countAllVdo();
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    */
}
?>