<?php

class Agenda extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		}
		$this->load->model('model_agenda');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->model_agenda->get_all_agenda();
		$this->load->view('admin/v_agenda', $x);
	}

	function add_agenda()
	{
		$x['kat'] = $this->model_kategori->get_all_kategori();
		$this->load->view('admin/v_add_agenda', $x);
	}

	function get_edit()
	{
		$kode = $this->uri->segment(4);
		$x['data'] = $this->model_tulisan->get_tulisan_by_kode($kode);
		$x['kat'] = $this->model_kategori->get_all_kategori();
		$this->load->view('admin/v_edit_agenda', $x);
	}

	function simpan_agenda()
	{
		$this->upload->initialize($config);
				$nama=$this->input->post('xnama');
				$deskripsi=$this->input->post('xdeskripsi');
				$mulai=$this->input->post('xmulai');
				$tempat=$this->input->post('xtempat');
				$waktu=$this->input->post('xwaktu');
				$keterangan=$this->input->post('xketerangan');
				$level=$this->input->post('xlevel');	

				}else {
					$this->model_agenda->simpan_agenda($nama_agenda, $deskripsi, $mulai, $selesai, $tempat, $waktu, $keterangan);
					echo $this->session->set_flashdata('msg', 'success');
					redirect('admin/agenda');
				}

				} else {
					echo $this->session->set_flashdata('msg', 'warning');
					redirect('admin/agenda');
				}

	
	function update_agenda()
	{

		$this->upload->initialize($config);
				$nama=$this->input->post('xnama');
				$deskripsi=$this->input->post('xdeskripsi');
				$mulai=$this->input->post('xmulai');
				$tempat=$this->input->post('xtempat');
				$waktu=$this->input->post('xwaktu');
				$keterangan=$this->input->post('xketerangan');
				$level=$this->input->post('xlevel');
	
				$this->model_agenda->simpan_agenda($nama_agenda, $deskripsi, $mulai, $selesai, $tempat, $waktu, $keterangan);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('admin/agenda');
				
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin/agenda');


		
				$nama=$this->input->post('xnama');
				$deskripsi=$this->input->post('xdeskripsi');
				$mulai=$this->input->post('xmulai');
				$tempat=$this->input->post('xtempat');
				$waktu=$this->input->post('xwaktu');
				$keterangan=$this->input->post('xketerangan');
				$level=$this->input->post('xlevel');
			}else {
					$this->model_agenda->simpan_agenda($nama_agenda, $deskripsi, $mulai, $selesai, $tempat, $waktu, $keterangan);
					echo $this->session->set_flashdata('msg', 'success');
					redirect('admin/agenda');
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