<?php include "assets/inc/include.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "assets/inc/_header_scripts.php"; ?>
    <link rel="stylesheet" href="assets/css/jquery.colorpanel.css">
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
                    <h2 class="title">Gallery</h2>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="gallery-area">
    <div class="container">

        <div class="row">
            <div class="filterizr__elements">
                <?php
                    $galleryView = $db_handle->runQuery($sql_query->galleryViewD());
                    if (is_array($galleryView))
                    {
                        foreach ($galleryView as $pic)
                        {
                            ?>
                            <div class="filtr-item col-md-6 col-lg-4" data-category="elephant, giraffe, zebra">
                                <div class="inner-box">
                                    <div class="image">
                                        <img src="assets/img/gallery/<?php echo $pic['gallery_image']; ?>" alt="">
                                    </div>
                                    <div class="img-overlay">
                                        <div class="view-button text-center">
                                            <a href="assets/img/gallery/<?php echo $pic['gallery_image']; ?>" class="imagepopup"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="filtr-item col-md-6 col-lg-4" data-category="elephant, giraffe, zebra">
                            <div class="inner-box">
                                No Images Available
                            </div>
                        </div>
                        <?php
                    }
                ?>
                
            </div>
        </div>


    </div>
</div>

<?php include "assets/inc/_footer.php"; ?>


<?php include "assets/inc/_footer_scripts.php"; ?>

</body>
</html>

