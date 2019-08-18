<?php
    include('include/header.php');
?>
    
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Set Offer<small></small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                <i class="fa fa-chevron-down"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" style="display: none;">
                            <form id="add_offer_frm">
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Offer Name</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="offer_name"></div>
                                </div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Select Packages</label>

                                    <div class="col-sm-10">
                                        <?php
                                            $MCateCount = $db_handle->numRows($sql_query->getMainCategeorgy());
                                            if ($MCateCount > 0)
                                            {
                                                $getMainCategeorgy = $db_handle->runQuery($sql_query->getMainCategeorgy());

                                                foreach ($getMainCategeorgy as $MCate)
                                                {
                                    ?>
                                        <label class="checkbox-inline i-checks"> <input type="checkbox" name="offer_package[]" value="<?php echo $MCate['m_id']; ?>">&nbsp;<?php echo ucwords($MCate['m_category'])." - ".$MCate['m_category_price']; ?></label>
                                    <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Discount Amount</label>
                                    <div class="col-sm-10"><input type="text" class="form-control"  name="dis_amount">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row" id="data_1">
                                    <label class="col-sm-2 font-normal">Ends On</label>
                                    <div class="col-sm-10 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="offer_ends">
                                    </div>
                                </div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

                        
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Custom responsive table </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#" class="dropdown-item">Config option 1</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name </th>
                                        <th>Ends On</th>
                                        <th>Total Amount</th>
                                        <th>Discount Amount</th>
                                        <th>Final Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="viewoffer">
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
        <?php
            include("include/footer.php");
        ?>