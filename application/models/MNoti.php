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
class MNoti extends CI_Model
{
    public $notiTable = null;

    public function __construct()
    {
        parent::__construct();
        $this->notiTable = $this->db->dbprefix . "notifications"; //auto assign table
    }

    //add new notifications
    public function add($data)
    {
        //insert to db

        return true;
    }

    //notifications get
    public function get($param)
    {
        $this->db->where("nuid", $param);
        $this->db->from($this->notiTable);
        $res = $this->db->get();
        return $res->result_array();
    }

    //reset table update and verify
    public function markRead($nid, $ncomd)
    {

    }
}