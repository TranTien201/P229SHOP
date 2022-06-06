<div class="container-fluid mb-3">
    <h1 class="text-center mt-5 mb-5 text-white ">Chi tiết đơn hàng của: <?php echo $orderbyid[0]['username'] ?></h1>
    <div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px;">
        <table class="table1 align-middle table_user w-100" style="overflow: auto;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID đơn hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Size</th>
                    <th>Số lượng</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;
                foreach ($orderbyid as $key => $order) {
                    $i++;
                ?>

                    <tr>
                        <td>#<?php echo $i ?></td>
                        <td>#<?php echo $order['id_order'] ?></td>
                        <td><?php echo $order['product_name'] ?></td>
                        <td class="d-flex img_p">
                            <span>
                                <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $order['product_img'] ?>" alt="">
                            </span>
                        </td>
                        <td><?php echo $order['product_size'] ?></td>
                        <td><?php echo $order['quantity'] ?></td>
                    </tr>


                <?php }
                ?>

            </tbody>
        </table>
    </div>
</div>