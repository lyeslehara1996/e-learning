<?php 

require 'inc/functions.php';
$auth = new Auth();
$auth->restricteEtu(Session::getInstance());


?>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/headerP.css">
<link rel="stylesheet" href="css/menu.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script> 


<head>
<style>
ul.sub-nav{
    position:absolute;
    background:#374d63;
    width:380px;
    height: 190px;
    box-shadow:1px 1px 2px rgba(0,0,0,0.14), -1px 0px 1px rgba(0,0,0,0.14);
    top:71px;
left:0;
visibility:headers_sent;
opacity:0;



}
.btn-danger{
    font-size:20px;
    margin-left:450px;
    
}

*{
    margin:0;
    padding:0;

}
h1{
    font-size:36px;
    color:#555;
font-weight:bold;

}
.in{
    margin-left:30px;
}
h2{
    font-size:24px;
    color:#333;
    font-weight:bold;
  
    
    align-content: left;
}
#team img{
    margin-top:-80px;
    width:30%;
    border-radius:100%;
    height:30vh;

}
.c1{
    margin-left:20px;
}
.pa{
    margin-left:-13px;
}
.da{
    margin-left:99px;
}
#team i{
    font-size:26px;
    color:#555;

}
.cl{
    margin-left:10px;
}
body{
    height:800px;
}
#team p{
    font-weight:500;
}
#team .card{
    border-radius:0;
    width:758px;
    height:500px;
    box-shadow:1px 2px 5px   rgb(171, 166, 166););
    transition:all 0.3s ease-in;
    -webkit-transition: all 0.3s ease-in;
    -moz-transition: all 0.3s ease-in;
    /* background:  rgb(234, 223, 223); */
}
.lien{
    margin-top:20px;
}



#team{
    margin-top: 180px;
    margin-left:-220px;
}

@media only screen and (min-width:600px) and (max-width:1200px){
    #team {
        margin-top:220px;
        margin-left:20px;
     
    }
    #team .card{
        width:660px;
        height:600px;
    }  
}

@media only screen and (max-width:600px){
    #team {
        margin-top:320px;
        margin-left:10px;
       
    }  
    #team .card{
        width:500px;
        height:600px;
    }
    .show{
        height:130px;
    }
   
}
  
</style>
</head>
<body>

<div class="rows  navbar-fixed-top">
      <div class="col-lg-4">  
               <a class="btnn">
                  <span></span>
                  <span></span>
                  <span></span>
              </a>
              <img src="img/000.png" class="logo"> </div>
              
       
       <div class="col-lg-8">
      <div class="menu"> 
              <ul class="nav navbar-nav">

       
                    <li><a href="compteEtudiant.php"><span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
           
          <li><a href=""><span class="glyphicon glyphicon-briefcase"></span> Formation </a>
           <ul class="sub-nav">
           <li role="presentation"><a href="recherche_Specialité.php" role="menuitem">recherche par specialite</a></li>
                <li role="presentation"><a href="recherche_Prof.php" role="menuitem">recherche par enseignant</a></li>
                <li role="presentation"><a href="courEtu.php" role="menuitem">Mes cours</a></li>
           </ul>
           
           </li>
              <li><a href="profilEtudiant.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li> 
              <li><a href=".php"><span class="glyphicon glyphicon-envelope"></span> Contact</a>
              <ul class="sub-nav">
           <li role="presentation"><a href="contacterEnseignant.php" role="menuitem">Contactez enseignant</a></li>
                <li role="presentation"><a href="contacterAdmin.php" role="menuitem">Contactez admin</a></li>
               
           </ul>
           </li>
    <li> <a  href="logout.php" class="col"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
    
                  

         
        
        </div> </div>
    
    </div>

              <script type="text/javascript"> 
                  $(".btnn").on("click",function(){
                      $(".menu").toggleClass("show")
                  })
              
                  </script>
  


    <section id="team">
        <div class="container my-3 py-5 text-center">
    <div class="row ">

        
    <div class="col-lg-3"> </div>
    <div class="col-lg-6">
    <div class="card">
    <div class="card-body">

                  <img 
                           <?php
                           if (Session::getInstance()->read('etud')->photoEtu == "photos/" ){ ?>
                          src="img/no_photo_m.png"<?php }else {?>
                            src="<?= Session::getInstance()->read('etud')->photoEtu ?>" 
                            <?php }?>
                             alt="..." height="" width=" ">
                             
                    
                

