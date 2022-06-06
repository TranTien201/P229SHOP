<div class="container-fluid">
    <?php
    foreach ($products as $key => $val) {
    ?>
        <div class="product">
            <div class="row">
                <div class="col-md-4">
                    <div class="img image">
                        <img src="../../apps/uploads/<?php echo $imgcolor[0]['img_name'] ?>" alt="" class="p<?php echo $val['id_product'] ?>">
                    </div>
                    <div id="load_data_img">

                    </div>
                    <div class="description ml-2">
                        <h3>Mô tả sản phẩm:</h3>
                        <?php echo $val['description'] ?>
                    </div>
                    <input type="text" class="id_imgdesc" id="img_color" value="<?php echo $imgcolor[0]['img_name'] ?>" hidden>
                    <input type="text" class="id_size" value="" hidden>
                </div>
                <div class="col-md-8">
                    <div class="info-product">
                        <h1 class="title-heading"><?php echo $val['product_name'] ?></h1>
                        <div class="price"><?php echo number_format($val['price']) ?>đ</div>
                        <!-- <h3 class="mt-3 text-light">Other products:</h3> -->
                        <div class="product-orther">
                            <span class="p<?php echo $imgcolor[0]['id_imgcolor'] ?> img_orther_product active"><img class="img_product" src="../../apps/uploads/<?php echo $imgcolor[0]['img_name'] ?>" alt=""></span>
                            <?php foreach ($imgcolors as $key => $img) { ?>
                                <?php if ($imgcolor[0]['id_imgcolor'] != $img['id_imgcolor']) {
                                ?>
                                    <span class="p<?php echo $img['id_imgcolor'] ?> img_orther_product"><img class="img_product" src="../../apps/uploads/<?php echo $img['img_name'] ?>" alt=""></span>
                                <?php
                                }
                                ?>
                            <?php } ?>
                        </div>
                        <div id="load_data_size">

                        </div>
                        <div class="amount" hidden>
                            <button class="down" style="background: none; font-size: 25px;" onclick="down()">-</button><input type="text" id="amount" value="1" style="border: none;"><button style="background:none !important; font-size: 25px; color: #fff;" onclick="up()">+</button>
                        </div>
                        <div id="notification">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="review-product">
            <div class="review-nav">
                <span class="title" style="margin-left: 10px;">Ảnh <p class="current-img" style="margin: 0px 10px;"></p> của <p class="total-img" style="margin-left: 10px;"></p></span>
                <span style="cursor: pointer;" class="icon fas fa-times"></span>
            </div>
            <div class="change">
                <div class="slide1 prev"><i class="fas fa-angle-left"></i></div>
                <div class="slide1 next"><i class="fas fa-angle-right"></i></div>
                <img src="img/shoe1.png" alt="">
            </div>
        </div>
        <div class="popup"></div> -->

    <?php
    }
    ?>
</div>
<script>
    $(document).ready(function(event) {

        //load dữ liệu

        function fecth_data() {
            var id_img = document.querySelector('.id_imgdesc').value;
            console.log(id_img);
            $.ajax({
                url: "<?php echo BASE_URL ?>product/list_imgdesc_ajax",
                method: "POST",
                data: {
                    id_img: id_img
                },

                success: function(data) {
                    $('#load_data_img').html(data);
                }
            })
            fetch_size(id_img);
            const img_orther_product = document.querySelectorAll('.img_orther_product');
            console.log(img_orther_product);
            const img = document.querySelectorAll('.img_product');
            var provisional = 0;
            for (let i = 0; i < img_orther_product.length; i++) {
                img_orther_product[i].onclick = () => {
                    img_orther_product[provisional].classList.remove('active');
                    $('#notification').html("  ");
                    // console.log(img[i].src);
                    img_orther_product[i].classList.add('active');
                    var get_img = img[i].src;
                    if (get_img.includes('<?php echo BASE_URL ?>apps/uploads/')) {
                        imgsplit = get_img.split('<?php echo BASE_URL ?>apps/uploads/')[1];
                        document.querySelector('.id_imgdesc').value = imgsplit;
                        var id_img = document.querySelector('.id_imgdesc').value;
                        $.ajax({
                            url: "<?php echo BASE_URL ?>product/list_imgdesc_ajax",
                            method: "POST",
                            data: {
                                id_img: id_img
                            },

                            success: function(data) {
                                $('#load_data_img').html(data);
                            }
                        })
                        fetch_size(id_img);
                        console.log(id_img);
                    }
                    provisional = i;
                }

            }
        }
        fecth_data();

        function fetch_size(id_img) {
            $.ajax({
                url: "<?php echo BASE_URL ?>product/list_size_ajax",
                method: "POST",
                data: {
                    id_img: id_img
                },

                success: function(data) {
                    $('#load_data_size').html(data);
                }
            })
        }

        function check_quantity_product() {
            $(document).on('click', '.choose_size', function() {
                $('.choose_size').removeClass('active');
                var id_size = $(this).data('id2');
                var id_img = $(this).data('id1');
                document.querySelector('.id_size').value = id_size;

                $(this).addClass('active')
                notification(id_size, id_img);
            });
        }
        check_quantity_product();

        function notification(id_size, id_img) {
            $.ajax({
                url: "<?php echo BASE_URL ?>product/check_quantity_product",
                method: "POST",
                data: {
                    id_img: id_img,
                    id_size: id_size
                },
                success: function(data) {
                    $('#notification').html(data);
                }
            });
        }
    });
</script>