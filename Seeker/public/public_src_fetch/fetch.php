<?php
require __DIR__ . '/../../src/bootstrap.php';
?>
<?php
$output = '';
$query = "Select * From ts_issue";
$result = mysqli_query($connection, $query);
$output.='
<table class="table table-bordered table-stripe">
<thead>
    <th style="font-size: 12px; color: #000; width: 1%;"><p>ID</p></th>
        <th style="font-size: 12px; color: #000; width: 15%;"><p>Sub ID</p></th>
    <th style="font-size: 12px; color: #000; width: 49%;"><p>Main Issue</p></th>
    <th style="font-size: 12px; color: #000; width: 30%;"><p>Intro</p></th>
    <th style="font-size: 12px; color: #000;" width: 5%;><p>Action</p></th>
</thead>
';
if(mysqli_num_rows($result) > 0){
    while($issue = mysqli_fetch_array($result)){
    $output.='
    <tbody>
    <tr>
    <td style="font-size: 11px; color: #000;">'. $issue['id'] .'</td>
    <td style="font-size: 11px; color: #000;">'. $issue['sub_id'] .'</td>
    <td style="font-size: 11px; color: #000;">'. $issue['issue'].'</td>
    <td style="font-size: 11px; color: #000;">'. $issue['intro'].'</td>
    <td style="font-size: 11px; color: #000;"><button class="btn btn-danger btn-sm delete" data-id="'. $issue['id'] .'" id="delete" style="width:100%; font-size: 9px;">Delete</button>
    <button class="btn btn-success btn-sm updateMain" data-id="'. $issue['id'] .'" 
    data-subid="'. $issue['sub_id'].'" 
    data-issue="'. $issue['issue'].'" 
    data-intro="'. $issue['intro'].'" 
    style="width:100%; font-size: 9px;">Edit</button></td>
    </tr>
';
}
}else{
    $output.='<tbody><tr>
    <td colspan="5" style="font-size: 11px; color: red;">No Record</td>
    </tbody></tr>
    ';   
}
$output.='
</table>
';
echo $output;
?>

