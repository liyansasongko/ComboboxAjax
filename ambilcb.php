<?php  

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_hp";

$connect = new mysqli($host, $user, $pass, $db);

$var_id=$_GET['idmerk'];
$sql2=mysqli_query($connect, "select * from type where merk_id='".$var_id."'");
while ($data2=mysqli_fetch_array($sql2)) {
	echo '<option value="">'.$data2['name_type'].'</option>';
}
?>
