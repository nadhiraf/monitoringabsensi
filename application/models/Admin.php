<?php

class Admin extends CI_Model{

            function admin_login(){

                return $this->db->get('admin');
                $query = $this->db->get_where('admin', $data);
				return $query

            }

}