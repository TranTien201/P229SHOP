<?php
if (isset($country)) {
?>

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
                            <?php
                            foreach ($country as $key => $val) {
                            ?>
                                <form method="post" action="<?php echo BASE_URL ?>local/update_country/<?php echo $val['id_country'] ?>">
                                    <div class="p-4">
                                        <div class="form-group ">
                                            <label for="">Sửa quốc gia</label>
                                            <input type="text" value="<?php echo $val['country'] ?>" name="country" required="1">
                                        </div>

                                    </div>
                                    <input type="submit" class="submit mt-2" value="Sửa">
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
} elseif (isset($city)) {
?>
    <div class="main_body">
        <div class="container-fluid">
            <div class="mb-3">
                <a href="<?php echo BASE_URL ?>local" class="btn btn-success">Thêm quốc gia</a>
                <a href="<?php echo BASE_URL ?>local/state" class="btn btn-success">Thêm quận huyện</a>
            </div>
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="form-add container-fluid">
                            <?php foreach ($city as $key => $value) {
                            ?>
                                <form method="post" action="<?php echo BASE_URL ?>local/update_city/<?php echo $value['id_city'] ?>">
                                    <div class="row p-4">
                                        <div class="form-group col">
                                            <label for="">Thêm thành phố / Tỉnh</label>
                                            <input type="text" value="<?php echo $value['city'] ?>" name="city" required="1">
                                        </div>
                                        <div class="form-group col">
                                            <select name="country" id="" class="selected">
                                                <?php foreach ($countries as $key => $val) {

                                                ?>
                                                    <option <?php if ($val['id_country'] == $value['id_country']) echo 'selected'; ?> value="<?php echo $val['id_country'] ?>"><?php echo $val['country'] ?></option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="submit" class="submit mt-2" value="Sửa">
                                </form>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
?>
    <div class="main_body">
        <div class="container-fluid">
            <div class="mb-3">
                <a href="<?php echo BASE_URL ?>local" class="btn btn-success">Thêm quốc gia</a>
                <a href="<?php echo BASE_URL ?>local/state" class="btn btn-success">Thêm quận huyện</a>
            </div>
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="form-add container-fluid">
                            <?php foreach ($state as $key => $value) {
                            ?>
                                <form method="post" action="<?php echo BASE_URL ?>local/update_state/<?php echo $value['id_state'] ?>">
                                    <div class="row p-4">
                                        <div class="form-group col">
                                            <label for="">Sửa quận huyện</label>
                                            <input type="text" value="<?php echo $value['state'] ?>" name="state" required="1">
                                        </div>
                                        <div class="form-group col">
                                            <label for="">Sửa giá tiền</label>
                                            <input type="text" name="total" value="<?php echo $value['total'] ?>" required="1">
                                        </div>
                                        <div class="form-group col">
                                            <select name="city" id="" class="selected">
                                                <?php foreach ($cities as $key => $val) {

                                                ?>
                                                    <option <?php if ($val['id_city'] == $value['id_city']) echo 'selected'; ?> value="<?php echo $val['id_city'] ?>"><?php echo $val['city'] ?></option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="submit" class="submit mt-2" value="Sửa">
                                </form>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>