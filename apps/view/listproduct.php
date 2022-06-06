<div class="content container-fluid" style="background: rgb(255, 255, 255, 0.03); padding-top: 40px;">
    <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-6  w-100">
            <nav class=" navbar-expand-md ">
                <button class="navbar-toggler mr-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
                    <span><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <div class="w-100">
                        <div class=" ">
                            <div class="sort w-100">
                                <!-- <div class="money">
                                    <div class="input input_money">Sort price<i class="fas fa-sort-down"></i></div>
                                    <div class="d-flex align-items-center justify-content-center" style="background-color: rgb(0 0 0 / 15%);">
                                        <div class="middle " style="display: none;">
                                            <div class="vl">
                                                <div class="value_left">
                                                    <span>100</span>
                                                </div>
                                                <div class="value_right">
                                                    <span>100</span>
                                                </div>
                                            </div>
                                            <div class="multi-range-slider">
                                                <input type="range" id="input-left" min="0" max="100" value="0">
                                                <input type="range" id="input-right" min="0" max="100" value="100">
                                                <div class="slider">
                                                    <div class="track"></div>
                                                    <div class="range"></div>
                                                    <div class="thumb left"></div>
                                                    <div class="thumb right"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div id="accordion">
                                    <div class="card" style="background: rgb(255 255 255 / 15%) !important; box-shadow: none; border-radius: 0 !important">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed text-light" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    Chọn mức tiền
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour" style="background-color: rgb(255, 255, 255, 0.03) !important;" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body" style="padding: 0 10px !important;">
                                                <h3 style="color: #fff">Giá tiền</h3>
                                                <input type="hidden" id="hidden_minimum_price" value="0" />
                                                <input type="hidden" id="hidden_maximum_price" value="<?php echo $maxprice[0]['maxprice'] ?>" />
                                                <p id="price_show">0 - <?php echo $maxprice[0]['maxprice'] ?></p>
                                                <div id="price_range"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="background: rgb(255 255 255 / 15%) !important; box-shadow: none; border-radius: 0 !important">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed text-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    Chọn nhãn hiệu
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" style="background-color: rgb(255, 255, 255, 0.03) !important;" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body" style="padding: 0 10px !important;">
                                                <?php foreach ($brands as $key => $brand) {
                                                ?>
                                                    <div class="form-check d-flex align-items-center" style="height: 50px; border-bottom: 1px solid rgb(255, 255, 255, 0.15);">
                                                        <input class="form-check-input brands" type="checkbox" value="<?php echo $brand['id_brand'] ?>" id="defaultCheck2" name="brand">
                                                        <label style="margin-left: auto; color:#fff" class="form-check-label" for="exampleRadios1">
                                                            <?php echo $brand['brand'] ?>
                                                        </label>
                                                    </div>

                                                <?php
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="background: rgb(255 255 255 / 15%) !important; box-shadow: none; border-radius: 0 !important">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed text-light" data-toggle="collapse" data-target="#collapseTow" aria-expanded="false" aria-controls="collapseTow">
                                                    Chọn loại hàng
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTow" style="background-color: rgb(255, 255, 255, 0.03) !important;" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body" style="padding: 0 10px !important;">
                                                <?php foreach ($categories as $key => $category) {
                                                ?>
                                                    <div class="form-check d-flex align-items-center" style="height: 50px; border-bottom: 1px solid rgb(255, 255, 255, 0.15);">
                                                        <input class="form-check-input category" type="checkbox" value="<?php echo $category['id_category'] ?>" id="defaultCheck1">
                                                        <label style="margin-left: auto; color:#fff" class="form-check-label" for="exampleRadios1">
                                                            <?php echo $category['category_name'] ?>
                                                        </label>
                                                    </div>

                                                <?php
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-sort">
                                    <i class="fas fa-filter"></i>
                                    <input type="submit" class="filter_product" value="Tìm kiếm">
                                </div>
                                <div class="btn-delete-sort">
                                    <i class="fas fa-trash-alt"></i>
                                    <input type="submit" value="Xóa hết lựa chọn">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <input type="text" value="<?php echo $products[0]['id_category'] ?> " id="id_category" hidden>
        </div>
        <div class="col-xl-7 col-lg-7 col-md-12 col-12 ml-auto m-0 ">
            <div id="load_product_ajax">

            </div>
        </div>
    </div>

</div>