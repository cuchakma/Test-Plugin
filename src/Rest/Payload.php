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
            $number   = $request['number'];
            $response = wp_remote_get( 'https://miusage.com/v1/challenge/1/' );
            $data     = ! empty( $response['body'] ) ? json_decode( $response['body'] ) : '';
            $rows     = ! empty( $data->data->rows ) ? array_slice( (array) $data->data->rows, 0, $number ) : '';
            return $rows;
        }
    }
}