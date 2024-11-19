<?php
namespace App\classes;
require_once 'Validator.php';
use App\classes\Validator;

class Str implements Validator{
    public function check($key, $value){
        if(is_numeric($value)){
            return "$key must be string";
        }else{
            return false;
        }
    }
}