<?php 
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		
	}
 
	function index(){
		$this->load->view('v_login');
	}
 

	function aksi_login(){

		// $this->form_validation->set_rules('username_user','Username','required');
		// $this->form_validation->set_rules('password_user','Password','required');

		// if ($this->form_validation->run() == FALSE) {

		// 	redirect(base_url('login'));

		// }
		// else {


		// 	$username_user = $this->input->post('username_user');
		// 	$password_user = md5($this->input->post('password_user'));

		// 	$this->m_login->CekLogin($username_user,$password_user);

		// }
		$username_user = $this->input->post('username_user');
		$password_user = $this->input->post('password_user');
		$this->form_validation->set_rules('username_user','Username','required');
		$this->form_validation->set_rules('password_user','Password','required');

		if ($this->form_validation->run() != FALSE) {
			$where = array('username_user' => $username_user, 'password_user' => md5($password_user), 'id_user_group' => 1 );
			$data = $this->m_hotel->edit_data($where, 'user');
			$d = $this->m_hotel->edit_data($where, 'user')->row();
			$cek = $data->num_rows();

			if($cek > 0){
				$session = array('id_user_group' => $d->id_user_group, 'nama_user' => $d->nama_user, 'status' => 'loginadmin');
				$this->session->set_userdata($session);
				redirect(base_url().'Admin');
			}
			else{
				$where = array('username_user' => $username_user, 'password_user' => md5($password_user), 'id_user_group' => 2 );
			$data = $this->m_hotel->edit_data($where, 'user');
			$d = $this->m_hotel->edit_data($where, 'user')->row();
			$cek = $data->num_rows();


			if($cek > 0){
				$session = array('id_user_group' => $d->id_user_group, 'nama_user' => $d->nama_user, 'status' => 'loginoperator');
				$this->session->set_userdata($session);
				redirect(base_url().'Operator');
			}
			else{
				$this->session->set_flashdata('Alert', 'ih kamu mah');
				redirect(base_url('login'));
			}
			}


		}
		else {
				$this->session->set_flashdata('Alert', 'Anda Belum mengisi username atau Password');
				redirect(base_url('login'));
		}


	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('v_login'));
	}

}