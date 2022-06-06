<div class="form-add container-fluid">
    <h1 class="text-center mt-5 mb-5 text-white ">Thêm sản phẩm +</h1>
    <form action="<?php echo BASE_URL ?>contact/add_contact" method="post" enctype="multipart/form-data">
        <?php
        if (isset($_GET['msg'])) {
            $msg = unserialize(urldecode($_GET['msg']));
            foreach ($msg as $key => $value) {
                echo '<div style="color:white; font-size: 15px">' . $value . '</div>';
            }
        }
        ?>
        <div class=" row p-2">
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="phone" value="" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input type="text" name="email" value="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Điều khoản hỗ trợ</label>
                    <textarea name="support" id="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="">Logo</label>
                    <!-- <input type="file" name="file"> -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Đường dẫn Facebook</label>
                        <input type="text" name="link_fb" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Đường dẫn twitter</label>
                        <input type="text" name="link_tw" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Đường dẫn instagram</label>
                        <input type="text" name="link_ins" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Đường dẫn youtube</label>
                        <input type="text" name="link_youtube" value="">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <input class="submit mt-5" type="submit" value="Thêm">
            </div>
        </div>
    </form>
</div>