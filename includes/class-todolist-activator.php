<?php

/**
 * Fired during plugin activation
 *
 * @link       mhadzik
 * @since      1.0.0
 *
 * @package    Todolist
 * @subpackage Todolist/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Todolist
 * @subpackage Todolist/includes
 * @author     mhadzik <mhadzik@gmail.com>
 */
class Todolist_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
			global $wpdb;

			$table_name = 'wp_tasks';
			
			$charset_collate = $wpdb->get_charset_collate();
			
			$sql = "CREATE TABLE $table_name (
			 id mediumint(9) NOT NULL AUTO_INCREMENT,
			 Task varchar(255),
			 TaskStatus BOOLEAN,
			 PRIMARY KEY  (id)
			) $charset_collate;";
			
		   $result = $wpdb->query($sql); 
	}

}
