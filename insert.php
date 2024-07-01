<?php
include('src/conn.php');
include('src/functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>O.W Skincare: Insert</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <?php
    echo youAreHere("Insert");
    include('src/session_check.php');

    $data = $_GET['data'];
    if (isset($_POST['ok'])) {
        $res;
        if ($data == 'treatment') {
            $treatname = $_POST['treatname'];
            $treatfee = $_POST['treatfee'];
            $res = mysqli_query($con, "INSERT INTO treatment (Treatment_name, Treatment_cost) VALUES ('$treatname','$treatfee')");
        } else if ($data == "doctor") {
            $name = $_POST['fname'] . " " . $_POST['lname'];
            $email = $_POST['mail'];
            $dob = $_POST['dob'];
            $gnd = $_POST['gnd'];
            $addr = $_POST['addr'];
            $phno = $_POST['phno'];
            $pwd = $_POST['pwd'];
            $fee = $_POST['fee'];
            $cat = $_POST['category'];
            $res = mysqli_query($con, "INSERT INTO doctor (Name, Email, Dob, Gender, Address, Phone, Password, Salary, Category) VALUES ('$name','$email','$dob','$gnd','$addr','$phno','$pwd','$fee','$cat')");
        }
        if ($res == 1) {
            echo '
                <script>
                alert("Insertion Sucesssful");
                window.location.href = "update.php";
                </script>
                ';
        } else {
            echo '
                <script>
                alert("Insertion Unsucesssful");
                </script>
                ';
        }
    }
    if ($data == 'treatment') {
    ?>
        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="service-area">
                            <!-- Start Service Title -->
                            <div class="section-heading">
                                <h2>Add Treatment</h2>
                                <div class="line"></div>
                            </div>
                            <div class="service-content">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <form class="appointment-form" method="post">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Name <span class="required">*</span></label>
                                                    <input type="text" class="wp-form-control wpcf7-text" name="treatname">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Fees <span class="required">*</span></label>
                                                    <input type="number" class="wp-form-control wpcf7-text" name="treatfee">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                                                        <i class="button__icon fa fa-share"></i><span>Add</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    } else if ($data == 'doctor') {
    ?>
        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="service-area">
                            <!-- Start Service Title -->
                            <div class="section-heading">
                                <h2>Add Doctor</h2>
                                <div class="line"></div>
                            </div>
                            <div class="service-content">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <form class="appointment-form" method="post">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-4 col-md-4 col-sm-6">
                                                    <label class="control-label">First name <span class="required">*</span>
                                                    </label>
                                                    <input type="text" class="wp-form-control wpcf7-text" placeholder="First name" name="fname" required pattern="[A-Za-z-0-9]+">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6">
                                                    <label class="control-label">Last name <span class="required">*</span>
                                                    </label>
                                                    <input type="text" class="wp-form-control wpcf7-text" placeholder="Last name" name="lname" required pattern="[A-Za-z-0-9]+">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Email <span class="required">*</span></label>
                                                    <input type="email" class="wp-form-control wpcf7-text" placeholder="Email address" name="mail">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Date of Birth <span class="required">*</span></label>
                                                    <input type="date" class="wp-form-control wpcf7-text" placeholder="dd/mm/yy" max="<?= date("Y-m-d") ?>" name="dob">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Gender <span class="required">*</span></label>
                                                    <select class="wp-form-control wpcf7-text" name="gnd" required>
                                               
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Address <span class="required">*</span></label>
                                                    <input type="text" class="wp-form-control wpcf7-text" placeholder="Address" name="addr">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Phone <span class="required">*</span></label>
                                                    <input type="number" class="wp-form-control wpcf7-text" placeholder="Phone No" name="phno">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Password <span class="required">*</span></label>
                                                    <input type="password" class="wp-form-control wpcf7-text" placeholder="Password" name="pwd">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Salary <span class="required">*</span></label>
                                                    <input type="text" class="wp-form-control wpcf7-text" placeholder="Salary" name="fee">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Category <span class="required">*</span></label>
                                                    <input type="text" class="wp-form-control wpcf7-text" placeholder="Category" name="category">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                                                        <i class="button__icon fa fa-share"></i><span>Add</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
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
