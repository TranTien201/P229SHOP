<div class="container">
    <div class="main-body">
        <div class="row">
            <?php foreach ($user as $key => $val) {
            ?>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex flex-column align-items-center text-center">
                                <div id="test">
                                    <div class="rounded-circle" style="position: relative; overflow: hidden; width: 110px; height: 110px;">
                                        <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $val['img_profile'] ?>" alt="Admin" class="rounded-circle p-1 bg-primary profile" style="width: 100%; height: 100%;">
                                        <input type="file" id="img_profile" name="img_profile" class="my_file fas fa-camera" style=" position: absolute; bottom: 0; outline: none; color: transparent; width: 100%; padding: 6px; cursor: pointer; transition: 0.5s; left: 0; background: rgb(255, 255, 255, 30%);"><i class="fas fa-camera"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h4><?php echo $val['username'] ?></h4>
                                    <p class="mb-1"><?php if ($val['type'] == 1) {
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
                    <div class="card">
                        <div class="card-body" id="load_infomation">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tên người dùng</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="user_name" value="<?php echo $val['username'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="user_email" value="<?php echo $val['email'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Số điện thoại</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="user_phone" value="<?php echo $val['phone'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mật khẩu</h6>
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
<script>
    $(document).ready(function() {
        $('#img_profile').on('change', function() {
            var error_images = '';
            var form_data = new FormData();
            var files = $('#img_profile')[0].files;
            for (var i = 0; i < files.length; i++) {
                var name = document.getElementById("img_profile").files[i].name;
                var ext = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    error_images += '<p>Yêu cầu phải có đuôi ảnh là gif, png, jpg, jpeg </p>';
                }
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("img_profile").files[i]);
                var f = document.getElementById("img_profile").files[i];
                var fsize = f.size || f.fileSize;
                form_data.append("file[]", document.getElementById('img_profile').files[i]);
            }
            $.ajax({
                url: "<?php echo BASE_URL ?>login/update_img_profile",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#test').html(data);

                }
            });
        });
        $('#save_change').on('click', function() {
            var user_name = $("#user_name").val();
            var user_email = document.querySelector('#user_email').value;
            var user_phone = document.querySelector('#user_phone').value;
            var user_pass = document.querySelector('#user_pass').value;
            alert(user_name);
            $.ajax({
                url: "<?php echo BASE_URL ?>login/update_infomation",
                method: "POST",
                data: {
                    user_name: user_name,
                    user_email: user_email,
                    user_phone: user_phone,
                    user_pass: user_pass
                },
                success: function(data) {
                    alert('Thay đổi thông tin thành công');
                    $('#load_infomation').html(data);
                }
            });
        });

    });
</script>