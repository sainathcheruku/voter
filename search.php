<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<title>search</title>
</head>
<body>
	<div class="container data">
		<div class="search-data">
			<form action="" method="POST">
			    <input type="text" name="search" placeholder="Search for your voter-id">
			    <input type="submit" name="submit">
			</form>
		</div>
		<div class="table-data">
			<table>
				<tr>
					<th>Full name</th>
					<th>Father's name</th>
					<th>Gender</th>
					<th>State</th>
					<th>District</th>
					<th>Village</th>
					<th>Photo</th>
				</tr><br>
				<?php
				    $connection = mysqli_connect("localhost","root","");
                    $db = mysqli_select_db($connection,"voterportal");

                    if(isset($_POST['submit']))
                    {
                    	$fullname = $_POST['search'];

                    	$query = "SELECT * FROM `voterdata` where fullname= '$fullname'";
                    	$query_run = mysqli_query($connection,$query);

                    	while($row = mysqli_fetch_array($query_run)){
                    		?>
                             <tr>
                             	<td><?php echo $row['fullname'] ?></td>
                             	<td><?php echo $row['fathername'] ?></td>
                             	<td><?php echo $row['gender'] ?></td>
                             	<td><?php echo $row['state'] ?></td>
                             	<td><?php echo $row['district'] ?></td>
                             	<td><?php echo $row['village'] ?></td>
                             	<td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width:100px; height:100px;" >'; ?></td>

                             </tr>
                    		<?php
                    	}
                    }
				?>
			</table>
		</div>
	</div>
</body>
</html>