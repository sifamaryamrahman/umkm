<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Platform extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Platform_model'); // Load the Platform_model
        $this->load->model('User_model');
        $this->load->model('Produk_model');
    }

    public function platforms() {
        // Retrieve all platforms
        // Mendapatkan username dari session
       $username = $this->session->userdata('username');

       // Mendapatkan fullname dari User_model berdasarkan username
       $fullname = $this->User_model->get_user_fullname_by_username($username);

       // Mendapatkan semua produk
       $data['produks'] = $this->Produk_model->get_all_produk();

       // Mendapatkan semua UMKM
       $data['umkms'] = $this->Umkm_model->get_umkms();

       // Menyimpan fullname ke dalam array $data
       $data['fullname'] = $fullname;

        $data['platforms'] = $this->Platform_model->get_all_platforms();

        // Load view with data
        $this->load->view('umkm/platform', $data);
    }

    public function insert_platform() {
        $username = $this->input->post('username');
        $id_produk = $this->input->post('id_produk');
        $whatsapp = $this->input->post('whatsapp');
        $blibli = $this->input->post('blibli');
        $lazada = $this->input->post('lazada');
        $shopee = $this->input->post('shopee');
        $tokopedia = $this->input->post('tokopedia');
        $facebook = $this->input->post('facebook');
        $instagram = $this->input->post('instagram');
        $tiktok = $this->input->post('tiktok');
        $twitter = $this->input->post('twitter');
    
        // Remove leading '0' from WhatsApp number if present
        if (!empty($whatsapp)) {
            $whatsapp = ltrim($whatsapp, '0');
            // Add '62' as prefix to WhatsApp number
            $whatsapp = 'https://wa.me/62' . $whatsapp;
        } else {
            $whatsapp = ''; // If WhatsApp is empty, set it to an empty string
        }
    
        // Prepare the data array
        $data = array(
            'username' => $username,
            'id_produk' => $id_produk,
            'whatsapp' => $whatsapp,
            // Check if Blibli is not empty before adding the link
            'blibli' => !empty($blibli) ? 'https://www.blibli.com/user/' . $blibli : '',
            // Check if Lazada is not empty before adding the link
            'lazada' => !empty($lazada) ? 'https://www.lazada.co.id/shop/' . $lazada : '',
            // Check if Shopee is not empty before adding the link
            'shopee' => !empty($shopee) ? 'https://shopee.co.id/' . $shopee : '',
            // Check if Tokopedia is not empty before adding the link
            'tokopedia' => !empty($tokopedia) ? 'https://www.tokopedia.com/' . $tokopedia : '',
            // Check if Facebook is not empty before adding the link
            'facebook' => !empty($facebook) ? 'https://www.facebook.com/' . $facebook : '',
            // Check if Instagram is not empty before adding the link
            'instagram' => !empty($instagram) ? 'https://www.instagram.com/' . $instagram : '',
            // Check if TikTok is not empty before adding the link
            'tiktok' => !empty($tiktok) ? 'https://www.tiktok.com/@' . $tiktok : '',
            // Check if Twitter is not empty before adding the link
            'twitter' => !empty($twitter) ? 'https://' . $twitter : ''
        );
    
       // Check apakah id_produk sudah ada dalam database
    $existing_id_produk = $this->Platform_model->check_id_produk_existence($id_produk);

    if ($existing_id_produk) {
        // Jika sudah ada, kirim pesan kesalahan
        $response = array(
            'message' => 'Failed to add platform. id_produk already exists.'
        );
    } else {
        // Jika belum ada, lanjutkan dengan proses penyisipan data
        // ... proses lainnya seperti yang telah Anda implementasikan sebelumnya

        // Call the model to save platform data
        $inserted = $this->Platform_model->insert_platform($data);

        // Prepare response to be sent back to the user
        $response = array();
        if ($inserted) {
            $response['message'] = 'Platform added successfully.';
            $response['platform'] = $data;
        } else {
            $response['message'] = 'Failed to add platform.';
        }
    }

    // Call the model to get all users
    $all_users = $this->User_model->get_all_users();
    $usernames = array();
    foreach ($all_users as $user) {
        $usernames[] = $user->username;
    }
    $response['usernames'] = $usernames;

    // Send response in JSON format
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
}
    
    

    public function update_platform() {
        $id = $this->input->post('id'); // Assuming you're passing the platform ID via POST
    
        // Retrieve the platform data from the form
        $username = $this->input->post('username');
        $id_produk = $this->input->post('id_produk');
        $whatsapp = $this->input->post('whatsapp');
        $blibli = $this->input->post('blibli');
        $lazada = $this->input->post('lazada');
        $shopee = $this->input->post('shopee');
        $tokopedia = $this->input->post('tokopedia');
        $facebook = $this->input->post('facebook');
        $instagram = $this->input->post('instagram');
        $tiktok = $this->input->post('tiktok');
        $twitter = $this->input->post('twitter');
    

        // Remove leading '0' from WhatsApp number if present
        if (!empty($whatsapp)) {
            $whatsapp = ltrim($whatsapp, '62');
            $whatsapp = ltrim($whatsapp, '0');
            // Add '62' as prefix to WhatsApp number
            $whatsapp = 'https://wa.me/62' . $whatsapp;
        } else {
            $whatsapp = ''; // If WhatsApp is empty, set it to an empty string
        }
    
        // Prefix links for other platforms as before
        $blibli = !empty($blibli) ? 'https://www.blibli.com/user/' . $blibli : '';
        $lazada = !empty($lazada) ? 'https://www.lazada.co.id/shop/' . $lazada : '';
        $shopee = !empty($shopee) ? 'https://shopee.co.id/' . $shopee : '';
        $tokopedia = !empty($tokopedia) ? 'https://www.tokopedia.com/' . $tokopedia : '';
        $facebook = !empty($facebook) ? 'https://www.facebook.com/' . $facebook : '';
        $instagram = !empty($instagram) ? 'https://www.instagram.com/' . $instagram : '';
        $tiktok = !empty($tiktok) ? 'https://www.tiktok.com/@' . $tiktok : '';
        $twitter = !empty($twitter) ? 'https://' . $twitter : '';
    
       $data = array(
            'username' => $username,
            'id_produk' => $id_produk,
            'whatsapp' => $whatsapp,
            'blibli' => $blibli,
            'lazada' => $lazada,
            'shopee' => $shopee,
            'tokopedia' => $tokopedia,
            'facebook' => $facebook,
            'instagram' => $instagram,
            'tiktok' => $tiktok,
            'twitter' => $twitter
        );
    
    
        // Call the model to get current platform data
        $current_platform_data = $this->Platform_model->get_platform_by_id($id);
    
        // Check if there are any changes
        $changes = array_diff_assoc($data, (array)$current_platform_data);
        if (empty($changes)) {
            $response['message'] = 'No changes to update.';
        } else {
            // Call the model to update platform data
            $updated = $this->Platform_model->update_platform($id, $data);
    
            // Prepare response to be sent back to the user
            $response = array();
            if ($updated) {
                $response['message'] = 'Platform updated successfully.';
                $response['platform'] = $data; 
            } else {
                $response['message'] = 'Failed to update platform.';
            }
        }
    
        // Call the model to get all users
        $all_users = $this->User_model->get_all_users();
        $usernames = array(); 
        foreach ($all_users as $user) {
            $usernames[] = $user->username; 
        }
        $response['usernames'] = $usernames; 
    
        // Send response in JSON format
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }
    

    public function delete_platform($id) {
        // Panggil method untuk menghapus kategori dari model
        $result = $this->Platform_model->delete_platform($id);

        if ($result) {
            // Jika penghapusan berhasil
            $response['message'] = 'Platform deleted successfully.';
        } else {
            // Jika penghapusan gagal
            $response['message'] = 'Failed to delete platform.';
        }

        // Mengembalikan respons dalam format JSON
        echo json_encode($response);
    }
}
