<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan extends CI_Model{


    var $table = 'line_mng';
    var $column_order = array(null, 'id_user','name','LM'); //set column field database for datatable orderable
    var $column_search = array('id_user','name','LM'); //set column field database for datatable searchable 
    var $order = array('id_user' => 'asc'); // default order
    
	public function __construct(){

	parent::__construct();
    $this->load->database();

	}

        private function _get_datatables_query(){

                $ccc = $this->session->userdata('namaasli');
                $this->db->from($this->table);
                $this->db->where('lm', $ccc);  

                $i = 0;

            foreach ($this->column_search as $item) // loop column
            {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

            if(isset($_POST['order'])){ // here order processing
                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order)){
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
        }

        function get_datatables()
        {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
        }

        function count_filtered()
        {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
        }

        public function count_all()
        {
            $ccc = $this->session->userdata('namaasli');
            $this->db->from($this->table);
            $this->db->where('lm', $ccc);
        return $this->db->count_all_results();
        }
        
   			
            function show_data(){

                        return $this->db->get('line_mng');
            }

            function data_line(){
                    $ccc = $this->session->userdata('namaasli');
                    return $this->db->query("SELECT * FROM `line_mng` WHERE LM = '$ccc' ");
            }

            function data($number,$offset){
				return $query = $this->db->get('line_mng',$number,$offset)->result();		
			}
 
			function jumlah_data(){
				return $this->db->get('line_mng')->num_rows();
			}

            function search()
    		{

        		$cari = $this->input->GET('cari', TRUE);
        		$data = $this->db->query("SELECT * from user where Name like '%$cari%' ");
        		return $data->result();
    		}
}
