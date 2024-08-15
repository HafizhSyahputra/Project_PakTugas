<?php
Class pesawat_model extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->load->database();
    }

    public function get_pesawat(){
        $query = $this->db->get('pesawat');
        return $query->result();
    }

    public function create_pesawat($data){
        $this->db->insert('pesawat', $data); 
        return $this->db->insert_id();
    }
    

    public function get_pesawat_by_id($id) {
        $this->db->where('id_pesawat', $id);
        return $this->db->get('pesawat')->row();
        }

    public function update_pesawat($id, $data) {
        $this->db->where('id_pesawat', $id);
        $this->db->update('pesawat', $data);
    }

    public function delete_pesawat($id) {
        // Hapus pengguna berdasarkan ID
        $this->db->where('id_pesawat', $id);
        $this->db->delete('pesawat'); // Ganti 'pesawats' dengan nama tabel pengguna Anda
    
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