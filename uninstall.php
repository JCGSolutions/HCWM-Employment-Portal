<?php

// Set table name #1
$table_name = $wpdb->prefix . 'hcwm_job_postings';

// drop the table from the database.
$wpdb->query("DROP TABLE IF EXISTS $table_name");

?>