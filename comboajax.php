<?php  

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_hp";

$connect = new mysqli($host, $user, $pass, $db);

?>
<!DOCTYPE html>
<html>
<head>
	<title>ComboBox AJAX</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<h1>Combobox AJAX</h1>
		<div class="col-md-6 col-sm-6">
			<div class="form-group">
				<label>Merk</label>
				<select name="combob1" id="combo1" class="form-control">
					<?php  
					$sql1=mysqli_query($connect, "select * From merk");
					while ($data1=mysqli_fetch_array($sql1)) {
						echo'<option value="'.$data1['merk_id'].'">'.$data1['name_merk'].'</option>';
					}
					?>
				</select>
			</div>
		</div>
		<div class="col-md-6 col-sm-6">
			<div class="form-group">
				<label>Tipe</label>
				<select name="combob2" id="combo2" class="form-control">
					<option>---</option>
				</select>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-2.2.3.min.js"></script>
<!-- Javascript AJAX -->
<script type="text/javascript">
	var htmlobjek;
	$(document).ready(function(){
	  //apabila terjadi event onchange terhadap object <select id=propinsi>
	  $("#combo1").change(function(){
	    var idmerk = $("#combo1").val();
	    $.ajax({
	        url: "ambilcb.php",
	        data: "idmerk="+idmerk,
	        cache: false,
	        success: function(msg){
	            //jika data sukses diambil dari server kita tampilkan
	            //di <select id=kota>
	            $("#combo2").html(msg);
	        }
	    });
	  });
	});

</script>
</body>
</html>