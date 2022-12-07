<?php
	
?>
<!doctype html>
<html>
	<head>
		<title>QR Scanner Page</title>
		<!--CSS-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
		<!--javascript-->
		<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
		<script type="text/javascript" src="js/scanner.js"></script>
		<script>
			
			var visitorInfo;
			function scanQR()
			{
				let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
				Instascan.Camera.getCameras().then(function(cameras){
					if(cameras.length > 0){
						scanner.start(cameras[0]);						
					}
					else{
						alert('No cameras found');	
					}					
				}).catch(function(e){
					console.error(e);
				});
				scanner.addListener("scan",function(c)
				{
					var qrwhole = document.getElementById("text").value=c;
			
						visitInfo = window.open("function/toScan.php?qr=" + qrwhole, "_blank");
						// document.onmousedown=focusWindow; 
						// document.onmousemove=focusWindow;
						// document.onkeyup=focusWindow;	
				})	
			}	
			function focusWindow()
			{
				if(!visitInfo.closed)
				visitInfo.focus();
			}
			
		</script>
	</head>
	<body onload="scanQR();reloadtime()">
					<div class="datetime">
						<center>
						<div class="date">
							<span id="dayname">Day</span>,
							<span id="month">Month</span>
							<span id="daynum">00</span>,
							<span id="year">Year</span>
						</div>
						<div class="time">
							<span id="hour">00</span>:<span id="minutes">00</span>:<span id="seconds">00</span>
							<span id="period">AM</span>
						</div>
						</center>
					</div>
			<div class="scanner">
				<center>
					<form>
							<div>SCAN QR CODE HERE</div>
							<video id="preview" height="800px" width="800px"></video>
							<input type="hidden" name="text" id="text"></input>
					</form>					
				</center>
			</div>
	</body>
</html>