<div id="content" style="background: rgb(255 255 255 / 15%) !important;">
    <div class="container gioithieu " style="position: relative;">
        <div class="title-heading text-center pt-4 pb-2">Thanh toán
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($_GET['mess'])) {
                    $msg = unserialize(urldecode($_GET['mess']));
                    foreach ($msg as $key => $value) {
                        echo '<div style="color:#fff; font-size: 20px">' . $value . '</div>';
                    }
                }
                ?>
                <div class="table-responsive p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 10%); height: 500px;">
                    <table class="table1 align-middle table_user w-100" style="overflow: auto;">
                        <thead>
                            <tr>
                                <th style="width: 100px; height: 100px;">Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Size</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="cart-items">
                            <form action="<?php echo BASE_URL ?>cart/updatecart" method="POST">

                                <?php
                                if (isset($_SESSION["shopping_cart"])) {
                                ?>
                                    <?php
                                    $total = 0;
                                    foreach ($_SESSION["shopping_cart"] as $key => $val) {
                                        $total += $val['price'] * $val['quantity'];
                                    ?>
                                        <tr class="cart-row">
                                            <td style="padding: 1.3rem 0rem !important;"><?php echo $val['product_name'] ?></td>
                                            <td class="img_p">
                                                <span>
                                                    <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $val['img_name'] ?>" alt="">
                                                </span>
                                            </td>
                                            <td><?php echo $val['size'] ?></td>
                                            <td><span class="price_product"><?php echo number_format($val['price']) ?></span><span>đ</span></td>
                                            <td class="amount">
                                                <input type="number" min="1" max="<?php echo $val['quantity_max'] ?>" class="quantity_product" name="qty[<?php echo $val['id'] ?>]" value="<?php echo $val['quantity'] ?>">
                                            </td>
                                            <td><span><?php echo number_format($val['price'] * $val['quantity']) ?></span><span>đ</span></td>
                                            <td style="padding: 1.3rem 0rem !important;">
                                                <button type="submit" value="<?php echo $val['id'] ?>" name="delete_cart" class="btn btn-danger">Xóa</button>
                                                <button type="submit" value="<?php echo $val['id'] ?>" name="update_cart" class="btn btn-success">Sửa</button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </form>
                        </tbody>
                    </table>
                </div>
                <div class="mt-2" class="d-flex">
                    <a href="<?php echo BASE_URL ?>" class="btn btn-success">Tiếp tục mua hàng </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4 mb-5">
        <?php if (!empty($_SESSION["shopping_cart"])) {

        ?>
            <div class="row">
                <div class="col-md-7 col-lg-8">
                    <?php if ($user['username'] == '') {
                    ?>
                        <div class="card border-top border-0 border-4 border-white" style="background: rgb(0 0 0 / 20%) !important">
                            <div class="card-body">
                                <form action="<?php echo BASE_URL ?>login/register_user" method="post">
                                    <div class="border p-4 rounded">
                                        <div class="card-title d-flex align-items-center">
                                            <div><i class="bx bxs-user me-1 font-22 text-white"></i>
                                            </div>
                                            <h5 class="mb-0 text-white">Đăng ký tài khoản</h5>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <label for="inputEnterYourName " class="col-sm-3 col-form-label text-white">Tên người dùng</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="username" class="form-control" placeholder="Nhập tên" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label text-white">Số điện thoại</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label text-white">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" class="form-control" placeholder="Nhập email" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label text-white">Nhập mật khẩu</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="user_password" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label text-white">Nhập lại mật khẩu</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="re_password" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($_GET['msg'])) {
                                            $msg = unserialize(urldecode($_GET['msg']));
                                            foreach ($msg as $key => $value) {
                                                echo '<div style="color:#f41127; font-size: 15px">' . $value . '</div>';
                                            }
                                        }
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <input type="submit" class="btn btn-light px-5" value="Đăng ký">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="card border-top border-0 border-4 border-white" style="background: rgb(0 0 0 / 20%) !important">
                            <div class="card-body">
                                <form action="<?php echo BASE_URL ?>cart/payment" method="post">
                                    <div class="border p-4 rounded">
                                        <div class="card-title d-flex align-items-center">
                                            <div><i class="bx bxs-user me-1 font-22 text-white"></i>
                                            </div>
                                            <h5 class="mb-0 text-white">Thông tin thanh toán</h5>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <label for="inputEnterYourName " class="col-sm-3 col-form-label text-white">Tên người mua</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="sender_name" value="<?php echo $user['username'] ?>" class="form-control" placeholder="Nhập tên" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label text-white">Số điện thoại người mua</label>
                                            <div class="col-sm-9">
                                                <input type="text" value="<?php echo $user['phone'] ?>" name="sender_phone" class="form-control" id="inputPhoneNo2" placeholder="Nhập số điện thoại" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label text-white">Tên người nhận</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="recipient_name" class="form-control" placeholder="Nhập tên người nhận">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label text-white">Số diện thoại người nhận</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="recipient_phone" class="form-control" id="inputChoosePassword2" placeholder="Nhập số diện thoại người nhận">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label text-white">Chọn quốc gia</label>
                                            <div class="col-sm-9">
                                                <select name="country" id="country" class="selected w-100" onchange="FetchCity(this.value)" required>
                                                    <option disabled selected>Chọn quốc gia</option>
                                                    <?php foreach ($countries as $key => $value) {

                                                    ?>
                                                        <option value="<?php echo $value['country'] ?>"><?php echo $value['country'] ?></option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label text-white">Chọn Thành phố / Tỉnh</label>
                                            <div class="col-sm-9">
                                                <select name="city" id="city" class="selected w-100" onchange="FetchDistrict(this.value)" required>
                                                    <option disabled selected>Chọn Thành phố / Tỉnh</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label text-white">Chọn quận / huyện</label>
                                            <div class="col-sm-9">
                                                <select name="district" id="district" class="selected w-100" onchange="FetchShip(this.value)" required>
                                                    <option disabled selected>Chọn Quận / Huyện</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label text-white">Địa chỉ người nhận</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ người nhận">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label text-white">Mã quà tặng</label>
                                            <div class="col-sm-9">
                                                <select name="voucher" class="selected w-100">
                                                    <option selected>Chọn mã quà tặng</option>
                                                    <?php foreach ($vouchers as $key => $val) {
                                                    ?>
                                                        <option value="<?php echo $val['id_voucher'] ?>"><?php echo $val['code_voucher'] ?> - <?php echo number_format($val['total']) ?>đ</option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label text-white">Lấy mã xác nhận</label>
                                            <div class="col-sm-9 ">
                                                <div class="d-flex">
                                                    <input type="text" name="payment_code" class="form-control" " placeholder=" Nhập mã xác nhận">
                                                    <input type="text" class="email" value="<?php echo $user['email'] ?>" hidden>
                                                    <input type="text" class="username" value="<?php echo $user['username'] ?>" hidden>
                                                    <input type="text" class="price" name="price" value="<?php echo $total ?>" hidden>
                                                    <span onclick="getCode()" class="btn btn-success" style="width: 200px;">Lấy mã</span>
                                                </div>
                                                <div id="small">
                                                    <small style="color: #f41127; font-size: 14px;">(*) Vào email của tài khoản này để lấy mã xác nhận</small>
                                                </div>
                                            </div>

                                        </div>
                                        <?php
                                        if (isset($_GET['message'])) {
                                            $msg = unserialize(urldecode($_GET['message']));
                                            foreach ($msg as $key => $value) {
                                                echo '<div style="color:#f41127; font-size: 15px">' . $value . '</div>';
                                            }
                                        }
                                        ?>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <input type="submit" class="btn btn-light px-5" value="Thanh toán">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <div class="col-lg-4 col-md-5 total">
                    <div class="card md-5" style="background-color: rgb(0 0 0 / 15%) !important; border-radius: 0; border: 1px solid rgb(255 255 255 / 15%);">
                        <div class="card-header" style="color: #ccc !important;">
                            <h5>Tổng tiền của bạn</h5>
                        </div>
                        <div class="card-body" style="color: #ccc !important;">
                            <p>
                                Chi phí vận chuyển và chi phí bổ sung được tính dựa trên các giá trị bạn đã nhập. Nếu đơn hàng trên 2.500.000đ sẽ được miễn phí tiền giao hàng</p>
                            <div class="" id="load_total">
                                <table class="table card-text " style="color: #ccc !important;">
                                    <tbody>
                                        <tr>
                                            <th class="py-4">
                                                Tiền sản phẩm</th>
                                            <td class="py-4"><span class="place_price"><?php echo number_format($total) ?></span><span>đ</span></td>
                                            <input type="text" id="price" value="<?php echo $total ?>" hidden>
                                        </tr>
                                        <tr style="height: 70p;">
                                            <th style="height: 100%; " class="py-4">Tiền vận chuyển</th>
                                            <td class="py-4" id="ship">

                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="py-4">Tổng tiền</th>
                                            <td class="py-4" id="total">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<script type="text/javascript" src="https://ahachat.com/customer-chats/customer_chat_0T56iyi9m861ae307f9968f.js"></script>
<script>
    function FetchCity(id) {
        $('#city').html('');
        $.ajax({

            type: 'POST',
            url: "<?php echo BASE_URL ?>local/list_city",
            data: {
                id_country: id
            },
            success: function(data) {
                $('#city').html(data);
            }
        })
    }

    function FetchDistrict(id) {
        $('#district').html('');
        $.ajax({

            type: 'POST',
            url: "<?php echo BASE_URL ?>local/list_district",
            data: {
                id_city: id
            },
            success: function(data) {
                $('#district').html(data);
            }
        })
    }

    function FetchShip(id) {
        var price = document.querySelector('#price').value;
        $.ajax({

            type: 'POST',
            url: "<?php echo BASE_URL ?>local/get_all_total",
            data: {
                id_state: id,
                price: price
            },
            success: function(data) {
                $('#load_total').html(data);
            }
        })
        // total(id, price);
    }

    function total(id, price) {
        $.ajax({

            type: 'POST',
            url: "<?php echo BASE_URL ?>local/get_total",
            data: {
                id_state: id,
                price: price,
            },
            success: function(data) {
                $('#total').html(data);
            }
        })
    }

    function getCode() {
        var email = document.querySelector('.email').value;
        var username = document.querySelector('.username').value;

        $('#small').html('<small style="color: #fff; font-size: 14px;">(*) Chờ một ít thời gian</small>');
        $.ajax({

            type: 'POST',
            url: "<?php echo BASE_URL ?>cart/getCode",
            data: {
                email: email,
                username: username,
            },
            success: function(data) {
                $('#small').html(data);
            }
        })
    }
</script>