<div id="footer" style="background: rgb(255, 255, 255, 0.03);">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12  ">
                <div class="container-fluid">
                    <h1 class="title-heading text-center">
                        Vì sức khỏe mọi người - Vì thể thao</h1>
                    <p class="ct text-center">Chúng tôi</p>
                    <div class="text-center">
                        <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $contacts[0]['logo'] ?>" alt="" style="color: #fff;">
                    </div>
                    <div class="shop-des mt-1">
                        <p class="text-center">Địa chỉ: <?php echo $contacts[0]['address'] ?></p>
                        <p class="text-center">Số điện thoại: <?php echo $contacts[0]['phone'] ?> - Email: <?php echo $contacts[0]['email'] ?></p>
                        <p class="text-center">© 2021 - Copyright belongs to P229 Shop.</p>
                    </div>
                </div>
                <div class="container-fluid mt-3">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-12" style="color: #fff">
                            <?php echo $contacts[0]['support'] ?>
                        </div>
                    </div>
                </div>
                <div class="container-fluid " style="margin-top: 80px;">
                    <div class="social-netword d-flex justify-content-between">
                        <a href="<?php echo $contacts[0]['link_fb'] ?>">
                            <div class="icon">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span class="text-center"><i class="fab fa-facebook-f"></i></span>
                            </div>
                            <h5 class="text">Facebook</h5>
                        </a>
                        <a href="<?php echo $contacts[0]['link_ins'] ?>">
                            <div class="icon">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span class="text-center"><i class="fab fa-instagram"></i></span>
                            </div>
                            <h5 class="text">Instagram</h5>
                        </a>
                        <a href="<?php echo $contacts[0]['link_tw'] ?>">
                            <div class="icon">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span class="text-center"><i class="fab fa-twitter"></i></span>
                            </div>
                            <h5 class="text">Twitter</h5>
                        </a>
                        <a href="<?php echo $contacts[0]['link_youtube'] ?>">
                            <div class="icon">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span class="text-center"><i class="fab fa-youtube"></i></span>
                            </div>
                            <h5 class="text">Youtube</h5>
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12 mg">
                <h1 class="title-heading text-center">Những điều bạn muốn gửi cho chúng tôi</h1>
                <form action="<?php echo BASE_URL ?>contact/send_contact" class="submit_user" method="POST">
                    <div class="form-row">
                        <div class="col-sm-6 col-12">
                            <div class="form-group d-flex flex-column">
                                <label for="">Tên của bạn</label>
                                <input type="text" name="name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group d-flex flex-column">
                                <label for="">Email</label>
                                <input type="email" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="">Gửi phản hồi của bạn tại đây</label>
                        <textarea name="text" id="" rows="10"></textarea>
                    </div>
                    <div class="form-group d-flex flex-column">
                        <input class="text-light" type="submit" value="Gửi">
                    </div>
                </form>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FP229-Sport-Shop-109694361329627&tabs=timeline&width=1000&height=250&small_header=false&adapt_container_width=false&hide_cover=true&show_facepile=true&appId" width="1000" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <marquee behavior="" direction="left" style="color: #fff">P229SHOP - Tiến_Thông</marquee>
    </div>
</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        <?php foreach ($imgother as $key => $val) {
        ?>
            $('.p<?php echo $val['id_imgcolor'] ?>').click(function() {
                $(this).parents('li').find('img.p<?php echo  $val['id_product'] ?>').attr('src', "apps/uploads/<?php echo $val['img_name'] ?>")
            })
        <?php
        }
        ?>

    });
</script>
<script>
    $(document).ready(function() {
        <?php foreach ($imgdescs as $key => $val) {
        ?>
            $(document).on('click', '.p<?php echo $val['id_imgdesc'] ?>', function() {
                $(this).parents('div').find('img.p<?php echo  $val['id_product'] ?>').attr('src', "<?php echo BASE_URL ?>apps/uploads/<?php echo $val['name_imgdesc'] ?>")
            });
        <?php
        }
        ?>

    });
