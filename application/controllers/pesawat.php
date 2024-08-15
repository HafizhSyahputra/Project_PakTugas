<?php
class pesawat extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('pesawat_model');
    }

    public function index(){
		$data['pesawat'] = $this->pesawat_model->get_pesawat();
        $this->load->view('data/pesawat_view', $data);
    }

    public function buat(){
      $data['pesawat'] = $this->pesawat_model->get_pesawat();
          $this->load->view('data/create_pesawat', $data);
      }
    public function edit_pesawat($id) {
        $data['hasil'] = $this->pesawat_model->get_pesawat_by_id($id);
        $this->load->view('data/edit_pesawat', $data);
    }           
    
    public function create_pesawat(){
      if($this->input->post()){
          $data = array(
              'name' => $this->input->post('username'),
              'type' => $this->input->post('tipe'),
              'capacity' => $this->input->post('kapasitas'),
          );
  
          $user_id = $this->pesawat_model->create_pesawat($data);
  
          if($user_id){
              $this->trigger_events('Data Pesawat berhasil ditambahkan.'); 
              redirect('pesawat');
          } else {
              echo "Gagal membuat user.";
          }
      }
      $data['pesawat'] = $this->pesawat_model->get_pesawat();
      $this->load->view('pesawat', $data);
  }
    
    public function update_pesawat($id) {
        if ($this->input->post()) {
            $data = array(  
                'name' => $this->input->post('username'),
                'type' => $this->input->post('tipe'),
                'capacity' => $this->input->post('kapasitas'),
            );  
    
            $this->pesawat_model->update_pesawat($id, $data);
            $updated = $this->pesawat_model->get_pesawat_by_id($id);
            if ($updated) {
                $this->trigger_update('Data Pesawat berhasil diedit.'); // Memicu notifikasi Pusher
                redirect(base_url('pesawat'));
            } else {
                echo 'Gagal mengedit data pengguna.';
            }        }
    }
    
    
    
    // Delet Is
    public function delete_pesawat($id) {
        $result = $this->pesawat_model->delete_pesawat($id);
    
        if ($result) {
            $this->trigger_event('Data berhasil dihapus.'); 
            $data['pesawat'] = $this->pesawat_model->get_pesawat();
            $this->load->view('data/pesawat_view', $data);
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
    
      $data['message'] = 'Data berhasil dihapus';
      $pusher->trigger('pesawat-channel', 'pesawat-event', $data);
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
  
    $data['message'] = 'Data Pesawat berhasil ditambahkan.';
    $pusher->trigger('pesawat-channel', 'pesawat-event', $data);
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
    
      $data['message'] = 'Data Pesawat berhasil diedit.';
      $pusher->trigger('pesawat-channel', 'pesawat-event', $data);
    }
    
}




?>