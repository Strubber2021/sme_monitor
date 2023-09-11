<?php

namespace App\Models\Bukkhon;

use Illuminate\Support\Facades\DB;

class BukkhonVdo1Model
{
    private const TABLE = 'bukk_vdo_1';

    private const PK = 'id';

    public static function create($data)
    {
        return DB::table(self::TABLE)->insert($data);
    }
    public static function getAllVdo()
    {
        return DB::table(self::TABLE)->where('is_active', '=', True)->orderBy('created_at','desc')->paginate(10);
    }
    public static function destroy($id)
    {
        return DB::table(self::TABLE)
            ->where(self::PK,  $id)
            ->delete();
    }
    public static function countAllVdo()
    {
        return DB::table(self::TABLE)->count();
    }
}
