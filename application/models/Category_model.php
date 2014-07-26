<?php 
class Category_model extends CI_Model {

	const tableName = 'categories';
	
	public  $id;
	public  $categoryName;

    function __construct()
    {
         parent::__construct();
    }

    function getCategories()
    {
        $query = "SELECT * FROM " . self::tableName . " WHERE id <> 1 ";
        return $this->db->query($query)->result_array();
    }

    function checkCategory()
    {
    	$is_category_exist = $this->db->get_where(self::tableName, array('categoryName' => $this->categoryName))->result();
    	if (!$is_category_exist)
    		$this->saveCategory();
    }

    function saveCategory()
    {
    	$category = array('categoryName' => $this->categoryName);
    	$this->db->insert(self::tableName, $category); 
    }

    function getCategoryIDByCategoryName()
    {
    	$category = $this->db->get_where(self::tableName, array('categoryName' => $this->categoryName))->result_array();
    	return ($category[0]['id']);
    }
}