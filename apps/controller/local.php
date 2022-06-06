<?php
class local extends Controller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->header();
        $model = $this->load->model('mainmodel');
        $tbl = 'tbl_country';
        $data['countries'] = $model->selectnormal($tbl);
        $this->load->view('admin/list_location', $data);
        $this->load->view('admin/footer');
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
    public function add_country()
    {
        $model = $this->load->model('mainmodel');
        $tbl = 'tbl_country';
        $country = $_POST['country'];
        $data = array(
            'country' => $country
        );
        $result = $model->insert($tbl, $data);
        if ($result) {
            $mess['msg'] = 'Thêm quốc gia thành công';
            header('Location: ' . BASE_URL . 'local?msg=' . urldecode(serialize($mess)));
        }
    }
    public function delete_country($id)
    {
        $tbl = 'tbl_country';
        $cond = "id_country = '$id'";
        $model = $this->load->model('mainmodel');
        $result = $model->delete($tbl, $cond);
        if ($result) {
            $mess['msg'] = 'Xóa quốc gia thành công';
            header('Location: ' . BASE_URL . 'local?msg=' . urldecode(serialize($mess)));
        }
    }
    public function edit_country($id)
    {
        $tbl = 'tbl_country';
        $cond = "id_country = '$id'";
        $select = '*';
        $model = $this->load->model('mainmodel');
        $data['country'] = $model->select($select, $tbl, $cond);
        $this->header();
        $this->load->view('admin/edit_local', $data);
        $this->load->view('admin/footer');
    }
    public function city()
    {
        $this->header();
        $model = $this->load->model('mainmodel');
        $tbl = 'tbl_country';
        $data['countries'] = $model->selectnormal($tbl);
        $select = 'tbl_city.*, tbl_country.*';
        $table = 'tbl_city, tbl_country';
        $cond = 'tbl_city.id_country = tbl_country.id_country';
        $data['cities'] = $model->select($select, $table, $cond);
        $this->load->view('admin/add_city', $data);
        $this->load->view('admin/footer');
    }
    public function delete_city($id)
    {
        $tbl = 'tbl_city';
        $cond = "id_city = '$id'";
        $model = $this->load->model('mainmodel');
        $result = $model->delete($tbl, $cond);
        if ($result) {
            $mess['msg'] = 'Xóa thành phố / tỉnh thành công';
            header('Location: ' . BASE_URL . 'local/city?msg=' . urldecode(serialize($mess)));
        }
    }
    public function add_city()
    {
        $model = $this->load->model('mainmodel');
        $tbl = 'tbl_city';
        $city = $_POST['city'];
        $id_country = $_POST['country'];

        $data = array(
            'id_country' => $id_country,
            'city' => $city
        );
        $result = $model->insert($tbl, $data);
        if ($result) {
            $mess['msg'] = 'Thêm thành phố  / tỉnh thành công';
            header('Location: ' . BASE_URL . 'local/city?msg=' . urldecode(serialize($mess)));
        }
    }
    public function edit_city($id)
    {
        $model = $this->load->model('mainmodel');
        $tbl = 'tbl_country';
        $data['countries'] = $model->selectnormal($tbl);
        $select = 'tbl_city.*, tbl_country.*';
        $table = 'tbl_city, tbl_country';
        $cond = "tbl_city.id_country = tbl_country.id_country AND id_city = '$id' ";
        $data['city'] = $model->select($select, $table, $cond);
        $this->header();
        $this->load->view('admin/edit_local', $data);
        $this->load->view('admin/footer');
    }
    public function state()
    {
        $this->header();
        $model = $this->load->model('mainmodel');
        $tbl = 'tbl_city';
        $data['cities'] = $model->selectnormal($tbl);
        $select = 'tbl_city.*, tbl_state.*';
        $table = 'tbl_city, tbl_state';
        $cond = 'tbl_city.id_city = tbl_state.id_city';
        $data['states'] = $model->select($select, $table, $cond);
        $this->load->view('admin/add_state', $data);
        $this->load->view('admin/footer');
    }
    public function delete_state($id)
    {
        $tbl = 'tbl_state';
        $cond = "id_state = '$id'";
        $model = $this->load->model('mainmodel');
        $result = $model->delete($tbl, $cond);
        if ($result) {
            $mess['msg'] = 'Xóa quận huyện thành công';
            header('Location: ' . BASE_URL . 'local/state?msg=' . urldecode(serialize($mess)));
        }
    }
    public function add_state()
    {
        $model = $this->load->model('mainmodel');
        $tbl = 'tbl_state';
        $state = $_POST['state'];
        $total = $_POST['total'];
        $id_city = $_POST['city'];

        $data = array(
            'id_city' => $id_city,
            'state' => $state,
            'total' => $total
        );
        $result = $model->insert($tbl, $data);
        if ($result) {
            $mess['msg'] = 'Thêm quận huyện thành công';
            header('Location: ' . BASE_URL . 'local/state?msg=' . urldecode(serialize($mess)));
        }
    }
    public function edit_state($id)
    {
        $this->header();
        $model = $this->load->model('mainmodel');
        $tbl = 'tbl_city';
        $data['cities'] = $model->selectnormal($tbl);
        $select = 'tbl_city.*, tbl_state.*';
        $table = 'tbl_city, tbl_state';
        $cond = "tbl_city.id_city = tbl_state.id_city AND id_state = '$id'";
        $data['state'] = $model->select($select, $table, $cond);
        $this->load->view('admin/edit_local', $data);
        $this->load->view('admin/footer');
    }
    public function update_state($id)
    {
        $model = $this->load->model('mainmodel');
        $state = $_POST['state'];
        $total = $_POST['total'];
        $id_city = $_POST['city'];
        $tbl = 'tbl_state';
        $data = array(
            'state' => $state,
            'total' => $total,
            'id_city' => $id_city
        );
        $cond = "id_state = '$id'";
        $result = $model->edit($tbl, $data, $cond);
        if ($result) {
            $mess['msg'] = 'Sửa quận huyện thành công';
            header('Location: ' . BASE_URL . 'local/state?msg=' . urldecode(serialize($mess)));
        }
    }
    public function update_city($id)
    {
        $model = $this->load->model('mainmodel');
        $city = $_POST['city'];
        $id_country = $_POST['country'];
        $tbl = 'tbl_city';
        $data = array(
            'city' => $city,
            'id_country' => $id_country,
        );
        $cond = "id_city = '$id'";
        $result = $model->edit($tbl, $data, $cond);
        if ($result) {
            $mess['msg'] = 'Sửa thành phố thành công';
            header('Location: ' . BASE_URL . 'local/city?msg=' . urldecode(serialize($mess)));
        }
    }
    public function update_country($id)
    {
        $model = $this->load->model('mainmodel');
        $country = $_POST['country'];
        $tbl = 'tbl_country';
        $cond = "id_country = '$id'";
        $data = array(
            'country' => $country
        );
        $result = $model->edit($tbl, $data, $cond);
        if ($result) {
            $mess['msg'] = 'Sửa thành phố thành công';
            header('Location: ' . BASE_URL . 'local?msg=' . urldecode(serialize($mess)));
        }
    }
    public function list_city()
    {
        $model = $this->load->model('mainmodel');
        $id_country = $_POST['id_country'];
        $select = 'tbl_city.*, tbl_country.*';
        $table = 'tbl_city, tbl_country';
        $cond = "tbl_city.id_country = tbl_country.id_country AND tbl_country.country = '$id_country'";
        $data = $model->select($select, $table, $cond);
        if ($data) {
            echo '<option disabled selected>Chọn Thành phố / Tỉnh</option>';
            foreach ($data as $key => $data) {
                echo '<option value="' . $data['city'] . '">' . $data['city'] . '</option>';
            }
        } else {
            echo '<option>Không tìm thấy</option>';
        }
    }
    public function list_district()
    {
        $model = $this->load->model('mainmodel');
        $id_city = $_POST['id_city'];
        $select = 'tbl_city.*, tbl_state.*';
        $table = 'tbl_city, tbl_state';
        $cond = "tbl_city.id_city = tbl_state.id_city AND tbl_city.city = '$id_city'";
        $data = $model->select($select, $table, $cond);
        if ($data) {
            echo '<option disabled selected>Chọn quận / huyện</option>';
            foreach ($data as $key => $data) {
                echo '<option value="' . $data['state'] . '">' . $data['state'] . '</option>';
            }
        } else {
            echo '<option>Không tìm thấy</option>';
        }
    }
    public function get_ship()
    {
        $model = $this->load->model('mainmodel');
        $id_state = $_POST['id_state'];
        $select = '*';
        $table = 'tbl_state';
        $cond = "tbl_state.id_state = '$id_state'";
        $data = $model->select($select, $table, $cond);
        if ($data) {
            foreach ($data as $key => $data) {
                echo '
                    <span>' . number_format($data['total']) . '</span><span>đ</span>
            ';
            }
        }
    }
    public function get_total()
    {
        $model = $this->load->model('mainmodel');
        $id_state = $_POST['id_state'];
        $price = $_POST['price'];
        $select = '*';
        $table = 'tbl_state';
        $cond = "tbl_state.id_state = '$id_state'";
        $data = $model->select($select, $table, $cond);
        if ($data) {
            foreach ($data as $key => $data) {
                echo '
                    <span>' . number_format($data['total'] + $price) . '</span><span>đ</span>
            ';
            }
        }
    }
    public function get_all_total()
    {
        $model = $this->load->model('mainmodel');
        $id_state = $_POST['id_state'];
        $price = $_POST['price'];
        $select = '*';
        $table = 'tbl_state';
        $cond = "tbl_state.state = '$id_state'";
        $data = $model->select($select, $table, $cond);
        $ship = 0;
        if ($price < 2500000) {
            $ship = $data[0]['total'];
        }
        if ($data) {
            foreach ($data as $key => $data) {
                echo '                                <table class="table card-text " style="color: #ccc !important;">
                <tbody>
                    <tr>
                        <th class="py-4">
                            Tiền sản phẩm</th>
                        <td class="py-4"><span class="place_price">' . number_format($price) . '</span><span>đ</span></td>
                    </tr>
                    <tr style="height: 70p;">
                        <th style="height: 100%; " class="py-4">Tiền vận chuyển</th>
                        <td class="py-4" id="ship">
                        <span>' . number_format($ship) . '</span><span>đ</span>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-4">Tổng tiền</th>
                        <td class="py-4" id="total">
                        <span>' . number_format($ship + $price) . '</span><span>đ</span>
                        </td>
                    </tr>
                </tbody>
            </table>';
            }
        }
    }
}
