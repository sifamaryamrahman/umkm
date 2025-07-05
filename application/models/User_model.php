<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function save_user($data) {
        // Insert user data into the database
        $this->db->insert('users', $data);

        // Return the username of the inserted user or FALSE if the insertion failed
        return ($this->db->affected_rows() > 0) ? $data['username'] : FALSE;
    }

    public function get_all_users() {
        // Retrieve all user data from the 'users' table
        $query = $this->db->get('users');
    
        // Return the result as an array of user objects if users exist, otherwise return an empty array
        return ($query->num_rows() > 0) ? $query->result() : array();
    }

    public function get_user_by_username($username) {
        // Retrieve user data based on the provided username
        $query = $this->db->get_where('users', array('username' => $username));

        // Return the user data if found, otherwise return FALSE
        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }

    public function edit_user($username, $data) {
        // Check if a file is uploaded
        if (!empty($_FILES['editPhoto']['name'])) {
            // File is uploaded, include it in the data
            $config['upload_path'] = './uploads/users/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $_FILES['editPhoto']['name']; // Use the uploaded file name
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('editPhoto')) {
                // If upload is successful, add the photo name to the data
                $data['photo'] = $this->upload->data('file_name');
            } else {
                // If failed to upload image, handle the error
                $error = array('error' => $this->upload->display_errors());
                // Display error message if needed
            }
        }
    
        // Update user data in the database based on the provided username
        $this->db->where('username', $username);
        $this->db->update('users', $data);
    
        // Check if the update was successful
        return $this->db->affected_rows() > 0;
    }
    
    public function get_user_fullname_by_username($username) {
        // Retrieve user data based on the provided username
        $query = $this->db->get_where('users', array('username' => $username));
    
        // Return fullname if user is found, otherwise return FALSE
        return ($query->num_rows() > 0) ? $query->row()->fullname : FALSE;
    }
    
    public function delete_user($username) {
        // Perform deletion operation in the database based on username
        $this->db->where('username', $username);
        $this->db->delete('users');
    
        // Check if the deletion operation was successful
        return $this->db->affected_rows() > 0;
    }
    public function get_users_by_type($userType) {
        // Retrieve user data based on the provided user type
        $query = $this->db->get_where('users', array('usertype' => $userType));
    
        // Return the result as an array of user objects if users exist, otherwise return an empty array
        return ($query->num_rows() > 0) ? $query->result() : array();
    }
    public function get_user_status($username) {
        $this->db->select('status');
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return $query->row()->status;
        } else {
            return null;
        }
    }
    public function get_admin_users() {
        $query = $this->db->where('usertype', 'Admin')
                          ->get('users'); // Assuming 'users' is the table name
        return $query->result_array();
    }
    public function get_umkm_name_by_username($username) {
        // Assuming 'umkm_name' is in the 'umkm' table and 'username' is a foreign key linking to 'umkm'
        $this->db->select('umkm.username');
        $this->db->from('users');
        $this->db->join('umkm', 'users.username = umkm.username');
        $this->db->where('users.username', $username);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->username;
        } else {
            return false; // Return false if user not found or has no associated UMKM name
        }
    }
    public function get_users() {
        // Query to retrieve UMKMs data
        $query = $this->db->get('users');

        // Check if query successful
        if ($query && $query->num_rows() > 0) {
            // Return UMKMs data
            return $query->result();
        } else {
            // Handle error (e.g., return empty array or show error message)
            return array();
        }
    }
    public function get_platform_by_username($username) {
        // Assuming 'umkm_name' is in the 'umkm' table and 'username' is a foreign key linking to 'umkm'
        $this->db->select('platform.username');
        $this->db->from('users');
        $this->db->join('platform', 'users.username = platform.username');
        $this->db->where('users.username', $username);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->username;
        } else {
            return false; // Return false if user not found or has no associated UMKM name
        }
    }
    public function count_all_users()
{
    return $this->db->count_all('users');
}
public function fetch_users($limit, $start) {
    $this->db->limit($limit, $start);
    $query = $this->db->get("users");

    return $query->result();
}

public function record_count() {
    return $this->db->count_all("users");
}
public function get_kecamatan_counts() {
    // Query untuk mengambil jumlah kecamatan dari tabel
    $this->db->select('kecamatan, COUNT(*) as count');
    $this->db->from('users'); // Ganti nama_tabel_anda dengan nama tabel Anda
    $this->db->group_by('kecamatan');
    
    $query = $this->db->get();
    return $query->result();
}
public function getUserNameByUsername($username)
{
    $this->db->select('users.fullname, users.photo, users.username, users.jalan, users.desa_kelurahan, users.kecamatan, users.nomor_hp, users.email');
    $this->db->from('users');
    $this->db->where('users.username', $username);
    $query = $this->db->get();
    return $query->row(); // Mengembalikan satu baris hasil
}


// Di dalam User_model.php
public function get_all_owners() {
    $this->db->where('usertype', 'Owner');
    $query = $this->db->get('users'); // ganti 'users' dengan nama tabel yang sesuai
    return $query->result();
}


public function get_desa_counts() {
    // Query untuk mengambil jumlah pemilik per desa/kelurahan
    $this->db->select('desa_kelurahan, COUNT(*) as count');
    $this->db->from('users'); // Ganti nama_tabel_anda dengan nama tabel Anda
    $this->db->group_by('desa_kelurahan');
    
    $query = $this->db->get();
    return $query->result();
}
}
?>
