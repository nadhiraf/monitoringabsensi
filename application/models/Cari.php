<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Cari Extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function search($name,$nip)
    {
        $this->db->like('name',$name);
        $query  =   $this->db->get('line_mng');
        return $query->result();
    }
}   