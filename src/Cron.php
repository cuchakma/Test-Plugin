<?php

namespace Miusage;
class Cron {

    public $hook = 'miusage_users_cron';

    public function __construct() {
        add_action( 'init', [$this, 'schedule_event'] );
    }

    public function schedule_event() {
        $timestamp = time() + 60 * 60;
        wp_schedule_single_event( $timestamp, $this->hook );
        add_action( $this->hook, [$this, 'reinsert_users_data'] );
    }

    public function reinsert_users_data() {
        $response = ! ( wp_remote_get( 'https://miusage.com/v1/challenge/1/' ) instanceof WP_Error ) ? wp_remote_get( 'https://miusage.com/v1/challenge/1/' ) : '';
        $body     = ! empty( wp_remote_retrieve_body( $response ) ) ? (array) json_decode( wp_remote_retrieve_body( $response ) )->data->rows : '';
        update_option( 'miusage_users', $body );
    }
}