<div class="container">

    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">My Dashboard</span>
            </a>
        </header>

        <div class="p-5 mb-4 bg-light shadow-sm rounded-3">
            <div class="row g-2">
                <div class="col-10">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <img src="resources/3.png" class="img-fluid rounded-circle">
                        </div>
                        <div class="col-8 d-flex align-items-center">
                            <div class="container-fluid py-5">
                                <small class="fw-bold text-secondary">221000001</small> <span class="badge text-bg-success">Verified</span>
                                <h1 class="display-5 fw-bold">Jose Leo Abuan</h1>
                                <h6><i class="fas fa-phone me-3"></i>09050778422</h6>
                                <h6><i class="fas fa-envelope me-3"></i>leoabuan112201@gmail.com</h6>
                                <h6 class="text-success text-uppercase"><i class="fas fa-users me-3"></i>Visitor</h6>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center border-1 p-1">
                    <div class="text-center">
                        <img src="Images/221000001.png" class="img-fluid mx-auto">
                        <button class="btn btn-sm btn-dark">Download</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-bg-dark rounded-3 shadow-sm">
                    <h2>Profile Summary</h2>
                    <div class="row row-cols-2">    
                        <div class="col">Contact Number: </div>
                        <div class="col">09050778422</div>
                        <div class="col">Email Address: </div>
                        <div class="col">leoabuan112201@gmail.com</div>
                        <div class="col">Address: </div>
                        <div class="col">Malolos</div>
                        <div class="col">Birthdate: </div>
                        <div class="col">December 19, 2000</div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3 shadow-sm">
                    <h2>Appointment Summary</h2>
                    <h4 class="text-primary">Friday, December 9, 2022</h4>
                    <ul>
                        <li>Request for Certificate of Registration</li>
                        <li>Request for Certificate of Grade</li>
                    </ul>
                </div>
            </div>
        </div>

        <?php
        $accno = $_SESSION["accno"];
        $select = "SELECT * FROM user_account WHERE acc_no = $accno";
        $result = mysqli_query($connect, $select);

        if (mysqli_num_rows($result) > 0) {
            if ($row = mysqli_fetch_assoc($result)) {
                if ($row['verification'] == "unverified") {
                    echo '
                    <div class="w-100 pt-4">
                        <div class="alert text-center fw-bold alert-warning shadow-sm" role="alert">
                            Your account is not yet fully verified. Please <a href="">verify</a> now.
                        </div>
                    </div>
                    <div class="titlepg" style="width:100%; padding-top:20px;">
                        <h1>My Dashboard</h1>
                    </div> 
                    ';
                } else if ($row['verification'] == "pending") {
                    echo '
                    <div class="w-100 pt-4">
                        <div class="alert text-center fw-bold alert-warning shadow" role="alert">
                            Your account verification status is pending. Please wait until your account is fully verified.
                        </div>
                    </div>
                    <div class="titlepg pt-4 w-100"">
                        <h1>My Dashboard</h1>
                    </div> 
                    ';
                } else {
                    echo '
                    <div class="titlepg" style="width:100%; padding-top:100px;">
                        <h1>My Dashboard</h1>
                    </div>
                ';
                }
            }
        }
        ?>
        <div class="container d-flex justify-content-center align-items-start" style="width:100%;height: 100%;">
            <?php

            $accno = $_SESSION["accno"];
            $select = "SELECT * FROM user_account WHERE acc_no = $accno";
            $result = mysqli_query($connect, $select);

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['type'] == "student") {
                        $qr = $row["qr"];
                        $img = $row["image"];
                        $type = $row["type"];
                        $bday = $row["birthday"];
                        $add = $row["address"];
                        $studno = $row["stud_no"];
                        $first = $row["first"];
                        $mid = $row["middle"];
                        $last = $row["last"];
                        $col = $row["college"];
                        $course = $row["course"];
                        $year = $row["year"];
                        $section = $row["section"];

                        $tempbday = date_create($bday);
                        $bday = date_format($tempbday, "F/d/Y");

                        echo ('
                        <div class="">
                            <div class="d-flex justify-content-left align-items-center" style="width:100%;">
                                <div style="width:60%">
                                    <img src="data:image;base64,' . $img . '"style="height:100%; width:100%; border-radius: 50%;">
                                </div>
                                <div class="d-flex justify-content-left align-items-left flex-column" style="padding-left:20px; width:100%">
                                    <div class="ctype">
                                    ' . strtoupper($type) . '
                                    </div>
                                    <div class="wc">
                                        Welcome! ' . ucfirst($first) . '
                                    </div>
                                </div>
                            </div>
                            <div style="width:100%;padding:40px 0;">
                    ');
                        if ($row['verification'] == "pending") {
                            echo '
                                <div class="status2">Pending Verification</div>
                            </div>
                        </div>
                        ';
                        } else if ($row['verification'] == "verified") {
                            echo '
                                <div class="status3">Verified</div>
                            </div>
                            <div class="d-none justify-content-center align-items-center flex-column" style="width:100%;">
                                <div>
                                    <h2>Your QR Code</h2>
                                </div>
                                <div>
                                    <img src="Images/' . $qr . '" height="150" width="150">
                                </div>
                            </div>
                        </div>
                        ';
                        } else {
                            echo '
                                <div class="status1">Unverified</div>
                            </div>
                        </div>
                        ';
                        }
                        echo ('
                        <div class"blur d-flex justify-content-center flex-column" style="width:90%; height:100%; padding-top:50px; padding-left:40px;">
                            <div class="d-flex justify-content-left align-items-start flex-column" style="width:100%; height:500px; border:1px solid black; padding:40px">
                                <div class="titleinfo" style="padding-bottom:10px;">
                                    <h2>Profile Summary</h2>
                                </div>
                                <div class="d-flex" style="width:100%;margin-bottom:auto;">
                                    <div class="t-info" style="width:100%;">
                                        <div class="info-d" style="padding:10px">
                                            Student Number:
                                        </div>
                                        <div class="info-d" style="padding:10px">
                                            Name:
                                        </div>
                                        <div class="info-d" style="padding:10px">
                                            College:
                                        </div>
                                        <div class="info-d" style="padding:10px">
                                            Course:
                                        </div>
                                        <div class="info-d" style="padding:10px">
                                            Year and Section:
                                        </div>
                                    </div>
                                    <div class="t-info" style="width:100%;">
                                        <div class="info-v" style="padding:10px">
                                            ' . $studno . '
                                        </div>
                                        <div class="info-v" style="padding:10px">
                                            ' . $first . ' ' . $mid . '. ' . $last . '
                                        </div>
                                        <div class="info-v" style="padding:10px">
                                            ' . $col . '
                                        </div>
                                        <div class="info-v" style="padding:10px">
                                            ' . $course . '
                                        </div>
                                        <div class="info-v" style="padding:10px">
                                            ' . $year . $section . '
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="width:100%;padding-top:10px;">
                                    <div class="infobtn">
                                        <button class="btn btn-secondary btn-sm" type="button" id="pf1">See More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none justify-content-left align-items-start flex-column" style="width:100%; height:100%; border:1px solid black; padding:40px; margin-top:40px;">
                                <div class="titleinfo" style="padding-bottom:10px;">
                                    Appointment Summary
                                </div>
                                <div class="d-flex justify-content-end" style="width:100%;padding-top:10px;">
                                    <div class="infobtn">
                                        <button class="btn btn-secondary btn-sm" type="button" id="ar1">See More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ');
                    } else if ($row['type'] == "employee") {
                        $qr = $row["qr"];
                        $img = $row["image"];
                        $type = $row["type"];
                        $empno = $row["emp_no"];
                        $first = $row["first"];
                        $mid = $row["middle"];
                        $last = $row["last"];
                        $col = "none";


                        $bday = $row["birthday"];
                        $add = $row["address"];
                        $tempbday = date_create($bday);
                        $bday = date_format($tempbday, "F/d/Y");

                        echo ('
                        <div class"d-flex justify-content-center" style="width:40%; height:100%; padding-top:50px;">
                            <div class="d-flex justify-content-left align-items-center" style="width:100%;">
                                <div style="width:60%">
                                    <img src="data:image;base64,' . $img . '"style="height:100%; width:100%; border-radius: 50%;">
                                </div>
                                <div class="d-flex justify-content-left align-items-left flex-column" style="padding-left:20px; width:100%">
                                    <div class="ctype">
                                    ' . strtoupper($type) . '
                                    </div>
                                    <div class="wc">
                                        Welcome! ' . ucfirst($first) . '
                                    </div>
                                </div>
                            </div>
                            <div style="width:100%;padding:40px 0;">
                    ');
                        if ($row['verification'] == "pending") {
                            echo '
                                <div class="status2">Pending Verification</div>
                            </div>
                        </div>
                        ';
                        } else if ($row['verification'] == "verified") {
                            echo '
                                <div class="status3">Verified</div>
                            </div>
                            <div class="d-none justify-content-center align-items-center flex-column" style="width:100%;">
                                <div>
                                    <h2>Your QR Code</h2>
                                </div>
                                <div>
                                    <img src="Images/' . $qr . '" height="150" width="150">
                                </div>
                            </div>
                        </div>
                        ';
                        } else {
                            echo '
                                <div class="status1">Unverified</div>
                            </div>
                        </div>
                        ';
                        }
                        echo ('
                        <div class"blur d-flex justify-content-center flex-column" style="width:90%; height:100%; padding-top:50px; padding-left:40px;">
                            <div class="d-flex justify-content-left align-items-start flex-column" style="width:100%; height:500px; border:1px solid black; padding:40px">
                                <div class="titleinfo" style="padding-bottom:10px;">
                                    Profile Summary
                                </div>
                                <div class="d-flex" style="width:100%;margin-bottom:auto;">
                                    <div class="t-info" style="width:100%;">
                                        <div class="info-d" style="padding:10px">
                                            Employee Number:
                                        </div>
                                        <div class="info-d" style="padding:10px">
                                            Name:
                                        </div>
                                    </div>
                                    <div class="t-info" style="width:100%;">
                                        <div class="info-v" style="padding:10px">
                                            ' . $empno . '
                                        </div>
                                        <div class="info-v" style="padding:10px">
                                            ' . $first . ' ' . $mid . '. ' . $last . '
                                        </div>
                                        <div class="info-v" style="padding:10px">
                                            ' . $bday . '
                                        </div>
                                        <div class="info-v" style="padding:10px">
                                            ' . $add . '
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="width:100%;padding-top:10px;">
                                    <div class="infobtn">
                                        <button class="btn btn-secondary btn-sm" type="button" id="pf2">See more</button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none justify-content-left align-items-start flex-column" style="width:100%; height:100%; border:1px solid black; padding:40px; margin-top:40px;">
                                <div class="titleinfo" style="padding-bottom:10px;">
                                    Appointment Summary
                                </div>
                                <div class="d-flex justify-content-end" style="width:100%;padding-top:10px;">
                                    <div class="infobtn">
                                        <button class="btn btn-secondary btn-sm" type="button" id="ar2">See more</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ');
                    } else if ($row['type'] == "visitor") {
                        $qr = $row["qr"];
                        $img = $row["image"];
                        $type = $row["type"];
                        $studno = $row["stud_no"];
                        $first = $row["first"];
                        $mid = $row["middle"];
                        $last = $row["last"];

                        $bday = $row["birthday"];
                        $add = $row["address"];
                        $tempbday = date_create($bday);
                        $bday = date_format($tempbday, "F d, Y");

                        echo ('
                        <div class"d-flex justify-content-center" style="width:40%; height:100%; padding-top:50px;">
                            <div class="d-flex justify-content-left align-items-center" style="width:100%;">
                                <div style="width:60%">
                                    <img src="data:image;base64,' . $img . '"style="height:100%; width:100%; border-radius: 50%;">
                                </div>
                                <div class="d-flex justify-content-left align-items-left flex-column" style="padding-left:20px; width:100%">
                                    <div class="ctype">
                                    ' . strtoupper($type) . '
                                    </div>
                                    <div class="wc">
                                        Welcome! ' . ucfirst($first) . '
                                    </div>
                                </div>
                            </div>
                            <div style="width:100%;padding:40px 0;">
                    ');
                        if ($row['verification'] == "pending") {
                            echo '
                                <div class="status2">Pending Verification</div>
                            </div>
                        </div>
                        ';
                        } else if ($row['verification'] == "verified") {
                            echo '
                                <div class="status3">Verified</div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center flex-column" style="width:100%;">
                                <div>
                                    <h2>Your QR Code</h2>
                                </div>
                                <div>
                                    <img src="Images/' . $qr . '" height="150" width="150">
                                </div>
                            </div>
                        </div>
                        ';
                        } else {
                            echo '
                                <div class="status1">Unverified</div>
                            </div>
                        </div>
                        ';
                        }
                        echo ('
                        <div class"blur d-flex justify-content-center flex-column" style="width:90%; height:100%; padding-top:50px; padding-left:40px;">
                            <div class=" d-flex justify-content-left align-items-start flex-column" style="width:100%; height:500px; border:1px solid black;padding:40px">
                                <div class="titleinfo" style="padding-bottom:10px;">
                                    Profile Summary 
                                </div>
                                <div class="d-flex" style="width:100%;height:100%;">
                                    <div class="t-info" style="width:100%;">
                                        <div class="info-d" style="padding:10px">
                                            Account Number:
                                        </div>
                                        <div class="info-d" style="padding:10px">
                                            Name:
                                        </div>
                                    </div>
                                    <div class="t-info" style="width:100%;">
                                        <div class="info-v" style="padding:10px">
                                            ' . $accno . '
                                        </div>
                                        <div class="info-v" style="padding:10px">
                                            ' . $first . ' ' . $mid . '. ' . $last . '
                                        </div>
                                        <div class="info-v" style="padding:10px">
                                            ' . $bday . '
                                        </div>
                                        <div class="info-v" style="padding:10px">
                                            ' . $add . '
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="width:100%;padding-top:10px;">
                                    <div class="infobtn">
                                        <button class="btn btn-secondary btn-sm" type="button" id="pf3">See more</button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-left align-items-start flex-column" style="width:100%; height:100%; border:1px solid black; padding:40px; margin-top:40px;">
                                <div class="titleinfo" style="padding-bottom:10px;">
                                    Appointment Summary
                                </div>
                                <div class="d-flex justify-content-end" style="width:100%;padding-top:10px;">
                                    <div class="infobtn">
                                        <button class="btn btn-secondary btn-sm" type="button" id="ar3">See more</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ');
                    } else {
                        echo "NO RESULTS FOUND.";
                    }
                }
            } else {
                echo "NO RESULTS FOUND.";
            }
            mysqli_close($connect);
            ?>
        </div>
    </div>
    <div class="py-4 mt-5 text-bg-dark text-center">
    </div>
