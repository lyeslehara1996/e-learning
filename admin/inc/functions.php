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
  return substr(str_shuffle(str_repeat($alphabet, $legth)), 0,60);

 }

 

 function afficher_erreur(){
   if(isset($_SESSION['flash'])) {
      foreach($_SESSION['flash'] as $type=>$message):?>
        <div class="alert alert-<?= $type; ?>">
        <?= $message; ?>
        </div>
      <?php endforeach;
 unset($_SESSION['flash']);
   } 
 }
 
 



/*
 if($_SESSION['auth']->photoEns == "photos/" ) {?>
  src="photos/no_photo_m.png" 
 <?php } else {?>
  src="<?= $_SESSION['auth']->photoEns; ?>"
 <?php }?>  
 class="img-responsive img-circle" alt="..." height="290 px" width="290 px">
 <br/>
 <button type="file" name="photo" class="upload btn" id="votre_photo"> choisir</button>
  <h3>diver</h3>
  <p>
  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur praesentium natus libero ipsum quod illo, necessitatibus corrupti quos ea iure minima! Aperiam iusto officia quibusdam quia obcaecati recusandae doloremque quam.
  </p>
 */