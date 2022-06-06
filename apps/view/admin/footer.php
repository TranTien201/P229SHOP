</div>
</div>
</div>
<script>
    const s_d_b = document.querySelector('.s_d_b');
    const input_sizes = document.querySelector('.input_sizes');
    const input_brand = document.querySelector('.input_brand');
    const b_d_b = document.querySelector('.b_d_b');
    const input_category = document.querySelector('.input_category');
    const c_d_b = document.querySelector('.c_d_b');
    const input_discount = document.querySelector('.input_discount');
    const d_d_b = document.querySelector('.d_d_b');
    const input_status = document.querySelector('.input_status');
    const st_d_b = document.querySelector('.st_d_b');
    input_sizes.onclick = () => {
        input_sizes.classList.toggle('active');
        s_d_b.classList.toggle('active')
    };
    input_brand.onclick = () => {
        input_brand.classList.toggle('active');
        b_d_b.classList.toggle('active')
    }
    input_category.onclick = () => {
        input_brand.classList.toggle('active');
        c_d_b.classList.toggle('active')
    }
    input_discount.onclick = () => {
        input_brand.classList.toggle('active');
        d_d_b.classList.toggle('active')
    }
    input_status.onclick = () => {
        input_brand.classList.toggle('active');
        st_d_b.classList.toggle('active')
    }
</script>
<!-- Optional JavaScript -->

<script src="<?php echo BASE_URL ?>public/js/apex-custom.js"></script>
<script src="<?php echo BASE_URL ?>public/js/apexcharts.min.js"></script>
<script src="<?php echo BASE_URL ?>public/js/jquery-jvectormap-2.0.5.min.js"></script>
<script src="<?php echo BASE_URL ?>public/js/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo BASE_URL ?>public/js/metisMenu.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/variable-pie.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="<?php echo BASE_URL ?>public/js/highchart.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo BASE_URL ?>public/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?php echo BASE_URL ?>public/js/jquery.min.js"></script>
<script src="<?php echo BASE_URL ?>public/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?php echo BASE_URL ?>public/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?php echo BASE_URL ?>public/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="<?php echo BASE_URL ?>public/js/index.js"></script>
<script src="<?php echo BASE_URL ?>public/js/app.js"></script>
<script src="<?php echo BASE_URL ?>public/js/review.js"></script>
<script>
    var tien = {
        "US": 3000,
        "TH": 2500,
        "VN": 3010.99,
        "KR": 3500,
        "JP": 3200,
        "RU": 2800

    };
    $('#world-map').vectorMap({
        map: 'world_mill_en',
        series: {
            regions: [{
                    values: tien,
                    scale: ['#B0B0B2', '#E1D7CD'],
                    normalizeFunction: 'polynomial'
                }

            ]
        },
        onRegionTipShow: function(e, el, code) {
            el.html(el.html() + ' (Doanh thu - ' + tien[code] + '$)');
        }
    });
</script>
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAti-tRfeSJm6wt0fWbjso-HkATuZBqR5A&callback=initMap">
</script>
<script src="<?php echo BASE_URL ?>public/js/admin.js"></script>
<script src="<?php echo BASE_URL ?>public/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
<script src="<?php echo BASE_URL ?>public/js/imageuploadify.min.js"></script>
<script>
    $(document).ready(function() {
        $('#image-uploadify').imageuploadify();
    })
</script>
<script>
    $(document).ready(function() {
        <?php foreach ($imgcolors as $key => $val) {
        ?>
            $('.p<?php echo $val['id_imgcolor'] ?>').click(function() {
                $(this).parents('div').find('img.p<?php echo $val['id_product'] ?>').attr('src', "../../apps/uploads/<?php echo $val['img_name'] ?>")
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
            // $('.p<?php echo $val['id_imgdesc'] ?> image').click(function() {
            //     alert(123);
            //     $(this).parents('div').find('img.p<?php echo  $val['id_product'] ?>').attr('src', "<?php echo BASE_URL ?>apps/uploads/<?php echo $val['name_imgdesc'] ?>")
            // })
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
        function loadProductTable(page) {
            $.ajax({
                url: "<?php echo BASE_URL ?>product/load_product_ajax",
                type: "POST",
                data: {
                    page_no: page
                },
                success: function(data) {
                    $("#load_product_admin").html(data);
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
<script>
    $(document).ready(function() {
        function filter_data() {
            $(document).on('click', '#sort_product', function() {
                var action = 'fetch_data';
                var brand = get_filter('brands');
                var category = get_filter('category');
                var sort = get_filter('sort');
                $.ajax({
                    url: "<?php echo BASE_URL ?>product/sort_product_admin",
                    method: "POST",
                    data: {
                        action: action,
                        brand: brand,
                        category: category,
                        sort: sort,
                        page_no: 1
                    },
                    success: function(data) {
                        $('#load_product_admin').html(data);
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
            var brand = get_filter('brands');
            var category = get_filter('category');
            var sort = get_filter('sort');
            alert(brand);
            $.ajax({
                url: "<?php echo BASE_URL ?>product/sort_product_admin",
                method: "POST",
                data: {
                    action: action,
                    brand: brand,
                    category: category,
                    sort: sort,
                    page_no: page
                },
                success: function(data) {
                    $('#load_product_admin').html(data);
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
<script>
    $(document).ready(function() {
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
            var id_product = $('.id').val();

            $(".result").html(" ");
            $.ajax({
                url: "<?php echo BASE_URL ?>product/search_product_admin",
                method: "POST",
                data: {
                    id_product: id_product
                },
                success: function(data) {
                    $('#load_product_admin').html(data);
                }
            });
        })
    });
</script>
<script>
    $(document).ready(() => {
        var optionsLine = {
            chart: {
                foreColor: '#f8f9fa',
                height: 420,

                type: 'line',
                zoom: {
                    enabled: false
                },
                dropShadow: {
                    enabled: true,
                    top: 3,
                    left: 2,
                    blur: 4,
                    opacity: 0.1,
                }
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            colors: ['#B4C6DC'],
            series: [{
                name: "Doanh thu tính theo đ",
                data: [<?php echo implode(',', $totalMonth); ?>]

            }],
            title: {
                text: 'Company business data',
                style: {
                    fontSize: "25px",
                    fontWeight: "600"
                },
                align: 'left',
                offsetY: 5,
                offsetX: 20
            },
            markers: {
                size: 4,
                strokeWidth: 0,
                hover: {
                    size: 7
                }
            },
            grid: {
                show: true,
                borderColor: 'rgba(255, 255, 255, 0.12)',
                strokeDashArray: 4,
            },
            tooltip: {
                theme: 'dark',

            },
            labels: [<?php foreach($month_year as $val) {
                echo "'$val' ,";
            } ?>],
            xaxis: {
                tooltip: {
                    enabled: false
                }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                offsetY: -20,

            }
        }
        var chartLine = new ApexCharts(document.querySelector('#chart1'), optionsLine);
        chartLine.render();
    })
</script>
</body>

</html>