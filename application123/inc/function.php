<link rel="stylesheet" href="css/bootstrap.min.css"/> 
 <link rel="stylesheet" href="css/bootstrap.css"/> 

<?php
$compitences = array('ton domain','Achat et logistique','Bâtiment','CAO / DAO','Commerce','Efficacité personnelle','ERP et CRM', 'FAO','Framework','Gestion comptabilité',
  'Gestion Financière','Gestion trésorerie','Informatique Bureautique','Informatique programmation','Informatique réseaux',
  'Juridique','Langues','Management','Marketing','Mécanique','Métier','Métier de lArchitecture','Métiers de l Esthétique',
  'Qualité et Sécurité','Ressources humaines',
  'Santé','Scolaire','Secrétariat','universitaire','Web conception','Web marketing','Web programmation');
 



 function st_random($legth){
  $alphabet ="0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
  return substr(str_shuffle(str_repeat($alphabet, $legth)), 0, $legth);
// generer une chaine de caractere qui fait une certain 
 }

 function getErreurC1($champ){
  if(empty($_POST['$champ']) || !preg_match('#^[a-zA-Z_]+$#',$_POST['$champ'])){
    $errors['$champ'] = "votre nom est faux";
    }
 }
 function logged_only(){
  if(session_status() == PHP_SESSION_NONE){
    session_start();
  }
  if(!isset($_SESSION['auth'])){
    $_SESSION['flash']['danger']="vous n'avez pas le droit d'acceder a cette page avant de confirmer votre conte dan gmail";
header('Location:login.php');
exit(); 
 }
 }