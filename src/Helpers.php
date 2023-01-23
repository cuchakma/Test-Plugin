<?php

namespace Miusage;
class Helpers {
    public static function render_template( $filepath ) {
        ob_start();
        include $filepath;
        return ob_get_contents();
    }
}