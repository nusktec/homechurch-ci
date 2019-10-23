<?php

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
        $this->db->set('udob', $data['dob']);
        $this->db->set('ugender', $data['gender']);
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

    //reset table update and verify
    public function resetupdate($token, $updat = false)
    {

    }
}