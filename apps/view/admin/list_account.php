<div class="main_body">
    <div class="container-fluid">
        <div class="container-fluid mt-4">
            <div>
                <div class="card-body chart">
                    <h4 class="mb-3">Danh sách tài khoản</h4>
                    <hr>
                    <?php
                    if (isset($_GET['msg'])) {
                        $msg = unserialize(urldecode($_GET['msg']));
                        foreach ($msg as $key => $value) {
                            echo '<div style="color:#fff; font-size: 15px">' . $value . '</div>';
                        }
                    }
                    ?>
                    <div class="table-responsive mt-3">
                        <table class="table align-middle table_user">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên người dùng</th>
                                    <th>Email</th>
                                    <th>Mật khẩu</th>
                                    <th>Loại</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($listuser as $key => $value) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td>#<?php echo $i ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="m-0"><?php echo $value['username'] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $value['email'] ?></td>
                                        <td><?php echo $value['password'] ?></td>
                                        <td>
                                            <?php
                                            if ($value['type'] == 2) {
                                                echo 'Quản lí';
                                            } elseif ($value['type'] == 1) {
                                                echo 'Nhân viên';
                                            } else {
                                                echo 'Khách hàng';
                                            }
                                            ?></td>
                                        <td><a class="far fa-edit" href="<?php echo BASE_URL ?>login/edit_account/<?php echo $value['id'] ?>"></a></td>
                                        <td><a class="far fa-trash-alt" href="<?php echo BASE_URL ?>login/delete_account/<?php echo $value['id'] ?>"></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>