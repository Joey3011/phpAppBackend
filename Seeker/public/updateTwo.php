<?php
require __DIR__ . '/../src/bootstrap.php';
?>
<?php
    $id = $_POST['id'];
    $subid = $_POST['subid'];
    $sub1 = $_POST['sub1'];
    $ts1 = $_POST['ts1'];
    $ts2 = $_POST['ts2'];
    $ts3 = $_POST['ts3'];
    $ts4 = $_POST['ts4'];
    $ts5 = $_POST['ts5']; 
    $ts6 = $_POST['ts6'];
    $ts7 = $_POST['ts7']; 
try{
    $sql = 'UPDATE ts_sub_two SET 
    main_sub_two = "'.$sub1.'",
    sub_one2 = "'.$ts1.'",
    sub_two2 = "'.$ts2.'",
    sub_three2 = "'.$ts3.'",
    sub_four2 = "'.$ts4.'",
    sub_five2 = "'.$ts5.'",
    sub_six2 = "'.$ts6.'",
    sub_seven2 = "'.$ts7.'"
    WHERE id = :id';
    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $result =  $statement->execute();
        if($result){
            echo json_encode(array("statusCode"=>200));
        }
    }catch(PDOException $e)  {
            echo $e;
    } 
?>