<?php

require "function/connect.php";

$accno = $_SESSION["accno"];
$p = $_SESSION["pass"];
$select = "SELECT * FROM user_account WHERE acc_no = $accno";
$result = mysqli_query($connect, $select);

if ($row = mysqli_fetch_assoc($result)) {
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
	// $vcode = $row['v_code'];
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
$bday = date_format($date, "Y-m-d");
?>

<div id="scrollProfile" class="container">
	<div class="row">
		<div class="col-4">
			<div id="list-example" class="list-group pt-5">
				<a class="list-group-item list-group-item-action" href="#profilePicture">Avatar</a>
				<a class="list-group-item list-group-item-action" href="#personalInfoSection">Personal Information</a>
				<a class="list-group-item list-group-item-action" href="#educationalInfoSection">Educational Information</a>
				<a class="list-group-item list-group-item-action" href="#credential">Credential</a>
				<a class="list-group-item list-group-item-action" href="#account">Account</a>
			</div>
			<button type="submit" class="btn btn-success w-100 mt-2">Save Changes</button>
		</div>
		<div class="col-8">
			<div style="overflow-y: scroll; height: 90vh;" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" tabindex="0" data-bs-offset="56">
				<form method="post" action="function/toupdate_p.php" enctype="multipart/form-data" class="d-flex flex-column justify-content-center w-75">
					<div id="profilePicture" class="pt-5 pb-3">
						<h4>Profile Picture</h4>
						<div class="d-flex justify-content-start">
							<img class="img-thumbnail" width="180px" height="180px" src="data:image;base64,<?php echo ($img); ?>">
							<div>
								<ul>
									<li>Please select a jpg/jpeg or png file format to upload image to be your profile picture</li>
									<li>Image size must be 2x2 only</li>
								</ul>
								<div class="form-floating">
									<input type="file" name="image" class="form-control ms-2" style="height: 80px;padding-top:40px; padding-left:40px" id="img1" accept="image/png, image/jpeg" onchange="return checkImage1()">
									<label>Upload Account Profile Picture</label>
									<div class="msg" id="message"></div>
								</div>
							</div>
						</div>
					</div>
					<div id="personalInfoSection" class="py-3">
						<h4>Personal Information</h4>
						<div class="row row-cols-1 row-cols-md-3 g-2">
							<div class="col">
								<div class="mb-3">
									<label for="firstName" class="form-label">First Name</label>
									<input type="text" class="form-control" name="first" id="firstName" value="<?php echo ($first); ?>" >
								</div>
							</div>
							<div class="col">
								<div class="mb-3">
									<label for="middleName" class="form-label">Middle Initial</label>
									<input type="text" class="form-control" name="middle" id="middleName" value="<?php echo ($mid); ?>" >
								</div>
							</div>
							<div class="col">
								<div class="mb-3">
									<label for="lastName" class="form-label">Last Name</label>
									<input type="text" class="form-control" name="last" id="lastName" value="<?php echo ($last); ?>" >
								</div>
							</div>
						</div>
						<div class="row row-cols-1 row-cols-md-2 g-2">
							<div class="col">
								<div class="mb-3">
									<label for="contact" class="form-label">Contact Number</label>
									<input type="text" class="form-control" name="contact" id="contact" value="<?php echo ($pnum); ?>" >
								</div>
							</div>
							<div class="col">
								<div class="mb-3">
									<label for="dob" class="form-label">Date of Birth</label>
									<input type="date" class="form-control" name="dob" id="dob" value="<?php echo ($bday); ?>" >
								</div>
							</div>
						</div>
						<div class="row row-cols-1 row-cols-md-1 g-2">
							<div class="col">
								<div class="mb-3">
									<label for="address" class="form-label">Address</label>
									<input type="text" class="form-control" name="address" id="address" value="<?php echo ($add); ?>" >
								</div>
							</div>
						</div>
						<div class="row row-cols-1 row-cols-md-2 g-2">
							<div class="col">
								<div class="mb-3">
									<label for="contact_p" class="form-label">Emergency Contact Person</label>
									<input type="text" class="form-control" name="contact_p" id="contact_p" value="<?php echo ($cname); ?>" >
								</div>
							</div>
							<div class="col">
								<div class="mb-3">
									<label for="contact_pnum" class="form-label">Emergency Contact Number</label>
									<input type="text" class="form-control" name="contact_pnum" id="contact_pnum" value="<?php echo ($contnum); ?>" >
								</div>
							</div>
						</div>
					</div>
					<div id="educationalInfoSection" class="py-3">
						<h4>Educational Information</h4>
						<div class="row row-cols-1 row-cols-md-3 g-2">
							<div class="col-md-6">
								<div class="mb-3">
									<label for="studno" class="form-label">Student Number</label>
									<input type="text" class="form-control" name="studno" id="studno" value="<?php echo ($studno); ?>" >
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label for="year" class="form-label">Year</label>
									<select class="form-select mb-3" name="year" required>
										<option value="<?php echo ($col); ?>" selected disabled hidden><?php echo ($yr); ?></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label for="section" class="form-label">Section</label>
									<input type="text" class="form-control" name="section" id="section" value="<?php echo ($sec); ?>" >
								</div>
							</div>
						</div>
						<div class="row row-cols-1 row-cols-md-1 g-2">
							<div class="col">
								<div class="mb-3">
									<label for="college" class="form-label">College</label>
									<select class="form-select mb-3" name="college" >
										<option value="<?php echo ($col); ?>" selected disabled hidden><?php echo ($col); ?></option>
										<option value="College of Architecture and Fine Arts (CAFA)">College of Architecture and Fine Arts (CAFA)</option>
										<option value="College of Arts and Letters (CAL)">College of Arts and Letters (CAL)</option>
										<option value="College of Business Administration (CBA)">College of Business Administration (CBA)</option>
										<option value="College of Criminal Justice Education (CCJE)">College of Criminal Justice Education (CCJE)</option>
										<option value="College of Hospitality and Tourism Management (CHTM)">College of Hospitality and Tourism Management (CHTM)</option>
										<option value="College of Information and Communications Technology (CICT)">College of Information and Communications Technology (CICT)</option>
										<option value="College of Industrial Technology (CIT)">College of Industrial Technology (CIT)</option>
										<option value="College of Law (CLAW)">College of Law (CLAW)</option>
										<option value="College of Nursing (CN)">College of Nursing (CN)</option>
										<option value="College of Engineering (COE)">College of Engineering (COE)</option>
										<option value="College of Education (COED)">College of Education (COED)</option>
										<option value="College of Science (CS)">College of Science (CS)</option>
										<option value="College of Sports Exercise and Recreation (CSER)">College of Sports Exercise and Recreation (CSER)</option>
										<option value="College of Social Sciences and Philosophy (CSSP)">College of Social Sciences and Philosophy (CSSP)</option>
										<option value="Graduate School (GS)">Graduate School (GS)</option>
										<option value="Other">Other</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row row-cols-1 row-cols-md-1 g-2">
							<div class="col">
								<div class="mb-3">
									<label for="course" class="form-label">Course</label>
									<select class="form-select mb-3" name="course" >
										<option value="<?php echo ($course); ?>" selected disabled hidden><?php echo ($course); ?></option>
										<div class="op1" name="College of Architecture and Fine Arts (CAFA)" id="cafa">
											<option class="cafa1--hidden" id="cafa1" value="Bachelor of Science in Architecture">Bachelor of Science in Architecture</option>
											<option class="cafa2--hidden" id="cafa2" value="Bachelor of Landscape Architecture">Bachelor of Landscape Architecture</option>
											<option class="cafa3--hidden" id="cafa3" value="Bachelor of Fine Arts Major in Visual Communication">Bachelor of Fine Arts Major in Visual Communication</option>
										</div>
										<div class="op2" name="College of Arts and Letters (CAL)" id="cal">
											<option class="cal1" id="cal1" value="Bachelor of Arts in Broadcasting">Bachelor of Arts in Broadcasting</option>
											<option class="cal2" id="cal2" value="Bachelor of Arts in Journalism">Bachelor of Arts in Journalism</option>
											<option class="cal3" id="cal3" value="Bachelor of Performing Arts (Theater Track)">Bachelor of Performing Arts (Theater Track)</option>
											<option class="cal4" id="cal4" value="Batsilyer ng Sining sa Malikhaing Pagsulat">Batsilyer ng Sining sa Malikhaing Pagsulat</option>
										</div>
										<div name="College of Business Administration (CBA)" id="cba">
											<option class="cba1" id="cba1" value="Bachelor of Science in Business Administration Major in Business Economics">Bachelor of Science in Business Administration Major in Business Economics</option>
											<option class="cba2" id="cba2" value="Bachelor of Science in Business Administration Major in Financial Management">Bachelor of Science in Business Administration Major in Financial Management</option>
											<option class="cba3" id="cba3" value="Bachelor of Science in Business Administration Major in Marketing Management">Bachelor of Science in Business Administration Major in Marketing Management</option>
											<option class="cba4" id="cba4" value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
											<option class="cba5" id="cba5" value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
										</div>
										<div name="College of Criminal Justice Education (CCJE)" id="ccje">
											<option class="ccje1" id="ccje1" value="Bachelor of Arts in Legal Management">Bachelor of Arts in Legal Management</option>
											<option class="ccje2" id="ccje2" value="College of Social Sciences and Philosophy (CSSP)">Bachelor of Science in Criminology</option>
										</div>
										<div name="College of Hospitality and Tourism Management (CHTM)" id="chtm">
											<option class="chtm1" id="chtm1" value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
											<option class="chtm2" id="chtm2" value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option>
										</div>
										<div name="College of Information and Communications Technology (CICT)" id="cict">
											<option class="cict1" id="cict1" value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
											<option class="cict2" id="cict2" value="Bachelor of Library and Information Science">Bachelor of Library and Information Science</option>
											<option class="cict3" id="cict3" value="Bachelor of Science in Information System">Bachelor of Science in Information System</option>
										</div>
										<div name="College of Industrial Technology (CIT)" id="cit">
											<option class="cit1" id="cit1" value="Bachelor of Industrial Technology with specialization in Automotive">Bachelor of Industrial Technology with specialization in Automotive</option>
											<option class="cit2" id="cit2" value="Bachelor of Industrial Technology with specialization in Computer">Bachelor of Industrial Technology with specialization in Computer</option>
											<option class="cit3" id="cit3" value="Bachelor of Industrial Technology with specialization in Drafting">Bachelor of Industrial Technology with specialization in Drafting</option>
											<option class="cit4" id="cit4" value="Bachelor of Industrial Technology with specialization in Electrical">Bachelor of Industrial Technology with specialization in Electrical</option>
											<option class="cit5" id="cit5" value="Bachelor of Industrial Technology with specialization in Electronics & Communication Technology">Bachelor of Industrial Technology with specialization in Electronics & Communication Technology</option>
											<option class="cit6" id="cit6" value="Bachelor of Industrial Technology with specialization in Electronics Technology">Bachelor of Industrial Technology with specialization in Electronics Technology</option>
											<option class="cit7" id="cit7" value="Bachelor of Industrial Technology with specialization in Food Processing Technology">Bachelor of Industrial Technology with specialization in Food Processing Technology</option>
											<option class="cit8" id="cit8" value="Bachelor of Industrial Technology with specialization in Mechanical">Bachelor of Industrial Technology with specialization in Mechanical</option>
											<option class="cit9" id="cit9" value="Bachelor of Industrial Technology with specialization in Heating, Ventilation, Air Conditioning and Refrigeration Technology (HVACR)">Bachelor of Industrial Technology with specialization in Heating, Ventilation, Air Conditioning and Refrigeration Technology (HVACR)</option>
											<option class="cit10" id="cit10" value="Bachelor of Industrial Technology with specialization in Mechatronics Technology">Bachelor of Industrial Technology with specialization in Mechatronics Technology</option>
											<option class="cit11" id="cit11" value="Bachelor of Industrial Technology with specialization in Welding Technology">Bachelor of Industrial Technology with specialization in Welding Technology</option>
										</div>
										<div name="College of Law (CLAw)" id="claw">
											<option class="claw1" id="claw1" value="Bachelor of Laws">Bachelor of Laws</option>
											<option class="claw2" id="claw2" value="Juris Doctor">Juris Doctor</option>
										</div>
										<div name="College of Nursing (CN)" id="cn">
											<option class="cn1" id="cn1" value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
										</div>
										<div name="College of Engineering (COE)" id="coe">
											<option class="coe1" id="coe1" value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
											<option class="coe2" id="coe2" value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
											<option class="coe3" id="coe3" value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
											<option class="coe4" id="coe4" value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
											<option class="coe5" id="coe5" value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
											<option class="coe6" id="coe6" value="Bachelor of Science in Manufacturing Engineering">Bachelor of Science in Manufacturing Engineering</option>
											<option class="coe7" id="coe7" value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option>
											<option class="coe8" id="coe8" value="Bachelor of Science in Mechatronics Engineering">Bachelor of Science in Mechatronics Engineering</option>
										</div>
										<div name="College of Education (COED)" id="coed">
											<option class="coed1" id="coed1" value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
											<option class="coed2" id="coed2" value="Bachelor of Early Childhood Education">Bachelor of Early Childhood Education</option>
											<option class="coed3" id="coed3" value="Bachelor of Secondary Education Major in English minor in Mandarin">Bachelor of Secondary Education Major in English minor in Mandarin</option>
											<option class="coed4" id="coed4" value="Bachelor of Secondary Education Major in Filipino">Bachelor of Secondary Education Major in Filipino</option>
											<option class="coed5" id="coed5" value="Bachelor of Secondary Education Major in Sciences">Bachelor of Secondary Education Major in Sciences</option>
											<option class="coed6" id="coed6" value="Bachelor of Secondary Education Major in Mathematics">Bachelor of Secondary Education Major in Mathematics</option>
											<option class="coed7" id="coed7" value="Bachelor of Secondary Education Major in Social Studies">Bachelor of Secondary Education Major in Social Studies</option>
											<option class="coed8" id="coed8" value="Bachelor of Secondary Education Major in Values Education">Bachelor of Secondary Education Major in Values Education</option>
											<option class="coed9" id="coed9" value="Bachelor of Physical Education">Bachelor of Physical Education</option>
											<option class="coed10" id="coed10" value="Bachelor of Technology and Livelihood Education Major in Industrial Arts">Bachelor of Technology and Livelihood Education Major in Industrial Arts</option>
											<option class="coed11" id="coed11" value="Bachelor of Technology and Livelihood Education Major in Information and Communication Technology">Bachelor of Technology and Livelihood Education Major in Information and Communication Technology</option>
											<option class="coed12" id="coed12" value="Bachelor of Technology and Livelihood Education Major in Home Economics">Bachelor of Technology and Livelihood Education Major in Home Economics</option>
										</div>
										<div name="College of Science (CS)" id="cs">
											<option class="cs1" id="cs1" value="Bachelor of Science in Biology">Bachelor of Science in Biology</option>
											<option class="cs2" id="cs2" value="Bachelor of Science in Environmental Science">Bachelor of Science in Environmental Science</option>
											<option class="cs3" id="cs3" value="Bachelor of Science in Food Technology">Bachelor of Science in Food Technology</option>
											<option class="cs4" id="cs4" value="Bachelor of Science in Math with Specialization in Computer Science">Bachelor of Science in Math with Specialization in Computer Science</option>
											<option class="cs5" id="cs5" value="Bachelor of Science in Math with Specialization in Applied Statistics">Bachelor of Science in Math with Specialization in Applied Statistics</option>
											<option class="cs6" id="cs6" value="BBachelor of Science in Math with Specialization in Business Applications">Bachelor of Science in Math with Specialization in Business Applications</option>
										</div>
										<div name="College of Sports, Exercise and Recreation (CSER)" id="cser">
											<option class="cser1" id="cser1" value="Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Coaching">Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Coaching</option>
											<option class="cser2" id="cser2" value="Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Management Certificate of Physical Education">Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Management Certificate of Physical Education</option>
										</div>
										<div name="College of Social Sciences and Philosophy (CSSP)" id="cssp">
											<option class="cssp1" id="cssp1" value="Bachelor of Public Administration">Bachelor of Public Administration</option>
											<option class="cssp2" id="cssp2" value="Bachelor of Science in Social Work">Bachelor of Science in Social Work</option>
											<option class="cssp3" id="cssp3" value="Bachelor of Science in Psychology">Bachelor of Science in Psychology</option>
										</div>
										<div name="Graduate School (GS)" id="gs">
											<option class="gs1" id="gs1" value="Doctor of Education">Doctor of Education</option>
											<option class="gs2" id="gs2" value="Doctor of Philosophy">Doctor of Philosophy</option>
											<option class="gs3" id="gs3" value="Doctor of Public Administration">Doctor of Public Administration</option>
											<option class="gs4" id="gs4" value="Master in Physical Education">Master in Physical Education</option>
											<option class="gs5" id="gs5" value="Master in Public Administration">Master in Public Administration</option>
											<option class="gs6" id="gs6" value="Master of Arts in Education">Master of Arts in Education</option>
											<option class="gs7" id="gs7" value="Master of Engineering Program">Master of Engineering Program</option>
											<option class="gs8" id="gs8" value="Master of Industrial Technology Management">Master of Industrial Technology Management</option>
											<option class="gs9" id="gs9" value="Master of Science in Civil Engineering">Master of Science in Civil Engineering</option>
											<option class="gs10" id="gs10" value="Master of Science in Computer Engineering">Master of Science in Computer Engineering</option>
											<option class="gs11" id="gs11" value="Master of Science in Electronics and Communications Engineering">Master of Science in Electronics and Communications Engineering</option>
											<option class="gs12" id="gs12" value="Master of Information Technology">Master of Information Technology</option>
											<option class="gs13" id="gs13" value="Master of Manufacturing Engineering">Master of Manufacturing Engineering</option>
										</div>
										<option value="Other">Other</option>
									</select>
								</div>
							</div>

						</div>
					</div>
					<div id="credential" class="py-3">
						<h4>Credentials</h4>
						<div class="mb-3">
							<h6>Certificate of Registration</h6>
							<div class="input-group mb-1">
								<input type="text" class="form-control" value="<?php echo ($cor); ?>" disabled>
								<a class='btn btn-secondary px-3' target="_blank" href='viewcor.php?id=<?php echo $accno ?>'>View</a>
							</div>
							<div class="form-floating">
								<input type="file" name="cor" accept="application/pdf" class="form-control" id="cor1" style="height: 80px;padding-top:40px; padding-left:40px" required>
								<label>Update Certificate of Registration</label>
								<div class="msg" id="message"></div>
							</div>
						</div>
						<div class="mb-3">
							<h6>Vaccination Card</h6>
							<div class="input-group mb-1">
								<input type="text" class="form-control" value="<?php echo ($vax); ?>" disabled>
								<a class='btn btn-secondary px-3' target="_blank" href='viewvax.php?id=<?php echo $vax ?>'>View</a>
							</div>
							<div class="form-floating">
								<input type="file" name="vax" accept="application/pdf" class="form-control" id="vax1" style="height: 80px;padding-top:40px; padding-left:40px" required>
								<label>Update Vaccination Card</label>
								<div class="msg" id="message"></div>
							</div>
						</div>
						<div class="mb-3">
							<h6>Valid ID Card</h6>
							<div class="input-group mb-1">
								<input type="text" class="form-control" value="<?php echo ($v_id); ?>" disabled>
								<a class='btn btn-secondary px-3' target="_blank" href='view_vid.php?id=<?php echo $v_id ?>'>View</a>
							</div>
							<div class="form-floating">
								<input type="file" name="vid" accept="application/pdf" class="form-control" id="vid1" style="height: 80px;padding-top:40px; padding-left:40px" required>
								<label>Update Valid ID Card</label>
								<div class="msg" id="message"></div>
							</div>
						</div>
					</div>
					<div id="account" class="py-3 mb-5">
						<h4>Account Information</h4>
						<div class="row row-cols-1 row-cols-md-2 g-2">
							<div class="col-md-5">
								<div class="mb-3">
									<label for="user" class="form-label">Username</label>
									<input type="text" class="form-control" name="user" id="user" value="<?php echo ($user); ?>" required>
								</div>
							</div>
							<div class="col-md-7">
								<div class="mb-3">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control" name="email" id="email" value="<?php echo ($email); ?>" required>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label for="pass" class="form-label">Password</label>
							<div class="input-group mb-1">
								<input type="passsword" class="form-control" name="pass">
								<button type="button" class='btn btn-secondary px-3' data-bs-toggle="collapse" data-bs-target="#changePass">Change Password</button>
							</div>
						</div>

						<div id="changePass" class="collapse">
							<div class="row row-cols-1 row-cols-md-2 g-2">
								<div class="col">
									<div class="mb-3">
										<label for="newPassword" class="form-label">New Password</label>
										<input type="password" class="form-control" name="npass" id="newPassword" minlength="8" required disabled>
									</div>
								</div>
								<div class="col">
									<div class="mb-3">
										<label for="confirmPassword" class="form-label">Re-type New Password</label>
										<input type="password" class="form-control" name="npass1" id="confirmPassword" minlength="8" required disabled>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</script>
