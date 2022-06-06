<?php
class imgcolor extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->loadimgcolor();
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
    public function loadimgcolor()
    {
        $this->header();
        $this->load->view('admin/listimgcolor');
        $this->load->view('admin/footer');
    }
    public function listimgcolorajax()
    {
        $output = '';
        $limit = 10;
        $page = 1;
        if (isset($_POST['page_no'])) {
            $page = $_POST['page_no'];
        }
        $offset = ($page - 1) * $limit;
        $model = $this->load->model('imgmodel');
        $tbl = 'tbl_imgcolor';
        $img = $model->listimglimit($tbl, $offset, $limit);
        $output .= '
        <div class="table-responsive mt-3">
            <table class="table align-middle table_user">
                <thead>
                    <tr>
                        <th>Mã ảnh</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Ảnh chi tiết</th>
                        <th></th>
                    </tr>
                </thead>  
                <tbody>  
        ';
        if ($img) {
            $i = 0;
            foreach ($img as $key => $value) {
                $i++;
                $output .= '
                <tr>
                    <td>' . $i . '</td>
                    <td><div class="img-user"><img src="apps/uploads/' . $value["img_name"] . '"  /></div></td>
                    <td><a data-id_img="' . $value['img_name'] . '" type="button" class="far fa-trash-alt del_imgcolor" name="delete_img_color" id="' . $value['id_imgcolor'] . '"></a></td>
                </tr>
                ';
            }
        } else {
            $output .= '
                <tr>
                    <td colspan="2">Dữ liệu chưa có</td>
                </tr>
            ';
        }
        $output .= '
                </tbody>
            </table>
        </div>
        <div>
        <nav class="mt-3" aria-label="...">
            <ul class="pagination pagination-sm ">
        ';
        $count = 'id_imgcolor';
        $counts = $model->count($count, $tbl);
        $total_pages = ceil($counts[0]['count'] / $limit);
        for ($x = 1; $x <= $total_pages; $x++) {
            if ($x == $page) {
                $class_name = "active";
            } else {
                $class_name = "";
            }
            $output .= '
    
                                <li class="pag_imgcolor page-item ' . $class_name . '"><a id="' . $x . '" class="page-link" href="">' . $x . '</a></li>
                          ';
        }
        $output .= '
        </ul>
        </nav>
    </div>
    ';
        echo $output;
    }
    public function addimgcolor()
    {
        if (count($_FILES["file"]["name"]) > 0) {
            $model = $this->load->model('imgmodel');
            $tbl_imgcolor = 'tbl_imgcolor';
            for ($count = 0; $count < count($_FILES["file"]["name"]); $count++) {
                $file_name = $_FILES["file"]["name"][$count];
                $tmp_name = $_FILES["file"]['tmp_name'][$count];
                $location = 'apps/uploads/' . $file_name;
                move_uploaded_file($tmp_name, $location);
                $data = array(
                    'img_name' => "$file_name"
                );
                $result = $model->insertimg($tbl_imgcolor, $data);
            }
        }
    }
    public function checkimgcolor($file_name)
    {
        $model = $this->load->model('imgmodel');
        $table = 'tbl_imgcolor';
        $cond = "$table.img_name='$file_name'";
        $result = $model->imgbyid($table, $cond);
        if ($result == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteimg()
    {
        if (isset($_POST['id_imgcolor'])) {
            $model = $this->load->model('imgmodel');
            $table = 'tbl_imgcolor';
            echo $id_imgcolor = $_POST['id_imgcolor'];
            echo $img_name = $_POST['img_name'];
            $cond = "$table.id_imgcolor='$id_imgcolor'";
            $file_path = 'apps/uploads/' . $_POST['img_name'];
            if (unlink($file_path)) {
                $model->deleteimg($table, $cond);
            }
        }
    }
}
