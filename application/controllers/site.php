<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *************************************************
 ** File: login.php  **
 ** Date: 03.05.2014     **
 ** Time: 2:06 PM    **
 ** @author Hovhannes Matevosyan **
 ** Description:  **
 *************************************************
 */

class Site extends CI_Controller{

    /**
     * Constructor checks if the user was authorized with the help of is_logged_in(),
     * otherwise access is denied
     */
    function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
    }

    function is_logged_in()
    {
        // to have access, user should have a session
        $is_logged_in = $this->session->userdata('is_logged_in');

        /**
         * if information is not retrieved from session,
         * then user is has no permission to be in this page
         */
        if(!isset($is_logged_in) || $is_logged_in != true)
        {
            echo '<div style="width: 600px; margin: 20px auto;"> ';
            echo '<h2>You don\'t have permission to access this page</h2>';
            echo anchor('login', 'Login Now');
            echo '</div>';
            die();
        }
    }

    function websiteFilter()
    {
        //print_r($_POST);die;
        $this->load->model('file_model');
       // $this->file_model->get_filtered_website_info(1);
       if (isset($_POST['criteria'])) {

            $criteria['min_pr'] = @$_POST['criteria']['prfrom'];
            $criteria['max_pr'] = @$_POST['criteria']['prto'];
            $criteria['min_da'] = @$_POST['criteria']['dafrom'];
            $criteria['max_da'] = @$_POST['criteria']['dato'];

            $criteria['category'] = @$_POST['criteria']['category'];
            $criteria['country']  = @$_POST['criteria']['country'];
            $criteria['email']    = @$_POST['criteria']['email'];

            $criteria['include']  = @$_POST['criteria']['include'];
            $criteria['exclude']  = @$_POST['criteria']['exclude'];

            $condition = array();
            
            $websiteList = $this->file_model->getWebsiteList($criteria);
            
            echo '<table border = "1px">';
            echo '<thead>
                    <th>Website URL</th>
                    <th>PR</th>
                    <th>DA</th>
                    <th>EMAIL</th>
                    <th>Comment</th>
                    <th>Note</th>
                    <th>ROOT</th>
                </thead>
            ';
            foreach ($websiteList as $website) {
                echo '<tr>';
                    echo '<td>'.$website['URL'].'</td>';
                    echo '<td>'.$website['DA'].'</td>';
                    echo '<td>'.$website['PR'].'</td>';
                    echo '<td>'.$website['email'].'</td>';
                    echo '<td>'.$website['comment'].'</td>';
                    echo '<td>'.$website['Note'].'</td>';
                    echo '<td>'.$website['ROOT'].'</td>';
                echo '</tr>';
                    $categories = $this->file_model->getCategories($website['websiteId'], $criteria);
                        foreach ($categories as $category) {
                            if ($criteria['category'] != 'Select') {
                                if ( $category['id'] != $criteria['category'])
                                    continue;
                            }
                            echo '<tr>';
                                    echo '<td colspan = "3"></td>';
                                    echo '<td colspan = "2"><b>Keywords</b></td>';
                                    echo '<td colspan = "2"><b>Count</b></td>';
                                    
                            echo '</tr>';
                                   $keywords = $this->file_model->getKeywords($category['id'], $website['websiteId']);
                                        $isKeywordIterationFirst = FALSE;
                                        foreach ($keywords as $keyword) {
                                            echo '<tr>';
                                                echo '<td colspan = "3"><b>';
                                            if ( !$isKeywordIterationFirst )
                                                echo $category['categoryName']; 
                                                echo '</b></td>';
                                                echo '<td colspan = "2">'.$keyword['keywords'].'</td>';
                                                echo '<td colspan = "2">'.$keyword['count'].'</td>';
                                            echo '</tr>';
                                            $isKeywordIterationFirst = TRUE;
                                        }
                            echo '</tr>';
                        }
                    //$keywords = $this->file_model->getKeywords($criteria, $value['id']);
                    /*foreach ($keywords as $key => $value) {
                        # code...
                    }*/
                echo '<tr>';
            }
            echo '</table>';
        }
    }

    /**
     * to redirect successfully registered users into members_area page.
     */
    function members_area()
    {
        $this->load->view('members_area');
    }

    /**
     * to redirect successfully registered users into statistics page.
     */
    function statistics()
    {
        $this->load->model('category_model');
        $this->load->model('analys_result_model');
        $data['main_content'] = 'pages/content';
        if(!empty($_GET['current'])) $data['current'] = $_GET['current'];
        $this->load->view('includes/template', $data);
    }

    /**
     * to redirect successfully registered users into dbmanager page.
     */
    function dbmanager()
    {
        $data['main_content'] = 'pages/dbmanager';
        $this->load->view('includes/template', $data);
    }
}