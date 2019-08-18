                <?php
                    include('include/header.php');
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Update your Profile...</h5>
                            </div>
                            <div class="ibox-content">
                                <form id="profile_frm">
                                    <input type="hidden" name="action" value="changepass">
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">User Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" id="username" name="username" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Old Password</label>
                                        <div class="col-sm-5">
                                            <input type="password" id="old_password" name="old_password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-5">
                                            <input type="password" id="new_password" name="new_password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Confirm Password</label>
                                        <div class="col-sm-5">
                                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-white btn-sm">Cancel</button>
                                            <button class="btn btn-primary btn-sm" name="update_profile" type="submit">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                include("include/footer.php");
            ?>