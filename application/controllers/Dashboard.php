<?php 
class Dashboard extends CI_Controller
{
  public function __construct()
  {
     parent::__construct();
     $this->load->model('News_model');
     $this->load->model('User_model');
     $this->load->model('Categore_model');
     $this->load->helper('url_helper');
     $this->load->library('session');
     $this->session;
  }

 public function Home($page = "News")
 {
   if($_SESSION["admin"]!=1){
      redirect("News/index");
     }
    redirect("Dashboard/".$page);
 }
 public function Categores($id = null)
 {
   if($_SESSION["admin"]!=1){
      redirect("News/index");
     }
  $data["page"]="Categores";
  $data['categores'] = $this->Categore_model->get_categore();
  $this->load->view("view_dashboard/dashboardhead",$data);
  $this->load->view('view_dashboard/Categores', $data);
  $this->load->view("view_dashboard/dashboardend");
  }
 public function Users($id = null)
 { if($_SESSION["admin"]!=1){
   redirect("News/index");
  }
    
   $data["page"]="Users";
    $data['users'] = $this->User_model->get_user();
    $this->load->view("view_dashboard/dashboardhead",$data);
    $this->load->view('view_dashboard/Users', $data);
    $this->load->view("view_dashboard/dashboardend");
 }

 public function News($id = null)
 {  if($_SESSION["admin"]!=1){
   redirect("News/index");
  }
    
   
   $data["page"]="News";
    $data['news'] = $this->News_model->get_news_by_user($id);
    $this->load->view("view_dashboard/dashboardhead",$data);
    $this->load->view('view_dashboard/News', $data);
    $this->load->view("view_dashboard/dashboardend");
 }
 public function addnews()
 {
   if($_SESSION["admin"]!=1){
      redirect("News/index");
     }
  $data['Categore'] = $this->Categore_model->get_categore();
  $this->load->helper('form');
  $this->load->library('form_validation');


  $data['title'] = 'create a news item';
  $this->form_validation->set_rules('title', 'Title', 'required');
  $this->form_validation->set_rules('text', 'Text', 'required');
  $this->form_validation->set_rules('id_user', 'id_user', 'required');
  if ($this->form_validation->run() === FALSE) {
    
     $this->load->view("view_dashboard/dashboardhead",$data);
     $this->load->view('news/create', $data);
     $this->load->view("view_dashboard/dashboardend");
  } else {
     $this->News_model->newsUA();
     $this->load->view('news/success');
     redirect("Dashboard/Home");
  }

 }
 public function categoreadd(){
   if($_SESSION["admin"]!=1){
      redirect("News/index");
     }
   $data['Categore'] = $this->Categore_model->get_categore();
   $this->load->helper('form');
   $this->load->library('form_validation');
 
   $data['title'] = 'singn_up';
   $this->form_validation->set_rules('name', 'name', 'required');
 
   if ($this->form_validation->run() === FALSE) {
 
     
      $this->load->view("view_dashboard/dashboardhead",$data);
      $this->load->view('news/create', $data);
      $this->load->view("view_dashboard/dashboardend");
   } else {
      $this->User_model->set_categore();
      $this->load->view('news/success');
      redirect("Dashboard/categore");
   }
 }
 
 public function editnews($id)
 {
   if($_SESSION["admin"]!=1){
      redirect("News/index");
     }
   $data['Categore'] = $this->Categore_model->get_categore();
    $data['news'] = $this->News_model->get_news_by_user($id);
    
  $this->load->helper('form');
  $this->load->library('form_validation');

  $data['title'] = 'update a news item';
  $this->form_validation->set_rules('title', 'Title', 'required');
  $this->form_validation->set_rules('text', 'Text', 'required');
  $this->form_validation->set_rules('id_user', 'id_user', 'required');
  if ($this->form_validation->run() === FALSE) { 
    $this->load->view("view_dashboard/dashboardhead",$data);
    $this->load->view('news/create', $data);
    $this->load->view("view_dashboard/dashboardend");
  } else {
     $this->News_model->newsUA($id);
     $this->load->view('news/success');
     redirect("Dashboard/News");
  }

 }
 public function deletnews($id)
 {
   if($_SESSION["admin"]!=1){
      redirect("News/index");
     }
   $this->News_model->delete_item($id);
   redirect("Dashboard/News");
 }

