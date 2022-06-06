<?php
class imgmodel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function listimglimit($table, $offset, $limit)
    {
        $sql = "SELECT * FROM $table ORDER BY id_imgcolor DESC LIMIT $offset, $limit";
        return $this->db->select($sql);
    }
    public function listimg($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id_imgcolor DESC";
        return $this->db->select($sql);
    }
    public function img($select, $table, $cond)
    {
        $sql = "SELECT $select FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
    public function imggroupbyid($select, $table, $cond)
    {
        $sql = "SELECT $select FROM $table WHERE $cond GROUP BY id_product";
        return $this->db->select($sql);
    }
    public function getimgnotlink($select_one, $tbl_one, $select_two, $tbl_two, $cond)
    {
        $sql = "SELECT $select_one FROM $tbl_one WHERE NOT EXISTS ( SELECT $select_two FROM $tbl_two WHERE $cond);";
        return $this->db->select($sql);
    }
    public function listimgdesc($table, $offset, $limit)
    {
        $sql = "SELECT * FROM $table ORDER BY id_imgdesc DESC LIMIT $offset, $limit";
        return $this->db->select($sql);
    }
    public function imgbyid($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
    public function insertimg($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function updateimg($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }

    public function deleteimg($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }
    public function count($count, $tbl)
    {
        $sql = "SELECT COUNT($count) as count FROM $tbl ";
        return $this->db->select($sql);
    }
}
