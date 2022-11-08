<?php
require __DIR__ . '/../src/bootstrap.php';
?>
<?php
    $id = $_POST['id'];
try{
    $sql = 'DELETE FROM ts_issue 
    WHERE id = :id';
    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $id);
        $result =  $statement->execute();
        if($result){
            echo json_encode(array("statusCode"=>200));
        }
    }catch(PDOException $e)  {
        if(str_contains($e, '1451 Cannot delete or update a parent row')){
            echo json_encode(array("statusCode"=>201));
        }
    } 
?>