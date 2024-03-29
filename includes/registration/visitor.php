<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Registration</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/registration.css">
</head>

<body>
    <div class="glass-effect d-flex align-items-center vh-100">
        <div class="container py-3 px-5 form-signin text-white" style="width: 750px;">
            <div class="mb-3 text-center">
                <img class="" src="../../resources/bulsulogo.png" alt="" height="50">
                <h3 class="m-1">BulSU Gatepass</h3>
                <h5 class="mb-3 text-uppercase">Visitor Registration</h5>
            </div>
            <div class="progress mb-3" style="height: 4px;">
                <div class="progress-bar" role="progressbar" style="width: 50%;"></div>
            </div>
            <i>Note: All fields indicated with an asterisk (*) are required.</i>
            <form id="registrationForm">
                <input type="hidden" name="userType" value="visitor">
                <div id="step1">
                    <div class="row row-cols-1 row-cols-md-3 g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name *</label>
                                <input type="text" class="form-control" name="first" id="firstName" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="middleName" class="form-label">Middle Initial (Optional)</label>
                                <input type="text" class="form-control" name="middle" id="middleName" >
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" name="last" id="lastName" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" name="email" id="email" required email>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="contactNumber" class="form-label">Contact Number *</label>
                                <input type="text" class="form-control" maxlength="11" minlength="11" placeholder="Ex: 09123456789" name="contact" id="contactNumber" required>
                            </div>
                        </div>
                        <?php 
                            //Get Current Time
                            $tz = 'Asia/Manila';
                            $timestamp = time();
                            $dt = new DateTime("now", new DateTimeZone($tz));
                            $dt->setTimestamp($timestamp);
                            $curdate = $dt->format('Y');
                            $maxdate = date('Y', strtotime($curdate . ' - 1 year'));
                            $dt2 =new DateTime('1st December 2021');
                            $dt2->modify('last day of this month');
                            $curdate2 = $dt2 -> format('m-d');
                        ?>
                        <div class="col">
                            <div class="mb-3">
                                <label for="birthdate" class="form-label">Date of Birth *</label>
                                <input type="date" class="form-control" name="dob" id="birthdate" max="<?php echo $maxdate.'-'.$curdate2 ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address *</label>
                                <input type="text" class="form-control" name="address" id="address" required>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-warning alertWarning"></div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                        <div class="form-text fw-bolder">Already have an account? <a href="../../index.php" class="text-info text-decoration-none" style="cursor: pointer;">Log in</a></div>
                        <button class="btn btn-primary me-md-2 px-5 nextBtn" data-ctr="1" type="button">Next</button>
                    </div>
                </div>
                <div id="step2">
                    <div class="row row-cols-1 row-cols-md-3 g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username *</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password * <span id="str-label" style="color:white;"></span></label>
                                <input type="password" class="form-control" name="pass" id="password" required minlength="8" required maxlength="64" >
                                <!-- <small class="text-secondary">Password must be at least 8 characters in length </small> -->
                                <!-- <small class="text-secondary">Password must be at least 64 characters as maximum length </small> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password *</label>
                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label for="profile" class="form-label">Account Profile Picture *</label>
                                <input type="file" accept="image/*" class="form-control" name="image" id="profile" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="vax" class="form-label">Vaccination Card *</label>
                                <input type="file" accept="image/*" class="form-control" name="vax" id="vax" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="vid" class="form-label">Valid ID Card *</label>
                                <input type="file" accept="image/*" class="form-control" name="vid" id="vid" required>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-danger" role="alert" id="errorAlert">
                    {{ errorMessage }}
                </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                        <div class="form-text fw-bolder">Already have an account? <a href="../../index.php" class="text-info text-decoration-none" style="cursor: pointer;">Log in</a></div>
                        <div>
                            <button class="btn btn-secondary me-md-2 px-5 prevBtn" data-ctr="2" type="button">Prev</button>
                            <button class="btn btn-primary me-md-2 px-5" type="submit">
                                <span>Register</span>
                                <div id="registerSpinner" class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>


            </form>
            <div class="alert alert-success mt-3" role="alert" id="successAlert">
                Registration Completed! Proceed to <a href="../../index.php" class="alert-link text-decoration-none">Log in page</a>.
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../../js/visitorRegistration.js"></script>
</body>

</html>
