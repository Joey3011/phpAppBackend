<?php
require __DIR__ . '/../../src/bootstrap.php';
?>
<?php
$output = '';
$query = "Select * From ts_sub_one";
$result = mysqli_query($connection, $query);
$output.='
<table class="table table-bordered table-stripe">
<thead>
<th style="font-size: 11px; color: #000; width: 2%;"><p>ID</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>Sub ID</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>Sub one</p></th>
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
    <td style="font-size: 10px; color: #000;">'. $issue['id'] .'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_id'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['main_sub_one'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_one1'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_two1'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_three1'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_four1'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_five1'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_six1'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_seven1'].'</td>
    <td style="font-size: 10px; color: #000;"><button class="btn btn-danger btn-sm del_one" data-id="'. $issue['id'] .'" id="del_one" style="width:100%; font-size: 9px;">Delete</button>

    <button class="btn btn-success btn-sm update_One" data-id="'. $issue['id'] .'" 
    data-subid="'. $issue['sub_id'].'" 
    data-sub1="'. $issue['main_sub_one'].'" 
    data-ts1="'. $issue['sub_one1'].'"
    data-ts2="'. $issue['sub_two1'].'"
    data-ts3="'. $issue['sub_three1'].'"
    data-ts4="'. $issue['sub_four1'].'"
    data-ts5="'. $issue['sub_five1'].'" 
    data-ts6="'. $issue['sub_six1'].'"
    data-ts7="'. $issue['sub_seven1'].'" 
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

