<?php

namespace App\Models\Ninechang;

use Illuminate\Support\Facades\DB;

class NinechangCounterDownloadModel
{
    private const TABLE = 'ninec_download';

    private const PK = 'id';

    public static function create($data)
    {
        return DB::table(self::TABLE)->insert($data);
    }

    public static function update($id,$data)
    {
        return DB::table(self::TABLE)
            ->where(self::PK,  $id)
            ->update($data);
    }

    public static function getCounter()
    {
        return DB::table(self::TABLE)->select('*')->first();
    }
}
