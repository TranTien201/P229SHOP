<div class="container mt-3 mb-3">
    <div class="main-body">
        <div class="row">
            <?php foreach ($user as $key => $val) {
            ?>
                <div class="col-lg-4">
                    <div class="card" style="background: rgb(0,0,0, 20%) !important; box-shadow: none;">
                        <div class="card-body  ">

                            <div class=" d-flex flex-column align-items-center text-center  ">
                                <div id="local_img">
                                    <div class="rounded-circle" style="position: relative; overflow: hidden; width: 110px; height: 110px;">
                                        <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $val['img_profile'] ?>" alt="Admin" class="rounded-circle p-1 bg-primary profile" style="width: 100%; height: 100%;">
                                        <input type="file" id="img_profile" name="img_profile" class="my_file fas fa-camera" style=" position: absolute; bottom: 0; outline: none; color: transparent; width: 100%; padding: 6px; cursor: pointer; transition: 0.5s; left: 0; background: rgb(255, 255, 255, 30%);"><i class="fas fa-camera"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h4 class="text-light"><?php echo $val['username'] ?></h4>
                                    <p class="mb-1 text-light"><?php if ($val['type'] == 1) {
                                                                    echo 'Nhân viên';
                                                                } elseif ($val['type'] == 2) {
                                                                    echo 'Quản lí';
                                                                } else {
                                                                    echo 'Khách hàng';
                                                                } ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card " style="background: rgb(0,0,0, 20%) !important; box-shadow: none;">
                        <div class="card-body" id="load_infomation">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0 text-light">Tên người dùng</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="user_name" value="<?php echo $val['username'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0 text-light">Email</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="user_email" value="<?php echo $val['email'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0 text-light">Số điện thoại</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="user_phone" value="<?php echo $val['phone'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0 text-light">Mật khẩu</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="user_pass" value="<?php echo $val['password'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <input type="button" class="btn btn-light px-4" id="save_change" value="Sửa dữ liệu">
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>
</div>