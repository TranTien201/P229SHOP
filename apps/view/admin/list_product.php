<div class="container-fluid">
    <h1 class="text-center mt-5 mb-5 text-white ">Sản phẩm của cửa hàng</h1>
    <?php
    if (isset($_GET['msg'])) {
        $msg = unserialize(urldecode($_GET['msg']));
        foreach ($msg as $key => $value) {
            echo '<div style="color:green; font-size: 15px">' . $value . '</div>';
        }
    }
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-xl-2  d-flex align-items-center">
                            <a href="<?php echo BASE_URL ?>product/load_add_product" class="btn btn-light mb-3 mb-lg-0"><i class="fas fa-plus mr-2"></i>Thêm sản phẩm</a>
                        </div>
                        <div class="col-lg-9 col-xl-10">
                            <div class="row row-cols-lg-auto g-2">
                                <div class="col-12">
                                    <div class="form-group d-flex">
                                        <div class="search-box">
                                            <input type="text" class="form-control  product_name" placeholder="Tìm sản phẩm..." name="search">
                                            <div class="result">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex align-items-center">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="btn btn-light">Sắp xếp</button>
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class='bx bx-chevron-down'></i>
                                            </button>
                                            <ul class="dropdown-menu " aria-labelledby="btnGroupDrop1" style="padding: 5px 10px;">
                                                <div class=" d-flex align-items-center w-100">
                                                    <input class="form-check-input  sort" type="radio" value="0" id="defaultCheck2" name="brand">
                                                    <label style="margin-left: auto; color:#fff" class="form-check-label" for="exampleRadios1">
                                                        Mới nhất
                                                    </label>
                                                </div>
                                                <div class=" d-flex align-items-center w-100">
                                                    <input class="form-check-input  sort" type="radio" value="1" id="defaultCheck2" name="brand">
                                                    <label style="margin-left: auto; color:#fff" class="form-check-label" for="exampleRadios1">
                                                        Mua nhiều
                                                    </label>
                                                </div>
                                                <div class=" d-flex align-items-center w-100">
                                                    <input class="form-check-input sort" type="radio" value="2" id="defaultCheck2" name="brand">
                                                    <label style="margin-left: auto; color:#fff" class="form-check-label" for="exampleRadios1">
                                                        Giảm giá
                                                    </label>
                                                </div>
                                                <div class=" d-flex align-items-center w-100">
                                                    <input class="form-check-input  sort" type="radio" value="3" id="defaultCheck2" name="brand">
                                                    <label style="margin-left: auto; color:#fff" class="form-check-label" for="exampleRadios1">
                                                        Giá cao nhất
                                                    </label>
                                                </div>
                                                <div class=" d-flex align-items-center w-100">
                                                    <input class="form-check-input sort" type="radio" value="4" id="defaultCheck2" name="brand">
                                                    <label style="margin-left: auto; color:#fff" class="form-check-label" for="exampleRadios1">
                                                        Giá thấp nhất
                                                    </label>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-12 d-flex align-items-center">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="btn btn-light">Nhãn hiệu</button>
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class='bx bxs-category'></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="btnGroupDrop1" style="padding: 5px 10px;">
                                                <?php foreach ($brands as $key => $val) { ?>
                                                    <div class=" d-flex align-items-center w-100">
                                                        <input class="form-check-input brands brand" type="checkbox" value="<?php echo $val['id_brand'] ?>" id="defaultCheck2" name="brand">
                                                        <label style="margin-left: auto; color:#fff" class="form-check-label" for="exampleRadios1">
                                                            <?php echo $val['brand'] ?>
                                                        </label>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-12 d-flex align-items-center">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-light">Loại hàng</button>
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class='bx bx-slider'></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="btnGroupDrop1" style="padding: 5px 10px;">
                                                <?php foreach ($categories as $key => $val) { ?>
                                                    <div class=" d-flex align-items-center w-100">
                                                        <input class="form-check-input category" type="checkbox" value="<?php echo $val['id_category'] ?>" id="defaultCheck2" name="brand">
                                                        <label style="margin-left: auto; color:#fff" class="form-check-label" for="exampleRadios1">
                                                            <?php echo $val['category_name'] ?>
                                                        </label>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-12 d-flex align-items-center" id="sort_product">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-light">Lọc sản phẩm</button>
                                    </div>
                                </div>
                                <div class="col-12 col-12 d-flex align-items-center" id="delete_sort">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-light">Hủy lọc </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="load_product_admin">
        <div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px;" id="load_product_admin">
            <table class="table1 align-middle table_user" style="overflow: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Ảnh khác</th>
                        <th>Nhân viên</th>
                        <th>Nhãn hiệu</th>
                        <th>Loại hàng</th>
                        <th>Ngày đăng tải</th>
                        <th>Tình trạng</th>
                        <th>Số lượng bán</th>
                        <th>Ngày sửa đổi</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <!-- <tbody>
                    <?php $i = 0;
                    foreach ($products as $key => $product) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $product['product_name'] ?></td>
                            <td><?php echo number_format($product['price']) ?>đ</td>
                            <td class="d-flex img_p">
                                <?php foreach ($imgcolors as $key => $imgcolor) {
                                ?>
                                    <?php if ($product['id_product'] == $imgcolor['id_product']) { ?>
                                        <span>
                                            <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $imgcolor['img_name'] ?>" alt="">
                                        </span>
                                    <?php } ?>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?php echo $product['staff_name'] ?></td>
                            <td><?php echo $product['brand'] ?></td>
                            <td><?php echo $product['category_name'] ?></td>
                            <td><?php echo $product['date_up'] ?></td>
                            <td><?php if ($product['status'] == 2) {
                                    echo 'Mới';
                                } else if ($product['status'] == 1) {
                                    echo 'Hàng bán chạy';
                                } else {
                                    echo 'Giảm giá';
                                }
                                ?></td>
                            <td><?php echo $product['sell_number'] ?></td>
                            <td><?php echo $product['date_update'] ?></td>
                            <td><a href="<?php echo BASE_URL ?>product/detail_product/<?php echo $product['id_product'] ?>"><i class="far fa-eye"></i></a></td>
                            <td><a href="<?php echo BASE_URL ?>product/editproduct/<?php echo $product['id_product'] ?>"><i class="far fa-edit"></i></a></td>
                            <td><a href="<?php echo BASE_URL ?>product/delete_product/<?php echo $product['id_product'] ?>"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
    
                    <?php }
                    ?>
    
                </tbody> -->
            </table>

        </div>

    </div>
</div>