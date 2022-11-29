
<!doctype html>
<html>
<head>
        <title>Forgot Password</title>

        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                <form method="post" action="function/toCheckEmail.php" enctype="multipart/form-data" style="width: 400px">
                <h1 style="margin-bottom: 20px;">Enter Your Email</h1>
                <div class="form-group" style="margin-bottom: 10px;">
                        <input type="text" class="form-control" name ="emailinput" name="email"><br><br>
                        <button type="submit" class="btn btn-primary" id="emailsubmit"> Submit </button>
                </div>
                </form>
        </div>
 </body>
</html>