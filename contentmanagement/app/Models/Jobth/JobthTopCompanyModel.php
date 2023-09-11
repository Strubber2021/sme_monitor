<?php

namespace App\Models\Jobth;

use Illuminate\Support\Facades\DB;

class JobthTopCompanyModel
{
    private const TABLE = 'job_th_ads_3';

    private const PK = 'id';

    public static function create($data)
    {
        return DB::table(self::TABLE)->insert($data);
    }    
    public static function getAllImage()
    {
        return DB::table(self::TABLE)->orderBy('created_at','desc')->paginate(5);
        // return DB::table(self::TABLE)->where('is_active', '=', True)->orderBy('created_at','desc')->paginate(5);
    }
    public static function changeStatus($id, $data)
    {
        return DB::table(self::TABLE)
            ->where(self::PK,  $id)
            ->update($data);
    }
    
    public static function destroy($id)
    {
        return DB::table(self::TABLE)
            ->where(self::PK,  $id)
            ->delete();
    }
    public static function countAllImage()
    {
        return DB::table(self::TABLE)->count();
    }
}
