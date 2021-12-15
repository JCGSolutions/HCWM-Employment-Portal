<?php
// ---------- //
# Page Functions

// Instantiate a new DB class object
$DBFunctions = new HCWM_Job_Postings;

// Get all location catagories
$Jobs = $DBFunctions->GetJobPostings();

print_r($Jobs);

?>