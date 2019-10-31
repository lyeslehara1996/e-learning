<?php

class App{

    static $db = null;
    static $db2 = null;
    static $db3 = null;

    static function getDatabase($table){
        if(!self::$db){
            self::$db = new DataBase('root','',$table);
        }

        return self::$db;
    }
   /* static function getD(){
        if(!self::$db){
            self::$db = new DataBase('root','','elearning');
        }
    }
    static function getDatabaseEtu($table){
        if(!self::$db2){
            self::$db2 = new DataBase('root','',$table);
        }

        return self::$db2;
    }
    static function getDatabaseSpe($table){
        if(!self::$db3){
            self::$db3 = new DataBase('root','',$table);
        }

        return self::$db3;
    }
    */

    static function redirect($page){
        header("location: $page"); 
        exit();
    }
    


}