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

const SUPER_ROLE = 2;

class Profile extends CI_Controller
{
    public $uid = null;
    public $uemail = null;
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
        //force to login
        $this->utemp = $this->auth->islogged(true);
        //quick assign id now
        $this->uid = $this->utemp['uid'];
        $this->uemail = $this->uemail['uemail'];
        //main default loader
        $this->institue = $this->minst->get($this->utemp['uinstitute']); //load institutions
        $this->user = $this->muser->get($this->utemp['uemail']);
        //trigger roles
        $this->auth->forceRole(SUPER_ROLE);
    }

    //dashboard loader
    //first menu 7 home page
    public function index()
    {
        $meta['title'] = "Profile"; //title
        $meta['desc'] = "Home Church"; //description
        $meta['rm'] = 7; //menu num
        $meta['menu_num'] = -1; //active menu code
        $meta['user'] = $this->user; //user data
        $meta['utype'] = (int)$this->user['utype']; //user data
        $meta['avatar'] = $this->muser->profileImg($this->uid, $this->utemp['ugender']) . ".png?cache" . rand(111, 999); //profile pics
        $meta['notifications'] = $this->mnoti->get($this->uid); //notifications data
        $meta['msgalerts'] = $this->mmsg->getNotifications($this->uid); //messages alerts iterations
        $meta['script'] = ['super-home', 'top-bar', 'super-profile']; //script to be loaded
        //load child view first
        $meta['contents'] = $this->load->view("super/super-profile", $meta, true);
        $this->load->view("layout/template", $meta);
    }

}