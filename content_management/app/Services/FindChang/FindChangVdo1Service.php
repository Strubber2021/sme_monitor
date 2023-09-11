<?php 
namespace App\Services\FindChang;

use App\Http\Controllers\admin\RepoController;
use App\Models\FindChang\FindChangVdo1Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class FindChangVdo1Service 
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
        
        return FindChangVdo1Model::create($data);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function getAllVdo()
    {
      try {
        return FindChangVdo1Model::getAllVdo()->toArray();
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    public function destroy($id)
    {
      try {
        return FindChangVdo1Model::destroy($id);
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function countAllVdo(){
      try {
        return FindChangVdo1Model::countAllVdo();
      } catch (\Throwable $th) {
        throw $th;
      }
    }
}
?>