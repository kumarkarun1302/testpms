<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__.'/../vendor/autoload.php';

class Mpdf {

    public function __construct()
    {
        $this->CI =& get_instance();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();
    }


}