<?php

namespace Laraflash\Website\Finders;

class PathFinder
{

    public static function getLaraflashPath()
    {
        return __DIR__.'/../Features';
    }


    public static function getLaraflashCommonPath()
    {
        return __DIR__.'/../../resources/views';
    }
}
