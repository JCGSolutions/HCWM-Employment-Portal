<style>
	.HCWM-Control-100,
	.HCWM-Control-75, 
	.HCWM-Control-50,
	.HCWM-Control-25 {
	}

	.HCWM-Control-100 {
		width: 100%;
	}

	.HCWM-Control-75 {
		width: 75%;
	}

	.HCWM-Control-50 {
		width: 50%;
	}

	.HCWM-Control-25 {
		width: 25%;
	}

</style>

<form id="frmHCWMJobPostings" action="<?php echo plugins_url('../Scripts/PHP/insert.php', __FILE__); ?>">
	<label class="HCWM-Control HCWM-Control-100">Organization:<br><input type="text" name="hcwm_Organizations"></label><br>
	<label class="HCWM-Control-100">Contact:<br><input type="text" name="hcwm_Organizations"></label><br>
	<label class="HCWM-Control-25">Phone:<br><input type="text" name="hcwm_Organizations"></label><br>
	<label class="HCWM-Control-75">Email:<br><input type="text" name="hcwm_Organizations"></label><br>
	<label class="HCWM-Control-100">Job:<br><input type="text" name="hcwm_Organizations"></label><br>
	<label class="HCWM-Control-100">Description:<br><input type="text" name="hcwm_Organizations"></label><br>
	<label class="HCWM-Control-50">Wage:<br><input type="text" name="hcwm_Organizations"></label><br>
	<label class="HCWM-Control-25">Start Date:<br><input type="text" name="hcwm_Organizations"></label><br>
	<label class="HCWM-Control-25">End Date:<br><input type="text" name="hcwm_Organizations"></label><br>
	<label class="HCWM-Control-25">Apply Date:<br><input type="text" name="hcwm_Organizations"></label><br>
	<label class="HCWM-Control-25">Close Date:<br><input type="text" name="hcwm_Organizations"></label>
	<input type="submit">
</form>