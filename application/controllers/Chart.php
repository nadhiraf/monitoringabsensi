<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Chart extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Read');
    }
    public function index()
    {
        $data['report'] = $this->Read->report();
        $this->load->view('View_Grafik', $data);
    }
}