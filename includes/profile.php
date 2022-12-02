<?php

	require "function/connect.php";

	$accno = $_SESSION["accno"];
	$p = $_SESSION["pass"];
	$select = "SELECT * FROM user_account WHERE acc_no = $accno";
	$result = mysqli_query($connect, $select);

	while($row = mysqli_fetch_assoc($result)){
		$first = $row['first'];
		$last = $row['last'];
		$mid = $row['middle'];
		$pnum = $row['contact_no'];
		$bday = $row['birthday'];
		$add = $row['address'];
		$cname = $row['cp_name'];
		$contnum = $row['cp_no'];
		$studno = $row['stud_no'];
		$empno = $row['emp_no'];
		$col = $row['college'];
		$course = $row['course'];
		$yr = $row['year'];
		$sec = $row['section'];
		$user = $row['username'];
		$pass = $row['password'];
		$email = $row['email'];
		$type = $row['type'];
		$vcode = $row['v_code'];
		$img = $row['image'];
		$cor = $row['cor'];
		$v_id = $row['valid_id'];
		$vax = $row["vax"];
		$qr = $row['qr'];
		$img = $row['image'];
		$cor = $row['cor'];
		$v_id = $row['valid_id'];
		$vax = $row["vax"];
	}
	$date = date_create($bday);
	$bday = date_format($date, "Y/m/d");
