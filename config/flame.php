<?php

use Laraflash\Website\Finders\PathFinder;

return [

    'groups' => [

        'laraflash' => [
            'namespace' => 'Laraflash\Website\Features',
            'path'      => PathFinder::getLaraflashPath(),
        ],

        'common' => [
            'namespace' => 'Laraflash\Website\Resources\Views',
            'path'      => PathFinder::getLaraflashCommonPath(),
        ]
    ],

    /* Shows the demo route. You can put it false sp the /flame route path is not loaded. */
    'demo' => [
        'route' => false,
    ],
];
