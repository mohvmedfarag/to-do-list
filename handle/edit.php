<?php
require_once '../App.php';

// check submit and id
if($request->check($request->post('submit')) && $request->check($request->get('id'))){

    // catch
    $id = $request->get('id');
    $title = $request->filter($request->post('title'));

    // validation
    $validation->endValidate("title", $title, ['Required', 'Str']);
    $errors = $validation->getErrors();

    // validation -> true -> select one -> founded -> updated
    if(empty($errors)){
        $runQuery = $conn->prepare("SELECT * FROM todo WHERE id = :id");
        $runQuery->bindParam(':id', $id, PDO::PARAM_INT);
        $runQuery->execute();
        if ($runQuery->rowCount() == 1){
            $runQuery = $conn->prepare("update todo SET title = :title WHERE id = :id");
            $runQuery->bindParam(':title', $title, PDO::PARAM_STR);
            $runQuery->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $runQuery->execute();
            if ($result) {
                $session->set('success', 'todo updated successfully');
                $request->redirect("../index.php");
            } else {
                $session->set('errors', ['error while updating']);
                $request->redirect("../edit.php?id=".$id);
            }
            
        } else {
            $session->set('errors', ['todo not found']);
            $request->redirect("../index.php");
        }
        
    }else{
        // false msg errors
        $session->set('errors', $errors);
        $request->redirect("../edit.php?id=".$id);
    }

}else{
    $request->redirect("../index.php");
}