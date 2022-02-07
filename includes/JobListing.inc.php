<style>
	.HCWM-Listing-Wrapper {
		width: 100%;
		border-color: black;
		border-style: solid;
		border-width: 1px;
		margin-bottom: 5px;
	}

	.HCWM-Listing-Wrapper:after {
		content: "";
		display: table;
		clear: both;
	}

	.HCWM-Listing-Col1 {
		width: 40%;
		float: left;
	}

	.HCWM-Listing-Col2 {
		width: 30%;
		float: left;
	}

	.HCWM-Listing-Col3 {
		width: 20%;
		float: left;
	}

	.HCWM-Listing-Col4 {
		width: 10%;
		float: left;
	}

	.HCWM-Detail-Title {
		font-size: 1.2em;
		font-weight: bold;
		color: #585858;
	}

	.HCWM-Detail-Company {
		font-size: 1em;
		font-weight: bold;
		color: #808080;
		padding-left: 10px;
	}

</style>

<?php

// Instantiate a new DB class object
$DBFunctions = new HCWM_Job_Postings;

// Get all job postings
$Entries = $DBFunctions->HCWM_GF_Entries();

for($i = 0; $i < sizeof($Entries); $i++){
	echo "<div class='HCWM-Listing-Wrapper'>";
		echo "<div class='HCWM-Listing-Col1'>";
			echo "<span class='HCWM-Detail-Title'>" . $Entries[$i][7] . "</span><br><span class='HCWM-Detail-Company'>" . $Entries[$i][18] . "</span>";
		echo "</div>";
		
		echo "<div class='HCWM-Listing-Col2'>";
			echo $Entries[$i][8];
		echo "</div>";

		echo "<div class='HCWM-Listing-Col3'>";
			echo date_format($Entries[$i][14],"Y/m/d");
		echo "</div>";

		echo "<div class='HCWM-Listing-Col4'>";
			echo "<a href='https://sandbox.jcgsolutions.com/job-details/?Entry=" . $Entries[$i]['id'] . "'>View Job</a>";
		echo "</div>";

	echo "</div>";
}

?>