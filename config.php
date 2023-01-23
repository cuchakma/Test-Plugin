<?php

use Miusage\Asset;

return [
    Asset::class => DI\create( Asset::class )->constructor( ADMIN_ASSETS_CSS_PATH, ADMIN_BUILD_PATH )
];