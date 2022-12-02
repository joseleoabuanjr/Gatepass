<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
	<form method="post" action="function/toLogin.php" class="d-flex flex-column justify-content-center" onsubmit="return validate()" style="width: 400px;">
		<h1 style="margin-bottom: 20px;">Login</h1>
		<div class="msg" id="msgboth">Invalid Username or Password</div>
		<div class="form-floating"  style="margin-bottom: 10px;">
			<input type="text" name="username" id="userlog" class="form-control" placeholder="Enter username">
			<label>Username</label>
		<div class="msg" id="msguser"></div>
		</div>
		<div class="form-floating" style="margin-bottom: 10px;">
			<input type="password" name="password" id="passlog"
			class="form-control" placeholder="Enter password" >
			<label>Password</label>
		<div class="msg" id="msgpass"></div>
			<a href="">Forgot Password?</a>
		</div>
			<button type="submit" class="btn btn-primary" id="logbtn" style="margin-top: 20px;">Submit</button>
	</form>
</div>



