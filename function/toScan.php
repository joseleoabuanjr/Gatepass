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
					if($scan == "granted"){
						
						echo ("
							<body onload='autoClose();'style='background-color:#d4edda;'>
								<center>
									<div class='cont' style='width:100%; height:95vh;display:flex; justify-content:center; align-items:center;'>
										<div style='background-color:white;display:flex; justify-content:center; align-items:center; padding:20px;'>
											<div style='display:flex; justify-content:center; align-items:center;'>
												<img src='data:image;base64,".$img."' height='250' width='250' onload='granted()'>
											</div>
											<div style='display:flex; justify-content:flex-start;flex-direction:column; align-content:center;text-align: left; padding-left:20px;'>
												<h2>Student No.: " . $row["acc_no"] . "</h2>
												<h2>Name.: " . $row["first"] . " " . $row["middle"] . ", " . $row["last"] . "</h2>
												<h2>Status: Granted</h2>
											</div>
										</div>
									</div>
								</center>
							</body>
						");
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
												<h2>Student No.: " . $row["acc_no"] . "</h2>
												<h2>Name.: " . $row["first"] . " " . $row["middle"] . ", " . $row["last"] . "</h2>
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