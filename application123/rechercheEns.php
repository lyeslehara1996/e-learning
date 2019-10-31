<?php 
require_once 'inc/functions.php';

$db = App::getDatabase('elearning');
 
$auth = new Auth();
$auth->restricteEtu(Session::getInstance());
$etudiant = Session::getInstance()->read('etud')->idEtu;
$bool = false;
$ids = array();
?>
<?php 
 if(!empty($_POST['select']) && isset($_POST['select']) ){
   
   $selction =$_POST['select'];
   $cour = $db->query("SELECT s.nomSpe,c.nomCours,c.descriptionCours  FROM cours c,enseignants e,specialites s WHERE c.id_Spe = s.id_Spe AND s.idEns =? AND e.idEns= ?",[$selction,$selction]);
     
  
    $EnsDemander = $db->query("SELECT en.idEns FROM courinscrit ci,cours c,specialites s,etudiants e,enseignants en WHERE ci.idCours =c.idCours and c.id_spe =s.id_spe and s.idEns=? and ci.idEtu=? and en.idEns=?",[$etudiant,$selction,$selction])->fetch();
   
   
}
  

?>
<link rel="stylesheet" href="css/sstt.css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>

<style>


      .btn-danger{
  
  font-size:18px;
    margin-left:160px;
    background-color:#34495e;
    width:110px;
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
 .btn-success{
  
  font-size:18px;
    margin-left:20px;
    background-color:#597189;
    width:110px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}
.res{
  margin-left:30px;
}
 .btn-success:hover{
  background-color:#34495e;
 }
 /* .co{
  margin-top:50px;
} */
 .btn-success:focus{
  background-color:#34495e;
 }
 @media only screen and (max-width:600px){
     .btn-danger{
       margin-left:10px;
       width:100px;
     }
     .btn-success{
       margin-left:-10px;
       width:100px;
     }
  
   }

 @media only screen and (min-width:600px) and (max-width:1300px){
  .btn-danger{
    margin-left:10px;
    width:90px;
  }
  .btn-success{
       margin-left:-10px;
       width:90px;
     }
  
 .res{
   margin-left:40px;
 }
 }


</style>

<div class="panel-body p5555">
            <div class="col-xs-12 col-sm-6 text-center">
              <h4 class="m9090"><span><strong>Spécialités</strong></span></h4>
              <div class="res col-sm-12">
                <table class="co table table-striped">
                <tr>
                <th>nom de la spécialité</th>
                <th>nom de cour</th>
                <th>description Cour</th>
                </tr>
                <tr>
                <?php while($cours = $cour->fetch()):?> 
               
                <tr>
                <td><?php echo $cours->nomSpe ?></td>
                <td><?php echo $cours->nomCours ?></td>
                <td><?php echo $cours->descriptionCours?></td>
        
                </tr>
               
                <?php endwhile ?>
                

                </table>

                <td>
                 <?php if($EnsDemander) { ?>
                  <form method="POST" class="form">
               <input type="submit" class="submit form btn  btn btn-success" value="S'inscrire"   onclick="Envoyer(<?= Session::getInstance()->read('etud')->idEtu ?>,<?php echo $cour_id ?>);">
               </form>
            
               <?php } else {?>
                <form method="POST" class="form">
                  <input type="submit" class="btn  btn btn-success"  value="Annuler"  onclick="Envoyer2(<?= Session::getInstance()->read('etud')->idEtu ?>,<?php echo $cour_id ?>);">
                </form>
                  <?php } ?>
                 
             
               
                
                </td>
              

              </div>
            </div>