<h1><strong> <?= Session::getInstance()->read('etud')->nomEtu ?> <?= Session::getInstance()->read('etud')->prenomEtu ?> (<?= Session::getInstance()->read('etud')->pseudoEtu ?>)
</strong>
                        </h1>
<div class="row">
<h3><div class="col-lg-5"><strong> Adresse:</strong></div> <div class="col-lg-4"><?= Session::getInstance()->read('etud')->adresseEtu ?></div> </h3>
</div>
<div class="row">
<h3><div class="pa col-lg-5"><strong>Email:</strong></div> <div class="col-lg-6"><?= Session::getInstance()->read('etud')->emailEtu ?></div> </h3>
</div>
<div class="row">
<h3><div class="da col-lg-4"><strong>Date de naissance:</strong></div> <div class="col-lg-3"><?= Session::getInstance()->read('etud')->date_NEtu ?></div> </h3>
</div>
<p></p>

  <?php

$auth = new Auth();
$db = App::getDatabase('elearning');

if(!empty($_POST) && !empty($_POST['email'])){
 
  if($auth->forget($db,$_POST['email'],Session::getInstance())){
    Session::getInstance()->setFlash('success',"les instruction du rappel de mot de passe vous ont été envoyées par email");
    App::redirect('login.php');
  }else{
        $_SESSION['flash']['danger'] = 'aucun compte ne correspant a cette adresse';
    }
}
?>
<div class="d-flex flex-row justify-content-center">
  
 
  <div class="p-4">
 <div class="row">
 <div class="lien col-lg-6"> <a href="#" data-toggle="modal"  data-target="#formulaire">changer le mot de passe</a></div>
 <div class="col-lg-4">
  </div>
  <div class="col-lg-4">
  <div class="container">
    <div id="html">
     
    </div>
    </div>
    <div class="modal fade" id="formulaire">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Mot de passe oublier :</h4>   
                     
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body row">
            <form class="coll" action="compte.php">
         
            <div class="form-group">
                  <label for="pseudomail">email</label>
                  <input type="email" id="email"  name="email" class="form-control" placeholder="test@gmail.com">
            </div>  
             <a href="reset.php"> <button type="submit" class="btn btn-danger">Envoyer</button>  </a>


            </form>
          </div>
        </div>
      </div>
    </div>
</div>
 <div class="col-lg-6"></div>
 <div class="lien col-lg-4"> <a href="editProfilEtu.php" class="liens " > modifier le profil</a></div>

 </div>
  </div>
</div> </div>
           </div>
         </div>
         <div class="col-lg-3"> </div>
  
 
    </section>
</body>



  
  <?php
$auth = new Auth();

$db = App::getDatabase('elearning');

if(!empty($_POST) && !empty($_POST['email'])){
 
  if($auth->forget($db,$_POST['email'],Session::getInstance())){
    Session::getInstance()->setFlash('success',"les instruction du rappel de mot de passe vous ont été envoyées par email");
    App::redirect('login.php');
  }else{
        $_SESSION['flash']['danger'] = 'aucun compte ne correspant a cette adresse';
    }
}
$auth = new Auth();
$db = App::getDatabase('etudiants');

if(!empty($_POST) && !empty($_POST['email'])){
 
  if($auth->forget($db,$_POST['email'],Session::getInstance())){
    // $pdo->prepare('UPDATE ens SET reset_token = ?, reset_at = NOW() WHERE idEns = ?')->execute([$reset_token, $Ens_connect->idEns]);
    Session::getInstance()->setFlash('success',"les instruction du rappel de mot de passe vous ont été envoyées par email");
 
    $headers = "From: inforinfopro@gmail.com";
    $headers .= "\r\nReply-To: inforinfopro@gmail.com";
    $headers .= "\r\nX-Mailer: PHP/".phpversion();

mail($_POST['email'],'Reinitialisation de votre mot de passe',"Afin reinitialiser votre mot de passe  merci de cliquer sur ce lien\n\nhttp://localhost/NEW/offic/reset.php?id={$Ens_connect->idEtu}&token=$reset_token",$headers);

  
    App::redirect('login.php');
  }else{
        $_SESSION['flash']['danger'] = 'aucun compte ne correspant a cette adresse';
    }
}

?>


  </div>
  
<script src="js/bootstrap.min.js"></script>
<script>

</script>