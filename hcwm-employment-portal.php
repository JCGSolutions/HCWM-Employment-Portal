<?php
/*
	Plugin Name: HCWM Employment Portal
	Plugin URI: NA
	Description: Plugin to add the employment portal / management to the HCWM web site
	Author: JCG Solutions, LLC.
	Version: 0.5.1
	Author URI: https://jcgsolutions.com
	License: GPL2
	GitHub Plugin URI: JCGSolutions/HCWM-Employment-Portal
*/

### START NEW TABLE ### 
// table name: hcwm_job_postings (find and replace on this)
// Added to uninstall.php: FALSE

// Version information - used for WP to check if there is a database schema to be updated
global $tbl_hcwm_job_postings_db_version;
$tbl_hcwm_job_postings_db_version = '1.0';

function Create_tbl_hcwm_job_postings () {
	// Set global variables
	global $wpdb;  
	global $tbl_hcwm_job_postings_db_version;
	global $tbl_hcwm_job_postings_db_alter;
	
	// Set function variables
	$installed_ver = get_option("tbl_hcwm_job_postings_db_version");
	$table_name = $wpdb->prefix . "hcwm_job_postings";
	$charset_collate = $wpdb->get_charset_collate();
	
	// Set up the create table SQL
	$SQL = "CREATE TABLE $table_name (
		RecordID int(1) NOT NULL AUTO_INCREMENT,
		Organization varchar(255),
		Contact varchar(50),
		ContactEmail varchar(50),
		ContactPhone varchar(15),
		Job varchar(50),
		StartDate datetime,
		EndDate datetime,
		Wage decimal(10,2),
		Dexcription varchar(Max),
		Approved bit,
		UNIQUE KEY RecordID (RecordID)
	) $charset_collate;";
	
	// Set database options to record versioning
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($SQL);
	
	// Add table options
	add_option('tbl_hcwm_job_postings_db_version', $tbl_hcwm_job_postings_db_version);
	
	// This if statement if used if the versioning is different than the saved version.  If true, it will update the database schema
	// !IMPORTANT: ALL LINES EXCEPT 'UNIQUE KEY' NEED TO END WITH AN ',' UNLESS THERE ARE KEYS, THEN THE 'UNIQUE KEY' NEEDS AN ','
	if ($installed_ver != $tbl_hcwm_job_postings_db_version) {
		// Update database versioning
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($SQL);
		update_option("tbl_hcwm_job_postings_db_version", $tbl_hcwm_job_postings_db_version);
	}
}

// Call function to create table(s)
register_activation_hook( __FILE__, 'Create_tbl_hcwm_job_postings');

// Call functions to check for DB update
function hcwm_job_postings_update_db_check() {
	// Set global variables
	global $tbl_hcwm_job_postings_db_version;
	
	// If versioning is different then call function to update the table
	if (get_site_option('tbl_hcwm_job_postings_db_version') != $tbl_hcwm_job_postings_db_version) {
		Create_tbl_hcwm_job_postings();
	}
}
	
// Add WP action to check the database versioning when the plugin is loaded
add_action('plugins_loaded', 'hcwm_job_postings_update_db_check' );
		
### END NEW TABLE ###


// Hook for adding admin menus
add_action('admin_menu', 'hcwm_employment_pages');

// action function for above hook
function hcwm_employment_pages() {

	$MenuSlug = "HCWM_Employment";	// The slug name to refer to this menu by (should be unique for this menu).
	
	// NOTE: THIS IS ALSO THE PAGE LINK FOR THE FIRST MENU
	
	// Add top level menu
	$PageTitle = "HCWM Employment Management";				// The text to be displayed in the title tags of the page when the menu is selected (tab text).
	$MenuTitle = "Employment"; 			// The on-screen name text for the menu.
	$Function = "HCWM_Employment_Management";			// The function that displays the page content for the menu page.
	$Icon = "dashicons-editor-table";	// The menu icon
	
	add_menu_page($PageTitle, $MenuTitle, 'manage_options', $MenuSlug, $Function, $Icon);
}



// Add page content
function HCWM_Employment_Management() {
	include "includes/Management.inc.php";
}



// Job Listing Shortcode
function hcwm_Job_Listing() {
	ob_start();	// This function compiles the include and transforms it into a string to be echoed out correctly
		include "includes/JobListing.inc.php";
	return ob_get_clean();
}

add_shortcode("hcwm-job-listing", "hcwm_Job_Listing");



// Job Listing Shortcode
function hcwm_Job_Form() {
	ob_start();	// This function compiles the include and transforms it into a string to be echoed out correctly
		include "includes/JobForm.inc.php";
	return ob_get_clean();
}

add_shortcode("hcwm-job-form", "hcwm_Job_Form");



// ===== Class to handle database interactions ===== //
class HCWM_Job_Postings{

	function GetJobPostings(){

		global $wpdb;
		$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		$Table = $wpdb->prefix . "hcwm_job_postings";

		$SQL = "SELECT RecordID FROM $Table";
		$STMT = $db->prepare($SQL);
		$STMT->execute();
		$STMT->bind_result($RecordID);

		$JobListing = array();

		while($STMT->fetch()){
			$JobListing[] = array(
				'RecordID' => $RecordID);
		}

		return $JobListing;

		$STMT->close();

	}

}
?>