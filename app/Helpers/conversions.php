<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

if (!function_exists('displayRouteName')) {
    function displayRouteName(string $routeName)
    {
        $explodeRouteName = explode('.', $routeName);
        if (isset($explodeRouteName[1])) {
            if ('index' == $explodeRouteName[1]) {
                return $explodeRouteName[0];
            } else {
                return Str::replace('-', ' ', $explodeRouteName[1]) . ' ' . $explodeRouteName[0];
            }
        } else {
            return $explodeRouteName[0];
        }
    }
}

if (!function_exists('activeRoute')) {
    function activeRoute(string $routeName, string $splitter)
    {
        $explodeRouteName = explode(Str::lower($splitter), $routeName);

        return count($explodeRouteName);
    }
}

function convertDateTimeToDiff(string $date): string
{
    return Carbon::parse($date)->add(-7, 'hours')->diffForHumans();
}
