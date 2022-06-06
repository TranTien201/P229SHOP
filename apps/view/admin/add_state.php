<div class="main_body">
    <div class="container-fluid">
        <div class="mb-3">
            <a href="<?php echo BASE_URL ?>local" class="btn btn-success">Thêm quốc gia</a>
            <a href="<?php echo BASE_URL ?>local/city" class="btn btn-success">Thêm thành phố</a>
        </div>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12 mb-3">
                    <?php
                    if (isset($_GET['msg'])) {
                        $msg = unserialize(urldecode($_GET['msg']));
                        foreach ($msg as $key => $value) {
                            echo '<div style="color:white; font-size: 15px">' . $value . '</div>';
                        }
                    }
                    ?>
                    <div class="form-add container-fluid">
                        <form method="post" action="<?php echo BASE_URL ?>local/add_state">
                            <div class="row p-4">
                                <div class="form-group col">
                                    <label for="">Thêm quận/huyện</label>
                                    <input type="text" name="state" required="1">
                                </div>
                                <div class="form-group col">
                                    <label for="">Thêm giá tiền</label>
                                    <input type="text" name="total" required="1">
                                </div>
                                <div class="form-group col">
                                    <select name="city" id="" class="selected">
                                        <option disabled selected>Chọn thành phố / Tỉnh</option>
                                        <?php foreach ($cities as $key => $value) {

                                        ?>
                                            <option value="<?php echo $value['id_city'] ?>"><?php echo $value['city'] ?></option>
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
                                <th>Quận Huyện</th>
                                <th>Tiền ship</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($states as $key => $value) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $value['city'] ?></td>
                                    <td><?php echo $value['state'] ?></td>
                                    <td><?php echo $value['total'] ?></td>
                                    <td><a href="<?php echo BASE_URL ?>local/edit_state/<?php echo $value['id_state'] ?>"><i class="far fa-edit"></i></a></td>
                                    <td><a href="<?php echo BASE_URL ?>local/delete_state/<?php echo $value['id_state'] ?>"><i class="far fa-trash-alt"></i></a></td>
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