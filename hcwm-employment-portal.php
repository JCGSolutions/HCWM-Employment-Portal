<?php
/*
	Plugin Name: HCWM Employment Portal
	Plugin URI: NA
	Description: Plugin to add the employment portal / management to the HCWM web site
	Author: JCG Solutions, LLC.
	Version: 0.0.0
	Author URI: https://jcgsolutions.com
	License: GPL2
	GitHub Plugin URI: JCGSolutions/HCWM-Employment-Portal
*/

// Hook for adding admin menus
add_action('admin_menu', 'hcwm_employment_pages');

// action function for above hook
function hcwm_employment_pages() {

	$MenuSlug = "HCWM_Employment";	// The slug name to refer to this menu by (should be unique for this menu).
	
	// NOTE: THIS IS ALSO THE PAGE LINK FOR THE FIRST MENU
	
	// Add top level menu
	$PageTitle = "Employment";				// The text to be displayed in the title tags of the page when the menu is selected (tab text).
	$MenuTitle = "HCEM Emplyment Management"; 			// The on-screen name text for the menu.
	$Function = "HCWM_Employment";			// The function that displays the page content for the menu page.
	$Icon = "dashicons-editor-table";	// The menu icon
	
	add_menu_page($PageTitle, $MenuTitle, 'manage_options', $MenuSlug, $Function, $Icon);
}

// Add page content
function HCWM_Employment() {
	include "includes/Management.inc.php";
}
?>