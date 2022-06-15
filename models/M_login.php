<?php 
 
class M_login extends CI_Model{	

	function Ceklogin($username_user,$password_user){		
		$ceklogin = $this->db->query("select a.*,b.* from user a join user_group b on a.id_user_group=b.id_user_group where a.username_user='$username_user' and a.password_user='$password_user' ");

		if (count($ceklogin->result())>0) {

			foreach ($ceklogin->result() as $value) {
				
				$sess_data['id_user']  			= $value->id_user;
				$sess_data['nama_user']  		= $value->nama_user;
				$sess_data['email_user']  		= $value->email_user;
				$sess_data['tlp_user']  		= $value->tlp_user;
				$sess_data['username_user']  	= $value->username_user;
				$sess_data['password_user']  	= $value->password_user;
				$sess_data['id_user_group']  	= $value->id_user_group;
				$sess_data['nama_user_group']  	= $value->nama_user_group;
				

				$this->session->set_userdata($sess_data);

			}
			redirect('Admin');
		}
		else {
			$this->session->set_flashdata("error","Username atau Password Anda Salah!");
			redirect('Login');
		}
	}

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
 	}	
}