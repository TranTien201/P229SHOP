<?php
class properties extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->loadproperties();
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
    public function loadproperties()
    {
        $this->header();
        $model_size = $this->load->model('sizemodel');
        $tbl_size = 'tbl_size';
        $data['sizes'] = $model_size->list_size($tbl_size);
        $model_img = $this->load->model('imgmodel');
        $tbl_img_other = 'tbl_imgcolor';
        $data['imgothers'] = $model_img->listimg($tbl_img_other);
        $select_img = 'tbl_imgdesc.*, tbl_img.*';
        $tbl_img = 'tbl_imgdesc, tbl_img';
        $cond_img = 'tbl_imgdesc.id_imgdesc = tbl_img.id_imgdesc';
        $data['imgdescs'] = $model_img->img($select_img, $tbl_img, $cond_img);
        $tbl_imgdesc = 'tbl_imgdesc';
        // get imgdesc don't connection
        $select_one = 'tbl_imgdesc.*';
        $select_two = 'tbl_img.*';
        $tbl_two = 'tbl_img';
        $cond = 'tbl_imgdesc.id_imgdesc = tbl_img.id_imgdesc';
        $data['imgdesc'] = $model_img->getimgnotlink($select_one, $tbl_imgdesc, $select_two, $tbl_two, $cond);
        // get imgother don't connection
        $select_one_other = 'tbl_imgcolor.*';
        $select_two_other = 'tbl_img.*';
        $tbl_two_other = 'tbl_img';
        $cond_other = 'tbl_imgcolor.id_imgcolor = tbl_img.id_imgcolor';
        $data['imgother'] = $model_img->getimgnotlink($select_one_other, $tbl_img_other, $select_two_other, $tbl_two_other, $cond_other);
        $this->load->view('admin/properties', $data);
        $this->load->view('admin/footer');
    }
    public function connective()
    {
        $model = $this->load->model('imgmodel');
        $tbl_img = 'tbl_img';
        $id_imgcolor = filter_input(INPUT_POST, 'imgother');
        $imgdesc = filter_input(INPUT_POST, 'imgdesc', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        foreach ($imgdesc as $key => $value) {
            $data = array(
                'id_imgdesc' => "$value",
                'id_imgcolor' => "$id_imgcolor"
            );
            $result = $model->insertimg($tbl_img, $data);
        }
        $mess['msg'] = 'Thêm liên kết thành công';
        header('Location: ' . BASE_URL . 'properties/loadproperties?msg=' . urldecode(serialize($mess)));
    }
    public function delete_connective($id)
    {
        $model = $this->load->model('imgmodel');
        $tbl_img = 'tbl_img';
        $cond = "tbl_img.id_imgcolor='$id'";
        $result = $model->deleteimg($tbl_img, $cond);
        if ($result) {
            $mess['msg'] = 'Xóa liên kết thành công';
            header('Location: ' . BASE_URL . 'properties/loadproperties?msg=' . urldecode(serialize($mess)));
        } else {
            $mess['msg'] = 'Xóa liên kết thất bại';
            header('Location: ' . BASE_URL . 'properties/loadproperties?msg=' . urldecode(serialize($mess)));
        }
    }
    public function add_imgother_size()
    {
        $id_size = $_POST['size'];
        $id_imgcolor = $_POST['imgother'];
        $quantity = $_POST['quantity'];
        $table = 'tbl_img_size';
        $data = array(
            'id_size' => "$id_size",
            'id_imgcolor' => "$id_imgcolor",
            'quantity' => "$quantity"
        );
        $model = $this->load->model('sizemodel');
        $result = $model->insert_size($table, $data);
    }
    public function load_img_size()
    {
        $output = '';
        $model = $this->load->model('mainmodel');
        $table = 'tbl_img_size, tbl_size, tbl_imgcolor';
        $select = 'tbl_size.*, tbl_imgcolor.*, tbl_img_size.*';
        $cond = 'tbl_imgcolor.id_imgcolor = tbl_img_size.id_imgcolor AND tbl_img_size.id_size = tbl_size.id_size';
        $orderby = 'id';
        $data = $model->selectorder($select, $table, $cond, $orderby);
        $output .= '
        <div class="table-responsive mt-3 p-3" style="border: 1px solid rgb(255 255 255 / 15%); background-color: rgb(0 0 0 / 20%); height: 500px; width: 100%;">
        <table class="table1 align-middle table_user" style="overflow: auto; width: 100%;">
                <tr>
                    <th>ID</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Size</th>
                    <th>Số lượng</th>
                    <th></th>
                </tr>
                
        ';
        if ($data) {
            $i = 0;
            foreach ($data as $key => $value) {
                $i++;
                $output .= '
                <tr>
                    <td>#' . $i . '</td>
                    <td class="img_p"><span><img src="' . BASE_URL . 'apps/uploads/' . $value["img_name"] . '"  /></span></td>
                    <td data-id1=' . $value['id_size'] . '>' . $value['size'] . '</td>
                    <td data-quantity=' . $value['quantity'] . '>' . $value['quantity'] . '</td>
                    <td><a data-id2=' . $value['id'] . '  class="far fa-trash-alt del_size" name="del_rela"></a></td>
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
}
