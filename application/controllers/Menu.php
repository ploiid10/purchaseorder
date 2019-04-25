<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
        $data['menus'] = $this->list();
        $this->template->layout('menu/index',$data);
    }

    public function view_ingredients($id){
        $collection = $this->database->collection('menu_ingredients');
        $query = $collection->where('menu_id','=',$id);
        $documents = $query->documents();
        $data = array();
        foreach($documents as $document){
            $ingredients = $this->database->collection('inventory');
            $temp =  $ingredients->document($document['ingredient_id']);
            $ingredient = $temp->snapshot();
            $data[] = array(
                'name' => $ingredient['name'],
                'quantity' => $document['quantity']
            );
        }
        
        $view_data['notingredients'] = $this->getNotIngredients($data);
        $view_data['ingredients'] = $data;
        $view_data['id'] = $id;
        $this->template->layout('menu/ingredients',$view_data);

    }
    public function ingredients(){
        $collection = $this->database->collection('inventory');
        $documents = $collection->documents();
        $data = array();
        foreach($documents as $document){
            $data[] = array(
                'name' =>  $document['name'],
                'id' => $document->id()
            );
           
        }
        return $data;
    }
    public function getNotIngredients($menuIngredients){
        $allingredients  = $this->ingredients();
        $data = array();
        $inmenu = array();
        foreach($menuIngredients as $in){
            $inmenu[] = $in['name'];
        }
        foreach($allingredients as $ingredient){
            if(!in_array($ingredient['name'], $inmenu)){
                $data[$ingredient['id']] = $ingredient['name'];
            }
        }
        return $data;
    }
    public function addIngredients(){
        $request = (object)$this->input->post();
        $menu_ingredients  = $this->database->collection('menu_ingredients');
        $ingredient = $menu_ingredients->newDocument();
        $ingredient->create([
            'menu_id' => $request->id,
            'ingredient_id' => $request->ingredient,
            'quantity' => $request->quantity  
        ]);
        redirect('menu');
    }
    public function list(){
        // $data  = $this->Menu_model->fetchAll();
        // echo json_encode(array("data" => $data));
        $collection = $this->database
                           ->collection('menus');
        $menus = $collection->documents();
        $data = array();
        foreach($menus as $menu){
            $data[] = array(
                'imagePath' => $menu['imagePath'],
                'description' => substr($menu['description'],0,100). '...',
                'name' => $menu['name'],
                'price' => $menu['price'],
                'rating' => $menu['rating'],
                'id' => $menu->id()
            );
        }
        return $data;
    }
	public function addMenu()
	{
         $data['categories'] = $this->fetchCategories();
         $this->template->layout('menu/upload',$data);
    }
    public function edit($id){
    //     $result = $this->Menu_model->findOne($id);
    //     $data['categories'] = $this->fetchCategories();
    //    foreach($result as $menu){
      
    //        $data['description'] = $menu->menu_name;
    //        $data['price'] = $menu->menu_price;
    //        $data['category'] = $menu->cat_id;
    //        $data['image'] = $menu->menu_image_path;
    //    }     $data['id'] = $id;
        $collection = $this->database->collection('menus');
        $document = $collection->document($id);
        $menu = $document->snapshot();
        $data = array();
            $data['menu'] = array(
                'name' => $menu['name'],
                'description' => $menu['description'],
                'person' => $menu['person'],
                'category' => $menu['category'],
                'price' => $menu['price'],
                'imagePath' => $menu['imagePath'],
                'id' => $menu->id(),
                'categories' => $this->fetchCategories()
            );
         $this->template->layout('menu/uploadedit',$data);
    }
    public function fetchMenu(){
        echo json_encode(array('data' => $this->list()));
    }
    public function fetchCategories(){
        $collection = $this->database->collection('categories');
        $categories = $collection->documents();
        $data = array();
        foreach($categories as $categ){
            $data[$categ['name']] = $categ['name'];
        }
        return $data;
    }
    public function upload_edit(){
        if(isset($_FILES['image_file']['name']) && !empty($_FILES['image_file']['name']))
          {
            $request = (object)$this->input->post();
            $config['upload_path']          = 'assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10000;
            $this->load->library('upload', $config);
            $this->upload->do_upload('image_file');
            $data = $this->upload->data();
            $this->image->filename($data['full_path']);
            $result = $this->bucket->upload(
                file_get_contents($data['full_path']),
                [ 'name' => $request->description,
                  'metadata' => [
                      'contentType' => 'image/jpeg'
                      ]
                ]
            );
            unlink($data['full_path']);
            $url = $this->imageBaseUrl. ''.$request->description.'?alt=media';
            $collection = $this->database->collection('menus');
            $document = $collection->document($request->id);
            $document->update([
                ['path' => 'imagePath', 'value' => $url],
                ['path' => 'description', 'value' => $request->description],
                ['path' => 'name', 'value' => $request->name],
                ['path' => 'price', 'value' => $request->price],
                ['path' => 'person', 'value' => $request->person ],
                ['path' => 'category', 'value' => $request->category]
            ]);
             redirect('menu');
            } 
            else{
               redirect('menu');
            }
    }
    public function do_upload(){
        if(isset($_FILES['image_file']['name']) && !empty($_FILES['image_file']['name']))
          {
            $request = (object)$this->input->post();
            $config['upload_path']          = 'assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10000;
            $this->load->library('upload', $config);
            $this->upload->do_upload('image_file');
            $data = $this->upload->data();
            $this->image->filename($data['full_path']);
            $result = $this->bucket->upload(
                file_get_contents($data['full_path']),
                [ 'name' => $request->description,
                  'metadata' => [
                      'contentType' => 'image/jpeg'
                      ]
                ]
            );
            unlink($data['full_path']);
            $url = $this->imageBaseUrl. ''.$request->description.'?alt=media';
            $collection = $this->database->collection('menus');
            $document = $collection->newDocument();
            $document->create([
                'imagePath' => $url,
                'price' => $request->price,
                'name' => $request->name,
                'category' => $request->category,
                'description' => $request->description,
                'rating' => rand(3,5),
                'person' => $request->person
            ]);
            redirect('menu');
        }else{
            $this->session->set_flashdata('error', "Image Required");
            redirect('menu/addMenu');
        }
    }
}
?>