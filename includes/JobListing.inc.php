<?php
// ---------- //
# Page Functions

// Instantiate a new DB class object
$DBFunctions = new HCWM_Job_Postings;

// Get all location catagories
$Jobs = $DBFunctions->GetJobPostings();

for($i = 0; $i < sizeof($Jobs); $i++){
	echo "Name: " . gform_get_meta($Jobs[$i]['EntryID'],'1') . "<br>";
}

?>