<?php
class loginmodel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // public function login_user($table, $user, $pass)
    // {
    //     $sql = "SELECT * FROM $table WHERE username=:user AND password=:pass";

    //     $data = array(':user' => $user,':pass' => $pass);

    //     return $this->db->select($sql, $data);
    // }
    public function login_user($table, $email, $password)
    {

        $sql = "SELECT * FROM $table WHERE email=:email AND password=:pass ";
        $data = array(':email' => $email, ':pass' => $password);
        return $this->db->select($sql, $data);
    }
    public function userbyid($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
    public function insert_user($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function list_user($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC";
        return $this->db->select($sql);
    }
    public function delete_user($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }
    public function update($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }
    public function check($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
}
