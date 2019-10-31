<?php 
require_once 'inc/functions.php';

$db = App::getDatabase('elearning');
 
$auth = new Auth();
$auth->restricteEtu(Session::getInstance());
$bool = false;

?>
<style>
.btn-success{
  
  font-size:18px;
    margin-left:20px;
  
    background-color:#597189;
    width:130px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}

 .btn-success:hover{
    background-color:#34495e;
 }
 
 .btn-success:focus{
    background-color:#34495e;
 }
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
</style>



   <?php
   if(!empty($_POST['etu']) && !empty($_POST['cour']) && isset($_POST['etu']) && isset($_POST['cour'])){
   $idEtudiant =$_POST['etu'];
   $cour = $_POST['cour'];
   $etat = 0;

   $db->query("INSERT INTO `courinscrit`(`idCours`, `idEtu`, `etat`) VALUES ('$cour','$idEtudiant' ,'$etat')");

} 
if(!empty($_POST['etu1']) && !empty($_POST['cour1']) && isset($_POST['etu1']) && isset($_POST['cour1'])){
   $idEtudiant =$_POST['etu1'];
   $cour = $_POST['cour1'];
   $etat = 0;

   
   $db->query("INSERT INTO `courinscrit`(`idCours`, `idEtu`, `etat`) VALUES ('$cour','$idEtudiant' ,'$etat')");

}
if(!empty($_POST['etu2']) && !empty($_POST['cour2']) && isset($_POST['etu2']) && isset($_POST['cour2'])){
   $idEtudiant=$_POST['etu2'];
   $cour =$_POST['cour2'];
   $etat = 0;


   
   $db->query("INSERT INTO `courinscrit`(`idCours`, `idEtu`, `etat`) VALUES ('$cour','$idEtudiant' ,'$etat')");

}
if(!empty($_POST['etuDp']) && !empty($_POST['courDp']) && isset($_POST['etuDp']) && isset($_POST['courDp'])){
   $idEtudiant =$_POST['etuDp'];
   $cour = $_POST['courDp'];
   $etat = 0;

   $db->query("DELETE FROM `courinscrit` WHERE idCours=? and idEtu=?",[$cour,$idEtudiant]);
   

} 
if(!empty($_POST['etuDs']) && !empty($_POST['courDs']) && isset($_POST['etuDs']) && isset($_POST['courDs'])){
   $idEtudiant =$_POST['etuDs'];
   $cour = $_POST['courDs'];
   $etat = 0;

   $db->query("DELETE FROM `courinscrit` WHERE idCours=? and idEtu=?",[$cour,$idEtudiant]);

} 
if(!empty($_POST['etuDr']) && isset($_POST['etuDr'])){
   $idEtudiant =$_POST['etuDr'];
   $etat = 0;

   $db->query("DELETE FROM `courinscrit` WHERE  idEtu=?",[$idEtudiant]);

} 
 
   
   ?>
   
   