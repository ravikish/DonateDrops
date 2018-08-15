<?php

	$conn=mysqli_connect("127.0.0.1","root","","hungryhackers");
	if(!$conn)
	{
		echo "Connection Failed.";
	}
	else
	{
		$ph		=	$_POST['num'];
		$sql=" SELECT * FROM donatedrops WHERE PhoneNumber='$ph'";
		
		
		$result = $conn->query($sql);
		$numrow=mysqli_num_rows($result);
		
		if(! $result ) 
		{
				die('Could not get data: ' . mysql_error());
		}
		if($numrow>=1)
		{
			echo "<img src=\"img1/6aa.jpg\">";
			header( "refresh:2;url=index.html" );
		}
		else
		{
			$name	=	$_POST['user'];		
			$pass	=	$_POST['pass'];
			$email	=	$_POST['email'];
			$bg		=	$_POST['bg'];
			$state	=	$_POST['st'];
			$dist	=	$_POST['dist'];
			
			$sql="INSERT INTO donatedrops  (Name,PhoneNumber,Password,Email,BloodGroup,State,District) 
									VALUES ('$name','$ph','$pass','$email','$bg','$state','$dist')";
			if (mysqli_query($conn, $sql)) 
			{
				echo "New record created successfully. Redirecting to Login page.........";
				header( "refresh:2;url=index.html" );
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			
		}
		
		
	}
	

?>