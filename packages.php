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
                    <h2 class="title-planing">Packages</h2>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="planning-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <h2 class="title">Know our Packages</h2>
                    <p>Life Is Better On The Farm</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $getMainCategeorgy = $db_handle->runQuery($sql_query->getMainCategeorgy());
            if (is_array($getMainCategeorgy))
            {
                foreach ($getMainCategeorgy as $MCate)
                {
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-price-plan">

                    <div class="price-header price-bg">
                        <h4 class="title"><?php echo ucwords($MCate['m_category']); ?> Package</h4>

                          <div class="price-footer">
                        <span style="font-size: 29px;color: #1b429c">₹</span><a href="#" class="plannow"><?php echo  $MCate['m_category_price']; ?></a>
                    </div>
                    </div>
                    <div class="price-body">
                        <ul>
                            <?php
                                    $getSubCateData = $db_handle->runQuery($sql_query->getSubCateByMid($MCate['m_id']));
                                    if (is_array($getSubCateData))
                                    {
                                        $counter = 0;

                                        foreach ($getSubCateData as $SCate)
                                        {
                                          ?>
                                          <li><?php echo ucwords($SCate['s_category']); ?></li>
                                          <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<li>No items Package</li>";
                                    }
                                ?>
                        </ul>
                    </div>
                   
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>

    </div>
</section>


<?php include "assets/inc/_footer.php"; ?>


<?php include "assets/inc/_footer_scripts.php"; ?>

</body>
</html>