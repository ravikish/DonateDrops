<!DOCTYPE html>
<html lang="en">
<head>
	  <title>LogIN</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="a.css"> 
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script type="text/JavaScript" src="state.js"></script>
	  <script>
		function valid()
		{
			if(document.breq.bg.value=="Select")
			{
				alert("Please Select Blood Group");
				return false;
			}
			if(document.breq.st.value=="SELECT YOUR STATE")
			{
				alert("Please Select State");
				return false;
			}
			if(document.breg.dist.value="Select your District")
			{
				alert("Please Select District")
				return false;
			}
		}
	  </script>
	  <style>
		.back{
			background-image: url("img/2z.jpg")
		}
		.stl{
			background-color: #abcdef;
		}
		.req{
			background-color: #FAF0E6;
			font-color: #ffffff;
		}
		.nav-default{
		background-color:#dfe0e3;
		}
		.btn-change:hover{
			height: 50px;
			-webkit-transform: scale(1.1);
			background: #FF0000;
		}
	  </style>

</head>

<?php

	$conn=mysqli_connect("127.0.0.1","root","","hungryhackers");
	if(!$conn)
	{
		echo "Connection Failed.";
	}
	else
	{
		 session_start();
		$user	=	$_SESSION["name"];
		$pass	=	$_SESSION["num"];
		$sql=" SELECT * FROM donatedrops WHERE PhoneNumber='$user' AND Password='$pass'";
		
		$_SESSION["number"] = $user;
		$result = $conn->query($sql);
		
		if(! $result ) 
		{
				die('Could not get data: ' . mysql_error());
		}
		$numrow=mysqli_num_rows($result);
		if($numrow>=1)
		{
			while($row = mysqli_fetch_array($result)) 
			{
				$name	=	$row['Name'];
				$number = 	$row['PhoneNumber'];
				$bg		=	$row['BloodGroup'];
				$state	=	 $row['State'];
				$dist	=	 $row['District'];
			}
			$_SESSION["user"] = $name;
		}
		else
		{
			echo"MobileNumber or Password Incorrect";
		}
	}	
?>
<body class="back">

	<nav class="navbar navbar-default">
		<div class= "container-fluid">
			<!---logo-->
			<div class="navbar-header">
				
				<a href="#" class="navbar-brand red">DonateDrops</a>
				<img src="img/c.jpg" class="pull-right" class="img-responsive" width="50px" height="50px">
				
			</div>
			<a href="logout.php"><button type="button" class="btn btn-success pull-right btn-change">LogOut</button></a>
		</div>
	
	</nav>
	<div class="col-md-4" >
			<div class="panel panel-default stl">
			<table>
				<?php echo "<tr><td><h4>Name</td> <td> - </td><td>	$name</td></h4></tr>";?>
				<?php echo "<tr><td><h4>Number</td><td> - </td><td>$number</td></h4></tr>";?>
				<?php echo "<tr><td><h4>BloodGroup</td><td> - </td><td>$bg</td></h4></tr>";?>
				<?php echo "<tr><td><h4>State</td><td> - </td><td>$state</td></h4></tr>";?>
				<?php echo "<tr><td><h4>District</td><td> - </td><td>$dist</td></h4></tr>";?>
			</table>
			
			<pre><a href="edit1.php"><button class="btn btn-info btn-block">Edit Your Details</button></a></pre>
			</div>
	</div>
		<div class="col-md-4" >
		</div>
		
		<div class="col-md-4" >
		<a href="status.html"><button type="button" class="btn btn-warning pull-right btn-change"><b>Please UpDate Success Result</b></button></a>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						<div class="panel panel-default">
						<h3 align="center" class="req"><u>Raise  Blood Request</u></h3>
						<form name="breq" onsubmit="return valid()" method="post" action="sendsms.php">
						<label for="sel1">BLOOD GROUP:</label>
						  <select class="form-control" name="bg" id="sel1">
							<option>Select</option>
							<option>O+</option>
							<option>O-</option>
							<option>AB+</option>
							<option>AB-</option>
							<option>A+</option>
							<option>A-</option>
							<option>B+</option>
							<option>B-</option>
						  </select>
						
						<label>Select State:</label>
							<select name="st" id="listBox" onchange='selct_district(this.value)'>
							</select>
						
						<label>Select District:</label>
							<select name="dist" id='secondlist'>
							</select><br>
						<button type="submit" class="btn btn-info btn-block">Request</button>
				</div>
		</div>

</body>
</html>