<?php

namespace Miusage\Blocks;

class Block {
    public function __construct() {
        add_action( 'init', [$this, 'render_block'], 10 );
    }

    public function render_block() {
        register_block_type( __DIR__ . '/block-1', [
            'editor_style'    => 'miusage-block-admin',
            'editor_script'   => 'miusage-block-admin',
            'render_callback' => [$this, 'render_block_one']
        ] );
    }

    public function render_block_one( array $attributes ) {
        error_log( print_r( $attributes, 1 ) );
    }
}