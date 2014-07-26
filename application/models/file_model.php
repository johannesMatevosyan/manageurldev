<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/21/14
 * Time: 6:58 PM
 * To change this template use File | Settings | File Templates.
 */

class File_model extends CI_Model {

    function __construct()
    {
         parent::__construct();
    }

    function get_filtered_website_info($condition)
    {
        $query = 'SELECT excel.*, analys.categoryId, analys.keywords, analys.count, analys.websiteId, categories.id AS categoryId, categories.categoryName  FROM excel
                 JOIN analys_result analys
                 ON (analys.websiteId = excel.id)
                 LEFT JOIN categories
                 ON (categories.id = analys.categoryId)
                 
        ';
        $website_info = $this->db->query($query);
       // echo '<pre>';
        //print_r($website_info->result_array()); die;
    } 
   
    function add_record($data)
    {
        $a = $this->db->insert('excel', $data);
    }

    function get_website_id($website_url)
    {
        $query = $this->db->get_where('excel', array('URL' => $website_url));
        return $query->result_array();
    }

    function get_record_by_header($id)
    {
        $query = $this->db->get_where('excel', array('URL' => $id));
        return $query->result();
    }
    function get_record($id)
    {
        $query = $this->db->get_where('excel', array('id' => $id));
        return $query->result();
    }
    function get_records()
    {
        $query = $this->db->get('excel');
        return $query->result();
    }
    function update_record($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('excel', $data);
    }

    function getKeywords($categoryId, $websiteID)
    {
        $query  = 'SELECT a.keywords, `count` 
                        FROM analys_result a WHERE 
                        a.categoryId    = '.$categoryId.' 
                        AND a.websiteId = '.$websiteID;
        $keywords = $this->db->query($query);
        return $keywords->result_array();
    }

    function getCategories($websiteId, $criteria)
    {
        $query = 'SELECT cat.* FROM categories cat 
                        JOIN analys_result a 
                    ON ( a.categoryId = cat.id)
                        JOIN excel e 
                    ON (a.websiteId = e.id)
                    WHERE a.websiteId = '.$websiteId.'
                    GROUP BY cat.id';
        $categoryList = $this->db->query($query);
        return $categoryList->result_array();
    }

    function getWebsiteList($criteria)
    {
        if (empty($criteria['max_pr']))
            $criteria['max_pr'] = 10;
        if (empty($criteria['max_da']))
            $criteria['max_da'] = 10000000;
        if ($criteria['email'] == 1) {
            $condition = ' AND email <> "" AND email <> NULL'; 
        } else {
            $condition = '';
        }
                $query = 'SELECT * FROM excel e 
                        JOIN analys_result a
                            ON (a.websiteId = e.id)
                WHERE 
                    e.PR > '.$criteria['min_pr'].' 
                    AND e.PR < '.$criteria['max_pr'].'
                    AND e.DA > '.$criteria['min_da'].'
                    AND e.DA < '.$criteria['max_da'].
                    $condition.'
                    GROUP BY URL';
                $websiteList = $this->db->query($query);
            return $websiteList->result_array();
    }
    /**
     * get_last_id() function collects maximum id number in 'excel' table.
     * In this way we define range to order downloading files
     */
    function get_last_id()
    {
        $this->db->select_max('id');
        $query = $this->db->get('excel');
        $max_row = $query->row_array();
        return $max_row['id'];
    }

    function get_domain_sum()
    {
        $get_domain_sum = $this->db->count_all('excel');
        return $get_domain_sum;
    }

}