    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Promosi_model extends CI_Model {

        public function insert_promosi($data) {
            $this->db->insert('promosi_pemasaran', $data);
            return ($this->db->affected_rows() > 0) ? true : false;
        }


        public function update_promosi($id, $data) {
            $this->db->where('id', $id);
            $this->db->update('promosi_pemasaran', $data);
            return ($this->db->affected_rows() > 0) ? true : false;
        }
    
        public function delete_promosi($id) {
            $this->db->where('id', $id);
            return $this->db->delete('promosi_pemasaran');
        }
    
        public function get_all_promosi() {
            $query = $this->db->get('promosi_pemasaran');
            return $query->result();
        }
    
        public function get_promosi_by_id($id) {
            $query = $this->db->get_where('promosi_pemasaran', array('id' => $id));
            return $query->row();
        }

        public function get_promosi_by_username($username) {
            // Assuming you have a 'products' table in your database
            // Replace 'products' with your actual table name if different
            $this->db->where('username', $username);
            return $this->db->get('promosi_pemasaran')->result();
        }
        
    }
