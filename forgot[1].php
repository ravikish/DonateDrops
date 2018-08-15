<?php

		
	$conn=mysqli_connect("127.0.0.1","root","","hungryhackers");
	if(!$conn)
	{
		echo "Connection Failed.";
	}
	else
	{
		$num	=	$_POST['ph'];
		
		$sql=" SELECT Password FROM donatedrops WHERE PhoneNumber='$num'";
		
		
		$result = $conn->query($sql);		
		 
		 $numrow=$result->num_rows;
		 
		 if($numrow>=1)
		 {
			 
			 while($row = mysqli_fetch_array($result))
			 {
				$pass	=	$row['Password']; 
			 }
			 		 
				$username = "rajendrachowdary888@gmail.com";
				$hash = "7234f244cbdd774997ce33e0ccdd52c8e13e11a5fdbbc185b34e1414da4e36ef";
				
				
				// Config variables. Consult http://api.textlocal.in/docs for more info.
				$test = "0";

				// Data for text message. This is the text message data.
				$sender = "TXTLCL"; // This is who the message appears to be from.
				$numbers = "91".$num; // A single number or a comma-seperated list of numbers
				$message = "From DonateDrops\nYour Password For \n".$num." Is \n".$pass;
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
				echo "Please Check Your Mobile For Password(May be Delayed based on your Network Speed)";
				header( "refresh:4;url=index.html" );
			 
		}	
		else
		{
			echo "<img src=\"img1/66a.jpg\" width=\"100%\" height=\"100%\">";
			header( "refresh:3;url=index.html" );
		}
			
	}
?>

