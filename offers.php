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
                            <h2 class="title">Special Offers</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ticket-pricing-area">
            <div class="container">
                <?php
                    $offerView = $db_handle->runQuery($sql_query->getOffer());
                    if (is_array($offerView))
                    {
                        foreach ($offerView as $offer)
                        {
                            $getPrice = $db_handle->runQuery($sql_query->getPrice($offer['offer_id']));
                ?>
                <div class="row">
                    <div class="col-lg-3 col-md-6 remove-col-padding">
                        <div class="single-price-plan-03 first-item">

                            <div class="price-header">
                                <div class="promo-price5" style=" "> Only <span><?php $final = $getPrice[0]['SUM(`m_category_price`)'] - $offer['offer_dis_amt']; echo $final; ?></span></div>
                                
                                <span class="subtitle">Special offer</span>
                                
                                <br>
                                <br>

                            </div>
                            <div class="price-body">
                                <ul>
                                        <?php
                                    $offerPackages = $db_handle->runQuery($sql_query->offerPackages($offer['offer_id']));
                                ?>
                                    <li>
                                        <h6><?php echo ucwords($offerPackages[0]["GROUP_CONCAT(sharvraj_mian_category.m_category SEPARATOR ' + ')"]);?></h6>
                                    </li>
                                    <li><span><?php echo $offerPackages[0]["GROUP_CONCAT(sharvraj_mian_category.m_category_price SEPARATOR ' + ')"] . " = " . $offerPackages[0]["SUM(sharvraj_mian_category.`m_category_price`)"];?></span></li>
                                        <?php
                                ?>
                                </ul>
                            </div>
                            <div class="price-footer">
                                <a href="tel:9326020694" class="boxed-btn btn-rounded">Book Now</a>
                            </div>
                        </div>

                    </div>
                    <?php
                        $getMainCategeorgy = $db_handle->runQuery($sql_query->MCByOfferPackages($offer['offer_id']));
                            if (is_array($getMainCategeorgy))
                            {
                                foreach ($getMainCategeorgy as $MCate)
                                {
                    ?>
                    <div class="col-lg-3 col-md-6 remove-col-padding">
                        <div class="single-price-plan-03">

                            <div class="price-header">
                                <h3><?php echo ucwords($MCate['m_category']); ?></h3>

                            </div>
                            <div class="price-icon">
                                <div class="icon">
                                    <div class="price-img" style="font-size: 24px;color: white;padding: 12px">₹ <?php echo $MCate['m_category_price'];?>
                                    </div>
                                </div>
                            </div>
                            <div class="price-body">
                                <ul>
                                    <?php
                                        $getSubCateData = $db_handle->runQuery($sql_query->getSubCateByMid($MCate['m_id']));
                                        if (is_array($getSubCateData))
                                        {

                                            foreach ($getSubCateData as $SCate)
                                            {
                                        ?>
                                    <li> <span><?php echo ucwords($SCate['s_category']); ?></span> </li>
                                    <?php
                                            }
                                        }
                                        ?>
                                    <li></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                    <?php
                                }
                            }
                    ?>
                </div>
                <div style="height: 30%;"></div>
                <?php
                        }
                    }
                ?>
            </div>
        </section>

        <?php include "assets/inc/_footer.php"; ?>
        <?php include "assets/inc/_footer_scripts.php"; ?>
    </body>
</html>
