<!DOCTYPE html>
<html lang="en">
<head>
	  <title>EditDetails</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="a.css"> 
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script type="text/JavaScript" src="state.js"></script>
	  <script>
	  function validate()
	  {
		if(document.edi.user.value=="")
		{
			alert("Please Enter Your Name");
			return false;
		}
		if(document.edi.email.value=="")
		{
			alert("Email must be filled");
			return false;
		}
		var x=document.edi.email.value;
		var atpos = x.indexOf("@");
		var dotpos = x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
		{
			alert("Not a valid e-mail address");
			return false;
		}
		if(document.edi.bg.value=="Select")
		{
			alert("Please Select Your Blood Group");
			return false;
		}
		if(document.signUp.bg.value=="Select")
		{
			alert("Please select your BloodGroup");
			return false;
		}
		if(document.signUp.st.value=="SELECT YOUR STATE")
		{
			alert("Please select your State");
			return false;
		}
		if(document.signUp.dist.value=="Select your District")
		{
			alert("Please select your District");
			return false;
		}
		
	  }
	  </script>
	  <style>
		.back{
			background-image: url("img1/abc.jpg");
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
<?php session_start();
			$number =	$_SESSION["number"]; ?>
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
		<div class="col-md-4 ">
			<h4>Your Mobile Number <?php echo $number; ?></h4>
			<form name="edi" class="sa-innate-form" onsubmit="return validate()" method="post" action="edit.php">
						<label>Name</label>
						<input type="text"  name="user">
						
						<label>Email Address</label>
						<input type="text" name="email"><br>
						
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
						</label>
						<label>Select Your State:</label>
							<select name="st" id="listBox" onchange='selct_district(this.value)'>
							</select>
						
						
						<label>Select Your District:</label>
							<select name="dist" id='secondlist'>
							</select>
						<button type="submit" class="btn btn-info btn-block">Update Details</button>
			</form>
		</div>
		<div class="col-md-8 "> 
		</div>
	
</body>
</html>