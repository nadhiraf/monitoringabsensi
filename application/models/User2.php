<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class User2 extends CI_Model {

        public function cek_user($data) {
            $query = $this->db->get_where('user', $data);
            return $query;
        }

        function ambil_data(){
        			//$query = $this->db->query("SELECT * FROM `absensi` WHERE NIP = "325528"");

        			$abc = $this->session->userdata('username');
					return $this->db->query("SELECT * FROM `absensi` WHERE NIP = $abc;");
                    
            }

        function hitung_data(){
                    //$query = $this->db->query("SELECT * FROM `absensi` WHERE NIP = "325528"");

                    $def = $this->session->userdata('username');
                    return $this->db->query("SELECT PRESENSI, Count(*) AS Jumlah from absensi where NIP='$def' GROUP BY PRESENSI");
                    
            }

    }

?>