<?php    
class Read extends CI_Model{
    function report(){
        $query = $this->db->query("SELECT * from absensi");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}