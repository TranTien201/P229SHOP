<div class="form-add container-fluid">
    <h1 class="text-center mt-5 mb-5 text-white ">Thêm sản phẩm +</h1>
    <form action="<?php echo BASE_URL ?>product/addproduct" method="post" enctype="multipart/form-data">
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
                        <input type="text" name="product_name" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Giá</label>
                        <input type="text" name="price" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Mô tả sản phẩm</label>
                    <textarea name="description" id="description"></textarea>
                </div>
                <div class="form-group place_product_img" style="height: 100%;">
                    <label for="">Hình ảnh khác sản phẩm</label>
                    <div class="form-group d-flex w-100 flex-wrap" style="white-space: normal;">
                        <?php foreach ($imgcolor as $key => $value) {

                        ?>
                            <span class="add_img"><input value="<?php echo $value['id_imgcolor'] ?>" type="checkbox" name="imgother[]"><img src="../apps/uploads/<?php echo $value['img_name'] ?>" alt=""></span>
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
                                    <span class="d-flex align-items-center justify-content-between"><input type="checkbox" name="brand" value="<?php echo $value['id_brand'] ?>">
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
                                    <span class="d-flex align-items-center justify-content-between"><input type="checkbox" name="category" value="<?php echo $value['id_category'] ?>">
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
                        <label for="">Tình trạng</label>
                        <div class="size size_t" aria-multiline="true">
                            <div class="input_sizes input_size">Chọn tình trạng</div>
                            <div class="s_d_b d_b" style="display: none;" aria-multiline="true">
                                <span class="d-flex align-items-center justify-content-between"><input type="checkbox" name="status" value="2">
                                    <p>Mới</p>
                                </span>
                                <span class="d-flex align-items-center justify-content-between"><input type="checkbox" name="status" value="0">
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
                                    <span class="d-flex align-items-center justify-content-between"><input type="checkbox" name="discount[]" value="<?php echo $value['id_discount'] ?>">
                                        <p><?php echo $value['text_discount'] . '-' . $value['discount'] . '%' ?></p>
                                    </span>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <input class="submit mt-5 d-block m-auto" type="submit" value="Thêm">
            </div>
        </div>
    </form>
</div>