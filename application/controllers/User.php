<?php
class User extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('News_model');
      $this->load->model('Categore_model');
      $this->load->model('User_model');
      $this->load->helper('url_helper');
      $this->load->library('session');
      $this->session;
     
   }

   public function singn_in()
   {

      $data['Categore'] = $this->Categore_model->get_categore();
      $this->load->helper('form');
      $this->load->library('form_validation');

      $data['title'] = 'singn_in';
      $this->form_validation->set_rules('email', 'email', 'required');
      $this->form_validation->set_rules('password', 'password', 'required');

      if ($this->form_validation->run() === FALSE) {
         $this->load->view('templates/header', $data);
         $this->load->view('user/singn_in');
         $this->load->view('templates/footer');
      } else {
         $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
         );
         
         if ($this->User_model->singn_in($data)) {
            $user=$this->User_model->find_user_email($this->input->post('email'));
            $_SESSION["email"] = $this->input->post('email');
            $_SESSION["id"]=$user["id_user"];
            $_SESSION["admin"]=$user["admin"];
            redirect('News/index');
         } else {
            redirect('User/singn_in');
         }
      }
   }

   public function singn_up()
   {

      $data['Categore'] = $this->Categore_model->get_categore();
      $this->load->helper('form');
      $this->load->library('form_validation');

      $data['title'] = 'singn_up';
      $this->form_validation->set_rules('firstname', 'firstname', 'required');
      $this->form_validation->set_rules('lastname', 'lastname', 'required');
      $this->form_validation->set_rules('dateofbirth', 'dateofbirth', 'required');
      $this->form_validation->set_rules('email', 'email', 'required');
      $this->form_validation->set_rules('password', 'password', 'required');
      $this->form_validation->set_rules('phone', 'phone', 'required');
      $this->form_validation->set_rules('address', 'adress', 'required');

      
      if ($this->form_validation->run() === FALSE) {

         $this->load->view('templates/header', $data);
         $this->load->view('user/singn_up',$data);
         $this->load->view('templates/footer');
      } else {
         $this->User_model->newsUA();
         $this->load->view('news/success');
      }
   }
   public function loge_out(){
      $_SESSION["email"]=null;
      $_SESSION["id"]=null;
      $_SESSION["admin"]=null;
      redirect('News/index');
   }
}
