<?php include('src/conn.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>O.W Skincare : Home</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <!--=========== BEGIN SLIDER SECTION ================-->
    <?php include('src/slider.php') ?>
    <!--=========== END SLIDER SECTION ================-->

    <!--=========== BEGIN Top Feature SECTION ================-->
    <?php if (isset($_SESSION['log']) == "" or $_SESSION['log1'] == "user") {
        if (isset($_POST['ok'])) {
            if (isset($_SESSION['log']) == "") {
                echo '
                <script>
                  alert("Sign in First");
                  window.location.href = "signin.php";
                </script>
                ';
            } else {
                $id = $_SESSION['log']['Id'];
                $type = $_POST['type'];
                if ($type == 'treatment') {
                    $test = $_POST['treatment'];
                    $appdate = $_POST['appdate1'];
                    $apptime = date('H:i:s', strtotime($_POST['apptime1']));
                    $qry = mysqli_query($con, "INSERT INTO treatment_appointment (Treatment_id,Treatment_time,Treatment_date,User_id,Report) VALUES ('$test','$apptime','$appdate','$id','')");
                    if ($qry) {
                        echo '
                        <script>
                        alert("Appointment set Sucessfully");
                        window.location.href = "appointments.php";
                        </script>
                        ';
                    } else {
                        // echo "Error: " . mysqli_error($con);
                        echo '
                        <script>
                        alert("Appointment set Unsucessful RETRY!");
                        </script>
                        ';
                    }
                } else if ($type == 'doctor') {
                    $name = $_SESSION['log']['Name'];
                    $doc = $_POST['docname'];
                    $appdate = $_POST['appdate'];
                    $apptime = date('H:i:s', strtotime($_POST['apptime']));
                    $qry = mysqli_query($con, "INSERT INTO doctor_appointment (Doctor_id,App_date,App_time,User_id,User_name,Report,Status) VALUES ('$doc','$appdate','$apptime','$id','$name','','Accepted')");
                    if ($qry) {
                        echo '
                        <script>
                        alert("Appointment set Sucessfully");
                        window.location.href = "appointments.php";
                        </script>
                        ';
                    } else {
                        // echo "Error: " . mysqli_error($con);
                        echo '
                        <script>
                        alert("Appointment set Unsucessful RETRY!");
                        </script>
                        ';
                    }
                }
            }
        }
    ?>
        <section id="topFeature">
            <div class="row">
                <!-- Start Single Top Feature -->
                <div class="col-lg-4 col-md-4">
                    <div class="row">
                        <div class="single-top-feature">
                            <span class="fa fa-flask"></span>
                            <h3>Medical Skincare</h3>
                            <p>Why not give medical-grade, professional skincare a try by starting out with a curated kit or program?</p>
                            <div class="readmore_area">
                                <a data-hover="Read More" href="gallery.php"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Top Feature -->

                <!-- Start Single Top Feature -->
                <div class="col-lg-4 col-md-4">
                    <div class="row">
                        <div class="single-top-feature opening-hours">
                            <span class="fa fa-clock-o"></span>
                            <h3>Opening Hours</h3>
                            <p>Opening on all weekdays and weekend.</p>
                            <ul class="opening-table">
                                <li>
                                    <span>Monday - Friday</span>
                                    <div class="value">10.30 - 18.00</div>
                                </li>
                                <li>
                                    <span>Saturday</span>
                                    <div class="value">10.00 - 18.00</div>
                                </li>
                                <li>
                                    <span>Sunday</span>
                                    <div class="value">10.00 - 20.30</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Top Feature -->

                <!-- Start Single Top Feature -->
                <div class="col-lg-4 col-md-4">
                    <div class="row">
                        <div class="single-top-feature">
                            <span class="fa fa-hospital-o"></span>
                            <h3>Appointment</h3>
                            <p>Now booking an appointment is just a click away. Start
                                booking appointments now.</p>
                            <div class="readmore_area">
                                <a data-hover="Appoinment" data-target="#myModal" data-toggle="modal" href="#">
                                    <span>Appoinment</span>
                                </a>
                            </div>
                            <!-- start modal window -->
                            <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                                                &times;
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">Appoinment Details</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="appointment-area">
                                                <form class="appointment-form" method="post">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Appointment Date <span class="required">*</span>
                                                            </label>
                                                            <input type="Date" class="wp-form-control wpcf7-text" placeholder="mm/dd/yy" name="appdate1" min="<?= date("Y-m-d"); ?>" max="<?= date("Y-m+1-d"); ?>" required>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Appointment Time <span class="required">*</span>
                                                            </label>
                                                            <input type="time" class="wp-form-control wpcf7-text" placeholder="hh:mm" name="apptime1" required>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Select Treatment <span class="required">*</span>
                                                            </label>
                                                            <?php $sql = mysqli_query($con, "SELECT * FROM treatment") ?>
                                                            <select class="wp-form-control wpcf7-select" name="treatment" required>
                                                                <?php while ($row = mysqli_fetch_array($sql)) { ?>
                                                                    <option value="<?= $row['Id']; ?>"><?= $row['Treatment_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="type" value="treatment">
                                                    <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                                                        <i class="button__icon fa fa-share"></i><span>Book Appointment</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                &times;
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">Doctor Appoinment Details</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="appointment-area">
                                                <form class="appointment-form" method="post">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Appointment Date <span class="required">*</span>
                                                            </label>
                                                            <input type="date" class="wp-form-control wpcf7-text" placeholder="dd/mm/yy" name="appdate" min="<?= date("Y-m-d"); ?>" max="<?= date("Y-m+1-d"); ?>" required>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Appointment Time <span class="required">*</span>
                                                            </label>
                                                            <input type="Time" class="wp-form-control wpcf7-text" placeholder="hh:mm" name="apptime" required>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Select Doctor <span class="required">*</span>
                                                            </label>
                                                            <?php $sql1 = mysqli_query($con, "SELECT * FROM doctor"); ?>
                                                            <select class="wp-form-control wpcf7-select" name="docname" required>
                                                                <?php while ($row1 = mysqli_fetch_array($sql1)) { ?>
                                                                    <option value="<?= $row1['Id'] ?>"><?= $row1['Name'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="type" value="doctor">
                                                    <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                                                        <i class="button__icon fa fa-share"></i><span>Book Appointment</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                    </div>
                </div>
                <!-- End Single Top Feature -->
            </div>
        </section>
    <?php } ?>
    <!--=========== END Top Feature SECTION ================-->

    <!--=========== BEGIN Service SECTION ================-->
    <?php include('src/services.php') ?>
    <!--=========== End Service SECTION ================-->

    <!--=========== BEGAIN Why Choose Us SECTION ================-->
    <?php include('src/whychoose.php') ?>
    <!--=========== END Why Choose Us SECTION ================-->

    <!--=========== BEGAIN Counter SECTION ================-->
    <?php include('src/counter.php') ?> 
    <!--=========== End Counter SECTION ================-->

    <!--=========== BEGAIN Doctors SECTION ================-->
    <?php include('src/meet_our_doc.php') ?>
    <!--=========== End Doctors SECTION ================-->

    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
