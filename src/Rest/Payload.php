<?php
namespace Miusage\Rest;

use WP_REST_Controller;

class Payload extends WP_REST_Controller {
    public function __construct() {
        $this->namespace = 'miusage/v1';
        $this->rest_base = 'users';
        add_action( 'rest_api_init', [$this, 'register_routes'] );
    }

    public function register_routes() {
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base,
            [
                'methods'             => \WP_REST_Server::READABLE,
                'callback'            => [$this, 'fetch_users'],
                'permission_callback' => '__return_true'
            ]
        );
    }

    public function fetch_users( $request ) {
        if ( ! empty( $request['number'] ) ) {
            if ( empty( get_option( 'miusage_users' ) ) ) {
                $response = ! ( wp_remote_get( 'https://miusage.com/v1/challenge/1/' ) instanceof WP_Error ) ? wp_remote_get( 'https://miusage.com/v1/challenge/1/' ) : '';
                $body     = ! empty( wp_remote_retrieve_body( $response ) ) ? (array) json_decode( wp_remote_retrieve_body( $response ) )->data->rows : '';
                $data     = array_slice( $body, 0, $request['number'] );
                add_option( 'miusage_users', $body );
            } else {
                $body = get_option( 'miusage_users' );
                $data = array_slice( $body, 0, $request['number'] );
            }
            return $data;
        }
    }
}