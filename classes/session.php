<?php
namespace App\classes;
class Session{
    // start
    public function __construct()
    {
        session_start();
    }
    // set
    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }
    // get
    public static function get($key){
        if(isset($_SESSION[$key])){

            return (isset($_SESSION[$key])) ? $_SESSION[$key] : "key not found";
        }
    }

    // unset
    public function remove($key){
        unset($_SESSION[$key]);
    }
    // destroy
    public function destroy(){
        session_destroy();
    }
}