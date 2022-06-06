<?php
class slidemodel extends Model
{
    public function select($table)
    {
        $sql = "SELECT * FROM $table";
        return $this->db->select($sql);
    }
    // public function selectorder($select, $table, $cond, $orderby)
    // {
    //     $sql = "SELECT $select FROM $table WHERE $cond ORDER BY $orderby DESC";
    //     return $this->db->select($sql);
    // }
    // public function search($select, $table, $cond, $search)
    // {
    //     $sql = "SELECT $select FROM $table WHERE $cond LIKE '%$search%' ";
    //     return $this->db->select($sql);
    // }
    // public function delete($table, $cond)
    // {
    //     return $this->db->delete($table, $cond);
    // }
    // public function edit($table, $data, $cond)
    // {
    //     return $this->db->update($table, $data, $cond);
    // }
    // public function insert($table, $data)
    // {
    //     return $this->db->insert($table, $data);
    // }
}
