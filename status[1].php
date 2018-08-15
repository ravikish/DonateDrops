<?php

	$conn=mysqli_connect("127.0.0.1","root","","hungryhackers");
	if(!$conn)
	{
		echo "Connection Failed.";
	}
	else
	{
		$res	=	$_POST['res'];
		$dnum	=	$_POST['dnum'];
		$call	=	$_POST['calls'];
		
		session_start();
		$name	=	$_SESSION["number"];

			$sql="INSERT INTO successstatus  (Number,Result,DonorNumber,CallsCount) 
									VALUES ('$name','$res','$dnum','$call')";
			if (mysqli_query($conn, $sql)) 
			{
				echo "New record created successfully. Redirecting to Login page.........";
				echo "<img src=\"img1/l2.gif\" width=\"70%\" height=\"100%\">";
				header( "refresh:4;url=logIn.php" );
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			
	}
		
?>