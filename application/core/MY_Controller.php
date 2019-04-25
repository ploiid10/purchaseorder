<?php 
require __DIR__.'/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Firestore\FieldValue;
class MY_Controller extends CI_Controller {
    
    public $database;
    public $storage;
    public $bucket;
    public $imageBaseUrl;
    public $fieldValue;
    function __construct() {
        parent::__construct();
        $config = array(
            'keyFilePath' => __DIR__.'/vendor/secret/halalcoffee-3488488070d2.json',
            'projectId' => 'halalcoffee'
        );
        $this->database = new FirestoreClient($config);
        $this->storage = new StorageClient([
            'keyFilePath' => __DIR__.'/vendor/secret/halalcoffee-3488488070d2.json'
        ]);
        $this->bucket = $this->storage->bucket('halalcoffee.appspot.com');
        $this->imageBaseUrl = 'https://firebasestorage.googleapis.com/v0/b/halalcoffee.appspot.com/o/';
    
    }
    function fieldValue(){
        return FieldValue::serverTimestamp();
    }
}
?>