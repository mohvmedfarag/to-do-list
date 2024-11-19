<?php
require_once '../App.php';

// check submit and id
if($request->check($request->get('id'))){

    // catch
    $id = $request->get('id');
    

    // validation
    
    

    // validation -> true -> select one -> founded -> updated
    
        $runQuery = $conn->prepare("SELECT * FROM todo WHERE id = :id");
        $runQuery->bindParam(':id', $id, PDO::PARAM_INT);
        $runQuery->execute();
        if ($runQuery->rowCount() == 1){
            
            $runQuery = $conn->prepare("delete from todo WHERE id = :id");
            $runQuery->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $runQuery->execute();
            if ($result) {
                $session->set('success', 'todo deleting successfully');
                $request->redirect("../index.php");
            } else {
                $session->set('errors', ['error while deleting']);
                $request->redirect("../index.php");
            }
            
        } else {
            $session->set('errors', ['todo not found']);
            $request->redirect("../index.php");
        }
        
    

}else{
    $request->redirect("../index.php");
}