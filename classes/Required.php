<?php
namespace App\classes;
require_once 'Validator.php';
use App\classes\Validator;

class Required implements Validator{
    public function check($key, $value){
        if(empty($value)){
            return "$key is required";
        }else{
            return false;
        }
    }
}