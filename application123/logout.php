<?php


require_once 'inc/bootstrap.php';


 if(Session::getInstance()->hasSession('auth')){
     Session::getInstance()->logout('auth');

 }elseif(Session::getInstance()->hasSession('etud')){
     Session::getInstance()->logout('etud');
 }

App::redirect('acceuil.php');