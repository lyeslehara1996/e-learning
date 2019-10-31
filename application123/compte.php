<?php 


require_once 'inc/functions.php';


  $auth = new Auth();
  $auth->restricteEns(Session::getInstance());
 $db2 = App::getDatabase('elearning');
 $user_id = session::getInstance()->read('auth')->idEns;
?>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="css/menuEn.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/headerEn.css">



<style>
  .r1{
    margin-top:220px;
    margin-right:400px;
    box-shadow:0px 2px 6px   rgb(171, 166, 166);
    height:280px;

    
  }

  .mar{
    margin-top:120ox;
  }
  .txt{
    color:#597189;
    font-size:28px;
}
h1{
  font-size:38px;
}
  .but{
    margin-top:30px;
    margin-left:100px;
  }
  .btn-danger{
    margin-top: 5px;
    width:200px;
    height: 40px;
    margin-left: 10px; 
    border:0px;
    border-radius: 0px;
    background-color:#597189;
    font-size:18px;
  
 }
 .btn-danger:hover{
  background-color:#34495e;
 }
 .btn-danger:focus{
  background-color:#34495e;
 }
 .btn-primary{
    margin-top: -40px;
    width:200px;
    height: 40px;
    margin-left: 223px; 

    border:0px;
    border-radius: 0px;
    background-color:#34495e;
    font-size:18px;

  
 }
 .btn-primary:hover{
  background-color:#597189;
 }
 .btn-primary:focus{
  background-color:#597189;
 }
 .btn-success{
   background:#253341;
   height:40px;
   width:400px;
   margin-left:20px;
   border:0px;
   font-size:18px;
    border-radius: 0px;
    margin-top:18px;
 }
 .btn-success:hover{
  background-color:#597189;
 }
 .btn-success:focus{
  background-color:#597189;
 }
 @media only screen and (min-width:600px) and (max-width:1200px) {
  .r1{
    margin-top:240px;
    margin-left:10px;
  width:695px;
    height:300px;
    }

 }
 @media only screen and (max-width:600px){
     .r1{
         margin-top:250px;
         width:510px;
         margin-left:16px;
         height:330px;
     }
     .btn-danger{
      margin-left:-100px;

       
     }
    
     .btn-primary{
       margin-top:-41px;
       margin-left:110px;
    

     }
     .btn-success{
       margin-left:-95px;
       margin-top:10px;
     }
     .but{
       margin-left:120px;
     }
     .show{
       max-height:300px;
     }
 }
</style>

         <?php afficher_erreur(); ?>


<?php     $req2 = $db2->query('SELECT id_Spe FROM specialites WHERE idEns=?',[$user_id]);
      

?>

<body>
<div class="rows navbar-fixed-top ">
      <div class="col-lg-5">  
               <a class="btnn">
                  <span></span>
                  <span></span>
                  <span></span>
              </a>
              <img src="img/000.png" class="logo"> </div>
              
       
       <div class="col-lg-7">
      <div class="menu"> 
              <ul class="nav navbar-nav">

       
                    <li><a href="compte.php"><span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
          
              <li><a href=""><span class="glyphicon glyphicon-briefcase"></span> Formation </a>
           <ul class="sub-nav">
           <li role="presentation"><a href="mesCours.php" role="menuitem">Mes cours</a></li>
                <li role="presentation"><a href="mesEtudiants.php" role="menuitem">Mes etudiant</a></li>
           </ul>
           
           </li>
           <li><a href="profilEns.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li> 

    <li> <a  href="logout.php" class="col"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>

  
                  </ul>

         
        
        </div> </div>
    
    </div>

              <script type="text/javascript"> 
                  $(".btnn").on("click",function(){
                      $(".menu").toggleClass("show")
                  })
              
                  </script>
  
<div class="container">
  <div class="row">
    <div class="col-lg-4"></div>
    <div class="r1 col-lg-11">
      <div class="row">
        <div class="col-lg-2">

        </div>
        <div class="mar col-lg-9">
      <h1>Bienvenue sur votre espace de travail</h1>
      <?php    
      //  while($spe = $req2->fetch())
      //   $voir = $spe->id_Spe;
      //   $voir2 = intval($voir);
      //  var_dump($voir2);
        ?>
      <h3 class="txt">Choisissez l'action que vous voulez effectuer</h3>
      <div class="but">
          <a href="AjoutCours.php"> <button type="submit" class="btn btn-danger">Ajouter cours</button> </a>
          <form method="POST" class="formulaire">
          <input type="submit"  class="btn btn-primary" value='Contacte Admin'  />
          </form>
          <a href="compteCon.php"> <button type="submit" class="btn btn-success">Consultation les invitations et messages</button> </a>
      </div>  
      <div class="col-lg-4"></div>
      </div>
    </div></div>
    <div class="col-lg-3"></div>
  </div>
</div>

<div id="description"></div>

<script type="text/javascript">
    
   
      $(document).ready(function(){
   
    $('.formulaire').submit(function(){
      

       $.post('contacteAdmin.php',{},function(donnees){
       $('#description').html(donnees);
       
           
       });
       return false;
    });


});

</script>

 

