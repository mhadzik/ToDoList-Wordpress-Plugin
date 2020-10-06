<?php

/**
 * @wordpress-plugin
 * Plugin Name:       To Do List 
 * Author:            mhadzik
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'TODOLIST_VERSION', '1.0.0' );


function activate_todolist() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-todolist-activator.php';
	Todolist_Activator::activate();
}


function deactivate_todolist() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-todolist-deactivator.php';
	Todolist_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_todolist' );
register_deactivation_hook( __FILE__, 'deactivate_todolist' );

require plugin_dir_path( __FILE__ ) . 'includes/class-todolist.php';

function run_todolist() {

	$plugin = new Todolist();
	$plugin->run();
	add_action( 'wp_ajax_tasksList', 'tasksListCallback' );
	add_action( 'wp_ajax_tasksAdd', 'tasksAddCallback' );
	add_action( 'wp_ajax_tasksDelete', 'tasksDeleteCallback' );
	add_action( 'wp_ajax_tasksUpdate', 'tasksUpdateCallback' );


	add_action("admin_menu", "pluginajax_menu");


}

run_todolist();

function pluginajax_menu() {
	add_menu_page("Plugin: To Do List", "Plugin: To Do List","manage_options", "todolist", "todoListDisplay");
 }
 
 function todoListDisplay(){
	include "includes/admin/partials/todolist-admin-display.php";
 }

function tasksListCallback() {
	global $wpdb;
	$response = array();
 
	$response = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_tasks"));
	 
	echo json_encode($response);
	die(); 

 }

 function tasksAddCallback() {
	global $wpdb;
	$wpdb->insert( 'wp_tasks',array( 'task' => $_POST['task'], 'taskStatus' => $_POST['taskStatus']) );
    $status = $wpdb->insert_id;

	$response = array();
 
	$response = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_tasks"));
	 

    echo $status ? json_encode($response) : json_encode(var_dump($wpdb));
	 
	die(); 

 }

 function tasksDeleteCallback() {
	global $wpdb;
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = implode(',', $ids);

            if (!empty($ids)) {
               $wpdb->query("DELETE FROM wp_tasks WHERE id IN($ids)");
            }
        
			$response = array();
 
			$response = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_tasks"));

	echo json_encode($response);

	die(); 
	
 }

 function tasksUpdateCallback() {
	global $wpdb;
	if($_POST['task']){
		$wpdb->update( 'wp_tasks',array( 'task' => $_POST['task']), array('id'=>$_POST['id']) );
		echo json_encode('task updated');
	} else {
		$wpdb->update( 'wp_tasks',array( 'taskStatus' => $_POST['taskStatus']), array('id'=>$_POST['id']) );
		echo json_encode('task status updated');
	} 
	die(); 

 }