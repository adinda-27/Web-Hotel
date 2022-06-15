<?php 
 
class Admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "loginadmin"){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
	}
 
	function index(){

		$data['kamar'] = $this->m_hotel->kamarkosong()->result();
		$data['reservasi'] = $this->db->query("select a.*,b.* from reservasi a 
	 	join kamar b on a.id_kamar=b.id_kamar where a.status_reservasi='0' order by a.status_reservasi desc")->result();
		$this->load->view('admin/overview.php', $data);
	}

	//user group mulai
	function user_group(){

		$data['user_group'] = $this->m_hotel->get_data('user_group')->result();
		$this->load->view('admin/user_group.php', $data);
	}

	function user_group_edit($id_user_group){
		$where = array('id_user_group' => $id_user_group);
		// mengambil data dari database sesuai id
		$data['user_group'] = $this->m_hotel->edit_data($where,'user_group')->result();
		$this->load->view('admin/user_group_edit.php', $data);
	}

	function user_group_edit_aksi(){
		$id_user_group = $this->input->post('id_user_group');
		$nama_user_group = $this->input->post('nama_user_group');

		$where = array(
			'id_user_group' => $id_user_group
		);

		$data = array(
			'nama_user_group' => $nama_user_group
		);

		$this->m_hotel->update_data($where,$data,'user_group');
		redirect(base_url().'admin/user_group');
	}

	function user_group_delete($id_user_group){
		$where = array('id_user_group' => $id_user_group);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where,'user_group');
		redirect(base_url().'admin/	user_group');
	}
	//user group selesai


	//user mulai
	function user(){

		$data['user'] = $this->db->query('SELECT a.*, b.* from user a join user_group b on a.id_user_group=b.id_user_group')->result();
		$this->load->view('admin/user.php', $data);
	}

	function user_tambah(){
		$data['user'] = $this->db->query('SELECT a.*, b.* from user a join user_group b on a.id_user_group=b.id_user_group')->result();
		$this->load->view('admin/user_tambah.php' ,$data);
	}

	function user_tambah_aksi(){
		$id_user_group = $this->input->post('id_user_group');
		$nama_user = $this->input->post('nama_user');
		$email_user = $this->input->post('email_user');
		$tlp_user = $this->input->post('tlp_user');
		$username_user = $this->input->post('username_user');
		$password_user = $this->input->post('password_user');

		$data = array(
			'id_user_group' 	=> $id_user_group,
			'nama_user' 		=> $nama_user,
			'email_user' 		=> $email_user,
			'tlp_user' 			=> $tlp_user,
			'username_user' 	=> $username_user,
			'password_user' 	=> md5($password_user)
			
		);

		$this->m_hotel->insert_data($data,'user');

		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'admin/user');
	}

	function user_edit($id_user){
		$where = array('id_user' => $id_user);
		// mengambil data dari database sesuai id
		$data['user'] = $this->m_hotel->edit_data($where,'user')->result();
		$data['user_group'] = $this->m_hotel->get_data('user_group')->result();
		$this->load->view('admin/user_edit.php', $data);
	}

	function user_edit_aksi(){
		$id_user = $this->input->post('id_user');
		$id_user_group = $this->input->post('id_user_group');
		$nama_user = $this->input->post('nama_user');
		$email_user = $this->input->post('email_user');
		$tlp_user = $this->input->post('tlp_user');
		$username_user = $this->input->post('username_user');

		$where = array(
			'id_user' => $id_user
		);

		$data = array(
			'id_user_group' => $id_user_group,
			'nama_user' => $nama_user,
			'email_user' => $email_user,
			'tlp_user' => $tlp_user,
			'username_user' => $username_user
		);

		$this->m_hotel->update_data($where,$data,'user');
		redirect(base_url().'admin/user');
	}

	function user_delete($id_user){
		$where = array('id_user' => $id_user);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where,'user');
		redirect(base_url().'admin/user');
	}
	//user selesai

	function ganti_password(){

		$this->load->view('admin/ganti_password.php');
	}

	function ganti_password_aksi(){

		$password_baru = $this->input->post('password_baru');
		$password_ulang = $this->input->post('password_ulang');

		$this->form_validation->set_rules('password_baru','Password Baru','required|matches[password_ulang]');
		$this->form_validation->set_rules('password_ulang','Ulangi Password','required');

		if($this->form_validation->run()!=false){
			
			$where = $where = $this->db->get_where('user', ['nama_user' => $this->session->userdata('nama_user')], ['status' => $this->session->userdata('status')])->row_array();

			$data = array('password_user' => md5($password_baru));

			$this->m_hotel->update_data($where,$data,'user');

			redirect(base_url().'admin/ganti_password/?alert=sukses');

		}else{
			redirect(base_url().'admin/ganti_password');
		}
	}

	function new_reservasi(){
		$data['reservasi'] = $this->db->query('select a.*,b.* from reservasi a 
	 	join kamar b on a.id_kamar=b.id_kamar order by a.id_reservasi desc')->result();

		$this->load->view('admin/reservasi', $data);
	}

	function new_reservasi_tambah(){
		$data['kamar'] = $this->m_hotel->kamarkosong()->result();
		$this->load->view('admin/new_reservasi_tambah',$data);
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
				$this->load->view('admin/new_reservasi_tambah',$data);

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
					redirect("admin/new_reservasi");
			}


	}

	function all_reservasi(){
		$data['reservasi'] = $this->db->query('select a.*,b.*,c.* from reservasi a 
	 	join kamar b on a.id_kamar=b.id_kamar join reservasi_pembayaran c on a.id_reservasi=c.id_reservasi where a.status_reservasi=2 order by a.status_reservasi desc')->result();

		$this->load->view('admin/all_reservasi', $data);
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
			redirect('admin/new_reservasi');


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

			$this->load->view('admin/reservasi_out',$data);
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
			redirect("admin/new_reservasi");

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

			

			$this->load->view('admin/reservasi_perpanjang',$data);


	}

	function new_reservasi_perpanjang_simpan(){
			$id['id_reservasi'] 		= $this->input->post("id_reservasi");
			$up['tgl_reservasi_masuk'] 	= tgl_luar($this->input->post("tgl_reservasi_masuk"));
			$up['tgl_reservasi_keluar'] = tgl_luar($this->input->post("tgl_reservasi_keluar"));
			$this->db->update("reservasi",$up,$id);

			$this->session->set_flashdata('perpanjang','OK');
			redirect("admin/new_reservasi");
			


	}

	function saran(){
		$data['saran'] = $this->m_hotel->get_data('saran')->result();
		$this->load->view('admin/saran.php', $data);
	}

	function deletesaran($id_saran){
		$where = array('id_saran' => $id_saran);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where,'saran');
		redirect(base_url().'admin/saran');
	}

	function kamar_kelas(){

		$data['kelas_kamar'] = $this->m_hotel->get_data('kelas_kamar')->result();
		$this->load->view('admin/kamar_kelas.php', $data);
	}

	function kamar_kelas_tambah(){
		$this->load->view('admin/kamar_kelas_tambah.php');
	}

	function kamar_kelas_tambah_aksi(){
		$nama_kelas_kamar = $this->input->post('nama_kelas_kamar');

		$data = array(
			'nama_kelas_kamar' => $nama_kelas_kamar
			
		);

		$this->m_hotel->insert_data($data,'kelas_kamar');

		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'admin/kamar_kelas');
	}

	function kamar_kelas_edit($id_kelas_kamar){
		$where = array('id_kelas_kamar' => $id_kelas_kamar);
		// mengambil data dari database sesuai id
		$data['kelas_kamar'] = $this->m_hotel->edit_data($where,'kelas_kamar')->result();
		$this->load->view('admin/kamar_kelas_edit.php', $data);
	}

	function kamar_kelas_edit_aksi(){
		$id_kelas_kamar = $this->input->post('id_kelas_kamar');
		$nama_kelas_kamar = $this->input->post('nama_kelas_kamar');

		$where = array(
			'id_kelas_kamar' => $id_kelas_kamar
		);

		$data = array(
			'nama_kelas_kamar' => $nama_kelas_kamar
		);

		$this->m_hotel->update_data($where,$data,'kelas_kamar');
		redirect(base_url().'kamar_kelas');
	}

	function kamar_kelas_delete($id_kelas_kamar){
		$where = array('id_kelas_kamar' => $id_kelas_kamar);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where,'kelas_kamar');
		redirect(base_url().'admin/	kamar_kelas');
	}

	function kamar(){

		$data['kamar'] = $this->db->query("SELECT kelas_kamar.id_kelas_kamar, kelas_kamar.nama_kelas_kamar, kamar.id_kamar, kamar.no_kamar, kamar.harga_kamar, kamar.fasilitas_kamar, kamar.status_kamar, kamar.id_kelas_kamar FROM kamar INNER JOIN kelas_kamar ON kamar.id_kelas_kamar=kelas_kamar.id_kelas_kamar")->result();
		$this->load->view('admin/kamar.php', $data);
	}

	function kamar_tambah(){
		
		$data['kelas_kamar'] = $this->m_hotel->get_data('kelas_kamar')->result();
		$this->load->view('admin/kamar_tambah.php', $data);
	}

	function kamar_edit($id_kamar){
		$where = array('id_kamar' => $id_kamar);
		// mengambil data dari database sesuai id
		$data['kamar'] = $this->db->query("SELECT kelas_kamar.id_kelas_kamar, kelas_kamar.nama_kelas_kamar, kamar.id_kamar, kamar.no_kamar, kamar.harga_kamar, kamar.fasilitas_kamar, kamar.status_kamar, kamar.id_kelas_kamar FROM kamar , kelas_kamar  where kamar.id_kelas_kamar=kelas_kamar.id_kelas_kamar and kamar.id_kamar=$id_kamar ")->result();
		$data['kelas_kamar'] = $this->m_hotel->get_data('kelas_kamar')->result();
		$this->load->view('admin/kamar_edit.php', $data);
	}

	function kamar_edit_aksi(){
		$id_kamar = $this->input->post('id_kamar');
		$id_kelas_kamar = $this->input->post('id_kelas_kamar');
		$no_kamar = $this->input->post('no_kamar');
		$harga_kamar = $this->input->post('harga_kamar');
		$fasilitas_kamar = $this->input->post('fasilitas_kamar');


		$where = array(
			'id_kamar' => $id_kamar
		);

		$data = array(
			'id_kelas_kamar' => $id_kelas_kamar,
			'no_kamar' => $no_kamar,
			'harga_kamar' => $harga_kamar,
			'fasilitas_kamar' => $fasilitas_kamar
		);

		$this->m_hotel->update_data($where, $data,'kamar');
		redirect(base_url().'admin/kamar');
	}

	function kamar_gambar($id_kamar){
		$where = array('id_kamar' => $id_kamar);
		// mengambil data dari database sesuai id
		$data['kamar_gambar'] = $this->m_hotel->KamarGambar($id_kamar);

			$query =  $this->m_hotel->KamarId($id_kamar);

			foreach ($query->result_array() as $value) {
				$data['id_kamar'] 			=  $value['id_kamar'];
				$data['no_kamar'] 			=  $value['no_kamar'];
				$data['harga_kamar'] 		=  $value['harga_kamar'];
				$data['fasilitas_kamar'] 	=  $value['fasilitas_kamar'];
				$data['id_kelas_kamar'] 	=  $value['id_kelas_kamar'];
				$data['nama_kelas_kamar'] 	=  $value['nama_kelas_kamar'];
				
			}

		$this->load->view('admin/kamar_gambar.php', $data);
	}

	function kamar_gambar_tambah_aksi(){
		$id_kamar = $this->input->post('id_kamar');

				
				$config['upload_path'] = './assets/images/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '100';
				$config['max_width'] = '1024';
				$config['max_height'] = '768';
				$config['file_name'] = 'nama_kamar_gambar'.time();
				
				$this->load->library('upload', $config);

			if($this->upload->do_upload('nama_kamar_gambar')){
				$image=$this->upload->data();

				$data = array(
					'id_kamar' => $id_kamar,
					'nama_kamar_gambar' => $image['file_name']
				);
				$this->m_hotel->insert_data($data,'kamar_gambar');
				redirect(base_url().'admin/kamar');
				}

				
			
	}

	function kamar_gambar_delete($id_kamar_gambar){
		$where = array('id_kamar_gambar' => $id_kamar_gambar);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where,'kamar_gambar');
		redirect(base_url().'admin/kamar');
	}

	function kamar_delete($id_kamar){
		$where = array('id_kamar' => $id_kamar);
		// mengambil data dari database sesuai id
		$this->m_hotel->delete_data($where,'kamar');
		redirect(base_url().'admin/kamar');
	}

	function kamar_tambah_aksi(){
		$id_kelas_kamar = $this->input->post('id_kelas_kamar');
		$no_kamar = $this->input->post('no_kamar');
		$harga_kamar = $this->input->post('harga_kamar');
		$content = $this->input->post('fasilitas_kamar');

		$data = array(
			'id_kelas_kamar' => $id_kelas_kamar,
			'no_kamar' => $no_kamar,
			'harga_kamar' => $harga_kamar,
			'fasilitas_kamar' => $content
			
		);

		$this->m_hotel->insert_data($data,'kamar');

		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'admin/kamar');
	}



	// function kamar_kelas_edit($id_kelas_kamar){
	// 	$where = array('id_kelas_kamar' => $id_kelas_kamar);
	// 	// mengambil data dari database sesuai id
	// 	$data['kelas_kamar'] = $this->m_hotel->edit_data($where,'kelas_kamar')->result();
	// 	$this->load->view('admin/kamar_kelas_edit.php', $data);
	// }

	// function kamar_kelas_edit_aksi(){
	// 	$id_kelas_kamar = $this->input->post('id_kelas_kamar');
	// 	$nama_kelas_kamar = $this->input->post('nama_kelas_kamar');

	// 	$where = array(
	// 		'id_kelas_kamar' => $id_kelas_kamar
	// 	);

	// 	$data = array(
	// 		'nama_kelas_kamar' => $nama_kelas_kamar
	// 	);

	// 	$this->m_hotel->update_data($where,$data,'kelas_kamar');
	// 	redirect(base_url().'kamar_kelas');
	// }

	// function kamar_kelas_delete($id_kelas_kamar){
	// 	$where = array('id_kelas_kamar' => $id_kelas_kamar);
	// 	// mengambil data dari database sesuai id
	// 	$this->m_hotel->delete_data($where,'kelas_kamar');
	// 	redirect(base_url().'kamar_kelas');
	// }

	
}