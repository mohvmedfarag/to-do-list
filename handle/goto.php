<?php
require_once '../App.php';

// check submit and id
if($request->check($request->get('id')) && $request->check($request->get('status'))){

    // catch
    $id = $request->get('id');
    $status =$request->get('status');

    // validation
    

    // select one -> founded -> updated
    
        $runQuery = $conn->prepare("SELECT * FROM todo WHERE id = :id");
        $runQuery->bindParam(':id', $id, PDO::PARAM_INT);
        $runQuery->execute();

        if ($runQuery->rowCount() == 1){
            $runQuery = $conn->prepare("update todo SET status = :status WHERE id = :id");
            $runQuery->bindParam(':status', $status, PDO::PARAM_STR);
            $runQuery->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $runQuery->execute();
            
            if ($result) {
                $session->set('success', 'todo updated successfully');
                $request->redirect("../index.php");
            } else {
                $session->set('errors', ['error while updating']);
                $request->redirect("../index.php");
            }
            
        } else {
            $session->set('errors', ['todo not found']);
            $request->redirect("../index.php");
        }
        
    

}else{
    $request->redirect("../index.php");
}