</script>
<script>
    $(document).ready(function() {
        <?php foreach ($imgcolors as $key => $val) {
        ?>
            $('.p<?php echo $val['id_imgcolor'] ?>').click(function() {
                $(this).parents('div').find('img.p<?php echo $val['id_product'] ?>').attr('src', "<?php echo BASE_URL ?>apps/uploads/<?php echo $val['img_name'] ?>")
            })
        <?php
        }
        ?>

    });
</script>
<script>
    $(document).ready(function() {
        var max = <?php echo $countComment[0]['counts'] ?>;
        $("#numComment").text(max + " Bình luận");
        $("#comment").on('click', function() {
            var textComment = $("#textComment").val();
            var rate = $(".rate:checked").val();
            var id_product = $("#id_product").val();

            if (textComment.length > 5) {
                $.ajax({
                    url: "<?php echo BASE_URL ?>product/add_comment",
                    method: "POST",
                    data: {
                        addComment: 1,
                        textComment: textComment,
                        rate: rate,
                        id_product: id_product
                    },

                    success: function(response) {
                        max++;
                        $("#numComment").text(max + " Bình luận")
                        getAllComment(0, max);
                    }
                });
            } else {
                alert('Nhập trên 5 kí tự');
            }
        });
        getAllComment(0, max);

        $("#addReply").on('click', function() {
            var replyComment = $("#replyComment").val();
            var id_product = $("#id_product").val();
            var id_comment = $('#comment_id').val();
            if (replyComment.length > 5) {
                $.ajax({
                    url: "<?php echo BASE_URL ?>product/add_reply",
                    method: "POST",
                    data: {
                        replyComment: 1,
                        replyComment: replyComment,
                        id_product: id_product,
                        id_comment: id_comment
                    },

                    success: function(response) {
                        max++;
                        $('.replyRow').hide();
                        $("#numComment").text(max + " Bình luận")
                        getAllComment(0, max);
                    }
                });
            } else {
                alert('Nhập trên 5 kí tự');
            }
        });

        function getStarRateProduct() {
            var id_product = $("#id_product").val();
            $.ajax({
                url: "<?php echo BASE_URL ?>product/get_rate_star",
                method: "POST",
                data: {
                    getStarProduct: 1,
                    id_product: id_product,
                },

                success: function(response) {
                    $("#rate_star").html(response);
                }
            });
        }
        getStarRateProduct();

        function getAllComment(start, max) {
            var id_product = $("#id_product").val();
            if (start > max) {
                return;
            } else {
                $.ajax({
                    url: "<?php echo BASE_URL ?>product/get_comment",
                    method: "POST",
                    data: {
                        getComment: 1,
                        id_product: id_product,
                        start: start
                    },

                    success: function(response) {
                        $(".userComment").html(response);
                        getAllComment((start + 20), max);
                    }
                });
            }
        }

        function getStarRate() {
            var id_product = $("#id_product").val();
            $.ajax({
                url: "<?php echo BASE_URL ?>product/get_comment",
                method: "POST",
                data: {
                    getComment: 1,
                    id_product: id_product,
                    start: start
                },

                success: function(response) {
                    $(".userComment").html(response);
                    getAllComment((start + 20), max);
                }
            });
        }
        getStarRate();


    });
    // $(document).on('click', '.reply', function() {
    //     $(".replyRow").insertAfter($('.reply'));
    //     $('.replyRow').show();
    // });

    function reply(caller) {
        $(".replyRow").insertAfter($(caller));
        $('.replyRow').show();
        var id_comment = $(caller).data('id_comment');
        $('#comment_id').val(id_comment);
    }
