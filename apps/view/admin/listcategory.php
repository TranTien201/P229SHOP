<div class="main_body">
    <div class="container-fluid">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-add container-fluid">
                        <form method="POST" action="<?php echo BASE_URL ?>category/add_category">
                            <div class="p-4">
                                <div class="form-group ">
                                    <label for="">Loại hàng</label>
                                    <input type="text" name="category" required="1">
                                </div>
                                <div class="form-group col-md-6 mt-3">
                                    <div class="size size_t" aria-multiline="true">
                                        <div class="input_sizes input_size">Chọn loại hàng<i class="fas fa-sort-down"></i></div>
                                        <div class="s_d_b d_b" style="display: none;" aria-multiline="true">
                                            <?php
                                            foreach ($categories as $key => $value) {
                                            ?>
                                                <span class="d-flex align-items-center justify-content-between"><input type="checkbox" name="category_parent" value="<?php echo $value['id_category'] ?>">
                                                    <p><?php echo $value['category_name'] ?></p>
                                                </span>
                                            <?php
                                            }
                                            ?>

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
                                    <th>User ID</th>
                                    <th>Loại hàng</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($categories as $key => $value) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td>#<?php echo $i ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="m-0"><?php echo $value['category_name'] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><a class="far fa-edit" href="<?php echo BASE_URL ?>category/edit_category/<?php echo $value['id_category'] ?>"></a></td>
                                        <td><a class="far fa-trash-alt" href="<?php echo BASE_URL ?>category/delete_category/<?php echo $value['id_category'] ?>"></a></td>
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