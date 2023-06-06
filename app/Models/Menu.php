<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;

    public static function storeNewMenu(array $newMenu)
    {
        return self::insert($newMenu);
    }

    public static function getLastOrder(string $position)
    {
        return self::select(DB::raw("max(ordered) as ordered"))->where('position', "$position")->first();
    }
}