?>
<div class="container d-flex" style="width: 100%; height: 100%; margin-top:100px;">
<h1>Profile Information</h1>
</div>
<div class="container d-flex" style="width: 100%; height: 100%;">
	<div class="d-flex justify-content-start align-items-start flex-column w-25 pt-5">
		<div class="d-flex flex-column w-100 pe-2">
			<button type="button" class="btn btn-primary btn-sm" id="infobtn1" style="margin-bottom:10px;">Information</button>
			<button type="button" class="btn btn-primary btn-sm" id="infobtn2" style="margin-bottom:10px;">Avatar</button>
			<button type="button" class="btn btn-primary btn-sm" id="infobtn3" style="margin-bottom:10px;">Credential</button>
			<button type="button" class="btn btn-primary btn-sm" id="infobtn3" style="margin-bottom:10px;">Account</button>
		</div>
	</div>
	<div class="pf1 pt-5 d-none" style="width:100%">
		<div class="d-flex justify-content-center align-items-center flex-column ms-5 pt-5" style="border:2px black solid; margin-bottom: 40px;">
			<form method="post" action="" enctype="multipart/form-data" class="d-flex flex-column justify-content-center" style="width: 80%; margin-bottom: 40px;">
				<h2>Personal Information</h2>
				<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="first" id="fst1"class="form-control" placeholder="Enter first name" value="<?php echo($first); ?>" required>
				<label>First Name</label>
				<div class="msg" id="message"></div>
				</div>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="text" name="middle" id="mid1" class="form-control" placeholder="Enter middle initial" value="<?php echo($mid); ?>" required>
					<label>M.I. </label>
					<div class="msg" id="message"></div>
				</div>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="text" name="last" id="lst1" class="form-control" placeholder="Enter last name" value="<?php echo($last); ?>" required>
					<label>Last Name </label>
					<div class="msg" id="message"></div>
				</div>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="text" name="contact" id="cont1" class="form-control" placeholder="Enter Phone Number" value="<?php echo($pnum); ?>" required>
					<label>Your Phone Number</label>
					<div class="msg" id="message"></div>
				</div>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="text" name="dob" id="dob" class="form-control" placeholder="Enter Birthday" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" value="<?php echo($bday); ?>" required>
					<label>Birthday</label>
					<div class="msg" id="message"></div>
				</div>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="text" name="address" id="address1" class="form-control" placeholder="Enter Address" value="<?php echo($add); ?>" required>
					<label>Address</label>
					<div class="msg" id="message"></div>
				</div>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="text" name="contact_p" id="cperson1" class="form-control" placeholder="Enter Name of Contact Person" value="<?php echo($cname); ?>" required>
					<label>Name of Contact Person</label>
					<div class="msg" id="message"></div>
				</div>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="text" name="contact_pnum" id="contp1" class="form-control" placeholder="Enter Phone Number of Contact Person" value="<?php echo($contnum); ?>" required>
					<label>Phone Number of Contact Person</label>
					<div class="msg" id="message"></div>
				</div>
				<h2>School Information</h2>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="text" name="studno" id="stud1" class="form-control" placeholder="Enter student no." value="<?php echo($studno); ?>" required>
					<label>Student No.</label>
					<div class="msg" id="message"></div>
				</div>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="text" name="college" id="col" class="form-control" value="<?php echo($col); ?>" required>
					<label>College</label>
					<div class="msg" id="message"></div>
				</div>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="text" name="course" id="course" class="form-control" value="<?php echo($course); ?>" required>
					<label>Course</label>
					<div class="msg" id="message"></div>
				</div>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="text" name="year" id="year" class="form-control" value="<?php echo($yr); ?>" required>
					<label>Course</label>
					<div class="msg" id="message"></div>
				</div>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="text" name="section" class="form-control" placeholder="Enter username" id="section" value="<?php echo($sec); ?>" required>
					<label>Section</label>
					<div class="msg13" id="message"></div>
				</div>
				<div class="d-flex justify-content-end" style="width:100%;padding-top:10px;">
					<button type="submit" id="btn1" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
	<div class="pf2 pt-5 d-none" style="width:100%">
		<div class="d-flex justify-content-center align-items-center flex-column ms-5 pt-5" style="border:2px black solid; margin-bottom: 40px;">
			<form method="post" action="" enctype="multipart/form-data" class="d-flex flex-column justify-content-center" style="width: 80%; margin-bottom: 40px;">
				<h2>Change your Avatar</h2>
				<div class="d-flex">
					<div style="width:30%; margin:20px;">
						<img class="img-thumbnail" src="data:image;base64,<?php echo($img); ?>">
					</div>
					<div class="d-flex flex-column">
						<p style="margin: 20px;"> -Please select a jpg/jpeg or png file format to upload image to be your profile picture <br> -Image size must be 2x2 only</p>
						<div class="form-floating" style="margin-bottom: 10px;">
							<input type="file" name="image" class="form-control" id="img1" style="height: 80px;padding-top:40px; padding-left:40px" accept="image/png, image/jpeg" onchange="return checkImage1()" required>
							<label>Upload Picture</label>
							<div class="msg" id="message"></div>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-end" style="width:100%;padding-top:10px;">
					<button type="submit" id="btn2" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
	<div class="pf3 pt-5 d-none" style="width:100%">
		<div class="d-flex justify-content-center align-items-center flex-column ms-5 pt-5" style="border:2px black solid; margin-bottom: 40px;">
			<form method="post" action="" enctype="multipart/form-data" class="d-flex flex-column justify-content-center" style="width: 80%; margin-bottom: 40px;">
				<h2>Credentials</h2>
				<div style="width: 80%; margin-left:20px;">
					<div class="form-group">
						<h5>Certificate of Registration(CoR)</h5>
						<div class="d-flex">
							<input type="text" name="CoR" class="form-control" value="<?php echo ($cor);?>" style="margin-bottom: 10px; margin-right: 10px;" disabled id="cor">
							<a class='btn btn-secondary' target="_blank" href='viewcor.php?id=<?php echo $accno?>' style="height:40px;">View</a>
						</div>
					</div>
					<div class="form-floating" style="margin-bottom: 10px;">
						<input type="file" name="cor" accept="application/pdf" class="form-control" id="cor1" style="height: 80px;padding-top:40px; padding-left:40px" required>
						<label>Certificate of Registration(CoR)</label>
						<div class="msg" id="message"></div>
					</div>
					<div class="form-group">
						<h5>Vaccination Card</h5>
						<div class="d-flex">
							<input type="text" name="vaxx" class="form-control" value="<?php echo ($vax); ?>" style="margin-bottom: 10px; margin-right: 10px;" disabled id="vaxx">
							<a class='btn btn-secondary' target="_blank" href='viewvax.php?id=<?php echo $accno?>' style="height:40px;">View</a>
						</div>
					</div>
					<div class="form-floating" style="margin-bottom: 10px;">
						<input type="file" name="vax" class="form-control" id="vax1"style="height: 80px;padding-top:40px; padding-left:40px" accept="application/pdf" required>
						<label>Vaccination Card</label>
						<div class="msg" id="message"></div>
					</div>
					<div class="form-group">
						<h5>Valid ID</h5>
						<div class="d-flex">
							<input type="text" name="V_id" class="form-control" value="<?php echo ($v_id);?>" style="margin-bottom: 10px; margin-right: 10px;" disabled>
							<a class='btn btn-secondary' target="_blank" href='view_vid.php?id=<?php echo $accno?>' style="height:40px;">View</a>
						</div>
					</div>
					<div class="form-floating" style="margin-bottom: 10px;">
						<input type="file" name="vid" class="form-control" id="vid1" style="height: 80px;padding-top:40px; padding-left:40px" accept="application/pdf" required>
						<label>Valid ID</label>
						<div class="msg" id="message"></div>
					</div>
				</div>
				<div class="d-flex justify-content-end" style="width:100%;padding-top:10px;">
					<button type="submit" id="btn3" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
	<div class="pf4 pt-5 " style="width:100%">
		<div class="d-flex justify-content-center align-items-center flex-column ms-5 pt-5" style="border:2px black solid; margin-bottom: 40px;">
			<form method="post" action="" enctype="multipart/form-data" class="d-flex flex-column justify-content-center" style="width: 80%; margin-bottom: 40px;">
				<h2>Account Information</h2>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="text" name="user" class="form-control" id="username1" value="<?php echo ($user);?>" disabled>
					<label>Username</label>
					<div class="msg" id="message"></div>
				</div>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="password" name="pass" id="pass1" class="form-control"  value="<?php echo ($p);?>" disabled>
					<label>Password</label>
					<div class="msg" id="message"></div>
				</div>
				<div class="form-floating" style="margin-bottom: 10px;">
					<input type="text" name="email" id="email1" class="form-control" value="<?php echo ($email);?>" >
					<label>Email </label>
					<div class="msg" id="message"></div>
				</div>
				<div class="d-flex justify-content-end" style="width:100%;padding-top:10px;">
					<button type="submit" id="btn2" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>