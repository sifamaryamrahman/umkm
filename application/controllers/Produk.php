<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Produk_model'); // Load the Bidang_usaha_model
        $this->load->model('Umkm_model');
        $this->load->model('User_model');
    }

    public function produk() {
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

       // Memuat view dengan data
       $this->load->view('umkm/produk', $data);
   }

   public function insert_produk() {
    $username = $this->input->post('username');
    $nama_usaha = $this->input->post('nama_usaha');
    $nama_merek_produk = $this->input->post('nama_merek_produk');
    $kategori_produk = $this->input->post('kategori_produk');
    $nib = $this->input->post('nib');
    $pirt = $this->input->post('pirt');
    $bpom = $this->input->post('bpom');
    $halal = $this->input->post('halal');
    $haki = $this->input->post('haki');
    $lainnya = $this->input->post('lainnya');
    $deskripsi_produk = $this->input->post('deskripsi_produk');
    $jenis_pemasaran = $this->input->post('jenis_pemasaran');
    
    // Default photo name
    $photo = 'default.png';

    // Check if file uploaded
    if (!empty($_FILES['userfile']['name'])) {
        $upload_path = './uploads/produk/';
        $photo = $_FILES['userfile']['name'];
        $photo_path = $upload_path . $photo;

        // Move uploaded file to upload directory
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $photo_path)) {
            // File uploaded successfully
        } else {
            // Failed to move file, use default photo
            $photo = 'default.png';
        }
    }

    // Split jenis_pemasaran into array
    $jenis_pemasaran_array = explode(',', $jenis_pemasaran);
    
    // Prepare data array to insert into database
    $data = array(
        'username' => $username,
        'nama_usaha' => $nama_usaha,
        'nama_merek_produk' => $nama_merek_produk,
        'kategori_produk' => $kategori_produk,
        'nib' => $nib,
        'pirt' => $pirt,
        'bpom' => $bpom,
        'halal' => $halal,
        'haki' => $haki,
        'lainnya' => $lainnya,
        'deskripsi_produk' => $deskripsi_produk,
        'online' => in_array('Online', $jenis_pemasaran_array) ? 'Online' : '',
        'offline' => in_array('Offline', $jenis_pemasaran_array) ? 'Offline' : '',
        'agen_reseller' => in_array('Agen / Reseller', $jenis_pemasaran_array) ? 'Agen / Reseller' : '',
        'photo' => $photo 
    );
    
    // Call model to insert product data
    $inserted = $this->Produk_model->insert_produk($data);
    
    // Prepare response to send back to user
    $response = array();
    if ($inserted) {
        $response['message'] = 'UMKM added successfully.';
        $response['product'] = $data; // Include product information in response
    } else {
        $response['message'] = 'Failed to add UMKM.';
    }

    // Call model to get all users
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





public function update_produk() {
    $id = $this->input->post('id'); // Mengambil ID produk yang akan diupdate
    $username = $this->input->post('username');
    $nama_usaha = $this->input->post('nama_usaha');
    $nama_merek_produk = $this->input->post('nama_merek_produk');
    $kategori_produk = $this->input->post('kategori_produk');
    $nib = $this->input->post('nib'); // Field baru untuk 'nib'
    $pirt = $this->input->post('pirt'); // Field baru untuk 'pirt'
    $bpom = $this->input->post('bpom'); // Field baru untuk 'bpom'
    $halal = $this->input->post('halal'); // Field baru untuk 'halal'
    $haki = $this->input->post('haki'); // Field baru untuk 'haki'
    $lainnya = $this->input->post('lainnya'); // Field baru untuk 'lainnya'
    $deskripsi_produk = $this->input->post('deskripsi_produk');
    $jenis_pemasaran = $this->input->post('jenis_pemasaran');
    $status = $this->input->post('status');
    
    // Cek apakah ada file yang diunggah
    if (!empty($_FILES['photo']['name'])) {
        $config['upload_path'] = './uploads/produk/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // Batasan 2MB, bisa disesuaikan
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('photo')) {
            $upload_data = $this->upload->data();
            $photo = $upload_data['file_name'];
            
            // Hapus foto lama jika bukan default.png
            $old_photo = $this->Produk_model->get_photo_by_id($id); // Fungsi contoh untuk mendapatkan foto lama
            if ($old_photo && $old_photo != 'default.png') {
                $path = './uploads/produk/'.$old_photo;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        } else {
            $error = $this->upload->display_errors();
            $response['message'] = 'Gagal mengunggah foto: ' . $error;
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
            return;
        }
    } else {
        // Tidak ada foto baru yang diunggah, gunakan foto yang ada
        $photo = $this->Produk_model->get_photo_by_id($id); // Fungsi contoh untuk mendapatkan foto lama
    }
    
    // Proses data untuk jenis pemasaran
    $jenis_pemasaran_array = explode(',', $jenis_pemasaran);
    
    $data = array(
        'username' => $username,
        'nama_usaha' => $nama_usaha,
        'nama_merek_produk' => $nama_merek_produk,
        'kategori_produk' => $kategori_produk,
        'nib' => $nib,
        'pirt' => $pirt,
        'bpom' => $bpom,
        'halal' => $halal,
        'haki' => $haki,
        'lainnya' => $lainnya,
        'deskripsi_produk' => $deskripsi_produk,
        'online' => in_array('Online', $jenis_pemasaran_array) ? 'Online' : '',
        'offline' => in_array('Offline', $jenis_pemasaran_array) ? 'Offline' : '',
        'agen_reseller' => in_array('Agen / Reseller', $jenis_pemasaran_array) ? 'Agen / Reseller' : '',
        'status' => $status,
        'photo' => $photo 
    );
    
    // Panggil model untuk melakukan update produk
    if ($this->Produk_model->update_produk($id, $data)) {
        $response['message'] = 'UMKM berhasil diubah.';
        $response['product'] = $data;
    } else {
        $response['message'] = 'Gagal mengubah UMKM.';
    }
    
    // Keluarkan respons dalam format JSON
    $this->output->set_content_type('application/json')->set_output(json_encode($response));
}

    
    

    public function delete($id) {
        // Panggil method untuk menghapus kategori dari model
        $result = $this->Produk_model->delete_produk($id);

        if ($result) {
            // Jika penghapusan berhasil
            $response['message'] = 'UMKM deleted successfully.';
        } else {
            // Jika penghapusan gagal
            $response['message'] = 'Failed to delete UMKM.';
        }

        // Mengembalikan respons dalam format JSON
        echo json_encode($response);
    }
    
}
