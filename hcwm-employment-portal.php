<?php
/*
	Plugin Name: HCWM Employment Portal
	Plugin URI: NA
	Description: Plugin to add the employment portal / management to the HCWM web site
	Author: JCG Solutions, LLC.
	Version: 0.8.0
	Author URI: https://jcgsolutions.com
	License: GPL2
	GitHub Plugin URI: JCGSolutions/HCWM-Employment-Portal
*/

#######################################################################
##
## Add custom meta options
##
#######################################################################

function hcwm_employment_gf_link() {
	// Gravity Forms link
	add_option('hcwm_employment_gf_link', 1); // By default I am setting form #1
}

add_action('plugin_loaded', 'hcwm_employment_gf_link');

function hcwm_employment_jobListing_sort() {
	// Sort job listing
	add_option('hcwm_employment_jobListing_sort', ''); // This is not set yet
}

add_action('plugin_loaded', 'hcwm_employment_jobListing_sort');

function hcwm_employment_jobDetails_URL() {
	// Sort job listing
	add_option('hcwm_employment_jobDetails_URL', ''); // This is not set yet
}

add_action('plugin_loaded', 'hcwm_employment_jobDetails_URL');


#######################################################################
##
## Add admin page (with content)
##
#######################################################################

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


#######################################################################
##
## Create shortcodes
##
#######################################################################

// Job Listing Shortcode
function hcwm_Job_Listing() {
	ob_start();	
		include(plugin_dir_path( __FILE__ ) . 'includes/JobListing.inc.php');
	return ob_get_clean();
}

add_shortcode("hcwm-job-listing", "hcwm_Job_Listing");

// Job Details Shortcode
function hcwm_Job_Details() {
	ob_start();	
		include(plugin_dir_path( __FILE__ ) . 'includes/JobDetails.inc.php');
	return ob_get_clean();
}

add_shortcode("hcwm-job-details", "hcwm_Job_Details");

#######################################################################
##
## Class to handle database interactions
##
#######################################################################

class HCWM_Job_Postings{

	function GetJobPostings(){

		global $wpdb;
		$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		$Table = $wpdb->prefix . "gf_entry_meta";

		$SQL = "SELECT DISTINCT entry_id FROM $Table WHERE form_id = 1";
		$STMT = $db->prepare($SQL);
		$STMT->execute();
		$STMT->bind_result($EntryID);

		$EntryIDs = array();

		while($STMT->fetch()){
			$EntryIDs[] = array(
				'EntryID' => $EntryID);
		}

		$JobListing = array();

		for($i = 0; $i < sizeof($EntryIDs); $i++){
			$JobListing[] = array(
				'EntryID' => $EntryIDs[$i]['EntryID'],
				'Job Title' => gform_get_meta($EntryIDs[$i]['EntryID'],'7'),
				'Company' => gform_get_meta($EntryIDs[$i]['EntryID'],'18'),
				'Location' => gform_get_meta($EntryIDs[$i]['EntryID'],'8'),
				'Posting Close Date' => gform_get_meta($EntryIDs[$i]['EntryID'],'14')
			);
		}

		return $JobListing;

		$STMT->close();

	}

	function GetJobDetails($Entry){

		$JobDetails = array(
			'EntryID' => $Entry,
			'Name' => gform_get_meta($Entry,'2.3') . ' ' . gform_get_meta($Entry,'2.6'),
			'Email' => gform_get_meta($Entry,'3'),
			'Phone' => gform_get_meta($Entry,'4'),
			'Job Title' => gform_get_meta($Entry,'7'),
			'Location' => gform_get_meta($Entry,'8'),
			'Type' => gform_get_meta($Entry,'9'),
			'Posting Close Date' => gform_get_meta($Entry,'14'),
			'Start Date' => gform_get_meta($Entry,'15'),
			'End Date' => gform_get_meta($Entry,'16'),
			'Wage' => gform_get_meta($Entry,'11'),
			'Description' => gform_get_meta($Entry,'10'),
			'Apply' => gform_get_meta($Entry,'27'),
			'File' => gform_get_meta($Entry,'12'),
			'Application' => gform_get_meta($Entry,'13'),
			'Company' => gform_get_meta($Entry,'18'),
			'CompanyDescription' => gform_get_meta($Entry,'24'),
			'CompanyAddress' => gform_get_meta($Entry,'25'),
			'CompanyPhone' => gform_get_meta($Entry,'26'),
			'Website' => gform_get_meta($Entry,'19'),
			'Logo' => gform_get_meta($Entry,'23')
		);

		return $JobDetails;

		$STMT->close();

	}

}

// Register CSS
Function HCWM_inc_CSS(){
	wp_register_style( 'HCWM-Job-CSS', plugins_url('/CSS/Standard.css?' . time(), __FILE__ ),  array(), '1',  'all' );
}

add_action('wp_enqueue_scripts', 'HCWM_inc_CSS');
?>