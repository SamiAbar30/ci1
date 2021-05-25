<?php 
class Categore_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_categore()
    {
         $query=$this->db->get('categore');
         return $query->result_array();
      
    }
    ////////////
    public function set_categore()
    {
     $data["name"] =$this->input->post('name');
     return $this->db->insert('categore',$data);
     
    }
    ////////////
    public function delete_categore($id)
    {
        return $this->db->delete('categore', array('id_cat' => $id));
    }
    ////////////
    public function update_categore($id) 
    {
           $data["name"] =$this->input->post('name');
            $this->db->where('id_cat',$id);
            return $this->db->update('categore',$data);
            
    }
}
?>