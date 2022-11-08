<?php
require __DIR__ . '/../src/bootstrap.php';
?>
<?php
    $id = $_POST['id'];
    $subid = $_POST['subid'];
    $issue = $_POST['issue'];
    $intro = $_POST['intro'];
try{
    $sql = 'UPDATE ts_issue SET 
    sub_id = "'.$subid.'", 
    issue = "'.$issue.'",
    intro = "'.$intro.'"
    WHERE id = :id';
    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_STR);
    $result =  $statement->execute();
           if($result){
            echo json_encode(array("statusCode"=>200));
        }
    }catch(PDOException $e)  {
            echo $e;
    } 
?>