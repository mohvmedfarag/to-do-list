<?php

require_once '../inc/connection.php';
require_once '../App.php';

// check
if($request->check($request->post('submit'))){
    // catch
    $title =$request->filter($request->post('title'));

    // validation (Required , String)
    $validation->endValidate("title",$title, ['Required', 'Str']);
    $errors = $validation->getErrors();
    if(empty($errors)){
        $runQuery = $conn->prepare("INSERT INTO todo (`title`) VALUES (:title)");
        $runQuery->bindParam(':title',$title, PDO::PARAM_STR);
        $result = $runQuery->execute();
        if ($result) {
            $session->set("success", "todo inserted successfully");
            $request->redirect("../index.php");
        } else {
            $session->set("errors", ["error while inserting"]);
            $request->redirect("../index.php");
        }
        
    }else{
        $session->set("errors", $errors);
        $request->redirect("../index.php");
    }
}else{
    $request->redirect('../index.php');
}

