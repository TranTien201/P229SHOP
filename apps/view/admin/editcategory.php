<div class="main_body">
    <div class="container-fluid">
        <div class="container-fluid mt-4">
            <div class="form-add container-fluid">
                <?php
                foreach ($categorybyid as $key => $cateid) {
                ?>
                    <form method="POST" action="<?php echo BASE_URL ?>category/update_category/<?php echo $cateid['id_category'] ?>">
                        <div class="p-4">
                            <div class="form-group ">
                                <label for="">Loại hàng</label>
                                <input type="text" name="category" required="1" value="<?php echo $cateid['category_name'] ?>">
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <div class="size size_t" aria-multiline="true">
                                    <div class="input_sizes input_size">Chọn loại hàng<i class="fas fa-sort-down"></i></div>
                                    <div class="s_d_b d_b" style="display: none;" aria-multiline="true">
                                        <?php
                                        foreach ($categories as $key => $value) {
                                        ?>
                                            <span class="d-flex align-items-center justify-content-between"><input <?php if ($cateid['category_name'] == $value['category_name'])  echo "checked"; ?> type="checkbox" name="category_parent" value="<?php echo $value['id_category'] ?> ">
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
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>