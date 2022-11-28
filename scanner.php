<!doctype html>
<html>
	<head>
		<title>QR Scanner Page</title>
		<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>	
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
					var studno = document.getElementById("text").value=c;			
				
					visitInfo = window.open("function/toScan.php?sno=" + studno, "_blank");
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
	<body onload="scanQR()">
			<center>
					<form>
							<h1>SCAN QR CODE HERE</h1>
							<video id="preview" height="800px" width="800px"></video>
							<input type="hidden" name="text" id="text"></input>
					</form>	
			</center>	
	</body>
</html>