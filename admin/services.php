                <?php
                    include('include/header.php');
                ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5><?= ( !empty($_GET['s_id']) ) ? 'Edit':'Add';?> Package Item</h5>
                                </div>
                                <div class="ibox-content">
                                  <?php
                                    if (!empty($_GET['s_id'])) {
                                    $S_id = $db_handle->escapeString($_GET['s_id']);
                                    $s_row = $db_handle->runQuery($sql_query->getSubCateById($S_id));
                                    foreach ($s_row as $s_value) {
                                        $main_cate = $s_value['m_id'];
                                        $sub_cate = $s_value['s_category'];
                                    }
                                    ?>
                                  <form id="sub_cate_frm_edit">
                                    <input type="hidden" name="S_id" value="<?php echo $S_id;?>">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Select Category</label>
                                      <div class="col-sm-9">
                                        <select class="form-control m-b" name="main_cate" required>
                                            <?php
                                            // echo "<option selected disabled hidden>--Select--</option>";
                                            $MCateCount = $db_handle->numRows($sql_query->getMainCategeorgy());
                                            if ($MCateCount > 0)
                                            {
                                                $getMainCategeorgy = $db_handle->runQuery($sql_query->getMainCategeorgy());

                                                foreach ($getMainCategeorgy as $MCate)
                                                {
                                    ?>
                                    <option value="<?php echo $MCate['m_id']; ?>" <?php if ($main_cate == $MCate['m_id']){echo 'selected';} ?>><?php echo ucwords($MCate['m_category']); ?></option>
                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "<option>No options Available</option>";
                                            }
                                            ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Sub Category</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="sub_cate" value="<?php echo $sub_cate;?>" class="form-control" placeholder="Enter Sub Categeorgy" required>
                                      </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                      <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                        <button class="btn btn-primary btn-sm" name="insert_sub_cate" type="submit">&nbsp;&nbsp;&nbsp;UPDATE&nbsp;&nbsp;&nbsp;</button>
                                      </div>
                                    </div>
                                  </form>
                                  <?php
                                    }else{
                                    ?>
                                  <form id="sub_cate_frm">
                                    <input type="hidden" name="insert_sub_cate">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Select Category</label>
                                      <div class="col-sm-9">
                                        <select class="form-control m-b" name="main_cate" id="viewMainOptions">
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Sub Category</label>
                                      <div class="col-sm-9">
                                        <input type="text" name="sub_cate" class="form-control" placeholder="Enter Sub Category" required>
                                      </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                      <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                        <button class="btn btn-primary btn-sm" name="insert_sub_cate" type="submit">&nbsp;&nbsp;&nbsp;ADD&nbsp;&nbsp;&nbsp;</button>
                                      </div>
                                    </div>
                                  </form>
                                  <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5><?= ( !empty($_GET['Mid']) ) ? 'Edit':'Add';?> & Display Package </h5>
                                </div>
                                <div class="scrollOff" style="height: 272px;overflow-x: auto;">
                                    <div class="ibox-content">
                                        <?php
                                             if (!empty($_GET['Mid'])) {
                                                $M_id = $db_handle->escapeString($_GET['Mid']);
                                                $row = $db_handle->runQuery($sql_query->getMainCateById($M_id));
                                                foreach ( $row as $value ) {
                                                    $main_cate = $value['m_category'];
                                                    $main_cate_price = $value['m_category_price'];
                                                }
                                                ?>
                                        <form id="main_cate_frm_Edit">
                                            <input type="hidden" name="M_id" value="<?php echo $M_id;?>">
                                            <div class="form-group  row">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" name="main_cate" value="<?php echo $main_cate;?>" class="form-control text-capitalize" required placeholder="Package">
                                                        <input type="text" style="border: 1px solid #e5e6e7;" class="text-center" name="main_cate_price" size="10" value="<?php echo $main_cate_price;?>" required placeholder="Amount">
                                                        <span class="input-group-append">
                                                        <button type="submit" class="btn btn-primary">Save</button> 
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                                <?php
                                             }else{
                                         ?>
                                        <form id="main_cate_frm">
                                            <input type="hidden" name="action" value="insert_main_cate">
                                            <div class="form-group  row">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" name="main_cate" class="form-control text-capitalize" required placeholder="Package">
                                                        <input type="text"  style="border: 1px solid #e5e6e7;" class="text-center" name="main_cate_price" size="10" required placeholder="Amount">
                                                        <span class="input-group-append">
                                                        <button type="submit" class="btn btn-primary">Add</button> 
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                            }
                                        ?>
                                        <div class="hr-line-dashed"></div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Main Categories</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="MainCategorie">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="viewServices">
                    </div>
                <?php
                    include("include/footer.php");
                ?>