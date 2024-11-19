<?php
namespace App\classes;

interface Validator{
    public function check($key, $value);
}