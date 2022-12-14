<?php
session_start();
if (!isset($_SESSION["accno"])) {
    header("Location: index.php");
}
require_once "function/connect.php";

$id = $_SESSION['accno'];
$accno = $_SESSION["accno"];
$p = $_SESSION["pass"];

$select = "SELECT * FROM user_account WHERE acc_no = $accno";
$result = mysqli_query($connect, $select);

if ($row = mysqli_fetch_assoc($result)) {
    $first = $row['first'];
    $last = $row['last'];
    $mid = $row['middle'];
    $pnum = $row['contact_no'];
    $bday = $row['birthday'];
    $add = $row['address'];
    $cname = $row['cp_name'];
    $contnum = $row['cp_no'];
    $studno = $row['stud_no'];
    $empno = $row['emp_no'];
    $col = $row['college'];
    $course = $row['course'];
    $yr = $row['year'];
    $sec = $row['section'];
    $user = $row['username'];
    $pass = $row['password'];
    $email = $row['email'];
    $type = $row['type'];
    // $vcode = $row['v_code'];
    $img = $row['image'];
    $cor = $row['cor'];
    $v_id = $row['valid_id'];
    $vax = $row["vax"];
    $qr = $row['qr'];
    $img = $row['image'];
    $cor = $row['cor'];
    $v_id = $row['valid_id'];
    $vax = $row["vax"];
    $status = $row['verification'];
}
$date = date_create($bday);
$bday = date_format($date, "Y-m-d");

?>
<!doctype html>
<html>

<head>
    <title>Account Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!----------- CSS ------------>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/college.css">
    <!----------- Javascript ------------>

</head>

