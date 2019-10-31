
<style>
    .container-field {
	height:60px
}

 .com{
   margin-top:120px;
   margin-left:70px;
   
 } 
 .cam{
   margin-top:-120px;
 }
 .coll{
   margin-top:-220px;
   margin-left:200px;
 }  
 .en{
    color:rgb(69, 65, 89);
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
    background-color: #597189;
 }
.res {
  margin-top:-70px;
}
.btn-danger{
  
  font-size:18px;
    margin-left:20px;
  margin-top:-10px;
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
@media only screen and (min-width:600px)and (max-width:1200px){
  .com{
   margin-top:120px;
   margin-left:70px;
   
 } 
 .coll{
   margin-top:-119px;
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
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="css/menuEn.css">
<link rel="stylesheet" href="css/headerEn.css">

<?php 
require_once 'inc/functions.php';

$db = App::getDatabase('elearning');
 
$auth = new Auth();
$auth->restricteEns(Session::getInstance());




?>
<?php 
 if(!empty($_POST['select']) && isset($_POST['select']) ){
   
   $id_etu =$_POST['select'];
  $db->query("UPDATE `courinscrit` SET `etat`=1 WHERE idEtu=?",[$id_etu]);
     

}
?>

<style>
    .container-field {
	height:60px
}

 .com{
   margin-top:120px;
   margin-left:70px;
   
 } 
 .cam{
   margin-top:-120px;
 }
 .coll{
   margin-top:-220px;
   margin-left:200px;
 }  
 .en{
    color:rgb(69, 65, 89);
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
    background-color: #597189;
 }
.res {
  margin-top:-70px;
}
.btn-danger{
  
  font-size:18px;
    margin-left:20px;
  margin-top:-10px;
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
@media only screen and (min-width:600px)and (max-width:1200px){
  .com{
   margin-top:120px;
   margin-left:70px;
   
 } 
 .coll{
   margin-top:-119px;
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