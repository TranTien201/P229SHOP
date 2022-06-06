<div class="main_body">
    <div class="container-fluid">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-add container-fluid">
                        <form method="post" id="insert_brand_form">
                            <div class="p-4">
                                <div class="form-group ">
                                    <label for="">Nhãn hiệu</label>
                                    <input id="brand" type="text" name="brand" required="1">
                                </div>
                                <input type="button" class="submit mt-2" id="insert_brand" value="Thêm">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card-body chart">
                        <h4 class="mb-3">Danh sách nhãn hàng</h4>
                        <hr>
                        <div id="load_data">

                        </div>
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
                url: "<?php echo BASE_URL ?>brand/list_brand_ajax",
                method: "POST",


                success: function(data) {
                    $('#load_data').html(data);
                }
            });
        }
        fecth_data();
        // xóa dữ liệu
        $(document).on('click', '.del_brand', function() {
            var id = $(this).data('id2');
            $.ajax({
                url: "<?php echo BASE_URL ?>brand/delete_brand",
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
        function edit_brand(id, text) {
            $.ajax({
                url: "<?php echo BASE_URL ?>brand/update_brand",
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
        $(document).on('blur', '.brand', function() {
            var id = $(this).data('id1');
            var text = $(this).text();

            edit_brand(id, text);
        });
        //thêm dữ liệu
        $("#insert_brand").on('click', function(event) {
            var brand = $('#brand').val();
            $.ajax({
                url: "<?php echo BASE_URL ?>brand/add_brand",
                method: "POST",
                data: {
                    "brand": brand
                },
                success: function() {
                    alert("Thêm nhãn hiệu thành công");
                    fecth_data();
                }

            });

        });

    });
</script>