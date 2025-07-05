<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promosi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Promosi_model'); // Assuming this model handles promotional activities
        // You may load other necessary models related to promotions here
    }


    public function insert_promosi() {
        $username = $this->input->post('username');
        $fasilitasi_promosi = $this->input->post('fasilitasi_promosi');
        $hambatan_memasarkan_produk = $this->input->post('hambatan_memasarkan_produk');
        $bantuan_dibutuhkan = $this->input->post('bantuan_dibutuhkan');
        $berminat_bazar_ramadhan = $this->input->post('berminat_bazar_ramadhan');
        $berminat_pelatihan_online = $this->input->post('berminat_pelatihan_online');
    
        $data = array(
            'username' => $username,
            'fasilitasi_promosi' => $fasilitasi_promosi,
            'hambatan_memasarkan_produk' => $hambatan_memasarkan_produk,
            'bantuan_dibutuhkan' => $bantuan_dibutuhkan,
            'berminat_bazar_ramadhan' => $berminat_bazar_ramadhan,
            'berminat_pelatihan_online' => $berminat_pelatihan_online
        );
    
        if ($this->Promosi_model->insert_promosi($data)) {
            $response['message'] = 'Promosi added successfully.';
            $response['promosi'] = $data; 
        } else {
            $response['message'] = 'Failed to add Promosi.';
        }
    
        $all_users = $this->User_model->get_all_users();
        $usernames = array(); 
        foreach ($all_users as $user) {
            $usernames[] = $user->username; 
        }
        $response['usernames'] = $usernames; 
        echo json_encode($response);
    }
    
    public function update_promosi($id) {
        // Retrieve data from POST request parameters
        $username = $this->input->post('username');
        $fasilitasi_promosi = $this->input->post('fasilitasi_promosi');
        $hambatan_memasarkan_produk = $this->input->post('hambatan_memasarkan_produk');
        $bantuan_dibutuhkan = $this->input->post('bantuan_dibutuhkan');
        $berminat_bazar_ramadhan = $this->input->post('berminat_bazar_ramadhan');
        $berminat_pelatihan_online = $this->input->post('berminat_pelatihan_online');
        
        // Prevent fasilitasi_promosi from NULL in DB
        if ($fasilitasi_promosi == null) {
            $fasilitasi_promosi = 'Tidak';
        }

        // Construct data array
        $data = array(
            'username' => $username,
            'fasilitasi_promosi' => $fasilitasi_promosi,
            'hambatan_memasarkan_produk' => $hambatan_memasarkan_produk,
            'bantuan_dibutuhkan' => $bantuan_dibutuhkan,
            'berminat_bazar_ramadhan' => $berminat_bazar_ramadhan,
            'berminat_pelatihan_online' => $berminat_pelatihan_online
        );
    
        // Update promotional activity in the database
        if ($this->Promosi_model->update_promosi($id, $data)) {
            $response['message'] = 'Promosi updated successfully.';
            $response['promosi'] = $data;
        } else {
            $response['message'] = 'Failed to update Promosi.';
        }
    
        // Get all usernames from User_model and add to the response array
        $all_users = $this->User_model->get_all_users();
        $usernames = array(); 
        foreach ($all_users as $user) {
            $usernames[] = $user->username; 
        }
        $response['usernames'] = $usernames; 
    
        // Encode the response array as JSON and echo it
        echo json_encode($response);
    }
    
    
    public function delete($id) {
        if ($this->Promosi_model->delete_promosi($id)) {
            $response['success'] = true;
            $response['message'] = 'Promosi deleted successfully.';
        } else {
            $response['success'] = false;
            $response['message'] = 'Failed to delete Promosi.';
        }
    
        echo json_encode($response);
    }

    public function report() {
        // Your code for generating a promotional activity report
    }
    
    // Other methods related to promotions as needed
    
}
?>