</script>
<script>
    $(document).ready(function(event) {

        //load dữ liệu

        function fecth_data() {
            var id_img = document.querySelector('.id_imgdesc').value;
            console.log(id_img);
            $.ajax({
                url: "<?php echo BASE_URL ?>index/list_imgdesc_ajax",
                method: "POST",
                data: {
                    id_img: id_img
                },

                success: function(data) {
                    $('#load_data_img').html(data);
                }
            });
            fetch_size(id_img);
            const img_orther_product = document.querySelectorAll('.img_orther_product');
            console.log(img_orther_product);
            const img = document.querySelectorAll('.img_product');
            var provisional = 0;
            for (let i = 0; i < img_orther_product.length; i++) {
                img_orther_product[i].onclick = () => {
                    img_orther_product[provisional].classList.remove('active');
                    $('#notification').html("  ");
                    // console.log(img[i].src);
                    img_orther_product[i].classList.add('active');
                    var get_img = img[i].src;
                    if (get_img.includes('<?php echo BASE_URL ?>apps/uploads/')) {
                        imgsplit = get_img.split('<?php echo BASE_URL ?>apps/uploads/')[1];
                        document.querySelector('.id_imgdesc').value = imgsplit;
                        var id_img = document.querySelector('.id_imgdesc').value;
                        $.ajax({
                            url: "<?php echo BASE_URL ?>index/list_imgdesc_ajax",
                            method: "POST",
                            data: {
                                id_img: id_img
                            },

                            success: function(data) {
                                $('#load_data_img').html(data);
                            }
                        })
                        fetch_size(id_img);
                        console.log(id_img);
                    }
                    provisional = i;
                }

            }
        }
        fecth_data();

        function fetch_size(id_img) {
            $.ajax({
                url: "<?php echo BASE_URL ?>index/list_size_ajax",
                method: "POST",
                data: {
                    id_img: id_img
                },

                success: function(data) {
                    $('#load_data_size').html(data);
                }
            })
        }

        function check_quantity_product() {
            $(document).on('click', '.choose_size', function() {
                $('.choose_size').removeClass('active');
                var id_size = $(this).data('id2');
                var id_img = $(this).data('id1');
                var size = $(this).data('size');
                var id = $(this).data('id3');
                var quantity = $(this).data('id4');
                document.querySelector('.quantity').value = quantity;
                document.querySelector('.id_size').value = size;
                document.querySelector('.id_img_size').value = id;
                $(this).addClass('active')
                notification(id_size, id_img);
            });
        }
        check_quantity_product();

        function notification(id_size, id_img) {
            $.ajax({
                url: "<?php echo BASE_URL ?>index/check_quantity_product",
                method: "POST",
                data: {
                    id_img: id_img,
                    id_size: id_size
                },
                success: function(data) {
                    $('#notification').html(data);
                }
            });
        }
    });
</script>


<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?php echo BASE_URL ?>public/js/main.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSIfDBn1eYrqSuJZCgxn5TAVOOYVdB14I&callback=initMap"></script>
<script src="<?php echo BASE_URL ?>public/js/JQuery3.3.1.js"></script>
<script src="<?php echo BASE_URL ?>public/js/lightslider.js"></script>
<script src="<?php echo BASE_URL ?>public/js/script.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- <script src="/js/cart.js" async></script> -->
<script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
<!-- <script src="<?php echo BASE_URL ?>public/js/search.js"></script> -->
<!-- <script src="<?php echo BASE_URL ?>public/js/jquery-1.10.2.min.js"></script> -->
<script src="<?php echo BASE_URL ?>public/js/jquery-ui.js"></script>
<script>
    var json_list_product = localStorage.getItem('list_product');
</script>
<!-- <script src="<?php echo BASE_URL ?>public/js/introduce.js"></script> -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
<script>
    var json_list_product = localStorage.getItem('list_product');
</script>
<script src="<?php echo BASE_URL ?>public/ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.replace('description');
</script>

