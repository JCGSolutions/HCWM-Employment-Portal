<style>

#HCWM_DIV_Left {
	width: 50%;
	padding-right: 10px;
	float: left;
}

#HCWM_DIV_Right {
	width: 50%;
	padding-left: 10px;
	float: left;
}

#HCWM_DIV_Right:after {
		content: "";
		display: table;
		clear: both;
	}

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
	color: #FFA000;
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
	padding-left: 8px;
	margin-left:  3px;
	margin-right: 3px;
}

</style>

<?php

// Get entry ID
$Entry = $_GET['Entry'];

// Instantiate a new DB class object
$DBFunctions = new HCWM_Job_Postings;

// Get all job details
$Details = $DBFunctions->HCWM_GF_Details($Entry);

echo "<span class='HCWM-Detail-Title'>" . $Details[7] . "</span><br>";
echo "<span class='HCWM-Detail-Label'>Compensation:</span> " . $Details[11] . "<br>";
echo $Details[9] . " &#8226; " . $Details[8] . "<hr>";

echo "<div id='HCWM_DIV_Left'>";
	echo "<span class='HCWM-Detail-Company'>Contact:</span><br>";
	echo "<span class='HCWM-Detail-Label'>Name:</span> " . $Details[2.3] . " " . $Details[2.6] . "<br>";
	echo "<span class='HCWM-Detail-Label'>Email:</span> " . $Details[3] . "<br>";
	echo "<span class='HCWM-Detail-Label'>Phone:</span> " . $Details[4] . "<br>";
	echo "<hr>";
	echo "<span class='HCWM-Detail-Company'>" . $Details[18] . "</span>";

	echo "<fieldset>";
		echo "<legend>&nbsp;Company Description&nbsp;</legend>";
		echo $Details[24];
	echo "</fieldset>";

	echo "<a href='" . $Details[19] . "' target='_blank'>" . $Details[19] . "</a>";
	echo $Details[25];
echo "</div>";

echo "<div id='HCWM_DIV_Right'>";
	echo "<span class='HCWM-Detail-Label'>Start Date:</span> " . date_format(date_create($Details[15]),"n/j/y") . "<br>";
	echo "<span class='HCWM-Detail-Label'>End Date:</span> " . date_format(date_create($Details[16]),"n/j/y");

	echo "<fieldset>";
		echo "<legend>&nbsp;Job Description&nbsp;</legend>";
		echo $Details[10];
	echo "</fieldset>";

	echo "<fieldset>";
		echo "<legend>&nbsp;How to Apply&nbsp;</legend>";
		echo $Details[27];
	echo "</fieldset>";

	echo $Details[12];
	echo $Details[13];
	echo "<br>&nbsp;";
echo "</div>";
?>