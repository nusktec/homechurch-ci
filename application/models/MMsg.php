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
class MMsg extends CI_Model
{
    public $msgTable = null;

    public function __construct()
    {
        parent::__construct();
        $this->msgTable = $this->db->dbprefix . "messages"; //auto assign table
    }

    //add new messages
    public function add($data)
    {
        //insert to db

        return true;
    }

    //messages get
    public function get($param)
    {
        $this->db->where("mto", $param);
        $this->db->from($this->msgTable);
        $res = $this->db->get();
        return $res->result_array();
    }

    //messages notifications get
    public function getNotifications($param)
    {
        $this->db->where("mto", $param);
        $this->db->where("mstatus", 0);
        $this->db->from($this->msgTable);
        $res = $this->db->get();
        return $res->result_array();
    }

    //reset table update and verify
    public function markRead($nid, $ncomd)
    {

    }
}