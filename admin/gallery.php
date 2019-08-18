                <?php
                    include('include/header.php');
                ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>Upload Images in Gallery</h5>
                                </div>
                                <div class="ibox-content">
                                    <form method="post" class="dropzone" id="galleryFrm" enctype="multipart/form-data">
                                        <div class="fallback">
                                            <input id="gallery" name="gallery[]" type="file" multiple />
                                        </div>
                                    </form>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-white btn-sm">Cancel</button>
                                            <button class="btn btn-primary btn-sm" id="btngallery">Upload</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12 animated fadeInRight">
                            <div class="row">
                                <div class="col-lg-12" id="viewgallery">

                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    include("include/footer.php");
                ?>