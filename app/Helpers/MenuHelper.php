<?php

use Illuminate\Support\Facades\Request;

if (! function_exists('activeMenu')) {
    /**
     * Determine if a menu item should be marked as active.
     *
     * @param  string  $uri
     */
    function activeMenu($uri = ''): bool
    {
        $active = false;

        if (
            Request::is(Request::segment(1).'/'.$uri.'/*') ||
            Request::is(Request::segment(1).'/'.$uri) ||
            Request::is($uri)
        ) {
            $active = true;
        }

        return $active;
    }
}
