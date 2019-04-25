<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingredients extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->template->layout('ingredients/index');
    }
    public function edit($id){
		$collection = $this->database->collection('inventory');
		$document = $collection->document($id);
		$ingredient = $document->snapshot();
		$data = array();	
		$data['name'] = $ingredient['name'];
		$data['id'] = $ingredient->id();
		$data['unit'] = $ingredient['unit'];
		$data['quantity'] = $ingredient['quantity'];
		$this->template->layout('ingredients/edit',$data);
	}
	public function update(){
		$request = (object)$this->input->post();
		$collection = $this->database->collection('inventory');
		$document = $collection->document($request->id);
		$ingredient = $document->snapshot();
		if($request->quantity>=$ingredient['quantity']){
			$history = $this->database->collection('inventory_history');
			$history_document= $history->newDocument();
			$quantity = $request->quantity - $ingredient['quantity'];
			$history_document->create([
				'quantity' => $quantity,
				'name' => $request->name,
				'unit' => $request->unit,
				'date' => strtotime(date('Y-m-d')),
				'transaction_id' => 'stockin'
			]);
			$document->update([
				['path' => 'quantity', 'value' => $request->quantity],
				['path' => 'name', 'value' => $request->name],
				['path' => 'unit', 'value' => $request->unit]
			]);
			redirect('ingredients');
		}
    }
    public function save(){
				$request = (object)$this->input->post();
				$collection = $this->database->collection('inventory');
				$ingredient = $collection->newDocument();
				$ingredient->create([
					'name' => $request->name,
					'quantity' => 0,
					'unit' => $request->unit
				]);
				echo json_encode(array('data' => true));
    }
 
}
