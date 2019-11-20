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
class MTst extends CI_Model
{
    public $tstTable = null;

    public function __construct()
    {
        parent::__construct();
        $this->tstTable = $this->db->dbprefix . "testimonies"; //auto assign table
        $this->userTable = $this->db->dbprefix . "users"; //auto assign table
    }

    //add new testimony
    public function add($data)
    {

        try {
             //insert to db
                    $data = array(
                        'ttitle' => $data['title'],
                        'tsummary' => $data['summary'],
                        'tdesc' => $data['desc'],
                        'tby' => $data['userId'],
                        'ttags' => $data['tags']
                                        );
                                        //insert into db
                        if(!$this->db->insert($this->tstTable, $data)){
                        //catch error if available
                        $dbas_error = $this->db->error();
                            if(!empty($dbas_error)){
                                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                                    return false; 
                                            };
                                        }
        return true;
        
        } 
        catch (Exception $e) {
            // this will not catch DB related `enter code here`errors. But it will include them, because this is more general. 
            log_message('error ',$e->getMessage());
            return;
        }

       
    

    }
    //delete messages by id
    public function delete($tid)
    {
        //insert to db
        $this->db->delete($this->tstTable, array('tid' => $tid));

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

    public function getAll()
    {
       $res = $this->db->get($this->tstTable);
        return $res->result_array();

    }

    public function getUserByTestimony(){
        $this->db->select('*');
        $this->db->from($this->tstTable);
        $this->db->join($this->userTable, $this->userTable . '.uid = '.$this->tstTable.'.tby' );
        $this->db->order_by('tid','DESC');
        $query = $this->db->get();
        return $query->result_array();
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