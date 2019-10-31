<?php


require 'inc/bootstrap.php';
$auth = new Auth();

$db = App::getDatabase('elearning');



  if(isset($_GET['idEn']) AND isset($_GET['tokenEn'])){
    
    if($auth->confirm($db,$_GET['idEn'],$_GET['tokenEn'],'enseignants','idEns',Session::getInstance())){
      
      App::redirect('compte.php');
    }else{
      Session::getInstance()->setFlash('danger','ce token n est plus valide');
      App::redirect('login.php');
       
    }
  }

   if(isset($_GET['idEt']) AND isset($_GET['tokenEt'])){
   
    if($auth->confirm($db,$_GET['idEt'],$_GET['tokenEt'],'etudiants','idEtu',Session::getInstance())){
      App::redirect('compteEtudiant.php');
    }else{
      Session::getInstance()->setFlash('danger','ce token n est plus valideeee');
      App::redirect('login.php');
       
    }
   
            }
            
     
        
  
     
 
 

 
 
 ?>


