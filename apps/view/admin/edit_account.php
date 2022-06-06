<div class="main_body">
    <div class="container-fluid">
        <div class="form-add container-fluid">
            <h1 class="text-center mt-5 mb-5 text-white ">Account User +</h1>
            <?php foreach ($userbyid as $key => $user) { ?>
                <form action="<?php echo BASE_URL ?>login/update_user/<?php echo $user['id'] ?>" method="post">
                    <div class="p-4">
                        <div class="form-group ">
                            <label for="">Email</label>
                            <input type="email" name="email" value="<?php echo $user['email'] ?>">
                        </div>
                        <div class="form-group ">
                            <label for="">Password</label>
                            <input type="password" name="password" value="<?php echo $user['password'] ?>">
                        </div>
                        <div class="form-group ">
                            <label for="">Username</label>
                            <input type="text" name="username" value="<?php echo $user['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Type</label>
                        </div>
                        <div class="form-group d-flex">
                            <input <?php if ($user['type'] == 1) echo "checked"; ?> type="radio" name="type" value="1" style="width: 10%;">
                            <label style="border-bottom: none;" for="">: Nhân viên</label>
                        </div>
                        <div class="form-group d-flex">
                            <input type="radio" name="type" value="0" style="width: 10%;" <?php if ($user['type'] == 0) echo 'checked'; ?>>
                            <label style="border-bottom: none;" for="">: Khách hàng</label>
                        </div>
                        <div class="form-group d-flex">
                            <input <?php if ($user['type'] == 2) echo "checked"; ?> type="radio" name="type" value="2" style="width: 10%;">
                            <label style="border-bottom: none;" for="" value="2">: Quản lý</label>
                        </div>
                        <input class="submit mt-5" type="submit" value="Cập nhập">
                    </div>
                </form>
            <?php  } ?>
        </div>
    </div>
</div>