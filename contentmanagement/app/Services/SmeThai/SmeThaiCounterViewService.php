<?php 
namespace App\Services\SmeThai;

use App\Http\Controllers\admin\RepoController;
use App\Models\SmeThai\SmeThaiCounterViewModel;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class SmeThaiCounterViewService 
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
        
        return SmeThaiCounterViewModel::create($data);
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
        return SmeThaiCounterViewModel::update($id,$data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function getCounter()
    {
      try {
        
        return SmeThaiCounterViewModel::getCounter();
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    /*
    public function getAllVdo()
    {
      try {
        return SmeThaiCounterViewModel::getAllVdo()->toArray();
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function destroy($id)
    {
      try {
        return SmeThaiCounterViewModel::destroy($id);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
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