<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ArticleModel
{
    private const TABLE = 'article';
    private const SME = 'project';

    private const PK = 'id';

    public static function getAllProjectSme()
    {
        return DB::table(self::SME)->get();
    }
    public static function create($data)
    {
        return DB::table(self::TABLE)->insert($data);
    }
    public static function getAllImage()
    {
        return DB::table(self::TABLE)->orderBy('created_at','desc')->paginate(10);
    }
    public static function destroy($id)
    {
        return DB::table(self::TABLE)
            ->where(self::PK,  $id)
            ->delete();
    }
    public static function changeStatus($id, $data)
    {
        return DB::table(self::TABLE)
            ->where(self::PK,  $id)
            ->update($data);
    }
    public static function update($id, $data)
    {
        return DB::table(self::TABLE)
            ->where(self::PK,  $id)
            ->update($data);
    }
    public static function get($id)
    {
        return DB::table(self::TABLE)
            ->where(self::PK,  $id)
            ->first();
    }
    /*


    
    public static function countAllVdo()
    {
        return DB::table(self::TABLE)->count();
    }
    */
}
