<?php

/**
 * @property Model_pengguna model_pengguna
 * @property Model_kategori model_kategori
 * @property Model_tulisan model_tulisan
 * @property CI_Session session
 */
class Pengguna extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('model_pengguna');
		$this->load->library('upload');
		$this->load->model('model_kategori');
	}

	function index()
	{
		$kode = $this->session->userdata('idadmin');
		$x['user'] = $this->model_pengguna->get_pengguna_login($kode);
		$x['data'] = $this->model_pengguna->get_all_pengguna();
		$this->load->view('admin/v_pengguna', $x);
	}

	function add_pengguna()
	{
		$x['kat'] = $this->model_kategori->get_all_kategori();
		$this->load->view('admin/v_add_pengguna', $x);
	}

	function get_edit()
	{
		$kode = $this->uri->segment(4);
		$x['data'] = $this->model_tulisan->get_tulisan_by_kode($kode);
		$x['kat'] = $this->model_kategori->get_all_kategori();
		$this->load->view('admin/v_edit_pengguna', $x);
	}

	function simpan_pengguna()
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
				$nama = $this->input->post('xnama');
				$jenkel = $this->input->post('xjenkel');
				$username = $this->input->post('xusername');
				$password = $this->input->post('xpassword');
				$konfirm_password = $this->input->post('xpassword2');
				$email = $this->input->post('xemail');
				$nohp = $this->input->post('xkontak');
				$level = $this->input->post('xlevel');
				$gbr = $_FILES['foto'];
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
				if ($password <> $konfirm_password) {
					echo $this->session->set_flashdata('msg', 'error');
					redirect('admin/pengguna');
				} else {
					$this->model_pengguna->simpan_pengguna($nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar);
					echo $this->session->set_flashdata('msg', 'success');
					redirect('admin/pengguna');

				}


			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin/pengguna');
			}

		} else {
			$nama = $this->input->post('xnama');
			$jenkel = $this->input->post('xjenkel');
			$username = $this->input->post('xusername');
			$password = $this->input->post('xpassword');
			$konfirm_password = $this->input->post('xpassword2');
			$email = $this->input->post('xemail');
			$nohp = $this->input->post('xkontak');
			$level = $this->input->post('xlevel');
			$gambar = $this->input->post('xgambar');
			if ($password <> $konfirm_password) {
				echo $this->session->set_flashdata('msg', 'error');
				redirect('admin/pengguna');
			} else {
				$this->model_pengguna->simpan_pengguna($nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('admin/pengguna');

			}
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

			$result = $this->model_upload->simpan_upload($judul, $image);
			echo json_decode($result);
		}
	}

	function update_pengguna()
	{

		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 710;
				$config['height'] = 460;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$kode = $this->input->post('kode');
				$nama = $this->input->post('xnama');
				$jenkel = $this->input->post('xjenkel');
				$username = $this->input->post('xusername');
				$password = $this->input->post('xpassword');
				$konfirm_password = $this->input->post('xpassword2');
				$email = $this->input->post('xemail');
				$nohp = $this->input->post('xkontak');
				$level = $this->input->post('xlevel');
				//$gambar = $this->input->post('xgambar');
				if (empty($password) && empty($konfirm_password)) {
					$this->model_pengguna->update_pengguna_tanpa_pass($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar);
					echo $this->session->set_flashdata('msg', 'info');
					redirect('admin/pengguna');
				} elseif ($password <> $konfirm_password) {
					echo $this->session->set_flashdata('msg', 'error');
					redirect('admin/pengguna');
				} else {
					$this->model_pengguna->update_pengguna($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar);
					echo $this->session->set_flashdata('msg', 'info');
					redirect('admin/pengguna');
				}

			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin/pengguna');
			}


		} else {
			$kode = $this->input->post('kode');
			$nama = $this->input->post('xnama');
			$jenkel = $this->input->post('xjenkel');
			$username = $this->input->post('xusername');
			$password = $this->input->post('xpassword');
			$konfirm_password = $this->input->post('xpassword2');
			$email = $this->input->post('xemail');
			$nohp = $this->input->post('xkontak');
			$level = $this->input->post('xlevel');
			$gambar = $this->input->post('xgambar');
			if (empty($password) && empty($konfirm_password)) {
				$this->model_pengguna->update_pengguna_tanpa_pass_dan_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('admin/pengguna');
			} elseif ($password <> $konfirm_password) {
				echo $this->session->set_flashdata('msg', 'error');
				redirect('admin/pengguna');
			} else {
				$this->model_pengguna->update_pengguna_tanpa_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('admin/pengguna');
			}
		}

	}

	function hapus_pengguna()
	{

		$kode = $this->input->post('kode');
		$data = $this->model_pengguna->get_pengguna_login($kode);
		$q = $data->row_array();
		$p = $q['pengguna_photo'];
		$path = base_url() . 'assets/images/' . $p;
		delete_files($path);
		$this->model_pengguna->hapus_pengguna($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('admin/pengguna');
	}

	function reset_password()
	{

		$id = $this->uri->segment(4);
		$get = $this->model_pengguna->getusername($id);
		if ($get->num_rows() > 0) {
			$a = $get->row_array();
			$b = $a['pengguna_username'];
		}
		$pass = rand(123456, 999999);
		$this->model_pengguna->resetpass($id, $pass);
		echo $this->session->set_flashdata('msg', 'show-modal');
		echo $this->session->set_flashdata('uname', $b);
		echo $this->session->set_flashdata('upass', $pass);
		redirect('admin/pengguna');

	}

}
