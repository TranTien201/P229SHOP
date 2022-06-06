<div class="main_body">
    <div class="container-fluid">
        <div class="mb-3">
            <a href="<?php echo BASE_URL ?>contact/form_add_contact" class="btn btn-success">Thêm contact</a>
        </div>
        <div class="container-fluid mt-4">
            <div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px;">
                <table class="table1 align-middle table_user w-100" style="overflow: auto;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Đường dẫn Facebook</th>
                            <th>Đường dẫn twitter</th>
                            <th>Đường dẫn instagram</th>
                            <th>Đường dẫn youtube</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($contacts as $key => $value) {
                            $i++;
                        ?>
                            <tr>
                                <td>#<?php echo $i ?></td>
                                <td><?php echo $value['phone'] ?></td>
                                <td><?php echo $value['email'] ?></td>
                                <td class="d-flex img_p">
                                    <span>
                                        <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $value['logo'] ?>" alt="">
                                    </span>
                                </td>
                                <td><?php echo $value['link_fb'] ?></td>
                                <td><?php echo $value['link_tw'] ?></td>
                                <td><?php echo $value['link_ins'] ?></td>
                                <td><?php echo $value['link_youtube'] ?></td>
                                <td><a class="far fa-trash-alt" href="<?php echo BASE_URL ?>contact/delete_contact/<?php echo $value['id_contact'] ?>"></a></td>
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