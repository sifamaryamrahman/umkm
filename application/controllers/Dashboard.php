<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Umkm_model');
        $this->load->model('Produk_model');
        $this->load->model('Platform_model');
        $this->load->model('Promosi_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        // Retrieve umkms data
        $nama_usaha = $this->input->get('nama_usaha');
        $nama_merek_produk = $this->input->get('nama_merek_produk');
        $kategori_produk = $this->input->get('kategori_produk');
        $online = $this->input->get('online');
        $offline = $this->input->get('offline');
        $agen_reseller = $this->input->get('agen_reseller');
    
        // Fetch user data (adjust according to your actual method)
        $user_data = $this->session->userdata('user_data'); // Example, adjust as necessary
    
        // Call the model method to fetch filtered products
        $data['products'] = $this->Produk_model->searchProducts($nama_usaha, $nama_merek_produk, $kategori_produk, $online, $offline, $agen_reseller);
        $user = $this->User_model->get_all_users();
        $produk = $this->Produk_model->get_approved_produk();
        
        // Pass user data and umkms data to the menunggu view
        $data['user'] = $user_data;
        $data['users'] = $user;
        $data['produks'] = $produk;
        $this->load->view('index', $data);
    }
    public function filter() {
        // Retrieve umkms data
        $nama_usaha = $this->input->get('nama_usaha');
        $nama_merek_produk = $this->input->get('nama_merek_produk');
        $kategori_produk = $this->input->get('kategori_produk');
        $online = $this->input->get('online');
        $offline = $this->input->get('offline');
        $agen_reseller = $this->input->get('agen_reseller');
    
        // Fetch user data (adjust according to your actual method)
        $user_data = $this->session->userdata('user_data'); // Example, adjust as necessary
    
        // Call the model method to fetch filtered products
        $data['products'] = $this->Produk_model->searchProducts($nama_usaha, $nama_merek_produk, $kategori_produk, $online, $offline, $agen_reseller);
        $umkm = $this->User_model->get_users();
        $produk = $this->Produk_model->get_all_produk();
        
        // Pass user data and umkms data to the menunggu view
        $data['user'] = $user_data;
        $data['umkms'] = $umkm;
        $data['produks'] = $produk;
        $this->load->view('filter', $data);
    }
    
    
    public function promosi() {
        $this->load->model('Promosi_model');
        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to login page
            redirect('auth/login');
            return; // Add this line to prevent further execution
        }
    
        // Get username from session
        $username = $this->session->userdata('username');
        
        // Retrieve user data based on username
        $user_data = $this->User_model->get_user_by_username($username);
        
        // Retrieve umkms data
        $promosi = $this->Promosi_model->get_all_promosi();
        $promosi = $this->Promosi_model->get_promosi_by_username($username);
        $user = $this->User_model->get_users();
        $produk = $this->Produk_model->get_produks();
        
        // Pass user data and umkms data to the menunggu view
        $data['user'] = $user_data;
        $data['users'] = $user;
        $data['promosis'] = $promosi;
        $data['produks'] = $produk;
        $this->load->view('umkm/promosi', $data);
    } 
    public function promosi1() {
        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to login page
            redirect('auth/login');
            return; // Add this line to prevent further execution
        }
    
        // Get username from session
        $username = $this->session->userdata('username');
        
        // Retrieve user data based on username
        $user_data = $this->User_model->get_user_by_username($username);
        
        // Retrieve umkms data
        $promosi = $this->Promosi_model->get_all_promosi();
        $produk = $this->Produk_model->get_all_produk();
        $users = $this->User_model->get_all_users();
        
        // Pass user data and umkms data to the menunggu view
        $data['user'] = $user_data;
        $data['users'] = $users;
        $data['promosis'] = $promosi;
        $data['produks'] = $produk;
        $this->load->view('umkm/promosi1', $data);
    } 
    public function all() {
        // Retrieve umkms data
        $umkm = $this->User_model->get_users();
        $produk = $this->Produk_model->get_all_produk();
        
        // Pass user data and umkms data to the menunggu view
        $data['umkms'] = $umkm;
        $data['produks'] = $produk;
        $this->load->view('all', $data);
    } 

    public function detail($id) {
        // Retrieve product data by ID
        $produk = $this->Produk_model->get_produk_by_id($id);
        
        // Ensure product data is retrieved
        if ($produk) {
            // Get username of the product owner
            $username = $produk->username; // Adjust this according to your database structure
    
            // Retrieve UMKM data based on the owner's username
            $umkm = $this->User_model->getUserNameByUsername($username);
            $produk1 = $this->Produk_model->get_all_produk();
            $platform = $this->Platform_model->get_platform_by_id($id);
    
            // Pass product data, UMKM data, and platform data to the detail view
            $data['produks'] = $produk;
            $data['umkms'] = $umkm;
            $data['produks1'] = $produk1;
            $data['platforms'] = $platform;
    
            // Include the photo variable from UMKM data in the data passed to the view
            $data['photo'] = $umkm->photo; // Assuming 'photo' is the field name in your Umkm_model
            
            $this->load->view('detail', $data);
        } else {
            // Handle error if product data is not found
            // For example, redirect to a 404 page
            show_404();
        }
    }
    public function pumkm($username) {
        // Retrieve UMKM data by username
        $umkm = $this->Umkm_model->getUmkmNameByUsername($username);
        
        // Ensure UMKM data is retrieved
        if ($umkm) {
            // Retrieve products by username
            $produk = $this->Produk_model->get_produk_by_username($username);
            $produk1 = $this->Produk_model->get_all_produk();
            $data['produks1'] = $produk1;
            
            // Pass UMKM and product data to the view
            $data['umkms'] = $umkm;
            $data['produks'] = $produk;

          
            
            // Load the view and pass the data to it
            $this->load->view('pumkm', $data);
        } else {
            // Handle error if UMKM data is not found
            show_404();
        }
    }
    
    
    
    public function dashboard() {
        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to login page
            redirect('auth/login');
            return; // Add this line to prevent further execution
        }
    
        // Get username from session
        $username = $this->session->userdata('username');
    
        // Retrieve user data based on username
        $user_data = $this->User_model->get_user_by_username($username);
        $data['title'] = 'Pie Chart Kecamatan';
        $data['kecamatan_counts'] = $this->User_model->get_kecamatan_counts();
        $data['title'] = 'Pie Chart Kategori Produk';
        $data['kategori_counts'] = $this->Produk_model->get_kategori_counts();
        $data['title'] = 'Bar Chart Desa/Kelurahan';
        $data['desa_counts'] = $this->User_model->get_desa_counts();
        // Pass user data to the dashboard view
        $data['user'] = $user_data;
        $this->load->view('umkm/dashboard', $data);
    }
    public function kategori1() {
        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to login page
            redirect('auth/login');
            return; // Add this line to prevent further execution
        }
    
        // Get username from session
        $username = $this->session->userdata('username');
        
        // Retrieve user data based on username
        $user_data = $this->User_model->get_user_by_username($username);
        
        // Retrieve umkms data
        $umkm = $this->Umkm_model->get_umkms();
        
        // Retrieve categories data (assuming you have a method named get_categories() in your model)
        $category = $this->Category_model->get_all_categories();
        
        // Pass user data, umkms data, and categories data to the kategori1 view
        $data['user'] = $user_data;
        $data['umkms'] = $umkm;
        $data['categories'] = $category;
        $this->load->view('umkm/kategori1', $data);
    }
    
    public function produk() {
        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to login page
            redirect('auth/login');
            return; // Add this line to prevent further execution
        }
    
        // Get username from session
        $username = $this->session->userdata('username');
        
        // Retrieve user data based on username
        $user_data = $this->User_model->get_user_by_username($username);
        
        // Retrieve umkms data
        $user = $this->User_model->get_users();
        $produk = $this->Produk_model->get_all_produk();
        
        // Pass user data and umkms data to the menunggu view
        $data['user'] = $user_data;
        $data['usernames'] = $username;
        $data['users'] = $user;
        $data['produks'] = $produk;
        $this->load->view('umkm/produk', $data);
    } 
    public function produk1_menunggu() {
        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to login page
            redirect('auth/login');
            return; // Add this line to prevent further execution
        }
    
        // Get username from session
        $username = $this->session->userdata('username');
        
        // Retrieve user data based on username
        $user_data = $this->User_model->get_user_by_username($username);
        
        // Retrieve umkms data
        $produk = $this->Produk_model->get_all_produk();
        $users = $this->User_model->get_all_users();
        
        // Pass user data and umkms data to the menunggu view
        $data['user'] = $user_data;
        $data['users'] = $users;
        $data['produks'] = $produk;
        $this->load->view('umkm/produk1_menunggu', $data);
    } 
    public function produk1_disetujui() {
        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to login page
            redirect('auth/login');
            return; // Add this line to prevent further execution
        }
    
        // Get username from session
        $username = $this->session->userdata('username');
        
        // Retrieve user data based on username
        $user_data = $this->User_model->get_user_by_username($username);
        
        // Retrieve umkms data
        $produk = $this->Produk_model->get_all_produk();
        $users = $this->User_model->get_all_users();
        
        // Pass user data and umkms data to the menunggu view
        $data['user'] = $user_data;
        $data['users'] = $users;
        $data['produks'] = $produk;
        $this->load->view('umkm/produk1_disetujui', $data);
    } 
    public function platform() {
        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to login page
            redirect('auth/login');
            return; // Add this line to prevent further execution
        }
    
        // Get username from session
        $username = $this->session->userdata('username');
        
        // Retrieve user data based on username
        $user_data = $this->User_model->get_user_by_username($username);
        
        // Retrieve umkms data
        $platform = $this->Platform_model->get_all_platforms();
        $produk = $this->Produk_model->get_all_produk();
        $users = $this->User_model->get_all_users();
        $user = $this->User_model->get_users();
        
        // Pass user data and umkms data to the menunggu view
        $data['user'] = $user_data;
        $data['platforms'] = $platform;
        $data['users'] = $this->User_model->get_users();
        $data['produks'] = $produk;
        $this->load->view('umkm/platform', $data);
    } 
    
    public function platform1() {
        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to login page
            redirect('auth/login');
            return; // Add this line to prevent further execution
        }
    
        // Get username from session
        $username = $this->session->userdata('username');
        
        // Retrieve user data based on username
        $user_data = $this->User_model->get_user_by_username($username);
        
        // Retrieve umkms data
        $platform = $this->Platform_model->get_all_platforms();
        $produk = $this->Produk_model->get_all_produk();
        $users = $this->User_model->get_all_users();
        
        // Pass user data and umkms data to the menunggu view
        $data['user'] = $user_data;
        $data['platforms'] = $platform;
        $data['users'] = $users;
        $data['produks'] = $produk;
        $this->load->view('umkm/platform1', $data);
    } 
    
    public function logout() {
        // Hapus semua data sesi
        $this->session->sess_destroy();
    
        // Redirect ke halaman login
        redirect('auth/login');
    }
    
    

    public function pengguna() {
        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to login page
            redirect('auth/login');
            return; // Add this line to prevent further execution
        }
    
        // Retrieve the username from the session
        $username = $this->session->userdata('username');
        
        // Retrieve user data based on the username
        $user_data = $this->User_model->get_user_by_username($username);
        
        // Retrieve all user data
        $all_users = $this->User_model->get_all_users();
        
        // Pass user data and all users data to the pengguna view
        $data['user'] = $user_data;
        $data['users'] = $all_users;
        $this->load->view('umkm/pengguna', $data);
    }
    

    public function profil() {
        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to login page
            redirect('auth/login');
            return; // Add this line to prevent further execution
        }
    
        // Retrieve the username from the session
        $username = $this->session->userdata('username');
        
        // Retrieve user data based on the username
        $user_data = $this->User_model->get_user_by_username($username);
        
        // Retrieve all user data
        $all_users = $this->User_model->get_all_users();
        
        // Pass user data and all users data to the profil view
        $data['user'] = $user_data;
        $data['users'] = $all_users;
        $this->load->view('umkm/profil', $data);
    }
    
    
    public function menunggu() {
        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to login page
            redirect('auth/login');
            return; // Add this line to prevent further execution
        }
    
        // Get username from session
        $username = $this->session->userdata('username');
        
        // Retrieve user data based on username
        $user_data = $this->User_model->get_user_by_username($username);
        
        // Retrieve umkms data
        $umkm = $this->Umkm_model->get_umkms();
        
        // Pass user data and umkms data to the menunggu view
        $data['user'] = $user_data;
        $data['umkms'] = $umkm;
        $this->load->view('umkm/menunggu', $data);
    }
    public function pemilik_umkm() {
        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to login page
            redirect('auth/login');
            return; // Add this line to prevent further execution
        }
    
        // Get username from session
        $username = $this->session->userdata('username');
        
        // Retrieve user data based on username
        $user_data = $this->User_model->get_user_by_username($username);
        
        // Retrieve umkms data
        $users = $this->User_model->get_all_users();
        
        // Pass user data and umkms data to the menunggu view
        $data['users'] = $users;
        
        // Pass user data and umkms data to the menunggu view
        $data['user'] = $user_data;
        $this->load->view('umkm/pemilik_umkm', $data);
    }
    public function dataumkm() {
        // Check if user is logged in
        if (!$this->session->userdata('username')) {
            // If not logged in, redirect to login page
            redirect('auth/login');
            return; // Add this line to prevent further execution
        }
    
        // Get username from session
        $username = $this->session->userdata('username');
        
        // Retrieve user data based on username
        $user_data = $this->User_model->get_user_by_username($username);
        
        // Retrieve umkms data
        $umkm = $this->Umkm_model->get_umkms();
        
        // Pass user data and umkms data to the menunggu view
        $data['user'] = $user_data;
        $data['umkms'] = $umkm;
        $this->load->view('umkm/data_umkm', $data);
    } 
    }
    
    
    
    
