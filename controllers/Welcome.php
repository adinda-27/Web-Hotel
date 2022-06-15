<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['kamar'] 			= $this->m_tamu->kamarall();
		$data['kelas_kamar'] 	= $this->m_hotel->get_data('kelas_kamar');
		$this->load->view('welcome_message', $data);
	}

	public function cari(){

		$id = $this->input->post('id_kelas_kamar');
  		 $data['kamar'] = $this->m_tamu->kamarallkelas($id);
  		 $data['kelas_kamar'] = $this->m_hotel->get_data('kelas_kamar');
  		 $this->load->view('welcome_message', $data);

	}

	public function kamardetail()
	{
		$id = $this->uri->segment(3);
		$data['kamar'] 			= $this->m_tamu->KamarDetail($id);
		$data['kamar_gambar'] 	= $this->m_tamu->KamarGambarId($id);
		$data['kelas_kamar'] 	= $this->m_hotel->get_data('kelas_kamar');
		$this->load->view('kamar_detail', $data);
	}

	public function saran()
	{
		
		$this->load->view('saran');
	}

	public function saran_aksi(){
		$nama_saran = $this->input->post('nama_saran');
		$email_saran = $this->input->post('email_saran');
		$tlp_saran = $this->input->post('tlp_saran');
		$isi_saran = $this->input->post('isi_saran');

		$data = array(
			'nama_saran' => $nama_saran,
			'email_saran' => $email_saran,
			'tlp_saran' => $tlp_saran,
			'isi_saran' => $isi_saran
			
			
		);

		$this->m_hotel->insert_data($data,'saran');

		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'welcome');
	}

	public function reservasi(){
			$this->form_validation->set_rules('tgl_reservasi_masuk','Tanggal Masuk','required');
			$this->form_validation->set_rules('tgl_reservasi_keluar','Tanggal Keluar','required');
			$this->form_validation->set_rules('nama_reservasi','Nama','required');
			$this->form_validation->set_rules('tlp_reservasi','Tlp','required');
			$this->form_validation->set_rules('alamat_reservasi','Alamat','required');

					if ($this->form_validation->run()==FALSE) {
						$id = $this->input->post('id_kamar');
						$data['kamar'] 			= $this->m_tamu->KamarDetail($id);
						$data['kamar_gambar'] 	= $this->m_tamu->KamarGambarId($id);
						$data['kelas_kamar'] 	= $this->m_hotel->get_data('kelas_kamar');
						redirect(base_url().'welcome/kamardetail/'.$id);
					}
					else{
			
					$tgl_reservasi_masuk 	= $this->input->post('tgl_reservasi_masuk');
					$tgl_reservasi_keluar 	= $this->input->post('tgl_reservasi_keluar');
					$id_kamar 				= $this->input->post('id_kamar');
					$nama_reservasi 		= $this->input->post('nama_reservasi');
					$tlp_reservasi			= $this->input->post('tlp_reservasi');
					$alamat_reservasi 		= $this->input->post('alamat_reservasi');
					
					
					$data = array(
						'tgl_reservasi_masuk' => tgl_luar($tgl_reservasi_masuk),
						'tgl_reservasi_keluar' => tgl_luar($tgl_reservasi_keluar),
						'id_kamar' => $id_kamar,
						'nama_reservasi' => $nama_reservasi,
						'tlp_reservasi' => $tlp_reservasi,
						'alamat_reservasi' => $alamat_reservasi,
						'status_reservasi' 		=> 0
						
					);
							
					$this->m_tamu->insert_data($data, 'reservasi');
							
					$this->session->set_flashdata('berhasil','OK');
					$id = $this->input->post('id_kamar');
					redirect(base_url().'welcome/kamardetail/'.$id);
				}
	}

	
	
}