<script>
    var swiper = new Swiper('.swiper-container', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 9000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

<script>
    var add;
    document.querySelectorAll('.btn_add_pro').forEach(button => {
        button.addEventListener('click', e => {
            button.classList.add('clicked');

            add = setTimeout(removeClass, 2500);
        });

        function removeClass() {
            button.classList.remove('clicked');
        }
    });
</script>
<script>
    $(document).ready(function() {

        $('#price_range').slider({
            range: true,
            min: 0,
            max: <?php echo $maxprice[0]['maxprice'] ?>,
            values: [0, <?php echo $maxprice[0]['maxprice'] ?>],
            step: 5000,
            stop: function(event, ui) {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
            }
        });

    });
</script>
<!-- Lọc sản phẩm ở trang category kết hợp ajax , phân trang -->
<script>
    $(document).ready(function() {
        function load_product_id_category(page) {
            var id_category = document.querySelector('#id_category').value;
            var action = 'fetch_data';
            $.ajax({
                url: "<?php echo BASE_URL ?>product/load_filter_product_category",
                method: "POST",
                data: {
                    action: action,
                    id_category: id_category,
                    page_no: page
                },
                success: function(data) {
                    $('#load_product_ajax').html(data);
                }
            });
        }
        load_product_id_category();

        function filter_data(page) {
            $(document).on('click', '.filter_product', function() {
                var action = 'fetch_data';
                var minimum_price = $('#hidden_minimum_price').val();
                var maximum_price = $('#hidden_maximum_price').val();
                var brand = get_filter('brands');
                var category = get_filter('category');
                $.ajax({
                    url: "<?php echo BASE_URL ?>product/load_filter_product",
                    method: "POST",
                    data: {
                        action: action,
                        minimum_price: minimum_price,
                        maximum_price: maximum_price,
                        brand: brand,
                        category: category,
                        page_no: page
                    },
                    success: function(data) {
                        $('#load_product_ajax').html(data);
                    }
                });
            });
        }
        filter_data()
        $(document).on("click", ".pag a", function() {

            var page_id = $(this).attr("id");
            load_product_sort(page_id);
        })

        function load_product_sort(page) {
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var brand = get_filter('brands');
            var category = get_filter('category');
            $.ajax({
                url: "<?php echo BASE_URL ?>product/load_filter_product",
                method: "POST",
                data: {
                    action: action,
                    minimum_price: minimum_price,
                    maximum_price: maximum_price,
                    brand: brand,
                    category: category,
                    page_no: page
                },
                success: function(data) {
                    $('#load_product_ajax').html(data);
                }
            });
        }

        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
                filter.push($(this).val());
            });
            return filter;
        }
    });
</script>
<!-- Tìm kiếm sản phẩm -->
<script>
    $(document).ready(function() {
        var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;

        const recognition = new SpeechRecognition();
        const synth = window.speechSynthesis;
        recognition.lang = 'vi-VI';
        recognition.continuous = false;

        const microphone = document.querySelector('.microphone');

        const handleVoice = (text) => {
            console.log('text', text);

            const inputText = text;
            console.log(inputText);
            $('.search-box input[type="text"]').val(inputText);
            var resultDropdown = $('.search-box input[type="text"]').siblings(".result");
            $.ajax({
                url: "<?php echo BASE_URL ?>product/livesearch",
                method: "POST",
                data: {
                    inputValue: text
                },
                // success: function(data) {
                //     resultDropdown.html(data);
                // }
            }).done(function(data) {
                // Hiển thị dữ liệu trả về trong trình duyệt
                resultDropdown.html(data);
            });
        }

        microphone.addEventListener('click', (e) => {
            e.preventDefault();

            recognition.start();
            microphone.classList.add('recording');
        });

        // hoàn thành việc nc
        recognition.onspeechend = () => {
            recognition.stop();
            microphone.classList.remove('recording');
        }
        // có lỗi xảy ra
        recognition.onerror = (err) => {
            console.log(err)
            microphone.classList.remove('recording');
        }

        recognition.onresult = (e) => {
            console.log('onresult', e);
            const text = e.results[0][0].transcript;
            handleVoice(text);
        }

        $('.search-box input[type="text"]').on("change input", function() {
            // lấy giá trị đầu vào khi có thay đổi
            var inputValue = $(this).val();
            console.log(inputValue);
            var resultDropdown = $(this).siblings(".result");
            if (inputValue.length) {
                $.ajax({
                    url: "<?php echo BASE_URL ?>product/livesearch",
                    method: "POST",
                    data: {
                        inputValue: inputValue
                    },
                    // success: function(data) {
                    //     resultDropdown.html(data);
                    // }
                }).done(function(data) {
                    // Hiển thị dữ liệu trả về trong trình duyệt
                    resultDropdown.html(data);
                });
            } else {
                resultDropdown.empty();
            }
        });
        $(document).on("click", "p", function() {
            $(".product_name").val($(this).text());
            $(".id_product").val($('.id').val());
            $(".result").html(" ");
        })
    });
