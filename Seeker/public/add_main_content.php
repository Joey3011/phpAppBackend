<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php
    $id = $_POST['id'];
    $issue = $_POST['issue'];
    $intro = $_POST['intro'];
try{
    $sql = 'INSERT INTO ts_issue(sub_id, issue, intro)
    VALUES(:id, :issue, :intro)';
    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':issue', $issue);
    $statement->bindValue(':intro', $intro);
    $result = $statement->execute();
    if($result){
        echo json_encode(array("statusCode"=>200));
    }
}catch(PDOException $e)  {
    if(str_contains($e, '1062 Duplicate entry')){
        echo json_encode(array("statusCode"=>201));
    }
}  
    
?>