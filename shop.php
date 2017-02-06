<html>
 <?php
 session_start(); ?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <body>
 <div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<h1><i>Your shopping</i></h1>
	</div>
	<div class="col-md-4">
	<?php 

/*if (isset($_GET['sub'])){
	$_SESSION['carrello'][$_GET['id']]=$_GET['qnt'];
	//array_push($_SESSION['carrello'],$_GET['id'],$_GET['qnt']);
	print_r($_SESSION['carrello']) ;
}*/
if (isset($_SESSION['log'])) {
	echo 'Logged as '.$_SESSION['email'];
 } else {
	header("location: http://localhost/php/login.php");
	//header("location: http://localhost/informatica/5A%20IA/prova_php/login.php");
 }
?>

<button type="button" button type="button" class="btn btn-danger" id="logout" onclick="window.location='logout.php'">Log out</button>
</div>

</body>
</html>