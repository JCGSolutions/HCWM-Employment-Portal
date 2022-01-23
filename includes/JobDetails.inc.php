<style>

.HCWM-Detail-Wrapper {
	width: 100%;
	font-size: 1.2em;
}

.HCWM-Detail-Title {
	font-size: 1.4em;
	font-weight: bold;
	color: #585858;
}

.HCWM-Detail-Label {
	font-size: 1em;
	font-weight: bold;
	color: #808080;
}

.HCWM-Detail-Company {
	font-weight: bold;
	color: #585858;
}

.HCWM-Detail-Wrapper fieldset {
	border-style: solid;
	border-width: 1px;
	border-color: #C0C0C0;
	padding: 5px;
	margin-top: 15px;
	margin: 15px 0px 15px 0px;
	border-radius: 5px;
}

.HCWM-Detail-Wrapper fieldset legend {
	font-size: 1em;
	font-style: italic;
	padding-left: 5px;
}

</style>

<?php

// Get entry ID
$Entry = $_GET['Entry'];

// Instantiate a new DB class object
$DBFunctions = new HCWM_Job_Postings;

// Get all location catagories
$Jobs = $DBFunctions->GetJobDetails($Entry);

echo "<div class='HCWM-Detail-Wrapper'>";
	echo "<span class='HCWM-Detail-Title'>" . $Jobs['Job Title'] . "</span><br>";
	echo $Jobs['Type'] . " &#8226; " . $Jobs['Location'] . "<hr>";
	echo "<span class='HCWM-Detail-Label'>Job Closing Date:</span> " . date_format(date_create($Jobs['Posting Close Date']),"n/j/y") . "<br>";
	echo "<span class='HCWM-Detail-Label'>Compensation:</span> " . $Jobs['Wage'];

	echo "<fieldset>";
		echo "<legend>Job Description</legend>";
		echo $Jobs['Description'];
	echo "</fieldset>";

	echo "<span class='HCWM-Detail-Label'>Start Date:</span> " . date_format(date_create($Jobs['Start Date']),"n/j/y") . "<br>";
	echo "<span class='HCWM-Detail-Label'>End Date:</span> " . date_format(date_create($Jobs['End Date']),"n/j/y");

	echo "<fieldset>";
		echo "<legend>How to Apply</legend>";
		echo $Jobs['Apply'];
	echo "</fieldset>";

	echo $Jobs['File'];
	echo $Jobs['Application'];
	echo "<br>&nbsp;";

	echo "<hr>";
	echo "<span class='HCWM-Detail-Company'>" . $Jobs['Company'] . "</span>";

	echo "<fieldset>";
		echo "<legend>Company Description</legend>";
		echo $Jobs['CompanyDescription'];
	echo "</fieldset>";

	echo $Jobs['CompanyPhone'] . " &#8226; <a href='" . $Jobs['Website'] . "' target='_blank'>" . $Jobs['Website'] . "</a>";
	echo $Jobs['CompanyAddress'];
echo "</div>";

?>