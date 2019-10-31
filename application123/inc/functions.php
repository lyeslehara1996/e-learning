<link rel="stylesheet" href="css/bootstrap.min.css"/> 
 <link rel="stylesheet" href="css/bootstrap.css"/> 

 

<?php
require_once 'inc/bootstrap.php';
$compitences = array('ton domain','Achat et logistique','Bâtiment','CAO / DAO','Commerce','Efficacité personnelle','ERP et CRM', 'FAO','Framework','Gestion comptabilité',
  'Gestion Financière','Gestion trésorerie','Informatique Bureautique','Informatique programmation','Informatique réseaux',
  'Juridique','Langues','Management','Marketing','Mécanique','Métier','Métier de lArchitecture','Métiers de l Esthétique',
  'Qualité et Sécurité','Ressources humaines',
  'Santé','Scolaire','Secrétariat','universitaire','Web conception','Web marketing','Web programmation');




 
 
//controler les page auth
 function  pages_controle(){
  if(session_status() == PHP_SESSION_NONE){
    session_start();
  }
  if(!isset($_SESSION['auth'])){

    header('location: login.php');
    exit();
  }
 }
 function afficher_erreur(){
   if(Session::getInstance()->hasFlashes()) {
      foreach(Session::getInstance()->getFlashes() as $type=>$message):?>
        <div class="alert alert-<?= $type; ?>">
        <?= $message; ?>
        </div>
      <?php endforeach;
   } 
 }
 


