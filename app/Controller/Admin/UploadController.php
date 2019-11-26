<?php 
namespace App\Controller\Admin;

use  App\Form\BootstrapForm;

class File extends AppController{

     
     private $_suporttedFormats = ['image/png', 'image/jpeg', 'image/jpg'];

     public function uploadFile($imageFile){
          if (is_array($imageFile)){
               //continue
               if(in_array($imageFile['type'],$this->_suporttedFormats)){
                    move_uploaded_file($imageFile['tmp_name'], '../public/image/' .$imageFile['name']);
               } else {
                    header('location: index.php?p=admin.posts.index');
               }
          }    else {
               die ('Ficheir pas envoyer');
          }
     }
}
