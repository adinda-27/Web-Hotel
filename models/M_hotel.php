<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class M_hotel extends CI_Model{

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
 	}

 	function get_data($table){
 		return $this->db->get($table);
 	}

 	function insert_data($data,$table){
 		$this->db->insert($table,$data);
 	}

 	function update_data($where,$data,$table){
 		$this->db->where($where);
 		$this->db->update($table,$data);
 	}

 	function delete_data($where,$table){
 		$this->db->where($where);
 		$this->db->delete($table);
 	}

	public function kosongkan_data($table){
		return $this->db->truncate($table);
	}

	function Kamar() {
		return $this->db->query("select a.*,b.*,c.*
			from kamar a join kelas_kamar b on a.id.kelas_kamar=b.id_kelas_kamar
			join kamar_gambar c on a.id_kamar=c.id_kamar
			group by c.id_kamar
			order by a.id_kamar desc
			limit 0,15");
	}

	function KelasKamar () {
		return $this->db->query("select * from kelas_kamar order by id_kelas_kamar");
	}

	function KamarId($id_kamar) {
	 	return $this->db->query("select a.*,b.* from kamar a join kelas_kamar b on a.id_kelas_kamar=b.id_kelas_kamar where a.id_kamar='$id_kamar'");
	 }
	
	function KamarGambar ($id_kamar) {

	 	return $this->db->query("select * from kamar_gambar where id_kamar='$id_kamar' ");

	 }

	 function KamarAll () {

		return $this->db->query("select a.*,b.*,c.*
			from kamar a join kelas_kamar b on a.id_kelas_kamar=b.id_kelas_kamar
			join kamar_gambar c on a.id_kamar=c.id_kamar
			group by c.id_kamar
			order by a.id_kamar desc");

	}

	function kamarkosong() {
		return $this->db->query("SELECT a.*, b.* from kamar a join kelas_kamar b on a.id_kelas_kamar=b.id_kelas_kamar where status_kamar=0 order by a.id_kelas_kamar desc");
	}

	function kamarisi() {
		return $this->db->query("SELECT * from kamar where status_kamar=1");

	}

	function ReservasiId($id) {
	 	return $this->db->query("select a.*,b.*,TIMESTAMPDIFF(DAY, a.tgl_reservasi_masuk, a.tgl_reservasi_keluar) as waktu from reservasi a 
	 	join kamar b on a.id_kamar=b.id_kamar where id_reservasi='$id' ");

	 }

	 

	
	
	// public function kode_otomatis(){
	// 	$this->db->select('right(id_pinjam,3) as kode', false);
	// 	$this->db->order_by('id_pinjam', 'desc');
	// 	$this->db->limit(1);
	// 	$query=$this->db->get('peminjaman');
	// 	if($query->num_rows()<>0){
	// 		$data=$query->row();
	// 		$kode=intval($data->kode)+1;
	// 	}else{
	// 		$kode-1;
	// 	}

	// 	$kodemax=str_pad($kode,3, "0", STR_PAD LEFT);
	// 	$kodejadi='PJ'.$kodemax;

	// 	return $kodejadi;
	// }
 	
 }