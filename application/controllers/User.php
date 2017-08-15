<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
        parent::__construct();
        
    }

    public function index()
	{
		$this->load->view('View_User');
	
 	}

	public function tabel2()
	{
		$this->load->model('User2');

		$query = $this->User2->hitung_data()->result();

            $data['abc']= $this->User2->ambil_data()->result();
            $data['def']= $this->User2->hitung_data()->result();

            $this->load->view('View_DataO', $data);
            $this->load->helper(array('url'));

        	function search_keyword()
    		{
        	$data2['cari'] = $this->Absen->search();
        	$this->load->view('View_DataP', $data2);
    		}
	}
}