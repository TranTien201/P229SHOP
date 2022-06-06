<div id="content">
    <div class="container gioithieu" style="position: relative;">
        <div class="heading pt-4 pb-2">
            Phiếu quà tặng của bạn
        </div>
    </div>
    <div>
        <div class="history">
            <div>
                <h3 style="color: #ccc;" class="user text-center">Người dùng : <?php echo $user['username'] ?></h3>
            </div>
            <div>

            </div>
            <div class="container-fluid">
                <div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px;">
                    <table class="table1 align-middle table_user w-100" style="overflow: auto;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Mã quà tặng</th>
                                <th>Số tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($promotos)) {
                            ?>
                                <?php $i = 0;
                                foreach ($promotos as $key => $promoto) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td>#<?php echo $i ?></td>
                                        <td><?php echo $promoto['username'] ?></td>
                                        <td><?php echo $promoto['code_voucher'] ?></td>
                                        <td><?php echo number_format($promoto['total']) ?>đ</td>
                                    </tr>
                                <?php }
                                ?>
                            <?php
                            } else {
                            ?>
                                <tr>
                                    <td colspan="4">Không có mã quà tặng nào</td>
                                </tr>
                            <?php
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>