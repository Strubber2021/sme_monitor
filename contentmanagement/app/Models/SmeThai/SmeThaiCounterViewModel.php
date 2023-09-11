<?php

namespace App\Models\SmeThai;

use Illuminate\Support\Facades\DB;

class SmeThaiCounterViewModel
{
    private const TABLE = 'sme_th_counter';

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
