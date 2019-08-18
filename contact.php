<?php include "assets/inc/include.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/inc/_header_scripts.php"; ?>
    <link rel="stylesheet" href="assets/css/jquery.colorpanel.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/contact-form-validation.js"></script>
</head>

<body>
    <?php
        include 'whatsapp.php';
    ?>

<?php include "assets/inc/_header.php"; ?>

    <div class="body-overlay" id="body-overlay"></div>
    <div class="search-popup" id="search-popup">
        <form action="http://idealbrothers.thesoftking.com/html/zoopark/zoopark/index.html" class="search-popup-form">
            <div class="form-element">
                <input type="text" class="input-field" placeholder="Search.....">
            </div>
            <button type="submit" class="submit-btn"><i class="fas fa-search"></i></button>
        </form>
    </div>

<section class="breadcumb-area breadcrumb-bg">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12">
                <div class="breadcumb-inner">
                    <h2 class="title">Contact Us</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="contact-page-content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-contact-info-box">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="content">
                        <h4 class="title">Address:</h4>
                        <span class="details">Pitre Estate, Karapur Sankhalim, Goa 403505</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-contact-info-box">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="content">
                        <h4 class="title">Phone</h4>
                        <span class="details">(+91) 93260 20694</span>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-contact-info-box">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="content">
                        <h4 class="title">Email Address</h4>
                        <span class="details">info@sharvrajecofarm.com</span>
                        <span class="details">contact@sharvrajecofarm.com</span>
                        <span class="details">sharvrajecofarm@gmail.com</span>

                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-map">
                    <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3843.3294961451156!2d73.99562121416369!3d15.574034656656135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbf974b5db87f91%3A0x8f7e31439d28ec88!2sSharvraj+Eco+Farm+Goa!5e0!3m2!1sen!2sin!4v1557221936243!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-bottom-inner">

                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="form-content-area">

                                <h3 class="title text-center">Contact Us</h3>
                                <div class="contact-form-wrapper">
                                    <div id="msgDiv" class="text-center text-capitalize"></div>
									 <form id="contactForm">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-element ">
                                                    <input type="text" id="c-name" name="name" placeholder="Name"
                                                        class="input-field borderd">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-element ">
                                                    <input type="tel" id="c-phone" name="phone" placeholder="Phone Number"
                                                        class="input-field borderd">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-element ">
                                                    <input type="email" id="c-email" name="email" placeholder="Email" class="input-field borderd">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <textarea rows="10" cols="30" id="c-message" name="message" placeholder="How can we help?"
                                                    class="input-field borderd textarea"></textarea>
                                            </div>
                                        </div>
                                        <input type="submit" id="c-send" class="submit-btn btn-rounded" value="Send a Message">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</section>

<?php include "assets/inc/_footer.php"; ?>


<?php include "assets/inc/_footer_scripts.php"; ?>

</body>
</html>


