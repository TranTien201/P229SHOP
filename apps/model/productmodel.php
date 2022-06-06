<?php
class productmodel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function product($table, $cond, $offset = 0, $limit = 1)
    {
        $sql = "SELECT tbl_product.*, tbl_category.*, tbl_brand.* FROM $table WHERE $cond ORDER BY date_up DESC LIMIT $offset, $limit";
        return $this->db->select($sql);
    }
    public function productlimit($cond, $offset, $limit)
    {
        $sql = "SELECT tbl_product.* FROM tbl_product WHERE $cond ORDER BY date_up DESC LIMIT $offset, $limit";
        return $this->db->select($sql);
    }
    public function productdetail($select, $table, $cond)
    {
        $sql = "SELECT $select FROM $table WHERE $cond ";
        return $this->db->select($sql);
    }
    public function topsellproduct()
    {
        $sql = "SELECT DISTINCT * FROM ( SELECT tbl_product.* FROM tbl_imgcolor_product, tbl_img_size, tbl_imgcolor, tbl_product WHERE tbl_img_size.id_imgcolor = tbl_imgcolor.id_imgcolor AND tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor AND tbl_imgcolor_product.id_product = tbl_product.id_product AND tbl_img_size.sell > 1 ORDER BY tbl_img_size.sell DESC ) as product; ";
        return $this->db->select($sql);
    }
    public function searchproduct($table, $cond, $search)
    {
        $sql = "SELECT tbl_product.*, tbl_category.*, tbl_brand.* FROM $table WHERE $cond LIKE '%$search%' LIMIT 10";
        return $this->db->select($sql);
    }
    public function livesearch($select, $table, $cond, $search)
    {
        $sql = "SELECT $select FROM $table WHERE $cond LIKE '%$search%' LIMIT 10";
        return $this->db->select($sql);
    }
    public function topproduct($table, $cond)
    {
        $sql = "SELECT tbl_product.* FROM $table WHERE $cond ORDER BY date_up DESC LIMIT 10";
        return $this->db->select($sql);
    }
    public function saleproduct($table, $cond)
    {
        $sql = "SELECT tbl_product.*, tbl_discount.* FROM $table WHERE $cond ORDER BY date_up DESC LIMIT 10";
        return $this->db->select($sql);
    }
    public function sort($cond)
    {
        $sql = "SELECT tbl_product.*, tbl_category.*, tbl_brand.* FROM tbl_product, tbl_brand, tbl_category WHERE $cond";
        return $this->db->select($sql);
    }
    public function productbyid($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }
    public function insertproduct($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function updateproduct($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }

    public function deleteproduct($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }
    public function getComment($cond)
    {
        $sql = "SELECT COUNT(id_comment) as counts FROM tbl_comment WHERE $cond";
        return $this->db->select($sql);
    }
    public function getAllComment($cond, $limit)
    {
        $sql = "SELECT tbl_login.username, tbl_comment.id_comment, tbl_comment.text_comment, tbl_comment.star, DATE_FORMAT(tbl_comment.createComment, '%Y-%m-%d') as createComment FROM tbl_comment, tbl_login WHERE $cond ORDER BY tbl_comment.id_comment DESC LIMIT $limit";
        return $this->db->select($sql);
    }
    public function avgStar($cond)
    {
        $sql = "SELECT AVG(star) as star FROM tbl_comment WHERE $cond";
        return $this->db->select($sql);
    }
    public function getmaxPrice()
    {
        $sql = "SELECT MAX(price) as maxprice FROM `tbl_product` WHERE 1;";
        return $this->db->select($sql);
    }
    public function count_product()
    {
        $sql = 'SELECT COUNT(id_product) as counts FROM `tbl_product`';
        return $this->db->select($sql);
    }
    public function sell_product($cond)
    {
        $sql = "SELECT SUM(tbl_img_size.sell) as sell, tbl_product.*, tbl_brand.*, tbl_category.* FROM tbl_img_size, tbl_product, tbl_imgcolor_product, tbl_imgcolor, tbl_brand, tbl_category WHERE $cond GROUP BY tbl_product.id_product ";
        return $this->db->select($sql);
    }
    public function sell_product_limit($offer, $limit)
    {
        $sql = "SELECT SUM(tbl_img_size.sell) as sell, tbl_product.id_product FROM tbl_img_size, tbl_product, tbl_imgcolor_product, tbl_imgcolor WHERE tbl_product.id_product = tbl_imgcolor_product.id_product AND tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor AND tbl_imgcolor.id_imgcolor = tbl_img_size.id_imgcolor GROUP BY tbl_product.id_product ORDER BY sell DESC LIMIT $offer, $limit";
    }
    public function sell_product_sort($cond, $sort, $offset, $limit)
    {
        $sql = "SELECT SUM(tbl_img_size.sell) as sell, tbl_product.*, tbl_brand.brand, tbl_category.category_name FROM tbl_img_size, tbl_product, tbl_imgcolor_product, tbl_imgcolor, tbl_brand, tbl_category WHERE tbl_product.id_product = tbl_imgcolor_product.id_product AND tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor AND tbl_imgcolor.id_imgcolor = tbl_img_size.id_imgcolor AND tbl_product.id_brand = tbl_brand.id_brand AND tbl_category.id_category = tbl_product.id_category $cond  GROUP BY tbl_product.id_product ORDER BY $sort DESC LIMIT $offset, $limit";
        return $this->db->select($sql);
    }
    public function sell_product_sort_asc($cond, $sort, $offset, $limit)
    {
        $sql = "SELECT SUM(tbl_img_size.sell) as sell, tbl_product.*, tbl_brand.brand, tbl_category.category_name FROM tbl_img_size, tbl_product, tbl_imgcolor_product, tbl_imgcolor, tbl_brand, tbl_category WHERE tbl_product.id_product = tbl_imgcolor_product.id_product AND tbl_imgcolor.id_imgcolor = tbl_imgcolor_product.id_imgcolor AND tbl_imgcolor.id_imgcolor = tbl_img_size.id_imgcolor AND tbl_product.id_brand = tbl_brand.id_brand AND tbl_category.id_category = tbl_product.id_category $cond  GROUP BY tbl_product.id_product ORDER BY $sort ASC LIMIT $offset, $limit";
        return $this->db->select($sql);
    }
    public function count($cond)
    {
        $sql = "SELECT COUNT(id_product) as counts FROM tbl_product, tbl_category, tbl_brand WHERE tbl_product.id_brand = tbl_brand.id_brand AND tbl_category.id_category = tbl_product.id_category $cond";
        return $this->db->select($sql);
    }
}
