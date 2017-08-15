<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Login extends CI_Model { 
	function cek_data($id_user,$password) { 
		if($id_user !='' && $password !='') 
			{ $password = $password 
				$this->db->where("id_user",$id_user);
				$this->db->where("password",$password);
				$query = $this->db->get("user");
		if($query->num_rows() > 0){
		foreach($query->result() as $row){
		$user = array("username" => $row->name);
		$this->session->set_userdata($user);
		
		redirect('home');
	}
	}
	else
	{
	redirect('login'); // Jika username atau password tidak sama
	}
	}
	else
	{
	redirect('login'); // Jika username atau password kosong 
	}
 
}