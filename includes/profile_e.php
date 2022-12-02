<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh; width:100%; padding-top:400px; margin-bottom:400px">
	<form method="post" action="function/toUpdate.php" enctype="multipart/form-data" class="d-flex flex-column justify-content-center" style="width: 400px; ">
		<h1 style="margin-bottom: 20px;">Profile Information</h1>
		<div class="form-group">
			<label>First Name</label>
			<input type="text" name="first" class="form-control" value="<?php echo $first?>" style="margin-bottom: 10px;" id="fname1">
			<div class="message1"></div>
		</div>
		<div class="form-group">
			<label>Last Name</label>
			<input type="text" name="last" class="form-control" value="<?php echo $last?>" style="margin-bottom: 10px;" id="lname1">
			<div class="message2"></div>
		</div>
		<div class="form-group">
			<label>Middle Initial (M.I.)</label>
			<input type="text" name="mid" class="form-control" value="<?php echo $mid?>" style="margin-bottom: 10px;" id="mname1">
			<div class="message3"></div>
		</div>
		<div class="form-group">
			<label>Employee Number</label>
			<input type="text" name="empno" class="form-control" value="<?php echo $empno?>" style="margin-bottom: 10px;" id="empno">
			<div class="message4"></div>
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="user" autocomplete="nope" class="form-control" value="<?php echo $usern?>" style="margin-bottom: 10px;" id="username">
			<div class="message5"></div>
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="pass" autocomplete="nope" class="form-control" value="<?php echo $p?>" style="margin-bottom: 20px;" id="pass1">
			<div class="message6"></div>
		</div>
		<div class="form-group">
			<label>Email Address</label>
			<input type="text" name="email" class="form-control" value="<?php echo $email?>" style="margin-bottom: 10px;" id="email1">
			<div class="message7"></div>
		</div>
		<div class="form-group">
			<label>Valid ID Card</label>
			<p>*Please select a jpg/jpeg or png file format to upload for your valid ID card.</p>
			<div class="d-flex">
				<input type="text" name="V_id" class="form-control" value="<?php echo $v_id?>" style="margin-bottom: 10px; margin-right: 10px;" disabled>
				<a class='btn btn-secondary' target="_blank" href='view_vid.php?id=<?php echo $accno?>' style="height:40px;">View</a>
			</div>
		</div>
		<div class="form-group" style="margin-bottom: 10px;">
			<label>Upload Valid ID Card</label>
			<input type="file" name="v_id" class="form-control" id="v_id1" onchange="return checkImage1()">
			<div class="message8"></div>
		</div>
		<div class="form-group">
			<label>Vaccination Card</label>
			<p>*Please select a jpg/jpeg or png file format to upload for your vaccination card.</p>
			<div class="d-flex">
				<input type="text" name="vaxx" class="form-control" value="<?php echo $vax?>" style="margin-bottom: 10px; margin-right: 10px;" disabled>
				<a class='btn btn-secondary' target="_blank" href='viewvax.php?id=<?php echo $accno?>' style="height:40px;">View</a>
			</div>
		</div>
		<div class="form-group" style="margin-bottom: 10px;">
			<label>Upload Vaccination Card</label>
			<input type="file" name="vax" class="form-control" id="vax1" onchange="return checkImage2()">
			<div class="message9"></div>
		</div>
		<button id="btn1" type="submit" class="btn btn-primary">Update</button>
	</form>
</div>