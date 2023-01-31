<?php

namespace Miusage\Models;

use stdClass;

abstract class AssetModel {

    protected $css_path;

    protected $js_path;

    protected $style_handles = [];

    protected $script_handles = [];

    public static $instance = 0;

    public function __construct( $css_path, $js_path ) {
        $this->css_path = $css_path;
        $this->js_path  = $js_path;
        ++self::$instance;
    }

    public function insert_style_deps( $filename, $handle, $deps, $version, $screen, $additional_path = '' ) {
        $asset_object          = new stdClass();
        $asset_object->fileurl = ! empty( $additional_path ) ? $additional_path . '/' . $filename : $this->css_path . '/' . $filename;
        $asset_object->handle  = $handle;
        $asset_object->deps    = $deps;
        $asset_object->version = $version;
        $asset_object->screen  = $screen;
        array_push( $this->style_handles, $asset_object );
    }

    public function insert_script_deps( $filename, $handle, $deps, $version, $in_footer, $screen, $additional_path = '' ) {
        $asset_object            = new stdClass();
        $asset_object->fileurl   = ! empty( $additional_path ) ? $additional_path . '/' . $filename : $this->js_path . '/' . $filename;
        $asset_object->handle    = $handle;
        $asset_object->deps      = $deps;
        $asset_object->version   = $version;
        $asset_object->in_footer = $in_footer;
        $asset_object->screen    = $screen;
        array_push( $this->script_handles, $asset_object );
    }
}