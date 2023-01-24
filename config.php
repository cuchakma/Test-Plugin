<?php

use Miusage\Asset;
use Miusage\Rest\Payload;

return [
    Asset::class   => DI\create( Asset::class )->constructor( ADMIN_CSS_BUILD_PATH, ADMIN_BUILD_PATH ),
    Payload::class => DI\create( Payload::class )
];