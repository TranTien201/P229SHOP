<div class="main_body">
    <div class="container-fluid">
        <div class="container-fluid mt-4">
            <div class="form-add container-fluid">
                <?php
                foreach ($discountid as $key => $value) {
                ?>
                    <form method="POST" action="<?php echo BASE_URL ?>discount/update_discount/<?php echo $value['id_discount'] ?>">
                        <div class="p-4">
                            <div class="form-group ">
                                <label for="">Tên giảm giá</label>
                                <input type="text" name="text_discount" required="1" value="<?php echo $value['text_discount'] ?>">
                            </div>
                            <div class="form-group ">
                                <label for="">Giảm giá</label>
                                <input type="text" name="discount" required="1" value="<?php echo $value['discount'] ?>">
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