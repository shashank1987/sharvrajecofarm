<?php
require_once ("../include/dbcontroller.php");
$db_handle = new DBController();
$sql_query = new SQLQuerys();

if (!isset($_SERVER['HTTP_REFERER']))
{
    $db_handle->divertMsg("../index", "");
    // echo "uh?";  
}
else
{
    // View Gallery
    if (isset($_POST['action']) && $_POST['action'] == 'viewgallery')
    {
        $count = $db_handle->numRows($sql_query->galleryViewD());
        if ($count > 0)
        {

            $galleryView = $db_handle->runQuery($sql_query->galleryViewD());
            foreach ($galleryView as $pic)
            {

              ?>
              <div class="file-box">
                <div class="file">
                  <span class="corner"></span>
                  <div class="image">
                    <img alt="image" class="img-fluid" src="../assets/img/gallery/<?php echo $pic["gallery_image"]; ?>">
                  </div>
                  <div class="file-name text-center">
                    <button class="btn btn-danger" onclick="showAlert(<?php echo $pic["gallery_id"]; ?>,'Are you sure to delete this image from gallery.','delImg')">Delete</button>
                  </div>
                </div>
              </div>
              <?php
            }
        }
    }

    // View Services
    if (isset($_POST['action']) && $_POST['action'] == 'viewServices')
    {
      $MCateCount = $db_handle->numRows($sql_query->getMainCategeorgy());
      if ($MCateCount > 0)
      {
        $getMainCategeorgy = $db_handle->runQuery($sql_query->getMainCategeorgy());

        foreach ($getMainCategeorgy as $MCate)
        {
      ?>
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Package <?php echo ucwords($MCate['m_category'])." - ".$MCate['m_category_price']; ?></h5>
        <div class="ibox-tools">
          <a class="delete" id="<?php echo $MCate['m_id']; ?>">
          <i class="fa fa-trash btn btn-danger"></i>
          </a>
        </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th>Package Items</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $getSubCateData = $db_handle->runQuery($sql_query->getSubCateByMid($MCate['m_id']));
                                    if (is_array($getSubCateData))
                                    {
                                        $counter = 0;

                                        foreach ($getSubCateData as $SCate)
                                        {
                                          ?>
                                          <tr class="gradeX">
                                            <td><?php echo ucwords($SCate['s_category']); ?></td>
                                            <td class="center">
                                              <a href="services?s_id=<?php echo $SCate['s_id']; ?>"><button class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></button></a>
                                              <button class="btn btn-danger btn-sm" title="Delete" onclick="showAlert(<?php echo $SCate['s_id']; ?>,'Are you Sure To Delete This Service.','SCateDel')"><i class="fa fa-trash"></i></button>
                                            </td>
                                          </tr>
                                          <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<tr><td colspan='5'>No Items Avalable</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      <?php
        }
      }
    }

    // View Services option
    if (isset($_POST['action']) && $_POST['action'] == 'viewMainOptions')
    {
        echo "<option selected disabled hidden>--Select--</option>";
        $MCateCount = $db_handle->numRows($sql_query->getMainCategeorgy());
        if ($MCateCount > 0)
        {
            $getMainCategeorgy = $db_handle->runQuery($sql_query->getMainCategeorgy());

            foreach ($getMainCategeorgy as $MCate)
            {
              ?>
              <option value="<?php echo $MCate['m_id']; ?>"><?php echo ucwords($MCate['m_category']); ?></option>
              <?php
            }
        }
        else
        {
            echo "<option>No options Avalable</option>";
        }
    }

    // View Package
    if (isset($_POST['action']) && $_POST['action'] == 'MainCategorie')
    {
        $MCateCount = $db_handle->numRows($sql_query->getMainCategeorgy());
        if ($MCateCount > 0)
        {
            $counter = 0;
            $getMainCategeorgy = $db_handle->runQuery($sql_query->getMainCategeorgy());

            foreach ($getMainCategeorgy as $MCate)
            {
              ?>
              <tr>
                <td><?php echo ++$counter; ?></td>
                <td><?php echo ucwords($MCate['m_category']); ?></td>
                <td>
                  <a href="services?Mid=<?php echo $MCate['m_id']; ?>"><button class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></button></a>
                  <!-- onclick="showAlert(<?php echo $MCate['m_id']; ?>,'Are you Sure To Delete Package.','MCateDel')" -->
                  <button class="btn btn-danger btn-sm delete" id="<?php echo $MCate['m_id']; ?>" ><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              <?php
            }
        }
        else
        {
            echo "<tr><td colspan='3'>No Categeorgy Avalable</td></tr>";
        }
    }
    
    // View Offers
    if (isset($_POST['action']) && $_POST['action'] == 'viewoffer')
    {
      $MCateCount = $db_handle->numRows($sql_query->getOffer());
      if ($MCateCount > 0)
      {
          $getOffers = $db_handle->runQuery($sql_query->getOffer());

          foreach ($getOffers as $offer)
          {
              $getPrice = $db_handle->runQuery($sql_query->getPrice($offer['offer_id']));
          ?>

          <tr>
              <td><?php echo $offer['offer_name']; ?></td>
              <td><?php echo $offer['offer_ends']; ?></td>
              <td><?php print_r($getPrice[0]['SUM(`m_category_price`)']); ?></td>
              <td><?php echo $offer['offer_dis_amt']; ?></td>
              <td><?php $final = $getPrice[0]['SUM(`m_category_price`)'] - $offer['offer_dis_amt']; echo $final; ?></td>
              <td>
                  <a href="javascript:void(0);" onclick="showAlert(<?php echo $offer['offer_id']; ?>,'Are you Sure To Delete This Offer.','OfferDel')"><i class="btn btn-danger fa fa-trash"></i></a>
              </td>
          </tr>
          <?php
          }
      } else {
          echo "<tr><td colspan='6'>Offer Not Set</td></tr>";
      }
    }

}
?>
