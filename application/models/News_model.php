<?php
class News_model extends CI_Model
{
    public function __construct()
    {
        $this->load->model('User_model');
        $this->load->database();
    }
    ///////
    public function get_count()
    {
        return $this->db->count_all('news');
    }
    public function get_news_id($id = false)
    {

        $query = $this->db->get_where('news', array('id_new' => $id));
        return $query->row_array();
    }
    public function get_news_index($start = null)
    {if($start==null){
        $start=0;
    }
       
            $query = $this->db->query("SELECT * FROM `news` LIMIT " . $start . ",5;");
            return $query->result_array();
        
    }
    public function get_news_by_id($id = 0)
    {
        if($id==null){
            $id=0;
        }
       $query = $this->db->get_where('news', array('id_user' => $id));
        return $query->result_array();
    }
    public function get_news_by_user($id = 0)
    {
        if (settype($_SESSION["admin"], "integer") == 1) {
            $query = $this->db->get('news');
            return $query->result_array();
        } else {
            $query = $this->db->get_where('news', array('id_user' => $id));
            return $query->result_array();
        }
    }
    public function get_news_categore($id = false)
    {
        $sql  = 'SELECT DISTINCT N.* FROM categore_news CN ,news N,categore C WHERE ' . $id . '=CN.id_cat and CN.id_new = N.id_new';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    ////////////
    public  function find($id)
    {
        return $this->db->get_where('news', array('id_new' => $id))->row();
    }
    ////////////////
    public function newsUA($image, $id = false)
    {
        $this->load->helper('url');

        $data = array(
            'title' => $this->input->post('title'),
            'text' => $this->input->post('text'),
            'id_user' => $_SESSION['id'],
            'image' => $image
        );

        $empt = News_model::find($id);
        if (empty($empt)) {

            $this->db->insert('news', $data);
            return $insert_id = $this->db->insert_id();
        } else {
            $this->db->where('id_new', $id);
            return $this->db->update('news', $data);
        }
    }
    public function delete_item($id)
    {
        $this->db->delete('categore_news', array('id_new' => $id));
        return $this->db->delete('news', array('id_new' => $id));
    }
}
