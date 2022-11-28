<?php

class Model_ekskul extends CI_Model
{

	public function simpan_upload($judul, $image)
	{
		$data = array(
			'judul' => $judul,
			'gambar' => $image
		);
		$result = $this->db->insert('tbl_galeri', $data);
		return $result;
	}

	public function simpan_ekskul($judul, $deskripsi, $photo)
	{

		$hsl = $this->db->query("INSERT INTO ekskul(ekskul_judul,ekskul_deskripsi,ekskul_photo) VALUES ('$judul','$deskripsi','$photo')");
		return $hsl;
	}

	public function simpan_ekskul_tanpa_img($judul, $deskripsi)
	{

		$hsl = $this->db->query("INSERT INTO ekskul(ekskul_judul,ekskul_deskripsi,ekskul_author) VALUES ('$judul','$deskripsi')");
		return $hsl;
	}

	public function update_ekskul($kode, $judul, $deskripsi, $photo)
	{

		$hsl = $this->db->query("UPDATE ekskul SET ekskul_judul='$judul',ekskul_deskripsi='$deskripsi',ekskul_photo='$photo' where ekskul_id='$kode'");
		return $hsl;
	}

	public function update_ekskul_tanpa_img($kode, $judul, $deskripsi)
	{

		$hsl = $this->db->query("UPDATE ekskul SET ekskul_judul='$judul',ekskul_deskripsi='$deskripsi' where ekskul_id='$kode'");
		return $hsl;
	}

	public function hapus_ekskul($kode)
	{
		$hsl = $this->db->query("DELETE FROM ekskul WHERE ekskul_id='$kode'");
		return $hsl;
	}

	//Untuk Tampilan Front-end
	public function get_ekskul_home()
	{
		$hsl = $this->db->query("SELECT * FROM ekskul ORDER BY ekskul_id ASC");
		return $hsl;
	}

	public function get_ekskul_home_aja()
	{
		$hsl = $this->db->query("SELECT * FROM ekskul ORDER BY ekskul_id ASC");
		return $hsl;
	}

	public function ekskul_perpage($offset, $limit)
	{
		$hsl = $this->db->query("SELECT * FROM ekskul ORDER BY ekskul_id ASC limit $offset,$limit");
		return $hsl;
	}


}
