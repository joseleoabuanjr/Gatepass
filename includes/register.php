<div class="studentcon--hidden" id="student1">
	<div class="d-flex justify-content-center align-items-center" style="height: 100%;margin-bottom:60px;">
		<form id="f1" method="post" action="function/toRegister.php?id=1" onsubmit="return tocheck1()" enctype="multipart/form-data" style="width: 400px; ">
			<h1 style="margin-bottom: 20px;">Student registration</h1>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="first" id="fst1"class="form-control" placeholder="Enter first name" required>
				<label>First Name</label>
				<div class="msg" id="message1"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="middle" id="mid1" class="form-control" placeholder="Enter middle initial" required>
				<label>M.I. </label>
				<div class="msg" id="message2"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="last" id="lst1" class="form-control" placeholder="Enter last name" required>
				<label>Last Name </label>
				<div class="msg" id="message3"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="studno" id="stud1" class="form-control" placeholder="Enter student no." required>
				<label>Student No.</label>
				<div class="msg" id="message4"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="user" class="form-control" placeholder="Enter username" id="username1" required>
				<label>Username</label>
				<div class="msg" id="message5"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="password" name="pass" id="pass1" class="form-control" placeholder="Enter password" required>
				<label>Password</label>
				<div class="msg" id="message6"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="password" name="pass" id="cpass1" class="form-control" placeholder="Enter confirm password" required>
				<label>Confirm Password</label>
				<div class="msg" id="message7"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="email" id="email1" class="form-control" placeholder="Enter email" required>
				<label>Email </label>
				<div class="msg" id="message8"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="file" name="image" class="form-control" id="img1" style="height: 80px;padding-top:40px; padding-left:40px" onchange="return checkImage1()" required>
				<label>Upload Picture</label>
				<p> -Please select a jpg/jpeg or png file format to upload image to be your profile picture <br> -Image size must be 2x2 only</p>
				<div class="msg" id="message9"></div>
			</div>
			<button type="submit" class="btn btn-primary" id="reg1">Submit</button>
		</form>
	</div>
</div>
<div class="employeecon--hidden" id="employee1">
	<div class="d-flex justify-content-center align-items-center" style="height: 100%;">
		<form id="f2" method="post" action="function/toRegister.php?id=2" onsubmit="return tocheck2()" enctype="multipart/form-data" style="width: 400px">
			<h1 style="margin-bottom: 20px;">Employee registration</h1>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="first" id="fst2" class="form-control" placeholder="Enter first name" required>
				<label>First Name</label>
				<div class="msg" id="message10"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="middle" id="mid2" class="form-control" placeholder="Enter middle initial" required>
				<label>M.I. </label>
				<div class="msg" id="message11"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="last" id="lst2" class="form-control" placeholder="Enter last name" required>
				<label>Last Name </label>
				<div class="msg" id="message12"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="empno" id="emp2" class="form-control" placeholder="Enter student no." required>
				<label>Employee No.</label>
				<div class="msg" id="message13"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="user" id="username2" class="form-control" placeholder="Enter username" required>
				<label>Username</label>
				<div class="msg" id="message14"></div>
			</div>
			<div class="form-floating"  style="margin-bottom: 10px;">
				<input type="password" id="pass2" name="pass" class="form-control" placeholder="Enter password" required>
				<label>Password</label>
				<div class="msg" id="message15"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="password" name="pass" id="cpass2" class="form-control" placeholder="Enter confirm password" required>
				<label>Confirm Password</label>
				<div class="msg" id="message16"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" id="email2" name="email" class="form-control" placeholder="Enter email" required>
				<label>Email </label>
				<div class="msg" id="message17"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="file" name="image" class="form-control" id="img2" style="height: 80px;padding-top:40px; padding-left:40px" onchange="return checkImage2()" required>
				<label>Upload Picture</label>
			</div>
			<div>
				<p> -Please select a jpg/jpeg or png file format to upload image to be your profile picture <br> -Image size must be 2x2 only</p>
				<div class="msg" id="message18"></div>
			</div>
			<div>
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
				<input type="text" name="first" id="fst3" class="form-control" placeholder="Enter first name" required>
				<label>First Name</label>
				<div class="msg" id="message19"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="middle" id="mid3" class="form-control" placeholder="Enter middle initial" required>
				<label>M.I. </label>
				<div class="msg" id="message20"></div>
			</div> 
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="last" id="lst3" class="form-control" placeholder="Enter last name" required>
				<label>Last Name </label>
				<div class="msg" id="message21"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="user" id="username3" class="form-control" placeholder="Enter username" required>
				<label>Username</label>
				<div class="msg" id="message22"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="password" id="pass3" name="pass" class="form-control" placeholder="Enter password" required>
				<label>Password</label>
				<div class="msg" id="message23"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="password" name="pass" id="cpass3" class="form-control" placeholder="Enter confirm password" required>
				<label>Confirm Password</label>
				<div class="msg" id="message24"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="text" name="email" id="email3" class="form-control" placeholder="Enter email" required>
				<label>Email </label>
				<div class="msg" id="message25"></div>
			</div>
			<div class="form-floating" style="margin-bottom: 10px;">
				<input type="file" name="image" class="form-control" id="img3" style="height: 80px;padding-top:40px; padding-left:40px" onchange="return checkImage3()" required>
				<label>Upload Picture</label>
			</div>
			<div>
				<p> -Please select a jpg/jpeg or png file format to upload image to be your profile picture <br> -Image size must be 2x2 only</p>
				<div class="msg" id="message26"></div>
			</div>
			<div>
				<button type="submit" class="btn btn-primary" id="reg3">Submit</button>
			</div>
		</form>
	</div>
</div>