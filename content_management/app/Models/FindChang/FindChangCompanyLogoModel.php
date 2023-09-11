<?php

namespace App\Models\FindChang;

use Illuminate\Support\Facades\DB;

class FindChangCompanyLogoModel
{
    private const TABLE = 'findchang_company_logo';

    private const PK = 'id';

    public static function storeImg($data)
    {
        return DB::table(self::TABLE)->insert($data);
    }

    public static function getAllImage()
    {
        return DB::table(self::TABLE)->where('is_active', '=', True)->orderBy('created_at','desc')->paginate(5);
    }
    public static function destroyImg($imgId)
    {
        return DB::table(self::TABLE)
            ->where(self::PK,  $imgId)
            ->delete();
    }
    public static function countAllComapanyLogo()
    {
        return DB::table(self::TABLE)->count();
    }
}
