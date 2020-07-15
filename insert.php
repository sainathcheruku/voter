<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<title>form</title>
    <style type="text/css">
        h1{
            font-weight: bolder;
            color: orange;
            text-align: center;
        }
        .form-entry{
            padding: 50px 25px;
            background-color: black;
        }
        .form-group label{
            color: white;
        }
        .form-control{
            color: orange;
            border-radius: 25px;
        }
        input[placeholder]{
            padding: 20px;.
            color: red;
        }
    </style>
</head>
<body>
    <div class="form-entry">
    <h1>Enter Your details</h1>
        
	<form action=" " method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="fullName">Full Name</label>
			<input type="text" name="fullName" placeholder="Enter your full name." class="form-control" required>
		</div>
		<div class="form-group">
			<label for="fatherName">Father's Name</label>
			<input type="text" name="fatherName" placeholder="Enter your father's name." class="form-control" required>
		</div>
		<div class="form-group">
			<label for="gender">Gender</label>
			<label class="radio-inline"><input type="radio" name="gender" value="m" checked>Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="f">Female</label>
		</div>
		

		<div class="form-group">
			<label for="state" >State</label>
                <select name="state" id="main_menu" class="custom-select" required>
                    <option value="">select</option>
                    <option name="AndhraPradesh">AndhraPradesh</option>
                    <option name="ArunachalPradesh">ArunachalPradesh</option>
                    <option name="Assam">Assam</option>
                    <option name="Bihar">Bihar</option>
                    <option name="Chandigarh">Chandigarh</option>
                    <option name="Chattisgarh">Chattisgarh</option>
                    <option name="DadraandNagarHaveli">DadraandNagarHaveli</option>
                    <option name="DamanandDiu">DamanandDiu</option>
                    <option name="Delhi">Delhi</option>
                    <option name="Goa">Goa</option>
                    <option name="Gujarat">Gujarat</option>
                    <option name="Haryana">Haryana</option>
                    <option name="HimachalPradesh">HimachalPradesh</option>
                    <option name="Jammuandkashmir">Jammuandkashmir</option>
                    <option name="Jharkand">Jharkand</option>
                    <option name="Karnataka">Karnataka</option>
                    <option name="Kerala">Kerala</option>
                    <option name="Lakshadweep">Lakshadweep</option>
                    <option name="MadhyaPradesh">MadhyaPradesh</option>
                    <option name="Maharashtra">Maharashtra</option>
                    <option name="Manipur">Manipur</option>
                    <option name="Meghalaya">Meghalaya</option>
                    <option name="Mizoram">Mizoram</option>
                    <option name="Nagaland">Nagaland</option>
                    <option name="Odisha">Odisha</option>
                    <option name="Puducherry">Puducherry</option>
                    <option name="Punjab">Punjab</option>
                    <option name="Rajasthan">Rajasthan</option>
                    <option name="Sikkim">Sikkim</option>
                    <option name="TamilNadu">TamilNadu</option>
                    <option name="Telangana">Telangana</option>
                    <option name="Tripura">Tripura</option>
                    <option name="Uttarakhand">Uttarakhand</option>
                    <option name="UttarPradesh">UttarPradesh</option>
                    <option name="WestBengal">WestBengal</option>
                </select>
			    <label for="district">District</label>
                    <select name="district" id="sub_menu" class="custom-select" required>  
                    </select>
        </div>
        <div class="form-group">
        	<label for="village">Village</label>
        	<input type="text" name="village" id="village" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image"> Upload Image</label>
            <input type="file" name="image" id="image">
        </div>
            
        <input type="submit" name="sub">
	</form>
    <script src="dynamic.js"></script>
	</div>
</body>
</html>




<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"voterportal");

if(isset($_POST['sub'])){
	$fullname = $_POST['fullName'];
	$fathername = $_POST['fatherName'];
	$gender = $_POST['gender'];
	$state = $_POST['state'];
	$district = $_POST['district'];
	$village = $_POST['village'];
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));


	$query = "INSERT INTO `voterdata`(`fullname`,`fathername`,`gender`,`state`,`district`,`village`,`image`) VALUES ('$fullname','$fathername','$gender','$state','$district','$village','$file')";
	$querty_run = mysqli_query($connection,$query);
	if($querty_run){
		echo '<script>alert("registered successfully")</script>';
	}
	else{
		echo '<script>alert("Error: Contact Administrator")</script>';
	}	
}
?>