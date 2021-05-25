<?php 
class Favoret extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
 
    function ADD_FAV($id_new=0,$id_user=0)
	{if($id_user==null){
		$id_user=0;
	}
	if($id_new==null){
		$id_new=0;
	}
		$query="insert into favoret values($id_user,$id_new)";
		$this->db->query($query);
	}
    function REMOVE_FAV($id_new=0,$id_user=0)
	{
		if($id_user==null){
			$id_user=0;
		}
		if($id_new==null){
			$id_new=0;
		}
		$query="delete from favoret where id_new=$id_new and id_user=$id_user" ;
		$this->db->query($query);
	}
	
    function get_FAV_NEW_BY_USER($id_user=0)
	{
		if($id_user==null){
		$id_user=0;
	}
		$query="select id_new from favoret where id_user=$id_user";
		 return $this->db->query($query);
	}
	
	public function get_news_FAV($id_user = 0)
    {
		if($id_user==null){
			$id_user=0;
		}
        $sql  = 'SELECT DISTINCT N.* FROM favoret CN ,news N,user C WHERE ' . $id_user . '=CN.id_user and CN.id_new = N.id_new';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
?>