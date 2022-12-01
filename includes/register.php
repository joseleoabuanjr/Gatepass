<div class="studentcon" id="student1">
	<div class="d-flex justify-content-center align-items-center" style="height: 100%;margin-bottom:60px;">
		<form id="f1" method="post" action="function/toRegister.php?id=1" onsubmit="return tocheck1()" enctype="multipart/form-data" style="width: 400px; ">
			<h1 style="margin-bottom: 20px;">Student registration</h1>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="first" id="fst1"class="form-control" placeholder="Enter first name" required>
				<label>First Name</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="middle" id="mid1" class="form-control" placeholder="Enter middle initial" required>
				<label>M.I. </label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="last" id="lst1" class="form-control" placeholder="Enter last name" required>
				<label>Last Name </label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="contact" id="cont1" class="form-control" placeholder="Enter Phone Number" required>
				<label>Your Phone Number</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="contact_p" id="cperson1" class="form-control" placeholder="Enter Name of Contact Person" required>
				<label>Name of Contact Person</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="contact_pnum" id="contp1" class="form-control" placeholder="Enter Phone Number of Contact Person" required>
				<label>Phone Number of Contact Person</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="studno" id="stud1" class="form-control" placeholder="Enter student no." required>
				<label>Student No.</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<select class="form-select" name="college" id="col" required="">
					<option value="" selected disabled>Select College</option>
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
				<label for="floatingSelect">College</label>
				<div class="msg10" id="message"></div>
			</div>

			<div class="form-floating" style="margin-bottom: 10px;">
				<select class="form-select" name="course" id="course" required>
					<option value="" selected disabled>Select Course</option>
					<div class ="op1" name = "College of Architecture and Fine Arts (CAFA)" id="cafa">
						<option class="cafa1--hidden" id="cafa1" value="Bachelor of Science in Architecture">Bachelor of Science in Architecture</option>
						<option class="cafa2--hidden" id="cafa2"value="Bachelor of Landscape Architecture">Bachelor of Landscape Architecture</option>
						<option class="cafa3--hidden" id="cafa3"value="Bachelor of Fine Arts Major in Visual Communication">Bachelor of Fine Arts Major in Visual Communication</option>
					</div>
					<div class ="op2" name = "College of Arts and Letters (CAL)" id="cal">
						<option class="cal1" id="cal1" value="Bachelor of Arts in Broadcasting">Bachelor of Arts in Broadcasting</option>
						<option class="cal2" id="cal2"value="Bachelor of Arts in Journalism">Bachelor of Arts in Journalism</option>
						<option class="cal3" id="cal3" value="Bachelor of Performing Arts (Theater Track)">Bachelor of Performing Arts (Theater Track)</option>
						<option class="cal4" id="cal4" value="Batsilyer ng Sining sa Malikhaing Pagsulat">Batsilyer ng Sining sa Malikhaing Pagsulat</option>
					</div>
					<div name = "College of Business Administration (CBA)" id="cba">
						<option class="cba1" id="cba1" value="Bachelor of Science in Business Administration Major in Business Economics">Bachelor of Science in Business Administration Major in Business Economics</option>
						<option class="cba2" id="cba2" value="Bachelor of Science in Business Administration Major in Financial Management">Bachelor of Science in Business Administration Major in Financial Management</option>
						<option class="cba3" id="cba3" value="Bachelor of Science in Business Administration Major in Marketing Management">Bachelor of Science in Business Administration Major in Marketing Management</option>
						<option class="cba4" id="cba4" value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
						<option class="cba5" id="cba5" value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
					</div>
					<div name = "College of Criminal Justice Education (CCJE)" id="ccje">
						<option class="ccje1" id="ccje1" value="Bachelor of Arts in Legal Management">Bachelor of Arts in Legal Management</option>
						<option class="ccje2" id="ccje2" value="College of Social Sciences and Philosophy (CSSP)">Bachelor of Science in Criminology</option>
					</div>
					<div name = "College of Hospitality and Tourism Management (CHTM)" id="chtm">
						<option class="chtm1" id="chtm1" value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
						<option class="chtm2" id="chtm2" value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option>
					</div>
					<div name = "College of Information and Communications Technology (CICT)" id="cict">
						<option class="cict1" id="cict1" value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
						<option class="cict2" id="cict2" value="Bachelor of Library and Information Science">Bachelor of Library and Information Science</option>
						<option class="cict3" id="cict3" value="Bachelor of Science in Information System">Bachelor of Science in Information System</option>
					</div>
					<div name = "College of Industrial Technology (CIT)" id="cit">
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
					<div name = "College of Law (CLAw)" id="claw">
						<option class="claw1" id="claw1" value="Bachelor of Laws">Bachelor of Laws</option>
						<option class="claw2" id="claw2" value="Juris Doctor">Juris Doctor</option>
					</div>
					<div name = "College of Nursing (CN)" id="cn">
						<option class="cn1" id="cn1" value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
					</div>
					<div name = "College of Engineering (COE)" id="coe">
						<option class="coe1" id="coe1" value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
						<option class="coe2" id="coe2" value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
						<option class="coe3" id="coe3" value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
						<option class="coe4" id="coe4" value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
						<option class="coe5" id="coe5" value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
						<option class="coe6" id="coe6" value="Bachelor of Science in Manufacturing Engineering">Bachelor of Science in Manufacturing Engineering</option>
						<option class="coe7" id="coe7" value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option>
						<option class="coe8" id="coe8" value="Bachelor of Science in Mechatronics Engineering">Bachelor of Science in Mechatronics Engineering</option>
					</div>
					<div name = "College of Education (COED)" id="coed">
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
					<div name = "College of Science (CS)" id="cs">
						<option class="cs1" id="cs1" value="Bachelor of Science in Biology">Bachelor of Science in Biology</option>
						<option class="cs2" id="cs2" value="Bachelor of Science in Environmental Science">Bachelor of Science in Environmental Science</option>
						<option class="cs3" id="cs3" value="Bachelor of Science in Food Technology">Bachelor of Science in Food Technology</option>
						<option class="cs4" id="cs4" value="Bachelor of Science in Math with Specialization in Computer Science">Bachelor of Science in Math with Specialization in Computer Science</option>
						<option class="cs5" id="cs5" value="Bachelor of Science in Math with Specialization in Applied Statistics">Bachelor of Science in Math with Specialization in Applied Statistics</option>
						<option class="cs6" id="cs6" value="BBachelor of Science in Math with Specialization in Business Applications">Bachelor of Science in Math with Specialization in Business Applications</option>
					</div>
					<div name = "College of Sports, Exercise and Recreation (CSER)" id="cser">
						<option class="cser1" id="cser1" value="Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Coaching">Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Coaching</option>
						<option class="cser2" id="cser2" value="Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Management Certificate of Physical Education">Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Management Certificate of Physical Education</option>
					</div>
					<div name = "College of Social Sciences and Philosophy (CSSP)" id="cssp">
						<option class="cssp1" id="cssp1" value="Bachelor of Public Administration">Bachelor of Public Administration</option>
						<option class="cssp2" id="cssp2" value="Bachelor of Science in Social Work">Bachelor of Science in Social Work</option>
						<option class="cssp3" id="cssp3" value="Bachelor of Science in Psychology">Bachelor of Science in Psychology</option>
					</div>
					<div name = "Graduate School (GS)" id="gs">
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
				<label for="floatingSelect">Course</label>
				<div class="msg11" id="message"></div>
			</div>

			<div class="form-floating" style="margin-bottom: 10px;">
				<select class="form-select" name="year" id="year" required>
				<div class="msg12" id="message"></div>
					<option value="" selected disabled>Select Year</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
				<label for="floatingSelect">Year</label>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="section" class="form-control" placeholder="Enter username" id="section" required>
				<label>Section</label>
				<div class="msg13" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="user" class="form-control" placeholder="Enter username" id="username1" required>
				<label>Username</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="password" name="pass" id="pass1" class="form-control" placeholder="Enter password" required>
				<label>Password</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="password" name="cpass" id="cpass1" class="form-control" placeholder="Enter confirm password" required>
				<label>Confirm Password</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="email" id="email1" class="form-control" placeholder="Enter email" required>
				<label>Email </label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="file" name="image" class="form-control" id="img1" style="height: 80px;padding-top:40px; padding-left:40px" accept="image/png, image/jpeg" onchange="return checkImage1()" required>
				<label>Upload Picture</label>
				<p> -Please select a jpg/jpeg or png file format to upload image to be your profile picture <br> -Image size must be 2x2 only</p>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="file" name="cor" accept="application/pdf" class="form-control" id="cor1" style="height: 80px;padding-top:40px; padding-left:40px" onchange="return checkImage1()" required>
				<label>Certificate of Registration(CoR)</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="file" name="vax" class="form-control" id="vax1"style="height: 80px;padding-top:40px; padding-left:40px" accept="application/pdf" onchange="return checkImage2()" required>
				<label>Vaccination Card</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="file" name="vid" class="form-control" id="vid1" style="height: 80px;padding-top:40px; padding-left:40px" accept="application/pdf" onchange="return checkImage3()" required>
				<label>Valid ID</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="d-grid gap-2">
				<button type="submit" class="btn btn-primary" id="reg1">Submit</button>
			</div>
		</form>
	</div>
