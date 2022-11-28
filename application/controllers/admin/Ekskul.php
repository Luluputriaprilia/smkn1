<?php

class Ekskul extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		}
		$this->load->model('model_ekskul');
		$this->load->library('upload');
		$this->load->model('model_kategori');
	}

	function index()
	{
		$x['data'] = $this->model_kategori->get_all_kategori();
		$this->load->view('admin/v_ekskul', $x);
	}


	function add_ekskul()
	{
		$x['kat'] = $this->model_kategori->get_all_kategori();
		$this->load->view('admin/v_add_ekskul;', $x);
	}

	function get_edit()
	{
		$kode = $this->uri->segment(4);
		$x['data'] = $this->model_tulisan->get_tulisan_by_kode($kode);
		$x['kat'] = $this->model_kategori->get_all_kategori();
		$this->load->view('admin/v_edit_ekskul', $x);
	}

	function simpan_ekskul()
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
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$photo = $gbr['file_name'];
				$judul = $this->input->post('ekskul_judul');
				$deskripsi = $this->input->post('ekskul_deskripsi');
				$this->model_ekskul->simpan_ekskul($judul, $deskripsi, $photo);

				echo $this->session->set_flashdata('msg', 'success');
				redirect('admin/ekskul');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin/ekskul');
			}

		} else {
			$judul = $this->input->post('ekskul_judul');
			$deskripsi = $this->input->post('ekskul_deskripsi');

			$this->model_ekskul->simpan_ekskul_tanpa_img($judul, $deskripsi);
			echo $this->session->set_flashdata('msg', 'success');
			redirect('admin/ekskul');
		}


	}

	function do_upload()
	{
		$config['upload_path'] = "./assets/images";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload("file")) {
			$data = array('upload_data' => $this->upload->data());

			$judul = $this->input->post('judul');
			$image = $data['upload_data']['file_name'];

			$result = $this->m_upload->simpan_upload($judul, $image);
			echo json_decode($result);
		}
	}

	function update_ekskul()
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
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$gambar = $this->input->post('gambar');
				$path = './assets/images/' . $gambar;
				unlink($path);

				$photo = $gbr['file_name'];
				$kode = $this->input->post('kode');
				$judul = $this->input->post('ekskul_judul');
				$deskripsi = $this->input->post('ekskul_deskripsi');

				$this->model_ekskul->update_ekskul($kode, $judul, $deskripsi, $photo);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('admin/ekskul');

			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin/ekskul');
			}

		} else {

			$kode = $this->input->post('kode');
			$judul = $this->input->post('ekskul_judul');
			$deskripsi = $this->input->post('ekskul_deskripsi');

			$this->model_ekskul->update_ekskul_tanpa_img($kode, $judul, $deskripsi);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin/ekskul');
		}
	}

	function hapus_ekskul()
	{
		$kode = $this->input->post('kode');
		$this->model_ekskul->hapus_ekskul($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('admin/ekskul');
	}

	function reset_password()
	{

		$id = $this->uri->segment(4);
		$get = $this->model_ekskul->getusername($id);
		if ($get->num_rows() > 0) {
			$a = $get->row_array();
			$b = $a['pengguna_username'];
		}
		$pass = rand(123456, 999999);
		$this->model_ekskul->resetpass($id, $pass);
		echo $this->session->set_flashdata('msg', 'show-modal');
		echo $this->session->set_flashdata('uname', $b);
		echo $this->session->set_flashdata('upass', $pass);
		redirect('admin/ekskul');

	}


}
