<?php

class Validator{

    private $data;
    private $errors = [];

    public function __construct($data){
        $this->data = $data;
    }

    private function getField($field){
      
        if(!isset($this->data[$field])){
            return null;
        }
        return $this->data[$field];
    }
     public function isAlpha($field,$errorMsg,$errorObl){
        $value = $this->getField($field);
        if(empty($value)){
            $this->errors[$field] = $errorObl;
        }
        elseif(!preg_match('#^[a-zA-Z_]+$#',$this->getField($field))){
             $this->errors[$field] =$errorMsg;
          }
        
        }

    

     public function isUniq($field,$db,$id,$champ,$table,$errorMsg){
        $record = $db->query("SELECT $id FROM $table WHERE $champ= ?",[$this->getField($field)])->fetch();
          
        if($record){
            $this->errors[$field] =$errorMsg;
        }
     }
     public function isEmail($field,$errorMsg,$errorObl){
        $value = $this->getField($field);
        if(empty($value)){
            $this->errors[$field] = $errorObl;
        }elseif(!empty($value) && !filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)){
            $this->errors[$field] =$errorMsg;
        }
     }
     public function isConfirme($field,$errorMsg){
         $value = $this->getField($field);
        if( !empty($value) && $value != $this->getField($field .'_confirm')){
            $this->errors[$field] =$errorMsg;   
        }
     }

     public function isAdresse($field,$errorMsg,$errorObl){
        $value = $this->getField($field);
        if(empty($value)){
            $this->errors[$field] = $errorObl;
        }elseif(preg_match("^([0-9a-z'àâéèêôùûçÀÂÉÈÔÙÛÇ\s-]{1,50})$/^",$this->getField($field))){
            $this->errors[$field] =$errorMsg;
        }
     }
     public function isDate($field,$errorMsg){
        if(preg_match('#^([0-9]{2})/([0-9]{2})/([0-9]{4})$#',$this->getField($field))){
            $this->errors[$field] =$errorMsg; 
        }
     }
     public function isObligation($field,$errorObl){
        $value = $this->getField($field);
        if(empty($value)){
            $this->errors[$field] =$errorObl; 
        }
     }
     

     public function isPhoto($field,$errorMsg,$errorObl){
        $file_name = $this->getField($field)['name'];
        $file_extension = strrchr($file_name,'.');
        $file_tp_name =  $this->getField($field)['tmp_name'];
        $file_dest = 'photos/'.$file_name;
        

          $extention_autorisees = array('.png', '.PNG','.jpg','.JPG');
    
          if( $this->getField($field)['error']!= 0 || in_array($file_extension,$extention_autorisees)){ 
             if(!move_uploaded_file($file_tp_name,$file_dest)){
                $this->errors[$field] =$errorObl;
             }
      }else{
               $this->errors[$field] =$errorMsg; 
      }

     }
     public function isCour($field,$errorMsg,$errorObl){
        $file_name = $this->getField($field)['name'];
        $file_extension = strrchr($file_name,'.');
        $file_tp_name =  $this->getField($field)['tmp_name'];
        $file_dest = 'cours/'.$file_name;
        

          $extention_autorisees = array('.pdf', '.PDF','.doc','.Doc');
    
          if( $this->getField($field)['error']!= 0 || in_array($file_extension,$extention_autorisees)){ 
             if(!move_uploaded_file($file_tp_name,$file_dest)){
                $this->errors[$field] =$errorObl;
             }
      }else{
               $this->errors[$field] =$errorMsg; 
      }

     }


     public function isValide(){
         return empty($this->errors);
     }

     public function getErreur(){

         return $this->errors;
     }
}