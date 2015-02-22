<?php
/*
Plugin Name: MetaBox for Link to SSMS Dashboard
Plugin URI: http://www.wordpress.org/plugins/post-views-new
Description: Shows a link to SSMS Dashboard from Edit Post Page
Version: 3.0
Author: Deven Bansod
Author URI: http://www.facebook.com/bansoddeven
License: GPL2
*/
define( 'SSMS_PLUGIN_URL' ,  plugin_dir_url( __FILE__ ) );
define( 'SITE_URL' , get_site_url() );


/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function ssms_add_meta_box() {

    $screens = array( 'post', 'page' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'ssms-dashboard-link',
            __( 'SSMS Dashboard', 'myplugin_textdomain' ),
            'ssms_meta_box_callback',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'ssms_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function ssms_meta_box_callback( $post ) {

    // Add an nonce field so we can check for it later.
    // wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );

    /*
     * Use get_post_meta() to retrieve an existing value
     * from the database and use the value for the form.
     */
    // $value = get_post_meta( $post->ID, '_my_meta_value_key', true );
    $ssms_dashboard = '/ssmsn/dashboard.php';
    echo '<label for="Link to SSMS Dashboard">';
    // _e( 'Go to SSMS Dashboard', 'myplugin_textdomain' );
    echo '</label> ';
    // echo 'Click <a href = "' . get_option('ssms-dashboard') . ' ">here</a> to go to Dashboard';
    echo 'Click <a href = "' . $ssms_dashboard . ' ">here</a> to go to Dashboard';
}


function add_options_ssms_link() {
        
        add_options_page( "SSMS Link" , "SSMS Link" , 1 , "SSMS_link" , "SSMS_link_admin" );
    
}

function SSMS_link_admin() {
    
        include 'admin_SSMS.php';
    
}


add_action( 'admin_menu' , 'add_options_ssms_link');//Adds options page    


?>
