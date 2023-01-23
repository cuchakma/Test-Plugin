<?php

namespace Miusage;

use Miusage\Models\AssetModel;

class Asset extends AssetModel {

    public function register_misuage_style() {
        global $current_screen;
        foreach ( $this->style_handles as $asset_object ) {
            if ( $current_screen->base === $asset_object->screen ) {
                wp_register_style( $asset_object->handle, $asset_object->fileurl, $asset_object->deps, $asset_object->version );
            }
        }
    }

    public function enqueue_style( $handle ) {
        foreach ( $this->style_handles as $object ) {
            if ( $object->handle === $handle ) {
                wp_enqueue_style( $handle );
            }
        }
    }

    public function register_misuage_script() {
        global $current_screen;
        foreach ( $this->script_handles as $asset_object ) {
            if ( $current_screen->base === $asset_object->screen ) {
                wp_register_script( $asset_object->handle, $asset_object->fileurl, $asset_object->deps, $asset_object->version, $asset_object->in_footer );
            }
        }
    }

    public function enqueue_script( $handle ) {
        foreach ( $this->script_handles as $object ) {
            if ( $object->handle === $handle ) {
                wp_enqueue_script( $handle );
            }
        }
    }
}