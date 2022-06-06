<?php
class mainmodel extends Model
{
    public function select($select, $table, $cond)
    {
        $sql = "SELECT $select FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
    public function selectnormal($table)
    {
        $sql = "SELECT * FROM $table";
        return $this->db->select($sql);
    }
    public function selectlimitsortdesc($select, $table, $cond, $sort, $offset, $limit)
    {
        $sql = "SELECT $select FROM $table WHERE $cond ORDER BY $sort DESC LIMIT $offset, $limit ;";
        return $this->db->select($sql);
    }
    public function selectorder($select, $table, $cond, $orderby)
    {
        $sql = "SELECT $select FROM $table WHERE $cond ORDER BY $orderby DESC";
        return $this->db->select($sql);
    }
    public function search($select, $table, $cond, $search)
    {
        $sql = "SELECT $select FROM $table WHERE $cond LIKE '%$search%' ";
        return $this->db->select($sql);
    }
    public function delete($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }
    public function edit($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }
    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function count($count, $tbl, $cond)
    {
        $sql = "SELECT COUNT($count) as count FROM $tbl WHERE $cond";
        return $this->db->select($sql);
    }
}
