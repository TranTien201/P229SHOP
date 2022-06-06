<?php
class index extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->homepage();
    }
    public function footer($data = array())
    {
        $select = 'tbl_class_instruct.*, tbl_page_instruct.*';
        $tbl = 'tbl_class_instruct, tbl_page_instruct';
        $cond = "tbl_page_instruct.id_page = tbl_class_instruct.id_page AND tbl_page_instruct.page = 'homepage'";
        $model = $this->load->model('introducemodel');
        $data['introduces'] = $model->select($select, $tbl, $cond);
        $select_imgcolor_product = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
        $tbl_imgcolor_product = 'tbl_imgcolor, tbl_imgcolor_product';
        $cond_imgcolor = "tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor";
        $data['imgother'] = $model->select($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        $tbl = 'tbl_contact';
        $data['contacts'] = $model->selectnormal($tbl);
        $this->load->view('footer', $data);
    }
    public function header()
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
    public function profile()
    {
        $this->header();
        $this->slide();
        $id_user = Session::get('id');
        $model = $this->load->model('mainmodel');
        $select = '*';
        $tbl = 'tbl_login';
        $cond = "id = '$id_user'";
        $data['user'] = $model->select($select, $tbl, $cond);
        $this->load->view('profile', $data);
        $this->load->view('contact');
        $this->footer();
    }
    public function homepage()
    {
        $this->header();
        $this->slide();
        // select product new
        $model_product = $this->load->model('productmodel');

        $tbl_product = 'tbl_product';
        $cond_new = 'status = 2';
        $data['newproduct'] = $model_product->topproduct($tbl_product, $cond_new);
        // select product sale
        $cond_sale = "tbl_discount.id_discount = tbl_discount_product.id_discount AND tbl_product.id_product = tbl_discount_product.id_product AND tbl_product.status = 0 AND tbl_discount.status = 1";
        $table = 'tbl_product, tbl_discount, tbl_discount_product';
        $data['saleproduct'] = $model_product->saleproduct($table, $cond_sale);
        $model_img = $this->load->model('imgmodel');
        // select img other by id_product 
        $select_imgcolor_product = 'tbl_imgcolor.*, tbl_imgcolor_product.*';
        $tbl_imgcolor_product = 'tbl_imgcolor, tbl_imgcolor_product';
        $cond_imgcolor = "tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor";
        $data['imgother'] = $model_img->img($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        $data['imgproduct'] = $model_img->imggroupbyid($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        // select product sell 
        $data['sellproduct'] = $model_product->topsellproduct();
        // select discount 
        $model = $this->load->model('mainmodel');
        $select_discount_product = 'tbl_discount.*, tbl_discount_product.*';
        $tbl_discount_product = 'tbl_discount, tbl_discount_product';
        $cond_discount_product = 'tbl_discount.id_discount = tbl_discount_product.id_discount AND tbl_discount.status = 1';
        $data['discounts'] = $model->select($select_discount_product, $tbl_discount_product, $cond_discount_product);
        $this->load->view('homepage', $data);
        $this->load->view('contact');
        $this->footer();
    }
    public function detailproduct($id)
    {
        $this->header();
        $this->slide();
        $model_product = $this->load->model('productmodel');
        $model = $this->load->model('mainmodel');
        $model_img = $this->load->model('imgmodel');
        // select img other by id img
        $select_imgcolor = 'tbl_imgcolor.*, tbl_imgcolor_product.*, tbl_product.*';
        $tbl_imgcolor = 'tbl_imgcolor, tbl_imgcolor_product, tbl_product';
        $cond_img = "tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor AND tbl_imgcolor_product.id_product = '$id'";
        $data['imgcolor'] = $model_img->img($select_imgcolor, $tbl_imgcolor, $cond_img);
        $id_product = $data['imgcolor'][0]['id_product'];
        // select imgother
        $select_imgcolor_product = 'tbl_imgcolor.*, tbl_product.*';
        $tbl_imgcolor_product = 'tbl_imgcolor_product, tbl_product, tbl_imgcolor';
        $cond_imgcolor = "tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor AND tbl_imgcolor_product.id_product = tbl_product.id_product AND tbl_product.id_product = '$id'";
        $data['imgcolors'] = $model_img->img($select_imgcolor_product, $tbl_imgcolor_product, $cond_imgcolor);
        $tbl_product = 'tbl_product,tbl_category, tbl_brand';
        $cond = "tbl_product.id_brand = tbl_brand.id_brand AND tbl_product.id_category = tbl_category.id_category AND tbl_product.id_product='$id'";
        $data['products'] = $model_product->product($tbl_product, $cond);
        // select imgdesc
        $select_imgdesc_product = 'tbl_imgdesc.*, tbl_imgcolor_product.id_product';
        $tbl_imgdesc_product = 'tbl_imgdesc,tbl_img, tbl_imgcolor, tbl_imgcolor_product';
        $cond_imgdesc_product = "tbl_imgdesc.id_imgdesc = tbl_img.id_imgdesc AND tbl_img.id_imgcolor = tbl_imgcolor.id_imgcolor AND tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor AND tbl_imgcolor_product.id_product = '$id'";
        $data['imgdescs'] = $model_img->img($select_imgdesc_product, $tbl_imgdesc_product, $cond_imgdesc_product);
        $data['discountproduct'] = 0;
        if ($data['products'][0]['status'] == 0) {
            $select_discount_product = 'tbl_product.price, tbl_discount.*';
            $tbl_discount_product = 'tbl_discount_product, tbl_product, tbl_discount';
            $cond_discount_product = "tbl_product.id_product = tbl_discount_product.id_product AND tbl_discount.id_discount = tbl_discount_product.id_discount AND tbl_product.id_product = '$id' AND tbl_discount.status = 1;";
            $data['discountproduct'] = $model->select($select_discount_product, $tbl_discount_product, $cond_discount_product);
        } else {
            $data['discountproduct'] = 0;
        }
        $cond_avg_star = "tbl_comment.id_product = '$id' AND parent_id_comment = 0;";
        $data['avgStar'] = $model_product->avgStar($cond_avg_star);
        $cond_comment = "tbl_comment.id_product = '$id'";
        $data['countComment'] = $model_product->getComment($cond_comment);
        $this->load->view('detail_product', $data);
        $this->footer($data);
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
                    <img style="width: 100%; height: 100%;" src="' . BASE_URL . 'apps/uploads/' . $value['name_imgdesc'] . '" alt="">
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
                data-id4=' . $value['quantity'] . ' style="margin-bottom: 10px;">
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
        } elseif ($data[0]['quantity'] <= 15 && $data[0]['quantity'] !=0) {
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

    public function detailproductbyname()
    {
        $this->header();
        $this->slide();
        $model_product = $this->load->model('productmodel');
        $model = $this->load->model('mainmodel');
        $model_img = $this->load->model('imgmodel');
        $product_name = $_POST['product_name'];
        $id = $_POST['id_product'];
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
        $tbl_product = 'tbl_product,tbl_category, tbl_brand';
        $cond = "tbl_product.id_brand = tbl_brand.id_brand AND tbl_product.id_category = tbl_category.id_category AND tbl_product.id_product='$id_product'";
        $data['products'] = $model_product->product($tbl_product, $cond);
        $select_imgdesc_product = 'tbl_imgdesc.*, tbl_imgcolor_product.id_product';
        $tbl_imgdesc_product = 'tbl_imgdesc,tbl_img, tbl_imgcolor, tbl_imgcolor_product';
        $cond_imgdesc_product = "tbl_imgdesc.id_imgdesc = tbl_img.id_imgdesc AND tbl_img.id_imgcolor = tbl_imgcolor.id_imgcolor AND tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor AND tbl_imgcolor_product.id_product = '$id'";
        $data['imgdescs'] = $model_img->img($select_imgdesc_product, $tbl_imgdesc_product, $cond_imgdesc_product);
        $data['discountproduct'] = 0;
        if ($data['products'][0]['status'] == 0) {
            $select_discount_product = 'tbl_product.price, tbl_discount.*';
            $tbl_discount_product = 'tbl_discount_product, tbl_product, tbl_discount';
            $cond_discount_product = "tbl_product.id_product = tbl_discount_product.id_product AND tbl_discount.id_discount = tbl_discount_product.id_discount AND tbl_product.id_product = '$id' AND tbl_discount.status = 1;";
            $data['discountproduct'] = $model->select($select_discount_product, $tbl_discount_product, $cond_discount_product);
        } else {
            $data['discountproduct'] = 0;
        }
        $cond_avg_star = "tbl_comment.id_product = '$id' AND parent_id_comment = 0;";
        $data['avgStar'] = $model_product->avgStar($cond_avg_star);
        $cond_comment = "tbl_comment.id_product = '$id'";
        $data['countComment'] = $model_product->getComment($cond_comment);
        $this->load->view('detail_product', $data);
        $this->footer();
    }
}
