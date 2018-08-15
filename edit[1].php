<?php
$conn=mysqli_connect("127.0.0.1","root","","hungryhackers");
	if(!$conn)
	{
		echo "Connection Failed.";
	}
	else
	{
			session_start();
			$number =	$_SESSION["number"];
			
			$name	=	$_POST['user'];					
			$email	=	$_POST['email'];
			$bg		=	$_POST['bg'];
			$state	=	$_POST['st'];
			$dist	=	$_POST['dist'];
			
			$sql="UPDATE  donatedrops  SET Name='$name', Email='$email', BloodGroup='$bg', 
										State='$state',District='$dist' WHERE PhoneNumber='$number'";
									
			if (mysqli_query($conn, $sql)) 
			{
				echo "<img src=\"img1/l1.gif\" width=\"80%\" height=\"80%\">";
				header( "refresh:4;url=logIn.php" );
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			
		
		
		
	}
?>