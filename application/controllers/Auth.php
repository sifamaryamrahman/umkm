<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function login() {
        $this->load->view('auth/login');
    }

    public function register() {
        $this->load->view('auth/register');
    }

    public function process_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        // Retrieve user data based on username
        $user = $this->User_model->get_user_by_username($username);
    
        if ($user && password_verify($password, $user->password)) {
            // Password is correct, set session data and redirect to dashboard
            $this->session->set_userdata('username', $user->username);
            $response = array(
                'success' => true,
                'message' => 'Login successful!'
            );
        } else {
            // Invalid username or password, display error message
            if ($user) {
                // If the username exists but the password is wrong
                $response = array(
                    'success' => false,
                    'message' => 'Wrong password.'
                );
            } else {
                // If the username doesn't exist
                $response = array(
                    'success' => false,
                    'message' => 'Invalid username or password.'
                );
            }
        }
    
        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    }    

    public function logout() {
        // Destroy session and redirect to login page
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function dashboard() {
        // Memeriksa apakah pengguna sudah login
        if (!$this->session->userdata('username')) {
            // Jika belum login, redirect ke halaman login
            redirect('auth/login');
            return; // Hentikan eksekusi lebih lanjut
        }

        // Mengambil username dari sesi
        $username = $this->session->userdata('username');
        
        // Mendapatkan fullname pengguna dari model
        $full_name = $this->User_model->get_user_fullname_by_username($username);

        // Memuat view dashboard dengan mengirimkan fullname pengguna
        $data['full_name'] = $full_name;
        $this->load->view('umkm/dashboard', $data);
    }
}
?>
