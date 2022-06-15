<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class M_tamu extends CI_Model{

	function insert_data($data,$table){
 		$this->db->insert($table,$data);
 	}

	function Kamar() {
		return $this->db->query("select a.*,b.*,c.*
			from kamar a join kelas_kamar b on a.id.kelas_kamar=b.id_kelas_kamar
			join kamar_gambar c on a.id_kamar=c.id_kamar
			group by c.id_kamar
			order by a.id_kamar desc
			limit 0,15");
	}


	function kamarall(){
		return $this->db->query("SELECT kamar.id_kamar, kamar.no_kamar, kamar.harga_kamar, kamar.fasilitas_kamar, kamar.status_kamar, kamar.id_kelas_kamar, kelas_kamar.id_kelas_kamar, kelas_kamar.nama_kelas_kamar , kamar_gambar.id_kamar_gambar, kamar_gambar.nama_kamar_gambar, kamar_gambar.id_kamar  FROM kamar join kelas_kamar on kamar.id_kelas_kamar=kelas_kamar.id_kelas_kamar join kamar_gambar on kamar.id_kamar=kamar_gambar.id_kamar GROUP BY kamar_gambar.id_kamar ORDER BY kamar.id_kamar");
	}

	function kamarallkelas ($id){
	return $this->db->query("SELECT a.*,b.*,c.*
			from kamar a join kelas_kamar b on a.id_kelas_kamar=b.id_kelas_kamar
			join kamar_gambar c on a.id_kamar=c.id_kamar where b.id_kelas_kamar='$id'
			group by c.id_kamar
			order by a.id_kamar desc");
	}

 	
 	function KamarKelasKamar($id) {
		return $this->db->query("select a.*,b.*,c.*
			from kamar a join kelas_kamar b on a.id_kelas_kamar=b.id_kelas_kamar
			join kamar_gambar c on a.id_kamar=c.id_kamar where b.id_kelas_kamar='$id'
			group by c.id_kamar
			order by a.id_kamar desc");

	}

	function KamarDetail($id) {
		return $this->db->query("select a.*,b.* from kamar a
		join kelas_kamar b on a.id_kelas_kamar=b.id_kelas_kamar
		where a.id_kamar='$id' ");
	}

	function KamarGambarId($id) {
		return $this->db->query("select * from kamar_gambar where id_kamar='$id'");
	}
	//Akhir Kamar

	//Awal Kelas Kamar
	function KelasKamar () {
		return $this->db->query("select * from kelas_kamar order by id_kelas_kamar");
	}
	//Akhir Kelas Kamar
	
	//Awal Galeri
	// function GaleriKategori() {
	// 	return $this->db->query("select a.*,b.*
	// 		from tbl_kategori_galeri a join tbl_galeri b on a.id_kategori_galeri=b.kategori_galeri_id
	// 		group by a.id_kategori_galeri
	// 		order by a.id_kategori_galeri asc
	// 		");
	// }

	// function GaleriDetail($id) {
	// 	return $this->db->query("select a.*,b.* from tbl_galeri a
	// 	join tbl_kategori_galeri b on a.kategori_galeri_id=b.id_kategori_galeri
	// 	where a.kategori_galeri_id='$id' ");
	// }
	//Akhir galeri
 }