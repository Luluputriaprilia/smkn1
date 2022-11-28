<?php

class Model_agenda extends CI_Model
{

	function simpan_agenda($nama_agenda, $deskripsi, $mulai, $selesai, $tempat, $waktu, $keterangan)
	{
		$author = $this->session->userdata('nama');
		$hsl = $this->db->query("INSERT INTO agenda(agenda_nama,agenda_deskripsi,agenda_mulai,agenda_selesai,agenda_tempat,agenda_waktu,agenda_keterangan,agenda_author) VALUES ('$nama_agenda','$deskripsi','$mulai','$selesai','$tempat','$waktu','$keterangan','$author')");
		return $hsl;
	}

	function update_agenda($kode, $nama_agenda, $deskripsi, $mulai, $selesai, $tempat, $waktu, $keterangan)
	{
		$author = $this->session->userdata('nama');
		$hsl = $this->db->query("UPDATE agenda SET agenda_nama='$nama_agenda',agenda_deskripsi='$deskripsi',agenda_mulai='$mulai',agenda_selesai='$selesai',agenda_tempat='$tempat',agenda_waktu='$waktu',agenda_keterangan='$keterangan',agenda_author='$author' where agenda_id='$kode'");
		return $hsl;
	}

	function hapus_agenda($kode)
	{
		$hsl = $this->db->query("DELETE FROM agenda WHERE agenda_id='$kode'");
		return $hsl;
	}

	function get_all_agenda()
	{
		$hsl = $this->db->query("SELECT agenda.*,DATE_FORMAT(agenda_tanggal,'%d/%m/%Y') AS tanggal FROM agenda ORDER BY agenda_id DESC");
		return $hsl;
	}

	//model function untuk front-end
	function get_agenda_home()
	{
		$hsl = $this->db->query("SELECT agenda.*,DATE_FORMAT(agenda_tanggal,'%d/%m/%Y') AS tanggal FROM agenda ORDER BY agenda_id DESC limit 3");
		return $hsl;
	}

	function agenda()
	{
		$hsl = $this->db->query("SELECT agenda.*,DATE_FORMAT(agenda_tanggal,'%d/%m/%Y') AS tanggal FROM agenda ORDER BY agenda_id DESC");
		return $hsl;
	}

	function agenda_perpage($offset, $limit)
	{
		$hsl = $this->db->query("SELECT agenda.*,DATE_FORMAT(agenda_tanggal,'%d/%m/%Y') AS tanggal FROM agenda ORDER BY agenda_id DESC limit $offset,$limit");
		return $hsl;
	}


} 
