<div id="content" style="background: rgb(255 255 255 / 15%) !important;">
    <div class="total">
        <div class="card md-5" style="background-color: rgb(0 0 0 / 15%) !important; border-radius: 0; border: 1px solid rgb(255 255 255 / 15%);">
            <div class="card-header" style="color: #ccc !important;">
                <h5>Hóa đơn thanh toán</h5>
            </div>

            <div class="card-body" style="color: #ccc !important;">
                <p>
                    Hóa đơn cũng đã được chuyển vào email: <?php echo $data['email'] ?></p>
                <div class="" id="load_total">
                    <table class="table card-text " style="color: #ccc !important;">
                        <tbody>
                            <tr>
                                <th class="py-4">Mã đơn hàng</th>
                                <td class="py-4"><span class="place_price">#<?php echo $data['id_order'] ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th class="py-4">
                                    Khách hàng</th>
                                <td class="py-4"><span class="place_price"><?php echo $data['username'] ?></span></td>
                            </tr>
                            <tr>
                                <th class="py-4">
                                    Tổng tiền</th>
                                <td class="py-4"><span class="place_price"><?php echo number_format($data['total']) ?></span><span>đ</span></td>
                            </tr>
                            <tr>
                                <th class="py-4">Thời gian</th>
                                <td class="py-4"><span class="place_price"><?php echo $data['date'] ?></span>
                                </td>
                            </tr>
                            <?php
                            if ($data['code'] != '') {
                            ?>
                                <tr>
                                    <th class="py-4">Voucher</th>
                                    <td class="py-4"><span class="place_price"><?php echo $data['code'] ?></span>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2">
        <a href="<?php echo BASE_URL ?>" class="btn btn-success">Tiếp tục mua hàng </a>
    </div>
</div>