<?php 
      require_once 'inc/bootstrap.php';
      $db = App::getDatabase('elearning');
      $auth = new Auth();
 ?>

 <?php 
 // on vas controler le login d'acceuil
 if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    
  if($auth->login($db,$_POST['username'],$_POST['password'],Session::getInstance())){
   App::redirect('compte.php');
  }else
     Session::getInstance()->setFlash('danger','Identifiant ou mot de passe incorrecte');
   }

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
<!-- <link rel="stylesheet" href="css/css1.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    
    <title>Elearning</title> 
  </head>
<style>
    .sa{
    margin-top:
      25px;
      background: #E2472F;
    color:#fff;
    border-radius: 6px;
   font-size:18px;
  
  }
   .form-control{
border:15px;
border-radius: 100px;
height: 45px;
font-size: 18px;


   }
*{
    font-family:Century Gothic;
    margin: 0;
    padding: 0;
    
}


h1{
    font-size: 50x;
    color:black;
    margin-top: 20px;

}
.rows{

    background:#34495e;
     height:80px;  
    
    }
.logo{
    margin:22px 50px;
    height: 85px;
    margin-top: 8px;

}


/* .form-control{
border:15px;
border-radius: 100px;
height: 45px;
font-size: 18px;


} */
ul li{
    display: inline-block;
    margin: 10px 5px;
}
li a{
    text-decoration: none;
    font-size: 15px;
}
ul li a{
    text-decoration: none;
    padding: 10px 30px;
    letter-spacing: 3px;
    color:#fdfdfd;
    border-bottom: 1px solid white;
    transition:0.3s;

}
.btnn span{
    display:block;
    margin:6px;
    width:40px;
    height:3px;
    background: white;

}

.btnn{
    display:none;
    position: absolute;
    right:20px;
}
.btnn:hover >span{
background: rgb(199, 74, 74);
}
p{
    font-size: 19px;
    color:white;
    margin-top: 90px;
}
.menu{ 
    position: absolute;
    right:100px;
    display: inline-block;
} 

ul li{
    display: inline-block;
    margin: 10px 5px;
}

.s{

    background:white;

    top:60%;
    transform: translate(-50%, -50%);
    width:400px;
    height:350px;
    position:absolute;
   
    left:50%;
    transform: translate(-50%, -50%);
}


        .navbar-nav li a:hover{
            background:rgb(199, 74, 74);
           color:white; 
        
        }
        p{
            color:black;
        }
        @media only screen and (max-width:1300px){
            .navbar{
                overflow: visible;
              
            }
           
            .menu{
                width:100%;
                right:0;
                top:10%;
                background:#34495e;
                overflow: hidden;
                max-height: 0;
            }
            
        ul li a{
                display: flex;
                text-align:center;
                /* padding: 10px; */
                margin:0;
        
            }
             
            .btnn{
                display:block;
                cursor:pointer;
                margin-top: 20px;
        
            }
            .show{
margin-top:-34px;
                max-height: 500px;
       
              
            }
        }
</style>

  <body>

        <div class="rows">
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
              
                <?php if(isset($_SESSION['auth'])):?>
             <li><a href="acceuil.php"><span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
           
           <li><a href="formation.php"><span class="glyphicon glyphicon-briefcase"></span> Formation </a></li>
              <li><a href="compte.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li> 
    <li> <a  href="logout.php" class="col"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>


<!--<input type="submit" class=" sa btn btn-info"value=" Se déconnecter" ></a>-->
       
           <?php else: ?>  
         <li><a href="acceuil.php"><span class="glyphicon
            glyphicon-home"></span> Accueil </a> </li>
            <li><a href="module.php" ><span class="glyphicon glyphicon-book"></span> Modules</a></li>
                <li><a href="#" ><span class="glyphicon glyphicon-globe"></span> A propos</a></li>
                <li><a href="#" ><span class="glyphicon glyphicon-envelope"></span> Contacter nous</a></li>
       
             
            
    <?php endif;?>
          </ul>
          </div> </div>
         
        </nav>
      </div>

                <script type="text/javascript"> 
                    $(".btnn").on("click",function(){
                        $(".menu").toggleClass("show")
                    })
                    </script>

    <div class="container">

     
  </body>
</html>
<?php if(isset($_SESSION['flash'])):?>
   <?php foreach($_SESSION['flash'] as $type=>$message):?>
      <div class="alert alert-<?= $type; ?>">
      <?= $message; ?>
      </div>

   <?php endforeach; ?>
   <?php unset($_SESSION['flash']); ?>
<?php endif; ?>    
