<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function save() {
        // Tangkap data dari formulir pendaftaran
        $username = $this->input->post('username');
        $fullname = $this->input->post('fullname');
        $password = $this->input->post('password');
        $confpassword = $this->input->post('confpassword');
        $usertype = $this->input->post('usertype');
        $jalan = $this->input->post('jalan');
        $desa_kelurahan = $this->input->post('desa_kelurahan');
        $kecamatan = $this->input->post('kecamatan');
        $nomor_hp = $this->input->post('nomor_hp');
        $email = $this->input->post('email');
    
        // Validasi panjang username, password, dan confpassword
        if (strlen($username) < 5 || strlen($password) < 5 || strlen($confpassword) < 5) {
            // Jika salah satu input kurang dari 5 karakter, tampilkan pesan kesalahan
            $this->output->set_content_type('application/json')->set_output(json_encode(['message' => "Username, password, and confpassword must be at least 5 characters long."]));
            return;
        }
    
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $hashed_confpassword = password_hash($confpassword, PASSWORD_DEFAULT);
    
        $data = array(
            'username' => $username,
            'fullname' => $fullname,
            'password' => $hashed_password,
            'confpassword' => $hashed_confpassword,
            'usertype' => $usertype,
            'jalan' => $jalan,
            'desa_kelurahan' => $desa_kelurahan,
            'kecamatan' => $kecamatan,
            'nomor_hp' => $nomor_hp,
            'email' => $email
        );
    
        // Validasi konfirmasi password
        if ($password !== $confpassword) {
            // Jika konfirmasi password tidak sesuai, tampilkan pesan kesalahan
            $this->output->set_content_type('application/json')->set_output(json_encode(['message' => "Password confirmation doesn't match."]));
            return;
        }
    
        // Check if the username already exists
        $existing_user = $this->User_model->get_user_by_username($username);
        if ($existing_user) {
            // Jika nama pengguna sudah ada, tampilkan pesan kesalahan
            $this->output->set_content_type('application/json')->set_output(json_encode(['message' => "Username already exists. Please choose a different username."]));
            return;
        }
    
        // Check if a file is uploaded
        if (!empty($_FILES['photo']['name'])) {
            // File is uploaded, include it in the data
            $config['upload_path'] = './uploads/users/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $_FILES['photo']['name']; // Gunakan nama file yang diunggah
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('photo')) {
                $data['photo'] = $this->upload->data('file_name'); // Assign uploaded filename
            } else {
                // Jika gagal mengunggah gambar, tangani kesalahan
                $error = array('error' => $this->upload->display_errors());
                // Tampilkan pesan kesalahan jika perlu
            }
        } else {
            // No file uploaded, assign default image filename
            $data['photo'] = 'default.png';
        }
    
        // Simpan data pengguna ke dalam database menggunakan model
        $result = $this->User_model->save_user($data); // Save user data using the model
    
        if ($result) {
            // Jika penyimpanan berhasil
            // Kirim respons JSON untuk notifikasi SweetAlert
            $this->output->set_content_type('application/json')->set_output(json_encode(['message' => 'Registration successful.']));
        } else {
            // Jika penyimpanan gagal
            // Kirim respons JSON untuk notifikasi SweetAlert
            $this->output->set_content_type('application/json')->set_output(json_encode(['message' => 'Registration failed.']));
        }
    }
    public function delete($id_user) {
        // Panggil metode model untuk menghapus pengguna berdasarkan id_user
        $deleted = $this->User_model->delete_user($id_user);
    
        if ($deleted) {
            // Jika penghapusan berhasil
            // Kirim respons JSON untuk notifikasi SweetAlert
            $this->output->set_content_type('application/json')->set_output(json_encode(['message' => 'User deleted successfully.']));
        } else {
            // Jika penghapusan gagal
            // Kirim respons JSON untuk notifikasi SweetAlert
            $this->output->set_content_type('application/json')->set_output(json_encode(['message' => 'Failed to delete user.']));
        }
    }
    public function edit($id_user) {
        // Tangkap data dari formulir pengeditan
        $data = array(
            'username' => $this->input->post('username'),
            'fullname' => $this->input->post('fullname'),
            'usertype' => $this->input->post('usertype'),
            'jalan' => $this->input->post('jalan'),
            'desa_kelurahan' => $this->input->post('desa_kelurahan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'nomor_hp' => $this->input->post('nomor_hp'),
            'email' => $this->input->post('email'),
        );
    
        // Tangkap data password jika diubah
        $password = $this->input->post('password');
        $confpassword = $this->input->post('confpassword');
    
        if (!empty($password) && $password === $confpassword) {
            // Hash password
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        } elseif ($password !== $confpassword) {
            // Jika konfirmasi password tidak sesuai, tampilkan pesan kesalahan
            $this->output->set_content_type('application/json')->set_output(json_encode(['message' => "Password confirmation doesn't match."]));
            return;
        }
    
        // Check if a file is uploaded
        if (!empty($_FILES['photo']['name'])) {
            // File is uploaded, include it in the data
            $config['upload_path'] = './uploads/users/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $_FILES['photo']['name']; // Gunakan nama file yang diunggah
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('photo')) {
                $data['photo'] = $this->upload->data('file_name'); // Assign uploaded filename
            } else {
                // Jika gagal mengunggah gambar, tangani kesalahan
                $error = array('error' => $this->upload->display_errors());
                // Tampilkan pesan kesalahan jika perlu
                $this->output->set_content_type('application/json')->set_output(json_encode(['message' => $error['error']]));
                return;
            }
        }
    
        // Update data pengguna ke dalam database menggunakan model
        $updated = $this->User_model->edit_user($id_user, $data);
    
        if ($updated) {
            // Jika pembaruan berhasil
            // Kirim respons JSON untuk notifikasi SweetAlert
            $this->output->set_content_type('application/json')->set_output(json_encode(['message' => 'User updated successfully.']));
        } else {
            // Jika pembaruan gagal
            // Kirim respons JSON untuk notifikasi SweetAlert
            $this->output->set_content_type('application/json')->set_output(json_encode(['message' => 'Failed to update user.']));
        }
    }    
}
?>
