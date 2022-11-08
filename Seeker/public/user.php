<?php
require __DIR__ . '/../config/database.php';
?>
<?php
$output = '';
$sql = "Select * From users ORDER BY id DESC";
$result = mysqli_query($connection, $sql);
$output.='
<table class="table table-bordered table-stripe">
<thead>
    <th style="font-size: 12px; color: #000;"><p>ID</p></th>
    <th style="font-size: 12px; color: #000;"><p>Email</p></th>
    <th style="font-size: 12px; color: #000;"><p>Username</p></th>
    <th style="font-size: 12px; color: #000;"><p>Status</p></th>
</thead>
';
if(mysqli_num_rows($result) > 0){
    while($issue = mysqli_fetch_array($result)){
    $output.='
    <tbody>
    <tr>
    <td style="font-size: 11px; color: #000;">'. $issue['id'] .'</td>
    <td style="font-size: 11px; color: #000;">'. $issue['email'].'</td>
    <td style="font-size: 11px; color: #000;">'. $issue['username'].'</td>
    <td style="font-size: 11px; color: #000;">'. $issue['active'].'</td>
    </tr>
';
}
}else{
    $output.='<tbody><tr>
    <td colspan="4">No Record</td>
    </tbody></tr>
    ';   
}
$output.='
</table>
';
echo $output;
?>