</div>
<div class="employeecon--hidden" id="employee1">
	<div class="d-flex justify-content-center align-items-center" style="height: 100%;">
		<form id="f2" method="post" action="function/toRegister.php?id=2" onsubmit="return tocheck2()" enctype="multipart/form-data" style="width: 400px">
			<h1 style="margin-bottom: 20px;">Employee registration</h1>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="first" id="fst1"class="form-control" placeholder="Enter first name" required>
				<label>First Name</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="middle" id="mid1" class="form-control" placeholder="Enter middle initial" required>
				<label>M.I. </label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="last" id="lst1" class="form-control" placeholder="Enter last name" required>
				<label>Last Name </label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="contact" id="cont1" class="form-control" placeholder="Enter Phone Number" required>
				<label>Your Phone Number</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="contact_P" id="contp1" class="form-control" placeholder="Enter Name of Contact Person" required>
				<label>Name of Contact Person</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="contact_pnum" id="contp1" class="form-control" placeholder="Enter Phone Number of Contact Person" required>
				<label>Phone Number of Contact Person</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="empno" id="empno1" class="form-control" placeholder="Enter student no." required>
				<label>Employee No.</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="user" class="form-control" placeholder="Enter username" id="username1" required>
				<label>Username</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="password" name="pass" id="pass1" class="form-control" placeholder="Enter password" required>
				<label>Password</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="password" name="pass" id="cpass1" class="form-control" placeholder="Enter confirm password" required>
				<label>Confirm Password</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="email" id="email1" class="form-control" placeholder="Enter email" required>
				<label>Email </label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="file" name="image" class="form-control" id="img1" style="height: 80px;padding-top:40px; padding-left:40px" onchange="return checkImage1()" required>
				<label>Upload Picture</label>
				<p> -Please select a jpg/jpeg or png file format to upload image to be your profile picture <br> -Image size must be 2x2 only</p>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="file" name="vax" class="form-control" id="vax1"style="height: 80px;padding-top:40px; padding-left:40px" accept="application/pdf" onchange="return checkImage2()" required>
				<label>Vaccination Card</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="file" name="vid" class="form-control" id="vid1" style="height: 80px;padding-top:40px; padding-left:40px" accept="application/pdf" onchange="return checkImage3()" required>
				<label>Valid ID</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="d-grid gap-2" >
				<button type="submit" class="btn btn-primary" id="reg2">Submit</button>
			</div>
		</form>
	</div>
