<?php
class cart extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function header()
    {
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
    public function addproducttocart()
    {
        Session::init();
        $img_name = $_POST['img_name'];
        $name_img = str_replace('%20', ' ', $img_name);
        $size = $_POST['id_size'];
        $product_name = $_POST['product_name'];
        $price = 0;
        $quantity = $_POST['quantity'];
        $id = $_POST['id_img_size'];
        $quantity_max = $_POST['quantity_max'];
        $discount = $_POST['discount'];
        if ($discount == 0) {
            $price = $_POST['price'];
        } else {
            $price = $_POST['price'] - $_POST['price'] * $discount * 0.01;
        }
        if (isset($_SESSION["shopping_cart"])) {
            $avaiable = 0;
            echo $avaiable;
            foreach ($_SESSION["shopping_cart"] as $key => $value) {
                if ($_SESSION["shopping_cart"][$key]['id'] == $id) {
                    $avaiable++;
                    $_SESSION["shopping_cart"][$key]['quantity'] = $_SESSION["shopping_cart"][$key]['quantity']  + $quantity;
                }
            }
            if ($avaiable == 0) {
                $item = array(
                    'img_name' => $name_img,
                    'product_name' => $product_name,
                    'size' => $size,
                    'price' => $price,
                    'quantity' => $quantity,
                    'id' => $id,
                    'quantity_max' => $quantity_max
                );
                $_SESSION["shopping_cart"][] = $item;
            }
        } else {
            $item = array(
                'img_name' => $name_img,
                'product_name' => $product_name,
                'size' => $size,
                'price' => $price,
                'quantity' => $quantity,
                'id' => $id,
                'quantity_max' => $quantity_max
            );
            $_SESSION["shopping_cart"][] = $item;
        }
        header("Location:" . BASE_URL . 'cart/productcart');
    }
    public function productcart()
    {
        Session::init();
        $username = Session::get('username');
        $email = Session::get('email');
        $phone = Session::get('phone');
        $data['user'] = array(
            'username' => "$username",
            'email' => "$email",
            'phone' => "$phone"
        );
        $model = $this->load->model('mainmodel');
        $tbl = 'tbl_country';
        $data['countries'] = $model->selectnormal($tbl);
        $id_user = Session::get('id');
        $select = '*';
        $tbl_voucher = 'tbl_voucher';
        $cond_voucher = "id_user = '$id_user'";
        $data['vouchers'] = $model->select($select, $tbl_voucher, $cond_voucher);
        $this->header();
        $this->slide();
        $this->load->view('cart', $data);
        $this->load->view('contact');
        $this->footer();
    }
    public function updatecart()
    {
        Session::init();
        if (isset($_POST['delete_cart'])) {
            if (isset($_SESSION['shopping_cart'])) {
                foreach ($_SESSION["shopping_cart"] as $key => $value) {
                    if ($_SESSION["shopping_cart"][$key]['id'] ==  $_POST['delete_cart']) {
                        unset($_SESSION["shopping_cart"][$key]);
                        header("Location:" . BASE_URL . 'cart/productcart');
                    }
                }
            } else {
                header('Location: ' . BASE_URL);
            }
        } else {
            foreach ($_POST['qty'] as $key => $qty) {
                foreach ($_SESSION["shopping_cart"] as $session => $value) {
                    if ($value['id'] == $key && $qty >= 1) {
                        $_SESSION["shopping_cart"][$session]["quantity"] = $qty;
                    } elseif ($value['id'] == $key && $qty <= 0) {
                        unset($_SESSION["shopping_cart"][$session]);
                    }
                }
            }
            header("Location:" . BASE_URL . 'cart/productcart');
            // if (isset($_SESSION['shopping_cart'])) {
            //     foreach ($_SESSION["shopping_cart"] as $key => $value) {
            //         if ($value['img_name'] == $_POST['img_name'] && $value['size'] == $_POST['size']) {
            //             unset($_SESSION["shopping_cart"][$key]);
            //             header("Location:" . BASE_URL . 'cart/productcart');
            //         }
            //     }
            // } else {
            //     header('Location: ' . BASE_URL);
            // }
        }
    }
    public function register_user()
    {
        $email = filter_input(INPUT_POST, 'email');
        $username = filter_input(INPUT_POST, 'username');
        $phone = filter_input(INPUT_POST, 'phone');
        $password =  $_POST['user_password'];
        $re_password = md5(filter_input(INPUT_POST, 're_password'));
        $code = 0;
        if ($password != $re_password) {
            $mess['msg'] = 'Mật khẩu không trùng khớp';
            header('Location: ' . BASE_URL . 'cart?msg=' . urldecode(serialize($mess)));
        }
        $table = 'tbl_login';
        $data = array(
            'email' => "$email",
            'password' => "$password",
            'username' => "$username",
            'phone' => "$phone",
            'code' => "$code",
            'type' => "0"
        );
        $res_model = $this->load->model('loginmodel');
        $result = $res_model->insert_user($table, $data);
        if ($result) {
            Session::init();
            Session::set('login_user', true);
            Session::set('username', $username);
            Session::set('phone', $phone);
            Session::set('email', $email);
            header("Location:" . BASE_URL . "cart/productcart");
        } else {
            $mess['msg'] = 'Đăng ký không thành công';
            header('Location: ' . BASE_URL . 'cart/productcart?msg=' . urldecode(serialize($mess)));
        }
    }
    public function getCode()
    {
        Session::init();
        if (Session::get('code')) {
            Session::unset('code');
            $email = $_POST['email'];
            $username = $_POST['username'];
            $code = rand(1000, 9999);
            Session::set('code', $code);
            $mail = new sendmail();
            $result_mail = $mail->getCodePayment($email, $username, $code);
            echo '<small style="color: #fff; font-size: 14px;">(*) Vào email của tài khoản này để lấy mã xác nhận</small>';
        } else {
            $email = $_POST['email'];
            $username = $_POST['username'];
            $code = rand(1000, 9999);
            Session::set('code', $code);
            $mail = new sendmail();
            $result_mail = $mail->getCodePayment($email, $username, $code);
            echo '<small style="color: #fff; font-size: 14px;">(*) Vào email của tài khoản này để lấy mã xác nhận</small>';
        }
    }
    public function generate_string($input, $strength = 16)
    {
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
    public function payment()
    {
        $model = $this->load->model('mainmodel');
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $voucher = '';
        Session::init();
        $code = Session::get('code');
        $id_user = Session::get('id');
        $payment_code = $_POST['payment_code'];
        if ($code == $payment_code && $code != '') {
            $id_order = rand(1000, 99999);
            date_default_timezone_set('asia/ho_chi_minh');
            $voucher_total = 0;
            $id_voucher = $_POST['voucher'];
            $select_voucher = '*';
            $tbl_voucher = 'tbl_voucher';
            $cond_voucher = "id_voucher = '$id_voucher'";
            $vouchers = $model->select($select_voucher, $tbl_voucher, $cond_voucher);
            if ($vouchers) {
                $voucher_total = $vouchers[0]['total'];
                $result = $model->delete($tbl_voucher, $cond_voucher);
            } else {
                $voucher = 0;
            }
            $date = date("Y-m-j");
            $hour = date("h:i:sa");
            $sender_name = $_POST['sender_name'];
            $sender_phone = $_POST['sender_phone'];
            $email = Session::get('email');
            $recipient_name = $_POST['recipient_name'];
            $recipient_phone = $_POST['recipient_phone'];
            $country = $_POST['country'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $address = $_POST['address'];
            $username = Session::get('username');
            $price = $_POST['price'];
            $select_state = '*';
            $tbl_state = 'tbl_state';
            $cond_state = "state = '$district'";
            $data['totals'] = $model->select($select_state, $tbl_state, $cond_state);
            if ($price > 2500000) {
                $total = $price - $voucher_total;
            } else {
                $total = $data['totals'][0]['total'] + $price - $voucher_total;
            }
            $data = array(
                'id_order' => "$id_order",
                'day' => $date,
                'hour' => $hour,
                'date' => $date . ' - ' . $hour,
                'sender_phone' => "$sender_phone",
                'sender_name' => "$sender_name",
                'email' => "$email",
                'receiver_name' => "$recipient_name",
                'receiver_phone' => "$recipient_phone",
                'country' => "$country",
                'city' => "$city",
                'district' => "$district",
                'address' => "$address",
                'total' => "$total",
                'username' => "$username",
                'order_status' => 'Mới'
            );
            $tbl_order = 'tbl_order';
            $result_order = $model->insert($tbl_order, $data);
            if ($result_order) {
                Session::unset('code');
                $tbl_order_details = 'tbl_order_details';
                $tbl_img_size = 'tbl_img_size';
                $select_img_size = '*';
                if (Session::get("shopping_cart") == true) {
                    foreach (Session::get("shopping_cart") as $key => $value) {
                        $order = array(
                            'id_img_size' => $value['id'],
                            'id_order' => $id_order,
                            'product_img' => $value['img_name'],
                            'product_size' => $value['size'],
                            'product_name' => $value['product_name'],
                            'quantity' => $value['quantity'],

                        );
                        $model->insert($tbl_order_details, $order);
                        $id = $value['id'];
                        $cond = "tbl_img_size.id = '$id'";
                        $getQuantity = $model->select($select_img_size, $tbl_img_size, $cond);
                        $sell = $getQuantity[0]['sell'];
                        $update = array(
                            'quantity' => $value['quantity_max'] - $value['quantity'],
                            'sell' => $value['quantity'] + $sell
                        );
                        $model->edit($tbl_img_size, $update, $cond);
                    }
                    unset($_SESSION['shopping_cart']);
                }
                if ($total > 4000000) {
                    $tbl_voucher = 'tbl_voucher';

                    $voucher = $this->generate_string($permitted_chars, 12);
                    $data_voucher = array(
                        'code_voucher' => $voucher,
                        'total' => 100000,
                        'id_user' => $id_user
                    );
                    $vouchers = $model->insert($tbl_voucher, $data_voucher);
                }
                $note = array(
                    'email' => $email,
                    'username' => $sender_name,
                    'id_order' => $id_order,
                    'total' => $total,
                    'date' => $date . ' ' . $hour,
                    'code' => $voucher,
                    'price' => 100000
                );
                $this->notification($note);
                //     $mess = '                    <table class="table card-text " style="color: #000000 !important;">
                //     <tbody>
                //         <tr>
                //             <th class="py-4">Mã đơn hàng</th>
                //             <td class="py-4"><span class="place_price">#' . $id_order . '</span>
                //             </td>
                //         </tr>
                //         <tr>
                //             <th class="py-4">
                //                 Khách hàng</th>
                //             <td class="py-4"><span class="place_price">' . $username . '</span></td>
                //         </tr>
                //         <tr>
                //             <th class="py-4">
                //                 Tổng tiền</th>
                //             <td class="py-4"><span class="place_price">' . $total . '</span><span>đ</span></td>
                //         </tr>
                //         <tr>
                //             <th class="py-4">Thời gian</th>
                //             <td class="py-4"><span class="place_price">' . $date . ' ' . $hour . '</span>
                //             </td>
                //         </tr>
                //     </tbody>
                // </table>';
                //     $mail = new sendmail();
                //     $mail->sendInfoPayment($email, $username, $mess);
                $this->notification($note);
                // $mess['mess'] = 'Chúc mừng bạn đã thanh toán thành công!!! Cảm ơn quý khách';
                // header('Location: ' . BASE_URL . 'cart/productcart?mess=' . urldecode(serialize($mess)));
            }
        } else {
            Session::unset('code');
            $mess['message'] = 'Mã mua hàng không đúng !!!';
            header('Location: ' . BASE_URL . 'cart/productcart?message=' . urldecode(serialize($mess)));
        }
    }
    public function notification($data)
    {
        $this->header();
        $this->slide();
        $this->load->view('notification', $data);
        $this->load->view('contact');
        $this->footer();
    }
}
