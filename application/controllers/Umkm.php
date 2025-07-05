<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umkm extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Umkm_model');
        $this->load->model('Produk_model');
        $this->load->model('User_model');
    }

    public function menunggu() {
        $data['umkms'] = $this->Umkm_model->get_umkms();
        $data['usernames'] = $this->User_model->get_all_users();
        $this->load->view('umkm/menunggu', $data);
    }
    

    public function insert_umkm() {
        $nama_pemilik = $this->input->post('nama_pemilik');
        $username = $this->input->post('username');
        $jalan = $this->input->post('jalan');
        $desa_kelurahan = $this->input->post('desa_kelurahan');
        $kecamatan = $this->input->post('kecamatan');
        $nomor_hp = $this->input->post('nomor_hp');
        $email = $this->input->post('email');
        $photo = 'default.png';
    
        $data = array(
            'nama_pemilik' => $nama_pemilik,
            'username' => $username,
            'jalan' => $jalan,
            'desa_kelurahan' => $desa_kelurahan,
            'kecamatan' => $kecamatan,
            'nomor_hp' => $nomor_hp,
            'email' => $email,
            'photo' => $photo 
        );
    
        if ($this->Umkm_model->insert_umkm($data)) {
            $response['message'] = 'UMKM Owner added successfully.'; 
            $response['umkm'] = $data; 
        } else {
            $response['message'] = 'Failed to add UMKM Owner.';
        }
    
        $all_users = $this->User_model->get_all_users();
        $usernames = array(); 
        foreach ($all_users as $user) {
            $usernames[] = $user->username; 
        }
        $response['usernames'] = $usernames; 
        echo json_encode($response);
    }
    
    public function update_umkm($id) {
        $data = array(
            'nama_pemilik' => $this->input->post('nama_pemilik'),
            'jalan' => $this->input->post('jalan'),
            'desa_kelurahan' => $this->input->post('desa_kelurahan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'nomor_hp' => $this->input->post('nomor_hp'),
            'email' => $this->input->post('email')
        );
    
        if (!empty($_FILES['photo']['name'])) {
            $upload_result = $this->upload_photo();
    
            if (!$upload_result['success']) {
                echo json_encode(array('message' => $upload_result['message']));
                return;
            }
    
            $data['photo'] = $upload_result['file_name'];
        }
    
        if ($this->Umkm_model->update_umkm($id, $data)) {
            $response['message'] = 'UMKM Owner updated successfully.';
            $response['umkm'] = $data;
        } else {
            $response['message'] = 'Failed to update UMKM Owner.';
        }
    
        $all_users = $this->User_model->get_all_users();
        $usernames = array();
        foreach ($all_users as $user) {
            $usernames[] = $user->username;
        }
        $response['usernames'] = $usernames;
    
        echo json_encode($response);
    }
    
    private function upload_photo() {
        $config['upload_path'] = './uploads/umkm/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1024; // 1MB
        $config['encrypt_name'] = TRUE;
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('photo')) {
            $upload_data = $this->upload->data();
            return array('success' => true, 'file_name' => $upload_data['file_name']);
        } else {
            return array('success' => false, 'message' => $this->upload->display_errors());
        }
    }
    
    public function update_status($umkm_id) {
        $success = $this->Umkm_model->update_status($umkm_id);
        
        $response = array();
        
        if($success) {
            $response['success'] = true;
            $response['message'] = "Status of UMKM with ID $umkm_id has been approved.";
        } else {
            $response['success'] = false;
            $response['message'] = "Failed to approve UMKM with ID $umkm_id. It might be already approved or not found.";
        }
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function delete($id) {
        if ($this->Umkm_model->delete_umkm($id)) {
            $response['success'] = true;
            $response['message'] = 'UMKM Owner deleted successfully.';
        } else {
            $response['success'] = false;
            $response['message'] = 'Failed to delete UMKM Owner.';
        }
    
        echo json_encode($response);
    }
    public function report() {
        // Load data from models
        $data['umkms'] = $this->Umkm_model->get_umkm_report();
        $data['produks'] = $this->Produk_model->get_produk_report();
    
        // Load view with data
        $this->load->view('index', $data);
    }
    
    
}
?>
