<?php

/**
 * Fired during plugin deactivation
 *
 * @link       mhadzik
 * @since      1.0.0
 *
 * @package    Todolist
 * @subpackage Todolist/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Todolist
 * @subpackage Todolist/includes
 * @author     mhadzik <mhadzik@gmail.com>
 */
class Todolist_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		global $wpdb;
		$table_name = 'wp_tasks';
		$sql = "DROP TABLE IF EXISTS $table_name";
		$wpdb->query($sql);
	}

}
