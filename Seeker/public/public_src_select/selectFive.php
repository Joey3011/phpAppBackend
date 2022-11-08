<?php
require __DIR__ . '/../../src/bootstrap.php';
?>
<?php
if(isset($_POST['input'])) {
    $input = $_POST['input'];
$output = '';
$query = "SELECT * FROM ts_sub_five WHERE sub_id LIKE '%{$input}%'";
$result = mysqli_query($connection, $query);
$output.='
<table class="table table-bordered table-stripe">
<thead>
<th style="font-size: 11px; color: #000; width: 2%;"><p>ID</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>Sub ID</p></th>
<th style="font-size: 11px; color: #000; width: 10.55%;"><p>Sub five</p></th>
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
    <td style="font-size: 10px; color: #000;">'. $issue['main_sub_five'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_one5'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_two5'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_three5'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_four5'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_five5'].' </td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_six5'].'</td>
    <td style="font-size: 10px; color: #000;">'. $issue['sub_seven5'].' </td>
    <td style="font-size: 10px; color: #000;"><button class="btn btn-danger btn-sm del_five" data-id="'. $issue['id'] .'" id="del_five" style="width:100%; font-size: 9px;">Delete</button>

    <button class="btn btn-success btn-sm update_Five" data-id="'. $issue['id'] .'" 
    data-subid="'. $issue['sub_id'].'" 
    data-sub1="'. $issue['main_sub_five'].'" 
    data-ts1="'. $issue['sub_one5'].'"
    data-ts2="'. $issue['sub_two5'].'"
    data-ts3="'. $issue['sub_three5'].'"
    data-ts4="'. $issue['sub_four5'].'"
    data-ts5="'. $issue['sub_five5'].'" 
    data-ts6="'. $issue['sub_six5'].'"
    data-ts7="'. $issue['sub_seven5'].'" 
    style="width:100%; font-size: 9px;">Edit</button></td>
    </tr>
';
}
}else{
    $output.='<tbody><tr>
    <td colspan="11" style="font-size: 10px; color: red;">No Record</td>
    </tbody></tr>
    '; 
}
$output.='
</table>
';
echo $output;
}
?>

