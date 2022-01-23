<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 

#######################################################################
##
## Remove custom meta
##
#######################################################################

$option_name = 'hcwm_employment_gf_link';
delete_option($option_name);

$option_name = 'hcwm_employment_jobListing_sort';
delete_option($option_name);

$option_name = 'hcwm_employment_jobDetails_URL';
delete_option($option_name);

?>