<?php

class Todolist_Deactivator {

	
	public static function deactivate() {
		global $wpdb;
		$table_name = 'wp_tasks';
		$sql = "DROP TABLE IF EXISTS $table_name";
		$wpdb->query($sql);
	}

}
