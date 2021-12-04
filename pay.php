<?php
$conn = mysqli_connect('localhost','root','','billing') or die();
$id = $_GET['id'];
$sql0 = "SELECT * FROM status WHERE id=$id";
$res0 = mysqli_query($conn,$sql0);
$row = mysqli_fetch_assoc($res0);
$today = date("01-m-20y");
if (isset($_POST['submit'])) {
	$id = $_GET['id'];
	$name = $_POST['name'];
	$price = $_POST['pack'];
	$sql3 = "INSERT INTO cash(name,taka,date) value('$name','$price','$today')";
	$res3 = mysqli_query($conn,$sql3);
	if($res3){
		    $query = "UPDATE status SET start_date='$today',status=1 WHERE id='$id'";

		    $res = mysqli_query($conn, $query);

		} else {
		    $msg = "Please pay now";

	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>OOP CRUD</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.min.css">
	<script src="bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="section p-3 bg-primary">
			<h2 class="text-center bg-danger my-3">Pay Bill</h2>
			<form action="" method="post" enctype="multipart/form-data">
				<label for="name">Name</label>
				<input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>">
				<label for="dropd">Pack</label>
				<select class="form-control" name="pack" id="pack">
					<option value="">Select package</option>
					<?php
					$sqldrop = "SELECT * FROM pack";
					$resdrop = mysqli_query($conn,$sqldrop);
					if (mysqli_num_rows($resdrop)>0) {
						while ($rowdrop = mysqli_fetch_assoc($resdrop)) {
							echo"<option value='".$rowdrop['price']."'>".$rowdrop['name']."</option>";
						}
					}
					?>
				</select>
				<label for="price">Price</label>
				<input class="form-control" type="number" name="price" id="price" value="" disabled="">
				<input class="form-control btn btn-success my-2" type="submit" name="submit">
			</form>
		</div>


	</div>
</body>
<script src="jquery-3.3.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#pack").change(function(){
			var value = $(this).val();
			$("#price").val(value);
		})
	})
</script>
</html>
