<?php
include('src/functions.php');
include('src/conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>O.W Skincare : Appointments</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <?php
    include('src/session_check.php');
    echo youAreHere("Appointments");
  
    $id = $_SESSION['log']['Id'];
    if ($_SESSION['log1'] == "user") {
    ?>
        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="service-area">
                            <!-- Start Service Title -->
                            <div class="section-heading">
                                <h2>Skincare Consulatation</h2>
                                <div class="line"></div>
                            </div>
                            <div class="service-content">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Condition</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Delete<th>                          
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = mysqli_query($con, "SELECT * FROM treatment_appointment WHERE User_id='$id' ");
                                                while ($row = mysqli_fetch_array($sql)) {
                                                    $test = $row['Treatment_id'];
                                                    $sql2 = mysqli_query($con, "SELECT * FROM treatment WHERE Id='$test' ");
                                                    $row2 = mysqli_fetch_array($sql2);
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $row2['Treatment_name'] ?></th>
                                                        <td><?= $row['Treatment_date'] ?></td>
                                                        <td><?= $row['Treatment_time'] ?></td>
                                                        <td><a href="deleteapp.php?data=treatment&action=delete&id=<?= $row['Id']; ?>">Delete Appointment</a></td>
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
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                    <th>Delete</th>
                                                    <th>Links</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = mysqli_query($con, "SELECT * FROM doctor_appointment WHERE User_id='$id' ");
                                                while ($row = mysqli_fetch_array($sql)) {
                                                    $doc = $row['Doctor_id'];
                                                    $sql2 = mysqli_query($con, "SELECT * FROM doctor WHERE Id='$doc' ");
                                                    $row2 = mysqli_fetch_array($sql2);
                                                    $sql3 = mysqli_query($con, "SELECT * FROM channel WHERE Doctor_id ='$doc' ");
                                                    $row3 = mysqli_fetch_array($sql3);
                                                    $sts = $row['Status'];
                                                    
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $row2['Name'] ?></th>
                                                        <td><?= $row['App_date'] ?></td>
                                                        <td><?= $row['App_time'] ?></td>
                                                        <?php
                                                        if ($sts == "Rejected") {
                                                        ?>
                                                            <td>Rejected by Doctor</td>
                                                            <td>
                                                                <a href="deleteapp.php?data=doctor&action=delete&id=<?= $row['Id']; ?>">Delete Appointment</a>
                                                            </td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td><a href="<?= $row['Report'] ?>" target="_blank">Pending</a></td>
                                                            <td>
                                                                <a href="deleteapp.php?data=doctor&action=delete&id=<?= $row['Id']; ?>">Delete Appointment</a>
                                                            </td>
                                                            <td><a href ="<?= $row3['Channel_room'] ?>" target="_blank">Download</a></td>
                                                        <?php
                                                        }
                                                        ?>
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
    <?php
    } else if ($_SESSION['log1'] == "doctor") {
        $status = "Rejected";
        if (isset($_POST['ok'])) {
        $room = $_POST['room'];
        $qry = mysqli_query($con, "INSERT INTO channel (Channel_room, Doctor_id) VALUES ('$room', '$id')");
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
              
    ?>
        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="service-area">
                            <!-- Start Service Title -->
                            <div class="section-heading">
                                <h2>Appointments</h2>
                                <div class="line"></div>
                            </div>
                            <div class="service-content">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Patient</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Action</th>
                                                    <th>Consulatation Channel</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = mysqli_query($con, "SELECT * FROM doctor_appointment WHERE Doctor_id='$id' and Status!='$status' ");
                                                while ($row = mysqli_fetch_array($sql)) {
                                                    $sts = $row['Status'];
                                                    $user = $row['User_id'];
                                                    $sql2 = mysqli_query($con, "SELECT * FROM user WHERE Id='$user' ");
                                                    $row2 = mysqli_fetch_array($sql2);
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $row2['Name'] ?></th>
                                                        <td><?= $row['App_date'] ?></td>
                                                        <td><?= $row['App_time'] ?></td>
                                                        <td><a href="deleteapp.php?data=doctor&action=reject&id=<?= $row['Id']; ?>">Decline</a></td>
                                                        <td><form class="appointment-form" method="post">
                                                        <input type="text" class="wp-form-control wpcf7-text" name="room">
                                                            <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                                                                <i class="button__icon fa fa-share"></i><span>Send</span>
                                                            </button>
                                                            </form>
                                                        </td>
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
    <?php
    }
    ?>

    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
