<?php

 class Str{

   static function random($legth){
        $alphabet ="0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $legth)), 0,60);
      
       }
      
     
 }