<?php
class page extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->load_page();
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
    public function load_page()
    {
        $this->header();
        $tbl = 'tbl_page_instruct';
        $model = $this->load->model('mainmodel');
        $data['pages'] = $model->selectnormal($tbl);
        $this->load->view('admin/list_page', $data);
        $this->load->view('admin/footer');
    }
    public function add_page()
    {
        if (isset($_POST['page'])) {
            $page = $_POST['page'];
            $table = 'tbl_page_instruct';
            $data = array(
                'page' => "$page"
            );
            $model = $this->load->model('mainmodel');
            $result = $model->insert($table, $data);
        }
    }
    public function add_class()
    {
        $page = $_POST['page'];
        $class = $_POST['class'];
        $text = $_POST['text'];
        $table = 'tbl_class_instruct';
        $data = array(
            'id_page' => "$page",
            'class' => "$class",
            'text' => "$text"
        );
        $model = $this->load->model('mainmodel');
        $result = $model->insert($table, $data);
    }
    public function list_page_ajax()
    {
        $output = '';
        $model = $this->load->model('mainmodel');
        $table = 'tbl_page_instruct';
        $data = $model->selectnormal($table);
        $output .= '
        <div class="table-responsive mt-3">
            <table class="table align-middle table_user">
                <tr>
                    <th>Mã</th>
                    <th>Trang</th>
                    <th></th>
                </tr>
                
        ';
        if ($data) {
            $i = 0;
            foreach ($data as $key => $value) {
                $i++;
                $output .= '
                <tr>
                    <td>' . $i . '</td>
                    <td class="size" data-id1=' . $value['id_page'] . ' contenteditable>' . $value['page'] . '</td>
                    <td><a data-id2=' . $value['id_page'] . ' class="far fa-trash-alt del_size" name="delete_size"></a></td>
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
            </table>
        </div>
        ';

        echo $output;
    }
    public function list_class_ajax()
    {
        $output = '';
        $model = $this->load->model('mainmodel');
        $select = 'tbl_class_instruct.*, tbl_page_instruct.*';
        $table = 'tbl_class_instruct, tbl_page_instruct';
        $cond = 'tbl_class_instruct.id_page = tbl_page_instruct.id_page';
        $data = $model->select($select, $table, $cond);
        $output .= '
        <div class="table-responsive mt-3">
            <table class="table align-middle table_user">
                <tr>
                    <th>Mã</th>
                    <th>Trang</th>
                    <th>Class</th>
                    <th>Nội dung</th>
                    <th></th>
                </tr>
                
        ';
        if ($data) {
            $i = 0;
            foreach ($data as $key => $value) {
                $i++;
                $output .= '
                <tr>
                    <td>' . $i . '</td>
                    <td class="" data-id1=' . $value['id_page'] . ' >' . $value['page'] . '</td>
                    <td class="" data-id1=' . $value['id_class'] . ' >' . $value['class'] . '</td>
                    <td class="" data-id1=' . $value['id_class'] . ' >' . $value['text'] . '</td>
                    <td><a data-id2=' . $value['id_page'] . ' class="far fa-trash-alt del_size" name="delete_size"></a></td>
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
            </table>
        </div>
        ';

        echo $output;
    }
    public function delete_size()
    {
        $id = $_POST['id'];
        $model = $this->load->model('sizemodel');
        $table = 'tbl_size';
        $cond = "$table.id_size='$id'";
        $result = $model->delete_size($table, $cond);
    }
    public function update_size()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $size = $_POST['text'];
            $model = $this->load->model('sizemodel');
            $table = 'tbl_size';
            $cond = "$table.id_size='$id'";
            $data = array(
                'size' => "$size",
            );
            $result = $model->edit_size($table, $data, $cond);
        }
    }
}
