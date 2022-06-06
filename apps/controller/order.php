<?php
class order extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->header();
        $model = $this->load->model('ordermodel');
        $tbl = 'tbl_order';
        $data['orders'] = $model->listorder($tbl);
        $this->load->view('admin/list_order', $data);
        $this->load->view('admin/footer');
    }
    public function footer()
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
    public function payment_details($id)
    {
        $this->header_home();
        $this->slide();
        $select = 'tbl_order.*, tbl_order_details.*';
        $tbl = 'tbl_order, tbl_order_details';
        $cond = "tbL_order.id_order = tbl_order_details.id_order AND tbl_order.id_order = '$id'";
        $model = $this->load->model('mainmodel');
        $data['orderbyid'] = $model->select($select, $tbl, $cond);
        $this->load->view('order_detail', $data);
        $this->load->view('contact');
        $this->footer();
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
    public function update($id)
    {
        $order_status = $_POST['order_status'];
        $tbl = 'tbl_order';
        $data = array(
            'order_status' => $order_status
        );
        $cond = "tbl_order.id_order = '$id'";
        $model = $this->load->model('mainmodel');
        $result = $model->edit($tbl, $data, $cond);
        if ($result) {
            $mess['message'] = 'Thay đổi thành công';
            header('Location: ' . BASE_URL . 'order?message=' . urldecode(serialize($mess)));
        }
    }
    public function delete($id)
    {
        $tbl = 'tbl_order';
        $cond = "id_order = '$id'";
        $tbl_order_details = 'tbl_order_details';
        $cond_tbl_order_details = "id_order = '$id'";
        $model = $this->load->model('mainmodel');
        $result1 = $model->delete($tbl_order_details, $cond_tbl_order_details);
        $result = $model->delete($tbl, $cond);
        if ($result) {
            $mess['message'] = 'Xóa đơn hàng thành công';
            header('Location: ' . BASE_URL . 'order?message=' . urldecode(serialize($mess)));
        }
    }
    public function orderdetail($id)
    {
        $select = 'tbl_order.*, tbl_order_details.*';
        $tbl = 'tbl_order, tbl_order_details';
        $cond = "tbL_order.id_order = tbl_order_details.id_order AND tbl_order.id_order = '$id'";
        $model = $this->load->model('mainmodel');
        $data['orderbyid'] = $model->select($select, $tbl, $cond);
        $this->header();
        $this->load->view('admin/order_detail', $data);
        $this->load->view('admin/footer');
    }
    public function voucher($id)
    {
        $this->header_home();
        $this->slide();
        $username = Session::get('username');
        $data['user'] = array(
            'username' => $username
        );
        $select = 'tbl_voucher.*, tbl_login.*';
        $tbl = 'tbl_voucher, tbl_login';
        $cond = "tbl_voucher.id_user = tbl_login.id AND tbl_login.id = '$id'";
        $model = $this->load->model('mainmodel');
        $data['promotos'] = $model->select($select, $tbl, $cond);
        $this->load->view('list_promoto', $data);
        $this->load->view('contact');
        $this->footer();
    }
    public function history_payment()
    {
        $this->header_home();
        $this->slide();
        $model = $this->load->model('mainmodel');
        $tbl = 'tbl_order';
        $select = '*';
        $username = Session::get('username');
        $cond = "username = '$username'";
        $id_user = Session::get('id');
        $data['user'] = array(
            'id_user' => $id_user,
            'username' => $username
        );
        $data['orders'] = $model->select($select, $tbl, $cond);
        $this->load->view('list_order', $data);
        $this->load->view('contact');
        $this->footer();
    }
    public function load_order_user()
    {
        Session::init();
        $output = "";
        if (isset($_POST['action'])) {
            $model = $this->load->model('mainmodel');
            $tbl = 'tbl_order';
            $select = '*';
            $username = Session::get('username');
            $cond = "username = '$username'";
            $limit = 10;
            $page = 1;
            if (isset($_POST['page_no'])) {
                $page = $_POST['page_no'];
            }
            $offset = ($page - 1) * $limit;
            $sort = 'date';
            $data = $model->selectlimitsortdesc($select, $tbl, $cond, $sort, $offset, $limit);

            $output .= '<div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px;">
                <table class="table1 align-middle table_user" style="overflow: auto;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Đơn hàng</th>
                            <th>Thời gian</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Tên người nhận</th>
                            <th>Số điện thoại người nhận</th>
                            <th>Quốc gia</th>
                            <th>Tỉnh / Thành phố</th>
                            <th>Quận / huyện</th>
                            <th>Địa chỉ</th>
                            <th>Tiền</th>
                            <th>Tình trạng</th>
                            <th></th>
                        </tr>
                    </thead> 
                    <tbody>';
            if ($data) {
                $i = 0;
                foreach ($data as $key => $value) {
                    $i++;
                    $output .= '
                        <tr>
                            <td>#' . $i . '</td>
                            <td>#' . $value['id_order'] . '</td>
                            <td>' . $value['date'] . '</td>
                            <td>' . $value['username'] . '</td>
                            <td>' . $value['sender_phone'] . '</td>
                            <td>' . $value['email'] . '</td>
                            <td>' . $value['receiver_name'] . '</td>
                            <td>' . $value['receiver_phone'] . '</td>
                            <td>' . $value['country'] . '</td>
                            <td>' . $value['city'] . '</td>
                            <td>' . $value['district'] . '</td>
                            <td>' . $value['address'] . '</td>  
                            <td>' . $value['total'] . '</td> 
                            <td>' . $value['order_status'] . '</td> 
                            <td><a href="' . BASE_URL . 'order/payment_details/' . $value['id_order'] . '" class="btn btn-success">Xem</a></td>
                        </tr>
                    ';
                }
            }
            $output .= '</tbody>
            </table>
        </div>
        <div>
            <nav class="mt-3" aria-label="...">
                <ul class="pagination pagination-sm ">';
            $count = 'id_order';
            $counts = $model->count($count, $tbl, $cond);
            $total_pages = ceil($counts[0]['count'] / $limit);
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
            echo $output;
        }
    }
}
