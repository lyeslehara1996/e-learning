<?php 


require_once 'inc/functions.php';


 $auth = new Auth();
 $auth->restricteEns(Session::getInstance());
 $db = App::getDatabase('elearning');
 $user_id = session::getInstance()->read('auth')->idEns;








?>

<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="css/menuEn.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/headerEn.css">


<style>
.titre {
    /* text-align: center; */
    margin-top: 70px;
    margin-left:20px;
}
.em{
    margin-top:30px;
}
.r1{
    margin-top:120px;
}
.btn-primary{
    margin-top: -40px;
    width:200px;
    height: 40px;
    margin-left: 214px; 
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
.user-photoo img{
    width:67px;
    height:67px;
    border-radius:50;
    margin-top:-40px;
    margin-left:60px;
    border-radius:100%;
}
.user-photo img{
    width:60px;
    height:60px;
    border-radius:50;
    margin-top:10px;
    margin-left:60px;
    border-radius:100%;

}
.message{
    background:#fbfbfb;
    width:550px;
    margin-top:50px;
    height:50px;
    border:2px solid #eee;
    border-radius:3px;
    resize:none;
    padding:10px;
    font-size:18px;
}
.chat-message{
    margin:5px 10px 0;
    margin-top:-30px;
    margin-left:140px;
    font-size:23px;

}
.cn{
    margin-top:-60px;
    box-shadow:0px 1px 3px   rgb(171, 166, 166);
    height:260px;
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
 .btn-info{
  
  font-size:18px;
    margin-left:0px;

    background-color:#34495e;
    width:130px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}

.tab{
  margin-top:120px;
}
 .btn-info:hover{
    background-color:#597189;
 }
 
 .btn-info:focus{
    background-color:#597189;
 }


  .btn-danger{
  
  font-size:18px;
    margin-left:20px;
  
    background-color:#597189;
    width:180px;
    height: 40px;
    border:0px;
    border-radius: 0px;
    
}


 .btn-danger:hover{
    background-color:#34495e;
 }
 
 .btn-danger:focus{
    background-color:#34495e;
 }
 @media only screen and (max-width:600px){
     .message{
         width:500px;
     }
     .btn-danger{
         margin-top:10px;
     }
     .show{
         max-height:1200px;
     }
 }

</style>

   <title>Document</title>
</head>
<body>
<div class=" container">
	<div class="row justify-content-center">
    <div class="col-lg-3"></div>
		<div class="col-12 col-md-8 col-lg-6 pb-5">

                    <!--Form with header-->
                
                   
                        <div class="card border-primary rounded-0">
                
                            <div class="chat-message">  <?php //echo $affiche->nomEns; echo " ";echo $affiche->prenomEns;?></div>  
                            </div>  
                            <div class="cn">
                            <p class="titre"> <strong>Message destiné à: </p></strong> <div class="user-photo">
                            <img 
                            src="img/no_photo_m.png"
                            
                                   alt="..." height="" width=" "> 
                           
                             
                             
             </div>
                                 
             <div class="chat-message"> ADMIN</div>    
   
                            <form action="" method="post" class="formulaire">
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div class="chat-form">
                                        <textarea name="message" class="message" placeholder="Entrez votre message ..." ></textarea>
                                         
                                       </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="envoyer" class="btn btn-info btn-block rounded-0 py-2" onclick="Envoyer(<?php echo $idEtudiant ?>);"/>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
                    <!--Form with header-->

                  
                </div>
	</div>
</div>


<script>

var  val1 = null;
      
     
      function Envoyer(valeur1){
          val1 = valeur1;
        }

$(document).ready(function(){
    
    $('.formulaire').submit(function(){
       
       var message = $('.message').val();

       $.post('envoiEns.php',{toA:0,messagesA:message},function(donnees){
      
            $('.nom').val('');
            $('.message').val('');
           
       });
       return false;
    });


});

</script>
</body>
</html>