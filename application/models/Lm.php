<?php

class Lm extends CI_Model{

            function lm_login(){

                return $this->db->get('line mng');
                $query = $this->db->get_where('line mng', $data);
				return $query

            }

}