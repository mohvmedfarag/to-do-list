<?php 
namespace App\classes;

class Request{
    public function get($key){
        return (isset($_GET[$key])) ? $_GET[$key] : null;
    }
    public function post($key){
        return (isset($_POST[$key])) ? $_POST[$key] : null;
    }
    public function check($data){
        return isset($data);
    }
    public function filter($key){
        return trim(htmlspecialchars($key));
    }
    public function checkMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }
    public function redirect($key){
        return header("Location: $key");
    }
}

































// namespace App\oop;
// class Request{
//     public function get($key){
//         return (isset($_GET[$key])) ? $_GET[$key] : null;
//     }
//     public function post($key){
//         return (isset($_POST[$key])) ? $_POST[$key] : null;
//     }
//     public function edit($key){
//         return trim(htmlspecialchars($key));
//     }
//     public function check($data){
//         return isset($data);
//     }
//     public function checkMethod(){
//         return $_SERVER['REQUEST_METHOD'];
//     }
// }
