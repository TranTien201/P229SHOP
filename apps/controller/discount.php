<?php
class discount extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->load_discount();
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
    public function load_discount()
    {
        $this->header();
        $model = $this->load->model('discountmodel');
        $table = 'tbl_discount';
        $data['discounts'] = $model->discount($table);
        $this->load->view('admin/listdiscount', $data);
        $this->load->view('admin/footer');
    }
    public function add_discount()
    {
        $text_discount = filter_input(INPUT_POST, 'text_discount');
        $discount = filter_input(INPUT_POST, 'discount');
        $status = filter_input(INPUT_POST, 'status');
        $table = 'tbl_discount';
        $data = array(
            'text_discount' => "$text_discount",
            'discount' => "$discount",
            'status' => "$status"
        );
        $model = $this->load->model('discountmodel');
        $result = $model->insertdiscount($table, $data);
        if ($result) {
            $mess['msg'] = 'Thêm mã giảm giá thành công';
            header('Location: ' . BASE_URL . 'discount/load_discount?msg=' . urldecode(serialize($mess)));
        }
    }

    public function delete_discount($id)
    {
        $model = $this->load->model('discountmodel');
        $table = 'tbl_discount';
        $cond = "$table.id_discount='$id'";
        $result = $model->deletediscount($table, $cond);
        if ($result) {
            $mess['mess'] = 'Xóa giảm giá thành công';
            header('Location: ' . BASE_URL . 'discount/load_discount?mess=' . urldecode(serialize($mess)));
        } else {
            $mess['mess'] = 'Xóa giảm giá thành công';
            header('Location: ' . BASE_URL . 'discount/load_discount?mess=' . urldecode(serialize($mess)));
        }
    }
    public function edit_discount($id)
    {
        $model = $this->load->model('discountmodel');
        $table = 'tbl_discount';
        $cond = "$table.id_discount='$id'";
        $data['discountid'] = $model->discountbyid($table, $cond);
        $this->header();
        $this->load->view('admin/editdiscount', $data);
        $this->load->view('admin/footer');
    }

    public function update_discount($id)
    {
        $model = $this->load->model('discountmodel');
        $text_discount = filter_input(INPUT_POST, 'text_discount');
        $discount = filter_input(INPUT_POST, 'discount');
        $table = 'tbl_discount';
        $data = array(
            'text_discount' => "$text_discount",
            'discount' => "$discount"
        );
        $cond = "$table.id_discount='$id'";
        $result = $model->updatediscount($table, $data, $cond);
        if ($result == 1) {
            $mess['mess'] = "Cập nhập mã giảm giá thành công";
            header('Location: ' . BASE_URL . 'discount/load_discount?mess=' . urldecode(serialize($mess)));
        } else {
            $mess['mess'] = "Cập nhập mã giảm giá thất bại";
            header('Location: ' . BASE_URL . 'discount/load_discount?mess=' . urldecode(serialize($mess)));
        }
    }
    public function unactive($id)
    {
        $model = $this->load->model('discountmodel');
        $tbl_discount = 'tbl_discount';
        $data = array(
            'status' => '0'
        );
        $cond = "$tbl_discount.id_discount='$id'";
        $result = $model->updatediscount($tbl_discount, $data, $cond);
        if ($result == 1) {
            $mess['mess'] = "Cập nhập thành công";
            header('Location: ' . BASE_URL . 'discount/load_discount?mess=' . urldecode(serialize($mess)));
        } else {
            $mess['mess'] = "Cập nhập thất bại";
            header('Location: ' . BASE_URL . 'discount/load_discount?mess=' . urldecode(serialize($mess)));
        }
    }
    public function active($id)
    {
        $model = $this->load->model('discountmodel');
        $tbl_discount = 'tbl_discount';
        $data = array(
            'status' => '1'
        );
        $cond = "$tbl_discount.id_discount='$id'";
        $result = $model->updatediscount($tbl_discount, $data, $cond);
        if ($result == 1) {
            $mess['mess'] = "Cập nhập thành công";
            header('Location: ' . BASE_URL . 'discount/load_discount?mess=' . urldecode(serialize($mess)));
        } else {
            $mess['mess'] = "Cập nhập thất bại";
            header('Location: ' . BASE_URL . 'discount/load_discount?mess=' . urldecode(serialize($mess)));
        }
    }
}
