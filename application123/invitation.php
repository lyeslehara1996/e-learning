<?php 


require_once 'inc/functions.php';


// $auth = new Auth();
// $auth->restricteEns(Session::getInstance());
$db = App::getDatabase('elearning');
$ens=  Session::getInstance()->read('auth')->idEns;
?>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="css/menuEn.css">
<link rel="stylesheet" href="css/headerEn.css">
<style>
    .container-field {
	height:60px
}

 .com{
   margin-top:120px;
   margin-left:70px;
   
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
 .cam{
   margin-top:-120px;
 }
 .coll{
   margin-top:-385px;
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
    background-color:#597189;
 }
.res {
  margin-top:-70px;
}
.btn-danger{
  
  font-size:18px;
    margin-left:20px;
  margin-top:-22px;
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
<?php 
  $etudiantInvit = $db->query("SELECT e.idEtu,nomEtu,prenomEtu,emailEtu FROM courinscrit ci,
  cours c,specialites s,etudiants e WHERE ci.idCours = c.idCours and 
  c.id_spe =s.id_spe and e.idEtu = ci.idEtu and s.idEns=?and ci.etat=?",[$ens,0]);
?>
<div class="col-sm-12 text-center">
        <div class="panel panel-default">
          <div class="panel-heading">


           
            
            <h2 class="m5050"> <span class="en"><strong> Voici toutes les informations</strong></span> </h2>
          </div>
             
          
          <div class="panel-body p5555">
            <div class="col-xs-12 col-sm-6 text-center">
            <tr><h3 class="m9090"><span><strong>Etudiant</strong></span></h3>
              <div class="col-sm-12">
                <table class="co table table-striped">
                <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Action</th>
                </tr>
                
                <?php while($etu = $etudiantInvit->fetch()):?> 
               
                <tr>
                <td><?php echo $etu->nomEtu ?></td>
                <td><?php echo $etu->prenomEtu ?></td>
                 <td>
                 
                
                <form method="POST" class="formulaire">
                <input type="submit"  class=" form btn  btn btn-info" value="plus d'info"
                   onclick="afficher(<?php echo $etu->idEtu?>);">
                </form>
                </form>
                </div>

            
               
               
                </td>
                <!-- <a href="formation.php?delete=<?//php echo $cours->idCours;?>" class="btn btn-danger" id="suppression"> supprimer</button> -->
                <?php endwhile ?>
                </tr>
               
               
                

                </table>
              

              </div>
            </div>
            
            <h3 class="m9090"><span><strong>Désciption</strong></span></h3>
          <span id="description">
           
          </span>
         
          </div>
        </div>
      </div>

         <script type="text/javascript">
       var  val = null;
         function afficher(valeur){
          val = valeur;
  
        }
      
      $(document).ready(function(){
   
    $('.formulaire').submit(function(){
      

       $.post('infoEtu.php',{select:val},function(donnees){
       $('#description').html(donnees);
       
           
       });
       return false;
    });


});

</script>


