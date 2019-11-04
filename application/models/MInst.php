<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * MInst.php
 * 5:35 PM | 2019 | 10
 **/
class MInst extends CI_Model
{
    public $userInstitute = null;

    public function __construct()
    {
        parent::__construct();
        $this->userInstitute = $this->db->dbprefix . "institutions"; //auto assign table
    }

    //verify and find user login
    public function verify($email, $token)
    {
        try {
            $this->db->where("iemail", $email);
            $this->db->where("itoken", sha1($token));
            $this->db->from($this->userInstitute);
            $res = $this->db->get();
            return $res->row_array();
        } catch (Exception $e) {
            return false;
        }
    }

    //institution get
    public function get($param)
    {
        $this->db->where("iid", $param);
        $this->db->or_where("iemail", $param);
        $this->db->limit(1);
        $this->db->from($this->userInstitute);
        $res = $this->db->get();
        return $res->row_array();
    }

    //institution auth
    public function getByAuth($param)
    {
        $this->db->where("iauth", $param);
        $this->db->limit(1);
        $this->db->from($this->userInstitute);
        $res = $this->db->get();
        return $res->row_array();
    }

    //get institutions list
    public function getInstitutions()
    {
        $this->db->order_by('iid', 'DESC');
        $res = $this->db->get($this->userInstitute);
        return $res->result_array();
    }

}