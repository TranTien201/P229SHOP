<?php
class brand extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->load_brand();
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
    public function load_brand()
    {
        $this->header();
        $this->load->view('admin/list_brand');
        $this->load->view('admin/footer');
    }
    public function add_brand()
    {
        if (isset($_POST['brand'])) {
            $brand = $_POST['brand'];
            $table = 'tbl_brand';
            $data = array(
                'brand' => "$brand"
            );
            $model = $this->load->model('brandmodel');
            $result = $model->insert_brand($table, $data);
        }
    }
    public function list_brand_ajax()
    {
        $output = '';
        $model = $this->load->model('brandmodel');
        $table = 'tbl_brand';
        $data = $model->list_brand($table);
        $output .= '
        <div class="table-responsive mt-3">
            <table class="table align-middle table_user">
                <tr>
                    <th>Mã nhãn hàng</th>
                    <th>Nhãn hàng</th>
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
                    <td class="size" data-id1=' . $value['id_brand'] . ' contenteditable>' . $value['brand'] . '</td>
                    <td><a data-id2=' . $value['id_brand'] . '  class="far fa-trash-alt del_brand" name="delete_brand"></a></td>
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
    public function delete_brand()
    {
        $id = $_POST['id'];
        $model = $this->load->model('brandmodel');
        $table = 'tbl_brand';
        $cond = "$table.id_brand='$id'";
        $result = $model->delete_brand($table, $cond);
    }
    public function update_brand()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $brand = $_POST['text'];
            $model = $this->load->model('brandmodel');
            $table = 'tbl_brand';
            $cond = "$table.id_brand='$id'";
            $data = array(
                'brand' => "$brand",
            );
            $result = $model->edit_brand($table, $data, $cond);
        }
    }
}
