<?php
class imgdesc extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->loadimgdecs();
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
    public function loadimgdecs()
    {
        $this->header();
        $this->load->view('admin/listimgdesc');
        $this->load->view('admin/footer');
    }
    public function listimgajax()
    {
        $output = '';
        $limit = 10;
        $page = 1;
        if (isset($_POST['page_no'])) {
            $page = $_POST['page_no'];
        }
        $offset = ($page - 1) * $limit;
        $model = $this->load->model('imgmodel');
        $tbl = 'tbl_imgdesc';
        $img = $model->listimgdesc($tbl, $offset, $limit);
        $output .= '
        <div class="table-responsive mt-3">
            <table class="table align-middle table_user">
                <thead>
                    <tr>
                        <th>Mã ảnh</th>
                        <th>Ảnh sản phẩm</th>
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
                    <td><div class="img-user"><img src="apps/uploads/' . $value["name_imgdesc"] . '"  /></div></td>
                    <td><a data-id_img="' . $value['name_imgdesc'] . '" type="button" class="far fa-trash-alt del_imgcolor" name="delete_img_color" id="' . $value['id_imgdesc'] . '"></a></td>
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
        $count = 'id_imgdesc';
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
    public function addimgdesc()
    {
        if (count($_FILES["file"]["name"]) > 0) {
            $model = $this->load->model('imgmodel');
            $table = 'tbl_imgdesc';
            for ($count = 0; $count < count($_FILES["file"]["name"]); $count++) {
                $file_name = $_FILES["file"]["name"][$count];
                $tmp_name = $_FILES["file"]['tmp_name'][$count];
                $location = 'apps/uploads/' . $file_name;
                move_uploaded_file($tmp_name, $location);
                $data = array(
                    'name_imgdesc' => "$file_name"
                );
                $result = $model->insertimg($table, $data);
            }
        }
    }
    public function checkimgdesc($file_name)
    {
        $model = $this->load->model('imgmodel');
        $table = 'tbl_imgdesc';
        $cond = "$table.name_imgdesc='$file_name'";
        $result = $model->imgbyid($table, $cond);
        if ($result == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteimgdesc()
    {
        if (isset($_POST['id_imgdesc'])) {
            $model = $this->load->model('imgmodel');
            $table = 'tbl_imgdesc';
            $id_imgdesc = $_POST['id_imgdesc'];
            $cond = "$table.id_imgdesc='$id_imgdesc'";
            $file_path = 'apps/uploads/' . $_POST['name_imgdesc'];
            $model->deleteimg($table, $cond);
            if (unlink($file_path)) {
                $model->deleteimg($table, $cond);
            }
        }
    }
}
