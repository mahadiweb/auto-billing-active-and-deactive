<?php
$conn = mysqli_connect('localhost','root','','billing') or die();
$sql0 = "SELECT * FROM status";
$res0 = mysqli_query($conn,$sql0);
$row = mysqli_fetch_assoc($res0);
$start = $row['start_date'];
$end = strtotime($start . " + 30 days");
$today = strtotime("today midnight");
if($today >= $end){
			$query = "UPDATE status SET status='0' WHERE id='1'";
		    $res = mysqli_query($conn, $query);
		} else {
		    //echo "Active";
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
			<h2 class="text-center bg-danger my-3">PHP BILLING</h2>
		</div>

		<table class="table table-bordered mt-2">
			<tr class="thead-dark">
			<th>Id</th>
			<th>Name</th>
			<th>Er Baki</th>
			<th>Status</th>
			<th>Action</th>
			</tr>

				<?php
				$id = 1;
				$sql = "SELECT * FROM status";
				$res = mysqli_query($conn,$sql);
				while ($data = mysqli_fetch_assoc($res)) {
					?>
					<tr>
					<td><?php echo $id++ ?></td>
					<td><?php echo $data['name']; ?></td>
					<td><?php echo "11" ?></td>
					<td><?php if ($data['status'] == 1) {
						echo "Active";
					}else{ echo "Expire";} ?></td>
					<td><a href="pay.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Pay Now</a></td>
					</tr>
					<?php
				}
				?>
			
		</table>
	</div>
</body>
</html>