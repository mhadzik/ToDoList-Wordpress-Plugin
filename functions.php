<?php


// add_action( 'wp_enqueue_scripts', 'wp734_register_scripts' );
// function wp734_register_scripts() {
//     wp_register_script( 
// 	    'custom-script', 
// 	    get_stylesheet_directory_uri() . '/src/js/ajaxCalls.js', 
// 	    array( 'jquery' ) 
//     );

//     wp_localize_script( 
//         'custom-script', 
//         'OBJ', 
//         array( 'ajaxurl' => admin_url( 'admin-ajax.php' ))
//     );

//     wp_enqueue_script('custom-script');
// }

// add_action( 'wp_ajax_my_ajax_action', 'wp343_handle_ajax' );
// add_action( 'wp_ajax_nopriv_my_ajax_action', 'wp343_handle_ajax' );
// function wp343_handle_ajax() {}


add_action( "wp_ajax_myaction", "so_wp_ajax_function" );
add_action( "wp_ajax_nopriv_myaction", "so_wp_ajax_function" );
function so_wp_ajax_function(){
  //DO whatever you want with data posted
  //To send back a response you have to echo the result!
  echo $_POST['name'];
  echo $_POST['age'];
  wp_die(); // ajax call must die to avoid trailing 0 in your response
}







?>