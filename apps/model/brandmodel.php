<?php
class brandmodel extends Model
{
    public function list_brand($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id_brand DESC";
        return $this->db->select($sql);
    }
    public function brandbyid($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
    public function delete_brand($table,$cond)
    {
        return $this->db->delete($table,$cond);
    }
    public function edit_brand($table,$data,$cond)
    {
        return $this->db->update($table,$data,$cond);
    }
    public function insert_brand($table, $data)
    {
        return $this->db->insert($table, $data);
    }
}

?>