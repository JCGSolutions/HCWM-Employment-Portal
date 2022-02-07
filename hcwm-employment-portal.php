<?php
/*
	Plugin Name: HCWM Employment Portal
	Plugin URI: NA
	Description: Plugin to add the employment portal / management to the HCWM web site
	Author: JCG Solutions, LLC.
	Version: 0.9.1
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
## Class to Gravity Forms job information
##
#######################################################################

class HCWM_Job_Postings{

	function HCWM_GF_Entries(){

		$Search_Criteria = array( 'key' => '28', 'value' => 'Yes' );

		$Search_Criteria = array(
    	'status'        => 'active',
      'field_filters' => array(
      	array(
        	'key'   => '28',
          'value' => 'Yes',
        ),

        array(
        	'key'		=> '14',
        	'operator' => '>=',
        	'value'	=> date('Y-m-d'),
        ),
      )
    );

		$Entries = GFAPI::get_entries(2,$Search_Criteria);

		return $Entries;
	}

	function HCWM_GF_Details($EntryID){

		$Details = GFAPI::get_entry($EntryID);

		return $Details;
	}

}

// Register CSS
Function HCWM_inc_CSS(){
	wp_register_style( 'HCWM-Job-CSS', plugins_url('/CSS/Standard.css?' . time(), __FILE__ ),  array(), '1',  'all' );
}

add_action('wp_enqueue_scripts', 'HCWM_inc_CSS');
?>