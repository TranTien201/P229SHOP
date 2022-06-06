<?php
class size extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->load_size();
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
    public function load_size()
    {
        $this->header();
        $this->load->view('admin/list_size');
        $this->load->view('admin/footer');
    }
    public function add_size()
    {
        if (isset($_POST['size'])) {
            $size = $_POST['size'];
            $table = 'tbl_size';
            $data = array(
                'size' => "$size"
            );
            $model = $this->load->model('sizemodel');
            $result = $model->insert_size($table, $data);
        }
    }
    public function list_size_ajax()
    {
        $output = '';
        $model = $this->load->model('sizemodel');
        $table = 'tbl_size';
        $data = $model->list_size($table);
        $output .= '
        <div class="table-responsive mt-3">
            <table class="table align-middle table_user">
                <tr>
                    <th>Mã size</th>
                    <th>Size</th>
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
                    <td class="size" data-id1=' . $value['id_size'] . ' contenteditable>' . $value['size'] . '</td>
                    <td><a data-id2=' . $value['id_size'] . ' class="far fa-trash-alt del_size" name="delete_size"></a></td>
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
