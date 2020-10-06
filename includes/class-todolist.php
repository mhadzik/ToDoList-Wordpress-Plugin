<?php
 
class Todolist {

	
	public function __construct() {
		if ( defined( 'TODOLIST_VERSION' ) ) {
			$this->version = TODOLIST_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'todolist';

		
	}
	
	
	private function define_admin_hooks() {
		

		wp_enqueue_script( 'frontend-bundle-js', plugins_url( 'admin/public/frontend-bundle.js', __FILE__ ),array('jquery'));

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'admin/public/frontend.css', array() );
		

		wp_localize_script( 'frontend-bundle-js', 'ajax_object', array('ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		
	}

	
	public function run() {
		$this->define_admin_hooks();
	}

}
