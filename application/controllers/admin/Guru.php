<?php

class Guru extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('model_guru');
		$this->load->model('model_pengguna');
		$this->load->library('upload');
	}


	function index()
	{
		$kode = $this->session->userdata('idadmin');
		$x['data'] = $this->model_guru->get_all_guru();
		$this->load->view('admin/v_guru', $x);
	}

	function add_guru()
	{
		$x['kat'] = $this->model_kategori->get_all_kategori();
		$this->load->view('admin/v_add_guru', $x);
	}

	function get_edit()
	{
		$kode = $this->uri->segment(4);
		$x['data'] = $this->model_guru->get_guru_by_kode($kode);
		$x['kat'] = $this->model_kategori->get_all_kategori();
		$this->load->view('admin/v_edit_guru', $x);
	}

	function simpan_guru()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
		}
		if ($this->upload->do_upload('filefoto')) {
			$gbr = $this->upload->data();
			//Compress Image

			$config['source_image'] = './assets/images/' . $gbr['file_name'];

			$config['quality'] = '60%';
			$config['width'] = 710;
			$config['height'] = 460;
			$config['new_image'] = './assets/images/' . $gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$gambar = $gbr['file_name'];
			$nama = $this->input->post('xnama');
			$nip = $this->input->post('xnip');
			$alamat = $this->input->post('xalamat');
			$mapel = $this->input->post('xmapel');
			if ($foto = 'upload') {
			} else {
				$config['upload_path'] = './assets/images/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					echo "Gambar Gagal Diupload!";
				} else {
					$foto = $this->upload->data('file_name');
				}
			}
		}
	}
		function do_upload()
		{
			$config['upload_path'] = './assets/images/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

			$this->load->library('upload', $config);
			if ($this->upload->do_upload("file")) {
				$data = array('upload_data' => $this->upload->data());

				$judul = $this->input->post('judul');
				$image = $data['upload_data']['file_name'];

				$result = $this->model_guru->simpan_guru($judul, $image);
				echo json_decode($result);
			}
		}

		function update_guru()
		{
			$config['upload_path'] = './assets/images/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

			$this->upload->initialize($config);
			if (!empty($_FILES['filefoto']['name'])) {
				if ($this->upload->do_upload('filefoto')) {
					$gbr = $this->upload->data();
					//Compress Image

					$config['source_image'] = './assets/images/' . $gbr['file_name'];

					$config['quality'] = '60%';
					$config['width'] = 710;
					$config['height'] = 460;
					$config['new_image'] = './assets/images/' . $gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar = $gbr['file_name'];
					$kode = $this->input->post('kode');
					$nama = $this->input->post('xnama');
					$nip = $this->input->post('xnip');
					$alamat = $this->input->post('xalamat');
					$mapel = $this->input->post('xmapel');
					$this->model_guru->update_guru($kode, $nama, $nip, $alamat, $mapel, $gambar);
					echo $this->session->set_flashdata('msg', 'info');
					redirect('admin/guru');
				} else {
					echo $this->session->set_flashdata('msg', 'warning');
					redirect('admin/guru');
				}
			}
		}

		function hapus_guru()
		{
			$kode = $this->input->post('kode');
			$this->model_guru->hapus_guru($kode);
			echo $this->session->set_flashdata('msg', 'success-hapus');
			redirect('admin/guru');
		}
}
