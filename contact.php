<?php include('src/functions.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>O.W Skincare : Contact</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <?php echo youAreHere("Contact") ?>
    <!--=========== BEGIN Google Map SECTION ================-->
    <section id="googleMap">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6700.511281353013!2d101.6958045824186!3d3.0550776575378116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4abb795025d9%3A0x1c37182a714ba968!2sAsia%20Pacific%20University%20of%20Technology%20%26%20Innovation%20(APU)!5e0!3m2!1sen!2smy!4v1672650480608!5m2!1sen!2smy" width="100%" height="500" frameborder="0" style="border:0"></iframe>
    </section>
    <!--=========== END Google Map SECTION ================-->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <div class="contact-form">
                        <div class="section-heading">
                            <h2>Contact Us</h2>
                            <div class="line"></div>
                        </div>
                        <p>Please fill out the empty field below to send a message.</p>
                        <form class="submitphoto_form" method="post" action="sendmail.php">
                            <input type="text" class="wp-form-control wpcf7-text" placeholder="Your name" name="nam">
                            <input type="email" class="wp-form-control wpcf7-email" placeholder="Email address" name="from">
                            <input type="text" class="wp-form-control wpcf7-text" placeholder="Subject" name="sub">
                            <textarea class="wp-form-control wpcf7-textarea" cols="30" rows="10" placeholder="What would you like to tell us" name="mess"></textarea>
                            <button class="wpcf7-submit button--itzel" type="submit"><i class="button__icon fa fa-envelope"></i><span>Send Message</span></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="contact-address">
                        <div class="section-heading">
                            <h2>Contacts Information</h2>
                            <div class="line"></div>
                        </div>
                        <p>Take a moment to learn more about our consultants, their qualifications, expertise and how they’ll guide you with contact below.</p>
                        <address class="contact-info">
                            <p><span class="fa fa-home"></span>Asia Pacific University, 57000 Kuala Lumpur 
                                <i>Malaysia </i></p>
                            <p><span class="fa fa-phone"></span>+60 19-372-1201</p>
                            <p><span class="fa fa-envelope"></span>zhanwei0629@hotmail.com</p>
                        </address>
                        <h3>Social Media</h3>
                        <div class="social-share">
                            <ul>
                                <li><a href="https://www.facebook.com/"><span class="fa fa-facebook"></span></a>
                                </li>
                                <li><a href="https://twitter.com/"><span class="fa fa-twitter"></span></a>
                                </li>
                                <li><a href="https://github.com/"><span class="fa fa-github"></span></a></li>
                                <li><a href="https://www.linkedin.com/"><span class="fa fa-linkedin"></span></a></li>
                            </ul>
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
