<div class="main_body">
    <div class="container-fluid">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center mt-5 mb-5 text-white">Thêm hình ảnh chi tiết sản phẩm</h3>
                    <form action="" method="post" class="p-2">
                        <input id="image-uploadify" name="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple />
                        <input type="button" style="background: rgb(0,0,0,20%);" class="up_img" id="insert_imgcolor" value="Thêm">
                    </form>
                    <span id="error_mutiple_files"></span>
                </div>
                <div class="col-12">
                    <div class="card-body chart">
                        <h4 class="mb-3">Hình ảnh</h4>
                        <hr>
                        <div id="image_color_table">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        load_image_data();

        function load_image_data(page) {
            $.ajax({
                url: "<?php echo BASE_URL ?>imgdesc/listimgajax",
                method: "POST",
                data: {
                    page_no: page
                },
                success: function(data) {
                    $('#image_color_table').html(data);
                }
            });
        }
        $(document).on("click", ".pag_imgcolor a", function() {

            var page_id = $(this).attr("id");
            load_image_data(page_id);
        })
        $('#insert_imgdesc').on('click', function() {
            var error_images = '';
            var form_data = new FormData();
            var files = $('#image-uploadify')[0].files;

            for (var i = 0; i < files.length; i++) {
                var name = document.getElementById("image-uploadify").files[i].name;
                var ext = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    error_images += '<p>Yêu cầu phải có đuôi ảnh là gif, png, jpg, jpeg </p>';
                }
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("image-uploadify").files[i]);
                var f = document.getElementById("image-uploadify").files[i];
                var fsize = f.size || f.fileSize;
                if (fsize > 5000000) {
                    error_images += '<p>' + i + ' Ảnh này dung lượng lớn</p>';
                } else {
                    form_data.append("file[]", document.getElementById('image-uploadify').files[i]);
                }

            }
            if (error_images == '') {
                $.ajax({
                    url: "<?php echo BASE_URL ?>imgdesc/addimgdesc",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        load_img_desc_data();
                    }
                });
            } else {
                $('#image-uploadify').val('');
                $('#error_multiple_files').html("<span class='text-danger'>" + error_images + "</span>");
                return false;
            }
        });

        $(document).on('click', '.del_img', function() {
            var id_imgdesc = $(this).attr("id");
            var name_imgdesc = $(this).data("img");
            console.log(id_imgdesc);
            console.log(name_imgdesc);
            if (confirm("Bạn có muốn xóa hình ảnh này không ?? ")) {
                $.ajax({
                    url: "<?php echo BASE_URL ?>imgdesc/deleteimgdesc",
                    method: "POST",
                    data: {
                        id_imgdesc: id_imgdesc,
                        name_imgdesc: name_imgdesc
                    },
                    success: function(data) {
                        load_img_desc_data();
                        alert("Ảnh đã bị xóa");
                    }
                });
            }
        });

    });
</script>