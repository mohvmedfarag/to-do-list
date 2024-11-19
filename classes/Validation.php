<?php
namespace App\classes;

require_once 'Required.php';
require_once 'Str.php';



class Validation{
    private $errors;

    public function endValidate($key, $value, $options){

        foreach($options as $option){

            $option = "App\classes\\" . $option;
            $obj = new $option;
            $result =  $obj->check($key, $value);

            if ($result != false){
                $this->errors[] = $result;
            }
        }
    }
    
    public function getErrors(){
        return $this->errors;
    }
}
