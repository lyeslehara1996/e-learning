<style>

.btn-info{
  
  font-size:18px;
    margin-left:20px;
  
    background-color:#34495e;
    width:130px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}


 .btn-info:hover{
    background-color:#597189;
 }
 
 .btn-info:focus{
    background-color:#597189;
 }


  .btn-danger{
  
  font-size:18px;
    margin-left:20px;
  
    background-color:#597189;
    width:130px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}


 .btn-danger:hover{
    background-color:#34495e;
 }
 
 .btn-danger:focus{
    background-color:#34495e;
 }
</style>

<?php 


require_once 'inc/functions.php';


$auth = new Auth();
$auth->restricteEns(Session::getInstance());
$db2 = App::getDatabase('elearning');
 $user_id = session::getInstance()->read('auth')->idEns;




 
  
  if(!empty($_POST['toE']) && isset($_POST['messagesE'])){
   $idEtudiant =$_POST['toE'];
   $message = $_POST['messagesE'];
 $db2->query('INSERT INTO `messagerie` SET to_user_id=?, 
 from_user_id=?,chat_message=?,date = NOW()',[$idEtudiant,$user_id,$message]);
            
         }else        
         
         if(!empty($_POST['toA']) && isset($_POST['messagesA'])){
            $idEtudiant =$_POST['toA'];
            $message = $_POST['messagesA'];
            $db2->query('INSERT INTO `messagerie` SET to_user_id=?, 
            from_user_id=?,chat_message=?,date = NOW()',[$idEtudiant,$user_id,$message]);
                       
                    }  
  
   

?>