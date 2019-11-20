<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    //make a parent controller
    public function __construct()
    {
        parent::__construct();
        //begin load libraries
        $this->load->database();
        $this->load->library('jsonparser', null, 'json');
        $this->load->library("auth");
        //load models
        $this->load->model('muser');
    }

    //sign in methods
    public function index()
    {
        if ($this->auth->islogged()) {
            //load next class based on user logged in user
            if ($this->auth->getUser() && (int)$this->auth->getUser()['utype'] === 1) {
                redirect(base_url('user'));
            } else {
                redirect(base_url('super'));
            }
        } else {
            //redirect to welcome
            redirect(base_url('welcome'));
        }
    }

    //logout
    public function logout()
    {
        $this->auth->islogged(true);
        //clear session and set to login
        $this->auth->logout();
        redirect(base_url());
    }

    public function welcome()
    {
        $this->load->view('page-welcome');
    }

    //404 error page
    public function error_404()
    {
        $this->load->view('errors/html/error_404');
    }
}
