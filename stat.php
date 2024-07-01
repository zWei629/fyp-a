<?php
include('src/conn.php');
include('src/functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>O.W Skincare : Statistics</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <?php
    include('src/session_check.php');
    echo youAreHere("Statistics");
    ?>

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <!-- Start Service Title -->
                        <div class="section-heading">
                            <h2>Treatment</h2>
                            <div class="line"></div>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Treatment</th>
                                                <th>Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM treatment");
                                            while ($row = mysqli_fetch_array($sql)) {
                                                $test = $row['Id'];
                                                $count = mysqli_query($con, "SELECT COUNT(Treatment_id) FROM treatment_appointment WHERE Treatment_id='$test' ");
                                                $row2 = mysqli_fetch_array($count)
                                            ?>
                                                <tr>
                                                    <th scope="row"><?= $row['Treatment_name']; ?></th>
                                                    <td><?= $row2[0] ?></td>
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
