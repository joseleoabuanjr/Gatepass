<!doctype html>
<html>
	<head>
		<title>Registration Information</title>
	</head>
	<body>
		<?php
		session_start();
			$id=$_GET['id'];
			$_SESSION["passw"] = $_POST["pass"];

			//include qr api
			require_once "../phpqrcode/qrlib.php";

			//db connection
			require_once "connect.php";
			
			if($id== 1){
				$accnum="";
				$user = $_POST["user"];
				$pass = md5($_POST["pass"]);
				$email = $_POST["email"];
				$studno = $_POST["studno"];
				$acctype = "student";
				$first = $_POST["first"];
				$mid = $_POST["middle"];
				$last = $_POST["last"];
				$img = base64_encode(file_get_contents(addslashes($_FILES["image"]["tmp_name"])));
				
				$type = "1";//form type = Student;
				$y = date("Y");//get year today;
				$y = substr( $y, -2);//last digits on year;
				$prefix= $y.$type ;// concatinate $y and $type;
				$default = $prefix."000001";//default value for acc_no;

				$text = $studno; //Only the student number will  be saved in the QR Code;
				//If you want every information be stored in the QR Code use the code below instead;
				
				$path = '../Images/'; //name of folder where to store all QR Images
				$file = $path.$studno.".png"; //format of filename for each QR Images created. Ex: Images/2022123456.png;
				QRcode::png($text, $file, 'L', 5, 2); //generates QR Images, Parameters are (Text Contents, File Name, ECC, QRSize, FrameSize);

				//concat( 1st str, 2nd str); concatinate two string;
				//lpad(string,lenght,addstring); to add string on the left of original string;
				//substring(string, start, lenght); extract lpad(string) to coalesce(stringvalue);
				//coalesce(null,$default); return to the first not null value;
				//max(column name of table); returns to latest increment value;
				
				$select = "SELECT CONCAT($prefix,LPAD(SUBSTRING(COALESCE(MAX(acc_no),$default),6,6)+1,6,'0')) FROM user_account WHERE type= '$acctype';";
				$result = mysqli_query($connect,$select);
				while($row = mysqli_fetch_assoc($result)){
					//pass the current value of acc_no from database table for the new registered account;
					//convert to integer before passing of value;
					$num1 = (int)$row["CONCAT($prefix,LPAD(SUBSTRING(COALESCE(MAX(acc_no),$default),6,6)+1,6,'0'))"];
				}
				$select = "SELECT CONCAT($prefix,LPAD(SUBSTRING(COALESCE(MAX(acc_no),$default),6,6)+1,6,'0')) FROM acc_temp WHERE type= '$acctype';";
				$result = mysqli_query($connect,$select);
				while($row = mysqli_fetch_assoc($result)){
					//pass the current value of acc_no from database table for the new registered account;
					//convert to integer before passing of value;
					$num2 = (int)$row["CONCAT($prefix,LPAD(SUBSTRING(COALESCE(MAX(acc_no),$default),6,6)+1,6,'0'))"];
				}
				if($num1 < $num2){
					$accnum = $num2;
				}
				else if($num1 > $num2){
					$accnum = $num1;
				}else{
					$accnum = $num1;
				}
				$gcode = rand(10,99).rand(10,99).rand(10,99);		//generate verification code;

				//uppercase first letter
				$first = ucfirst(lcfirst($first));
				$last = ucfirst(lcfirst($last));
				$mid = ucfirst(lcfirst($mid));
					
				$insert = "INSERT INTO acc_temp (acc_no,username,password,email,stud_no,type,first,middle,last,v_code,image,qr) VALUES ('$accnum','$user','$pass','$email','$studno','$acctype','$first','$mid','$last','$gcode','$img','$file')";
				if(mysqli_query($connect,$insert))
				{
					require "toSendverif.php";
				}
				else
				{
					echo "<script>alert('Register Failed.')</script>";	
				}
				mysqli_close($connect);
			}
			else if($id==2){
				$accnum="";
				$user = $_POST["user"];
				$pass = md5($_POST["pass"]);
				$email = $_POST["email"];
				$empno = $_POST["empno"];
				$acctype = "employee";
				$first = $_POST["first"];
				$mid = $_POST["middle"];
				$last = $_POST["last"];
				$img = base64_encode(file_get_contents(addslashes($_FILES["image"]["tmp_name"])));
				
				$type = "2";//form type = Employee;
				$y = date("Y");//get year today;
				$y = substr( $y, -2);//last digits on year;
				$prefix= $y.$type;// concatinate $y and $type;
				$default = $prefix."000000";//default value for acc_no;
				$text = $empno; //Only the student number will  be saved in the QR Code;
				//If you want every information be stored in the QR Code use the code below instead;
				
				$path = '../Images/'; //name of folder where to store all QR Images
				$file = $path.$empno.".png"; //format of filename for each QR Images created. Ex: Images/2022123456.png;
				QRcode::png($text, $file, 'L', 5, 2); //generates QR Images, Parameters are (Text Contents, File Name, ECC, QRSize, FrameSize);
			
				//concat( 1st str, 2nd str); concatinate two string;
				//lpad(string,lenght,addstring); to add string on the left of original string;
				//substring(string, start, lenght); extract lpad(string) to coalesce(stringvalue);
				//coalesce(null,$default); return to the first not null value;
				//max(column name of table); returns to latest increment value;
				$select = "SELECT CONCAT($prefix,LPAD(SUBSTRING(COALESCE(MAX(acc_no),$default),6,6)+1,6,'0')) FROM user_account WHERE type= '$acctype';";
				$result = mysqli_query($connect,$select);
				while($row = mysqli_fetch_assoc($result)){
					//pass the current value of acc_no from database table for the new registered account;
					//convert to integer before passing of value;
					$num1 = (int)$row["CONCAT($prefix,LPAD(SUBSTRING(COALESCE(MAX(acc_no),$default),6,6)+1,6,'0'))"];
				}
				$select = "SELECT CONCAT($prefix,LPAD(SUBSTRING(COALESCE(MAX(acc_no),$default),6,6)+1,6,'0')) FROM acc_temp WHERE type= '$acctype';";
				$result = mysqli_query($connect,$select);
				while($row = mysqli_fetch_assoc($result)){
					//pass the current value of acc_no from database table for the new registered account;
					//convert to integer before passing of value;
					$num2 = (int)$row["CONCAT($prefix,LPAD(SUBSTRING(COALESCE(MAX(acc_no),$default),6,6)+1,6,'0'))"];
				}
				if($num1 < $num2){
					$accnum = $num2;
				}
				else if($num1 > $num2){
					$accnum = $num1;
				}else{
					$accnum = $num1;
				}
				
				$gcode = rand(10,99).rand(10,99).rand(10,99);	//generate verification code;

				//uppercase first letter
				$first = ucfirst(lcfirst($first));
				$last = ucfirst(lcfirst($last));
				$mid = ucfirst(lcfirst($mid));

				//insert value to selected database table
				$insert = "INSERT INTO acc_temp (acc_no,username,password,email,emp_no,type,first,middle,last,v_code,image,qr)VALUES ('$accnum','$user','$pass','$email','$empno','$acctype','$first','$mid','$last','$gcode','$img','$file')";

				if(mysqli_query($connect,$insert))
				{
					require "toSendverif.php";
				}
				else
				{
					echo "<script>alert('Register Failed.')</script>";	
				}
				mysqli_close($connect);
			}
			else if($id==3){
				$accnum="";
				$user = $_POST["user"];
				$pass = md5($_POST["pass"]);
				$email = $_POST["email"];
				$acctype = "visitor";
				$first = $_POST["first"];
				$mid = $_POST["middle"];
				$last = $_POST["last"];
				$img = base64_encode(file_get_contents(addslashes($_FILES["image"]["tmp_name"])));
				
				$type = "3";						//account type = Visitor;
				$y = date("Y");						//get year today;
				$y = substr( $y, -2);				//last digits on year;
				$prefix= $y.$type ;					// concatinate $y and $type;
				$default = $prefix."000000";		//default value for acc_no;

				$text = $user; 	//Only the student number will  be saved in the QR Code;
								//If you want every information be stored in the QR Code use the code below instead;
				
				$path = '../Images/'; 		//name of folder where to store all QR Images
				$file = $path.$user.".png"; 	//format of filename for each QR Images created. Ex: Images/2022123456.png;
				QRcode::png($text, $file, 'L', 5, 2); //generates QR Images, Parameters are (Text Contents, File Name, ECC, QRSize, FrameSize);
				
				//concat( 1st str, 2nd str); concatinate two string;
				//lpad(string,lenght,addstring); to add string on the left of original string;
				//substring(string, start, lenght); extract lpad(string) to coalesce(stringvalue);
				//coalesce(null,$default); return to the first not null value;
				//max(column name of table); returns to latest increment value;
				$select = "SELECT CONCAT($prefix,LPAD(SUBSTRING(COALESCE(MAX(acc_no),$default),6,6)+1,6,'0')) FROM user_account WHERE type= '$acctype';";
				$result = mysqli_query($connect,$select);
				while($row = mysqli_fetch_assoc($result)){
					//pass the current value of acc_no from database table for the new registered account;
					//convert to integer before passing of value;
					$num1 = (int)$row["CONCAT($prefix,LPAD(SUBSTRING(COALESCE(MAX(acc_no),$default),6,6)+1,6,'0'))"];
				}
				$select = "SELECT CONCAT($prefix,LPAD(SUBSTRING(COALESCE(MAX(acc_no),$default),6,6)+1,6,'0')) FROM acc_temp WHERE type= '$acctype';";
				$result = mysqli_query($connect,$select);
				while($row = mysqli_fetch_assoc($result)){
					//pass the current value of acc_no from database table for the new registered account;
					//convert to integer before passing of value;
					$num2 = (int)$row["CONCAT($prefix,LPAD(SUBSTRING(COALESCE(MAX(acc_no),$default),6,6)+1,6,'0'))"];
				}
				if($num1 < $num2){
					$accnum = $num2;
				}
				else if($num1 > $num2){
					$accnum = $num1;
				}else{
					$accnum = $num1;
				}
				
				
				$gcode = rand(10,99).rand(10,99).rand(10,99);	//generate verification code;
				
				//uppercase first letter
				$first = ucfirst(lcfirst($first));
				$last = ucfirst(lcfirst($last));
				$mid = ucfirst(lcfirst($mid));

				//insert value to selected database table
				$insert = "INSERT INTO acc_temp (acc_no,username,password,email,type,first,middle,last,v_code,image,qr)VALUES ('$accnum','$user','$pass','$email','$acctype','$first','$mid','$last','$gcode','$img','$file')";
				if(mysqli_query($connect,$insert))
				{
					require "toSendverif.php";
				}
				else
				{
					echo "<script>alert('Register Failed.')</script>";	
				}
				mysqli_close($connect);
			}
		?>
	</body>
</html>
