<?php
class Database extends PDO
{
    public function __construct($connect, $user, $pass)
    {

        parent::__construct($connect, $user, $pass);
    }

    public function select($sql, $data = array())
    {
        $statement = $this->prepare($sql);
        $statement->execute($data);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert($table, $data)
    {
        /* $sql = "INSERT INTO $table(title_category_product,decs_category_product) 
            VALUES(':titile_category_product',':decs_category_product');" */

        /*
             $data = array(
            'title_category_product' => $title,
            'desc_category_product' => $decs

        ); */
        $key = implode(",", array_keys($data));
        $value = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table($key) VALUES ($value)";

        $statement = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        // $statement->bindValue(':title_category_product',$title_category_product);
        // $statement->bindValue(':decs_category_product',$decs_category_product);
        return $statement->execute();
    }
    public function update($table, $data, $cond)
    {
        $updateKeys = NULL;

        foreach ($data as $key => $value) {
            $updateKeys .= "$key=:$key,";
        }

        $updateKeys = rtrim($updateKeys, ",");
        /* $sql = "UPDATE $table SET title_cateogory_product=:title_category_product, 
            decs_category_product=:decs_category_product WHERE $cond"; */

        $sql = "UPDATE $table SET $updateKeys WHERE $cond";
        $statement = $this->prepare($sql);

        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement->execute();
    }
    public function delete($table, $cond)
    {
        $sql = "DELETE FROM $table WHERE $cond ";
        return $this->exec($sql);
    }



}