<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->template->layout('inventory/index');
  	}
	  
	  public function fetchInventory(){
		$collection = $this->database->collection('inventory');
		$inventories = $collection->documents();
		$data = array();
		foreach($inventories as $inventory){
			$data[] = array(
				'ingredient' => $inventory['name'],
				'quantity' => $inventory['quantity'],
				'unit' => $inventory['unit'],
				'id' => $inventory->id()
			);
		}
		echo json_encode(array('data' => $data));
	}
}
