<?php


class Category_model extends CI_Model{



    public function insert_category($request){
      $result  = $this->db->insert('tbl_category',array("cat_name" => $request->description));
      if($result){return true;}
      else{ return false;}
    }
    public function fetchAll(){
        $result = $this->db->get('tbl_category');
        return $result->result();
    }
    public function findOne($request){
        $this->db->where('cat_name',$request->description);
        $result = $this->db->get('tbl_category');
        return $result->result();
    }
  public function findById($id){
      $this->db->where('cat_id',$id);
      $result = $this->db->get('tbl_category');
      return $result->result();
  }
  public function update($id,$description){
    $this->db->set('cat_name',$description);
    $this->db->where('cat_id',$id);
    $result = $this->db->update('tbl_category');
    if($result){return true;}
    else{ return false;}
  }
}
?>