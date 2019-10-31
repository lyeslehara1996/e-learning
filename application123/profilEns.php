
<?php 

require 'inc/functions.php';
// $auth = new Auth();
// $auth->restricteEns(Session::getInstance());


?>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/headerP.css">
<link rel="stylesheet" href="css/menu.css">
<script src="js/jquery-3.2.1.min.js"></script>

<style>
.btn-danger{
    font-size:20px;
    margin-left:450px;
    
}

</style>


   <div class="rows navbar-fixed-top">
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
          
          <li><a href="profilEns.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li> 
          <li><a href=""><span class="glyphicon glyphicon-briefcase"></span> Formation </a>
       <ul class="sub-nav">
       <li role="presentation"><a href="mesCours.php" role="menuitem">Mes cours</a></li>
            <li role="presentation"><a href="mesEtudiants.php" role="menuitem">Mes etudiant</a></li>
       </ul>
       
       </li>
          
    <li> <a  href="logout.php" class="col"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>

  
  
                  </ul>

         
        
        </div> </div>
    
    </div>

              <script type="text/javascript"> 
                  $(".btnn").on("click",function(){
                      $(".menu").toggleClass("show")
                  })
              
                  </script>
  



<link rel="stylesheet" href="css1.css">

<link rel="stylesheet" href="css/bootstrap.min.css"/>

<script src="js/jquery-3.3.1.min.js"></script>

<head>
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
    height:520px;
    box-shadow:1px 2px 5px   rgb(171, 166, 166););
    transition:all 0.3s ease-in;
    -webkit-transition: all 0.3s ease-in;
    -moz-transition: all 0.3s ease-in;

}
.lien{
    margin-top:60px;
}


#team{
    margin-top: 185px;
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
         height:120px;
    }
   
}


  
</style>
</head>

<body>

    <section id="team">
        <div class="container my-3 py-5 text-center">
    <div class="row ">

        
    <div class="col-lg-3"> </div>
    <div class="col-lg-6">
    <div class="card">
    <div class="card-body">
          
           
    <img 
                           <?php
                           if (Session::getInstance()->read('auth')->photoEns== "photos/" ){ ?>
                          src="img/no_photo_m.png"<?php }else {?>
                            src="<?= Session::getInstance()->read('auth')->photoEns ?>" 
                            <?php }?>
                             alt="..." height="" width=" ">
                             
                


<h1><strong> <?= Session::getInstance()->read('auth')->nomEns ?> <?= Session::getInstance()->read('auth')->prenomEns ?> ( <span> <?= Session::getInstance()->read('auth')->pseudoEns ?> </span>)
</strong>
                        </h1>
<div class="row">
<h3><div class="col-lg-5"><strong> Adresse:</strong></div> <div class="col-lg-4"><?= Session::getInstance()->read('auth')->adresseEns ?></div> </h3>
</div>
<div class="row">
<h3><div class="pa col-lg-5"><strong>Email:</strong></div> <div class="col-lg-6"><?= Session::getInstance()->read('auth')->emailEns ?></div> </h3>
</div>
<div class="row">
<h3><div class="da col-lg-4"><strong>Date de naissance:</strong></div> <div class="col-lg-3"><?= Session::getInstance()->read('auth')->date_NEns ?></div> </h3>
</div>
<div class="row">
<h3><div class="cl col-lg-5"><strong>Domaine:</strong></div> <div class="in col-lg-6"><?= Session::getInstance()->read('auth')->domainesEns ?></div> </h3>
</div>


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
            <h4 class="modal-title">changer le mot de passe :</h4>   
                     
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body row">
            <form class="coll" action="compte.php">
         
            <div class="form-group">
                  <label for="pseudomail">mot de passe</label>
                  <input type="email" id="username"  name="password" class="form-control" placeholder="test@gmail.com">
            </div> 
            <div class="form-group">
                  <label for="pseudomail"> nouveu mot de passe</label>
                  <input type="email" id="username"  name="newpassword" class="form-control" placeholder="test@gmail.com">
            </div> 
              <button type="submit" class="btn btn-danger">Envoyer</button>  
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
 <div class="col-lg-6"></div>
 <div class="lien col-lg-4"> <a href="editProfilEns.php" class="lien" > modifier le profil</a></div>

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
?>
  </div>
  
<script src="js/bootstrap.min.js"></script>
<script>

</script>

  
  
  