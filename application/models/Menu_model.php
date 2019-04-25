<?php


class Menu_model extends CI_Model{


    public function insert_menu($data){
       $result =  $this->db->insert('tbl_menu', $data);
       if($result){return true;}
       else{return false;}
    }
    public function fetchAll(){
        $this->db->select('tbl_menu.*,tbl_category.cat_name as cat_des');
        $this->db->join('tbl_category', 'tbl_category.cat_id = tbl_menu.cat_id');
        $result = $this->db->get('tbl_menu');
        return $result->result();
    }
    public function findOne($id){
        $this->db->where('menu_id',$id);
        $result = $this->db->get('tbl_menu');
        return $result->result();
    }
    public function update_menu($id,$data){
        $this->db->set($data);
        $this->db->where('menu_id',$id);
       $update =  $this->db->update('tbl_menu');
       if($update){return true;}
       else{return false;}
    }
    
}
?>