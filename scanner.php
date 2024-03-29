<?php

?>
<!doctype html>
<html>

<head>
	<title>QR Scanner Page</title>
	<meta http-equiv="Refresh" content="60"> 
	<!--CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<!--javascript-->
	<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
	<script type="text/javascript" src="js/scanner.js"></script>
	<script>
		var visitorInfo;

		function scanQR() {
			let scanner = new Instascan.Scanner({
				video: document.getElementById('preview')
			});
			Instascan.Camera.getCameras().then(function(cameras) {
				if (cameras.length > 0) {
					scanner.start(cameras[0]);
				} else {
					alert('No cameras found');
				}
			}).catch(function(e) {
				console.error(e);
			});
			scanner.addListener("scan", function(c) {
				var qrwhole = document.getElementById("text").value = c;

				visitInfo = window.open("function/toScan.php?qr=" + qrwhole, "_blank");
				document.onmousedown=focusWindow; 
				document.onmousemove=focusWindow;
				document.onkeyup=focusWindow;
				
			})
		}

		function focusWindow() {
			if (!visitInfo.closed)
				window.location.reload();
				visitInfo.focus();
		}
	</script>
	<style>
		html,
		body {
			height: 100vh;
		}

		body {
			background-image: url("resources/bulsu.jpg");
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center center;
			background-attachment: fixed;
		}
		.glass-effect {
			background: linear-gradient(1deg, rgb(27 27 27 / 81%), rgb(255 129 129 / 0%));
			backdrop-filter: blur(3px);
		}
	</style>
</head>

<body onload="scanQR(); reloadtime()">
	<div class="row m-0 glass-effect h-100">
		<div class="col-4 text-center d-flex align-items-center justify-content-center">
			<div class="text-light">
				<img class="" src="resources/bulsulogo.png" alt="" height="100">
				<h1 class="h3 m-1">BulSU Gatepass</h1>
				<hr>
				<h5 class="my-5">SCAN QR CODE</h5>
				<div class="datetime h4">
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
				</div>
			</div>
		</div>
		<div class="col-8 p-0">
			<div class="scanner">
				<form style="height: 99vh;">
					<video class="border h-100 w-100" id="preview"></video>
					<input type="hidden" name="text" id="text"></input>
				</form>
			</div>
		</div>
	</div>

	<!--  -->

</body>

</html>
