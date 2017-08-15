<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Model {

    public function upload_data($filename){
        ini_set('memory_limit', '-1');
        $inputFileName = './assets/uploads/'.$filename;
        try {
        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
        } catch(Exception $e) {
        die('Error loading file :' . $e->getMessage());
        }

        $worksheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $numRows = count($worksheet);

        for ($i=1; $i < ($numRows+1) ; $i++) { 
            $tgl_asli = str_replace('-Jan-', ' January ', $worksheet[$i]['A']);
            $tgl_asli = str_replace('Januari', 'January', $tgl_asli);
            $tgl_asli = str_replace('-Feb-', ' February ', $tgl_asli);
            $tgl_asli = str_replace('Februari', 'February', $tgl_asli);
            $tgl_asli = str_replace('-Mar-', ' March ', $tgl_asli);
            $tgl_asli = str_replace('Maret', 'March', $tgl_asli);
            $tgl_asli = str_replace('-Apr-', ' April ', $tgl_asli);
            $tgl_asli = str_replace('Mei', 'May', $tgl_asli);
            $tgl_asli = str_replace('Juni', 'June', $tgl_asli);
            $tgl_asli = str_replace('Juli', 'July', $tgl_asli);
            $tgl_asli = str_replace('-Agt-', 'August', $tgl_asli);
            $tgl_asli = str_replace('Agustus', 'August', $tgl_asli);
            $tgl_asli = str_replace('-Sept-', ' September ', $tgl_asli);
            $tgl_asli = str_replace('-Okt-', ' October ', $tgl_asli);
            $tgl_asli = str_replace('Oktober', 'October', $tgl_asli);
            $tgl_asli = str_replace('-Nop-', ' November ', $tgl_asli);
            $tgl_asli = str_replace('Nopember', 'November', $tgl_asli);
            $tgl_asli = str_replace('-Des-', ' December ', $tgl_asli);
            $tgl_asli = str_replace('Desember', 'December', $tgl_asli);

            $date = date('Y-m-d', strtotime(str_replace('-', '/', $tgl_asli)));


            $ins = array(
                    "TGL_PRESENSI"          => $date,
                    "NIP"   => $worksheet[$i]["B"],
                    "NAMA_PEGAWAI" => $worksheet[$i]["C"],
                    "PRESENSI" => $worksheet[$i]["D"]
                   );

            $this->db->insert('absensi', $ins);
        }
    }

}

/* End of file Phpexcel_model.php */
/* Location: ./application/models/Phpexcel_model.php */