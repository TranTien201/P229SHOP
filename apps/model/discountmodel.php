<?php
class discountmodel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function discount($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id_discount DESC";
        return $this->db->select($sql);
    }
    public function discountbyid($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
    public function insertdiscount($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function updatediscount($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }

    public function deletediscount($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }
}
