<div class="container-fluid">
    <h1 class="text-center mt-5 mb-5 text-white ">Đơn hàng </h1>
    <?php
    if (isset($_GET['message'])) {
        $msg = unserialize(urldecode($_GET['message']));
        foreach ($msg as $key => $value) {
            echo '<div style="color:#fff; font-size: 20px; text-align: center;">' . $value . '</div>';
        }
    }
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-10">
                            <div class="row row-cols-lg-auto g-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <form action="<?php echo BASE_URL ?>product/searchproduct" method="POST">
                                            <input type="text" class="form-control ps-5" placeholder="Tìm đơn hàng..." name="Nhập email của bạn">
                                            <input type="submit" name="" hidden>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-12 d-flex align-items-center">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="btn btn-light">Sắp xếp</button>
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class='bx bx-chevron-down'></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <li><a class="dropdown-item" href="">Mới nhất</a></li>
                                                <li><a class="dropdown-item" href="#">Đang xử lí</a></li>
                                                <li><a class="dropdown-item" href="<?php echo BASE_URL ?>product/sortbystatus/0">Đã xử lí</a></li>
                                                <li><a class="dropdown-item" href="<?php echo BASE_URL ?>product/sortproductbypricedesc">Gía cao nhất</a></li>
                                                <li><a class="dropdown-item" href="<?php echo BASE_URL ?>product/sortproductbypriceasc">Giá thấp nhất</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px;">
        <table class="table1 align-middle table_user" style="overflow: auto;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Đơn hàng</th>
                    <th>Thời gian</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Tên người nhận</th>
                    <th>Số điện thoại người nhận</th>
                    <th>Quốc gia</th>
                    <th>Tỉnh / Thành phố</th>
                    <th>Quận / huyện</th>
                    <th>Địa chỉ</th>
                    <th>Tiền</th>
                    <th>Tình trạng</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;
                foreach ($orders as $key => $order) {
                    $i++;
                ?>
                    <form action="<?php echo BASE_URL ?>order/update/<?php echo $order['id_order']  ?>" method="post">
                        <tr>
                            <td>#<?php echo $i ?></td>
                            <td>#<?php echo $order['id_order'] ?></td>
                            <td><?php echo $order['day'] ?> - <?php echo $order['hour'] ?></td>
                            <td><?php echo $order['sender_name'] ?></td>
                            <td><?php echo $order['sender_phone'] ?></td>
                            <td><?php echo $order['email'] ?></td>
                            <td><?php echo $order['receiver_name'] ?></td>
                            <td><?php echo $order['receiver_phone'] ?></td>
                            <td><?php echo $order['country'] ?></td>
                            <td><?php echo $order['city'] ?></td>
                            <td><?php echo $order['district'] ?></td>
                            <td><?php echo $order['address'] ?></td>
                            <td><?php echo number_format($order['total']) ?>đ</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="order_status" <?php if ($order['order_status'] == 'Mới') echo 'checked'; ?> type="checkbox" value="Mới">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Mới
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="order_status" type="checkbox" <?php if ($order['order_status'] == 'Đang chờ xử lí') echo 'checked'; ?> value="Đang chờ xử lí" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Đang chờ xử lí
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="order_status" <?php if ($order['order_status'] == 'Đã hoàn thành') echo 'checked'; ?> type="checkbox" value="Đã hoàn thành" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Đã hoàn thành
                                    </label>
                                </div>
                            </td>
                            <td><input type="submit" class="btn btn-warning" value="Sửa"></td>
                            <td><a href="<?php echo BASE_URL ?>order/delete/<?php echo $order['id_order'] ?>" class="btn btn-danger">Xóa</a></td>
                            <td><a href="<?php echo BASE_URL ?>order/orderdetail/<?php echo $order['id_order'] ?>" class="btn btn-success">Xem</a></td>
                        </tr>
                    </form>


                <?php }
                ?>

            </tbody>
        </table>
    </div>
</div>