<?php
require_once 'inc/header.php';
require_once 'App.php';
?>

<?php
    if($request->get('id')){
        $id = $request->get('id');
        $runQuery = $conn->prepare("select * from todo WHERE id = :id");
        $runQuery->bindParam(':id',$id, PDO::PARAM_INT);
        $runQuery->execute();
        if ($runQuery->rowCount() ==1) {
            $todo = $runQuery->fetch(PDO::PARAM_STR);
        } else {
            $session->set('errors',['todo not found']);
            $request->redirect("index.php");
        }
        
    }else{
        $request->redirect("index.php");
    }
?>

<body class="container w-50 mt-5">
<?php 
        require_once 'inc/success.php';
        require_once 'inc/errors.php';
        ?>
    <form action="handle/edit.php?id=<?= $todo['id'] ?>" method="post">
            <textarea type="text" class="form-control"  name="title" id="" placeholder="enter your note here"><?= $todo['title'] ?></textarea>
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Update</button>
            </div>  
    </form>
    
</body>
</html>