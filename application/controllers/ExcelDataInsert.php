<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ExcelDataInsert extends CI_Controller
{

public function __construct() {
        parent::__construct();
                $this->load->library('Excel');//load PHPExcel library 
		//$this->load->model('upload_model');//To Upload file in a directory
                $this->load->model('excel_data_insert_model');
}	

public function index(){
  $this->load->view('View_UploadBaru');
}
	
public	function ExcelDataAdd()	{  
//Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/uploads/excel/)	 
         $configUpload['upload_path'] = FCPATH.'uploads/excel/';
         $configUpload['allowed_types'] = 'xls|xlsx|csv';
         $configUpload['max_size'] = '5000';
         $this->load->library('upload', $configUpload);
         $this->upload->do_upload('userfile');	
         $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
         $file_name = $upload_data['file_name']; //uploded file name
		 $extension=$upload_data['file_ext'];    // uploded file extension
		
//$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
 $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
          $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load(FCPATH.'uploads/excel/'.$file_name);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
          for($i=2;$i<=$totalrows;$i++)
          {
              //$TGL_PRESENSI = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();			
              $NIP = $objWorksheet->getCellByColumnAndRow(1, $i)->getValue(); //Excel Column 1
			  $NAMA_PEGAWAI = $objWorksheet->getCellByColumnAndRow(2, $i)->getValue(); //Excel Column 2
			  $PRESENSI = $objWorksheet->getCellByColumnAndRow(3, $i)->getValue(); //Excel Column 3
			  $data_user = array('NIP'=>$NIP, 'NAMA_PEGAWAI'=>$NAMA_PEGAWAI,'PRESENSI'=>$PRESENSI);
			  $this->excel_data_insert_model->Add_User($data_user);
              
						  
          }
            // unlink('././uploads/excel/'.$file_name); //File Deleted After uploading in database .			 
             redirect('Welcome/User');	           
       
     }
	
}
?>