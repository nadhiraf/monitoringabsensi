<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Line_Manager extends CI_Controller {

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
        $this->load->model('Karyawan');
        $this->load->model('Absen');


    }

    public function index()
	{
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('View_LM');
		
	}

	public function datapl(){

        $pre = $this->Absen->get_list_countries();

        $opt = array('' => 'All');
        foreach ($pre as $presensi) {
            $opt[$presensi] = $presensi;
        }

        $data['form2'] = form_dropdown('',$opt,'','id="presensi" class="form-control"');

            $this->load->view('View_DataPL', $data);
            $this->load->helper(array('url'));
	}

	public function grafikm()
	{
		$this->load->model('Absen');

		if (isset($_POST['option'])){
    		$option = $_POST['option'];
		} else if (isset($_GET['option'])) {
    		$option = $_GET['option'];
		} else {
    		$option = 'chooseOption';
		}

		switch ($option) {
    		case 'Januari':
        	$iframe = $query = $this->Absen->total_lm1()->result();
        	break;
        	case 'Februari':
        	$iframe = $query = $this->Absen->total_lm2()->result();
        	break;
        	case 'Maret':
        	$iframe = $query = $this->Absen->total_lm()->result();
        	break;
        	case 'April':
        	$iframe = $query = $this->Absen->total_lm()->result();
        	break;
        	case 'Mei':
        	$iframe = $query = $this->Absen->total_lm()->result();
        	break;
        	case 'Juni':
        	$iframe = $query = $this->Absen->total_lm()->result();
        	break;
        	case 'Juli':
        	$iframe = $query = $this->Absen->total_lm()->result();
        	break;
        	case 'Agustus':
        	$iframe = $query = $this->Absen->total_lm()->result();
        	break;
        	case 'September':
        	$iframe = $query = $this->Absen->total_lm()->result();
        	break;
        	case 'Oktober':
        	$iframe = $query = $this->Absen->total_lm()->result();
        	break;
        	case 'November':
        	$iframe = $query = $this->Absen->total_lm()->result();
        	break;
        	case 'Desember':
        	$iframe = $query = $this->Absen->total_lm()->result();
        	break;
        	case 'All':
        	$iframe = $query = $this->Absen->total_lm()->result();
        	break;
    	
		}

		$query = $this->Absen->total_lm()->result();

            $data['hasil_count']= $this->Absen->total_lm()->result();

		$this->load->view('View_GrafikM', $data);
	}

	public function dataKM(){
		$this->load->model('karyawan');

            $data['fgd']= $this->karyawan->data_line()->result();

            $this->load->view('View_DataKM', $data);
            $this->load->helper(array('url'));
	}

    public function ajax_list()
    {
        $list = $this->Karyawan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $employee) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $employee->id_user;
            $row[] = $employee->name;
            $row[] = $employee->LM;
            

            //add html for action
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Karyawan->count_all(),
            "recordsFiltered" => $this->Karyawan->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_list2()
    {
        $list = $this->Absen->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $absent) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $absent->TGL_PRESENSI;
            $row[] = $absent->NIP;
            $row[] = $absent->NAMA_PEGAWAI;
            $row[] = $absent->PRESENSI;

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Absen->count_all(),
                        "recordsFiltered" => $this->Absen->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

}