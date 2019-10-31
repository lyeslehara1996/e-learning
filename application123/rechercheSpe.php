
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
 if(!empty($_POST['select1']) && isset($_POST['select1']) ){
   
   $selction =$_POST['select1'];
   $cour2 = $db->query("SELECT c.descriptionCours,c.idCours,e.nomEns,e.prenomEns,e.photoEns FROM cours c,enseignants e,specialites s WHERE c.id_Spe = s.id_Spe AND s.idEns = e.idEns AND s.id_Spe= ?",[$selction])->fetch();
   $EnsDemander = $db->query("SELECT en.idEns FROM courinscrit ci,cours c,specialites s,etudiants e,enseignants en WHERE ci.idCours = c.idCours and c.id_spe =$selction and ci.idEtu=? and en.idEns= s.idEns",[$etudiant])->fetch();
  
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
    margin-left: 100px;
}

     .btn-danger{
  
  font-size:18px;
    margin-left:200px;
    background-color:#34495e;
    width:180px;
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
   background-color:#597189;
   width:150px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    margin-top:-10px;

 }
 .btn-success:focus{
  background-color:#597189;
 }
 .btn-success:hover{
  background-color:#597189;
 }
 .card-header{
   margin-top:50px;
 }
 
 @media only screen and (min-width:600px) and (max-width:1200px){
  .btn-danger{
    margin-left:10px;
    width:100px;
  }
  #team{
  margin-left:-30px;
}
 }
 @media only screen and (max-width:600px){
  .btn-danger{
    margin-left:80px;
  }
#team{
  margin-left:40px;
}
.btn-success{
  margin-top:20px;
}
}

 @media only screen and (min-width:600px) and (max-width:1200px){
  .btn-danger{
    margin-left:10px;
    width:100px;
  }
  #team{
  margin-left:-30px;
}
 }
 @media only screen and (max-width:600px){
  .btn-danger{
    margin-left:80px;
  }
#team{
  margin-left:40px;
}
.btn-success{
  margin-top:20px;
}
}
</style>



<!-- <div class="col-xs-12 col-sm-6 text-center"> -->

              <div class="col-sm-6">
              <section id="team">
   
   <div class="card">
    <div class="card-body">
    
                 
             <img 
                         <?php if($cour2->photoEns =="photo/"){ ?>
                          src="img/no_photo_m.png"
                         <?php } else {?>
                          src=" <?php  echo $cour2->photoEns; ?>"
                         <?php } ?>
                             alt="..." height="" width=" ">    
                  </p>
             <p><strong>Nom :</strong>  <?php  echo $cour2->nomEns ?>            
                  </p>
                  <p><strong>Prénom :</strong> <?php echo $cour2->prenomEns ?>            
                  </p>
               
<p> <strong>Cours :</strong>  <?php  echo $cour2->descriptionCours; ?> </p>

           </div>
         </div>
         </div>
   
</section>
</div>
            <div class="col-xs-12 col-sm-12 text-center">
              <div class="col-sm-12">
                <p class="text-center">
               
                </p>
                <p class="text-center">
                <?php if(!$EnsDemander) { ?>
                <form method="POST" class="form">
               <input type="submit" class="submit_cour btn  btn btn-success" value="S'inscrire"  
                onclick="Envoyer(<?= Session::getInstance()->read('etud')->idEtu ?>,
               <?php echo $cour2->idCours ?>);">
                </form>
                <?php } else {?>
                  <form method="POST" class="form">
                 <input type="submit"  class="btn  btn btn-success" value="Annuler"  
                 onclick="Envoyer2(<?= Session::getInstance()->read('etud')->idEtu ?>,<?php echo $cour2->idCours ?>);">
                 </form>
                  <?php } ?>
                 
                </p>
              
              </div>
            </div>
           
        
      
      <script type="text/javascript">
        var  val1 = null;
        var  val2 = null;
        var  val3 = null;
        var  val4 = null;
     
      function Envoyer(valeur1,valeur2){
          val1 = valeur1;
          val2 = valeur2;
   
        }
        function Envoyer2(valeur3,valeur4){
          val3 = valeur3;
          val4 = valeur4;
   
        }
     
    
      $(document).ready(function(){
   
   $('.form').submit(function(){
     
   

      $.post('inscriptionCours.php',{etu1:val1,cour1:val2,etuDs:val3,courDs:val4},function(donnees){
     
      
          
      });
      return false;
   });

});
</script>

   

   
    
      