<?php 
namespace App\Services\Bukkhon;

use App\Http\Controllers\admin\RepoController;
use App\Models\Bukkhon\BukkhonCounterDownloadModel;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class BukkhonCounterDownloadService 
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
        
        return BukkhonCounterDownloadModel::create($data);
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
        return BukkhonCounterDownloadModel::update($id,$data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function getCounter()
    {
      try {
        
        return BukkhonCounterDownloadModel::getCounter();
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    /*
    public function getAllVdo()
    {
      try {
        return BukkhonCounterDownloadModel::getAllVdo()->toArray();
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function destroy($id)
    {
      try {
        return BukkhonCounterDownloadModel::destroy($id);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function countAllVdo(){
      try {
        return BukkhonCounterDownloadModel::countAllVdo();
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    */
}
?>