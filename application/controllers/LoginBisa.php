<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginBisa extends CI_Controller {

    public function index() {
        $this->load->view('viewlogin');
    }

    public function cek_login() {
        $data = array('id_user' => $this->input->post('username', TRUE),
                        'password' => ($this->input->post('password', TRUE))
            );

        $this->load->model('User2'); // load User
        $hasil = $this->User2->cek_user($data);
        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['logged_in'] = 'Sudah Login';
                $sess_data['username'] = $sess->id_user;
                $sess_data['namaasli'] = $sess->name;
                $sess_data['role'] = $sess->role;
                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('role') == 1) {
                redirect('Admin/index');
            }
            elseif ($this->session->userdata('role') == 2) {
                redirect('Line_Manager/index');
            } 
            elseif ($this->session->userdata('role') == 3) {
                redirect('User');
            }       
        }
        else {
            echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('LoginBisa/index');
    }

}

?>