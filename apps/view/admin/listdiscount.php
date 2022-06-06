<div class="main_body">
    <div class="container-fluid">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-add container-fluid">
                        <form method="POST" action="<?php echo BASE_URL ?>discount/add_discount">
                            <div class="p-4">
                                <div class="form-group ">
                                    <label for="">Tên mã giảm giá</label>
                                    <input type="text" name="text_discount" required="1">
                                </div>
                                <div class="form-group ">
                                    <label for="">Giảm giá</label>
                                    <input type="text" name="discount" required="1">
                                </div>
                                <div class="form-group col-md-6 mt-3">
                                    <div class="size size_t" aria-multiline="true">
                                        <div class="input_sizes input_size">Chọn loại hàng<i class="fas fa-sort-down"></i></div>
                                        <div class="s_d_b d_b" style="display: none;" aria-multiline="true">
                                            <span class="d-flex align-items-center justify-content-between"><input type="checkbox" name="status" value="0">
                                                <p>Ẩn</p>
                                            </span>
                                            <span class="d-flex align-items-center justify-content-between"><input type="checkbox" name="status" value="1">
                                                <p>Hiện</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if (isset($_GET['msg'])) {
                                    $msg = unserialize(urldecode($_GET['msg']));
                                    foreach ($msg as $key => $value) {
                                        echo '<div style="color:green; font-size: 15px">' . $value . '</div>';
                                    }
                                }
                                ?>
                                <input type="submit" class="submit mt-2" value="Thêm">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="table-responsive mt-3">
                        <table class="table align-middle table_user">
                            <?php
                            if (isset($_GET['mess'])) {
                                $msg = unserialize(urldecode($_GET['mess']));
                                foreach ($msg as $key => $value) {
                                    echo '<div style="color:white; font-size: 15px">' . $value . '</div>';
                                }
                            }
                            ?>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên giảm giá</th>
                                    <th>Giảm giá</th>
                                    <th>Hiển thị</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($discounts as $key => $value) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td>#<?php echo $i ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <p class="m-0"><?php echo $value['text_discount'] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="m-0"><?php echo $value['discount'] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            if ($value['status'] == 0) {
                                            ?>
                                                <a href="<?php echo BASE_URL ?>discount/active/<?php echo $value['id_discount'] ?>"><i class="fas fa-eye-slash"></i></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?php echo BASE_URL ?>discount/unactive/<?php echo $value['id_discount'] ?>"><i class="fas fa-eye"></i></a>
                                            <?php
                                            }
                                            ?>

                                        </td>
                                        <td><a class="far fa-edit" href="<?php echo BASE_URL ?>discount/edit_discount/<?php echo $value['id_discount'] ?>"></a></td>
                                        <td><a class="far fa-trash-alt" href="<?php echo BASE_URL ?>discount/delete_discount/<?php echo $value['id_discount'] ?>"></a></td>
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
    </div>
</div>