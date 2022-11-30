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
			$qrwhole = $_REQUEST["qr"];
			$qrsplit = explode(":",$qrwhole);
			$qraccno = intval($qrsplit[0]);

			$select = "SELECT * FROM user_account WHERE acc_no = '$qraccno'";
			$result = mysqli_query($connect,$select);
			
			if (mysqli_num_rows($result) > 0) 
			{
				while($row = mysqli_fetch_assoc($result)) 
				{
					
				}
				
			} 
			else 
			{
				echo "No results found.";
			}
			mysqli_close($connect);
		?>
</html>