<?php

class model_guru extends CI_Model
{

	function get_all_guru()
	{
		$hsl = $this->db->query("SELECT guru.*, IF(guru_jenkel='L','Laki-Laki','Perempuan') AS jenkel FROM guru");
		return $hsl;
	}

	function simpan_upload($judul, $image)
	{
		$data = array(
			'judul' => $judul,
			'gambar' => $image
		);
		$result = $this->db->insert('tbl_galeri', $data);
		return $result;
	}

	function simpan_guru($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $pendidikan_guru, $mapel, $photo)
	{
		$hsl = $this->db->query("INSERT INTO guru (guru_nip,guru_nama,guru_jenkel,guru_tmp_lahir,guru_tgl_lahir,pendidikan_guru,guru_mapel,guru_photo) VALUES ('$nip','$nama','$jenkel','$tmp_lahir','$tgl_lahir','$pendidikan_guru','$mapel','$photo')");
		return $hsl;
	}

	function simpan_guru_tanpa_img($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $pendidikan_guru, $mapel)
	{
		$hsl = $this->db->query("INSERT INTO guru (guru_nip,guru_nama,guru_jenkel,guru_tmp_lahir,guru_tgl_lahir,pendidikan_guru,guru_mapel) VALUES ('$nip','$nama','$jenkel','$tmp_lahir','$tgl_lahir','$pendidikan_guru','$mapel')");
		return $hsl;
	}

	function update_guru($kode, $nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $pendidikan_guru, $mapel, $photo)
	{
		$hsl = $this->db->query("UPDATE guru SET guru_nip='$nip',guru_nama='$nama',guru_jenkel='$jenkel',guru_tmp_lahir='$tmp_lahir',guru_tgl_lahir='$tgl_lahir',pendidikan_guru='$pendidikan_guru',guru_mapel='$mapel',guru_photo='$photo' WHERE guru_id='$kode'");
		return $hsl;
	}

	function update_guru_tanpa_img($kode, $nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $pendidikan_guru, $mapel)
	{
		$hsl = $this->db->query("UPDATE guru SET guru_nip='$nip',guru_nama='$nama',guru_jenkel='$jenkel',guru_tmp_lahir='$tmp_lahir',guru_tgl_lahir='$tgl_lahir',pendidikan_guru='$pendidikan_guru',guru_mapel='$mapel' WHERE guru_id='$kode'");
		return $hsl;
	}

	function hapus_guru($kode)
	{
		$hsl = $this->db->query("DELETE FROM guru WHERE guru_id='$kode'");
		return $hsl;
	}

	//buat tampilan front-end
	function guru()
	{
		$hsl = $this->db->query("SELECT * FROM guru");
		return $hsl;
	}

	function guru_perpage($offset, $limit)
	{
		$hsl = $this->db->query("SELECT * FROM guru limit $offset,$limit");
		return $hsl;
	}

}
