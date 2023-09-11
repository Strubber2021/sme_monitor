<?php

namespace App\Models\FindChang;

use Illuminate\Support\Facades\DB;

class FindChangVdo1Model
{
    private const TABLE = 'findchang_vdo_1';

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
