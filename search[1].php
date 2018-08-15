<html>
	<head>
		<title>Search</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="a.css"> 
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/JavaScript" src="state.js"></script>
		<script>
			function valid()
			{
				if(document.search.bg.value=="Select")
				{
					alert("Please Select Blood Group");
					return false;
				}
				if(document.search.st.value=="SELECT YOUR STATE")
				{
					alert("Please Select State");
					return false;
				}
				if(document.search.dist.value=="Select your District")
				{
					alert("Please Select District");
					return false;
				}
			}
		</script>
		<style>
			.back
			{
				background-image: url("img/ab.jpg")
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
			<a href="search.php"><button type="button" class="btn btn-success pull-right btn-change">Search Blood Group</button></a>
		</div>
	
	</nav>
	<br><br><br><br><br><br><br><br>
	<div class="col-md-4" >
		<div class="panel panel-default">
			<h3 align="center" class="req"><u>Search Blood</u></h3>
			<form name="search" onsubmit="return valid()" method="post" action="search1.php">
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
				<button type="submit" class="btn btn-info btn-block">Search Blood Group</button>
			</form>
		</div>
	</div>
</body>
</html>

