<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $this->load->model('memail'); //email model
        $this->load->model('muser'); //user model
        $this->load->model('minst'); //institutions model
        $this->load->model('minst'); //institutions model
        $this->load->model('mmsg'); //institutions model
        $this->load->model('mtst'); //institutions model
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
        $error = "Incomplete form, reload and try again";
        $status = true;
        //get data filtered
        $data = $this->json->G();
        //first check existence
        if (!$data) {
            $this->json->O(array("status" => false, "data" => [], "msg" => $error), true);
            return;
        }
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
        if (!strlen($data['phone']) > 10 || !is_numeric($data['phone'])) {
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
        if (count($this->muser->get($data['email'])) > 0 && $status) {
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
                //check if account is blocked
                if ((int)$findVerify['ustatus'] === 1) {
                    $error = "Successfully logged !";
                    $status = true;
                    //if its web, make a session
                    if ($agent == 'web') {
                        //start session keeping
                        $this->session->set_userdata(SESSION_NAME, $findVerify);
                    }
                } else {
                    $error = "Your account has been locked by the administrator.";
                    $status = false;
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
                $link = base_url('resetlink?token=') . $token;
                $body = "You have requested for password reset, use the link below to reset it <a href='" . $link . "'>Reset Now</a><br>Otherwise, ignore this email";
                $this->memail->send("PSA | Reset Password", $lookup['uemail'], $body);
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
        $error = "Not a valid data passed";
        $status = true;
        $rawjson = [];

        //get raw inouts
        $data = $this->json->G();
        if (!$data) {
            $this->json->O(array("status" => false, "data" => [], "msg" => $error), true);
            return;
        }
        //check password length and equality
        if (strlen($data['pass1']) < 5 || strlen($data['pass2']) < 5) {
            $error = "Password too short, review it and try again !";
            $status = false;
        }
        //check if the same
        if ($data['pass1'] != $data['pass2']) {
            $error = "Password mis-matched, try again";
            $status = false;
        }
        //check token availability
        if (strlen($data['token']) < 30) {
            $error = "Broken reset link or forge, try again";
            $status = false;
        }
        //express update
        if ($status) {
            $upd = $this->muser->updatePassword($data['pass1'], $data['token']);
            if ($upd) {
                $error = "Password changed successfully, happy login !";
                $status = true;
            } else {
                $error = "Unable to change password at the moment, try again";
                $status = false;
            }
        }
        $this->json->O(array("status" => $status, "data" => [], "msg" => $error), true);
    }

    //update user dp
    public function updatedp()
    {
        $error = "Not a valid data passed";
        $status = true;
        $rawjson = [];

        //get raw inouts
        $data = $this->json->G();
        if (!$data) {
            $this->json->O(array("status" => false, "data" => [], "msg" => $error), true);
            return;
        }
        //get image data
        file_put_contents(assets_path . "/img/profiles/" . sha1($data['uid']) . ".png", base64_decode($data['base64']));
        $error = "Image uploaded !";
        $this->json->O(array("status" => true, "data" => [], "msg" => $error), true);
    }

    //update info
    public function updateInfo()
    {
        $error = "Not a valid data passed";
        $status = true;
        $rawjson = [];

        //get raw inouts
        $data = $this->json->G();
        if (!$data) {
            $this->json->O(array("status" => false, "data" => [], "msg" => $error), true);
            return;
        }
        $uid = $data['uid'];
        //start main function
        unset($data['upass']);
        unset($data['uemail']);
        unset($data['ustatus']);
        unset($data['utype']);
        unset($data['uid']);
        //$this->json->O(array("status" => true, "data" => $data, "msg" => $uid), true);
        //make an update
        if ($this->muser->updateInfo($uid, $data)) {
            $error = "Success !";
            $this->json->O(array("status" => true, "data" => $data, "msg" => $error), true);
        } else {
            $error = "Error updating";
            $this->json->O(array("status" => false, "data" => $data, "msg" => $error), true);
        }
    }

    //template
    public function template()
    {
        $error = "Not a valid data passed";
        $status = true;
        $rawjson = [];

        //get raw inouts
        $data = $this->json->G();
        if (!$data) {
            $this->json->O(array("status" => false, "data" => [], "msg" => $error), true);
            return;
        }
        //
    }
    public function addMsg()
    {
        $error = "Not a valid data passed";
        $status = true;
        $rawjson = [];

        //get raw inouts
        $data = $this->json->G();
        if (!$data) {
            $this->json->O(array("status" => false, "data" => [], "msg" => $error), true);
            return;
        }
        //
    }
    public function delMsg()
    {
        $error = "Not a valid data passed";
        $status = true;
        $rawjson = [];

        //get raw inouts
        $data = $this->json->G();
        if (!$data) {
            $this->json->O(array("status" => false, "data" => [], "msg" => $error), true);
            return;
        }
        //
        if ($this->mtst->create($data)) {
            $error = "Success !";
            $this->json->O(array("status" => true, "data" => $data, "msg" => $error), true);
        } else {
            $error = "Error deleting message";
            $this->json->O(array("status" => false, "data" => $data, "msg" => $error), true);
        }
    }
    public function createTstm()
    {
        $error = "Not a valid data passed";
        $status = true;
        $rawjson = [];
        
        //get raw inouts
        $data = $this->json->G();
        if (!$data) {
            $this->json->O(array("status" => false, "data" => [], "msg" => $error), true);
            return;
        }
        //
        
        if ($this->mtst->add($data)) {
            $error = "Success !";
            $this->json->O(array("status" => true, "data" => $data, "msg" => $error), true);
        } else {
            $error = "Error deleting message";
            $this->json->O(array("status" => false, "data" => $data, "msg" => $error), true);
        }
    }
    public function delTstm()
    {
        $error = "Not a valid data passed";
        $status = true;
        $rawjson = [];
    
        //get raw inouts
        $data = $this->json->G();
        if (!$data) {
            $this->json->O(array("status" => false, "data" => [], "msg" => $error), true);
            return;
        }
        //
        if ($this->mtst->delete($data)) {
            $error = "Success !";
            $this->json->O(array("status" => true, "data" => $data, "msg" => $error), true);
        } else {
            $error = "Error deleting message";
            $this->json->O(array("status" => false, "data" => $data, "msg" => $error), true);
        }
    }
    
    
}