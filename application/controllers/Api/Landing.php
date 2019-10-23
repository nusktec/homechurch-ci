<?php

/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * Welcome.php
 * 9:04 AM | 2019 | 10
 **/
class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('jsonparser', null, 'json');
    }

    public function index()
    {
        $this->json->O(array(
            "developer" => "RSC Byte Limited Web Technology",
            "status" => "Api Based directory",
            "info" => "Use api document to begin coding",
            "time" => date("d.m.Y H:i:s")
        ), TRUE);
    }

    public function _remap(){
        $this->json->O(array(
            "developer" => "RSC Byte Limited Web Technology",
            "status" => "Invalid Route Url",
            "info" => "Use api document to begin coding",
            "time" => date("d.m.Y H:i:s")
        ), TRUE);
    }
}