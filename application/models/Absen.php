<?php

class Absen extends CI_Model{

    var $table = 'absensi';
    var $column_order = array(null, 'TGL_PRESENSI','NIP','NAMA_PEGAWAI','PRESENSI'); //set column field database for datatable orderable
    var $column_search = array('TGL_PRESENSI','NIP','NAMA_PEGAWAI','PRESENSI'); //set column field database for datatable searchable 
    var $order = array('TGL_PRESENSI' => 'asc'); // default order 
    
    public function __construct(){

    parent::__construct();
    $this->load->database();

    }

    private function _get_datatables_query()
    {
        
        //add custom filter here
        if($this->input->post('month'))
        {
            $this->db->where('country', $this->input->post('country'));
        }
        if($this->input->post('name'))
        {
            $this->db->like('NAMA_PEGAWAI', $this->input->post('name'));
        }
        if($this->input->post('nip'))
        {
            $this->db->like('NIP', $this->input->post('nip'));
        }
        if($this->input->post('presensi'))
        {
            $this->db->like('PRESENSI', $this->input->post('presensi'));
        }
               
                $ddd = $this->session->userdata('namaasli');

                $this->db->select('lm, TGL_PRESENSI, NIP, NAMA_PEGAWAI, PRESENSI');
                $this->db->from($this->table);
                $this->db->join('line_mng', 'nip = id_user', 'right outer');
                $this->db->where('lm', $ddd);

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
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
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
            
        return $this->db->count_all_results();
    }

    public function get_list_countries()
    {
        $this->db->select('PRESENSI');
        $this->db->from($this->table);
        $this->db->order_by('PRESENSI','asc');
        $query = $this->db->get();
        $result = $query->result();

        $pre = array();
        foreach ($result as $row) 
        {
            $pre[] = $row->PRESENSI;
        }
        return $pre;
    }

            function show_data(){

                        return $this->db->get('absensi');
            }

            function absen_lm(){
                        $ddd = $this->session->userdata('namaasli');
                        return $this->db->query("SELECT lm, TGL_PRESENSI, NIP, NAMA_PEGAWAI, PRESENSI FROM line_mng RIGHT OUTER JOIN absensi ON nip = id_user WHERE LM = '$ddd' "); 
            }

            function total(){

                        return $this->db->query("SELECT PRESENSI, Count(*) AS Jumlah from absensi GROUP BY PRESENSI ");

                        $query = $this->db->get('mytable'); 
                        $query = $this->db->query("SELECT * FROM mytable"); 
                        
            }

            function total_lm(){

                        $bbb = $this->session->userdata('namaasli');
                        return $this->db->query("SELECT lm, PRESENSI, COUNT(PRESENSI) AS Jumlah FROM line_mng RIGHT OUTER JOIN absensi ON nip = id_user WHERE LM = '$bbb' GROUP by presensi ");
            }

            function total_lm1(){

                        $bbb = $this->session->userdata('namaasli');
                        return $this->db->query("SELECT lm, PRESENSI, COUNT(PRESENSI) AS Jumlah FROM line_mng RIGHT OUTER JOIN absensi ON nip = id_user WHERE LM = '$bbb' AND MONTH(TGL_PRESENSI) = 1 GROUP by presensi ");
            }
}
