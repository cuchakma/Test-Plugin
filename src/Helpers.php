<?php

namespace Miusage;
class Helpers {
    public static function render_template( $filepath ) {
        ob_start();
        include $filepath;
        return ob_get_contents();
    }
    public static function get_users_list_count() {
        $data = get_option( 'miusage_users' );
        return count( $data );
    }
}