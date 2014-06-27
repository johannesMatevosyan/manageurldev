<?php 
class Analys_result_model extends CI_Model
{

    const tableName = 'analys_result';
    
    public  $id;
    public  $count;
    public  $keywords;
    public  $websiteId;
    public  $categoryId;

    function __construct()
    {
         parent::__construct();
    }

    function getCountries()
    {
        $query = "SELECT * FROM " .self::tableName. " WHERE categoryId = 1";
        return $this->db->query($query)->result_array();
    }

    function addAnalises()
    {   
        if ($this->count) {
            $analyses = array(
                            'keywords'   => $this->keywords,
                            'categoryId' => $this->categoryId,
                            'count'      => $this->count, 
                            'websiteId'  => $this->websiteId
                        );
            $this->db->insert(self::tableName, $analyses); 
        }
    }

    // function saveCategory()
    // {
    //     $category = array('categoryName' => $this->categoryName);
    //     $this->db->insert(self::tableName, $category); 
    // }

    // function getCategoryIDByCategoryName()
    // {
    //     $category = $this->db->get_where(self::tableName, array('categoryName' => $this->categoryName))->result_array();
    //     return ($category[0]['id']);
    // }
}