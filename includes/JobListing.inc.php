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

// Get all location catagories
$Jobs = $DBFunctions->GetJobPostings();

for($i = 0; $i < sizeof($Jobs); $i++){
	echo "<div class='HCWM-Listing-Wrapper'>";
		echo "<div class='HCWM-Listing-Col1'>";
			echo "<span class='HCWM-Detail-Title'>" . $Jobs[$i]['Job Title'] . "</span><br><span class='HCWM-Detail-Company'>" . $Jobs[$i]['Company'] . "</span>";
		echo "</div>";
		
		echo "<div class='HCWM-Listing-Col2'>";
			echo $Jobs[$i]['Location'];
		echo "</div>";

		echo "<div class='HCWM-Listing-Col3'>";
			echo date_format($Jobs[$i]['Posting Close Date'],"Y/m/d");
		echo "</div>";

		echo "<div class='HCWM-Listing-Col4'>";
			echo "<a href='https://sandbox.jcgsolutions.com/job-details/?Entry=" . $Jobs[$i]['EntryID'] . "'>View Job</a>";
		echo "</div>";

	echo "</div>";
}

?>