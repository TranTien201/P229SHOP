<?php
class sizemodel extends Model
{
    public function list_size($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id_size DESC";
        return $this->db->select($sql);
    }
    public function size($select, $table, $cond)
    {
        $sql = "SELECT $select FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
    public function sizebyid($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
    public function delete_size($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }
    public function edit_size($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }
    public function insert_size($table, $data)
    {
        return $this->db->insert($table, $data);
    }
}
