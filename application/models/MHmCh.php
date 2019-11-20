<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * MUser.php
 * 12:36 PM | 2019 | 10
 **/
class MHmCh extends CI_Model
{
    public $shTable = null;

    public function __construct()
    {
        parent::__construct();
        $this->shTable = $this->db->dbprefix . "submit_home"; //auto assign table
        $this->userTable = $this->db->dbprefix . "users"; //auto assign table
    }

    //add new testimony
    public function submitHome($data)
    {

        try {
            //insert to db
            $data = array(
                'sh_users_id' => $data['uid'],
                'sh_address' => $data['address'],
                'sh_address' => $data['address2'],
                'sh_address2' => $data['status'],
                'sh_church_location_id' => $data['clocation']
            );
            //insert into db
            if (!$this->db->insert($this->shTable, $data)) {
                //catch error if available
                $dbas_error = $this->db->error();
                if (!empty($dbas_error)) {
                    throw new Exception('Database error! Error Code [' . $dbas_error['code'] . '] Error: ' . $dbas_error['message']);
                    return false;
                };
            }
            return true;
        } catch (Exception $e) {
            // this will not catch DB related `enter code here`errors. But it will include them, because this is more general. 
            log_message('error ', $e->getMessage());
            return;
        }
    }
    //delete messages by id
    public function delete($tid)
    {
        //insert to db
        $this->db->delete($this->shTable, array('tid' => $tid));

        return true;
    }

    //messages get
    public function getSH($param)
    {
        $this->db->where("sh_users_id", $param);
        $this->db->from($this->shTable);
        $res = $this->db->get();
        return $res->result_array();
    }
/** Get all Submited Home (ADMIN) */
    public function getAll()
    {
        $res = $this->db->get($this->shTable);
        return $res->result_array();
    }

    //reset table update and verify
    public function markRead($nid, $ncomd)
    { }
}
