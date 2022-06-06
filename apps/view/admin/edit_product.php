<div class="form-add container-fluid">
    <h1 class="text-center mt-5 mb-5 text-white ">Sửa sản phẩm +</h1>
    <?php foreach ($productbyid as $key => $product) {
    ?>
        <form action="<?php echo BASE_URL ?>product/updateproduct/<?php echo $product['id_product'] ?>" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET['msg'])) {
                $msg = unserialize(urldecode($_GET['msg']));
                foreach ($msg as $key => $value) {
                    echo '<div style="color:white; font-size: 15px">' . $value . '</div>';
                }
            }
            ?>
            <div class="row p-2">
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="product_name" value="<?php echo $product['product_name'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Giá</label>
                            <input type="text" name="price" value="<?php echo $product['price'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả sản phẩm</label>
                        <textarea name="description" id="description"><?php echo $product['description'] ?></textarea>
                    </div>
                    <div class="form-group place_product_img">
                        <label for="">Hình ảnh khác sản phẩm</label>
                        <div class="form-group d-flex w-100 flex-wrap" style="white-space: normal;">
                            <?php foreach ($imgcolors as $key => $value) {
                            ?>
                                <span class="add_img">
                                    <input value="<?php echo $value['id_imgcolor'] ?>" type="checkbox" name="imgother[] " <?php
                                                                                                                            foreach ($imgotherbyid as $key => $imgid) {
                                                                                                                            ?> <?php if ($value['id_imgcolor'] == $imgid['id_imgcolor']) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?> <?php
                                                                                                                                    }
                                                                                                                                        ?>>
                                    <img src="../../apps/uploads/<?php echo $value['img_name'] ?>" alt="">
                                </span>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Nhãn hàng</label>
                            <div class="size size_t" aria-multiline="true">
                                <div class="input_brand input_size">Chọn nhãn hàng</div>
                                <div class="b_d_b d_b" style="display: none;" aria-multiline="true">
                                    <?php
                                    foreach ($brands as $key => $value) {
                                    ?>
                                        <span class="d-flex align-items-center justify-content-between">
                                            <input type="checkbox" name="brand" value="<?php echo $value['id_brand'] ?>" <?php if ($product['id_brand'] == $value['id_brand']) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                            <p><?php echo $value['brand'] ?></p>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Loại hàng</label>
                            <div class="size size_t" aria-multiline="true">
                                <div class="input_category input_size">Chọn loại hàng</div>
                                <div class="c_d_b d_b" style="display: none;" aria-multiline="true">
                                    <?php
                                    foreach ($categories as $key => $value) {
                                    ?>
                                        <span class="d-flex align-items-center justify-content-between">
                                            <input type="checkbox" name="category" value="<?php echo $value['id_category'] ?>" <?php if ($product['id_category'] == $value['id_category']) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                            <p><?php echo $value['category_name'] ?></p>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Trạng thái</label>
                            <div class="size size_t" aria-multiline="true">
                                <div class="input_status input_size">Chọn trạng thái</div>
                                <div class="st_d_b d_b" style="display: none;" aria-multiline="true">
                                    <span class="d-flex align-items-center justify-content-between">
                                        <input type="checkbox" name="status" value="2" <?php if ($product['status'] == 2) echo 'checked'; ?>>
                                        <p>Mới</p>
                                    </span>
                                    <span class="d-flex align-items-center justify-content-between">
                                        <input type="checkbox" name="status" value="1" <?php if ($product['status'] == 1) echo 'checked'; ?>>
                                        <p>Mặt hàng thường</p>
                                    </span>
                                    <span class="d-flex align-items-center justify-content-between">
                                        <input type="checkbox" name="status" value="0" <?php if ($product['status'] == 0) echo 'checked'; ?>>
                                        <p>Giảm giá</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Giảm giá</label>
                            <div class="size size_t" aria-multiline="true">
                                <div class="input_discount input_size">Chọn giảm giá</div>
                                <div class="d_d_b d_b" style="display: none;" aria-multiline="true">
                                    <?php
                                    foreach ($discounts as $key => $value) {
                                    ?>
                                        <span class="d-flex align-items-center justify-content-between">
                                            <input type="checkbox" name="discount[]" value="<?php echo $value['id_discount'] ?>" <?php
                                                                                                                                    foreach ($discountbyid as $key => $dis) {
                                                                                                                                    ?> <?php if ($value['id_discount'] == $dis['id_discount']) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?> <?php
                                                                                                                                            }
                                                                                                                                                ?>>
                                            <p><?php echo $value['text_discount'] . '-' . $value['discount'] . '%' ?></p>
                                        </span>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <input class="submit mt-5" type="submit" value="Sửa">
                </div>
                <div class="col-md-6" hidden>
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Size</label>
                            <div class="size size_t" aria-multiline="true">
                                <div class="input_sizes input_size">Chọn size</div>
                                <div class="s_d_b d_b" style="display: none;" aria-multiline="true">
                                    <?php
                                    foreach ($sizes as $key => $value) {
                                    ?>
                                        <span class="d-flex align-items-center justify-content-between">
                                            <input type="checkbox" name="size[]" value="<?php echo $value['id_size'] ?>" <?php
                                                                                                                            foreach ($sizebyid as $key => $size) {
                                                                                                                            ?> <?php if ($value['id_size'] == $size['id_size']) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?> <?php
                                                                                                                                    }
                                                                                                                                        ?>>
                                            <p><?php echo $value['size'] ?></p>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </form>
    <?php
    }
    ?>
</div>