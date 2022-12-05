<!doctype html>
<html>
	<head>
		<title>Visitor Information</title>
		<script>
			
			function autoClose(){
				// setTimeout(closeWindow,4000);
			}
			function closeWindow(){
				window.close();
			}
			function denied(){
				const audio = new Audio();
				audio.src = "../sounds/denied.mp3";
				audio.play();

				// insert this to chrome shorcut, properties, target " --autoplay-policy=no-user-gesture-required" or "--disable-features=PreloadMediaEngagementData, MediaEngagementBypassAutoplayPolicies"
			}
			function granted(){
				const audio = new Audio();
				audio.src = "../sounds/granted.mp3";
				audio.play();

				//to make auto play sounds;
				// insert this to chrome shorcut, properties, target " --autoplay-policy=no-user-gesture-required" or "--disable-features=PreloadMediaEngagementData, MediaEngagementBypassAutoplayPolicies"
			}
		</script>
	</head>
		<?php				
			require_once "connect.php";
			$qrwhole = $_REQUEST["qr"];

			if(strpos($qrwhole, ":") !== false){
				$qrsplit = explode(":",$qrwhole);
				$qraccno = intval($qrsplit[0]);
				$reqid = intval($qrsplit[1]);
			} else{
				$qraccno = $qrwhole;
			}
			
			//check if user have an appointment(Visitor);
			$select = "SELECT * FROM appointment WHERE type = 'visitor'";
			$result = mysqli_query($connect,$select);
			
			if (mysqli_num_rows($result) > 0){
				
				//if have result
				//loop that will stop after displaying all the records fetched from database ;
				while($row = mysqli_fetch_assoc($result)){
					$status = $row["status"];
					$acc_no = $row["acc_no"];
					$name = $row["name"];
					$type = $row["type"];
					$date = $row["date"];
					$reason = $row["reason"];
					$id = $row["acc_no"];
				}
				$select = "SELECT * FROM user_account WHERE acc_no = '$qraccno'";
				$result = mysqli_query($connect,$select);
				
				if (mysqli_num_rows($result) > 0){
					//loop that will stop after displaying all the records fetched from database ;
					//Get values;
					while($row = mysqli_fetch_assoc($result)){
						$img = $row["image"];
					}
				}
				//Get Current Time
				$tz = 'Asia/Manila';
				$timestamp = time();
				$dt = new DateTime("now", new DateTimeZone($tz));
				$dt ->setTimestamp($timestamp);
				$curdate = $dt->format('Y-m-d');

				//Date of Appointment
				$dummy = date_create($date);
				$aptdate = $dummy->format('Y-m-d'); 

				//If Current Date is Matched with Appointment Date;
				if ($curdate == $aptdate){ 
					//Matched Date

					$apt_status = 'granted';
					$update = "UPDATE appointment SET qr_status = '$apt_status' WHERE acc_no = $id AND req_id = '$reqid'";

					if(mysqli_query($connect,$update)){
						$date = $dt->format('Y-m-d h:i:s a');

						//=============Time In Out============//
						//Check time_inout table and get value;
						$select = "SELECT * FROM time_inout WHERE account_no = $id";
						$result = mysqli_query($connect,$select);
						while($row = mysqli_fetch_assoc($result)){
							$in_out = $row["in_out"];
						}
						//If table is empty;
						if(mysqli_num_rows ($result) == 0){
							$update = "timein";
							$insert = "INSERT INTO time_inout (account_no,name,type,in_out, time,reason) VALUES ('$acc_no','$name','$type','$update', '$date','$reason')";
							if(mysqli_query($connect,$insert))
							{
								echo"<script>console.log('Time In Success')</script>";
							}
							else
							{
								echo"<script>console.log('Time In Error')";
							}	
						}
						//If Not Empty;
						else{
							//Check if latest value is equal to Time in;
							if($in_out == "timein"){

								//If True then update value to time out;
								$update = "timeout";
								$insert = "INSERT INTO time_inout (account_no,name,type,in_out, time,reason) VALUES ('$acc_no','$name','$type','$update', '$date','$reason')";
								if(mysqli_query($connect,$insert)){
									echo"<script>console.log('Time In Success')</script>";
								}
								else
								{
									echo"<script>console.log('Time Out Error')";
								}	
							}
							//Check if latest value is equal to Time out;
							else if($in_out == "timeout"){

								//If True then update value to time out;
								$update = "timein";
								$insert = "INSERT INTO time_inout (account_no,name,type,in_out, time,reason) VALUES ('$acc_no','$name','$type','$update', '$date','$reason')";
								if(mysqli_query($connect,$insert)){
									echo"<script>console.log('Time In Success')</script>";
								}
								else{
									echo"<script>console.log('Time In Error')";
								}	
							}
							else{
								echo"<script>console.log('Failed!')";
								}
						}
						//==========Time In Out End ============//
						// Display User details From Scanned Qr;
						echo ("
							<body onload='autoClose();'style='background-color:#d4edda;'>
								<center>
									<div class='cont' style='width:100%; height:95vh;display:flex; justify-content:center; align-items:center;'>
										<div style='background-color:white;display:flex; justify-content:center; align-items:center; padding:20px;'>
											<div style='display:flex; justify-content:center; align-items:center;'>
												<img src='data:image;base64,".$img."' height='250' width='250' onload='granted()'>
											</div>
											<div style='display:flex; justify-content:flex-start;flex-direction:column; align-content:center;text-align: left; padding-left:20px;'>
												<h2>Student Number: " . $acc_no . "</h2>
												<h2>Name: " . $name . "</h2>
												<h2>Purpose: " . $reason . "</h2>
												<h2>Status: Granted</h2>
											</div>
										</div>
									</div>
								</center>
							</body>
						");
					}
					else{
						echo "<script>console.log('Appointment granted failed!');</script>";
					}

				}
				else{
					//Not Matched

					$apt_status = 'denied';
					$update = "UPDATE appointment SET qr_status = '$apt_status' WHERE acc_no = $id AND req_id = '$reqid'";
					if(mysqli_query($connect,$update)){
						echo ("
							<body onload='autoClose();'style='background-color:#f8d7da;'>
								<center>
									<div class='cont' style='width:100%; height:95vh;display:flex; justify-content:center; align-items:center;'>
										<div style='background-color:white;display:flex; justify-content:center; align-items:center; padding:20px;'>
											<div style='display:flex; justify-content:center; align-items:center;'>
												<img src='data:image;base64,".$img."' height='250' width='250' onload='denied()'>
											</div>
											<div style='display:flex; justify-content:flex-start;flex-direction:column; align-content:center;text-align: left; padding-left:20px;'>
												<h2>Student No.: " . $acc_no . "</h2>
												<h2>Name.: " . $name . "</h2>
												<h2>Status: Denied</h2>
											</div>
										</div>
									</div>
								</center>
							</body>
						");
					}
					else{
						echo "<script>console.log('Appointment denied failed!');</script>";
					}
				}
			}
			else 
			{
				//if none. Check user is in database table(Student and Employee);
				$select = "SELECT * FROM user_account WHERE acc_no = '$qraccno'";
				$result = mysqli_query($connect,$select);
				
				if (mysqli_num_rows($result) > 0){
					//loop that will stop after displaying all the records fetched from database ;
					//Get values;
					while($row = mysqli_fetch_assoc($result)){
						$img = $row["image"];
						$status = $row["status"];
						$acc_no = $row["acc_no"];
						$name = $row["first"]." ".$row["middle"]." ".$row["last"];
						$type = $row["type"];
						$yr = $row["year"];
						$sec = $row["section"];
						$course = $row["course"];
						$college = $row["college"];
					}
					//Scan is Granted Function;
					if($status == "granted"){
						//=============Time In Out============//
						// Time In And OUt Function;
						$tz = 'Asia/Manila';
						$timestamp = time();
						$dt = new DateTime("now", new DateTimeZone($tz));
						$dt ->setTimestamp($timestamp);
						$date = $dt->format('Y-m-d h:i:s a');
						
						//Check time_inout table and get value;
						$select = "SELECT * FROM time_inout WHERE account_no = $id";
						$result = mysqli_query($connect,$select);
						while($row = mysqli_fetch_assoc($result)){
							$in_out = $row["in_out"];
						}
						//If table is empty;
						if(mysqli_num_rows ($result) == 0){
							$update = "timein";
							$insert = "INSERT INTO time_inout (account_no,name,type,in_out, time) VALUES ('$acc_no','$name','$type','$update', '$date')";
							if(mysqli_query($connect,$insert))
							{
								echo"<script>console.log('Time In Success')</script>";
							}
							else
							{
								echo"<script>console.log('Time In Error')";
							}	
						}
						//If Not Empty;
						else{
							//Check if latest value is equal to Time in;
							if($in_out == "timein"){

								//If True then update value to time out;
								$update = "timeout";
								$insert = "INSERT INTO time_inout (account_no,name,type,in_out, time) VALUES ('$acc_no','$name','$type','$update', '$date')";
								if(mysqli_query($connect,$insert)){
									echo"<script>console.log('Time In Success')</script>";
								}
								else
								{
									echo"<script>console.log('Time Out Error')";
								}	
							}
							//Check if latest value is equal to Time out;
							else if($in_out == "timeout"){

								//If True then update value to time out;
								$update = "timein";
								$insert = "INSERT INTO time_inout (account_no,name,type,in_out, time) VALUES ('$acc_no','$name','$type','$update', '$date')";
								if(mysqli_query($connect,$insert)){
									echo"<script>console.log('Time In Success')</script>";
								}
								else{
									echo"<script>console.log('Time In Error')";
								}	
							}
							else{
								echo"<script>console.log('Failed!')";
								}
						}
						//==========Time In Out End ============//

						if($type == 'student'){
							// Display User details From Scanned Qr;
							echo ("
								<body onload='autoClose();'style='background-color:#d4edda;'>
									<center>
										<div class='cont' style='width:100%; height:95vh;display:flex; justify-content:center; align-items:center;'>
											<div style='background-color:white;display:flex; justify-content:center; align-items:center; padding:20px;'>
												<div style='display:flex; justify-content:center; align-items:center;'>
													<img src='data:image;base64,".$img."' height='250' width='250' onload='granted()'>
												</div>
												<div style='display:flex; justify-content:flex-start;flex-direction:column; align-content:center;text-align: left; padding-left:20px;'>
													<h2>Student Number: " . $acc_no . "</h2>
													<h2>Name: " . $name . "</h2>
													<h2>Course: " . $course . "</h2>
													<h2>Year & Section: " .$yr.strtoupper($sec). "</h2>
													<h2>Status: Granted</h2>
												</div>
											</div>
										</div>
									</center>
								</body>
							");
						}

					}
					else if($status == "denied" || "blocked"){
						echo ("
							<body onload='autoClose();'style='background-color:#f8d7da;'>
								<center>
									<div class='cont' style='width:100%; height:95vh;display:flex; justify-content:center; align-items:center;'>
										<div style='background-color:white;display:flex; justify-content:center; align-items:center; padding:20px;'>
											<div style='display:flex; justify-content:center; align-items:center;'>
												<img src='data:image;base64,".$img."' height='250' width='250' onload='denied()'>
											</div>
											<div style='display:flex; justify-content:flex-start;flex-direction:column; align-content:center;text-align: left; padding-left:20px;'>
												<h2>Student No.: " . $acc_no . "</h2>
												<h2>Name.: " . $name . "</h2>
												<h2>Status: Denied</h2>
											</div>
										</div>
									</div>
								</center>
							</body>
						");
					}
				}
			}
			mysqli_close($connect);
		?>
</html>