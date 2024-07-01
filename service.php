<?php
include('src/functions.php');
include('src/conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>O.W Skincare : Service</title>
    <?php include('src/head.php') ?>
</head>

<body>
    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <?php echo youAreHere("Service") ?>

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
                                                <th>Condition</th>
                                                <th>Fees</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM treatment");
                                            while ($row = mysqli_fetch_array($sql)) {
                                            ?>
                                                <tr>
                                                    <th scope="row"><?= $row['Treatment_name'] ?></th>
                                                    <td><?= $row['Treatment_cost'] ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="readmore_area">
                                        <a data-hover="Book Appointment" href="index.php"><span>Book Appointment</span></a>
                                    </div>
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