 public function adduser()
 {
   if($_SESSION["admin"]!=1){
      redirect("News/index");
     } 

  $this->load->helper('form');
  $this->load->library('form_validation');
  $data['action']="adduser";
  $data['users']= array(
     "id_user"=>null,
   'firstname' => "",
   'lastname' => "",
   'dateofbirth' => "",
   'email' => "",
   'password' => "",
   'phone' => "",
   'address' => "",
   'admin' => "",
);
  $data['title'] = 'singn_up';
  $this->form_validation->set_rules('firstname', 'firstname', 'required');
  $this->form_validation->set_rules('lastname', 'lastname', 'required');
  $this->form_validation->set_rules('dateofbirth', 'dateofbirth', 'required');
  $this->form_validation->set_rules('email', 'email', 'required');
  $this->form_validation->set_rules('password', 'password', 'required');
  $this->form_validation->set_rules('phone', 'phone', 'required');
  $this->form_validation->set_rules('address', 'adress', 'required');
  $this->form_validation->set_rules('admin', 'admin', 'required');

  if ($this->form_validation->run() === FALSE) {
   $this->load->view("view_dashboard/dashboardhead",$data);
   $this->load->view('view_dashboard/account',$data);
   $this->load->view("view_dashboard/dashboardend");
  } else {
     $this->User_model->newsUA();
     $this->load->view('news/success');
     redirect("Dashboard/User");
  }

 }
 public function edituser($id)
 {
   if($_SESSION["admin"]!=1){
      redirect("News/index");
     }
   $data['users'] = $this->User_model->get_user($id);
  $this->load->helper('form');
  $this->load->library('form_validation');
  $data['action']="edituser/".$id;
  $data['title'] = 'singn_up';
  $this->form_validation->set_rules('firstname', 'firstname', 'required');
  $this->form_validation->set_rules('lastname', 'lastname', 'required');
  $this->form_validation->set_rules('dateofbirth', 'dateofbirth', 'required');
  $this->form_validation->set_rules('email', 'email', 'required');
  $this->form_validation->set_rules('password', 'password', 'required');
  $this->form_validation->set_rules('phone', 'phone', 'required');
  $this->form_validation->set_rules('address', 'adress', 'required');

  if ($this->form_validation->run() === FALSE) {
   
   $this->load->view("view_dashboard/dashboardhead",$data);
   $this->load->view('view_dashboard/account',$data);
   $this->load->view("view_dashboard/dashboardend");
    
  } else {
     $this->User_model->newsUA($id);
     $this->load->view('news/success');
     redirect("Dashboard/Home");
  }

 }
 public function deletuser($id)
 {
    if($_SESSION["admin"]!=1){
   redirect("News/index");
  }
   $this->User_model->delete_user($id);
   redirect("Dashboard/User");
 }

 public function addcategore($id=null)
 {
   if($_SESSION["admin"]!=1){
      redirect("News/index");
     }
   $this->load->helper('form');
   $this->load->library('form_validation');
   $data['action']="addcategore";
   $data['title'] = 'add a categore item';
   $data['id']=$id;
   $this->form_validation->set_rules('name', 'Name', 'required');

   if ($this->form_validation->run() === FALSE) { 
     $this->load->view("view_dashboard/dashboardhead",$data);
     $this->load->view('view_dashboard/categoresUA', $data);
     $this->load->view("view_dashboard/dashboardend");
   } else {
      $this->Categore_model-> set_categore();
      $this->load->view('news/success');
      redirect("Dashboard/Categores");
   }
 }
 public function editcategore($id)
 {
   if($_SESSION["admin"]!=1){
      redirect("News/index");
     }
   $data['categores'] = $this->Categore_model->get_categore();
   $this->load->helper('form');
   $this->load->library('form_validation');
   $data['action']="editcategore";
   $data['title'] = 'edit a categore item';
   $data['id']=$id;
   $this->form_validation->set_rules('name', 'Name', 'required');

   if ($this->form_validation->run() === FALSE) { 
     $this->load->view("view_dashboard/dashboardhead",$data);
     $this->load->view('view_dashboard/categoresUA', $data);
     $this->load->view("view_dashboard/dashboardend");
   } else {
      $this->Categore_model->update_categore($id);
      $this->load->view('news/success');
      redirect("Dashboard/Categores");
   }
 }
 
 public function deletcategore($id)
 {
   if($_SESSION["admin"]!=1){
      redirect("News/index");
     }
   $this->Categore_model->delete_categore($id);
   redirect("Dashboard/Categores");
 }

}
