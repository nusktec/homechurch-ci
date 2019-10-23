<?php

/**
 * Created by PhpStorm.
 * User: revelation
 * Date: 10/20/19
 * Time: 8:52 AM
 */
class User extends CI_Controller
{
    public $userTable = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('jsonparser', null, 'json'); //load json parser
        $this->load->library('auth');
        $this->load->model('memail');
        $this->load->model('muser');
        //formulate tables
        $this->userTable = $this->db->dbprefix . "users";
        //start every authentications
        $this->auth->checkssk();
    }

    //start indexing
    public function index()
    {
        $this->json->O("Welcome to global user api (Use the document to begin)", TRUE);
    }

    //create user
    public function create()
    {
        $error = "";
        $status = true;
        //get data filtered
        $data = $this->json->G();
        //check for email validate, password match
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email address, review it and try again !";
            $status = false;
        }
        //space name
        $n = $data['name'];
        if ($n[0] === " " || substr($n, -1) === " ") {
            $error = "Invalid name(s) format, check for white spaces ending/beginning";
            $status = false;
        }
        if (strpos($n, " ") === false) {
            $error = "Full name(s) not well arranged, include white space between";
            $status = false;
        }
        if (!strlen($data['phone']) > 10) {
            $error = "Invalid phone number, review it and try again !";
            $status = false;
        }
        if (strlen($data['pass1']) < 5) {
            $error = "Password too short, review it and try again !";
            $status = false;
        }
        if ($data['pass1'] != $data['pass2']) {
            $error = "Password mis-matched, review it and try again !";
            $status = false;
        }
        //check if user exist
        if (count($this->muser->get($data['email'])) > 0) {
            $status = false;
            $error = "User email already exist";
        }
        if ($status) {
            $this->muser->add($data);
            $error = "Successfully registered, redirect login in 3sec";
            $status = true;
        }
        //insert successful !
        $this->json->O(array("status" => $status, "data" => array(), "msg" => $error), true);
    }

    //login user
    public function login($agent = 'web')
    {
        $error = "Do not display this error (Dev only)";
        $status = false;
        //get data filtered
        $data = $this->json->G();
        if (!$data) {
            $this->json->O(array("status" => $status, "data" => [], "msg" => $error), true);
            return;
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email address, review it and try again !";
            $status = false;
        }
        if (strlen($data['pass1']) < 5) {
            $error = "Password length too small";
            $status = false;
        }
        $email = $data['email'];
        $pass = $data['pass1'];
        $status = true;
        if ($status) {
            $findVerify = $this->muser->verify($email, $pass);
            if ($findVerify) {
                $error = "Successfully logged !";
                $status = true;
                //if its web, make a session
                if ($agent == 'web') {
                    //start session keeping
                    $this->session->set_userdata("user", $findVerify);
                }
            } else {
                $error = "No matched records found ! (Email, Password)";
                $status = false;
            }
        }
        //outputting
        $this->json->O(array("status" => $status, "data" => $findVerify, "msg" => $error), true);
    }

    //reset password
    public function reset()
    {
        $error = "No valid email passed";
        $status = false;
        $rawjson = [];

        //get raw inouts
        $data = $this->json->G();
        if (!$data) {
            $this->json->O(array("status" => $status, "data" => [], "msg" => $error), true);
            return;
        }
        //check if it's email address
        $email = $data['email'];
        $status = true;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $status = false;
            $error = "Invalid email address";
        }
        //check if the mail exist
        if ($status) {
            $lookup = $this->muser->get($email);
            if ($lookup) {
                //sent a rest link to user email
                $name = explode(" ", $lookup['uname'])[0];
                $rawjson = $lookup;
                //update reset table
                $date = new DateTime();
                $token = sha1($date->getTimestamp());
                //update user reset table
                $rdata['rtoken'] = $token;
                $rdata['ruemail'] = $lookup['uemail'];
                $this->muser->reset($rdata);
                //send email now
                $link = base_url('resetlink/') . $token;
                $body = "You have requested for password reset, use the link below to reset it <a href='" . $link . "'>Reset Now</a><br>Otherwise, ignore this email";
                $this->memail->send("HCW | Reset Password", $lookup['uemail'], $body);
                //output now
                $error = strtolower($name) . ", a reset link has been sent to your mail.";
                $status = true;
            } else {
                $status = false;
                $error = "No record(s) matched (Invalid email address)";
            }
        }
        //final output
        $this->json->O(array("status" => $status, "data" => $rawjson, "msg" => $error), true);
    }

    //reset link verify
    public function resetlink()
    {

    }
}