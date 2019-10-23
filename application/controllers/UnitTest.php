<?php

/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * Test.php
 * 5:53 AM | 2019 | 10
 **/
class UnitTest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('muser');
    }

    public function index()
    {
        $praram = @$_GET['cmd'];
        $n = "AMeh friday ";
        echo substr($n, -1);
    }
}
