<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    ///////
    public function get_user($id = false)
    {
        if ($id === false) {
            $query = $this->db->get('user');
            return $query->result_array();
        }
        $query = $this->db->get_where('user', array('id_user' => $id));
        return $query->row_array();
    }
    ////////////
    public  function find_user_id($id)
    {
        return $this->db->get_where('user', array('id_user' => $id))->row();
      
    }
    public  function find_user_email($email)
    {
        $query = $this->db->query("select id_user,admin from user WHERE email='" . $email . "'");
        return $query->row_array();
    }
    ////////////////
    public function newsUA($id = false)
    {
        $this->load->helper('url');
       if( $_SESSION["admin"]==1){
         $admin=1;
        }else{
         $admin=0;
        }
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'dateofbirth' => $this->input->post('dateofbirth'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'admin' => $admin,
        );
        $empt = User_model::find_user_id($id);
        if (empty($empt)==true) {
            return $this->db->insert('user', $data);
        } else {
            $this->db->where('id_user', $id);
            return $this->db->update('user', $data);
        }
    }
    
    /////////
    public function delete_user($id)
    {
        $data = array(
            
            'id_user' => 1
        );
        $this->db->update('news', $data);
        return $this->db->delete('user', array('id_user' => $id));
    }

    //////////

    public function singn_in($data)
    {

        $empt = $this->db->get_where('user', array('email' => $data["email"], 'password' => $data["password"]))->row();
        if (empty($empt)) {
            return false;
        } else {
            return true;
        }
    }
}
