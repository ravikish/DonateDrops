<html>
	<head>
		<title>SendSms</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
			.back{
				background-color :#DCDCDC;
				background-image: url(img1/f.jpg);
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


<?php

	 session_start();
	 $name	=	$_SESSION["name"];
	 $pass	=	$_SESSION["user"];
	
	 $conn=mysqli_connect("127.0.0.1","root","","hungryhackers");
	 if(!$conn)
	 {
		echo "Connection Failed.";
	 }
	 else
	 {
		$bgroup =	$_POST['bg'];
		$st	=	$_POST['st'];
		$dist	=	$_POST['dist'];
		 $sql=" SELECT PhoneNumber FROM donatedrops WHERE BloodGroup='$bgroup' AND State='$st' AND District='$dist'";
		 $result = $conn->query($sql);
		
		 
		 $numrow=$result->num_rows;
		 if($numrow>=1)
		 {
			 $storeArray=Array();
			 while($row = mysqli_fetch_array($result))
			 {
				$storeArray[]	=	$row['PhoneNumber']; 
			 }
			 for($i=0; $i<sizeof($storeArray);$i++)
			 {				 
				$username = "rajendrachowdary888@gmail.com";
				$hash = "7234f244cbdd774997ce33e0ccdd52c8e13e11a5fdbbc185b34e1414da4e36ef";
				
				$num	=	$storeArray[$i];
				// Config variables. Consult http://api.textlocal.in/docs for more info.
				$test = "0";

				// Data for text message. This is the text message data.
				$sender = "TXTLCL"; // This is who the message appears to be from.
				$numbers = "91".$num; // A single number or a comma-seperated list of numbers
				$message = "From DonateDrops\n".$pass."\nNeed your Blood Please Help him. Your Blood Gives Life to Someone.\n Contact".$name;
				// 612 chars or less
				// A single number or a comma-seperated list of numbers
				$message = urlencode($message);
				$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
				$ch = curl_init('http://api.textlocal.in/send/?');
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$result = curl_exec($ch); // This is the result from the API
				//print $result;
				curl_close($ch);
			 }
			 
		 }
	 }
 
?>


	<div class="container">
		<div class="col-md-4">
		</div>
		<div class="col-md-5">
			<div class="panel panel-default">
				<?php echo"<h4>Name - $pass</h4>";?>
				<?php echo"<h4>MobileNumber - $name</h4>";?>
				
			</div>
			<pre><button class="btn btn-info btn-block"><?php echo $numrow; ?>- People Received your Request</button></pre>
			<pre><a href="logIn.php"><button class="btn btn-info btn-block">Click Here to Raise Other Request</button></a></pre>
			<pre><button class="btn btn-info btn-block">Please Update Your Result Status after 24 Hours</button></pre>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</body>
</html>