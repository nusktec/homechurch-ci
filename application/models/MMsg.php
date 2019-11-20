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
        $this->userTable = $this->db->dbprefix . "users"; //auto assign table
    }

    //add new messages
    public function send($data)
    {
        //insert to db
        $data = array(
            'mfrom' => $data['mfrom'],
            'mto' => $data['mto'],
            'mbody' => $data['mbody'],
            'mtitle' => $data['mtitle']
    );
    
    $this->db->insert($this->msgTable, $data);

        return true;
    }
    //delete messages by id
    public function delete($mid)
    {
        //insert to db
        $this->db->delete($this->msgTable, array('mid' => $mid));

        return true;
    }

    //messages get
    public function getMessageTo($param)
    {
        $this->db->where("mto", $param);
        $this->db->from($this->msgTable);
        $this->db->join($this->userTable, $this->userTable . '.uid = '.$this->msgTable.'.mfrom');
        $this->db->order_by('mcreated','DESC');
        $res = $this->db->get();
        return $res->result_array();
      
    }
    public function getMessageFrom($param)
    {
        $this->db->where("mfrom", $param);
        $this->db->from($this->msgTable);
        $this->db->join($this->userTable, $this->userTable . '.uid = '.$this->msgTable.'.mto');
        $this->db->order_by('mcreated','DESC');
        $res = $this->db->get();
        return $res->result_array();
      
    }
    public function getAll()
    {
       $res = $this->db->get($this->msgTable);
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