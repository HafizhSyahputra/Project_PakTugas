<?php
class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('profil_model');
        $this->load->library('session');
    }


    public function login() {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
  
      $user = $this->profil_model->get_user_by_username($username, $password);
      if ($user) {
          // Cek peran pengguna
          if ($username == 'admin') {
              // Jika pengguna adalah admin, redirect ke halaman admin
              $user_data = array(
                  'user_id' => $user->id,
                  'username' => $user->username,
                  'role' => 'admin' // Tambahkan peran admin ke dalam data sesi
              );
              $this->session->set_userdata($user_data);
              redirect('pesanan');
          } else {
              // Jika pengguna adalah pengguna biasa, redirect ke halaman user biasa
              $user_data = array(
                  'user_id' => $user->id,
                  'username' => $user->username,
                  'role' => 'user' 
              );
              $this->session->set_userdata($user_data);
              redirect('pesanan'); // Ubah 'user/pesanan' dengan URL halaman user biasa
          }
      } else {
          $this->trigger_event('Data yang dimasukan tidak valid');
          redirect('register/login');
      }
  }
  

public function create_user(){
    if($this->input->post()){
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'phone' => $this->input->post('phone')
        );

        $user_id = $this->profil_model->create_user($data);

        if($user_id){
            $this->trigger_events('User berhasil ditambahkan.'); 
            redirect('pesanan');
        } else {
            echo "Gagal membuat user.";
        }
    }
    $data['users'] = $this->profil_model->get_users();
    $this->load->view('welcome', $data);
}


public function logout(){
    $this->session->sess_destroy();
    redirect('register/login');
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

  $data['message'] = 'User Berhasil Ditambahkan';
  $pusher->trigger('my-channel', 'my-event', $data);
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

  $data['message'] = 'Data yang dimasukan tidak valid';
  $pusher->trigger('my-channel', 'my-event', $data);
}

}




?>