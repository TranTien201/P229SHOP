<?php
class ordermodel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listorder($table)
    {
        $sql = "SELECT * FROM $table ORDER BY date DESC";
        return $this->db->select($sql);
    }
    public function total()
    {
        $sql = "SELECT SUM(total) as total FROM tbl_order";
        return $this->db->select($sql);
    }
    public function total_month($month, $year) 
    {
        $sql = "SELECT SUM(total) AS total FROM `tbl_order` WHERE MONTH(day) = $month AND YEAR(day) = $year";
        return $this->db->select($sql);

    }
    public function countUsername()
    {
        $sql = "SELECT COUNT(DISTINCT username) as username FROM tbl_order";
        return $this->db->select($sql);
    }
    public function countOrder()
    {
        $sql = "SELECT COUNT(id_order) as id_order FROM tbl_order";
        return $this->db->select($sql);
    }
    public function countAccount()
    {
        $sql = "SELECT COUNT(id) as id FROM tbl_login WHERE type = 0";
        return $this->db->select($sql);
    }
    public function topOrder()
    {
        $sql = "SELECT SUM(tbl_order.total) as totals, COUNT(tbl_order.id_order) as countorder, tbl_login.*, tbl_order.country FROM tbl_order, tbl_login WHERE tbl_order.username = tbl_login.username GROUP BY username ORDER BY totals DESC LIMIT 5";
        return $this->db->select($sql);
    }
}
