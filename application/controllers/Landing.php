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
        $this->load->library('jsonparser', null, 'json');
        $this->load->library("auth");
        //load necessary library
        $this->auth->islogged(true);
    }

    //sign in methods
    public function index()
    {
        //define dynamics metas
        $meta['title'] = 'Home';
        $this->load->view('users/page-home', $meta);
    }

    //logout
    public function logout()
    {
        //clear session and set to login
        $this->auth->logout();
        redirect(base_url());
    }
}
