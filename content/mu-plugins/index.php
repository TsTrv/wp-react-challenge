<?php

/**
 * Enable CORS during API init phase.
 */
add_action( 'rest_api_init', function() {
        
    /**
     * Allow all origins as this project is purely for testing purposes.
     */
    $calblack = function( $value ) {
        header( 'Access-Control-Allow-Origin: *' );
        header( 'Access-Control-Allow-Methods: GET' );
        header( 'Access-Control-Allow-Credentials: true' );
    
        return $value;
    };

	remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
	add_filter( 'rest_pre_serve_request', $calblack);

}, 15 );
