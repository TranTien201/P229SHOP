

<div class="main_body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 mt-3">
                <div class="card-body card-pro">
                    <div class="d-flex align-items-center justify-content-around mb-4">
                        <i class="fas fa-shopping-cart"></i>
                        <div>
                            <h4>Doanh thu</h4>
                            <h5><?php echo number_format($totals[0]['total']) ?>đ</h5>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mt-3">
                <div class="card-body card-pro">
                    <div class="d-flex align-items-center justify-content-around mb-4">
                        <i class="fas fa-eye"></i>
                        <div>
                            <h4>Người mua</h4>
                            <h5><?php echo $userOrder[0]['username'] ?></h5>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mt-3">
                <div class="card-body card-pro">
                    <div class="d-flex align-items-center justify-content-around mb-4">
                        <i class="fas fa-file-alt"></i>
                        <div>
                            <h4>Số đơn hàng</h4>
                            <h5><?php echo $countOrder[0]['id_order'] ?></h5>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mt-3">
                <div class="card-body card-pro">
                    <div class="d-flex align-items-center justify-content-around mb-4">
                        <i class="fas fa-user-alt"></i>
                        <div>
                            <h4>Tài khoản</h4>
                            <h5><?php echo $countAccount[0]['id'] ?></h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="mt-5" id="chart1" style="border:  2px solid rgb(255 255 255 / 15%);"></div>
    </div>
    <div class="container-fluid mt-3 ">
        <div class="row world-map " style="margin: 0 5px;">

            <div class="col-xl-6  col-lg-12 col-12 ">
                <div class="card-body p-0" style="width: 100%;">
                    <p class="mt-2">Store sales in different countries </p>
                    <div id="world-map" style="height: 330px;  overflow: hidden; width: 100%;"></div>

                </div>

            </div>

            <div class="col-md-6 col-lg-12 col-xl-6 col-12">
                <table class="table-responsie world mt-3">
                    <thead>
                        <tr>
                            <th>Country </th>
                            <th>Revenue</th>
                            <th>Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>USA</th>
                            <th>$4000</th>
                            <th>250</th>
                        </tr>
                        <tr>
                            <th>KOREA</th>
                            <th>$3000</th>
                            <th>220</th>
                        </tr>
                        <tr>
                            <th>THAILAND</th>
                            <th>$2000</th>
                            <th>220</th>
                        </tr>
                        <tr>
                            <th>RUSSIA</th>
                            <th>$2000</th>
                            <th>220</th>
                        </tr>
                        <tr>
                            <th>VIETNAMESE</th>
                            <th>$5000</th>
                            <th>440</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3 ">
        <div class="row world-map " style="margin: 0 5px;">

            <div class="col-xl-6  col-lg-12 col-12 ">
                <div class="card-body p-0">
                    <p class="mt-2">Store sales in different countries </p>
                    <div id="map" style="height: 350px;"></div>

                </div>

            </div>

            <div class="col-md-6 col-lg-12 col-xl-6 col-12">
                <table class="table-responsie world mt-3">
                    <thead>
                        <tr>
                            <th>Province/City </th>
                            <th>Revenue</th>
                            <th>Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Ho Chi Minh City</th>
                            <th>$4000</th>
                            <th>250</th>
                        </tr>
                        <tr>
                            <th>Hue City</th>
                            <th>$3000</th>
                            <th>220</th>
                        </tr>
                        <tr>
                            <th>Ha Noi Capital</th>
                            <th>$2000</th>
                            <th>220</th>
                        </tr>
                        <tr>
                            <th>Can Tho City</th>
                            <th>$2000</th>
                            <th>220</th>
                        </tr>
                        <tr>
                            <th>Da Nang City</th>
                            <th>$5000</th>
                            <th>440</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- <div class="container-fluid mt-3 ">
            <div class="row m-0">
                <div class="col-lg-6 col-xl-6 col-12 bd1" style=" padding: 0; border: 2px solid rgb(255 255 255 / 15%);">
                    <div class="">

                        <div id="container" class="chart"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 col-12 p-0 " style="border: 2px solid rgb(255 255 255 / 15%); padding-left: 5px;">

                    <div class="">
                        <div id="chart4" class=" chart"></div>
                    </div>
                </div>
            </div>
        </div> -->
    <div class="container-fluid mt-4">
        <div>
            <div class="card-body chart">
                <h4 class="mb-3">Khách hàng mua nhiều</h4>
                <hr>
                <div class="table-responsive mt-3">
                    <table class="table align-middle table_user">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Số tiền</th>
                                <th>Số đơn hàng</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($topOrder as $key => $val) {
                                $i++
                            ?>
                                <tr>
                                    <td>#<?php echo $i ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="img-user">
                                                <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $val['img_profile'] ?>" alt="">
                                            </div>
                                            <div>
                                                <p class="m-0"><?php echo $val['username'] ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $val['phone'] ?></td>
                                    <td><?php echo $val['email'] ?></td>
                                    <td><?php echo $val['country'] ?></td>
                                    <td><?php echo number_format($val['totals']) ?>đ</td>
                                    <td><?php echo $val['countorder'] ?></td>
                                </tr>
                            <?php
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>