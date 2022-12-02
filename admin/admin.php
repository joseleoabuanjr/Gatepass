<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="css/admin.css">

    <!-- Javascript -->
    <script type="text/javascript" src="js/adminScript.js"></script>
</head>
<body style="margin: 50px;">
    <?php require_once '../includes/navbar-admin.php'; ?>
    <div class="table1" id="tbl1"><?php require_once 'includes/table1.php'; ?></div>
    <div class="table2--hidden" id="tbl2"><?php require_once 'includes/table2.php'; ?></div>
    <div class="table3--hidden" id="tbl3"><?php require_once 'includes/table3.php'; ?></div>
    <!-- <?php require 'includes/admin-create.php'; ?> -->
</body>
</html>