<?php
class categorymodel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function category($table)
    {
        $sql = "SELECT * FROM $table";
        return $this->db->select($sql);
    }
    public function categorycond($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
    public function categoryparent($table)
    {
        $sql = "SELECT * FROM $table WHERE id_parent IS NULL";
        return $this->db->select($sql);
    }
    public function categorybyid($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
    public function insertcategory($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function updatecategory($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }

    public function deletecategory($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }
}
