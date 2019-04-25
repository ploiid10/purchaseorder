<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{

		$this->template->layout('category/index');
    }

    public function list(){
        $collection = $this->database->collection('categories');
        $categories = $collection->documents();
        $data = array();
        foreach($categories as $categ){
            $data[] = array(
                'name' => $categ['name'],
                'id' => $categ->id()
            );
        }
        echo json_encode(array('data' => $data));
    }
    public function edit($id){
        $collection = $this->database->collection('categories');
        $document = $collection->document($id);
        $category = $document->snapshot();
        $data = array(
            'id' => $id,
            'name' => $category['name']
        );
        $this->template->layout('category/edit',$data);   
    }
    public function update($id){
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {	
            $this->session->set_flashdata('msg', validation_errors());
            $this->edit($id);
        }else{
            $request = (object)$this->input->post();
            $collection = $this->database->collection('categories');
            $document = $collection->document($id);
            $document->update([
                ['path' => 'name',
                 'value' => $request->description   ]
            ]);
                redirect('category');
            
        }
    }
    public function insert()
	{
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {	
            $this->session->set_flashdata('msg', validation_errors());
            $this->template->layout('category/index');
        }
        else{
            $request = (object)$this->input->post();
            $collection = $this->database->collection('categories');
            $document = $collection->newDocument();
            $document->create([
                'name' => $request->description
            ]);
            redirect('category');
        }
    }

}
?>
