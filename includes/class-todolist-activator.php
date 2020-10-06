<?php

class Todolist_Activator {


	public static function activate() {
			global $wpdb;

			$table_name = 'wp_tasks';
			
			$charset_collate = $wpdb->get_charset_collate();
			
			$sql = "CREATE TABLE $table_name (
			 id mediumint(9) NOT NULL AUTO_INCREMENT,
			 task varchar(255),
			 taskStatus BOOLEAN,
			 PRIMARY KEY  (id)
			) $charset_collate;";
			
		   $result = $wpdb->query($sql); 
	}

}
