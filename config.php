<?php

use Miusage\Asset;

return [
    Asset::class => DI\create( Asset::class )->constructor( ADMIN_CSS_BUILD_PATH, ADMIN_BUILD_PATH )
];