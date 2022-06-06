<div class="main_body">
    <div class="container-fluid">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-add container-fluid">
                        <form method="post" id="insert_size_form">
                            <div class="p-4">
                                <div class="form-group ">
                                    <label for="">Thêm trang</label>
                                    <input id="page" type="text" name="size" required="1">
                                </div>
                                <input type="button" class="submit mt-2" id="insert_page" value="Thêm">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card-body chart">
                        <h4 class="mb-3">Danh sách page</h4>
                        <hr>
                        <div id="load_data">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="form-add container-fluid">
                        <form method="post" id="insert_size_form">
                            <div class="p-4">
                                <div class="form-group ">
                                    <label for="">Thêm mã trang</label>
                                    <input id="class" type="text" name="size" required="1">
                                </div>
                                <div class="form-group ">
                                    <label for="">Thêm nội dung</label>
                                    <input id="text_class" type="text" name="size" required="1">
                                </div>
                                <div class="form-group col">
                                    <select name="page" id="pages" class="selected">
                                        <option disabled selected>Chọn trang</option>
                                        <?php foreach ($pages as $key => $value) {

                                        ?>
                                            <option value="<?php echo $value['id_page'] ?>"><?php echo $value['page'] ?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>
                                <input type="button" class="submit mt-2" id="insert_class" value="Thêm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="card-body chart">
                    <h4 class="mb-3">Danh sách page</h4>
                    <hr>
                    <div id="load_data_class">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(event) {

        //load dữ liệu
        function fecth_data() {
            $.ajax({
                url: "<?php echo BASE_URL ?>page/list_page_ajax",
                method: "POST",


                success: function(data) {
                    $('#load_data').html(data);
                }
            });
        }
        fecth_data();

        function fecth_data_class() {
            $.ajax({
                url: "<?php echo BASE_URL ?>page/list_class_ajax",
                method: "POST",


                success: function(data) {
                    $('#load_data_class').html(data);
                }
            });
        }
        fecth_data_class();
        // xóa dữ liệu
        $(document).on('click', '.del_size', function() {
            var id = $(this).data('id2');
            var size = document.querySelector('.size').value;
            console.log(size);
            $.ajax({
                url: "<?php echo BASE_URL ?>size/delete_size",
                method: "POST",
                data: {
                    "id": id,
                },
                success: function() {
                    fecth_data();
                    alert("Xóa thành công");
                }

            });
        });
        // sửa dữ liệu
        function edit_size(id, text) {
            $.ajax({
                url: "<?php echo BASE_URL ?>size/update_size",
                method: "POST",
                data: {
                    "id": id,
                    "text": text,
                },
                success: function() {
                    fecth_data();
                }

            });
        }
        $(document).on('blur', '.size', function() {
            var id = $(this).data('id1');
            var text = $(this).text();

            edit_size(id, text);
        });
        //thêm dữ liệu
        $("#insert_page").on('click', function(event) {
            var page = $('#page').val();
            $.ajax({
                url: "<?php echo BASE_URL ?>page/add_page",
                method: "POST",
                data: {
                    "page": page
                },
                success: function() {
                    alert("Thêm trang thành công");
                    fecth_data();
                }

            });

        });

        $("#insert_class").on('click', function(event) {
            var page = $('#pages').val();
            var classed = $('#class').val();
            var text_class = $('#text_class').val();
            $.ajax({
                url: "<?php echo BASE_URL ?>page/add_class",
                method: "POST",
                data: {
                    "page": page,
                    "class": classed,
                    'text': text_class
                },
                success: function() {
                    alert("Thêm trang thành công");
                    fecth_data_class();
                }

            });

        });

    });
</script>