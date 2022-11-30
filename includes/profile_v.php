<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh; width:100%; padding-top:400px; margin-bottom:400px">
	<form method="post" action="function/toUpdate1.php" enctype="multipart/form-data" class="d-flex flex-column justify-content-center" style="width: 400px; ">
		<h1 style="margin-bottom: 20px;">Profile information</h1>
		<div class="form-group">
			<label>First Name</label>
			<input type="text" id="fname" name="first" class="form-control" value="<?php echo $first?>" style="margin-bottom: 10px;" required>
			<div class="msg1" id="message1"></div>
		</div>
		<div class="form-group">
			<label>Last Name</label>
			<input type="text" id="lname" name="last" class="form-control" value="<?php echo $last?>" style="margin-bottom: 10px;" required>
			<div class="msg2" id="message2"></div>
		</div>
		<div class="form-group">
			<label>Middle Initial</label>
			<input type="text" id="mname" name="mid" class="form-control" value="<?php echo $mid?>" style="margin-bottom: 10px;" required>
			<div class="msg3" id="message3"></div>
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" id="username" name="user" autocomplete="nope" class="form-control" value="<?php echo $usern?>" style="margin-bottom: 10px;" required>
			<div class="msg4" id="message4"></div>
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" id="pass" name="pass" autocomplete="nope" class="form-control" value="<?php echo $p?>" style="margin-bottom: 20px;" required>
			<div class="msg5" id="message5"></div>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" id="email" name="email" class="form-control" value="<?php echo $email?>" style="margin-bottom: 10px;" required>
			<div class="msg6" id="message6"></div>
		</div>
		<div class="form-group">
			<label>Valid ID</label>
			<div class="d-flex">
				<input type="text" name="V_id" class="form-control" value="<?php echo $v_id?>" style="margin-bottom: 10px; margin-right: 10px;" disabled>
				<a class='btn btn-secondary' target="_blank" href='view_vid.php?id=<?php echo $accno?>' style="height:40px;">View</a>
			</div>
		</div>
		<div class="form-group" style="margin-bottom: 10px;">
			<label>Upload Valid ID</label>
			<input type="file" name="v_id" class="form-control" id="v_id1" required>
			<div class="msg7" id="message7"></div>
		</div>
		<div class="form-group">
			<label>Vaccination Card</label>
			<div class="d-flex">
				<input type="text" name="vaxx" class="form-control" value="<?php echo $vax?>" style="margin-bottom: 10px; margin-right: 10px;" disabled>
				<a class='btn btn-secondary' target="_blank" href='viewvax.php?id=<?php echo $accno?>' style="height:40px;">View</a>
			</div>
		</div>
		<div class="form-group" style="margin-bottom: 10px;">
			<label>Upload Vaccination Card</label>
			<input type="file" name="vax" class="form-control" id="vax1" required>
			<div class="msg8" id="message8"></div>
		</div>
		<button type="submit" id="btn1" class="btn btn-primary">Update</button>
	</form>
</div>