<?php
class login extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->login_form();
    }
    public function logout()
    {
        Session::init();
        Session::set('login_user', false);
        Session::unset('username');
        Session::unset('phone');
        Session::unset('email');
        header("Location:" . BASE_URL . "login");
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
    public function adminpage()
    {
        $this->header();
        $model_order = $this->load->model('ordermodel');
        $data['totals'] = $model_order->total();
        $data['userOrder'] = $model_order->countUsername();
        $data['countOrder'] = $model_order->countOrder();
        $data['countAccount'] = $model_order->countAccount();
        $data['topOrder'] = $model_order->topOrder();
        $date = date('Y-m-j');
        // $newdate = strtotime('-1 month', strtotime($date));
        $getMonthNow = date('m');
        $getYearNow = date('Y');
        $data['totalMonth'] = array();
        $data['month_year'] = array();
        for($i = 0; $i <= 11; $i++) {
            $newdate = strtotime(" -$i month ", strtotime($date));
            $getMonth = date('m', $newdate);
            $getYear = date('Y', $newdate);
            $month_year = date('m/Y', $newdate);
            $totalMonth = $model_order->total_month($getMonth, $getYear);
            $total = 0;
            if($totalMonth[0]['total'] > 0) {
                $total = $totalMonth[0]['total'];
            }

            // print_r($totalMonth);
            array_unshift($data['totalMonth'], $total);
            array_unshift0($data['month_year'], $month_year);
            // print_r($data['saveTotal']);
        }
        $this->load->view('admin/admin_home', $data);
        $this->load->view('admin/footer', $data);
    }
    public function profile()
    {
        $this->header();
        $id_user = Session::get('id');
        $model = $this->load->model('mainmodel');
        $select = '*';
        $tbl = 'tbl_login';
        $cond = "id = '$id_user'";
        $data['user'] = $model->select($select, $tbl, $cond);
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/footer');
    }

    public function login_form()
    {
        $this->load->view('login_form');
    }
    public function homepage()
    {
        Session::init();
        $username = Session::get('username');
        $email = Session::get('email');
        $phone = Session::get('phone');
        $type = Session::get('type');
        $data = array(
            'username' => "$username",
            'email' => "$email",
            'phone' => "$phone",
            'type' => "$type"
        );

        $this->load->view('homepage', $data);
    }
    public function login_user()
    {
        $login_model = $this->load->model('loginmodel');
        $email = filter_input(INPUT_POST, 'email');
        $password = md5(filter_input(INPUT_POST, 'password'));

        $table = 'tbl_login';
        $result = $login_model->login_user($table, $email, $password);
        if ($result) {
            Session::init();
            Session::set('login_user', true);
            Session::set('username', $result[0]['username']);
            Session::set('email', $result[0]['email']);
            Session::set('phone', $result[0]['phone']);
            Session::set('type', $result[0]['type']);
            Session::set('id', $result[0]['id']);
            Session::set('img_profile', $result[0]['img_profile']);

            if ($result[0]['type'] == 1 || $result[0]['type'] == 2) {
                header("Location:" . BASE_URL . "login/adminpage");
            } else {
                header("Location:" . BASE_URL);
            }
        } else {
            $mess['msg'] = 'Tài khoản hoặc mật khẩu bị sai';
            header('Location: ' . BASE_URL . 'login/login_form?msg=' . urldecode(serialize($mess)));
        }
    }
    public function res_form()
    {
        $this->load->view('res_form');
    }
    public function res_user()
    {
        $email = filter_input(INPUT_POST, 'email');
        $username = filter_input(INPUT_POST, 'username');
        $password = md5(filter_input(INPUT_POST, 'password'));
        $re_password = md5(filter_input(INPUT_POST, 're_password'));
        $type = filter_input(INPUT_POST, 'type');
        $code = 0;
        if ($password != $re_password) {
            $mess['msg'] = 'Mật khẩu không trùng khớp';
            header('Location: ' . BASE_URL . 'login/res_form?msg=' . urldecode(serialize($mess)));
        }
        if ($type == NULL || $type == FALSE) {
            $type = 0;
        }
        $table = 'tbl_login';
        $data = array(
            'email' => "$email",
            'password' => "$password",
            'username' => "$username",
            'code' => "$code",
            'type' => "$type"
        );
        $res_model = $this->load->model('loginmodel');
        $result = $res_model->insert_user($table, $data);
        if ($result) {
            header("Location:" . BASE_URL . "login/login_form");
        } else {
            $mess['msg'] = 'Đăng ký không thành công';
            header('Location: ' . BASE_URL . 'login/res_form?msg=' . urldecode(serialize($mess)));
        }
    }
    public function res_form_admin()
    {
    }
    public function list_user()
    {
        $this->header();
        $list_user = $this->load->model('loginmodel');
        $table = 'tbl_login';
        $data['listuser'] = $list_user->list_user($table);
        $this->load->view('admin/list_account', $data);
        $this->load->view('admin/footer');
    }
    public function delete_account($id)
    {
        $model = $this->load->model('loginmodel');
        $table = 'tbl_login';
        $cond = "$table.id='$id'";
        $result = $model->delete_user($table, $cond);
        if ($result) {
            $mess['msg'] = "Xóa tài khoản thành công";
            header('Location: ' . BASE_URL . 'login/list_user?msg=' . urldecode(serialize($mess)));
        } else {
            $mess['msg'] = "Xóa tài khoản thất bại";
            header('Location: ' . BASE_URL . 'login/list_user?msg=' . urldecode(serialize($mess)));
        }
    }
    public function edit_account($id)
    {
        $model = $this->load->model('loginmodel');
        $table = 'tbl_login';
        $cond = "$table.id='$id'";
        $data['userbyid'] = $model->userbyid($table, $cond);
        $this->header();
        $this->load->view('admin/edit_account', $data);
        $this->load->view('admin/footer');
    }

    public function update_user($id)
    {
        $model = $this->load->model('loginmodel');
        $table = 'tbl_login';
        $cond = "$table.id='$id'";
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $username = $_POST['username'];
        $type = $_POST['type'];
        $data = array(
            'email' => "$email",
            'password' => "$password",
            'username' => "$username",
            'type' => "$type"
        );
        $result = $model->update($table, $data, $cond);
        if ($result == 1) {
            $mess['msg'] = "Cập nhập tài khoản thành công";
            header('Location: ' . BASE_URL . 'login/list_user?msg=' . urldecode(serialize($mess)));
        } else {
            $mess['msg'] = "Cập nhập tài khoản thất bại";
            header('Location: ' . BASE_URL . 'login/list_user?msg=' . urldecode(serialize($mess)));
        }
    }
    public function getpassform()
    {
        $this->load->view('email_form');
    }
    public function codemail()
    {
        $this->load->view('code_mail');
    }
    public function changepass()
    {
        $this->load->view('changepassword');
    }
    public function checkmail()
    {
        $email = filter_input(INPUT_POST, 'email');
        $model = $this->load->model('loginmodel');
        $table = 'tbl_login';
        $cond = "$table.email='$email'";
        $result = $model->check($table, $cond);
        if ($result) {
            $code = rand(111111, 999999);
            $data = array(
                'code' => "$code"
            );
            $model->update($table, $data, $cond);

            $mail = new sendmail();
            $result_mail = $mail->sendmailcode($email, $result[0]['username'], $code);
        } else {
            $mess['msg'] = "Email này không tồn tại. Yêu cầu bạn hãy nhập đúng !!!";
            header('Location: ' . BASE_URL . 'login/getpassform?msg=' . urldecode(serialize($mess)));
        }
    }
    // kiểm tra code để đổi mật khẩu
    public function checkcode()
    {
        $model = $this->load->model('loginmodel');
        $code = filter_input(INPUT_POST, 'code');
        $table = 'tbl_login';
        $cond = "$table.code='$code'";
        $result = $model->check($table, $cond);
        if ($result) {
            Session::init();
            Session::set('code', $code);
            $mess['msg'] = "Thay đổi mật khẩu";
            header('Location: ' . BASE_URL . 'login/changepass?msg=' . urldecode(serialize($mess)));
        } else {
            $code = rand(111111, 999999);
            $data = array(
                'code' => "$code"
            );
            $model->update($table, $data, $cond);
            $mess['code'] = "Mã này không đúng, bạn hãy vào gmail lấy code mới";
            header('Location: ' . BASE_URL . 'login/codemail?code=' . urldecode(serialize($mess)));
        }
    }
    public function change_password()
    {
        $password = md5(filter_input(INPUT_POST, 'password'));
        $re_password = md5(filter_input(INPUT_POST, 're_password'));
        if ($password != $re_password) {
            $mess['pass'] = "Mật khẩu không trùng nhau";
            header('Location: ' . BASE_URL . 'login/changepass?pass=' . urldecode(serialize($mess)));
        } else {
            Session::init();
            $code = Session::get('code');
            $model = $this->load->model('loginmodel');
            $table = 'tbl_login';
            $cond = "$table.code='$code'";
            $data = array(
                'password' => "$password",
                'code' => "0"
            );
            $result = $model->update($table, $data, $cond);
            if ($result) {
                Session::destroy();
                $mess['mess'] = "Đã thay đổi mật khẩu hãy đăng nhập nào !! ";
                header('Location: ' . BASE_URL . 'login/login_form?mess=' . urldecode(serialize($mess)));
            }
        }
    }

    public function register_user()
    {
        $res_model = $this->load->model('loginmodel');
        $password = $_POST['user_password'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $re_password = $_POST['re_password'];
        $id = rand(100, 10000);
        $pass = '';
        $code = 0;
        $table = 'tbl_login';
        $cond = "email = '$email'";
        $checkmail = $res_model->userbyid($table, $cond);
        print_r($checkmail);
        if ($checkmail) {
            $mess['msg'] = 'Email này đã được sử dụng';
            header('Location: ' . BASE_URL . 'cart/productcart?msg=' . urldecode(serialize($mess)));
        } else {
            if ($password != $re_password) {
                $mess['msg'] = 'Mật khẩu không trùng khớp';
                header('Location: ' . BASE_URL . 'cart/productcart?msg=' . urldecode(serialize($mess)));
            } else {
                $pass = md5($password);
                $data = array(
                    'id' => "$id",
                    'email' => "$email",
                    'password' => "$pass",
                    'username' => "$username",
                    'phone' => "$phone",
                    'code' => "$code",
                    'type' => "0"
                );
                $result = $res_model->insert_user($table, $data);
                if ($result) {
                    Session::init();
                    Session::set('login_user', true);
                    Session::set('username', $username);
                    Session::set('phone', $phone);
                    Session::set('email', $email);
                    Session::set('type', 0);
                    Session::set('id', $id);
                    header("Location:" . BASE_URL . "cart/productcart");
                } else {
                    $mess['msg'] = 'Đăng ký không thành công';
                    header('Location: ' . BASE_URL . 'cart/productcart?msg=' . urldecode(serialize($mess)));
                }
            }
        }
    }
    public function update_img_profile()
    {
        $output = '';
        Session::init();
        $id = Session::get('id');
        if (count($_FILES["file"]["name"]) > 0) {
            $model = $this->load->model('mainmodel');
            $table = 'tbl_login';
            for ($count = 0; $count < count($_FILES["file"]["name"]); $count++) {
                $file_name = $_FILES["file"]["name"][$count];
                $tmp_name = $_FILES["file"]['tmp_name'][$count];
                $location = 'apps/uploads/' . $file_name;
                move_uploaded_file($tmp_name, $location);
                $cond = "id = '$id'";
                $data = array(
                    'img_profile' => "$file_name"
                );
                $result = $model->edit($table, $data, $cond);
                $output .= '                                <div class="rounded-circle" style="position: relative; overflow: hidden; width: 110px; height: 110px;">
                <img src="' . BASE_URL . '' . $location . '" alt="Admin" class="rounded-circle p-1 bg-primary profile" style="width: 100%; height: 100%;">
                <input type="file" id="img_profile" name="img_profile" class="my_file fas fa-camera" style=" position: absolute; bottom: 0; outline: none; color: transparent; width: 100%; padding: 6px; cursor: pointer; transition: 0.5s; left: 0; background: rgb(255, 255, 255, 30%);"><i class="fas fa-camera"></i>
            </div>';
                echo $output;
            }
        }
    }
    public function update_infomation()
    {
        Session::init();
        $output = "";
        $email = $_POST['user_email'];
        $username = $_POST['user_name'];
        $phone = $_POST['user_phone'];
        $password = md5($_POST['user_pass']);
        $id = Session::get('id');
        $model = $this->load->model('mainmodel');
        $tbl = 'tbl_login';
        $tbl = 'tbl_order';
        $order = array(
            'username' => $username
        );
        $cond_order = "username =  '$username'";
        $result_order = $model->edit($tbl, $order, $cond_order);
        $data = array(
            'email' => $email,
            'username' => $username,
            'phone' => $phone,
            'password' => $password
        );
        $cond = "id = '$id'";
        $result = $model->edit($tbl, $data, $cond);
        if ($result) {
            $output .= '                           <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0 text-light">Tên người dùng</h6>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control" class="user_name" value="' . $username . '">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0 text-light">Email</h6>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control" class="user_email" value="' . $email . '">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0 text-light">Số điện thoại</h6>
            </div>
            <div class="col-sm-9">
                <input type="text" class="form-control" class="user_phone" value="' . $phone . '">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0 text-light">Mật khẩu</h6>
            </div>
            <div class="col-sm-9">
                <input type="password" class="form-control" class="user_pass" value="' . $password . '">
            </div>
        </div>';
        }
        echo $output;
    }
}
