<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentications extends CI_Controller
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

    //welcome page as index
    public function index()
    {
        $meta['title'] = "Welcome";
        $meta['menu_num'] = -1;
        $this->load->view('page-signin', $meta);
    }

    //permissions
    public function permission()
    {
        //define dynamics metas
        $meta['title'] = 'Permission';
        $meta['menu_num'] = -1;
        $this->load->view('page-permission', $meta);
    }

    //create account
    public function login()
    {
        //check if login redirect for forgot
        if ($this->auth->islogged()) {
            redirect(base_url());
            return;
        }
        //define dynamics metas
        $meta['title'] = 'Login';
        $meta['menu_num'] = -1;
        $this->load->view('page-signin', $meta);
    }

    //create account
    public function createAccount()
    {
        //check if login redirect for forgot
        if ($this->auth->islogged()) {
            redirect(base_url());
            return;
        }
        //define dynamics metas
        $meta['title'] = 'Create Account';
        $meta['menu_num'] = -1;
        $this->load->view('page-create', $meta);
    }

    //create account
    public function reset()
    {
        //check if login redirect for forgot
        if ($this->auth->islogged()) {
            redirect(base_url());
            return;
        }
        //define dynamics metas
        $meta['title'] = 'Reset';
        $meta['menu_num'] = 0;
        $this->load->view('page-reset', $meta);
    }

    //reset link
    public function resetlink()
    {
        //check if login redirect for forgot
        if ($this->auth->islogged()) {
            redirect(base_url());
            return;
        }
        $token = $_GET['token'];
        $token = $this->muser->verifyToken($token);
        //define dynamics metas
        $meta['title'] = ('Reset Link');
        $meta['menu_num'] = 0;
        $meta['data'] = $token;
        $meta['token'] = @$_GET['token'];
        $this->load->view('page-reset-link', $meta);
    }
}
