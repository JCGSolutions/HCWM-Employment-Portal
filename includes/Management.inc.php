<style>
	.HCWM_ManagementWrapper {
		width: 100%;
		padding-bottom: 3px;
	}

	.HCWM_DivLeft {
		width: 125px;
		text-align: left;
		font-weight: bold;
		float: left;
	}

	.HCWM_DivRight {
		width: 400px;
		text-align: left;
		float: left;
	}

	.HCWM_ManagementWrapper:after {
		content: "";
		display: table;
		clear: both;
	}

.HCWM_ManagementHeader {
	font-size: 1.5em;
	font-weight: bold;
}

.HCWM_ManagementTitle {
	font-size: 1.3em;
	font-weight: bold;
}

</style>

<span class="HCWM_ManagementHeader">HCWM Management</span><br>
<a href="<?php echo plugins_url('../version control.txt', __FILE__ ) ?>" target="_blank">Version History</a>
<hr>

<span class="HCWM_ManagementTitle">Configuration</span><br>&nbsp;

<div class="HCWM_ManagementWrapper">
	<div class="HCWM_DivLeft">Gravity Form ID:</div>
	<div class="HCWM_DivRight"><input id="HCWm_GF_ID" type="textbox" style="width: 35px; text-align: center;" value="" disabled></div>
</div>

<div class="HCWM_ManagementWrapper">
	<div class="HCWM_DivLeft">Job Detail URL:</div>
	<div class="HCWM_DivRight"><input id="HCWM_GF_DetailURL" type="textbox" style="width: 97%;" disabled><br>
		<span>Enter without the leading '/' and trailing '/'
	</div>
</div>

<div class="HCWM_ManagementWrapper">
	<div class="HCWM_DivLeft">Sort job listings by:</div>
	<div class="HCWM_DivRight">(in development)</div>
</div>
<hr>

<span class="HCWM_ManagementTitle">Shortcodes</span><br>
*Place these shortcodes in a text box in your wbsite to be used.<br>&nbsp;

<div class="HCWM_ManagementWrapper">
	<div class="HCWM_DivLeft">Gravity Form</div>
	<div class="HCWM_DivRight">[gravityform id="1" title="false" description="false" ajax="true"]</div>
</div>

<div class="HCWM_ManagementWrapper">
	<div class="HCWM_DivLeft">Job Listings:</div>
	<div class="HCWM_DivRight">[hcwm-job-listing]</div>
</div>

<div class="HCWM_ManagementWrapper">
	<div class="HCWM_DivLeft">Job Details</div>
	<div class="HCWM_DivRight">[hcwm-job-details]</div>
</div>
<hr>
Click here to download an XML copy of the form<br>