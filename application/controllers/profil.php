    <?php
    class profil extends CI_Controller {
        
        public function __construct(){
            parent::__construct();
            $this->load->model('profil_model');
        }

        public function index(){
        $data['users'] = $this->profil_model->get_users();
            $this->load->view('data/profil_view', $data);
        }

        public function edit_user($id) {
            $data['hasil'] = $this->profil_model->get_user_by_id($id);
            $this->load->view('data/edit_profil', $data);
        }           
        
        
        public function update_user($id) {
            if ($this->input->post()) {
                $data = array(  
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'phone' => $this->input->post('phone')
                );  
        
                $this->profil_model->update_user($id, $data);
                $updated = $this->profil_model->get_user_by_id($id);
                if ($updated) {
                    $this->trigger_update('Data pengguna berhasil diedit.'); // Memicu notifikasi Pusher
                    redirect(base_url('profil'));
                } else {
                    echo 'Gagal mengedit data pengguna.';
                }        }
        }
        
        
        
        // Delet Is
        public function delete_user($id) {
            $result = $this->profil_model->delete_user($id);
        
            if ($result) {
                $this->trigger_event('User berhasil dihapus.'); 
                $data['users'] = $this->profil_model->get_users();
                $this->load->view('data/profil_view', $data);
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
          $pusher->trigger('my-channel', 'my-event', $data);
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
        
          $data['message'] = 'Data pengguna berhasil diedit.';
          $pusher->trigger('my-channel', 'my-event', $data);
        }
        
    }




    ?>