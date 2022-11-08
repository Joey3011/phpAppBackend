<?php
require __DIR__ . '/../../src/bootstrap.php';
?>
<?php
$output = '';
$query = "Select * From ts_sub_three";
$result = mysqli_query($connection, $query);
$output.='
<table class="table table-bordered table-stripe">
<thead>
<th style="font-size: 11px; color: #000; width: 2%;"><p>ID</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>Sub ID</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>Sub three</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>ts one</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>ts two</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>ts three</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>ts four</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>ts five</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>ts six</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>ts seven</p></th>
<th style="font-size: 11px; color: #000;" width: 3%;><p>Action</p></th>
</thead>
';
if(mysqli_num_rows($result) > 0){
    while($issue = mysqli_fetch_array($result)){
    $output.='
    <tbody>
    <tr>
    <td style="font-size: 10px; color: #000;">'. $issue['id'] .'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_id'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['main_sub_three'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_one3'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_two3'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_three3'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_four3'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_five3'].' </td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_six3'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_seven3'].' </td>
    <td style="font-size: 10px; color: #000;"><button class="btn btn-danger btn-sm del_three" data-id="'. $issue['id'] .'" id="del_three" style="width:100%; font-size: 9px;">Delete</button>

    <button class="btn btn-success btn-sm update_Three" data-id="'. $issue['id'] .'" 
    data-subid="'. $issue['sub_id'].'" 
    data-sub1="'. $issue['main_sub_three'].'" 
    data-ts1="'. $issue['sub_one3'].'"
    data-ts2="'. $issue['sub_two3'].'"
    data-ts3="'. $issue['sub_three3'].'"
    data-ts4="'. $issue['sub_four3'].'"
    data-ts5="'. $issue['sub_five3'].'" 
    data-ts6="'. $issue['sub_six3'].'"
    data-ts7="'. $issue['sub_seven3'].'" 
    style="width:100%; font-size: 9px;">Edit</button></td>
    </tr>
';
}
}else{
    $output.='<tbody><tr>
    <td colspan="11" style="font-size: 15px; color: red;">No Record</td>
    </tbody></tr>
    ';   
}
$output.='
</table>
';
echo $output;
?>