</script>
<!-- Hướng dẫn sử dụng -->
<script>
    const toturial = document.querySelector('.toturial');
    const intro = introJs();
    var arr = ['Chào mừng bạn đã đến cửa hàng của tôi',
        <?php foreach ($introduces as $key => $val) {
        ?> '<?php echo $val['text'] ?>',
        <?php
        } ?> 'Cảm ơn đã lắng nghe'
    ];

    console.log(2);
    let i = 0;
    intro.setOptions({
        steps: [{
                title: 'Xin chào',
                intro: 'Chào mừng bạn đã đến cửa hàng của tôi',

            }
            <?php foreach ($introduces as $key => $val) {
            ?>, {
                    element: document.querySelector('<?php echo $val['class'] ?>'),
                    intro: '<?php echo $val['text'] ?>',
                    position: 'right',
                }
            <?php
            } ?>

            , {
                title: 'Farewell!',
                intro: 'Cảm ơn đã lắng nghe'
            }
        ]
    })
    toturial.onclick = () => {
        intro.start();
        i = 0;
        playText(arr[i]);
        console.log(arr[i]);

        const introjs_nextbutton = document.querySelector('.introjs-nextbutton');
        //   const introjs_tooltiptext = document.querySelector('.introjs-tooltiptext').innerHTML;
        // //   console.log(introjs_tooltiptext);
        //   const utterance = new SpeechSynthesisUtterance(introjs_tooltiptext);
        //   speechSynthesis.speak(utterance);
        introjs_nextbutton.addEventListener('click', function() {
            if (i < arr.length) {
                i++;
                playText(arr[i]);
                console.log(arr[i]);
            } else {
                i = 0;
            }
        })

        function playText(text) {
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.rate = 0.75;
            speechSynthesis.speak(utterance);
        }
    }
</script>
<!-- Phân trang, load order theo ajax  -->
<script>
    $(document).ready(function() {
        function loadProductTable(page) {
            $.ajax({
                url: "<?php echo BASE_URL ?>order/load_order_user",
                type: "POST",
                data: {
                    action: 'fecth_data',
                    page_no: page,
                },
                success: function(data) {
                    $("#load_order_user").html(data);
                }
            });
        }
        loadProductTable();
        $(document).on("click", ".pagination a", function(e) {
            e.preventDefault();
            var page_id = $(this).attr("id");
            loadProductTable(page_id);
        })

    })
</script>
<!-- Sửa profile -->
<script>
    $(document).ready(function() {
        $('#img_profile').on('change', function() {
            var error_images = '';
            var form_data = new FormData();
            var files = $('#img_profile')[0].files;
            for (var i = 0; i < files.length; i++) {
                var name = document.getElementById("img_profile").files[i].name;
                var ext = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    error_images += '<p>Yêu cầu phải có đuôi ảnh là gif, png, jpg, jpeg </p>';
                }
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("img_profile").files[i]);
                var f = document.getElementById("img_profile").files[i];
                var fsize = f.size || f.fileSize;
                form_data.append("file[]", document.getElementById('img_profile').files[i]);
            }
            $.ajax({
                url: "<?php echo BASE_URL ?>login/update_img_profile",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    alert('Thay đổi hình nền thành công');
                    $('#local_img').html(data);

                }
            });
        });
        $('#save_change').on('click', function() {
            var user_name = $("#user_name").val();
            var user_email = document.querySelector('#user_email').value;
            var user_phone = document.querySelector('#user_phone').value;
            var user_pass = document.querySelector('#user_pass').value;
            alert(user_name);
            $.ajax({
                url: "<?php echo BASE_URL ?>login/update_infomation",
                method: "POST",
                data: {
                    user_name: user_name,
                    user_email: user_email,
                    user_phone: user_phone,
                    user_pass: user_pass
                },
                success: function(data) {
                    alert('Thay đổi thông tin thành công');
                    $('#load_infomation').html(data);
                }
            });
        });

    });
</script>
</body>


</html>