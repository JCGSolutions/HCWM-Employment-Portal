<?php

	define( 'SHORTINIT', true );

	$Organziation = $_POST['hcwm_Organizations'];

	global $wpdb;

	$Table = $wpdb->prefix . "jcgsol_eco_change_log";

	// Insert change event
	$wpdb->insert($Table, array(
		'Organization' => $Organziation)
	);

?>