<?php

if (!function_exists('displayRouteName')) {
    function displayRouteName(string $routeName)
    {
        $explodeRouteName = explode('.', $routeName);

        if ('index' == $explodeRouteName[1]) {
            return $explodeRouteName[0];
        } else {
            return $explodeRouteName[1] . ' ' . $explodeRouteName[0];
        }
    }
}
