
<main>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="p-6">
                <div class="">
                    <form class="addtour" name="addpost" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group m-b-20"></div>

                        <div class="form-group m-b-20"></div>
    
                        <div class="form-group m-b-20"></div>

                        <div class="row">
                        <div class="infor">
                            <h2>Add Tour</h2>
                            <div class="Tour">
                                <div class="ImgTour">
                                    <img src="<?php echo _WEB_ROOT_."/views/client/img/default-image.jpg"?>" alt="">
                                    <h4>Ảnh</h4>
                                </div>
                                <div class="infortour">
                                    <label for="">
                                        <span>Tên tour</span>
                                        <input type="text" name="tour" id="">
                                    </label>
                                    <label for="">
                                        <span>Tỉnh thành:</span>
                                        <select name="province" id="">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </label>
                                    <label for="">
                                        <span>Giá:</span>
                                        <input type="text" name="price" id="">
                                    </label>
                                    <label for="">
                                        <span>Thời gian:</span>
                                        <input type="date" name="time" id="">
                                    </label>
                                    <label for="">
                                        <span>Hành trình:</span>
                                        <input type="text" name="journey" id="">
                                    </label>
                                    <label for="" class="listservice">
                                        <span>Dịch vụ:</span>
                                        <div class="option">
                                            <label for="1">
                                                <input type="checkbox" name="options[]" id="1" class="toggle" value="1"><span>dkadh</span>
                                            </label>
                                            <label for="2">
                                                <input type="checkbox" name="options[]" id="2" class="toggle" value="2"><span>dkadh</span>
                                            </label>
                                            <label for="3">
                                                <input type="checkbox" name="options[]" id="3" class="toggle" value="3"><span>dkadh</span>
                                            </label>
                                            <label for="4">
                                                <input type="checkbox" name="options[]" id="4" class="toggle" value="4"><span>dkadh</span>
                                            </label>
                                        </div>
                                    </label>
                                    <label for="" class="listservice">
                                        <span>Phương tiện:</span>
                                        <!-- <input type="text" name="" id=""> -->
                                        <div class="option">
                                            <label for="1">
                                                <input type="checkbox" name="options[]" id="1" class="toggle" value="1"><span>dkadh</span>
                                            </label>
                                            <label for="2">
                                                <input type="checkbox" name="options[]" id="2" class="toggle" value="2"><span>dkadh</span>
                                            </label>
                                            <label for="3">
                                                <input type="checkbox" name="options[]" id="3" class="toggle" value="3"><span>dkadh</span>
                                            </label>
                                            <label for="4">
                                                <input type="checkbox" name="options[]" id="4" class="toggle" value="4"><span>dkadh</span>
                                            </label>
                                        </div>
                                    </label>
                                    <label for="">
                                        <span>Chỗ:</span>
                                        <input type="text" name="" id="">
                                    </label>
                                    <label for="">
                                        <span>Giảm giá:</span>
                                        <input type="text" name="" id="">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-b-30 m-t-0 header-title"><b>Nội dung</b></h4>
                                <textarea class="summernote" name="service" required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-b-30 m-t-0 header-title"><b>Lịch trình</b></h4>
                                <textarea class="summernote" name="content" required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box"></div>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save and Post</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <script>
            var resizefunc = [];
        </script>

        <script src="<?php echo _WEB_ROOT_."/views/admin/assets/js/jquery.min.js"?>"></script>
        <script src="<?php echo _WEB_ROOT_."/views/admin/assets/js/bootstrap.min.js"?>"></script>
        <script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 300,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
            });
        </script>

        <script src="<?php echo _WEB_ROOT_."/views/admin/assets/js/summernote.js"?>"></script>
    </main>
</div>

