<div id="content">
    <div class="container gioithieu" style="position: relative;">
        <div class="heading pt-4 pb-2">
            Lịch sử mua hàng của bạn
        </div>
    </div>
    <div>
        <div class="history">
            <div>
                <h3 style="color: #ccc;" class="user text-center">Người mua : <?php echo $user['username'] ?></h3>
            </div>
            <div>

            </div>
            <div class="container-fluid">
                <a href="<?php echo BASE_URL ?>order/voucher/<?php echo $user['id_user'] ?>" class="btn btn-success text-light">Xem mã khuyến mãi của bạn</a>
                <div id="load_order_user">
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
                                </tr>
                            </thead>
                            <tbody>
                                

                            </tbody>
                        </table>
                    </div>
                    <div>
                        <nav class="mt-3" aria-label="...">
                            <ul class="pagination pagination-sm ">
                                <li class="page-item"><a id="1" class="page-link text-light" style="background-color: rgb(0 0 0 / 20%); background-color: rgb(0 0 0 / 20%)" href="#">1</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>