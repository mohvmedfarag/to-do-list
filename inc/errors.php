<?php

if($session->get('errors')){ 
    foreach($session->get('errors') as $error){

        ?>

<div class="alert alert-danger"><?= $error ?></div>
<?php
}
}
$session->remove('errors');
