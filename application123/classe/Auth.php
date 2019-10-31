<?php

    class Auth{

        

        public function __construct(){
        
        }
               
        public function confirm($db,$user_id,$token,$table,$id,$session){
            $user= $db->query("SELECT * FROM $table WHERE $id =?",[$user_id])->fetch();
            if($user && $user->confirmation_token == $token){
                
                $db->query("UPDATE $table SET confirmation_token= null, confirmed_at= NOW() WHERE $id = ?",[$user_id]);
                   if($id == 'idEns'){
                       $session->write('auth',$user);
                   }
                   if($id == 'idEtu'){
                    $session->write('etud',$user);
                   }


                    return true; 
                
            }else{
            return false;
        }           
            }
        

        public function restricteEns($session){
            if(!$session->read('auth')){
                $session->setFlash('danger', 'Vous n avez pas le droit d acceder');
                header('Location:login.php');
                exit();
            }

        }
        public function restricteEtu($session){
            if(!$session->read('etud')){
                $session->setFlash('danger', 'Vous n avez pas le droit d acceder');
                header('Location:login.php');
                exit();
            }

        }

        public function login($db,$username,$password,$session){
            $user = $db->query("SELECT * FROM enseignants WHERE (pseudoEns = :username OR emailEns = :username) AND confirmed_at IS NOT NULL",['username' => $username])->fetch();
            if($user == null){
                return false;
                  }elseif(password_verify($password, $user->passwordEns)){
                    $session->write('auth',$user);
                 
                    return true;

                  }else{
                      return false;
                  }

        }
        public function loginEtu($db,$username,$password,$session){
            $user = $db->query("SELECT * FROM etudiants WHERE (pseudoEtu = :username OR emailEtu = :username) AND confirmed_at IS NOT NULL",['username' => $username])->fetch();
            if($user == null){
                return false;
                  }elseif(password_verify($password, $user->passwordEtu)){
                    $session->write('etud',$user);
               
                    return true;

                  }else{
                      return false;
                  }

        }

        public function forget($db,$email,$session){
            $user = $db->query('SELECT * FROM enseignants WHERE ( emailEns = :email) AND confirmed_at IS NOT NULL',['email' => $_POST['emailEn']])->fetch();
            if($user){
                $reset_token = Str::random(60);
                $db->query('UPDATE enseignants set reset_token= ?, reset_at= NOW() WHERE idEns = ?',[$reset_token,$user->idEns]);
                $headers = "From: Sendmail Tests" . PHP_EOL;
                $headers .= 'Content-type: text/html; charset=utf-8' . PHP_EOL;
                mail($email,'Réinitialisation de votre mot de passe',"Afin réinitialiser votre mot de passe merci de cliquer sur ce lien\n\nhttp://localhost/application/reset.php?idEn={$user->idEns}&tokenEn=$reset_token",$headers); 
                return true;
            }else{
                return false;
            }
        }
        public function forgetEt($db,$email,$session){
            $user = $db->query('SELECT * FROM etudiants WHERE ( emailEtu = :email) AND confirmed_at IS NOT NULL',['email' =>$_POST['emailEt']])->fetch();
            if($user){
                $reset_token = Str::random(60);
                $db->query('UPDATE etudiants set reset_token= ?, reset_at= NOW() WHERE idEtu = ?',[$reset_token,$user->idEtu]);
                $headers = "From: Sendmail Tests" . PHP_EOL;
                $headers .= 'Content-type: text/html; charset=utf-8' . PHP_EOL;
                mail($email,'Réinitialisation de votre mot de passe',"Afin réinitialiser votre mot de passe merci de cliquer sur ce lien\n\nhttp://localhost/application/reset.php?idEt={$user->idEtu}&tokenEt=$reset_token",$headers); 
                return true;
            }else{
                return false;
            }
        }

        public function userReset($db,$user_id,$token,$password,$session){

            $user = $db->query('SELECT * FROM enseignants WHERE idEns = ? AND reset_token IS NOT NULL  AND reset_token= ? AND  reset_at < DATE_SUB(NOW(), INTERVAL 30 MINUTE)',[$user_id,$token])->fetch();
              var_dump($user);
                if($user){       
                    $password_Ens = password_hash($password, PASSWORD_BCRYPT);
                    $db->query('UPDATE enseignants SET passwordEns =?, reset_at= null, reset_token = null',[$password_Ens]);
                    $session->write('auth',$user);
                     return true;
                     }else{
                        
                         return false;
                }
    
        }
        public function userResetEt($db,$user_id,$token,$password,$session){

            $user = $db->query('SELECT * FROM etudiants WHERE idEtu = ? AND reset_token IS NOT NULL  AND reset_token= ? AND  reset_at < DATE_SUB(NOW(), INTERVAL 30 MINUTE)',[$user_id,$token])->fetch();
              var_dump($user);
                if($user){       
                    $password_Ens = password_hash($password, PASSWORD_BCRYPT);
                    $db->query('UPDATE etudiants SET passwordEtu =?, reset_at= null, reset_token = null',[$password_Ens]);
                    $session->write('etud',$user);
                     return true;
                     }else{
                        
                         return false;
                }
    
        }
        public function changePassword($db,$password,$newpassword,$session){
            //$user = $db->query("SELECT * FROM enseignants WHERE (pseudoEns = :username OR emailEns = :username) AND confirmed_at IS NOT NULL",['username' => $username])->fetch();
           
           // if(password_verify($password, $user->passwordEtu)){
                
            //    $session->write('etud',$user);
        }
        
        
        

        
    }