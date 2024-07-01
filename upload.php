<?php
include('src/conn.php');
include('src/functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>O.W Skincare : Upload</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <?php
    include('src/session_check.php');
    echo youAreHere("Upload");
    ?>

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <!-- Start Service Title -->
                        <div class="section-heading">
                            <h2>Skincare Appointment</h2>
                            <div class="line"></div>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Condition</th>
                                                <th>Patient</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Upload</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM treatment_appointment ");
                                            while ($row = mysqli_fetch_array($sql)) {
                                                $test = $row['Treatment_id'];
                                                $sql2 = mysqli_query($con, "SELECT * FROM treatment WHERE Id='$test' ");
                                                $row2 = mysqli_fetch_array($sql2);
                                                $user = $row['User_id'];
                                                $sql3 = mysqli_query($con, "SELECT * FROM user WHERE Id='$user' ");
                                                $row3 = mysqli_fetch_array($sql3);
                                            ?>
                                                <tr>
                                                    <th scope="row"><?= $row2['Treatment_name'] ?></th>
                                                    <td><?= $row3['Name'] ?></td>
                                                    <td><?= $row['Treatment_date'] ?></td>
                                                    <td><?= $row['Treatment_time'] ?></td>
                                                    <td><a href="uploadcode.php?data=treatment&id=<?= $row['Id'] ?>">Upload</a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <!-- Start Service Title -->
                        <div class="section-heading">
                            <h2>Doctor Appointment</h2>
                            <div class="line"></div>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Doctor</th>
                                                <th>Patient</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Upload</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM doctor_appointment");
                                            while ($row = mysqli_fetch_array($sql)) {
                                                $doc = $row['Doctor_id'];
                                                $sql2 = mysqli_query($con, "SELECT * FROM doctor WHERE Id='$doc' ");
                                                $row2 = mysqli_fetch_array($sql2);
                                                $user = $row['User_id'];
                                                $sql3 = mysqli_query($con, "SELECT * FROM user WHERE Id='$user' ");
                                                $row3 = mysqli_fetch_array($sql3);
                                            ?>
                                                <tr>
                                                    <th scope="row"><?= $row2['Name'] ?></th>
                                                    <td><?= $row3['Name'] ?></td>
                                                    <td><?= $row['App_date'] ?></td>
                                                    <td><?= $row['App_time'] ?></td>
                                                    <td><a href="uploadcode.php?data=doctor&id=<?= $row['Id'] ?>">Upload</a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