<body>
    <?php require_once 'includes/navbar.php'; ?>
    <div class="container">
        <?php if ($status == "unverified") {
                    echo '
                        <div class="w-100 pt-4">
                            <div class="alert text-center fw-bold alert-danger shadow-sm" role="alert">
                                Your account is unverified. <br>Please fill up all needed information below and make sure that the information is correct. Then click <b>Save Changes</b> to sumbit for fully verification. 
                            </div>
                        </div>
                        ';
                }
        ?>
        <div id="error"></div>
        <div id="scrollProfile" class="container">
            <form id="profileForm" method="post" action="function/toupdate_p.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                        <div id="list-example" class="list-group pt-5">
                            <a class="list-group-item list-group-item-action" href="#profilePicture">Profile Picture</a>
                            <a class="list-group-item list-group-item-action" href="#personalInfoSection">Personal Information</a>
                            <?php if($type == "student"){
                            echo ('
                                    <a class="list-group-item list-group-item-action" href="#educationalInfoSection">Educational Information</a>
                                '); 
                            }
                            ?>
                            <a class="list-group-item list-group-item-action" href="#credential">Credential</a>
                            <a class="list-group-item list-group-item-action" href="#account">Account</a>
                        </div>
                        <button type="submit" class="btn btn-success w-100 mt-2">Save Changes <span id="spinnerSave" class="spinner-border spinner-border-sm" role="status"></span></button>
                    </div>
                    <div class="col-8">
                        <div style="overflow-y: scroll; height: 90vh;" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" tabindex="0" data-bs-offset="56">
                            <div class="container" style="width:90%;">
                                <div id="profilePicture" class="pt-5 pb-3 mb-5">
                                    <h2>Profile Picture</h2>
                                    <div class="d-flex justify-content-start pt-3">
                                        <img class="img-thumbnail" width="180px" height="180px" src="data:image;base64,<?php echo ($img); ?>">
                                        <div>
                                            <ul>
                                                <li>Please select a jpg/jpeg or png file format to upload image to be your profile picture</li>
                                                <li>Image size must be 2x2 only</li>
                                            </ul>
                                            <div class="form-floating">
                                                <input type="file" name="image" class="form-control ms-2 ps-5" style="height: 80px;padding-top:40px; padding-left:40px" id="img1" accept="image/png, image/jpeg" onchange="return checkImage1()">
                                                <label class="ms-3">Upload New Account Profile Picture</label>
                                                <div class="msg" id="message"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="personalInfoSection" class="py-3 mb-5">
                                    <h2>Personal Information</h2>
                                    <div class="row row-cols-1 row-cols-md-3 g-2 pt-3">
                                        <div class="col">
                                            <div class="mb-3">
                                                <h6 for="firstName" class="form-label">First Name</h6>
                                                <input type="text" class="form-control" name="first" id="firstName" value="<?php echo ($first); ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <h6 for="middleName" class="form-label">Middle Initial</h6>
                                                <input type="text" class="form-control" name="middle" id="middleName" value="<?php echo ($mid); ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <h6 for="lastName" class="form-label">Last Name</h6>
                                                <input type="text" class="form-control" name="last" id="lastName" value="<?php echo ($last); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-md-2 g-2">
                                        <div class="col">
                                            <div class="mb-3">
                                                <h6 for="contact" class="form-label">Contact Number</h6>
                                                <input type="text" class="form-control" name="contact" id="contact" value="<?php echo ($pnum); ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <h6 for="dob" class="form-label">Date of Birth</h6>
                                                <input type="date" class="form-control" name="dob" id="dob" value="<?php echo ($bday); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-md-1 g-2">
                                        <div class="col">
                                            <div class="mb-3">
                                                <h6 for="address" class="form-label">Address</h6>
                                                <input type="text" class="form-control" name="address" id="address" value="<?php echo ($add); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-md-2 g-2">
                                        <div class="col">
                                            <div class="mb-3">
                                                <h6 for="contact_p" class="form-label">Emergency Contact Person</h6>
                                                <input type="text" class="form-control" name="contact_p" id="contact_p" value="<?php echo ($cname); ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <h6 for="contact_pnum" class="form-label">Emergency Contact Number</h6>
                                                <input type="text" class="form-control" name="contact_pnum" id="contact_pnum" value="<?php echo ($contnum); ?>" placeholder="Ex: 09123456789">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($type == "student"){
                                    echo ' 
                                    <div id="educationalInfoSection" class="py-3 mb-5">
                                    ';
                                }else{
                                    echo ' 
                                    <div id="educationalInfoSection" class="d-none py-3 mb-5">
                                    ';
                                }
                                ?>
                                        <h2>Educational Information</h2>
                                        <div class="row row-cols-1 row-cols-md-3 g-2 pt-3">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <h6 for="studno" class="form-label">Student Number</h6>
                                                    <input type="text" class="form-control" name="studno" id="studno" value="<?php echo ($studno); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <h6 for="year" class="form-label">Year</h6>
                                                    <select class="form-select mb-3" name="year" required>
                                                        <option <?php echo ($yr == "1") ? "selected" : "" ?> value="1">1</option>
                                                        <option <?php echo ($yr == "2") ? "selected" : "" ?> value="2">2</option>
                                                        <option <?php echo ($yr == "3") ? "selected" : "" ?> value="3">3</option>
                                                        <option <?php echo ($yr == "4") ? "selected" : "" ?> value="4">4</option>
                                                        <option <?php echo ($yr == "5") ? "selected" : "" ?> value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <h6 for="section" class="form-label">Section</h6>
                                                    <input type="text" class="form-control" name="section" id="section" value="<?php echo ($sec); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-1 g-2">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <h6 for="college" class="form-label">College</h6>
                                                    <select class="form-select mb-3" name="college" id="col-s">
                                                        <option <?php echo ($col == "College of Architecture and Fine Arts (CAFA)") ? "selected" : "" ?> value="College of Architecture and Fine Arts (CAFA)" id="cafa">College of Architecture and Fine Arts (CAFA)</option>
                                                        <option <?php echo ($col == "College of Arts and Letters (CAL)") ? "selected" : "" ?> value="College of Arts and Letters (CAL)"id="cal">College of Arts and Letters (CAL)</option>
                                                        <option <?php echo ($col == "College of Business Administration (CBA)") ? "selected" : "" ?> value="College of Business Administration (CBA)" id="cba">College of Business Administration (CBA)</option>
                                                        <option <?php echo ($col == "College of Criminal Justice Education (CCJE)") ? "selected" : "" ?> value="College of Criminal Justice Education (CCJE)" id="ccje">College of Criminal Justice Education (CCJE)</option>
                                                        <option <?php echo ($col == "College of Hospitality and Tourism Management (CHTM)") ? "selected" : "" ?> value="College of Hospitality and Tourism Management (CHTM)" id="chtm">College of Hospitality and Tourism Management (CHTM)</option>
                                                        <option <?php echo ($col == "College of Information and Communications Technology (CICT)") ? "selected" : "" ?> value="College of Information and Communications Technology (CICT)" id="cict">College of Information and Communications Technology (CICT)</option>
                                                        <option <?php echo ($col == "College of Industrial Technology (CIT)") ? "selected" : "" ?> value="College of Industrial Technology (CIT)" id="cit">College of Industrial Technology (CIT)</option>
                                                        <option <?php echo ($col == "College of Law (CLAW)") ? "selected" : "" ?> value="College of Law (CLAW)" id="claw">College of Law (CLAW)</option>
                                                        <option <?php echo ($col == "College of Nursing (CN)") ? "selected" : "" ?> value="College of Nursing (CN)" id="cn1">College of Nursing (CN)</option>
                                                        <option <?php echo ($col == "College of Engineering (COE)") ? "selected" : "" ?> value="College of Engineering (COE)" id="coe">College of Engineering (COE)</option>
                                                        <option <?php echo ($col == "College of Education (COED)") ? "selected" : "" ?> value="College of Education (COED)" id="coed">College of Education (COED)</option>
                                                        <option <?php echo ($col == "College of Science (CS)") ? "selected" : "" ?> value="College of Science (CS)" id="cs">College of Science (CS)</option>
                                                        <option <?php echo ($col == "College of Sports Exercise and Recreation (CSER)") ? "selected" : "" ?> value="College of Sports Exercise and Recreation (CSER)" id="cser">College of Sports Exercise and Recreation (CSER)</option>
                                                        <option <?php echo ($col == "College of Social Sciences and Philosophy (CSSP)") ? "selected" : "" ?> value="College of Social Sciences and Philosophy (CSSP)" id="cssp">College of Social Sciences and Philosophy (CSSP)</option>
                                                        <option <?php echo ($col == "Graduate School (GS)") ? "selected" : "" ?> value="Graduate School (GS)" id="gs">Graduate School (GS)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-1 g-2">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <h6 for="course" class="form-label">Course</h6>
                                                    <select class="form-select mb-3" name="course">
                                                        <div class="op1" name="College of Architecture and Fine Arts (CAFA)" id="cafa">
                                                            <option class="cafa1--hidden" <?php echo ($course == "Bachelor of Science in Architecture") ? "selected" : "" ?> value="Bachelor of Science in Architecture" id="cafa1">Bachelor of Science in Architecture</option>
                                                            <option class="cafa2--hidden" <?php echo ($course == "Bachelor of Landscape Architecture") ? "selected" : "" ?> value="Bachelor of Landscape Architecture" id="cafa2">Bachelor of Landscape Architecture</option>
                                                            <option class="cafa3--hidden" <?php echo ($course == "Bachelor of Fine Arts Major in Visual Communication") ? "selected" : "" ?> value="Bachelor of Fine Arts Major in Visual Communication" id="cafa3">Bachelor of Fine Arts Major in Visual Communication</option>
                                                        </div>
                                                        <div class="op2" name="College of Arts and Letters (CAL)" id="cal">
                                                            <option class="cal1" <?php echo ($course == "Bachelor of Arts in Broadcasting") ? "selected" : "" ?> value="Bachelor of Arts in Broadcasting" id="cal1">Bachelor of Arts in Broadcasting</option>
                                                            <option class="cal2" <?php echo ($course == "Bachelor of Arts in Journalism") ? "selected" : "" ?> value="Bachelor of Arts in Journalism" id="cal2">Bachelor of Arts in Journalism</option>
                                                            <option class="cal3" <?php echo ($course == "Bachelor of Performing Arts (Theater Track)") ? "selected" : "" ?> value="Bachelor of Performing Arts (Theater Track)" id="cal3">Bachelor of Performing Arts (Theater Track)</option>
                                                            <option class="cal4" <?php echo ($course == "Batsilyer ng Sining sa Malikhaing Pagsulat") ? "selected" : "" ?> value="Batsilyer ng Sining sa Malikhaing Pagsulat" id="cal4">Batsilyer ng Sining sa Malikhaing Pagsulat</option>
                                                        </div>
                                                        <div name="College of Business Administration (CBA)" id="cba">
                                                            <option class="cba1" <?php echo ($course == "Bachelor of Science in Business Administration Major in Business Economics") ? "selected" : "" ?> value="Bachelor of Science in Business Administration Major in Business Economics" id="cba1">Bachelor of Science in Business Administration Major in Business Economics</option>
                                                            <option class="cba2" <?php echo ($course == "Bachelor of Science in Business Administration Major in Financial Management") ? "selected" : "" ?> value="Bachelor of Science in Business Administration Major in Financial Management" id="cba2">Bachelor of Science in Business Administration Major in Financial Management</option>
                                                            <option class="cba3" <?php echo ($course == "Bachelor of Science in Business Administration Major in Marketing Management") ? "selected" : "" ?> value="Bachelor of Science in Business Administration Major in Marketing Management" id="cba3">Bachelor of Science in Business Administration Major in Marketing Management</option>
                                                            <option class="cba4" <?php echo ($course == "Bachelor of Science in Entrepreneurship") ? "selected" : "" ?> value="Bachelor of Science in Entrepreneurship" id="cba4">Bachelor of Science in Entrepreneurship</option>
                                                            <option class="cba5" <?php echo ($course == "Bachelor of Science in Accountancy") ? "selected" : "" ?> value="Bachelor of Science in Accountancy" id="cba5">Bachelor of Science in Accountancy</option>
                                                        </div>
                                                        <div name="College of Criminal Justice Education (CCJE)" id="ccje">
                                                            <option class="ccje1" <?php echo ($course == "Bachelor of Arts in Legal Management") ? "selected" : "" ?> value="Bachelor of Arts in Legal Management" id="ccje1">Bachelor of Arts in Legal Management</option>
                                                            <option class="ccje2" <?php echo ($course == "Bachelor of Science in Criminology") ? "selected" : "" ?> value="Bachelor of Science in Criminology" id="ccje2">Bachelor of Science in Criminology</option>
                                                        </div>
                                                        <div name="College of Hospitality and Tourism Management (CHTM)" id="chtm">
                                                            <option class="chtm1" <?php echo ($course == "Bachelor of Science in Hospitality Management") ? "selected" : "" ?> value="Bachelor of Science in Hospitality Management" id="chtm1">Bachelor of Science in Hospitality Management</option>
                                                            <option class="chtm2" <?php echo ($course == "Bachelor of Science in Tourism Management") ? "selected" : "" ?> value="Bachelor of Science in Tourism Management" id="chtm2">Bachelor of Science in Tourism Management</option>
                                                        </div>
                                                        <div name="College of Information and Communications Technology (CICT)" id="cict">
                                                            <option class="cict1" <?php echo ($course == "Bachelor of Science in Information Technology") ? "selected" : "" ?> value="Bachelor of Science in Information Technology" id="cict1">Bachelor of Science in Information Technology</option>
                                                            <option class="cict2" <?php echo ($course == "Bachelor of Library and Information Science") ? "selected" : "" ?> value="Bachelor of Library and Information Science" id="cict2">Bachelor of Library and Information Science</option>
                                                            <option class="cict3" <?php echo ($course == "Bachelor of Science in Information System") ? "selected" : "" ?> value="Bachelor of Science in Information System" id="cict3">Bachelor of Science in Information System</option>
                                                        </div>
                                                        <div name="College of Industrial Technology (CIT)" id="cit">
                                                            <option class="cit1" <?php echo ($course == "Bachelor of Industrial Technology with specialization in Automotive") ? "selected" : "" ?> value="Bachelor of Industrial Technology with specialization in Automotive" id="cit1">Bachelor of Industrial Technology with specialization in Automotive</option>
                                                            <option class="cit2" <?php echo ($course == "Bachelor of Industrial Technology with specialization in Computer") ? "selected" : "" ?> value="Bachelor of Industrial Technology with specialization in Computer" id="cit2">Bachelor of Industrial Technology with specialization in Computer</option>
                                                            <option class="cit3" <?php echo ($course == "Bachelor of Industrial Technology with specialization in Drafting") ? "selected" : "" ?> value="Bachelor of Industrial Technology with specialization in Drafting" id="cit3">Bachelor of Industrial Technology with specialization in Drafting</option>
                                                            <option class="cit4" <?php echo ($course == "Bachelor of Industrial Technology with specialization in Electrical") ? "selected" : "" ?> value="Bachelor of Industrial Technology with specialization in Electrical" id="cit4">Bachelor of Industrial Technology with specialization in Electrical</option>
                                                            <option class="cit5" <?php echo ($course == "Bachelor of Industrial Technology with specialization in Electronics & Communication Technology") ? "selected" : "" ?> value="Bachelor of Industrial Technology with specialization in Electronics & Communication Technology" id="cit5">Bachelor of Industrial Technology with specialization in Electronics & Communication Technology</option>
                                                            <option class="cit6" <?php echo ($course == "Bachelor of Industrial Technology with specialization in Electronics Technology") ? "selected" : "" ?> value="Bachelor of Industrial Technology with specialization in Electronics Technology" id="cit6">Bachelor of Industrial Technology with specialization in Electronics Technology</option>
                                                            <option class="cit7" <?php echo ($course == "Bachelor of Industrial Technology with specialization in Food Processing Technology") ? "selected" : "" ?> value="Bachelor of Industrial Technology with specialization in Food Processing Technology" id="cit7">Bachelor of Industrial Technology with specialization in Food Processing Technology</option>
                                                            <option class="cit8" <?php echo ($course == "Bachelor of Industrial Technology with specialization in Mechanical") ? "selected" : "" ?> value="Bachelor of Industrial Technology with specialization in Mechanical" id="cit8">Bachelor of Industrial Technology with specialization in Mechanical</option>
                                                            <option class="cit9" <?php echo ($course == "Bachelor of Industrial Technology with specialization in Heating, Ventilation, Air Conditioning and Refrigeration Technology (HVACR)") ? "selected" : "" ?> value="Bachelor of Industrial Technology with specialization in Heating, Ventilation, Air Conditioning and Refrigeration Technology (HVACR)" id="cit9">Bachelor of Industrial Technology with specialization in Heating, Ventilation, Air Conditioning and Refrigeration Technology (HVACR)</option>
                                                            <option class="cit10" <?php echo ($course == "Bachelor of Industrial Technology with specialization in Mechatronics Technology") ? "selected" : "" ?> value="Bachelor of Industrial Technology with specialization in Mechatronics Technology" id="cit10">Bachelor of Industrial Technology with specialization in Mechatronics Technology</option>
                                                            <option class="cit11" <?php echo ($course == "Bachelor of Industrial Technology with specialization in Welding Technology") ? "selected" : "" ?> value="Bachelor of Industrial Technology with specialization in Welding Technology" id="cit11">Bachelor of Industrial Technology with specialization in Welding Technology</option>
                                                        </div>
                                                        <div name="College of Law (CLAw)" id="claw">
                                                            <option class="claw1" <?php echo ($course == "Bachelor of Laws") ? "selected" : "" ?> value="Bachelor of Laws" id="claw1">Bachelor of Laws</option>
                                                            <option class="claw2" <?php echo ($course == "Juris Doctor") ? "selected" : "" ?> value="Juris Doctor" id="claw2">Juris Doctor</option>
                                                        </div>
                                                        <div name="College of Nursing (CN)" id="cn">
                                                            <option class="cn1" <?php echo ($course == "Bachelor of Science in Nursing") ? "selected" : "" ?> value="Bachelor of Science in Nursing" id="cn1">Bachelor of Science in Nursing</option>
                                                        </div>
                                                        <div name="College of Engineering (COE)" id="coe">
                                                            <option class="coe1" <?php echo ($course == "Bachelor of Science in Civil Engineering") ? "selected" : "" ?> value="Bachelor of Science in Civil Engineering" id="coe1">Bachelor of Science in Civil Engineering</option>
                                                            <option class="coe2" <?php echo ($course == "Bachelor of Science in Computer Engineering") ? "selected" : "" ?> value="Bachelor of Science in Computer Engineering" id="coe2">Bachelor of Science in Computer Engineering</option>
                                                            <option class="coe3" <?php echo ($course == "Bachelor of Science in Electrical Engineering") ? "selected" : "" ?> value="Bachelor of Science in Electrical Engineering" id="coe3">Bachelor of Science in Electrical Engineering</option>
                                                            <option class="coe4" <?php echo ($course == "Bachelor of Science in Electronics Engineering") ? "selected" : "" ?> value="Bachelor of Science in Electronics Engineering" id="coe4">Bachelor of Science in Electronics Engineering</option>
                                                            <option class="coe5" <?php echo ($course == "Bachelor of Science in Industrial Engineering") ? "selected" : "" ?> value="Bachelor of Science in Industrial Engineering" id="coe5">Bachelor of Science in Industrial Engineering</option>
                                                            <option class="coe6" <?php echo ($course == "Bachelor of Science in Manufacturing Engineering") ? "selected" : "" ?> value="Bachelor of Science in Manufacturing Engineering" id="coe6">Bachelor of Science in Manufacturing Engineering</option>
                                                            <option class="coe7" <?php echo ($course == "Bachelor of Science in Mechanical Engineering") ? "selected" : "" ?> value="Bachelor of Science in Mechanical Engineering" id="coe7">Bachelor of Science in Mechanical Engineering</option>
                                                            <option class="coe8" <?php echo ($course == "Bachelor of Science in Mechatronics Engineering") ? "selected" : "" ?> value="Bachelor of Science in Mechatronics Engineering" id="coe8">Bachelor of Science in Mechatronics Engineering</option>
                                                        </div>
                                                        <div name="College of Education (COED)" id="coed">
                                                            <option class="coed1" <?php echo ($course == "Bachelor of Elementary Education") ? "selected" : "" ?> value="Bachelor of Elementary Education" id="coed1">Bachelor of Elementary Education</option>
                                                            <option class="coed2" <?php echo ($course == "Bachelor of Early Childhood Education") ? "selected" : "" ?> value="Bachelor of Early Childhood Education" id="coed2">Bachelor of Early Childhood Education</option>
                                                            <option class="coed3" <?php echo ($course == "Bachelor of Secondary Education Major in English minor in Mandarin") ? "selected" : "" ?> value="Bachelor of Secondary Education Major in English minor in Mandarin" id="coed3">Bachelor of Secondary Education Major in English minor in Mandarin</option>
                                                            <option class="coed4" <?php echo ($course == "Bachelor of Secondary Education Major in Filipino") ? "selected" : "" ?> value="Bachelor of Secondary Education Major in Filipino" id="coed4">Bachelor of Secondary Education Major in Filipino</option>
                                                            <option class="coed5" <?php echo ($course == "Bachelor of Secondary Education Major in Sciences") ? "selected" : "" ?> value="Bachelor of Secondary Education Major in Sciences" id="coed5">Bachelor of Secondary Education Major in Sciences</option>
                                                            <option class="coed6" <?php echo ($course == "Bachelor of Secondary Education Major in Mathematics") ? "selected" : "" ?> value="Bachelor of Secondary Education Major in Mathematics" id="coed6">Bachelor of Secondary Education Major in Mathematics</option>
                                                            <option class="coed7" <?php echo ($course == "Bachelor of Secondary Education Major in Social Studies") ? "selected" : "" ?> value="Bachelor of Secondary Education Major in Social Studies" id="coed7">Bachelor of Secondary Education Major in Social Studies</option>
                                                            <option class="coed8" <?php echo ($course == "Bachelor of Secondary Education Major in Values Education") ? "selected" : "" ?> value="Bachelor of Secondary Education Major in Values Education" id="coed8">Bachelor of Secondary Education Major in Values Education</option>
                                                            <option class="coed9" <?php echo ($course == "Bachelor of Physical Education") ? "selected" : "" ?> value="Bachelor of Physical Education" id="coed9">Bachelor of Physical Education</option>
                                                            <option class="coed10" <?php echo ($course == "Bachelor of Technology and Livelihood Education Major in Industrial Arts") ? "selected" : "" ?> value="Bachelor of Technology and Livelihood Education Major in Industrial Arts" id="coed10">Bachelor of Technology and Livelihood Education Major in Industrial Arts</option>
                                                            <option class="coed11" <?php echo ($course == "Bachelor of Technology and Livelihood Education Major in Information and Communication Technology") ? "selected" : "" ?> value="Bachelor of Technology and Livelihood Education Major in Information and Communication Technology" id="coed11">Bachelor of Technology and Livelihood Education Major in Information and Communication Technology</option>
                                                            <option class="coed12" <?php echo ($course == "Bachelor of Technology and Livelihood Education Major in Home Economics") ? "selected" : "" ?> value="Bachelor of Technology and Livelihood Education Major in Home Economics" id="coed12">Bachelor of Technology and Livelihood Education Major in Home Economics</option>
                                                        </div>
                                                        <div name="College of Science (CS)" id="cs">
                                                            <option class="cs1" <?php echo ($course == "Bachelor of Science in Biology") ? "selected" : "" ?> value="Bachelor of Science in Biology" id="cs1">Bachelor of Science in Biology</option>
                                                            <option class="cs2" <?php echo ($course == "Bachelor of Science in Environmental Science") ? "selected" : "" ?> value="Bachelor of Science in Environmental Science" id="cs2">Bachelor of Science in Environmental Science</option>
                                                            <option class="cs3" <?php echo ($course == "Bachelor of Science in Food Technology") ? "selected" : "" ?> value="Bachelor of Science in Food Technology" id="cs3">Bachelor of Science in Food Technology</option>
                                                            <option class="cs4" <?php echo ($course == "Bachelor of Science in Math with Specialization in Computer Science") ? "selected" : "" ?> value="Bachelor of Science in Math with Specialization in Computer Science" id="cs4">Bachelor of Science in Math with Specialization in Computer Science</option>
                                                            <option class="cs5" <?php echo ($course == "Bachelor of Science in Math with Specialization in Applied Statistics") ? "selected" : "" ?> value="Bachelor of Science in Math with Specialization in Applied Statistics" id="cs5">Bachelor of Science in Math with Specialization in Applied Statistics</option>
                                                            <option class="cs6" <?php echo ($course == "Bachelor of Science in Math with Specialization in Business Applications") ? "selected" : "" ?> value="BBachelor of Science in Math with Specialization in Business Applications" id="cs6">Bachelor of Science in Math with Specialization in Business Applications</option>
                                                        </div>
                                                        <div name="College of Sports, Exercise and Recreation (CSER)" id="cser">
                                                            <option class="cser1" <?php echo ($course == "Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Coaching") ? "selected" : "" ?> value="Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Coaching" id="cser1">Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Coaching</option>
                                                            <option class="cser2" <?php echo ($course == "Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Management Certificate of Physical Education") ? "selected" : "" ?> value="Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Management Certificate of Physical Education" id="cser2">Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Management Certificate of Physical Education</option>
                                                        </div>
                                                        <div name="College of Social Sciences and Philosophy (CSSP)" id="cssp">
                                                            <option class="cssp1" <?php echo ($course == "Bachelor of Public Administration") ? "selected" : "" ?> value="Bachelor of Public Administration" id="cssp1">Bachelor of Public Administration</option>
                                                            <option class="cssp2" <?php echo ($course == "Bachelor of Science in Social Work") ? "selected" : "" ?> value="Bachelor of Science in Social Work" id="cssp2">Bachelor of Science in Social Work</option>
                                                            <option class="cssp3" <?php echo ($course == "Bachelor of Science in Psychology") ? "selected" : "" ?> value="Bachelor of Science in Psychology" id="cssp3">Bachelor of Science in Psychology</option>
                                                        </div>
                                                        <div name="Graduate School (GS)" id="gs">
                                                            <option class="gs1" <?php echo ($course == "Doctor of Education") ? "selected" : "" ?> value="Doctor of Education" id="gs1">Doctor of Education</option>
                                                            <option class="gs2" <?php echo ($course == "Doctor of Philosophy") ? "selected" : "" ?> value="Doctor of Philosophy" id="gs2">Doctor of Philosophy</option>
                                                            <option class="gs3" <?php echo ($course == "Doctor of Public Administration") ? "selected" : "" ?> value="Doctor of Public Administration" id="gs3">Doctor of Public Administration</option>
                                                            <option class="gs4" <?php echo ($course == "Master in Physical Education") ? "selected" : "" ?> value="Master in Physical Education" id="gs4">Master in Physical Education</option>
                                                            <option class="gs5" <?php echo ($course == "Master in Public Administration") ? "selected" : "" ?> value="Master in Public Administration" id="gs5">Master in Public Administration</option>
                                                            <option class="gs6" <?php echo ($course == "Master of Arts in Education") ? "selected" : "" ?> value="Master of Arts in Education" id="gs6">Master of Arts in Education</option>
                                                            <option class="gs7" <?php echo ($course == "Master of Engineering Program") ? "selected" : "" ?> value="Master of Engineering Program" id="gs7">Master of Engineering Program</option>
                                                            <option class="gs8" <?php echo ($course == "Master of Industrial Technology Management") ? "selected" : "" ?> value="Master of Industrial Technology Management" id="gs8">Master of Industrial Technology Management</option>
                                                            <option class="gs9" <?php echo ($course == "Master of Science in Civil Engineering") ? "selected" : "" ?> value="Master of Science in Civil Engineering" id="gs9">Master of Science in Civil Engineering</option>
                                                            <option class="gs10" <?php echo ($course == "Master of Science in Computer Engineering") ? "selected" : "" ?> value="Master of Science in Computer Engineering" id="gs10">Master of Science in Computer Engineering</option>
                                                            <option class="gs11" <?php echo ($course == "Master of Science in Electronics and Communications Engineering") ? "selected" : "" ?> value="Master of Science in Electronics and Communications Engineering" id="gs11">Master of Science in Electronics and Communications Engineering</option>
                                                            <option class="gs12" <?php echo ($course == "Master of Information Technology") ? "selected" : "" ?> value="Master of Information Technology" id="gs12">Master of Information Technology</option>
                                                            <option class="gs13" <?php echo ($course == "Master of Manufacturing Engineering") ? "selected" : "" ?> value="Master of Manufacturing Engineering" id="gs13">Master of Manufacturing Engineering</option>
                                                        </div>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <script src="js/college.js"></script>
                                    </div>
                                    
                                <div id="credential" class="py-3 mb-5">
                                    <h2 class="mb-3">Credentials</h2>
                                    <?php 
                                    if($type == "student"){
                                        echo ('
                                            <div class="mb-3 pt-3">
                                        ');
                                    }else{
                                        echo ('
                                            <div class="d-none mb-3 pt-3">
                                        ');
                                    }
                                    ?>
                                                <h6>Certificate of Registration</h6>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control" value="<?php echo $cor?>" disabled>
                                                    <a class="btn btn-secondary px-3" target="_blank" href="viewcor.php?id=<?php echo $accno?>">View</a>
                                                </div>
                                        
                                                <div class="form-floating">
                                                    <input type="file" name="cor" accept="application/pdf" class="form-control" id="cor1" style="height: 80px;padding-top:40px; padding-left:40px">
                                                    <label>Update Certificate of Registration</label>
                                                    <div class="msg" id="message"></div>
                                                </div>
                                            </div>
                                            
                                    <div class="mb-3">
                                        <h6>Vaccination Card</h6>
                                        <div class="input-group mb-1">
                                            <input type="text" class="form-control" value="<?php echo ($vax); ?>" disabled>
                                            <a class='btn btn-secondary px-3' target="_blank" href='viewvax.php?id=<?php echo $accno ?>'>View</a>
                                        </div>
                                        <div class="form-floating">
                                            <input type="file" name="vax" accept="application/pdf" class="form-control" id="vax1" style="height: 80px;padding-top:40px; padding-left:40px">
                                            <label>Update Vaccination Card</label>
                                            <div class="msg" id="message"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h6>Valid ID Card</h6>
                                        <div class="input-group mb-1">
                                            <input type="text" class="form-control" value="<?php echo ($v_id); ?>" disabled>
                                            <a class='btn btn-secondary px-3' target="_blank" href='view_vid.php?id=<?php echo $accno ?>'>View</a>
                                        </div>
                                        <div class="form-floating">
                                            <input type="file" name="vid" accept="application/pdf" class="form-control" id="vid1" style="height: 80px;padding-top:40px; padding-left:40px">
                                            <label>Update Valid ID Card</label>
                                            <div class="msg" id="message"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="account" class="py-3 mb-5 mt-5 pt-5">
                                    <h2>Account Information</h2>
                                    <div class="row row-cols-1 row-cols-md-2 g-2 pt-3">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <h6 for="user" class="form-label">Username</h6>
                                                <input type="text" class="form-control" name="user" id="user" value="<?php echo ($user); ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <h6 for="email" class="form-label">Email</h6>
                                                <input type="email" class="form-control" name="email" id="email" value="<?php echo ($email); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h6 for="pass" class="form-label">Password</h6>
                                        <div class="input-group mb-1">
                                            <input type="password" class="form-control" name="pass" required>
                                            <button type="button" class='btn btn-secondary px-3' data-bs-toggle="collapse" data-bs-target="#changePass">Change Password</button>
                                        </div>
                                    </div>

                                    <div id="changePass" class="collapse">
                                        <div class="row row-cols-1 row-cols-md-2 g-2">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <h6 for="newPassword" class="form-label">New Password</h6>
                                                    <input type="password" class="form-control" name="npass" id="newPassword" minlength="8" required disabled>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <h6 for="confirmPassword" class="form-label">Re-type New Password</h6>
                                                    <input type="password" class="form-control" name="npass1" id="confirmPassword" minlength="8" required disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide='false'>
                <div class="toast-header">
                    <strong class="me-auto">Notification</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body py-3">
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#spinnerSave").hide();
            $("#changePass").on("show.bs.collapse", function() {
                $("#confirmPassword").removeAttr("disabled");
                $("#newPassword").removeAttr("disabled");
            });

            $("#changePass").on("hidden.bs.collapse", function() {
                $("#newPassword").attr("disabled", "disabled");
                $("#confirmPassword").attr("disabled", "disabled");
            });

            $("#profileForm").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "function/toupdate_p.php",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.status) {
                            $("#liveToast").addClass("text-bg-success");
                            $("#liveToast").removeClass("text-bg-danger");
                            location.reload();
                        } else {
                            $("#liveToast").removeClass("text-bg-success");
                            $("#liveToast").addClass("text-bg-danger");
                        }
                        $(".toast-body").html(response.msg);
                        $("#liveToast").toast("show");
                        $("#spinnerSave").hide();
                    },
                    error: function(response) {
                        console.error(response);
                        console.error(response.responseText);
                        $("#error").html(response.responseText);
                    }, beforeSend: function() {
                        $("#spinnerSave").show();
                    }
                });
            });
        });
    </script>

    <!-- Javascripts -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
