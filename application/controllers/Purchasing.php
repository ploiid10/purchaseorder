<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchasing extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
        $this->template->layout('purchasing/index');
    }

   public function addPurchase(){
	    $request =  json_decode(file_get_contents('php://input'), FALSE);
	   	$request = (object)($request);
			$this->insertPurchase($request);
		}	
		
	public function insertPurchase($request){
		$name = $request->name;
	 	$transaction = $this->database->collection('transaction');
		$document = $transaction->newDocument();
		$document->create([
						'date' => strtotime(date("Y-m-d")),
						'customer_name' => $name ? $name : "N/A"
		]);
		$transaction_order = $this->database->collection('transaction_order');
		foreach($request->purchases as $request){
			$order = $transaction_order->newDocument();
			$order->create([
				'name' => $request->description,
				'price' => $request->price,
				'quantity' => $request->quantity,
				'transaction_id' => $document->id()
			]);
				$this->deductInventory($request->id,$request->quantity, $document->id());
		} 
		
	}
	public function deductInventory($id,$qty,$transaction)
	{	
		$collection = $this->database->collection('menu_ingredients');
		$query = $collection->where('menu_id', '=', $id);
		$menus = $query->documents();
		foreach($menus as $menu){
			$ingredients = $this->database->collection('inventory');
			$document = $ingredients->document($menu['ingredient_id']);
			$ingredient = $document->snapshot();
			$ingredient_id = $ingredient->id();
			$quantity = $ingredient['quantity'] - ($menu['quantity'] * $qty);
			$inventory_history = $this->database->collection('inventory_history');
			$history = $inventory_history->newDocument();
			$history->create([
				'date' => strtotime(date("Y-m-d")),
				'name' => $ingredient['name'],
				'quantity' => ($menu['quantity'] * $qty) * (-1),
				'unit' => $ingredient['unit'],
				'transaction_id' => $transaction
			]);
			$collection = $this->database->collection('inventory');
			$document = $collection->document($ingredient_id);
			$document->update([
				['path' => 'quantity', 'value' => $quantity]
			]);
			
		}
	}
	public function details($id){
	 $collection = $this->database->collection('transaction_order');
	 $query = $collection->where('transaction_id', '=',$id);
	 $orders = $query->documents();
	 $data = array();
	 $sum = 0;
	 $subtotal = 0;
	 foreach($orders as $order){
		$subtotal = $order['quantity'] * $order['price'];
		$sum += $subtotal;
		$data[] = array(
			'name' => $order['name'],
			'quantity' => $order['quantity'],
			'price' => number_format($order['price'],2),
			'subtotal' => number_format($subtotal,2)
		);
	 }
	 $view_data['ordes'] = $data;
	 $view_data['sum'] = $sum;
	 $this->load->view('purchasing/details',$view_data);
	}


	public function mobile(){
		$this->template->layout('purchasing/mobile');
	}

}

?>