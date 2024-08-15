<?php
Class rute_model extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->load->database();
    }

    public function get_rute(){
        $query = $this->db->get('rute');
        return $query->result();
    }

    public function create_rute($data){
        $this->db->insert('rute', $data); 
        return $this->db->insert_id();
    }
    

    public function get_rute_by_id($id) {
        $this->db->where('id_rute', $id);
        return $this->db->get('rute')->row();
        }

    public function update_rute($id, $data) {
        $this->db->where('id_rute', $id);
        $this->db->update('rute', $data);
    }

    public function delete_rute($id) {
        // Hapus pengguna berdasarkan ID
        $this->db->where('id_rute', $id);
        $this->db->delete('rute'); // Ganti 'rutes' dengan nama tabel pengguna Anda
    
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