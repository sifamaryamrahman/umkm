<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		// Load model yang diperlukan
		$this->load->model('Produk_model');
		$this->load->model('Umkm_model');
		$this->load->model('User_model');
	}

	public function index()
	{
		// Panggil method dalam model untuk mendapatkan data produk
		$data['users'] = $this->User_model->get_all_users();
		$data['produks'] = $this->Produk_model->get_all_produk();
		
		$data['produks'] = $this->Produk_model->get_produk_report();
		// Load view dan kirimkan data produk ke view
		$this->load->view('index', $data);
	}
}
