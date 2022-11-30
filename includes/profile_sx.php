<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh; width:100%; padding-top:400px; margin-bottom:400px">
	<form method="post" action="function/toUpdate1.php" enctype="multipart/form-data" onsubmit="return toCheck()"class="d-flex flex-column justify-content-center" style="width: 400px; ">
		<h1 style="margin-bottom: 20px;">Profile information</h1>
		<div class="form-group">
			<label>First Name</label>
			<input type="text" name="first" class="form-control" value="<?php echo $first?>" style="margin-bottom: 10px;" id="fname1" required>
			<div class="msg1" id="message1"></div>
		</div>
		<div class="form-group">
			<label>Last Name</label>
			<input type="text" name="last" class="form-control" value="<?php echo $last?>" style="margin-bottom: 10px;" id="lname1" required>
			<div class="msg2" id="message2"></div>
		</div>
		<div class="form-group">
			<label>Middle Initial</label>
			<input type="text" name="mid" class="form-control" value="<?php echo $mid?>" style="margin-bottom: 10px;" id="mname1" required>
			<div class="msg3" id="message3"></div>
		</div>
		<div class="form-group">
			<label>Student Number</label>
			<input type="text" name="studno" class="form-control" value="<?php echo $studno?>" style="margin-bottom: 10px;" id="studno1" required>
			<div class="msg4" id="message4"></div>
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="user" autocomplete="nope" class="form-control" value="<?php echo $usern?>" style="margin-bottom: 10px;" id="username1" required>
			<div class="msg5" id="message5"></div>
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="pass" autocomplete="nope" class="form-control" value="<?php echo $p?>" style="margin-bottom: 20px;" id="pass1" required>
			<div class="msg6" id="message6"></div>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control" value="<?php echo $email?>" style="margin-bottom: 10px;" id="email1" required>
			<div class="msg7" id="message7"></div>
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

		<div class="form-floating">
            <select class="form-select" name="college" id="col" required="">
			<div class="msg10" id="message10"></div>
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
        </div>

		<div class="form-floating">
            <select class="form-select" name="course" id="course" required>
			<div class="msg11" id="message11"></div>
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
        </div>

		<div class="form-floating">
            <select class="form-select" name="year" id="year" required>
			<div class="msg12" id="message12"></div>
                <option value="" selected disabled>Select Year</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
            </select>
            <label for="floatingSelect">Year</label>
        </div>

		<div class="form-floating">
            <select class="form-select" name="section" id="section" required>
			<div class="msg13" id="message13"></div>
                <option value="" selected disabled>Select Section</option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
				<option value="E">E</option>
				<option value="F">F</option>
				<option value="G">G</option>
				<option value="H">H</option>
				<option value="I">I</option>
				<option value="J">J</option>
				<option value="K">K</option>
				<option value="L">L</option>
				<option value="M">M</option>
				<option value="N">N</option>
				<option value="O">O</option>
				<option value="P">P</option>
				<option value="Q">Q</option>
				<option value="R">R</option>
				<option value="S">S</option>
				<option value="T">T</option>
				<option value="U">U</option>
				<option value="V">V</option>
				<option value="W">W</option>
				<option value="X">X</option>
				<option value="Y">Y</option>
				<option value="Z">Z</option>
				<option value="Other">Other</option>
            </select>
            <label for="floatingSelect">Section</label>
        </div>

		<button type="submit" class="btn btn-primary" id="btn1">Update</button>
	</form>
</div>