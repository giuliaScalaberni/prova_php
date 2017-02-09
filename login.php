<?php session_start() ?>
<html>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php 
	try{
		//$connect=new PDO('mysql:dbname=quintaa_login;localhost','root','miomio');
		$connect=new PDO('mysql:dbname=quintaa_login;localhost','quintaa','NB7U@91A');
	}
	catch(PDOException $e){
		echo 'CONNECTION FAILED: '.$e->getMessage();
	}
	if((isset($_GET['email']))&&(isset($_GET['psw']))){
		$email = (string)$_GET['email'];
		$password=md5($_GET['psw']);
		$sql = "SELECT * FROM Utenti WHERE email= '$email' and password='$password'";
		$stm=$connect->prepare($sql);
		$stm->execute();
		if ($data = $stm->fetch()){
			$row=$stm->rowCount() ;
			if ($row> 0) {
				//header("location:http://localhost:9000/php/reserved.php");
				header("location: http://localhost/informatica/5A%20IA/prova_php/reserved.php");
				$_SESSION['log']='ok';
				$_SESSION['email']=$_GET['email'];
				$_SESSION['carrello'] =  array ();
				//$_SESSION['carrello']=array(array());
			}
		else{
			echo '<div class="alert alert-danger alert-dismissible" role="alert">';
			echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
			echo '<strong>Warning!</strong> Incorrect data</div>';
		}
	}
	else 
		echo '<div class="alert alert-danger alert-dismissible" role="alert">';
		echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		echo '<strong>Warning!</strong> Invalid password or email</div>';
	}
?>
	<body>
		<form role="form" class="form-horizontal" action="login.php"   name="login" id="login" method="get">
			<div class="col-xs-6 col-md-4" ></div>
			<div  class="col-xs-6 col-md-4" >
				<h2 class="text-center">e-commerce ACCOUNT</h2>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1"  name="email" placeholder="Email" required>
				</div>
				<div class="form-group ">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" name="psw" placeholder="Password" required>
				</div>
				<button type="submit"  class="btn btn-default">Log in</button>
			</div>
		</form>
	
		<div class="col-xs-6 col-md-4" >
			<button type="button" class="btn btn-info" class='text-center' onclick='parent.location="logon.php"'>Log On </a>
		</div>
	</body>
</html>