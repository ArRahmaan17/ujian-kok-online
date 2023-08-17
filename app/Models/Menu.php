<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Menu extends Model
{
    use HasFactory;

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_user');
    }

    public static function storeNewMenu(array $newMenu)
    {
        return self::insert($newMenu);
    }

    public static function getLastOrder(string $position)
    {
        return self::select(DB::raw('max(ordered) as ordered'))->where('position', "$position")->first();
    }

    public static function orderMenu(array $orderedMenu)
    {
        if (null != $orderedMenu) {
            foreach ($orderedMenu as $index => $menu) {
                $menu['updated_at'] = now('Asia/Jakarta');
                $menu['name'] = Str::headline(Str::replace('-', ' ', $menu['name']));
                self::where('id', $menu['id'])->update($menu);
            }

            return true;
        }

        return false;
    }
}
