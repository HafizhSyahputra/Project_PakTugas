<?php
class rute extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('rute_model');
    }

    public function index(){
		$data['rute'] = $this->rute_model->get_rute();
        $this->load->view('data/rute_view', $data);
    }

    public function buat(){
      $data['rute'] = $this->rute_model->get_rute();
          $this->load->view('data/create_rute', $data);
      }
    public function edit_rute($id) {
        $data['hasil'] = $this->rute_model->get_rute_by_id($id);
        $this->load->view('data/edit_rute', $data);
    }           
    
    public function create_rute(){
      if($this->input->post()){
          $data = array(
              'asal' => $this->input->post('asal'),
              'tujuan' => $this->input->post('tujuan'),
              'jarak' => $this->input->post('jarak'),
              'id_pesawat' => $this->input->post('id_pesawat'),
          );
  
          $user_id = $this->rute_model->create_rute($data);
  
          if($user_id){
              $this->trigger_events('Data rute berhasil ditambahkan.'); 
              redirect('rute');
          } else {
              echo "Gagal membuat user.";
          }
      }
      $data['rute'] = $this->rute_model->get_rute();
      $this->load->view('rute', $data);
  }
    
    public function update_rute($id) {
        if ($this->input->post()) {
            $data = array(  
                'asal' => $this->input->post('asal'),
                'tujuan' => $this->input->post('tujuan'),
                'jarak' => $this->input->post('jarak'),
                'id_pesawat' => $this->input->post('id_pesawat'),
            );  
    
            $this->rute_model->update_rute($id, $data);
            $updated = $this->rute_model->get_rute_by_id($id);
            if ($updated) {
                $this->trigger_update('Data Rute berhasil diedit.'); // Memicu notifikasi Pusher
                redirect(base_url('rute'));
            } else {
                echo 'Gagal mengedit data pengguna.';
            }        }
    }
    
    
    
    // Delet Is
    public function delete_rute($id) {
        $result = $this->rute_model->delete_rute($id);
    
        if ($result) {
            $this->trigger_event('User berhasil dihapus.'); 
            $data['rute'] = $this->rute_model->get_rute();
            $this->load->view('data/rute_view', $data);
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
    
      $data['message'] = 'User berhasil dihapus';
      $pusher->trigger('rute-channel', 'rute-event', $data);
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
  
    $data['message'] = 'Data rute berhasil ditambahkan.';
    $pusher->trigger('rute-channel', 'rute-event', $data);
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
    
      $data['message'] = 'Data rute berhasil diedit.';
      $pusher->trigger('rute-channel', 'rute-event', $data);
    }
    
}




?>