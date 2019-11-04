<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * Auth.php
 * 9:41 AM | 2019 | 10
 **/
const ssk = "1eca978ca8ed19c46b10c26f8f309db70532e700";
class Auth
{
    public $ctx = null;

    public function __construct()
    {
        $this->ctx = get_instance();
    }

    //server key
    public function checkssk()
    {
        if (!@isset($_GET['ssk']) || @$_GET['ssk'] != ssk) {
            //server handshake failed
            get_instance()->json->O("Please provide a valid handshake server key (ssk) to access api", true);
        }
    }

    //web login verifications
    public function islogged($redirect = false)
    {
        $chk = $this->ctx->session->has_userdata(SESSION_NAME);
        if (!$chk) {
            if ($redirect) {
                //redirect to login
                redirect(base_url("login"));
            } else {
                return false;
            }
        } else {
            return $this->ctx->session->userdata(SESSION_NAME);
        }
    }

    //get user session
    public function getUser()
    {
        $chk = $this->ctx->session->has_userdata(SESSION_NAME);
        if ($chk) {
            return $this->ctx->session->userdata(SESSION_NAME);
        } else {
            return false;
        }
    }

    //clear session
    public function logout()
    {
        $this->ctx->session->sess_destroy();
    }

    //validate and decode
    public function forceRole($expect = 0)
    {
        $userRole = (int)$this->getUser()['utype'];
        if($expect!=$userRole){
            //redirect to page not permitted
            redirect(base_url('permission'));
        }
    }
}