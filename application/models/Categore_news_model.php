<?php 
class Categore_news_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
 
    function multisave($user_id,$category)
	{
		$query="insert into categore_news values($category,$user_id)";
		$this->db->query($query);
	}
}
?>