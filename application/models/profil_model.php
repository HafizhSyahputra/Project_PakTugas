<?php
Class profil_model extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->load->database();
    }

    public function get_users(){
        $query = $this->db->get('users');
        return $query->result();
    }

    public function create_user($data){
        $this->db->insert('users', $data); // users adalah nama table di database jadi sesuaikan 
        return $this->db->insert_id();
    }
    

    public function get_user_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('users')->row();
        }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function get_user_by_username($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('users')->row();
    }

    public function delete_user($id) {
        // Hapus pengguna berdasarkan ID
        $this->db->where('id', $id);
        $this->db->delete('users'); // Ganti 'users' dengan nama tabel pengguna Anda
    
        // Log the executed SQL query for debugging purposes
        log_message('debug', 'SQL Query: ' . $this->db->last_query());
    
        // Periksa apakah pengguna berhasil dihapus
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            // Log errors if deletion fails
            log_message('error', 'Deletion failed for ID: ' . $id);
            return false;
        }
    }
    

}

?>