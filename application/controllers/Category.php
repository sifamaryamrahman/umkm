<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model'); 
        $this->load->model('Umkm_model');
        $this->load->model('User_model'); // Memuat model User_model
    }

    public function kategori1() {
        $data['categories'] = $this->Category_model->get_all_categories();
        $username = $this->session->userdata('username');
        $data['umkms'] = $this->Umkm_model->get_umkms();
        $data['user'] = $this->User_model->get_user_by_username($username); // Assuming you retrieve user data by ID
        $this->load->view('umkm/kategori1', $data);
    }
    

    public function create() {
        // Load the Umkm_model
        $this->load->model('Umkm_model');
    
        // Call the get_umkms method from Umkm_model to get the list of umkm_name
        $data['umkms'] = $this->Umkm_model->get_umkms();
    
        // If the form is submitted
        if($this->input->post()) {
            // Prepare data to be inserted into the database
            $dataToInsert = array(
                'nama_pemilik' => $this->input->post('nama_pemilik'),
                'name_category' => $this->input->post('name_category')
            );
            // Load the Category_model
            $this->load->model('Category_model');
            // Add the new category to the database
            $this->Category_model->create_kategori($dataToInsert);
            // Redirect to the main category page
            redirect('category/kategori1');
        } else {
            // If not, get user data (e.g., from session or user model)
    
            // If not, display the form to create a new category with the list of umkm_name
            $this->load->view('umkm/kategori1', $data);
        }  
    }
    

    public function edit($id) {
        // Jika formulir dikirim
        if($this->input->post()) {
            // Menyiapkan data untuk dimasukkan ke dalam database
            $data = array(
                'nama_pemilik' => $this->input->post('nama_pemilik'),
                'name_category' => $this->input->post('name_category')
            );
            // Memperbarui kategori di database
            $this->Category_model->update_kategori($id, $data);
            // Redirect ke halaman utama kategori
            redirect('category/index');
        } else {
            // Mengambil detail kategori berdasarkan ID
            $data['category'] = $this->Category_model->get_kategori_by_id($id);
            // Menampilkan formulir edit dengan data kategori
            $this->load->view('umkm/kategori1/edit', $data);
        }
    }
    public function delete($id) {
        // Panggil method untuk menghapus kategori dari model
        $result = $this->Category_model->delete_kategori($id);

        if ($result) {
            // Jika penghapusan berhasil
            $response['message'] = 'Category deleted successfully.';
        } else {
            // Jika penghapusan gagal
            $response['message'] = 'Failed to delete category.';
        }

        // Mengembalikan respons dalam format JSON
        echo json_encode($response);
    }
}
