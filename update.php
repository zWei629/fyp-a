<?php
include('src/conn.php');
include('src/functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>O.W Skincare : Update</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <?php
    include('src/session_check.php');
    echo youAreHere("Update");
    ?>

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <!-- Start Service Title -->
                        <div class="section-heading">
                            <h2>Consultation/Treatment</h2>
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
                                                <th>Edit</th>
                                                <th>Delete</th>
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
                                                    <td><a href="edit.php?data=treatment&id=<?= $row['Id']; ?>">Edit</a></td>
                                                    <td><a href="delete.php?data=treatment&id=<?= $row['Id']; ?>">Delete</a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="readmore_area">
                                        <a data-hover="Add New" href="insert.php?data=treatment"><span>Add New</span></a>
                                    </div>
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
                            <h2>Doctor</h2>
                            <div class="line"></div>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Doctor</th>
                                                <th>Salary</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM doctor");
                                            while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <th scope="row"><?= $row['Name'] ?></th>
                                                    <td><?= $row['Salary'] ?></td>
                                                    <td><a href="edit.php?data=doctor&id=<?= $row['Id']; ?>">Edit</a></td>
                                                    <td><a href="delete.php?data=doctor&id=<?= $row['Id']; ?>">Delete</a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="readmore_area">
                                        <a data-hover="Add New" href="insert.php?data=doctor"><span>Add New</span></a>
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
