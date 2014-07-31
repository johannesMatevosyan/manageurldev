<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*************************************************
** File: login.php  **
** Date: 03.05.2014     **
** Time: 12:31 PM    **
** @author Hovhannes Matevosyan **
** Description: This Controller performs users login & registration, also validates them**
*************************************************
*/

class Login extends CI_Controller{

    /**
     * load log in log in form
     */
    function index()
    {
        $data['main_content'] = 'login_form';
        $this->load->view('includes/template', $data);
    }

    /**
     * validate_credentials() function grabs username and password values from log in form
     */
    function validate_credentials()
    {
        $this->load->model('membership_model');
        $query = $this->membership_model->validate();

        /**
         * to check if the user's credentials are validated
         */
        if($query)
        {
            $row[0] = array();
            $role[] = array();

            $permission = $this->pages_model->get_perm_type($this->input->post('username'));

            foreach($permission as $value)
            {
                $role[$value->pagename] = $value->type;
            }
            $role['username'] = $permission[0]->username;
            $role['is_logged_in'] = true;


            /**
             * take $data array and add it to the user specific session
             */
            $this->session->set_userdata($role);
            redirect('site/statistics');
        }
        else
        {
            $this->index();
        }

    }//validate_credentials

    /**
     * signup() function is used to sign up new users from registration form
     */
    function signup()
    {
        $data['main_content'] = 'signup_form';
        $this->load->view('includes/template', $data);
    }//signup

    /**
     * create_member() function to perform a validation from registration form
     */
    function create_member()
    {
        $this->load->library('form_validation');

         //   field name,  error message,  validation rules
        $this->form_validation->set_rules('first_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('password2', 'Password Cofirmation', 'trim|required|matches[password]');

        /**
         * If validation is not passed, then the user is redirected to sign up form
         */
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('signup_form');
        }
        else
        {
            $this->load->model('membership_model');
            if($query = $this->membership_model->create_member())
            {
                $data['main_content'] = 'signup_successful';
                $this->load->view('includes/template', $data);
            }
            else
            {
                $this->load->view('signup_form');
            }
        }
    }//create_member

    /**
     * function for log out
     */
    function logout()
    {
        $this->session->sess_destroy();
        $this->index();
    }//logout

}