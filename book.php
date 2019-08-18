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





<section class="breadcumb-area breadcrumb-bg">

    <div class="container">

        <div class="row ">

            <div class="col-lg-12">

                <div class="breadcumb-inner">

                    <h2 class="title">Book Now</h2>

                </div>



            </div>

        </div>

    </div>

</section>





<section class="about_mission-area">

    <div class="container">

        <div class="row">

            <div class="col-lg-12 col-md-12">

                <div class="about-content">

                    <h2>Book Now</h2>

                    <div class="row">
                       <div class="col-lg-8 col-md-8 col-sm-12">
                       <form method="post" action="book_post.php">
                            <div class="form-group">
                                <label>Contact Person</label>
                                <input type="text" class="form-control" name="contact_person"  placeholder="Enter Contact Person Name">
                                
                            </div>
                            <div class="form-group">
                                <label>Mobile No</label>
                                <input type="text" class="form-control" name="mobile_no"  placeholder="Enter Mobile No">
                                
                            </div>
                            <div class="form-group">
                                <label >Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email">
                                
                            </div>
                            <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Address</label>
                                    <textarea class="form-control" name="address" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                    <h3>Activities</h3>
                                    <div class="form-group">
                                      <input type="checkbox" class="form-check-input" value="1" id="waterpark" name="waterpark"> Water Park
                                      <div class="form-group" id="waterpark_members">
                                          
                                          <div class="row">
                                              <div class="col-lg-6 col-md-6 col-sm-12">
                                              <select class="form-control" id="waterpark_adults" name="waterpark_adults">
                                                <option>Adults (Above Age 5)</option>
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option>20</option>
                                            </select>
                                              </div>
                                              <div class="col-lg-6 col-md-6 col-sm-12">
                                              <select class="form-control" id="waterpark_children_below5" name="waterpark_children_below5">
                                                <option>Children (below Age 5)</option>
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option>20</option>
                                            </select>
                                              </div>
                                          </div>
                                         
                                            
                                            
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <input type="checkbox" class="form-check-input" value="1" id="adventurepark" name="adventurepark"> Adventure Park
                                      <div class="form-group" id="adventurepark_members">
                                          
                                          <div class="row">
                                              <div class="col-lg-6 col-md-6 col-sm-12">
                                              <select class="form-control" id="adventurepark_adults" name="adventurepark_adults">
                                                <option>Adults (Above Age 12)</option>
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option>20</option>
                                            </select>
                                              </div>
                                              
                                          </div>
                                         
                                            
                                            
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <input type="checkbox" class="form-check-input" value="1" id="thrill_rides" name="thrill_rides"> Thrill Rides
                                      <div class="form-group" id="thrill_rides_members">
                                          
                                          <div class="row">
                                              <div class="col-lg-6 col-md-6 col-sm-12">
                                              <select class="form-control" id="thrill_rides_adults" name="thrill_rides_adults">
                                                <option>Adults (Above Age 15)</option>
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option>20</option>
                                            </select>
                                              </div>
                                              
                                          </div>
                                         
                                            
                                            
                                      </div>
                                    </div>
                            </div>
                            <div class="form-group">
                             
                            </div>


                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" value="1" id="terms_and_condition_sign" name="terms_and_condition_sign">
                                <label class="form-check-label" for="exampleCheck1">I Accept Terms and Conditions</label>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                       </form>
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