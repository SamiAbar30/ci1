 <?php
   class News extends CI_Controller
   {

      public function __construct()
      {
         parent::__construct();
         $this->load->model('News_model');
         $this->load->model('Categore_model');
         $this->load->model('Categore_news_model');
         $this->load->model('News_model');
         $this->load->model('Favoret');
         $this->load->helper('url_helper');
         $this->load->library('session');
         $this->load->helper(array('form', 'url'));
         $this->session;
      }

      public  function index($start = 0)
      {if(isset($_SESSION['id'])){
         $data['newsNAV_id'] = $this->Favoret->get_FAV_NEW_BY_USER($_SESSION['id']);
         $data['newsNAV'] = $this->Favoret->get_news_FAV($_SESSION['id']);
      }
      else
      {
         $data['newsNAV_id']=array();
         $data['newsNAV']=array(); 
      }
         $data['news_count'] = $this->News_model->get_count();
         $data['news'] = $this->News_model->get_news_index($start);
         $data['title'] = 'News archive';
         $data['Categore'] = $this->Categore_model->get_categore();
         $this->load->view('templates/header', $data);
         $this->load->view('news/index', $data);
         $this->load->view('templates/footer');
      }
      public  function view_categore($slug = null)
      {
         $data['newsNAV_id'] = $this->Favoret->get_FAV_NEW_BY_USER($_SESSION['id']);
         $data['newsNAV'] = $this->Favoret->get_news_FAV($_SESSION['id']);
         $data['news_count'] = $this->News_model->get_count();
         $data['news'] = $this->News_model->get_news_categore($slug);
         $data['title'] = 'News archive';
         $data['Categore'] = $this->Categore_model->get_categore();
         $this->load->view('templates/header', $data);
         $this->load->view('news/index', $data);
         $this->load->view('templates/footer');
      }
      public function view($slug = null)
      {
         $data['news_item'] = $this->News_model->get_news_id($slug);
         $data['news_all'] = $this->News_model->get_news_by_user($data['news_item']['id_user']);
         $data['user'] = $this->User_model->get_user($data['news_item']['id_user']);
         if (empty($data['news_item'])) {
            show_404();
         }
         $data['title'] = $data['news_item']['title'];
         $data['Categore'] = $this->Categore_model->get_categore();
         $this->load->view('templates/header', $data);
         $this->load->view('news/view', $data);
         $this->load->view('templates/footer');
      }

      public function create()
      {
         $data['Categore'] = $this->Categore_model->get_categore();
         $this->load->helper('form');
         $this->load->library('form_validation');
         $data['title'] = 'create a news item';
         $this->form_validation->set_rules('title', 'Title', 'required');
         $this->form_validation->set_rules('text', 'Text', 'required');
         $this->form_validation->set_rules('category[]', 'Category', 'required');
         $config['upload_path'] = './uploads/';
         $config['allowed_types'] = 'gif|jpg|png';
         $config['max_size'] = 100;
         $config['max_width'] = 1024;
         $config['max_height'] = 768;
         $this->load->library('upload', $config);
         if (!$this->upload->do_upload('userfile')) {
            if ($this->form_validation->run() === FALSE) {
               $this->load->view('templates/header', $data);
               $this->load->view('news/create', $data);
               $this->load->view('templates/footer');
            }
         }
         else {
            $data = array('upload_data' => $this->upload->data());
            $user_id = $this->News_model->newsUA($data['upload_data']['file_name']);
            $checkbox = $_POST['check'];
            for ($i = 0; $i < count($checkbox); $i++) {
               $category_id = $checkbox[$i];
               $this->Categore_news_model->multisave($user_id, $category_id);
            }
            echo "Data added successfully!";
            redirect('News/index');
         }
      }

      public function MYnews()
      {
         $data['news'] = $this->News_model->get_news_by_id($_SESSION['id']);
         $data['title'] = 'MYnews';
         $data['Categore'] = $this->Categore_model->get_categore();
         $this->load->view('templates/header', $data);
         $this->load->view('news/MYnews', $data);
         $this->load->view('templates/footer'); 
      }
      public function ADDFAV($id_new = null)
      {
         $this->Favoret->ADD_FAV($id_new, $_SESSION['id']);
         redirect('News/index');
      }
      public function REMOVEFAV($id_new = null)
      {
         $this->Favoret->REMOVE_FAV($id_new, $_SESSION['id']);
         redirect('News/index');
      }
      public function editnews($id)
      {
         $data['Categore'] = $this->Categore_model->get_categore();
         $data['news'] = $this->News_model->get_news_by_user($id);

         $this->load->helper('form');
         $this->load->library('form_validation');

         $data['title'] = 'update a news item';
         $this->form_validation->set_rules('title', 'Title', 'required');
         $this->form_validation->set_rules('text', 'Text', 'required');
         $this->form_validation->set_rules('id_user', 'id_user', 'required');
         if ($this->form_validation->run() === FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('news/create', $data);
            $this->load->view('templates/footer');
         } else {
            $this->News_model->newsUA($id);
            $this->load->view('news/success');
            redirect('News/index');
         }
      }


   public function deletnews($id)
   {
   $this->News_model->delete_item($id);
   redirect("News/index");
   }
   }


   ?>
