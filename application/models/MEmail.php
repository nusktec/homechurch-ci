<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * Email.php
 * 6:14 PM | 2019 | 10
 **/
class MEmail extends CI_Model
{
    public $ctx = null;

    public function __construct()
    {
        parent::__construct();
        $this->ctx =& get_instance();
    }

    //send an email
    public function send($sub = "WCH-Password Rest", $to, $body = "Message was empty")
    {
        //custom settings for email
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'voidvoidburst@gmail.com', //change it to yours
            'smtp_pass' => '1994@17+14693', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        $message = $body;
        $this->ctx->load->library('email', $config);
        $this->ctx->email->set_newline("\r\n");
        $this->ctx->email->from(config_item('meta')['su-email']); // change it to yours
        $this->ctx->email->to($to);// change it to yours
        $this->ctx->email->subject($sub);
        $this->ctx->email->message($message);
        if ($this->ctx->email->send()) {
            return true;
        } else {
            return false;
        }
    }
}