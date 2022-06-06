<div class="main_body">
    <div class="container-fluid">
        <div class="mb-3">
            <a href="<?php echo BASE_URL ?>local/city" class="btn btn-success">Thêm thành phố</a>
            <a href="<?php echo BASE_URL ?>local/state" class="btn btn-success">Thêm quận huyện</a>
        </div>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-add container-fluid">
                        <form method="post" action="<?php echo BASE_URL ?>local/add_country">
                            <div class="p-4">
                                <div class="form-group ">
                                    <label for="">Thêm quốc gia</label>
                                    <input id="size" type="text" name="country" required="1">
                                </div>
                                <input type="submit" class="submit mt-2" value="Thêm">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card-body chart">
                        <div class="table-responsive mt-3">
                            <table class="table1 align-middle table_user w-100" style="overflow: auto;">
                                <?php
                                if (isset($_GET['mess'])) {
                                    $msg = unserialize(urldecode($_GET['mess']));
                                    foreach ($msg as $key => $value) {
                                        echo '<div style="color:white; font-size: 15px">' . $value . '</div>';
                                    }
                                }
                                ?>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Quốc gia</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($countries as $key => $value) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $value['country'] ?></td>
                                            <td><a href="<?php echo BASE_URL ?>local/edit_country/<?php echo $value['id_country'] ?>"><i class="far fa-edit"></i></a></td>
                                            <td><a href="<?php echo BASE_URL ?>local/delete_country/<?php echo $value['id_country'] ?>"><i class="far fa-trash-alt"></i></a></td>
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
    </div>
</div>