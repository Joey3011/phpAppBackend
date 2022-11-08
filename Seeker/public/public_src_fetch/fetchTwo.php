<?php
require __DIR__ . '/../../src/bootstrap.php';
?>
<?php
$output = '';
$query = "Select * From ts_sub_two";
$result = mysqli_query($connection, $query);
$output.='
<table class="table table-bordered table-stripe">
<thead>
<th style="font-size: 11px; color: #000; width: 2%;"><p>ID</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>Sub ID</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>Sub two</p></th>
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
    <td style="font-size: 10px; color: #000;">'. $issue['main_sub_two'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_one2'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_two2'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_three2'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_four2'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_five2'].' </td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_six2'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_seven2'].' </td>
    <td style="font-size: 10px; color: #000;"><button class="btn btn-danger btn-sm del_two" data-id="'. $issue['id'] .'" id="del_two" style="width:100%; font-size: 9px;">Delete</button>

    <button class="btn btn-success btn-sm update_Two" data-id="'. $issue['id'] .'" 
    data-subid="'. $issue['sub_id'].'" 
    data-sub1="'. $issue['main_sub_two'].'" 
    data-ts1="'. $issue['sub_one2'].'"
    data-ts2="'. $issue['sub_two2'].'"
    data-ts3="'. $issue['sub_three2'].'"
    data-ts4="'. $issue['sub_four2'].'"
    data-ts5="'. $issue['sub_five2'].'"
    data-ts6="'. $issue['sub_six2'].'"
    data-ts7="'. $issue['sub_seven2'].'"
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

