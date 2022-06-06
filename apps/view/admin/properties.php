<div class="main_body">
    <div class="container-fluid">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="form-add container-fluid">
                        <?php
                        if (isset($_GET['msg'])) {
                            $msg = unserialize(urldecode($_GET['msg']));
                            foreach ($msg as $key => $value) {
                                echo '<div style="color:#fff; font-size: 20px; text-align:center">' . $value . '</div>';
                                echo '<script>alert(' . $value . ')</script>';
                            }
                        }
                        ?>
                        <form method="POST" action="<?php echo BASE_URL ?>properties/connective">
                            <div class="p-4">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group place_product_img">
                                            <label for="">Hình ảnh mô tả</label>
                                            <div class="form-group d-flex w-100 flex-wrap" style="white-space: normal;">
                                                <?php foreach ($imgdesc as $key => $value) {

                                                ?>
                                                    <span class="add_img"><input type="checkbox" name="imgdesc[]" value="<?php echo $value['id_imgdesc'] ?>"><img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $value['name_imgdesc'] ?>" alt=""></span>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group place_product_img">
                                            <label for="">Hình ảnh sản phẩm</label>
                                            <div class="form-group d-flex w-100 flex-wrap" style="white-space: normal;">
                                                <?php foreach ($imgother as $key => $value) {

                                                ?>
                                                    <span class="add_img"><input type="checkbox" name="imgother" value="<?php echo $value['id_imgcolor'] ?>"><img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $value['img_name'] ?>" alt=""></span>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="submit mt-2" value="Thêm liên kết cho ảnh">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4">
            <div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px; width: 100%;">
                <table class="table1 align-middle table_user" style="overflow: auto; width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Ảnh mô tả sản phẩm</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($imgothers as $key => $imgother) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td class="img_p">
                                    <span>
                                        <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $imgother['img_name'] ?>" alt="">
                                    </span>
                                </td>
                                <td class="d-flex img_p">
                                    <?php foreach ($imgdescs as $key => $imgdesc) {
                                    ?>
                                        <?php if ($imgother['id_imgcolor'] == $imgdesc['id_imgcolor']) { ?>
                                            <span>
                                                <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $imgdesc['name_imgdesc'] ?>" alt="">
                                            </span>
                                        <?php } ?>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td><a href="<?php echo BASE_URL ?>properties/delete_connective/<?php echo $imgother['id_imgcolor'] ?>"><i class="far fa-trash-alt"></i></a></td>
                            </tr>

                        <?php }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="form-add container-fluid">
                        <form method="POST" id="insert_data_size_img">
                            <div class="p-4">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="size size_t" aria-multiline="true">
                                            <div class="input_sizes input_size">Chọn size<i class="fas fa-sort-down"></i></div>
                                            <div class="s_d_b d_b" style="display: none;" aria-multiline="true">
                                                <?php
                                                foreach ($sizes as $key => $value) {
                                                ?>
                                                    <span class="d-flex align-items-center justify-content-between"><input type="checkbox" class="id_size" name="size" value="<?php echo $value['id_size'] ?>">
                                                        <p><?php echo $value['size'] ?></p>
                                                    </span>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="size size_t" aria-multiline="true">
                                            <div class="input_brand input_size">Chọn ảnh sản phẩm<i class="fas fa-sort-down"></i></div>
                                            <div class="b_d_b d_b" style="display: none;" aria-multiline="true">
                                                <?php
                                                foreach ($imgothers as $key => $value) {
                                                ?>
                                                    <span class="d-flex align-items-center justify-content-between"><input class="imgother" type="checkbox" name="imgother" value="<?php echo $value['id_imgcolor'] ?>">
                                                        <div class="img_p">
                                                            <span>
                                                                <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $value['img_name'] ?>" alt="">
                                                            </span>
                                                        </div>
                                                    </span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="">Số lượng</label>
                                    <input type="text" class="quantity" name="quantity" required="1">
                                </div>
                                <input type="button" id="insert_img_size" class="submit mt-2" value="Thêm">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div id="load_data">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(event) {

        //load dữ liệu
        function fecth_data() {
            $.ajax({
                url: "<?php echo BASE_URL ?>properties/load_img_size",
                method: "POST",


                success: function(data) {
                    $('#load_data').html(data);
                }
            });
        }
        fecth_data();
        // xóa dữ liệu
        $(document).on('click', '.del_rela', function() {
            var id = $(this).data('id2');
            console.log(id);
            $.ajax({
                url: "<?php echo BASE_URL ?>size/delete_size",
                method: "POST",
                data: {
                    "id": id,
                },
                success: function() {
                    fecth_data();
                    alert("Xóa thành công");
                }

            });
        });
        // sửa dữ liệu
        function edit_size(id, text) {
            $.ajax({
                url: "<?php echo BASE_URL ?>size/update_size",
                method: "POST",
                data: {
                    "id": id,
                    "text": text,
                },
                success: function() {
                    fecth_data();
                }

            });
        }
        $(document).on('blur', '.size', function() {
            var id = $(this).data('id1');
            var text = $(this).text();

            edit_size(id, text);
        });
        //thêm dữ liệu
        $("#insert_img_size").on('click', function(event) {
            var size = document.querySelector('.id_size:checked').value
            var imgother = document.querySelector('.imgother:checked').value
            var quantity = document.querySelector('.quantity').value;
            $.ajax({
                url: "<?php echo BASE_URL ?>properties/add_imgother_size",
                method: "POST",
                data: {
                    size: size,
                    imgother: imgother,
                    quantity: quantity
                },
                success: function() {
                    $("#insert_data_size_img")[0].reset;
                    alert("Thêm size thành công");
                    fecth_data();
                }

            });

        });

    });
</script>
<script>
    document.getElementById("insert").addEventListener("click", myFunction);

    function myFunction() {
        var checkedValue = document.querySelector('.test:checked').value
        document.querySelector('.tien').value = checkedValue;
        var test = document.querySelector('.tien').value;
        console.log(test);
    }
</script>