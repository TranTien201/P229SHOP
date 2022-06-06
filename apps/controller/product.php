<?php
class product extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->load_view_product();
    }
    public function header()
    {
        Session::checkSession();
        $username = Session::get('username');
        $type = Session::get('type');
        $img_profile = Session::get('img_profile');
        $data = array(
            'username' => "$username",
            'type' => "$type",
            'img_profile' => $img_profile
        );
        $this->load->view('admin/header', $data);
    }
    public function load_view_product()
    {
        $this->header();
        $model = $this->load->model('mainmodel');
        $tbl_brand = 'tbl_brand';
        $data['brands'] = $model->selectnormal($tbl_brand);
        $tbl_category = 'tbl_category';
        $data['categories'] = $model->selectnormal($tbl_category);
        $this->load->view('admin/list_product', $data);
        $this->load->view('admin/footer');
    }
    public function load_product_ajax()
    {
        $output = "";
        $limit = 10;
        if (isset($_POST['page_no'])) {
            $page = $_POST['page_no'];
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $limit;
        $model_p = $this->load->model('productmodel');
        $model_cat = $this->load->model('categorymodel');
        $model_b = $this->load->model('brandmodel');
        $model_img = $this->load->model('imgmodel');
        $model_size = $this->load->model('sizemodel');
        // count product
        $count_product = $model_p->count_product();
        // sell product

        $cond_sell = 'tbl_product.id_product = tbl_imgcolor_product.id_product AND tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor AND tbl_imgcolor.id_imgcolor = tbl_img_size.id_imgcolor AND tbl_product.id_brand = tbl_brand.id_brand AND tbl_product.id_category = tbl_category.id_category';
        $sell_product = $model_p->sell_product($cond_sell);
        // select img other
        $select_imgcolor_product = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
        $tbl_imgcolor_product = 'tbl_imgcolor, tbl_imgcolor_product';
        $cond_imgcolor = 'tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor';
        $imgcolors = $model_img->img($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        // select category
        $tbl_category = 'tbl_category';
        $categories = $model_cat->category($tbl_category);
        // select brand
        $tbl_brand = 'tbl_brand';
        $brands = $model_b->list_brand($tbl_brand);
        // select product  
        $tbl_product = 'tbl_product,tbl_category, tbl_brand';
        $cond = "tbl_product.id_brand = tbl_brand.id_brand AND tbl_product.id_category = tbl_category.id_category ";
        $products = $model_p->product($tbl_product, $cond, $offset, $limit);
        $output = '
        <div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px;" id="load_product_admin">
            <table class="table1 align-middle table_user" style="overflow: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Ảnh khác</th>
                        <th>Nhân viên</th>
                        <th>Nhãn hiệu</th>
                        <th>Loại hàng</th>
                        <th>Ngày đăng tải</th>
                        <th>Tình trạng</th>
                        <th>Số lượng bán</th>
                        <th>Ngày sửa đổi</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead> 
                <tbody>';
        if ($products) {
            $i = 0;
            foreach ($products as $key => $product) {
                $i++;
                $output .= '
                            <tr>
                                <td>' . $i . '</td>
                                <td>' . $product['product_name'] . '</td>
                                <td>' . number_format($product['price']) . 'đ</td>
                                <td class="d-flex img_p ">
                                ';
                foreach ($imgcolors as $key => $img) {
                    if ($product['id_product'] == $img['id_product']) {
                        $output .= '                                        
                                        <span>
                                            <img src="' . BASE_URL . 'apps/uploads/' . $img['img_name'] . '" alt="">
                                        </span>';
                    }
                }
                $output .= '                                
                                </td>
                                <td>' . $product['staff_name'] . '</td>
                                <td>' . $product['brand'] . '</td>
                                <td>' . $product['category_name'] . '</td>
                                <td>' . $product['date_up'] . '</td>
                                <td>';
                if ($product['status'] == 2) {
                    $output .= 'Mới';
                } elseif ($product['status'] == 0) {
                    $output .= 'Giảm giá';
                } else {
                    $output .= 'Không hiển thị';
                }
                $output .= '
                                </td>';

                foreach ($sell_product as $key => $sell) {
                    if ($product['id_product'] == $sell['id_product']) {
                        $output .= '<td>' . $sell['sell'] . '</td>';
                    }
                }
                $output .= '
                                
                                <td>' . $product['date_update'] . '</td>
                                <td><a href="' . BASE_URL . 'product/detail_product/' . $product['id_product'] . '"><i class="far fa-eye"></i></a></td>
                                <td><a href="' . BASE_URL . 'product/editproduct/' . $product['id_product'] . '"><i class="far fa-edit"></i></a></td>
                                <td><a href="' . BASE_URL . 'product/delete_product/' . $product['id_product'] . '"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                        ';
            }
            $output .= '
                    </tbody>
                </table>
    
            </div>
            <div>
            <nav class="mt-3" aria-label="...">
            <ul class="pagination pagination-sm">
            ';
            $total_pages = ceil($count_product[0]['counts'] / $limit);
            for ($x = 1; $x <= $total_pages; $x++) {
                if ($x == $page) {
                    $class_name = "active";
                } else {
                    $class_name = "";
                }
                $output .= '
                    
                            <li class="page-item ' . $class_name . '"><a id="' . $x . '" class="page-link" href="">' . $x . '</a></li>
                      ';
            }
            $output .= '
                </ul>
                </nav>
            </div>
            ';
        }

        echo $output;
    }
    function load_add_product()
    {
        $this->header();
        $model_cat = $this->load->model('categorymodel');
        $model_s = $this->load->model('sizemodel');
        $model_b = $this->load->model('brandmodel');
        $model_d = $this->load->model('discountmodel');
        $model_i = $this->load->model('imgmodel');
        $tbl_category = 'tbl_category';
        $tbl_size = 'tbl_size';
        $tbl_brand = 'tbl_brand';
        $tbl_discount = 'tbl_discount';
        $tbl_imgcolor = 'tbl_imgcolor';
        $tbl_imgdesc = 'tbl_imgdesc';
        // lấy ảnh mà chưa có sản phẩm
        $select_one_other = 'tbl_imgcolor.*';
        $select_two_other = 'tbl_imgcolor_product.*';
        $tbl_one_other = 'tbl_imgcolor ';
        $tbl_two_other = 'tbl_imgcolor_product ';
        $cond_other = 'tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor';
        $data['imgcolor'] = $model_i->getimgnotlink($select_one_other, $tbl_one_other, $select_two_other, $tbl_two_other, $cond_other);
        $data['categories'] = $model_cat->category($tbl_category);
        $data['brands'] = $model_b->list_brand($tbl_brand);
        $data['discounts'] = $model_d->discount($tbl_discount);
        $this->load->view('admin/add_product', $data);
        $this->load->view('admin/footer');
    }
    public function addproduct()
    {
        Session::init();
        $model = $this->load->model('productmodel');
        $tbl_product = 'tbl_product';
        $tbl_imgcolor_product = 'tbl_imgcolor_product';
        $tbl_discount_product = 'tbl_discount_product';
        $id_product = rand(10, 999999);
        $product_name = filter_input(INPUT_POST, 'product_name');
        $price = filter_input(INPUT_POST, 'price');
        $id_category = $_POST['category'];
        $description = filter_input(INPUT_POST, 'description');
        $id_brand = filter_input(INPUT_POST, 'brand');
        $date = date("d/m/Y");
        $hour = date("h:i:sa");
        $date_hour = $date . " " . $hour;
        $status = filter_input(INPUT_POST, 'status');
        $staff_name = Session::get('username');
        $data = array(
            'id_product' => "$id_product",
            'product_name' => "$product_name",
            'description' => "$description",
            'price' => "$price",
            'id_brand' => "$id_brand",
            'id_category' => "$id_category",
            'date_up' => "$date_hour",
            'status' => "$status",
            'date_update' => "$date  $hour",
            'staff_name' => "$staff_name"
        );

        $result_product = $model->insertproduct($tbl_product, $data);
        $discounts = filter_input(INPUT_POST, 'discount', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        foreach ($discounts as $key => $value) {
            $data4 = array(
                'id_product' => "$id_product",
                'id_discount' => "$value"
            );

            $result = $model->insertproduct($tbl_discount_product, $data4);
        }
        $imgothers = filter_input(INPUT_POST, 'imgother', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        foreach ($imgothers as $key => $value) {
            $data2 = array(
                'id_imgcolor' => "$value",
                'id_product' => "$id_product"
            );

            $result = $model->insertproduct($tbl_imgcolor_product, $data2);
        }
        if ($result_product) {
            $mess['msg'] = "Thêm sản phẩm thành công";
            header('Location: ' . BASE_URL . 'product/load_add_product?msg=' . urldecode(serialize($mess)));
        }
    }
    public function detail_product($id)
    {
        $this->header();
        $model_p = $this->load->model('productmodel');
        $model_img = $this->load->model('imgmodel');
        $model_size = $this->load->model('sizemodel');
        // select img other by id img
        $select_imgcolor = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
        $tbl_imgcolor = 'tbl_imgcolor, tbl_imgcolor_product';
        $cond_img = "tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor AND tbl_imgcolor_product.id_product = '$id'";
        $data['imgcolor'] = $model_img->img($select_imgcolor, $tbl_imgcolor, $cond_img);
        $id_product = $data['imgcolor'][0]['id_product'];
        // select imgother
        $select_imgcolor_product = 'tbl_imgcolor.*, tbl_product.*';
        $tbl_imgcolor_product = 'tbl_imgcolor_product, tbl_product, tbl_imgcolor';
        $cond_imgcolor = "tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor AND tbl_imgcolor_product.id_product = tbl_product.id_product AND tbl_product.id_product = '$id_product'";
        $data['imgcolors'] = $model_img->img($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        // select imgdesc
        $select_imgdesc_product = 'tbl_imgdesc.*, tbl_imgcolor_product.id_product';
        $tbl_imgdesc_product = 'tbl_imgdesc,tbl_img, tbl_imgcolor, tbl_imgcolor_product';
        $cond_imgdesc_product = "tbl_imgdesc.id_imgdesc = tbl_img.id_imgdesc AND tbl_img.id_imgcolor = tbl_imgcolor.id_imgcolor AND tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor AND tbl_imgcolor_product.id_product = '$id_product'";
        $data['imgdescs'] = $model_img->img($select_imgdesc_product, $tbl_imgdesc_product, $cond_imgdesc_product);
        $tbl_product = 'tbl_product,tbl_category, tbl_brand';
        $cond = "tbl_product.id_brand = tbl_brand.id_brand AND tbl_product.id_category = tbl_category.id_category AND tbl_product.id_product='$id_product'";
        $data['products'] = $model_p->product($tbl_product, $cond);
        $this->load->view('admin/detail_product', $data);
        $this->load->view('admin/footer', $data);
    }
    public function list_imgdesc_ajax()
    {
        $output = '';
        $id_img = $_POST['id_img'];
        $name_img = str_replace('%20', ' ', $id_img);
        $model = $this->load->model('imgmodel');
        $select_img = 'tbl_imgdesc.*, tbl_img.*, tbl_imgcolor.*';
        $tbl_img = 'tbl_imgdesc, tbl_img, tbl_imgcolor';
        $cond_img = "tbl_imgdesc.id_imgdesc = tbl_img.id_imgdesc AND tbl_img.id_imgcolor = tbl_imgcolor.id_imgcolor AND tbl_imgcolor.img_name = '$name_img'";
        $data = $model->img($select_img, $tbl_img, $cond_img);
        $output .= '
        <div class="orther-img w-100" style="display: flex; flex-wrap: wrap;">    
        ';
        if ($data) {
            foreach ($data as $key => $value) {
                $output .= '
                <span style="width: 75px; height: 75px;" class="p' . $value['id_imgdesc'] . ' image">
                    <img style="width: 100%; height: 100%;" src="../../apps/uploads/' . $value['name_imgdesc'] . '" alt="">
                </span>
                ';
            }
        }
        $output .= '
        </div>
        ';
        echo $output;
    }
    public function list_size_ajax()
    {
        $output = '';
        $id_img = $_POST['id_img'];
        $name_img = str_replace('%20', ' ', $id_img);
        $model = $this->load->model('sizemodel');
        $select_size = 'tbl_size.*, tbl_img_size.*, tbl_imgcolor.*';
        $tbl_size = 'tbl_size, tbl_img_size, tbl_imgcolor';
        $cond_size = "tbl_size.id_size = tbl_img_size.id_size AND tbl_img_size.id_imgcolor = tbl_imgcolor.id_imgcolor AND tbl_imgcolor.img_name = '$name_img'";
        $data = $model->size($select_size, $tbl_size, $cond_size);
        $output .= '
        <div class="size" style="background: none;  height: 200px">
        <h3>Size:</h3>   
        ';
        if ($data) {
            foreach ($data as $key => $value) {
                $output .= '
                <span class="choose_size p' . $value['size'] . '" data-id2=' . $value['id_size'] . ' data-id1 = ' . $value['id_imgcolor'] . ' data-size=' . $value['size'] . '  data-id3=' . $value['id'] . ' 
                data-id4=' . $value['quantity'] . 'style="margin-bottom: 10px;">
                    <p class="size_name">' . $value['size'] . '</p>
                </span>
                ';
            }
        }
        $output .= '
        </div>
        ';
        echo $output;
    }
    public function check_quantity_product()
    {
        $output = '';
        $id_img = $_POST['id_img'];
        $id_size = $_POST['id_size'];
        $model = $this->load->model('mainmodel');
        $select = 'tbl_size.*, tbl_imgcolor.*, tbl_img_size.*';
        $tbl = 'tbl_img_size, tbl_size, tbl_imgcolor';
        $cond = "tbl_imgcolor.id_imgcolor = tbl_img_size.id_imgcolor AND tbl_img_size.id_size = tbl_size.id_size AND tbl_size.id_size = '$id_size' AND tbl_imgcolor.id_imgcolor = '$id_img'";
        $data = $model->select($select, $tbl, $cond);
        if ($data[0]['quantity'] > 15) {
            $output .= '
            <div class="col-6">
                <div class="card radius-10 bg-success bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-baseline">
                            <div style="width: 200px;">
                                <p class="mb-0 text-white">Số lượng</p>
                                <h4 class="my-1 text-white">' . $data[0]['quantity'] . '</h4>
                            </div>
                            <div class="text-white ms-auto font-35 w-100 d-flex justify-content-end"><i class="fas fa-check-circle"></i></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input class="btn btn-add" type="submit" value="Thêm vào giỏ hàng">
            ';
        } elseif ($data[0]['quantity'] <= 15 || $data[0]['quantity'] > 0) {
            $output .= '
            <div class="col-6">
                <div class="card radius-10 bg-warning bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-baseline">
                            <div style="width: 200px;">
                                <p class="mb-0 text-white">Số lượng</p>
                                <h4 class="my-1 text-white">' . $data[0]['quantity'] . '</h4>
                            </div>
                            <div class="text-white ms-auto font-35 w-100 d-flex justify-content-end"><i class="fas fa-exclamation"></i></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input class="btn btn-add" type="submit" value="Thêm vào giỏ hàng">
            ';
        } else {
            $output .= '
            <div class="col-6">
                <div class="card radius-10 bg-danger bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-baseline">
                            <div style="width: 200px;">
                                <p class="mb-0 text-white">Số lượng</p>
                                <h4 class="my-1 text-white">' . $data[0]['quantity'] . '</h4>
                            </div>
                            <div class="text-white ms-auto font-35 w-100 d-flex justify-content-end"><i class="fas fa-exclamation-triangle"></i></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            ';
        }
        echo $output;
    }
    public function delete_product($id)
    {
        $model_product = $this->load->model('productmodel');
        // delete relationship product vs discount
        $tbl_discount_product = 'tbl_discount_product';
        $cond_discount_product = "tbl_discount_product.id_product='$id'";
        $model_product->deleteproduct($tbl_discount_product, $cond_discount_product);
        // delete relationship product vs size
        $tbl_product_size = 'tbl_product_size';
        $cond_product_size = "tbl_product_size.id_product='$id'";
        $model_product->deleteproduct($tbl_product_size, $cond_product_size);
        // delecte relationship imgother vs product
        $tbl_imgcolor_product = 'tbl_imgcolor_product';
        $cond_imgcolor_product = "tbl_imgcolor_product.id_product='$id'";
        $model_product->deleteproduct($tbl_imgcolor_product, $cond_imgcolor_product);
        // delete relationship imgdesc vs product
        $tbl_imgdesc_product = 'tbl_imgdesc_product';
        $cond_imgdesc_product = "tbl_imgdesc_product.id_product='$id'";
        $model_product->deleteproduct($tbl_imgdesc_product, $cond_imgdesc_product);
        // delete product
        $tbl_product = 'tbl_product';
        $cond = "tbl_product.id_product='$id'";
        $result = $model_product->deleteproduct($tbl_product, $cond);
        if ($result) {
            $mess['msg'] = "Xóa sản phẩm thành công";
            header('Location: ' . BASE_URL . 'product?msg=' . urldecode(serialize($mess)));
        } else {
            $mess['mess'] = "Xóa sản phẩm thất bại";
            header('Location: ' . BASE_URL . 'product?msg=' . urldecode(serialize($mess)));
        }
    }
    public function editproduct($id)
    {
        $this->header();
        $model_product = $this->load->model('productmodel');
        $model_brand = $this->load->model('brandmodel');
        $model_category = $this->load->model('categorymodel');
        $model = $this->load->model('mainmodel');
        // select img other by id_product 
        $select_imgcolor_product = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
        $tbl_imgcolor_product = 'tbl_imgcolor, tbl_imgcolor_product';
        $cond_imgcolor = "tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor AND tbl_imgcolor_product.id_product='$id'";
        $data['imgotherbyid'] = $model->select($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        // select img description by id_product
        $select_imgorther_product = 'tbl_imgdesc.*, tbl_imgdesc_product.*';
        $tbl_imgdesc_product = 'tbl_imgdesc, tbl_imgdesc_product';
        $cond_imgdesc = "tbl_imgdesc.id_imgdesc = tbl_imgdesc_product.id_imgdesc AND tbl_imgdesc_product.id_product='$id'";
        $data['imgdescbyid'] = $model->select($select_imgorther_product, $tbl_imgdesc_product, $cond_imgdesc);
        // select size by id_product
        $select_size_product = 'tbl_size.*, tbl_product_size.*';
        $tbl_size_product = 'tbl_size, tbl_product_size';
        $cond_size_product = "tbl_size.id_size = tbl_product_size.id_size AND tbl_product_size.id_product='$id'";
        $data['sizebyid'] = $model->select($select_size_product, $tbl_size_product, $cond_size_product);
        // select discount by id_product
        $select_discount_product = 'tbl_discount.*, tbl_discount_product.*';
        $tbl_discount_product = 'tbl_discount, tbl_discount_product';
        $cond_discount_product = "tbl_discount.id_discount = tbl_discount_product.id_discount AND tbl_discount_product.id_product='$id'";
        $data['discountbyid'] = $model->select($select_discount_product, $tbl_discount_product, $cond_discount_product);
        //select category
        $table_category = 'tbl_category';
        $data['categories'] = $model_category->category($table_category);
        // select brand
        $table_brand = 'tbl_brand';
        $data['brands'] = $model_brand->list_brand($table_brand);
        // select img other
        $select_imgcolor_product = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
        $tbl_imgcolor_product = 'tbl_imgcolor, tbl_imgcolor_product';
        $cond_imgcolor = 'tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor';
        $data['imgcolors'] = $model->select($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        // select img description
        $select_imgorther_product = 'tbl_imgdesc.*, tbl_imgdesc_product.*';
        $tbl_imgdesc_product = 'tbl_imgdesc, tbl_imgdesc_product';
        $cond_imgdesc = 'tbl_imgdesc.id_imgdesc = tbl_imgdesc_product.id_imgdesc';
        $data['imgdescs'] = $model->select($select_imgorther_product, $tbl_imgdesc_product, $cond_imgdesc);
        // select discount 
        $model_discount = $this->load->model('discountmodel');
        $tbl_discount = 'tbl_discount';
        $data['discounts'] = $model_discount->discount($tbl_discount);
        // select product  
        $tbl_product = 'tbl_product,tbl_category, tbl_brand';
        $cond = "tbl_product.id_brand = tbl_brand.id_brand AND tbl_product.id_category = tbl_category.id_category AND tbl_product.id_product='$id'";
        $data['productbyid'] = $model_product->product($tbl_product, $cond);
        $this->load->view('admin/edit_product', $data);
        $this->load->view('admin/footer', $data);
    }

    public function updateproduct($id)
    {
        $model = $this->load->model('productmodel');
        // delete relationship product vs discount
        $tbl_discount_product = 'tbl_discount_product';
        $cond_discount_product = "tbl_discount_product.id_product='$id'";
        $model->deleteproduct($tbl_discount_product, $cond_discount_product);
        // // delecte relationship imgother vs product
        $tbl_imgcolor_product = 'tbl_imgcolor_product';
        $cond_imgcolor_product = "tbl_imgcolor_product.id_product='$id'";
        $model->deleteproduct($tbl_imgcolor_product, $cond_imgcolor_product);

        Session::init();
        $tbl_product = 'tbl_product';
        $id_product = rand(100, 99999);
        $product_name = filter_input(INPUT_POST, 'product_name');
        $price = filter_input(INPUT_POST, 'price');
        $description = filter_input(INPUT_POST, 'description');
        $status = filter_input(INPUT_POST, 'status');
        $id_category = filter_input(INPUT_POST, 'category');
        $id_brand = filter_input(INPUT_POST, 'brand');
        $data_up = date("F j, Y, g:i a");
        $staff_name = Session::get('username');
        $date = date("d/m/Y");
        $hour = date("h:i:sa");
        $data = array(
            'id_product' => "$id_product",
            'product_name' => "$product_name",
            'description' => "$description",
            'price' => "$price",
            'id_brand' => "$id_brand",
            'id_category' => "$id_category",
            'status' => "$status",
            'date_update' => "$date  $hour",
            'staff_name' => "$staff_name"
        );
        $cond = "id_product='$id'";
        $result_product = $model->updateproduct($tbl_product, $data, $cond);
        $discounts = filter_input(INPUT_POST, 'discount', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        foreach ($discounts as $key => $value) {
            $data4 = array(
                'id_product' => "$id_product",
                'id_discount' => "$value"
            );
            $result = $model->insertproduct($tbl_discount_product, $data4, $cond);
        }
        $imgothers = filter_input(INPUT_POST, 'imgother', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        foreach ($imgothers as $key => $value) {
            $data2 = array(
                'id_imgcolor' => "$value",
                'id_product' => "$id_product"
            );
            $result = $model->insertproduct($tbl_imgcolor_product, $data2, $cond);
        }
        if ($result_product) {
            $mess['msg'] = 'Cập nhập sản phẩm thành công';
            header('Location: ' . BASE_URL . 'product/load_view_product?msg=' . urldecode(serialize($mess)));
        }
    }

    public function add_comment()
    {
        if (isset($_POST['addComment'])) {
            date_default_timezone_set('asia/ho_chi_minh');
            $date = date("Y-m-j");
            $hour = date("h:i:sa");
            $model = $this->load->model('mainmodel');
            Session::init();
            $id_user = Session::get('id');
            $textComment = $_POST['textComment'];
            $rate = $_POST['rate'];
            $id_product = $_POST['id_product'];
            $tbl = 'tbl_comment';
            $data = array(
                'star' => $rate,
                'text_comment' => $textComment,
                'id_product' => $id_product,
                'id_user' => $id_user,
                'createComment' => $date . ' ' . $hour,
                'parent_id_comment' => 0
            );
            $result = $model->insert($tbl, $data);
        }
    }
    public function add_reply()
    {
        if (isset($_POST['replyComment'])) {
            date_default_timezone_set('asia/ho_chi_minh');
            $date = date("Y-m-j");
            $hour = date("h:i:sa");
            $model = $this->load->model('mainmodel');
            Session::init();
            $id_user = Session::get('id');
            $replyComment = $_POST['replyComment'];
            $id_product = $_POST['id_product'];
            $id_comment = $_POST['id_comment'];
            $tbl = 'tbl_comment';
            $data = array(
                'star' => 0,
                'text_comment' => $replyComment,
                'id_product' => $id_product,
                'id_user' => $id_user,
                'createComment' => $date . ' ' . $hour,
                'parent_id_comment' => $id_comment
            );
            $result = $model->insert($tbl, $data);
        }
    }
    public function get_rate_star()
    {
        if (isset($_POST['getStarProduct'])) {
            $output = "";
            $id = $_POST['id_product'];
            $model_product = $this->load->model('productmodel');
            $cond_avg_star = "tbl_comment.id_product = '$id' AND parent_id_comment = 0;";
            $data = $model_product->avgStar($cond_avg_star);
            if ($data) {

                $avg = round($data[0]['star'], 1);
                $star = round($data[0]['star']);
                $output .= '
                <div class="d-flex ">
                <div class="star_user text-center ml-3"> ';
                switch ($star) {
                    case "1":
                        $output .= '
                        <label  style=" color: #fff;">(' . $avg . ')</label>
                        <label for="rate-5" class="fas fa-star" style="color:#fff"></label>
                        <label for="rate-4" class="fas fa-star" style=" color: #fff;"></label>
                        <label for="rate-3" class="fas fa-star" style=" color: #fff"></label>
                        <label for="rate-2" class="fas fa-star" style=" color: #fff;"></label>
                        <label for="rate-1" class="fas fa-star" style=" color: #fd4;"></label>
                        
                        ';
                        break;
                    case "2":
                        $output .= '
                        <label  style=" color: #fff;">(' . $avg . ')</label>
                        <label for="rate-5" class="fas fa-star" style="color:#fff"></label>
                        <label for="rate-4" class="fas fa-star" style=" color: #fff;"></label>
                        <label for="rate-3" class="fas fa-star" style=" color: #fff"></label>
                        <label for="rate-2" class="fas fa-star" style=" color: #fd4;"></label>
                        <label for="rate-1" class="fas fa-star" style=" color: #fd4;"></label>
                        
                        ';
                        break;
                    case "3":
                        $output .= '
                        <label  style=" color: #fff;">(' . $avg . ')</label>
                        <label for="rate-5" class="fas fa-star" style="color:#fff"></label>
                        <label for="rate-4" class="fas fa-star" style=" color: #fff;"></label>
                        <label for="rate-3" class="fas fa-star" style=" color: #fd4"></label>
                        <label for="rate-2" class="fas fa-star" style=" color: #fd4;"></label>
                        <label for="rate-1" class="fas fa-star" style=" color: #fd4;"></label>
                        
                        ';
                        break;
                    case "4":
                        $output .= '
                        <label  style=" color: #fff;">(' . $avg . ')</label>
                        <label for="rate-5" class="fas fa-star" style="color:#fff"></label>
                        <label for="rate-4" class="fas fa-star" style=" color: #fd4;"></label>
                        <label for="rate-3" class="fas fa-star" style=" color: #fd4;"></label>
                        <label for="rate-2" class="fas fa-star" style=" color: #fd4;"></label>
                        <label for="rate-1" class="fas fa-star" style=" color: #fd4;"></label>
                        
                        ';
                        break;
                    case "5":
                        $output .= ' 
                        <label  style=" color: #fff;">(' . $avg . ')</label>
                        <label for="rate-5" class="fas fa-star" style="color:#fd4"></label>
                        <label for="rate-4" class="fas fa-star" style=" color: #fd4;"></label>
                        <label for="rate-3" class="fas fa-star" style=" color: #fd4;"></label>
                        <label for="rate-2" class="fas fa-star" style=" color: #fd4;"></label>
                        <label for="rate-1" class="fas fa-star" style=" color: #fd4;"></label>
                        
                        ';
                        break;
                }
                $output .= '
            </div>
                </div>';
            } else {
                $output .= '<h5 style="color:#fff"></h5>';
            }
            echo $output;
        }
    }
    public function get_comment()
    {
        if (isset($_POST['getComment'])) {
            $output = "";
            $id_product = $_POST['id_product'];
            $start = $_POST['start'];
            $limit = "$start, 20";
            $cond = "tbl_login.id = tbl_comment.id_user AND tbl_comment.id_product = '$id_product' AND tbl_comment.parent_id_comment = '0'";
            $model = $this->load->model('productmodel');
            $data = $model->getAllComment($cond, $limit);
            if ($data) {
                foreach ($data as $key => $value) {
                    $output .= '        <div class="media mb-2">
                    <div class="media-body">
                    <div class="d-flex ">
                    <h5 class="mt-0">' . $value['username'] . '   ' . $value['createComment'] . '</h5>
                    <div class="star_user text-center ml-3"> ';
                    switch ($value['star']) {
                        case "1":
                            $output .= '
                            <input type="checkbox" name="rate" value="5" class="rate" id="rate-5">
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="4" class="rate" id="rate-4">
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="3" class="rate" id="rate-3">
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="2" class="rate" id="rate-2">
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="1" class="rate" id="rate-1" checked>
                            <label for="rate-1" class="fas fa-star"></label>
                            ';
                            break;
                        case "2":
                            $output .= '
                            <input type="checkbox" name="rate" value="5" class="rate" id="rate-5">
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="4" class="rate" id="rate-4">
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="3" class="rate" id="rate-3">
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="2" class="rate" id="rate-2" checked>
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="1" class="rate" id="rate-1" >
                            <label for="rate-1" class="fas fa-star"></label>
                            ';
                            break;
                        case "3":
                            $output .= '
                            <input type="checkbox" name="rate" value="5" class="rate" id="rate-5">
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="4" class="rate" id="rate-4">
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="3" class="rate" id="rate-3" checked>
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="2" class="rate" id="rate-2">
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="1" class="rate" id="rate-1" >
                            <label for="rate-1" class="fas fa-star"></label>
                            ';
                            break;
                        case "4":
                            $output .= '
                            <input type="checkbox" name="rate" value="5" class="rate" id="rate-5">
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="4" class="rate" id="rate-4" checked>
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="3" class="rate" id="rate-3">
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="2" class="rate" id="rate-2">
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="1" class="rate" id="rate-1" >
                            <label for="rate-1" class="fas fa-star"></label>
                            ';
                            break;
                        case "5":
                            $output .= ' 
                            <input type="checkbox" name="rate" value="5" class="rate" id="rate-5" checked>
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="4" class="rate" id="rate-4">
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="3" class="rate" id="rate-3">
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="2" class="rate" id="rate-2">
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="1" class="rate" id="rate-1">
                            <label for="rate-1" class="fas fa-star"></label>
                            ';
                            break;
                    }
                    $output .= '
                </div>
                    </div>
                        ' . $value['text_comment'] . '
                        <div class="reply"><a class="" href="javascrip:void(0)" data-id_comment=' . $value['id_comment'] . ' onclick="reply(this)">Bình luận</a></div>
                    </div>
                </div>';
                    $output .= $this->get_reply($model, $value["id_comment"]);
                }
            }

            echo $output;
        }
    }
    public function get_reply($model, $parent_id = 0, $margin_left = 0)
    {
        $output = "";
        $select = 'tbl_comment.*, tbl_login.username';
        $tbl = 'tbl_comment, tbl_login';
        $cond = "tbl_login.id = tbl_comment.id_user AND tbl_comment.parent_id_comment= '$parent_id'";
        $reply = $model->productdetail($select, $tbl, $cond);
        if ($parent_id == 0) {
            $margin_left = 0;
        } else {
            $margin_left = $margin_left +  48;
        }
        if ($reply) {
            foreach ($reply as $row) {
                $output .= '
                <div class="media mb-2" style="margin-left: ' . $margin_left . 'px">
                <div class="media-body">
                    <h5 class="mt-0">' . $row['username'] . '   ' . $row['createComment'] . '</h5>
                    ' . $row['text_comment'] . '
                    <div class="reply"><a href="javascrip:void(0)" data-id_comment=' . $row['id_comment'] . ' onclick="reply(this)">Bình luận</a></div>
                </div>
            </div>
                ';
                $output .= $this->get_reply($model, $row["id_comment"], $margin_left);
            }
        }
        return $output;
    }
    public function getproductbycategory($id)
    {
        $model_product = $this->load->model('productmodel');
        $model_img = $this->load->model('imgmodel');
        $tbl_product = 'tbl_product, tbl_category, tbl_brand';
        $cond_product = "tbl_product.id_category = tbl_category.id_category AND tbl_brand.id_brand = tbl_product.id_brand AND tbl_product.id_category = '$id'";
        $limit = 10;
        $data['products'] =  $model_product->product($tbl_product, $cond_product, 0, $limit);
        $select_img = 'tbl_imgcolor.*, tbl_imgcolor_product.id_product';
        $tbl_img = 'tbl_product, tbl_imgcolor_product, tbl_imgcolor';
        $cond_img = "tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor AND tbl_imgcolor_product.id_product = tbl_product.id_product AND tbl_product.id_category = '$id'";
        $data['imgother'] = $model_img->img($select_img, $tbl_img, $cond_img);
        // select discount
        $model = $this->load->model('mainmodel');
        $select_discount_product = 'tbl_discount.*, tbl_discount_product.*';
        $tbl_discount_product = 'tbl_discount, tbl_discount_product';
        $cond_discount_product = 'tbl_discount.id_discount = tbl_discount_product.id_discount AND tbl_discount.status = 1';
        $data['discounts'] = $model->select($select_discount_product, $tbl_discount_product, $cond_discount_product);
        // select img 
        $select_imgcolor_product = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
        $tbl_imgcolor_product = 'tbl_imgcolor, tbl_imgcolor_product';
        $cond_imgcolor = "tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor";
        $data['imgother'] = $model_img->img($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        $data['imgproduct'] = $model_img->imggroupbyid($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        // select size
        $tbl_size = 'tbl_size';
        $data['sizes'] = $model->selectnormal($tbl_size);
        // select brand 
        $tbl_brand = 'tbl_brand';
        $data['brands'] = $model->selectnormal($tbl_brand);
        // select category 
        $tbl_category = 'tbl_category';
        $data['categories'] = $model->selectnormal($tbl_category);
        // select max price 
        $data['maxprice'] = $model_product->getmaxPrice();
        // load view
        $tbl = 'tbl_contact';
        $data['contacts'] = $model->selectnormal($tbl);
        $this->header_home();
        $this->slide();
        $this->load->view('listproduct', $data);
        $this->load->view('footer', $data);
    }
    public function header_home()
    {
        Session::init();
        $username = Session::get('username');
        $email = Session::get('email');
        $phone = Session::get('phone');
        $type = Session::get('type');
        $data['user'] = array(
            'username' => "$username",
            'email' => "$email",
            'phone' => "$phone",
            'type' => "$type"
        );
        $model_category = $this->load->model('categorymodel');
        $data['menu'] = '';
        $data['menu'] .= $this->multilevel_menus($model_category);
        $this->load->view('header', $data);
    }
    public function slide()
    {
        $model = $this->load->model('slidemodel');
        $tbl = 'tbl_slide';
        $data['slides'] = $model->select($tbl);
        $this->load->view('slide', $data);
    }
    public function multilevel_menus($model_category, $parent_id = NULL)
    {
        $table = 'tbl_category';
        $menus['menu'] = '';
        if (is_null($parent_id)) {
            $data = $model_category->categoryparent($table);
        } else {
            $cond = "id_parent ='$parent_id'";
            $data = $model_category->categorycond($table, $cond);
        }
        $i = 0;
        foreach ($data as $key => $value) {
            if ($data[$i]['id_parent']) {
                $menus['menu'] .= '<li><a href="' . BASE_URL . 'product/getproductbycategory/' . $value['id_category'] . '">' . $data[$i]['category_name'] . '</a>';
            } else {
                $menus['menu'] .= '<li class="subnav">' . $data[$i]['category_name'] . '<i class="fas fa-caret-down"></i>';
            }

            $menus['menu'] .= '<ul class="sub_menu">' . $this->multilevel_menus($model_category, $data[$i]['id_category']) . '</ul>';

            // $menus .= '</li>';
            $i++;
        }
        return $menus['menu'];
    }
    public function load_filter_product_category()
    {
        if (isset($_POST['action'])) {
            $output = "";
            $limit = 10;
            $page = 1;
            if (isset($_POST['page_no'])) {
                $page = $_POST['page_no'];
            }
            $offset = ($page - 1) * $limit;
            $id_category = $_POST['id_category'];
            $model_product = $this->load->model('productmodel');
            $cond = "id_category = '$id_category'";
            $products = $model_product->productlimit($cond, $offset, $limit);
            $model = $this->load->model('mainmodel');
            if ($products) {
                $select_discount_product = 'tbl_discount.*, tbl_discount_product.*';
                $tbl_discount_product = 'tbl_discount, tbl_discount_product';
                $cond_discount_product = 'tbl_discount.id_discount = tbl_discount_product.id_discount AND tbl_discount.status = 1';
                $discounts = $model->select($select_discount_product, $tbl_discount_product, $cond_discount_product);
                // select img 
                $model_img = $this->load->model('imgmodel');
                $select_imgcolor_product = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
                $tbl_imgcolor_product = 'tbl_imgcolor, tbl_imgcolor_product';
                $cond_imgcolor = "tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor";
                $imgother = $model_img->img($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
                $imgproduct = $model_img->imggroupbyid($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
                $output .= '<div class="row">';
                foreach ($products as $key => $product) {
                    $output .= '
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="box">
                      ';
                    foreach ($imgproduct as $key => $imgpro) {
                        if ($imgpro['id_product'] == $product['id_product']) {
                            $output .= '<img class="model p1 img_product" src="' . BASE_URL . 'apps/uploads/' . $imgpro['img_name'] . '">';
                        }
                    }
                    $output .= '
                      <div class="content-product">
                        <h3 class="title">' . $product['product_name'] . '</h3>
                        ';
                    foreach ($discounts as $key => $discount) {
                        if ($product['status'] == 0 && $discount['id_product'] == $product['id_product']) {

                            $output .= '  <div class="price"><span class="pricee">' . number_format($product['price'] - ($product['price'] * $discount['discount'] / 100)) . '</span>đ - <span>' . number_format($product['price']) . '</span>đ</div>';
                        }
                    }

                    if ($product['status'] != 0) {

                        $output .= '<div class="price"><span class="pricee">' . number_format($product['price']) . '</span>đ</div>';
                    }
                    $output .= '
                        <div class="content-color" >
                        .';
                    foreach ($imgother as $key => $imgcolor) {

                        if ($product['id_product'] == $imgcolor['id_product']) {
                            $output .= '
                                    <span class="' . $imgcolor['id_product'] . '">
                                        <img src="' . BASE_URL . 'apps/uploads/' . $imgcolor['img_name'] . '" alt="">
                                    </span> ';
                        }
                    }

                    $output .= '
                        </div>
                      </div>
                      <a href="' . BASE_URL . 'index/detailproduct/' . $product['id_product'] . '" class="fas fa-eye" ></a>
                      <button class="btn btn_add_pro">Add to cart</button>
                    </div>
                  </div>';
                }
                $output .= '</div>
                <div>
                <nav class="mt-3" aria-label="...">
                    <ul class="pagination pagination-sm ">
                ';
                $count = 'id_product';
                $tbl_product = 'tbl_product';
                $counts = $model->count($count, $tbl_product, $cond);
                $total_pages = ceil($counts[0]['count'] / $limit);
                for ($x = 1; $x <= $total_pages; $x++) {
                    if ($x == $page) {
                        $class_name = "active";
                    } else {
                        $class_name = "";
                    }
                    $output .= '
            
                                        <li class="page-item ' . $class_name . ' "><a id="' . $x . '" class="page-link" href="">' . $x . '</a></li>
                                  ';
                }
                $output .= '
                </ul>
                </nav>
            </div>
            ';
                echo $output;
            } else {
                echo '<h1 style="color: #fff">Không tồn tại sản phẩm</h1>';
            }
        }
    }
    public function load_filter_product()
    {
        $model_product = $this->load->model('productmodel');
        $limit = 10;
        $page = 1;
        $cond = "";
        $brand = "";
        $category = "";
        $text_brand = "";
        $output = "";
        if ($_POST['action'] == 'fetch_data') {
            if (isset($_POST['page_no'])) {
                $page = $_POST['page_no'];
            }
            $offset = ($page - 1) * $limit;
            $cond .= "price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'";
            if (isset($_POST['category'])) {
                $cond .= ' AND';
                foreach ($_POST['category'] as $id_category) {
                    $category .= "id_category = '$id_category' OR ";
                }
                $arr_category = explode(" ", $category);
                $test = array_pop($arr_category);
                $test1 = array_pop($arr_category);
                foreach ($arr_category as $key) {
                    $cond .= " " . $key;
                }
            }

            if (isset($_POST['brand'])) {
                $cond .= ' AND ';
                foreach ($_POST['brand'] as $id_brand) {
                    $brand .= "id_brand = '$id_brand' OR ";
                }
                $arr_brand = explode(" ", $brand);
                $test = array_pop($arr_brand);
                $test1 = array_pop($arr_brand);
                foreach ($arr_brand as $key) {
                    $text_brand .= " " . $key;
                }
                $cond .= '(' . $text_brand . ')';
            }
            $products = $model_product->productlimit($cond, $offset, $limit);
            if ($products) {
                // select discount
                $model = $this->load->model('mainmodel');

                $select_discount_product = 'tbl_discount.*, tbl_discount_product.*';
                $tbl_discount_product = 'tbl_discount, tbl_discount_product';
                $cond_discount_product = 'tbl_discount.id_discount = tbl_discount_product.id_discount AND tbl_discount.status = 1';
                $discounts = $model->select($select_discount_product, $tbl_discount_product, $cond_discount_product);
                // select img 
                $model_img = $this->load->model('imgmodel');
                $select_imgcolor_product = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
                $tbl_imgcolor_product = 'tbl_imgcolor, tbl_imgcolor_product';
                $cond_imgcolor = "tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor";
                $imgother = $model_img->img($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
                $imgproduct = $model_img->imggroupbyid($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
                $output .= '<div class="row">';
                foreach ($products as $key => $product) {
                    $output .= '
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="box">
                      ';
                    foreach ($imgproduct as $key => $imgpro) {
                        if ($imgpro['id_product'] == $product['id_product']) {
                            $output .= '<img class="model p1 img_product" src="' . BASE_URL . 'apps/uploads/' . $imgpro['img_name'] . '">';
                        }
                    }
                    $output .= '
                      <div class="content-product">
                        <h3 class="title">' . $product['product_name'] . '</h3>
                        ';
                    foreach ($discounts as $key => $discount) {
                        if ($product['status'] == 0 && $discount['id_product'] == $product['id_product']) {

                            $output .= '  <div class="price"><span class="pricee">' . number_format($product['price'] - ($product['price'] * $discount['discount'] / 100)) . '</span>đ - <span>' . number_format($product['price']) . '</span>đ</div>';
                        }
                    }

                    if ($product['status'] != 0) {

                        $output .= '<div class="price"><span class="pricee">' . number_format($product['price']) . '</span>đ</div>';
                    }
                    $output .= '
                        <div class="content-color" >
                        .';
                    foreach ($imgother as $key => $imgcolor) {

                        if ($product['id_product'] == $imgcolor['id_product']) {
                            $output .= '
                                    <span class="' . $imgcolor['id_product'] . '">
                                        <img src="' . BASE_URL . 'apps/uploads/' . $imgcolor['img_name'] . '" alt="">
                                    </span> ';
                        }
                    }

                    $output .= '
                        </div>
                      </div>
                      <a href="' . BASE_URL . 'index/detailproduct/' . $product['id_product'] . '" class="fas fa-eye" ></a>
                    </div>
                  </div>';
                }
                $output .= '</div>
                <div>
                <nav class="mt-3" aria-label="...">
                    <ul class="pagination pagination-sm ">
                ';
                $count = 'id_product';
                $tbl_product = 'tbl_product';
                $counts = $model->count($count, $tbl_product, $cond);
                $total_pages = ceil($counts[0]['count'] / $limit);
                for ($x = 1; $x <= $total_pages; $x++) {
                    if ($x == $page) {
                        $class_name = "active";
                    } else {
                        $class_name = "";
                    }
                    $output .= '
            
                                        <li class="pag page-item ' . $class_name . '"><a id="' . $x . '" class="page-link" href="">' . $x . '</a></li>
                                  ';
                }
                $output .= '
                </ul>
                </nav>
            </div>
            ';
                echo $output;
            } else {
                echo '<h1 style="color: #fff">Không tồn tại sản phẩm</h1>';
            }
        }
    }
    public function sort_product_admin()
    {
        $cond = "";
        $brand = "";
        $category = "";
        $text_brand = "";
        $output = "";
        $data = "";

        if (isset($_POST['action'])) {
            $limit = 10;
            if (isset($_POST['page_no'])) {
                $page = $_POST['page_no'];
            } else {
                $page = 1;
            }
            $offset = ($page - 1) * $limit;
            if (isset($_POST['category'])) {
                $cond .= ' AND ';
                foreach ($_POST['category'] as $id_category) {
                    $category .= "tbl_product.id_category = '$id_category' OR ";
                }
                $arr_category = explode(" ", $category);
                $test = array_pop($arr_category);
                $test1 = array_pop($arr_category);
                foreach ($arr_category as $key) {
                    $cond .= " " . $key;
                }
            }

            if (isset($_POST['brand'])) {
                $cond .= ' AND ';
                foreach ($_POST['brand'] as $id_brand) {
                    $brand .= "tbl_product.id_brand = '$id_brand' OR ";
                }
                $arr_brand = explode(" ", $brand);
                $test = array_pop($arr_brand);
                $test1 = array_pop($arr_brand);
                foreach ($arr_brand as $key) {
                    $text_brand .= " " . $key;
                }
                $cond .= '(' . $text_brand . ')';
            }
            if (isset($_POST['sort'])) {
                $sort = implode("','", $_POST['sort']);
                switch ($sort) {
                    case 0:
                        $output .= $this->new_product_sort($cond, $page, $limit, $offset);
                        break;
                    case 1:
                        $output .= $this->sell_product_sort($cond, $page, $limit, $offset);
                        break;
                    case 2:
                        $output .= $this->sale_product_sort($cond, $page, $limit, $offset);
                        break;
                    case 3:
                        $output .= $this->price_product_desc($cond, $page, $limit, $offset);
                        break;
                    case 4:
                        $output .= $this->price_product_asc($cond, $page, $limit, $offset);
                        break;

                    default:
                }
            } else {
                $output .= $this->new_product_sort($cond, $page, $limit, $offset);;
            }
        }
        echo $output;
    }
    public function price_product_asc($cond, $page, $limit, $offset)
    {
        $sort = 'tbl_product.price';

        $model_product = $this->load->model('productmodel');
        $products = $model_product->sell_product_sort_asc($cond, $sort, $offset, $limit);
        $output = "";
        $model_img = $this->load->model('imgmodel');
        $select_imgcolor_product = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
        $tbl_imgcolor_product = 'tbl_imgcolor, tbl_imgcolor_product';
        $cond_imgcolor = 'tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor';
        $imgcolors = $model_img->img($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        $output .= '
        <div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px;" id="load_product_admin">
            <table class="table1 align-middle table_user" style="overflow: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Ảnh khác</th>
                        <th>Nhân viên</th>
                        <th>Nhãn hiệu</th>
                        <th>Loại hàng</th>
                        <th>Ngày đăng tải</th>
                        <th>Tình trạng</th>
                        <th>Số lượng bán</th>
                        <th>Ngày sửa đổi</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead> 
                <tbody>';
        if ($products) {
            $i = 0;
            foreach ($products as $key => $product) {
                $i++;
                $output .= '
                            <tr>
                                <td>' . $i . '</td>
                                <td>' . $product['product_name'] . '</td>
                                <td>' . number_format($product['price']) . 'đ</td>
                                <td class="d-flex img_p ">
                                ';
                foreach ($imgcolors as $key => $img) {
                    if ($product['id_product'] == $img['id_product']) {
                        $output .= '                                        
                                        <span>
                                            <img src="' . BASE_URL . 'apps/uploads/' . $img['img_name'] . '" alt="">
                                        </span>';
                    }
                }
                $output .= '                                
                                </td>
                                <td>' . $product['staff_name'] . '</td>
                                <td>' . $product['brand'] . '</td>
                                <td>' . $product['category_name'] . '</td>
                                <td>' . $product['date_up'] . '</td>
                                <td>';
                if ($product['status'] == 2) {
                    $output .= 'Mới';
                } elseif ($product['status'] == 0) {
                    $output .= 'Giảm giá';
                } else {
                    $output .= 'Không hiển thị';
                }
                $output .= '
                                </td>';


                $output .= '<td>' . $product['sell'] . '</td>';

                $output .= '
                                
                                <td>' . $product['date_update'] . '</td>
                                <td><a href="' . BASE_URL . 'product/detail_product/' . $product['id_product'] . '"><i class="far fa-eye"></i></a></td>
                                <td><a href="' . BASE_URL . 'product/editproduct/' . $product['id_product'] . '"><i class="far fa-edit"></i></a></td>
                                <td><a href="' . BASE_URL . 'product/delete_product/' . $product['id_product'] . '"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                        ';
            }
        }
        $output .= '
                    </tbody>
                </table>
    
            </div>
            <div>
            <nav class="mt-3" aria-label="...">
            <ul class="pagination pag pagination-sm">
            ';
        $count_product = $model_product->count($cond);
        $total_pages = ceil($count_product[0]['counts'] / $limit);
        for ($x = 1; $x <= $total_pages; $x++) {
            if ($x == $page) {
                $class_name = "active";
            } else {
                $class_name = "";
            }
            $output .= '
    
                                <li class="page-item ' . $class_name . '"><a id="' . $x . '" class="page-link" href="">' . $x . '</a></li>
                          ';
        }
        $output .= '
                </ul>
                </nav>
            </div>
            ';
        return $output;
    }
    public function price_product_desc($cond, $page, $limit, $offset)
    {
        $sort = 'tbl_product.price';
        $model_product = $this->load->model('productmodel');
        $products = $model_product->sell_product_sort($cond, $sort, $offset, $limit);
        $output = "";
        $model_img = $this->load->model('imgmodel');
        $select_imgcolor_product = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
        $tbl_imgcolor_product = 'tbl_imgcolor, tbl_imgcolor_product';
        $cond_imgcolor = 'tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor';
        $imgcolors = $model_img->img($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        $output .= '
        <div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px;" id="load_product_admin">
            <table class="table1 align-middle table_user" style="overflow: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Ảnh khác</th>
                        <th>Nhân viên</th>
                        <th>Nhãn hiệu</th>
                        <th>Loại hàng</th>
                        <th>Ngày đăng tải</th>
                        <th>Tình trạng</th>
                        <th>Số lượng bán</th>
                        <th>Ngày sửa đổi</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead> 
                <tbody>';
        if ($products) {
            $i = 0;
            foreach ($products as $key => $product) {
                $i++;
                $output .= '
                            <tr>
                                <td>' . $i . '</td>
                                <td>' . $product['product_name'] . '</td>
                                <td>' . number_format($product['price']) . 'đ</td>
                                <td class="d-flex img_p ">
                                ';
                foreach ($imgcolors as $key => $img) {
                    if ($product['id_product'] == $img['id_product']) {
                        $output .= '                                        
                                        <span>
                                            <img src="' . BASE_URL . 'apps/uploads/' . $img['img_name'] . '" alt="">
                                        </span>';
                    }
                }
                $output .= '                                
                                </td>
                                <td>' . $product['staff_name'] . '</td>
                                <td>' . $product['brand'] . '</td>
                                <td>' . $product['category_name'] . '</td>
                                <td>' . $product['date_up'] . '</td>
                                <td>';
                if ($product['status'] == 2) {
                    $output .= 'Mới';
                } elseif ($product['status'] == 0) {
                    $output .= 'Giảm giá';
                } else {
                    $output .= 'Không hiển thị';
                }
                $output .= '
                                </td>';


                $output .= '<td>' . $product['sell'] . '</td>';

                $output .= '
                                
                                <td>' . $product['date_update'] . '</td>
                                <td><a href="' . BASE_URL . 'product/detail_product/' . $product['id_product'] . '"><i class="far fa-eye"></i></a></td>
                                <td><a href="' . BASE_URL . 'product/editproduct/' . $product['id_product'] . '"><i class="far fa-edit"></i></a></td>
                                <td><a href="' . BASE_URL . 'product/delete_product/' . $product['id_product'] . '"><i class="far fa-trash-alt"></i></a></td>
                                <td>' . $page . '</td>
                            </tr>
                        ';
            }
        }
        $output .= '
                    </tbody>
                </table>
    
            </div>
            <div>
            <nav class="mt-3" aria-label="...">
            <ul class="pagination pag pagination-sm">
            ';
        $count_product = $model_product->count($cond);
        $total_pages = ceil($count_product[0]['counts'] / $limit);
        for ($x = 1; $x <= $total_pages; $x++) {
            if ($x == $page) {
                $class_name = "active";
            } else {
                $class_name = "";
            }
            $output .= '

                            <li class="page-item ' . $class_name . '"><a id="' . $x . '" class="page-link" href="">' . $x . '</a></li>
                      ';
        }
        $output .= '
                </ul>
                </nav>
            </div>
            ';
        return $output;
    }
    public function sale_product_sort($cond, $page, $limit, $offset)
    {
        $sort = 'sell';
        $cond = $cond . ' AND tbl_product.status = 0';
        $model_product = $this->load->model('productmodel');
        $products = $model_product->sell_product_sort($cond, $sort, $offset, $limit);
        $output = "";
        $model_img = $this->load->model('imgmodel');
        $select_imgcolor_product = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
        $tbl_imgcolor_product = 'tbl_imgcolor, tbl_imgcolor_product';
        $cond_imgcolor = 'tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor';
        $imgcolors = $model_img->img($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        $output .= '
        <div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px;" id="load_product_admin">
            <table class="table1 align-middle table_user" style="overflow: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Ảnh khác</th>
                        <th>Nhân viên</th>
                        <th>Nhãn hiệu</th>
                        <th>Loại hàng</th>
                        <th>Ngày đăng tải</th>
                        <th>Tình trạng</th>
                        <th>Số lượng bán</th>
                        <th>Ngày sửa đổi</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead> 
                <tbody>';
        if ($products) {
            $i = 0;
            foreach ($products as $key => $product) {
                $i++;
                $output .= '
                            <tr>
                                <td>' . $i . '</td>
                                <td>' . $product['product_name'] . '</td>
                                <td>' . number_format($product['price']) . 'đ</td>
                                <td class="d-flex img_p ">
                                ';
                foreach ($imgcolors as $key => $img) {
                    if ($product['id_product'] == $img['id_product']) {
                        $output .= '                                        
                                        <span>
                                            <img src="' . BASE_URL . 'apps/uploads/' . $img['img_name'] . '" alt="">
                                        </span>';
                    }
                }
                $output .= '                                
                                </td>
                                <td>' . $product['staff_name'] . '</td>
                                <td>' . $product['brand'] . '</td>
                                <td>' . $product['category_name'] . '</td>
                                <td>' . $product['date_up'] . '</td>
                                <td>';
                if ($product['status'] == 2) {
                    $output .= 'Mới';
                } elseif ($product['status'] == 0) {
                    $output .= 'Giảm giá';
                } else {
                    $output .= 'Không hiển thị';
                }
                $output .= '
                                </td>';


                $output .= '<td>' . $product['sell'] . '</td>';

                $output .= '
                                
                                <td>' . $product['date_update'] . '</td>
                                <td><a href="' . BASE_URL . 'product/detail_product/' . $product['id_product'] . '"><i class="far fa-eye"></i></a></td>
                                <td><a href="' . BASE_URL . 'product/editproduct/' . $product['id_product'] . '"><i class="far fa-edit"></i></a></td>
                                <td><a href="' . BASE_URL . 'product/delete_product/' . $product['id_product'] . '"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                        ';
            }
        }
        $output .= '
                    </tbody>
                </table>
    
            </div>
            <div>
            <nav class="mt-3" aria-label="...">
            <ul class="pagination pag pagination-sm">
            ';
        $count_product = $model_product->count($cond);
        $total_pages = ceil($count_product[0]['counts'] / $limit);
        for ($x = 1; $x <= $total_pages; $x++) {
            if ($x == $page) {
                $class_name = "active";
            } else {
                $class_name = "";
            }
            $output .= '
    
                                <li class="page-item ' . $class_name . '"><a id="' . $x . '" class="page-link" href="">' . $x . '</a></li>
                          ';
        }
        $output .= '
                </ul>
                </nav>
            </div>
            ';
        return $output;
    }
    public function sell_product_sort($cond, $page, $limit, $offset)
    {
        $sort = 'sell';
        $model_product = $this->load->model('productmodel');
        $products = $model_product->sell_product_sort($cond, $sort, $offset, $limit);
        $output = "";
        $model_img = $this->load->model('imgmodel');
        $select_imgcolor_product = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
        $tbl_imgcolor_product = 'tbl_imgcolor, tbl_imgcolor_product';
        $cond_imgcolor = 'tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor';
        $imgcolors = $model_img->img($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        $output .= '
        <div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px;" id="load_product_admin">
            <table class="table1 align-middle table_user" style="overflow: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Ảnh khác</th>
                        <th>Nhân viên</th>
                        <th>Nhãn hiệu</th>
                        <th>Loại hàng</th>
                        <th>Ngày đăng tải</th>
                        <th>Tình trạng</th>
                        <th>Số lượng bán</th>
                        <th>Ngày sửa đổi</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead> 
                <tbody>';
        if ($products) {
            $i = 0;
            foreach ($products as $key => $product) {
                $i++;
                $output .= '
                            <tr>
                                <td>' . $i . '</td>
                                <td>' . $product['product_name'] . '</td>
                                <td>' . number_format($product['price']) . 'đ</td>
                                <td class="d-flex img_p ">
                                ';
                foreach ($imgcolors as $key => $img) {
                    if ($product['id_product'] == $img['id_product']) {
                        $output .= '                                        
                                        <span>
                                            <img src="' . BASE_URL . 'apps/uploads/' . $img['img_name'] . '" alt="">
                                        </span>';
                    }
                }
                $output .= '                                
                                </td>
                                <td>' . $product['staff_name'] . '</td>
                                <td>' . $product['brand'] . '</td>
                                <td>' . $product['category_name'] . '</td>
                                <td>' . $product['date_up'] . '</td>
                                <td>';
                if ($product['status'] == 2) {
                    $output .= 'Mới';
                } elseif ($product['status'] == 0) {
                    $output .= 'Giảm giá';
                } else {
                    $output .= 'Không hiển thị';
                }
                $output .= '
                                </td>';


                $output .= '<td>' . $product['sell'] . '</td>';

                $output .= '
                                
                                <td>' . $product['date_update'] . '</td>
                                <td><a href="' . BASE_URL . 'product/detail_product/' . $product['id_product'] . '"><i class="far fa-eye"></i></a></td>
                                <td><a href="' . BASE_URL . 'product/editproduct/' . $product['id_product'] . '"><i class="far fa-edit"></i></a></td>
                                <td><a href="' . BASE_URL . 'product/delete_product/' . $product['id_product'] . '"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                        ';
            }
        }
        $output .= '
                    </tbody>
                </table>
    
            </div>
            <div>
            <nav class="mt-3" aria-label="...">
            <ul class="pagination pag pagination-sm">
            ';
        $count_product = $model_product->count($cond);
        $total_pages = ceil($count_product[0]['counts'] / $limit);
        for ($x = 1; $x <= $total_pages; $x++) {
            if ($x == $page) {
                $class_name = "active";
            } else {
                $class_name = "";
            }
            $output .= '
    
                                <li class="page-item ' . $class_name . '"><a id="' . $x . '" class="page-link" href="">' . $x . '</a></li>
                          ';
        }
        $output .= '
                </ul>
                </nav>
            </div>
            ';
        return $output;
    }


    public function new_product_sort($cond, $page, $limit, $offset)
    {
        $sort = 'date_up';
        $model_product = $this->load->model('productmodel');
        $products = $model_product->sell_product_sort($cond, $sort, $offset, $limit);
        $output = "";
        $model_img = $this->load->model('imgmodel');
        $select_imgcolor_product = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
        $tbl_imgcolor_product = 'tbl_imgcolor, tbl_imgcolor_product';
        $cond_imgcolor = 'tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor';
        $imgcolors = $model_img->img($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        $output .= '
        <div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px;" id="load_product_admin">
            <table class="table1 align-middle table_user" style="overflow: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Ảnh khác</th>
                        <th>Nhân viên</th>
                        <th>Nhãn hiệu</th>
                        <th>Loại hàng</th>
                        <th>Ngày đăng tải</th>
                        <th>Tình trạng</th>
                        <th>Số lượng bán</th>
                        <th>Ngày sửa đổi</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead> 
                <tbody>';
        if ($products) {
            $i = 0;
            foreach ($products as $key => $product) {
                $i++;
                $output .= '
                            <tr>
                                <td>' . $i . '</td>
                                <td>' . $product['product_name'] . '</td>
                                <td>' . number_format($product['price']) . 'đ</td>
                                <td class="d-flex img_p ">
                                ';
                foreach ($imgcolors as $key => $img) {
                    if ($product['id_product'] == $img['id_product']) {
                        $output .= '                                        
                                        <span>
                                            <img src="' . BASE_URL . 'apps/uploads/' . $img['img_name'] . '" alt="">
                                        </span>';
                    }
                }
                $output .= '                                
                                </td>
                                <td>' . $product['staff_name'] . '</td>
                                <td>' . $product['brand'] . '</td>
                                <td>' . $product['category_name'] . '</td>
                                <td>' . $product['date_up'] . '</td>
                                <td>';
                if ($product['status'] == 2) {
                    $output .= 'Mới';
                } elseif ($product['status'] == 0) {
                    $output .= 'Giảm giá';
                } else {
                    $output .= 'Không hiển thị';
                }
                $output .= '
                                </td>';


                $output .= '<td>' . $product['sell'] . '</td>';

                $output .= '
                                
                                <td>' . $product['date_update'] . '</td>
                                <td><a href="' . BASE_URL . 'product/detail_product/' . $product['id_product'] . '"><i class="far fa-eye"></i></a></td>
                                <td><a href="' . BASE_URL . 'product/editproduct/' . $product['id_product'] . '"><i class="far fa-edit"></i></a></td>
                                <td><a href="' . BASE_URL . 'product/delete_product/' . $product['id_product'] . '"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                        ';
            }
        }
        $output .= '
                    </tbody>
                </table>
    
            </div>
            <div>
            <nav class="mt-3" aria-label="...">
            <ul class="pagination pag pagination-sm">
            ';
        $count_product = $model_product->count($cond);
        $total_pages = ceil($count_product[0]['counts'] / $limit);
        for ($x = 1; $x <= $total_pages; $x++) {
            if ($x == $page) {
                $class_name = "active";
            } else {
                $class_name = "";
            }
            $output .= '

                            <li class="page-item ' . $class_name . '"><a id="' . $x . '" class="page-link" href="">' . $x . '</a></li>
                      ';
        }
        $output .= '
                </ul>
                </nav>
            </div>
            ';
        return $output;
    }
    public function livesearch()
    {
        if (isset($_POST['inputValue'])) {
            $tbl = 'tbl_product';
            $model = $this->load->model('productmodel');
            $select = 'tbl_product.product_name, tbl_product.id_product';
            $search = $_POST['inputValue'];
            $cond = "tbl_product.product_name";
            $product = $model->livesearch($select, $tbl, $cond, $search);
            if ($product) {
                foreach ($product as $key => $value) {
                    echo  '<p style="background-color:#fff">' . $value['product_name'] . '<input type="text" value="' . $value['id_product'] . '" name="" class="id" hidden></p>';
                }
            } else {
                echo "<p tyle='background-color:#fff'>Không tìm thấy kết quả nào</p>";
            }
        }
    }
    public function search_product_admin()
    {
        if (isset($_POST['id_product'])) {
            $id_product = $_POST['id_product'];
            $cond = "AND tbl_product.id_product = '$id_product'";
            $sort = 'sell';
            $offset = 0;
            $limit = 1;
            $model_product = $this->load->model('productmodel');
            $products = $model_product->sell_product_sort($cond, $sort, $offset, $limit);
            $output = "";
            $model_img = $this->load->model('imgmodel');
            $select_imgcolor_product = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
            $tbl_imgcolor_product = 'tbl_imgcolor, tbl_imgcolor_product';
            $cond_imgcolor = 'tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor';
            $imgcolors = $model_img->img($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
            $output .= '
        <div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px;" id="load_product_admin">
            <table class="table1 align-middle table_user" style="overflow: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Ảnh khác</th>
                        <th>Nhân viên</th>
                        <th>Nhãn hiệu</th>
                        <th>Loại hàng</th>
                        <th>Ngày đăng tải</th>
                        <th>Tình trạng</th>
                        <th>Số lượng bán</th>
                        <th>Ngày sửa đổi</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead> 
                <tbody>';
            if ($products) {
                $i = 0;
                foreach ($products as $key => $product) {
                    $i++;
                    $output .= '
                            <tr>
                                <td>' . $i . '</td>
                                <td>' . $product['product_name'] . '</td>
                                <td>' . number_format($product['price']) . 'đ</td>
                                <td class="d-flex img_p ">
                                ';
                    foreach ($imgcolors as $key => $img) {
                        if ($product['id_product'] == $img['id_product']) {
                            $output .= '                                        
                                        <span>
                                            <img src="' . BASE_URL . 'apps/uploads/' . $img['img_name'] . '" alt="">
                                        </span>';
                        }
                    }
                    $output .= '                                
                                </td>
                                <td>' . $product['staff_name'] . '</td>
                                <td>' . $product['brand'] . '</td>
                                <td>' . $product['category_name'] . '</td>
                                <td>' . $product['date_up'] . '</td>
                                <td>';
                    if ($product['status'] == 2) {
                        $output .= 'Mới';
                    } elseif ($product['status'] == 0) {
                        $output .= 'Giảm giá';
                    } else {
                        $output .= 'Không hiển thị';
                    }
                    $output .= '
                                </td>';


                    $output .= '<td>' . $product['sell'] . '</td>';

                    $output .= '
                                
                                <td>' . $product['date_update'] . '</td>
                                <td><a href="' . BASE_URL . 'product/detail_product/' . $product['id_product'] . '"><i class="far fa-eye"></i></a></td>
                                <td><a href="' . BASE_URL . 'product/editproduct/' . $product['id_product'] . '"><i class="far fa-edit"></i></a></td>
                                <td><a href="' . BASE_URL . 'product/delete_product/' . $product['id_product'] . '"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                        ';
                }
            }
            $output .= '
                    </tbody>
                </table>
    
            </div>
            <div>
            </div>
            ';
            echo $output;
        }
    }
}
