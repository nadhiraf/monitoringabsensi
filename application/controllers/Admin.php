<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        $this->load->model('Absen_Admin');
        $this->load->model('Karyawan_Admin');
    }

    public function index()
	{
		$this->load->helper('url');
        $this->load->helper('form');
		$this->load->view('View_Admin');

	
	}

	public function upload()
	{
		$this->load->view('View_UploadA');
	}

	public function grafik()
	{
		$this->load->model('Absen');

		$query = $this->Absen->total()->result();

            $data['coba']= $this->Absen->total()->result();

		$this->load->view('View_Grafik', $data);
	}

	public function tabel()
	{
		$pre = $this->Absen_Admin->get_list();

        $opt = array('' => 'All');
        foreach ($pre as $PRESENSI) {
            $opt[$PRESENSI] = $PRESENSI;
        }

        $data['form3'] = form_dropdown('',$opt,'','id="presensi" class="form-control"');

            $this->load->view('View_DataP', $data);
            $this->load->helper(array('url'));
	}

	public function datak()
	{
           // $this->load->model('karyawan');

            // $data['user']= $this->karyawan->show_data()->result();


        $kar = $this->Karyawan_Admin->get_list_countries();

        $opt = array('' => 'All');
        foreach ($kar as $LM) {
            $opt[$LM] = $LM;
        }

        $data['form'] = form_dropdown('',$opt,'','id="LM" class="form-control"');

            $this->load->view('View_DataK', $data);
            $this->load->helper(array('url'));

	}

	public function ajax_list()
    {
        // $from = $this->input->post('from');
        // $to = $this->input->post('to');

        // if($from!='' && $to!='')
        // {
        //     $from = date('Y-m-d',strtotime($from));
        //     $to = date('Y-m-d',strtotime($to));
        // }

        $list = $this->Absen_Admin->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $absensi) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $absensi->TGL_PRESENSI; 
            $row[] = $absensi->NIP;
            $row[] = $absensi->NAMA_PEGAWAI;
            $row[] = $absensi->PRESENSI;
            
            //add html for action
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Absen_Admin->count_all(),
            "recordsFiltered" => $this->Absen_Admin->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_list2()
    {
        $list = $this->Karyawan_Admin->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $employe) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $employe->id_user;
            $row[] = $employe->name;
            $row[] = $employe->LM;
            

            //add html for action
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Karyawan_Admin->count_all(),
            "recordsFiltered" => $this->Karyawan_Admin->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

}