</div>
<div class="visitorcon--hidden" id="visitor1">
	<div class="d-flex justify-content-center align-items-center" style="height: 100%;">
		<form id="f3" method="post" action="function/toRegister.php?id=3" onsubmit="return tocheck3()" enctype="multipart/form-data" style="width: 400px">
			<h1 style="margin-bottom: 20px;">Visitor registration</h1>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="first" id="fst1"class="form-control" placeholder="Enter first name" required>
				<label>First Name</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="middle" id="mid1" class="form-control" placeholder="Enter middle initial" required>
				<label>M.I. </label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="last" id="lst1" class="form-control" placeholder="Enter last name" required>
				<label>Last Name </label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="contact" id="cont1" class="form-control" placeholder="Enter Phone Number" required>
				<label>Your Phone Number</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="contact_P" id="contp1" class="form-control" placeholder="Enter Name of Contact Person" required>
				<label>Name of Contact Person</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="contact_pnum" id="contp1" class="form-control" placeholder="Enter Phone Number of Contact Person" required>
				<label>Phone Number of Contact Person</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="user" class="form-control" placeholder="Enter username" id="username1" required>
				<label>Username</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="password" name="pass" id="pass1" class="form-control" placeholder="Enter password" required>
				<label>Password</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="password" name="pass" id="cpass1" class="form-control" placeholder="Enter confirm password" required>
				<label>Confirm Password</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="email" id="email1" class="form-control" placeholder="Enter email" required>
				<label>Email </label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="file" name="image" class="form-control" id="img1" style="height: 80px;padding-top:40px; padding-left:40px" onchange="return checkImage1()" required>
				<label>Upload Picture</label>
				<p> -Please select a jpg/jpeg or png file format to upload image to be your profile picture <br> -Image size must be 2x2 only</p>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="file" name="vax" class="form-control" id="vax1"style="height: 80px;padding-top:40px; padding-left:40px" accept="application/pdf" onchange="return checkImage2()" required>
				<label>Vaccination Card</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="file" name="vid" class="form-control" id="vid1" style="height: 80px;padding-top:40px; padding-left:40px" accept="application/pdf" onchange="return checkImage3()" required>
				<label>Valid ID</label>
				<div class="msg" id="message"></div>
			</div>
			<div class="d-grid gap-2">
				<button type="submit" class="btn btn-primary" id="reg3">Submit</button>
			</div>
		</form>
	</div>
</div>