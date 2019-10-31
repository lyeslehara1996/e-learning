<?php 
require_once 'inc/functions.php';

$db = App::getDatabase('elearning');
 
$auth = new Auth();
$auth->restricteEns(Session::getInstance());




?>
<?php 
 if(!empty($_POST['select']) && isset($_POST['select']) ){
   
   $id_etu =$_POST['select'];
   $cour = $db->query("SELECT e.idEtu,photoEtu,emailEtu,adresseEtu
    FROM etudiants e WHERE idEtu= ?",[$id_etu]);
     

}
?>

<style>

.btn-info{
  
  font-size:18px;
    margin-left:-220px;
  
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

 .btn-primary{
  
  font-size:18px;
    margin-left:620px;
  margin-top:-90px;
    background-color:#597189;
    width:130px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}

 .btn-primary:hover{
    background-color:#34495e;
 }
 
 .btn-primary:focus{
    background-color:#34495e;
 }
 .btn-success{
  
  font-size:18px;
    margin-left:20px;
  
    background-color:#34495e;
    width:130px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}

 .btn-success:hover{
    background-color:#597189;
 }
 
 .btn-success:focus{
    background-color:#597189;
 }
 .btn-danger{
  
  font-size:18px;
    margin-left:20px;
  margin-top:-13px;
    background-color:#34495e;
    width:130px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}

 .btn-danger:hover{
    background-color:#597189;
 }
 
 .btn-danger:focus{
    background-color:#597189;
 }
 .en{
    color:rgb(69, 65, 89);
}
.con{
  margin-top:50px;
}
 .com{
   margin-top:120px;
   margin-left:70px;
 }  
 .coll{
   margin-top:-215px;
   margin-left:200px;
 }
 @media only screen and (min-width:600px)and (max-width:1200px){
  .com{
   margin-top:120px;
   margin-left:70px;
   
 } 
 .coll{
   margin-top:119px;
   margin-left:200px;
 } 
}
 @media only screen and (max-width:600px){
   .coll{
     margin-top:20px;
     width:550px;
     margin-left:10px;
   }
   .com{
    margin-left:-10px;
    margin-top:250px;
    
   }
 }
</style>
<form method="POST" class="formulaire">
    <div class="con">
<input type="submit"  class=" form btn  btn btn-info" value="accepter"   onclick="afficher(<?php echo  $cour->fetch()->idEtu ?>);">
</form>
<form method="POST" class="form">
<div class="con">
<input type="submit"  class=" form btn  btn btn-primary" value="refuser" onclick="afficher2(<?php echo  $cour->fetch()->idEtu ?>);">
</div>
</form>
</div>



<script type="text/javascript">
       var  val = null;
       var  val1 = null;
         function afficher(valeur){
          val = valeur;
  
        }
        function afficher2(valeur){
          val1 = valeur;
  
        }
      
      $(document).ready(function(){
   
    $('.formulaire').submit(function(){
      

       $.post('accepter.php',{select:val},function(donnees){
        $('#result').html(donnees);
       
           
       });
       return false;
    });
    $('.form').submit(function(){
     
   

     $.post('refuser.php',{select1:val1},function(donnees){
       $('#result').html(donnees);
     
         
     });
     return false;
  });

});

</script>

  