<?php
class contact extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->load_contact();
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
    public function load_contact()
    {
        $this->header();
        $tbl = 'tbl_contact';
        $model = $this->load->model('mainmodel');
        $data['contacts'] = $model->selectnormal($tbl);
        $this->load->view('admin/list_contact', $data);
        $this->load->view('admin/footer');
    }
    public function form_add_contact()
    {
        $this->header();
        $this->load->view('admin/add_contact');
        $this->load->view('admin/footer');
    }
    public function add_contact()
    {
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $support = $_POST['support'];
        // $icon = $_FILES['image']['name'];
        // $anhminhhoa_tmp = $_FILES['image']['tmp_name'];
        // $location = 'apps/uploads/' . $icon;
        // move_uploaded_file($anhminhhoa_tmp, $location);
        $link_fb = $_POST['link_fb'];
        $link_tw = $_POST['link_tw'];
        $link_ins = $_POST['link_ins'];
        $link_youtube = $_POST['link_youtube'];
        $model = $this->load->model('mainmodel');
        $tbl = 'tbl_contact';
        $data = array(
            'phone' => $phone,
            'email' => $email,
            'support' => $support,
            // 'logo' => $icon,
            'link_fb' => $link_fb,
            'link_tw' => $link_tw,
            'link_ins' => $link_ins,
            'link_youtube' => $link_youtube
        );
        $result = $model->insert($tbl, $data);
        if ($result) {
            $mess['msg'] = 'Thêm contact thành công';
            header('Location: ' . BASE_URL . 'contact/load_contact?msg=' . urldecode(serialize($mess)));
        }
    }
    public function send_contact()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $text = $_POST['text'];
        $mail = new sendmail();
        $mail->sendContact($email, $name, $text);
        header('Location: ' . BASE_URL);
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
