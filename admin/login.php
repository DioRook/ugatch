<?php 
session_start();
include ('../config/connection.php');
if($_POST){
	$q="SELECT * FROM users WHERE email='$_POST[email]' AND password=sha1('$_POST[password]')";
	$r=mysqli_query($db,$q);
	if(mysqli_num_rows($r)== 1){
		$_SESSION['admin']=$_POST['email'];
		header('Location: index.php');
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo 'Admin'.' | '.'Login'; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="utf-8">
		<?php include ('config/css.php');?>
		<?php include ('config/js.php');?>

	</head>
	<body>
		<main role="main">

		
		<div class="container">
			<div class="row">
				<div class="col-md-4 offset-md-4">
					<div class="card">
						<div class="card-header bg-info">Login</div>
							<div class="card-body">
					<form action="login.php" method="post">
					  <div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter email">
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					  </div>
					  <div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					  </div>
					  <div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Check me out</label>
					  </div>
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>
					</div>
					</div>
				</div>
			</div>
		</div>
		
		
		</main><!--main-->
		
		<?php //include (D_TEMP.'/footer.php');?>
			
		<?php //if($debug==1) {include('widgets/debug.php');}?>
	</body>
	
	
</html>