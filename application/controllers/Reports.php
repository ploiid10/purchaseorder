<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
        $this->template->layout('reports/purchasing');
	}
	public function inventory()
	{
        $this->template->layout('reports/inventory');
	}
	
	
	public function summaryPurchasing(){
		$request = (object)$this->input->get();
		$collection = $this->database->collection('transaction');
		$query = $collection->where('date', '>=', strtotime($request->dtStart))
							->where('date', '<=', strtotime($request->dtEnd));
		$transactions = $query->documents();
		$data = array();
		foreach($transactions as $transaction){
			$sum = 0;
			$order = $this->database->collection('transaction_order');
			$orderquery = $order->where('transaction_id', '=',$transaction->id());
			$orders = $orderquery->documents();
			foreach($orders as $order){
				$sum += ($order['price'] * $order['quantity']);
			}
			$data[] = array(
				'date' => date('Y-m-d',$transaction['date']),
				'amount' => number_format($sum,2),
				'transaction_id' => $transaction->id(),
				'customer' => $transaction['customer_name']
			);
		}
		echo json_encode(array('data' => $data));
	}

	
	public function purchaseTrans(){
		$this->template->layout('reports/pertransaction');
	}

	public function fetchInventoryHistory(){
		$request = (object)$this->input->post();
		$collection = $this->database->collection('inventory_history');
		$query =  $collection->where('date', '>=', strtotime($request->dtStart))
							 ->where('date', '<=', strtotime($request->dtEnd));
		$inventories = $query->documents();
		$data = array();
		foreach($inventories as $inventory){
			$data[] = array(
				'ingredient' => $inventory['name'],
				'quantity' => $inventory['quantity'],
				'unit' => $inventory['unit'],
				'date' => date('Y-m-d',$inventory['date']),
				'transaction' => $inventory['transaction_id']
			);
		}
		echo json_encode(array('data' => $data));
	}


}
?>