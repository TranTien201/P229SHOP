<div class="main_body">
    <div class="container-fluid">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-add container-fluid">
                        <form method="post" id="insert_size_form">
                            <div class="p-4">
                                <div class="form-group ">
                                    <label for="">Size</label>
                                    <input id="size" type="text" name="size" required="1">
                                </div>
                                <input type="button" class="submit mt-2" id="insert_size" value="Thêm">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card-body chart">
                        <h4 class="mb-3">Danh sách size</h4>
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
                url: "<?php echo BASE_URL ?>size/list_size_ajax",
                method: "POST",


                success: function(data) {
                    $('#load_data').html(data);
                }
            });
        }
        fecth_data();
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
        $("#insert_size").on('click', function(event) {
            var size = $('#size').val();
            $.ajax({
                url: "<?php echo BASE_URL ?>size/add_size",
                method: "POST",
                data: {
                    "size": size
                },
                success: function() {
                    alert("Thêm size thành công");
                    fecth_data();
                }

            });

        });

    });
</script>