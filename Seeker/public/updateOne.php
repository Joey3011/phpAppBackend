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
    $sql = 'UPDATE ts_sub_one SET 
    main_sub_one = "'.$sub1.'",
    sub_one1 = "'.$ts1.'",
    sub_two1 = "'.$ts2.'",
    sub_three1 = "'.$ts3.'",
    sub_four1 = "'.$ts4.'",
    sub_five1 = "'.$ts5.'",
    sub_six1 = "'.$ts6.'",
    sub_seven1 = "'.$ts7.'"
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