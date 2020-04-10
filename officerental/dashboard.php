<?php
if(isset($_GET['id']))
	echo "<script>alert('Data INSERTED');</script>" ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>projname</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
</head>
<body>



	<div class="container title" style="margin:0px 35%;" >
		<p><h1><br> WELCOME ADMIN !! </br></h1></p>
	</div>

		<div class="row">
			<a href="register.php">
			  <div class="col-lg-6">
				<div class="card">
				  <div class="container">
					<h2>&nbsp &nbsp &nbsp &nbsp &nbsp REGISTER</h2>
				  </div>
				</div>
			  </div></a>


			  <a href="manage.php">
			  <div class="col-lg-6">
				<div class="card">
				<div class="container">
					<h2>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp MANAGE</h2>
				  </div>
				</div>
			  </div></a>
			</div>
		
		<div class="row">
			<a href="table-form.php">
			  <div class="col-lg-6">
				<div class="card">
				  <div class="container">
					<h2>&nbsp &nbsp &nbsp &nbsp &nbsp RECORD INSERTION</h2>
				  </div>
				</div>
			  </div></a>
			  <div class="row">
			  
			  
			  
			<a href="backup.php">
			  <div class="col-lg-6">
				<div class="card">
				  <div class="container">
					<h2>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  BACKUP</h2>
				  </div>
				</div>
			  </div></a>

			  <div class="row">
			<a href="accesslog.php">
			  <div class="col-lg-6">
				<div class="card">
				  <div class="container">
					<h2>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ACCESS LOG</h2>
				  </div>
				</div>
			  </div></a>
		
			<a href="search.php">
			  <div class="col-lg-6">
				<div class="card">
				  <div class="container">
					<h2>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp SEARCH</h2>
				  </div>
				</div>
			  </div></a>  
</div>
</div>



</body>
</html>	