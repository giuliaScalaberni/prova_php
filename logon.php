<?php session_start() ?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="controller.js" ></script>
<?php 

try{
	//$connect=new PDO('mysql:dbname=quintaa_login;localhost','root','miomio');
	$connect=new PDO('mysql:dbname=quintaa_login;localhost','quintaa','NB7U@91A');
}
catch(PDOException $e){
	echo 'CONNECTION FAILED: '.$e->getMessage();
}

if(isset($_GET['logon']))
 { if ($_GET['psw']==$_GET['psw2']){
$stm=$connect->prepare('INSERT INTO Utenti (nome,cognome,email,password) VALUES (:nome,:cognome,:email,:password)');
$stm->bindValue(':nome',$_GET['nome']);
$stm->bindValue(':cognome',$_GET['cognome']);
$stm->bindValue(':email',$_GET['email']);
$stm->bindValue(':password',md5($_GET['psw']));

 if ($stm->execute()){
 echo 'utente registrato';
 
 $_SESSION['log']='ok';
 $_SESSION['email']=$_GET['email'];
// header("location:http://localhost:9000/reserved.php");
header("location: http://localhost/informatica/5A%20IA/prova_php/reserved.php");
 }
 if ($stm->errorInfo()[1]==1062)
 {echo 'email già registrata';
	
}	 
else 
{ echo 'error unknow!';}
	
}
else 
	echo 'passwords not corresponding';}

?>

<body>
	<h2>REGISTRAZIONE</h2>
	
	
	 <div class="col-xs-6 col-md-4" ></div>
	 <div  class="col-xs-6 col-md-4" >

	 <form role="form" class="form-horizontal" action="logon.php" name="modulo" id="modulo"  method="get">
	 <div class="form-group">
    <label for="inputNome">Name</label>
    <input type="text" class="form-control" id="inputNome"  name="nome" placeholder="Name" required>  <!--?php echo htmlspecialchars($_GET['cognome']); ?>-->
  </div>
	 <div class="form-group">
    <label for="inputCognome">Surname</label>
    <input type="text" class="form-control" id="inputCognome"  name="cognome" placeholder="Surname" required>  <!--?php echo htmlspecialchars($_GET['cognome']); ?>-->
  </div>
	<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1"  name="email" placeholder="Email" required>
  </div>
  <div class="form-group ">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="psw" placeholder="Password" required>
  </div>
  <div class="form-group ">
    <label for="exampleInputPassword2">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="psw2" placeholder="Password" required>
  </div>
  
		 <button type="submit"  value="LOG ON" name="logon" class="btn btn-default">Submit</button>
  </form>
  </div>
	
	
		
		
</body>

</html>