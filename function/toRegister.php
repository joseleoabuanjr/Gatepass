<!doctype html>
<html>
	<head>
		<title>Registration Information</title>
	</head>
	<body>
		<?php
		session_start();
			$userType = $_POST["userType"];
			$_SESSION["passw"] = $_POST["pass"];

			//include qr api
			require_once "../phpqrcode/qrlib.php";

			//db connection
			require_once "connect.php";
			
			if($userType == "student"){
				$accnum="";
				$verif = "unverified";
				$first = $_POST["first"];
				$mid = $_POST["middle"];
				$last = $_POST["last"];
				$pnum = $_POST["contact"];
				// $cname = $_POST["contact_p"];
				$bday = $_POST["dob"];
				$add = $_POST["address"];
				// $contnum = $_POST["contact_pnum"];
				$studno = $_POST["studno"];
				$col = $_POST["college"];
				$course = $_POST["course"];
				$yr = $_POST["year"];
				$sec = $_POST["section"];
				$user = $_POST["username"];
				$pass = md5($_POST["pass"]);
				$email = $_POST["email"];
				$acctype = "student";
				$img = base64_encode(file_get_contents(addslashes($_FILES["image"]["tmp_name"])));

				$corpdf = $_FILES['cor']['name']; //additional codes para sa PDF
				$corpdf_type=$_FILES['cor']['type']; //additional codes para sa PDF
				$corpdf_size=$_FILES['cor']['size']; //additional codes para sa PDF
				$corpdf_tem_loc=$_FILES['cor']['tmp_name']; //additional codes para sa PDF
				$corpdf_store="../files/".$corpdf; //additional codes para sa PDF

				move_uploaded_file($corpdf_tem_loc,$corpdf_store);

				$vaxpdf = $_FILES['vax']['name']; //additional codes para sa PDF
				$vaxpdf_type=$_FILES['vax']['type']; //additional codes para sa PDF
				$vaxpdf_size=$_FILES['vax']['size']; //additional codes para sa PDF
				$vaxpdf_tem_loc=$_FILES['vax']['tmp_name']; //additional codes para sa PDF
				$vaxpdf_store="../files/".$vaxpdf; //additional codes para sa PDF

				move_uploaded_file($vaxpdf_tem_loc,$vaxpdf_store);

				$v_idpdf = $_FILES['vid']['name']; //additional codes para sa PDF
				$v_idpdf_type=$_FILES['vid']['type']; //additional codes para sa PDF
				$v_idpdf_size=$_FILES['vid']['size']; //additional codes para sa PDF
				$v_idpdf_tem_loc=$_FILES['vid']['tmp_name']; //additional codes para sa PDF
				$v_idpdf_store="../files/".$v_idpdf; //additional codes para sa PDF
		
				move_uploaded_file($v_idpdf_tem_loc,$v_idpdf_store);
				
				$type = "1";//form type = Student;
				$y = date("Y");//get year today;
				$y = substr( $y, -2);//last digits on year;
				$prefix= $y.$type ;// concatinate $y and $type;
				$default = $prefix."000000";//default value for acc_no;

				//================================================Generate Account Number;
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
				//================================================Generate QR Code;
				$text = $accnum; //Only the student number will  be saved in the QR Code;
				//If you want every information be stored in the QR Code use the code below instead;
				$path = '../Images/'; //name of folder where to store all QR Images
				$file = $path.$accnum.".png"; //format of filename for each QR Images created. Ex: Images/2022123456.png;
				QRcode::png($text, $file, 'L', 5, 2); //generates QR Images, Parameters are (Text Contents, File Name, ECC, QRSize, FrameSize);

				$gcode = rand(10,99).rand(10,99).rand(10,99);		//generate verification code;

				//uppercase first letter
				$first = ucfirst(lcfirst($first));
				$last = ucfirst(lcfirst($last));
				$mid = ucfirst(lcfirst($mid));
					
				$insert = "INSERT INTO acc_temp (acc_no,first,middle,last,contact_no,birthday,address,cp_name,cp_no,stud_no,college,course,year,section,username,password,email,image,cor,valid_id,vax,verification,qr,type,v_code) VALUES ('$accnum','$first','$mid','$last','$pnum','$bday','$add','$cname','$contnum','$studno','$col','$course','$yr','$sec','$user','$pass','$email','$img','$corpdf','$v_idpdf','$vaxpdf','$verif','$file','$acctype','$gcode')";
				if(mysqli_query($connect,$insert)){
					require "toSendverif.php";
				}
				else{
					echo json_encode(array("status" => false));
					// echo "<script>alert('Register Failed.')</script>";	
				}
				mysqli_close($connect);
			}
			else if($userType == "employee"){
				$accnum="";
				$verif = "unverified";
				$first = $_POST["first"];
				$mid = $_POST["middle"];
				$last = $_POST["last"];
				$pnum = $_POST["contact"];
				// $cname = $_POST["contact_p"];
				// $contnum = $_POST["contact_pnum"];
				$empno = $_POST["empno"];
				$user = $_POST["username"];
				$pass = md5($_POST["pass"]);
				$email = $_POST["email"];
				$acctype = "employee";
				$img = base64_encode(file_get_contents(addslashes($_FILES["image"]["tmp_name"])));

				$vaxpdf = $_FILES['vax']['name']; //additional codes para sa PDF
				$vaxpdf_type=$_FILES['vax']['type']; //additional codes para sa PDF
				$vaxpdf_size=$_FILES['vax']['size']; //additional codes para sa PDF
				$vaxpdf_tem_loc=$_FILES['vax']['tmp_name']; //additional codes para sa PDF
				$vaxpdf_store="../files/".$vaxpdf; //additional codes para sa PDF

				move_uploaded_file($vaxpdf_tem_loc,$vaxpdf_store);

				$v_idpdf = $_FILES['vid']['name']; //additional codes para sa PDF
				$v_idpdf_type=$_FILES['vid']['type']; //additional codes para sa PDF
				$v_idpdf_size=$_FILES['vid']['size']; //additional codes para sa PDF
				$v_idpdf_tem_loc=$_FILES['vid']['tmp_name']; //additional codes para sa PDF
				$v_idpdf_store="../files/".$v_idpdf; //additional codes para sa PDF
		
				move_uploaded_file($v_idpdf_tem_loc,$v_idpdf_store);
				
				$type = "2";//form type = Employee;
				$y = date("Y");//get year today;
				$y = substr( $y, -2);//last digits on year;
				$prefix= $y.$type ;// concatinate $y and $type;
				$default = $prefix."000000";//default value for acc_no;

				//================================================Generate Account Number;
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
				//================================================Generate QR Code;
				$text = $accnum; //Only the student number will  be saved in the QR Code;
				//If you want every information be stored in the QR Code use the code below instead;
				$path = '../Images/'; //name of folder where to store all QR Images
				$file = $path.$accnum.".png"; //format of filename for each QR Images created. Ex: Images/2022123456.png;
				QRcode::png($text, $file, 'L', 5, 2); //generates QR Images, Parameters are (Text Contents, File Name, ECC, QRSize, FrameSize);

				$gcode = rand(10,99).rand(10,99).rand(10,99);		//generate verification code;

				//uppercase first letter
				$first = ucfirst(lcfirst($first));
				$last = ucfirst(lcfirst($last));
				$mid = ucfirst(lcfirst($mid));
					
				$insert = "INSERT INTO acc_temp (acc_no,first,middle,last,contact_no,birthday,address,cp_name,cp_no,emp
				_no,username,password,email,image,valid_id,vax,verification,qr,type,v_code) VALUES ('$accnum','$first','$mid','$last','$pnum','$bday','$add','$cname','$contnum','$empno','$user','$pass','$email','$img','$v_idpdf','$vaxpdf','$verif','$file','$acctype','$gcode')";
				if(mysqli_query($connect,$insert)){
					require "toSendverif.php";
				}
				else{
					echo "<script>alert('Register Failed.')</script>";	
				}
				mysqli_close($connect);
			}
			else if($userType == "visitor"){
				$accnum="";
				$verif = "unverified";
				$first = $_POST["first"];
				$mid = $_POST["middle"];
				$last = $_POST["last"];
				$pnum = $_POST["contact"];
				// $cname = $_POST["contact_p"];
				// $contnum = $_POST["contact_pnum"];
				$empno = $_POST["empno"];
				$user = $_POST["username"];
				$pass = md5($_POST["pass"]);
				$email = $_POST["email"];
				$acctype = "visitor";
				$img = base64_encode(file_get_contents(addslashes($_FILES["image"]["tmp_name"])));

				$vaxpdf = $_FILES['vax']['name']; //additional codes para sa PDF
				$vaxpdf_type=$_FILES['vax']['type']; //additional codes para sa PDF
				$vaxpdf_size=$_FILES['vax']['size']; //additional codes para sa PDF
				$vaxpdf_tem_loc=$_FILES['vax']['tmp_name']; //additional codes para sa PDF
				$vaxpdf_store="../files/".$vaxpdf; //additional codes para sa PDF

				move_uploaded_file($vaxpdf_tem_loc,$vaxpdf_store);

				$v_idpdf = $_FILES['vid']['name']; //additional codes para sa PDF
				$v_idpdf_type=$_FILES['vid']['type']; //additional codes para sa PDF
				$v_idpdf_size=$_FILES['vid']['size']; //additional codes para sa PDF
				$v_idpdf_tem_loc=$_FILES['vid']['tmp_name']; //additional codes para sa PDF
				$v_idpdf_store="../files/".$v_idpdf; //additional codes para sa PDF
		
				move_uploaded_file($v_idpdf_tem_loc,$v_idpdf_store);
				
				$type = "3";//form type = Visitor;
				$y = date("Y");//get year today;
				$y = substr( $y, -2);//last digits on year;
				$prefix= $y.$type ;// concatinate $y and $type;
				$default = $prefix."000000";//default value for acc_no;

				//================================================Generate Account Number;
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
				//================================================Generate QR Code;
				$text = $accnum; //Only the student number will  be saved in the QR Code;
				//If you want every information be stored in the QR Code use the code below instead;
				$path = '../Images/'; //name of folder where to store all QR Images
				$file = $path.$accnum.".png"; //format of filename for each QR Images created. Ex: Images/2022123456.png;
				QRcode::png($text, $file, 'L', 5, 2); //generates QR Images, Parameters are (Text Contents, File Name, ECC, QRSize, FrameSize);

				$gcode = rand(10,99).rand(10,99).rand(10,99);		//generate verification code;

				//uppercase first letter
				$first = ucfirst(lcfirst($first));
				$last = ucfirst(lcfirst($last));
				$mid = ucfirst(lcfirst($mid));
					
				$insert = "INSERT INTO acc_temp (acc_no,first,middle,last,contact_no,birthday,address,cp_name,cp_no,username,password,email,image,valid_id,vax,verification,qr,type,v_code) VALUES ('$accnum','$first','$mid','$last','$pnum','$bday','$add','$cname','$contnum','$user','$pass','$email','$img','$v_idpdf','$vaxpdf','$verif','$file','$acctype','$gcode')";
				if(mysqli_query($connect,$insert)){
					require "toSendverif.php";
				}
				else{
					echo "<script>alert('Register Failed.')</script>";	
				}
				mysqli_close($connect);
			}
		?>
	</body>
</html>
