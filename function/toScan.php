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

				// insert this to chrome shorcut, properties, target " --autoplay-policy=no-user-gesture-required" or "--disable-features=PreloadMediaEngagementData, MediaEngagementBypassAutoplayPolicies"
			}
		</script>
	</head>
		<?php				
			require_once "connect.php";
			$sno = $_REQUEST["sno"];
			$select = "SELECT * FROM user_account WHERE stud_no = '$sno'";
			$result = mysqli_query($connect,$select);

			if (mysqli_num_rows($result) > 0) 
			{
				//loop that will stop after displaying all the records fetched from database 
				while($row = mysqli_fetch_assoc($result)) 
				{
					$img = $row["image"];
					$scan = $row["scan_stats"];
					$acc_no = $row["acc_no"];
        			$name = $row["first"]." ".$row["middle"]." ".$row["last"];
        			$type = $row["type"];
					$id = $row["acc_no"];
					if($scan == "granted"){

						$tz = 'Asia/Manila';
						$timestamp = time();
						$dt = new DateTime("now", new DateTimeZone($tz));
						$dt ->setTimestamp($timestamp);
						$date = $dt->format('Y-m-d h:i:s a');  

						$select = "SELECT * FROM time_inout WHERE account_no = $id";
						$result = mysqli_query($connect,$select);
						while($row = mysqli_fetch_assoc($result)){
							$in_out = $row["in_out"];
						}  

						if(mysqli_num_rows ($result) == 0){
							$update = "timein";
							$insert = "INSERT INTO time_inout (account_no,name,type,in_out, time) VALUES ('$acc_no','$name','$type','$update', '$date')";
							if(mysqli_query($connect,$insert))
							{
								echo"<script>console.log('Time In Success')</script>";
								//end ng attendance
								echo ("
									<body onload='autoClose();'style='background-color:#d4edda;'>
										<center>
											<div class='cont' style='width:100%; height:95vh;display:flex; justify-content:center; align-items:center;'>
												<div style='background-color:white;display:flex; justify-content:center; align-items:center; padding:20px;'>
													<div style='display:flex; justify-content:center; align-items:center;'>
														<img src='data:image;base64,".$img."' height='250' width='250' onload='granted()'>
													</div>
													<div style='display:flex; justify-content:flex-start;flex-direction:column; align-content:center;text-align: left; padding-left:20px;'>
														<h2>Student No.: " . $acc_no . "</h2>
														<h2>Name.: " . $name . "</h2>
														<h2>Status: Granted</h2>
													</div>
												</div>
											</div>
										</center>
									</body>
								");
							}
							else
							{
								echo"<script>console.log('Time In Error')";
							}	
						}
						else{

							if($in_out == "timein"){
								$update = "timeout";
			
									$insert = "INSERT INTO time_inout (account_no,name,type,in_out, time) VALUES ('$acc_no','$name','$type','$update', '$date')";
									if(mysqli_query($connect,$insert))
									{
										echo"<script>console.log('Time In Success')</script>";
										//end ng attendance
										echo ("
											<body onload='autoClose();'style='background-color:#d4edda;'>
												<center>
													<div class='cont' style='width:100%; height:95vh;display:flex; justify-content:center; align-items:center;'>
														<div style='background-color:white;display:flex; justify-content:center; align-items:center; padding:20px;'>
															<div style='display:flex; justify-content:center; align-items:center;'>
																<img src='data:image;base64,".$img."' height='250' width='250' onload='granted()'>
															</div>
															<div style='display:flex; justify-content:flex-start;flex-direction:column; align-content:center;text-align: left; padding-left:20px;'>
																<h2>Student No.: " . $acc_no . "</h2>
																<h2>Name.: " . $name . "</h2>
																<h2>Status: Granted</h2>
															</div>
														</div>
													</div>
												</center>
											</body>
										");
									}
									else
									{
										echo"<script>console.log('Time Out Error')";
									}	
							}
							else if($in_out == "timeout"){
								$update = "timein";
	
								$insert = "INSERT INTO time_inout (account_no,name,type,in_out, time) VALUES ('$acc_no','$name','$type','$update', '$date')";
								if(mysqli_query($connect,$insert))
								{
									echo"<script>console.log('Time In Success')</script>";
									//end ng attendance
									echo ("
										<body onload='autoClose();'style='background-color:#d4edda;'>
											<center>
												<div class='cont' style='width:100%; height:95vh;display:flex; justify-content:center; align-items:center;'>
													<div style='background-color:white;display:flex; justify-content:center; align-items:center; padding:20px;'>
														<div style='display:flex; justify-content:center; align-items:center;'>
															<img src='data:image;base64,".$img."' height='250' width='250' onload='granted()'>
														</div>
														<div style='display:flex; justify-content:flex-start;flex-direction:column; align-content:center;text-align: left; padding-left:20px;'>
															<h2>Student No.: " . $acc_no . "</h2>
															<h2>Name.: " . $name . "</h2>
															<h2>Status: Granted</h2>
														</div>
													</div>
												</div>
											</center>
										</body>
									");	
								}
								else
								{
									echo"<script>console.log('Time In Error')";
								}	
							}
				
							else{
								echo"<script>console.log('Failed!')";
								}
						}
					}
					else if($scan == "denied"){
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
			else 
			{
				echo "No results found.";
			}
			mysqli_close($connect);
		?>
</html>