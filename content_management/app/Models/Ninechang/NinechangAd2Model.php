<?php

namespace App\Models\Ninechang;

use Illuminate\Support\Facades\DB;

class NinechangAd2Model
{
    private const TABLE = 'ninec_ads_2';

    private const PK = 'id';

    public static function storeImg($data)
    {
        return DB::table(self::TABLE)->insert($data);
    }

    public static function getAllImage()
    {
        return DB::table(self::TABLE)->where('is_active', '=', True)->orderBy('created_at','desc')->paginate(10);
    }
    public static function destroyImg($imgId)
    {
        return DB::table(self::TABLE)
            ->where(self::PK,  $imgId)
            ->delete();
    }
    public static function countAllImage()
    {
        return DB::table(self::TABLE)->count();
    }
}
