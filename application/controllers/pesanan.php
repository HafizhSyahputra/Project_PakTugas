<?php
class pesanan extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('pesanan_model');
    }

    public function index(){
		$data['pesanan'] = $this->pesanan_model->get_pesanan();
        $this->load->view('dashboard/index', $data);
    }

    public function buat(){
      $data['pesanan'] = $this->pesanan_model->get_pesanan();
          $this->load->view('data/create_pesanan', $data);
      }
    public function edit_pesanan($id) {
        $data['hasil'] = $this->pesanan_model->get_pesanan_by_id($id);
        $this->load->view('data/edit_pesanan', $data);
    }           
    
    public function create_pesanan() {
        if ($this->input->post()) {
            $hargaKursi = $this->input->post('harga_kursi');
            $jumlahKursi = $this->input->post('jumlah_kursi');
    
            // Menghitung total harga
            $totalHarga = $hargaKursi * $jumlahKursi;
    
            // Menyiapkan data untuk disimpan ke dalam database
            $data = array(
                'id' => $this->input->post('id'),
                'id_rute' => $this->input->post('id_rute'),
                'id_pesawat' => $this->input->post('id_pesawat'),
                'tanggal' => $this->input->post('tanggal'),
                'jumlah_kursi' => $jumlahKursi,
                'harga_kursi' => $hargaKursi,
                'total_harga' => $totalHarga // Simpan total harga ke dalam database
            );
    
            // Panggil model untuk menyimpan data ke dalam database
            $user_id = $this->pesanan_model->create_pesanan($data);
    
            if ($user_id) {
                $this->trigger_events('Data pesanan berhasil ditambahkan.'); 
                redirect('pesanan');
            } else {
                echo "Gagal membuat user.";
            }
        }
        $data['pesanan'] = $this->pesanan_model->get_pesanan();
        $this->load->view('dashboard/index', $data);
    }
    public function update_pesanan($id) {
        if ($this->input->post()) {

            $hargaKursi = $this->input->post('harga_kursi');
            $jumlahKursi = $this->input->post('jumlah_kursi');
    
            // Menghitung total harga
            $totalHarga = $hargaKursi * $jumlahKursi;

            $data = array(
                'id' => $this->input->post('id'),
                'id_rute' => $this->input->post('id_rute'),
                'id_pesawat' => $this->input->post('id_pesawat'),
                'tanggal' => $this->input->post('tanggal'),
                'jumlah_kursi' => $jumlahKursi,
                'harga_kursi' => $hargaKursi,
                'total_harga' => $totalHarga // Simpan total harga ke dalam database
            );
    
            $this->pesanan_model->update_pesanan($id, $data);
            $updated = $this->pesanan_model->get_pesanan_by_id($id);
            if ($updated) {
                $this->trigger_update('Data pesanan berhasil diupdate'); 
                redirect(base_url('pesanan'));
            } else {
                echo 'Gagal mengedit data pesanan.';
            }
        }
    }
    
    
    // Delet Is
    public function delete_pesanan($id) {
        $result = $this->pesanan_model->delete_pesanan($id);
    
        if ($result) {
            $this->trigger_event('Pesanan berhasil dihapus.'); 
            $data['pesanan'] = $this->pesanan_model->get_pesanan();
            $this->load->view('dashboard/index', $data);
        } else {
            echo 'Gagal menghapus pengguna.';
        }
        
    }

    public function trigger_event(){
        require __DIR__ . '/vendor/autoload.php';
    
      $options = array(
        'cluster' => 'ap1',
        'useTLS' => true
      );
      $pusher = new Pusher\Pusher(
        'bdd8bfa32c939823f0f0',
        'b2713bd6d960bd57cb63',
        '1718253',
        $options
      );
    
      $data['message'] = 'Pesanan berhasil dihapus';
      $pusher->trigger('pesanan-channel', 'pesanan-event', $data);
    }


    public function trigger_events(){
      require __DIR__ . '/vendor/autoload.php';
  
    $options = array(
      'cluster' => 'ap1',
      'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
      'bdd8bfa32c939823f0f0',
      'b2713bd6d960bd57cb63',
      '1718253',
      $options
    );
  
    $data['message'] = 'Data pesanan berhasil ditambahkan.';
    $pusher->trigger('pesanan-channel', 'pesanan-event', $data);
  }

    public function trigger_update(){
        require __DIR__ . '/vendor/autoload.php';
    
      $options = array(
        'cluster' => 'ap1',
        'useTLS' => true
      );
      $pusher = new Pusher\Pusher(
        'bdd8bfa32c939823f0f0',
        'b2713bd6d960bd57cb63',
        '1718253',
        $options
      );
    
      $data['message'] = 'Data pesanan berhasil diupdate.';
      $pusher->trigger('pesanan-channel', 'pesanan-event', $data);
    }
    
}




?>