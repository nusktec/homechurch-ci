<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * Landing.php
 * 10:25 AM | 2019 | 10
 **/

const SUPER_ROLE = 1;

class submitHome extends CI_Controller
{
    public $uid = null;
    public $utemp = null;
    public $user = null;

    //instantiate
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('jsonparser', null, 'json'); //load json parser
        $this->load->library('auth');
        $this->load->model('memail'); //email model
        $this->load->model('muser'); //user model
        $this->load->model('mmsg'); //messages model
        $this->load->model('mnoti'); //notifications model
        $this->load->model('mhmch'); //notifications model
        //force to login
        $this->utemp = $this->auth->islogged(true);
        //quick assign id now
        $this->uid = $this->utemp['uid'];
        //main default loader
        $this->user = $this->muser->get($this->uid);
        //trigger roles
        $this->auth->forceRole(SUPER_ROLE);
    }


    //dashboard loader
    //first menu 1 home page
    public function index()
    {
        $meta['title'] = "Submit Home"; //title
        $meta['desc'] = "Submit Home Details"; //description
        $meta['rm'] = 4; //right menu num
        $meta['user'] = $this->user; //user data
        $meta['avatar'] = $this->muser->profileImg($this->uid, $this->utemp['ugender']) . ".png?" . rand(111, 999);//profile pics
        $meta['notifications'] = $this->mnoti->get($this->uid); //notifications data
        $meta['getSH'] = $this->mhmch->getSH($this->uid); //messages alerts iterations
        $meta['script'] = ['user-home', 'side-bar','helpers','user-submit-home']; //script to be loaded in array
        //load child view first
        $meta['contents'] = $this->load->view("user/page-submit-home", $meta, true);
        $this->load->view("layout/template", $meta);
    }

}