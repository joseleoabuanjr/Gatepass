<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh; width:100%; padding-top:400px; margin-bottom:400px">
	<form method="post" action="function/toUpdate1.php" enctype="multipart/form-data" onsubmit="return toCheck()"class="d-flex flex-column justify-content-center" style="width: 400px; ">
		<h1 style="margin-bottom: 20px;">Profile information</h1>
		<div class="form-floating" style="margin-bottom: 10px;">
			<input type="file" name="image" class="form-control" id="img1" style="height: 80px;padding-top:40px; padding-left:40px" onchange="return checkImage1()" required>
			<label>Upload Picture</label>
			<p> -Please select a jpg/jpeg or png file format to upload image to be your profile picture <br> -Image size must be 2x2 only</p>
			<div class="msg" id="message9"></div>
		</div>
		<div class="form-group">
			<label>Certificate of Registration(CoR)</label>
			<div class="d-flex">
				<input type="text" name="CoR" class="form-control" value="<?php echo $cor?>" style="margin-bottom: 10px; margin-right: 10px;" disabled id="cor">
				
				<a class='btn btn-secondary' target="_blank" href='viewcor.php?id=<?php echo $accno?>' style="height:40px;">View</a>
			</div>
		</div>
		<div class="form-group" style="margin-bottom: 10px;">
			<label>Upload Certificate of Registration(CoR)</label>
			<input type="file" name="cor" accept="application/pdf" class="form-control" id="cor1" onchange="return checkImage1()" required>
			<div class="msg8" id="message8"></div>
		</div>
		<div class="form-group">
			<label>Vaccination Card</label>
			<div class="d-flex">
				<input type="text" name="vaxx" class="form-control" value="<?php echo $vax?>" style="margin-bottom: 10px; margin-right: 10px;" disabled id="vaxx">
	
				<a class='btn btn-secondary' target="_blank" href='viewvax.php?id=<?php echo $accno?>' style="height:40px;">View</a>
			</div>
		</div>
		<div class="form-group" style="margin-bottom: 10px;">
			<label>Upload Vaccination Card</label>
			<input type="file" name="vax" class="form-control" id="vax1" onchange="return checkImage2()" required>
			<div class="msg9" id="message9"></div>
		</div>
		<button type="submit" class="btn btn-primary" id="btn1">Update</button>
	</form>
</div>