<?php

	$conn=mysqli_connect("127.0.0.1","root","","hungryhackers");
	if(!$conn)
	{
		echo "Connection Failed.";
	}
	else
	{
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		
		session_start();
		$_SESSION["name"] = $user;
		$_SESSION["num"] = $pass;
		$sql=" SELECT * FROM donatedrops WHERE PhoneNumber='$user' AND Password='$pass'";
		
		
		$result = $conn->query($sql);
		$numrow=mysqli_num_rows($result);
		if(! $result ) 
		{
				die('Could not get data: ' . mysql_error());
		}
		if($numrow>=1)
		{
			echo "<img src=\"img1/l.gif\" width=\"100%\" height=\"100%\">";
			header( "refresh:4;url=logIn.php" );
		}		
		else
		{
			echo "<img src=\"img/d11.jpg\" width=\"100%\" height=\"100%\">";
			header( "refresh:2;url=index.html" );
		}
			
	}
		
?>