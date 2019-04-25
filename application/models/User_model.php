<?php


class User_model extends CI_Model{



    public function insert_user($data){
        $this->db->insert("tbl_user",$data);
    }
    public function get_user($request){
        $this->db->where('password', md5($request->inputPassword));
        $this->db->where('email', $request->inputEmail);
       $result = $this->db->get("tbl_user");
       return $result->result();
    }

    public function fetchAll(){
        $this->db->select('tbl_user.*,user_type.type');
        $this->db->join('user_type','user.type_id = user_type.id','INNER JOIN');
        $result = $this->db->get("tbl_user");
        return $result->result();
    }
}
?>