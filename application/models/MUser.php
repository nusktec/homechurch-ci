<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * MUser.php
 * 12:36 PM | 2019 | 10
 **/
class MUser extends CI_Model
{
    public $userTable = null;
    public $userReset = null;

    public function __construct()
    {
        parent::__construct();
        $this->userTable = $this->db->dbprefix . "users"; //auto assign table
        $this->userReset = $this->db->dbprefix . "resets"; //auto assign table
    }

    //add new user
    public function add($data)
    {
        //insert to db
        $this->db->set('uname', $data['name']);
        $this->db->set('uemail', $data['email']);
        $this->db->set('uphone', $data['phone']);
        $this->db->set('upass', sha1($data['pass1']));
        $this->db->set('ugender', $data['gender']);
        $this->db->set('ucountry', $data['country']);
        $this->db->set('ustate', $data['state']);
        $this->db->set('uaddress', $data['address']);
        $this->db->insert($this->userTable);
        return true;
    }

    //verify and find user login
    public function verify($email, $pass)
    {
        try {
            $this->db->where("uemail", $email);
            $this->db->where("upass", sha1($pass));
            $this->db->from($this->userTable);
            $res = $this->db->get();
            return $res->row_array();
        } catch (Exception $e) {
            return false;
        }
    }

    //user get
    public function get($param)
    {
        $this->db->where("uid", $param);
        $this->db->or_where("uemail", $param);
        $this->db->limit(1);
        $this->db->from($this->userTable);
        $res = $this->db->get();
        return $res->row_array();
    }


    //user rest updates
    public function reset($rdata = null)
    {
        return $this->db->on_duplicate($this->userReset, array('ruemail' => $rdata['ruemail'], 'rtoken' => $rdata['rtoken'], 'rstatus' => 0));
    }

    //verify reset token
    public function verifyToken($token)
    {
        $this->db->where("rtoken", $token);
        $this->db->where("rstatus", 0);
        $this->db->from($this->userReset);
        $this->db->join($this->userTable, $this->userTable . ".uemail=" . $this->userReset . ".ruemail");
        $res = $this->db->get();
        return $res->row_array();
    }

    //reset table update and verify
    public function updatePassword($pass, $token)
    {
        //re-verify token supplied
        $conf_token = $this->verifyToken($token);
        if ($conf_token) {
            //change password
            $this->db->set("upass", sha1($pass));
            $this->db->where("uemail", $conf_token['uemail']);
            $this->db->update($this->userTable);
            //update reset table now
            $this->db->set("rstatus", 1, FALSE);
            $this->db->where("ruemail", $conf_token['uemail']);
            $this->db->update($this->userReset);
            return true;
        } else {
            return false;
        }
    }

    //get profile image
    public function profileImg($id = 0, $g = "M")
    {
        //convert id to sha1 for image lookup
        $g = ($g == "F" ? 'av_girl' : 'av_man');
        //check of real image exist
        $imagepath = assets_path . "/img/profiles/" . sha1($id) . ".png";
        if (file_exists($imagepath)) {
            //return valid image name
            return sha1($id);
        } else {
            return $g;
        }
    }

    //update info
    public function updateInfo($id, $data)
    {
        $this->db->where('uid', $id);
        return $this->db->update($this->userTable, $data);
    }


    public function getAll ($fn)
    {
        $this->db->where("uid !=",$fn);
        $res = $this->db->get($this->userTable);
        return $res->result_array();
        
    }
}