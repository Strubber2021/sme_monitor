<?php 
namespace App\Services\Bukkhon;

use App\Http\Controllers\admin\RepoController;
use App\Models\Bukkhon\BukkhonVdo1Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class BukkhonVdo1Service 
{
    public function create($request)
    {
      try {
        $data = [
          'vdo_name' => $request->get('vdo_name'),
          'vdo_link' => $request->get('vdo_link'),
          'vdo_number' => $request->get('vdo_number'),
          'created_at' => DB::raw('getdate()'),
          'created_by' => Cookie::get('name'),
        ];
        
        return BukkhonVdo1Model::create($data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function getAllVdo()
    {
      try {
        return BukkhonVdo1Model::getAllVdo()->toArray();
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function destroy($id)
    {
      try {
        return BukkhonVdo1Model::destroy($id);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function countAllVdo(){
      try {
        return BukkhonVdo1Model::countAllVdo();
      } catch (\Throwable $th) {
        throw $th;
      }
    }
}
?>