<?php 
require_once 'inc/functions.php';

$db = App::getDatabase('elearning');
 
$auth = new Auth();
$auth->restricteEtu(Session::getInstance());
$bool = false;
$ids = array();
$etudiant = Session::getInstance()->read('etud')->idEtu;



?>


<?php 
 if(!empty($_POST['select']) && isset($_POST['select']) ){
   
   $selction =$_POST['select'];
   $a =intval($selction);
   $cour2 = $db->query("SELECT c.idCours,c.nomCours,e.nomEns,e.prenomEns,e.idEns,e.photoEns FROM cours c,enseignants e,specialites s WHERE c.id_Spe = s.id_Spe AND s.idEns = e.idEns AND c.idCours= ?",[$selction])->fetch();
    
  
  $cour_inscrit=$db->query("SELECT idCours FROM `courinscrit` ")->fetch();

  $EnsDemander = $db->query("SELECT en.idEns FROM courinscrit ci,cours c,specialites s,etudiants e,enseignants en WHERE ci.idEtu=e.idEtu  and ci.idCours =$selction and ci.idCours =c.idCours and c.id_spe =s.id_spe and en.idEns= s.idEns",[$etudiant])->fetch();

}
   



?>
<link rel="stylesheet" href="css/sstt.css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>

<style>

*{
    margin:0;
    padding:0;

}
h1{
    font-size:36px;
    color:#555;
font-weight:bold;
}
h3{
    font-size:24px;
    color:#333;
    font-weight:bold;
}
#team img{
    margin-top:-50px;
    width:50%;
    border-radius:100%;
    height:25vh;

}
#team i{
    font-size:26px;
    color:#555;

}
#team p{
    font-weight:500;
}
#team .card{
    border-radius:0;
    width:350px;
    height:290px;
    box-shadow:0px 1px 5px   rgb(171, 166, 166););
    transition:all 0.3s ease-in;
    -webkit-transition: all 0.3s ease-in;
    -moz-transition: all 0.3s ease-in;
  
}


#team{
    margin-top: 80px;
    margin-left: 170px;
}
@media only screen and (max-width:600px){
 
#team{
  margin-left:40px;
}
.btn-success{
  margin-top:20px;
}
}

@media only screen and (min-width:600px) and (max-width:1200px){
  #team{
  margin-left:25px;
}
} 
</style>




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

                  <div class="col-sm-6">
              <section id="team">
   
   <div class="card">
    <div class="card-body">
    
                 
             <img 
                          src=" <?php  echo $cour2->photoEns; ?>"
                             alt="..." height="" width=" ">    
                  </p>
             <p><strong>Nom :</strong>  <?php  echo $cour2->nomEns ?>            
                  </p>
                  <p><strong>Prénom :</strong> <?php echo $cour2->prenomEns ?>            
                  </p>
               
<p> <strong>Cours :</strong>  <?php  echo $cour2->nomCours; ?> </p>

           </div>
         </div>
         </div>
   
</section>
</div>
              <div class="card-body">
              </div>
             </div>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 text-center">
              <div class="col-sm-12">
                <p class="text-center">
               
                </p>
                <p class="text-center">
                <?php if(!$EnsDemander) { ?>
                 
                 <form method="POST" class="form">
                <input type="submit" class=" btn-success" value="S'inscrire"   onclick="Envoyer(<?= Session::getInstance()->read('etud')->idEtu ?>,<?php echo $cour2->idCours ?>);">
                 </form>
                 <?php } else {?>
                   <form method="POST" class="form">
                   <input type="submit" class="btn-success"  value="Annuler"  onclick="Envoyer2(<?= Session::getInstance()->read('etud')->idEtu ?>);">
                 </form>
                   <?php } ?>

          
               
            
                </p>

                <div class="return"></div>
              
              </div>
            </div>


            
            <script type="text/javascript">
        var  val1 = null;
        var  val2 = null;
        var  val3 = null;
        
  
      function Envoyer(valeur1,valeur2){
          val1 = valeur1;
          val2 = valeur2;
         button.addClass('.active')
        }
        function Envoyer2(valeur3){
          prompt("etes vous sur de vouloir d annuler l'inscription")
          val3 = valeur3;
        
        
        }
     
    
      $(document).ready(function(){
   
   $('.form').submit(function(){
     
   

      $.post('inscriptionCours.php',{etu:val1,cour:val2,etuDr:val3},function(donnees){
        $('.return').html(donnees);
      
          
      });
      return false;
   });

});
</script>

   
    
      
