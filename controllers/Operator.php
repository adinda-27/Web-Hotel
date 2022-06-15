<?php 
 
class Operator extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "loginoperator"){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
	}
 
	function index(){

		$data['kamar'] = $this->m_hotel->kamarkosong()->result();
		$data['reservasi'] = $this->db->query("select a.*,b.* from reservasi a 
	 	join kamar b on a.id_kamar=b.id_kamar where a.status_reservasi='0' order by a.status_reservasi desc")->result();
		$this->load->view('operator/overview.php', $data);
	}


	function ganti_password(){

		$this->load->view('operator/ganti_password.php');
	}

	function ganti_password_aksi(){


		$password_baru = $this->input->post('password_baru');
		$password_ulang = $this->input->post('password_ulang');

		$this->form_validation->set_rules('password_baru','Password Baru','required|matches[password_ulang]');
		$this->form_validation->set_rules('password_ulang','Ulangi Password','required');

		if($this->form_validation->run()!=false){
			

			$where = $this->db->get_where('user', ['nama_user' => $this->session->userdata('nama_user')], ['status' => $this->session->userdata('status')])->row_array();

			$data = array('password_user' => md5($password_baru));

			// var_dump($where,$data,'user');
			// die;
			 $this->m_hotel->update_data($where,$data,'user');
			$this->session->set_flashdata('in','OK');
			redirect(base_url().'operator/ganti_password/?alert=sukses');

		}else{
			redirect(base_url().'operator/ganti_password');
		}
	}

	function new_reservasi(){
		$data['reservasi'] = $this->db->query('select a.*,b.* from reservasi a 
	 	join kamar b on a.id_kamar=b.id_kamar order by a.id_reservasi desc')->result();

		$this->load->view('operator/reservasi', $data);
	}

	function all_reservasi(){
		$data['reservasi'] = $this->db->query('select a.*,b.*,c.* from reservasi a 
	 	join kamar b on a.id_kamar=b.id_kamar join reservasi_pembayaran c on a.id_reservasi=c.id_reservasi where a.status_reservasi=2 order by a.status_reservasi desc')->result();

		$this->load->view('operator/all_reservasi', $data);
	}

	function new_reservasi_in(){
			$id['id_reservasi'] 		= $this->uri->segment(3);
			$up['status_reservasi'] 	= $this->uri->segment(4);


			$this->db->update("reservasi",$up,$id);

			$id = $this->uri->segment(3);

			$query = $this->m_hotel->ReservasiId($id);

			foreach ($query->result_array() as $value) {
				$id_kamar['id_kamar'] = $value['id_kamar'];
			}

			$up2['status_kamar'] 	= $this->uri->segment(4);


			$this->db->update("kamar",$up2,$id_kamar);


				
						
			$this->session->set_flashdata('in','OK');
			redirect('operator/new_reservasi');


	}

	function new_reservasi_out($id){
			// $id['id_reservasi'] 		= $this->uri->segment(3);
			$query						=  $this->m_hotel->ReservasiId($id);

			foreach ($query->result_array() as $value) {
				$data['id_reservasi'] 			= $value['id_reservasi'];
				$data['nama_reservasi']	 		= $value['nama_reservasi'];
				$data['tlp_reservasi'] 			= $value['tlp_reservasi'];
				$data['alamat_reservasi'] 		= $value['alamat_reservasi'];
				$data['tgl_reservasi_masuk']	= $value['tgl_reservasi_masuk'];
				$data['tgl_reservasi_keluar'] 	= $value['tgl_reservasi_keluar'];
				$data['id_kamar'] 				= $value['id_kamar'];
				$data['no_kamar'] 				= $value['no_kamar'];
				$data['harga_kamar'] 			= $value['harga_kamar'];
				$data['status_kamar'] 			= $value['status_kamar'];
				$data['waktu'] 					= $value['waktu'];
			}
			$data['status_reservasi']	= $this->uri->segment(4);

			$this->load->view('operator/reservasi_out',$data);
	}

	function new_reservasi_out_simpan(){
			$id['id_reservasi'] 		= $this->input->post("id_reservasi");
			$up['status_reservasi'] 	= $this->input->post("status_reservasi");
			$this->db->update("reservasi",$up,$id);


			//Update Status Kamar
			$id_kamar['id_kamar'] 	= $this->input->post("id_kamar");
			$up2['status_kamar'] 	= 0;
			$this->db->update("kamar",$up2,$id_kamar);


			//Insert into reservasi pembayaran
			$in['tgl_pembayaran'] 		= date('Y-m-d');
			$in['nominal_pembayaran'] 	= $this->input->post("total_bayar");
			$in['uang_bayar'] 			= $this->input->post("uang_bayar");
			$in['kembalian'] 			= $this->input->post("kembalian");
			$in['id_reservasi'] 		= $this->input->post("id_reservasi");
			$this->db->insert("reservasi_pembayaran",$in);
				
						
			$this->session->set_flashdata('out','OK');
			redirect("operator/new_reservasi");

	}

	function new_reservasi_perpanjang(){
			$id		= $this->uri->segment(3);

			$query						=  $this->m_hotel->ReservasiId($id);

			foreach ($query->result_array() as $value) {
				$data['id_reservasi'] 			= $value['id_reservasi'];
				$data['nama_reservasi']	 		= $value['nama_reservasi'];
				$data['tlp_reservasi'] 			= $value['tlp_reservasi'];
				$data['alamat_reservasi'] 		= $value['alamat_reservasi'];
				$data['tgl_reservasi_masuk']	= tgl_balik($value['tgl_reservasi_masuk']);
				$data['tgl_reservasi_keluar'] 	= tgl_balik($value['tgl_reservasi_keluar']);
				$data['id_kamar'] 				= $value['id_kamar'];
				$data['no_kamar'] 			= $value['no_kamar'];
				$data['harga_kamar'] 			= $value['harga_kamar'];
				$data['status_kamar'] 			= $value['status_kamar'];
				$data['waktu'] 					= $value['waktu'];
			}

			

			$this->load->view('operator/reservasi_perpanjang',$data);


	}

	function new_reservasi_perpanjang_simpan(){
			$id['id_reservasi'] 		= $this->input->post("id_reservasi");
			$up['tgl_reservasi_masuk'] 	= tgl_luar($this->input->post("tgl_reservasi_masuk"));
			$up['tgl_reservasi_keluar'] = tgl_luar($this->input->post("tgl_reservasi_keluar"));
			$this->db->update("reservasi",$up,$id);

			$this->session->set_flashdata('perpanjang','OK');
			redirect("operator/new_reservasi");
			


	}

	function new_reservasi_tambah(){
		$data['kamar'] = $this->m_hotel->kamarkosong()->result();
		$this->load->view('operator/new_reservasi_tambah',$data);
	}

	function new_reservasi_simpan(){
		$this->form_validation->set_rules('tgl_reservasi_masuk','Tanggal Masuk','required');
			$this->form_validation->set_rules('tgl_reservasi_keluar','Tanggal Keluar','required');
			$this->form_validation->set_rules('id_kamar','Kamar','required');
			$this->form_validation->set_rules('nama_reservasi','Nama','required');
			$this->form_validation->set_rules('tlp_reservasi','Tlprequired');
			$this->form_validation->set_rules('alamat_reservasi','Alamat','required');
			
		

			if ($this->form_validation->run()==FALSE) {

				$data['kamar']	= $this->m_hotel->KamarKosong();
				$this->load->view('operator/new_reservasi_tambah',$data);

			}
			else {

		
					$in['tgl_reservasi_masuk'] 		= tgl_luar($this->input->post('tgl_reservasi_masuk'));
					$in['tgl_reservasi_keluar'] 	= tgl_luar($this->input->post('tgl_reservasi_keluar'));
					$in['id_kamar'] 				= $this->input->post('id_kamar');
					$in['nama_reservasi'] 			= $this->input->post('nama_reservasi');
					$in['tlp_reservasi'] 			= $this->input->post('tlp_reservasi');
					$in['alamat_reservasi'] 		= $this->input->post('alamat_reservasi');
					
							
					$this->db->insert("reservasi",$in);
							
					$this->session->set_flashdata('berhasil','OK');
					redirect("operator/new_reservasi");
			}


	}


	
}