<?php

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
		$numrow=mysqli_num_rows($result);
		if($numrow>=1)
		{
			echo "<h1> Matches Found : $numrow </h1>";
			echo "Please Register to Request Blood";
			header( "refresh:3;url=index.html" );
		}
		else
		{
			echo "Sorry for inconvinence no matches found";
			header( "refresh:3;url=index.html" );
		}
		
	 }
?>