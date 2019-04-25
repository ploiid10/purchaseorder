<?php 
require __DIR__.'/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Storage\StorageClient;

  
    
        $config = array(
            'keyFilePath' => __DIR__.'/vendor/secret/halalcoffee-3488488070d2.json',
            'projectId' => 'halalcoffee'
        );
        $database = new FirestoreClient($config);
        $storage = new StorageClient([
            'keyFilePath' => __DIR__.'/vendor/secret/halalcoffee-3488488070d2.json'
        ]);
        $bucket = $storage->bucket('halalcoffee.appspot.com');
        
?>