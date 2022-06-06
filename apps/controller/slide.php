<?php
class slide extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->load_slide();
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
    public function load_slide()
    {
        $this->header();
        $this->load->view('admin/list_slide');
        $this->load->view('admin/footer');
    }
    public function listimgajax()
    {
        $output = '';
        $model = $this->load->model('mainmodel');
        $tbl = 'tbl_slide';
        $img = $model->selectnormal($tbl);
        $output .= '
        <div class="table-responsive mt-3">
            <table class="table align-middle table_user">
                <thead>
                    <tr>
                        <th>Mã ảnh</th>
                        <th>Ảnh slide</th>
                        <th>Nội dung</th>
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
                    <td>
                        <div class="d-flex img_p">
                            <span>
                            <img src="apps/uploads/' . $value["img1"] . '"  />
                            </span>
                            <span>
                            <img src="apps/uploads/' . $value["img2"] . '"  />
                            </span>
                        </div>
                    </td>
                    <td class="slide" data-id1=' . $value['id_slide'] . ' contenteditable>' . $value['text_slide'] . '</td>
                    <td><a type="button" class="far fa-trash-alt del_imgcolor" name="delete_img_color" id="' . $value['id_slide'] . '"></a></td>
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
        ';

        echo $output;
    }
    public function addimgslide()
    {
        if (count($_FILES["file"]["name"]) > 0) {
            $model = $this->load->model('mainmodel');
            $tbl_slide = 'tbl_slide';
            $file_name1 = $_FILES["file"]["name"][0];
            $tmp_name1 = $_FILES["file"]['tmp_name'][0];
            $location1 = 'apps/uploads/' . $file_name1;
            move_uploaded_file($tmp_name1, $location1);
            $file_name2 = $_FILES["file"]["name"][1];
            $tmp_name2 = $_FILES["file"]['tmp_name'][2];
            $location2 = 'apps/uploads/' . $file_name2;
            move_uploaded_file($tmp_name2, $location2);
            $data = array(
                'img1' => "$file_name1",
                'img2' => "$file_name2",
                'text_slide' => 'slide'
            );
            $result = $model->insert($tbl_slide, $data);
        }
    }
    public function update_slide()
    {
        $id = $_POST['id'];
        $text = $_POST['text'];
        $tbl = 'tbl_slide';
        $cond = "tbl_slide.id_slide = '$id'";
        $data = array(
            'text_slide' => $text
        );
        $model = $this->load->model('mainmodel');
        $result = $model->edit($tbl, $data, $cond);
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
