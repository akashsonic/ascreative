<?php

if ( ! function_exists( "as_custom_scripts" ) ) {
	function as_custom_scripts() {
		$theme_url = get_template_directory_uri();
		 wp_enqueue_script('jquery', true );
		wp_register_script( 'as-custom-js',  $theme_url . '/lib/js/as-custom-script.js', array( 'jquery' ), 1.0, true );
		wp_register_script( 'as-bootstrap-js',  $theme_url . '/lib/js/bootstrap.min.js', array( 'jquery' ), 1.0 );
		wp_register_script( 'as-cycle-js',  $theme_url . '/lib/js/jquery.cycle.all.js', array( 'jquery' ), 1.0,true );
		
		
		wp_enqueue_script('as-custom-js');
		wp_enqueue_script('as-bootstrap-js');
		wp_enqueue_script('as-cycle-js');
	}
}

add_action( 'wp_enqueue_scripts', 'as_custom_scripts' );

add_action('wp_enqueue_scripts', 'load_scripts');

function load_scripts() {

    if (!is_admin()) {
        wp_register_script('modernizr', get_bloginfo('template_directory') .'/scripts/modernizr-latest.js',false);
        wp_enqueue_script('modernizr');

        wp_enqueue_script('jquery', true );

        wp_register_script('cookie',get_bloginfo('template_directory') . '/scripts/cookie.js', array('jquery'), '1.0',true);
        wp_enqueue_script('cookie');

        wp_register_script( 'Gmaps', 'http://maps.google.com/maps/api/js?sensor=false', true );
        wp_enqueue_script ('Gmaps');

        wp_register_script('plugins', get_bloginfo('template_directory') .'/scripts/plugins.js',true);
        wp_enqueue_script('plugins');

        wp_register_script( 'maps_scripts',  get_bloginfo('template_directory') . '/scripts/maps.js', array('Gmaps'), '1.0', true );
        wp_enqueue_script ('maps_scripts');

        wp_register_script('history', get_bloginfo('template_directory') .'/scripts/history.js', array('jquery'), '1.0',true);
        wp_enqueue_script('history');


    }
}