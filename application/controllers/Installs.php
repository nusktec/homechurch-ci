<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: revelation
 * Date: 10/19/19
 * Time: 8:17 PM
 */
class Installs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
        $this->load->library('jsonparser', null, 'json'); //json parser
    }

    //index
    public function index()
    {
        $this->json->O("Proceed with a valid command", true);
    }

    //start creating user table
    public function Create($arg = null)
    {
        //start differentiating
        switch ($arg) {
            case 'user':
                $this->userTable();
                break;
            case 'reset':
                $this->userResetTable();
                break;
            case 'notification':
                $this->userNotifications();
                break;
            case 'message':
                $this->userMessages();
                break;    
            case 'testimony':
                $this->userTestimonies();
                break;    
            case 'migrate_all':
                $this->userTestimonies();
                $this->userTable();
                $this->userResetTable();
                $this->userNotifications();
                $this->userMessages();
                break;    
            default:
                $this->json->O("Not a valid command", true);
        }
    }

    //user table created
    private function userTable()
    {
        //start creating user tables
        $usersTable = array(
            'uid' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ),
            'uname' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'uemail' => array(
                'type' => 'VARCHAR',
                'constraint' => '150',
                'unique' => true,
                'null' => false
            ),
            'uphone' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ),
            'upass' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => false
            ),
            'ucountry' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'ustate' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'uaddress' => array(
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => true
            ),
            'ugender' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'utype' => array(
                'type' => 'INT',
                'constraint' => 5,
                'default' => 1
            ),
            'ustatus' => array(
                'type' => 'INT',
                'constraint' => 5,
                'default' => 1
            ),
        );
        $this->dbforge->add_key('uid'); //primary key added
        $this->dbforge->add_field($usersTable);
        $this->dbforge->add_field(['ucreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']);
        $this->dbforge->create_table('users');
        $this->json->O("User table created...", true);
    }

    //user rest tables
    private function userResetTable()
    {
        $userReset = array(
            'rid' => array(
                'type' => 'INT',
                'auto_increment' => true,
                'constraint' => 11,
            ),
            'ruemail' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'unique' => true
            ),
            'rtoken' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'rstatus' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ),
        );
        //add key to rid
        $this->dbforge->add_key('rid'); //primary key added
        $this->dbforge->add_field($userReset);
        $this->dbforge->add_field(['rtime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']);
        $this->dbforge->create_table('resets');
        $this->json->O("Reset table created...", true);
    }

    //user notifications table
    private function userNotifications()
    {
        $notifications = array(
            'nid' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ),
            'nuid' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'nbody' => array(
                'type' => 'TEXT',
                'constraint' => '1024',
            ),
            'nstatus' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            )
        );

        //make the first field a primary key
        $this->dbforge->add_key('nid');
        $this->dbforge->add_field($notifications);
        $this->dbforge->add_field(['ncreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']);
        $this->dbforge->create_table('notifications');
        $this->json->O("Notification table created...", true);
    }

    //user messages table
    private function userMessages()
    {
        $messages = array(
            'mid' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ),
            'mfrom' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'mto' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'mbody' => array(
                'type' => 'TEXT',
                'constraint' => '1024',
            ),
            'mstatus' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ),
            'mtitle' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            )
        );

        if( $this->db->table_exists('rs_messages') ){

            $query = "DROP TABLE rs_messages;";

            $this->db->query($query);

        } 
        //make the first field a primary key
        $this->dbforge->add_key('mid');
        $this->dbforge->add_field($messages);
        $this->dbforge->add_field(['mcreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']);
        $this->dbforge->create_table('messages');
        $this->json->O("Messages table created...", true);
    }
    private function userTestimonies()
    {
        $testimonies = array(
            'tid' => array(
                'type' => 'INT',
                'constraint' => 111,
                'auto_increment' => true,
            ),
            'tby' => array(
                'type' => 'INT',
                'constraint' => 111,
            ),
            'tsummary' => array(
                'type' => 'TEXT',
                'constraint' => 205,
            ),
            'ttags' => array(
                'type' => 'TEXT',
                'constraint' => 30,
            ),
            'tdesc' => array(
                'type' => 'TEXT',
                'constraint' => '1024'
            ),
            'ttitle' => array(
                'type' => 'TEXT',
                'constraint' => 21,
                
            )
        );

        //make the first field a primary key
        $this->dbforge->add_key('tid');
        $this->dbforge->add_field($testimonies);
        $this->dbforge->add_field(['tcreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']);
        $this->dbforge->create_table('testimonies');
        $this->json->O("testimony table created...", true);
    }
}