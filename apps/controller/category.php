<?php
class category extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->load_category();
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
    public function load_category()
    {
        $this->header();
        $model = $this->load->model('categorymodel');
        $table = 'tbl_category';
        $data['categories'] = $model->category($table);
        $this->load->view('admin/listcategory', $data);
        $this->load->view('admin/footer');
    }
    public function add_category()
    {
        $category_name = filter_input(INPUT_POST, 'category');
        if ($category_name != NULL) {
            $table = 'tbl_category';
            $id_parent = filter_input(INPUT_POST, 'category_parent');
            if ($id_parent == NULL) {
                $data = array(
                    'category_name' => "$category_name"
                );
            } else {
                $data = array(
                    'category_name' => "$category_name",
                    'id_parent' => "$id_parent"
                );
            }
            $model = $this->load->model('categorymodel');
            $result = $model->insertcategory($table, $data);
            if ($result) {
                $mess['msg'] = 'Thêm loại hàng thành công';
                header('Location: ' . BASE_URL . 'category/load_category?msg=' . urldecode(serialize($mess)));
            }
        }
    }

    public function delete_category($id)
    {
        $model = $this->load->model('categorymodel');
        $table = 'tbl_category';
        $cond = "$table.id_category='$id'";
        $result = $model->deletecategory($table, $cond);
        if ($result) {
            $mess['mess'] = 'Xóa loại hàng thành công';
            header('Location: ' . BASE_URL . 'category/load_category?mess=' . urldecode(serialize($mess)));
        } else {
            $mess['mess'] = 'Xóa loại hàng thành công';
            header('Location: ' . BASE_URL . 'category/load_category?mess=' . urldecode(serialize($mess)));
        }
    }
    public function edit_category($id)
    {
        $model = $this->load->model('categorymodel');
        $table = 'tbl_category';
        $cond = "$table.id_category='$id'";
        $data['categorybyid'] = $model->categorybyid($table, $cond);
        $data['categories'] = $model->category($table);
        $this->header();
        $this->load->view('admin/editcategory', $data);
        $this->load->view('admin/footer');
    }

    public function update_category($id)
    {
        $category_name = filter_input(INPUT_POST, 'category');
        if ($category_name != NULL) {
            $table = 'tbl_category';
            $cond = "$table.id_category='$id'";
            $id_parent = filter_input(INPUT_POST, 'category_parent');
            if ($id_parent == NULL) {
                $data = array(
                    'category_name' => "$category_name"
                );
            } else {
                $data = array(
                    'category_name' => "$category_name",
                    'id_parent' => "$id_parent"
                );
            }
            $model = $this->load->model('categorymodel');
        }
        $result = $model->updatecategory($table, $data, $cond);
        if ($result == 1) {
            $mess['mess'] = "Cập nhập loại hàng thành công";
            header('Location: ' . BASE_URL . 'category/load_category?mess=' . urldecode(serialize($mess)));
        } else {
            $mess['mess'] = "Cập nhập loại hàng thất bại";
            header('Location: ' . BASE_URL . 'category/load_category?mess=' . urldecode(serialize($mess)));
        }
    }
}
