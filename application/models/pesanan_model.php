<?php
Class pesanan_model extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->load->database();
    }

    public function get_pesanan(){
        $query = $this->db->get('pesanan');
        return $query->result();
    }

    public function create_pesanan($data){
        $this->db->insert('pesanan', $data); 
        return $this->db->insert_id();
    }
    

    public function get_pesanan_by_id($id) {
        $this->db->where('pesanan_id', $id);
        return $this->db->get('pesanan')->row();
        }

    public function update_pesanan($id, $data) {
        $this->db->where('pesanan_id', $id);
        $this->db->update('pesanan', $data);
    }

    public function delete_pesanan($id) {
        // Hapus pengguna berdasarkan ID
        $this->db->where('pesanan_id', $id);
        $this->db->delete('pesanan'); // Ganti 'pesanans' dengan nama tabel pengguna Anda
    
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