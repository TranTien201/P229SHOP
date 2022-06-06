<div class="main_body">
    <div class="container-fluid">
        <div class="mb-3">
            <a href="<?php echo BASE_URL ?>local" class="btn btn-success">Thêm quốc gia</a>
            <a href="<?php echo BASE_URL ?>local/state" class="btn btn-success">Thêm quận huyện</a>
        </div>
        <div class="container-fluid mt-4">
            <div class="row">
                <?php
                if (isset($_GET['mess'])) {
                    $msg = unserialize(urldecode($_GET['mess']));
                    foreach ($msg as $key => $value) {
                        echo '<div style="color:white; font-size: 15px">' . $value . '</div>';
                    }
                }
                ?>
                <div class="col-12 mb-3">
                    <div class="form-add container-fluid">
                        <form method="post" action="<?php echo BASE_URL ?>local/add_city">
                            <div class="row p-4">
                                <div class="form-group col">
                                    <label for="">Thêm thành phố / Tỉnh</label>
                                    <input type="text" name="city" required="1">
                                </div>
                                <div class="form-group col">
                                    <select name="country" id="" class="selected">
                                        <option disabled selected>Chọn quốc gia</option>
                                        <?php foreach ($countries as $key => $value) {

                                        ?>
                                            <option value="<?php echo $value['id_country'] ?>"><?php echo $value['country'] ?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>
                                <input type="submit" class="submit mt-2" value="Thêm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4">
            <div class="card-body chart">
                <div class="table-responsive mt-3">
                    <table class="table1 align-middle table_user w-100" style="overflow: auto;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Quốc gia</th>
                                <th>Thành phố</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($cities as $key => $value) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $value['country'] ?></td>
                                    <td><?php echo $value['city'] ?></td>
                                    <td><a href="<?php echo BASE_URL ?>local/edit_city/<?php echo $value['id_city'] ?>"><i class="far fa-edit"></i></a></td>
                                    <td><a href="<?php echo BASE_URL ?>local/delete_city/<?php echo $value['id_city'] ?>"><i class="far fa-trash-alt"></i></a></td>
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