<?php


class Purchasing_model extends CI_Model{



    public function insert_purchase($request){
          $this->db->insert('transaction', $request);
          $last_id = $this->db->insert_id();
          return $last_id; 
    }
    public function insert_purchase_requests($request){
        $result = $this->db->insert('transaction_order',$request);
        if($result){return true;}else{return false;}
    }
    public function viewPurchases(){
        $result	 =	$this->db->get('transaction');
        return $result->result();
    }

    public function getPurchaseRequest($id){
            $this->db->where('transaction_id',$id);
            $result = $this->db->get('transaction_order');
            return $result->result();
    }
    public function getAllPurchaseRequest(){
        $this->db->select('menu.description, transaction_order.*,transaction.dateOrdered');
        $this->db->join('menu','menu.id = transaction_order.menu_id');
        $this->db->join('transaction','transaction.transaction_id = transaction_order.transaction_id');
        $result = $this->db->get('transaction_order');
        return $result->result();
    }
}
?>