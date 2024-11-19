<?php

require_once 'inc/connection.php';
require_once 'classes/request.php';
require_once 'classes/session.php';
require_once 'classes/Validation.php';

use App\classes\Request;
use App\classes\Session;
use App\classes\Validation;

$request = new Request;
$session = new Session;
$validation = new Validation;
