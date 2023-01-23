<?php

use Miusage\Asset;
use Miusage\Admin\Menu;

return [
    Asset::class => DI\create( Asset::class )->constructor( ADMIN_ASSETS_CSS_PATH, ADMIN_BUILD_PATH ),
    Menu::class  => DI\create( Menu::class )->constructor( DI\get( Asset::class ) )
];