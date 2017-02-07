 <?php session_start(); ?>
<html>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	if (isset($_GET['rem'])){
		$id=$_GET['id'];
		for ($j = 0; $j <sizeof($_SESSION['carrello']); $j++){
			if ($_GET['id']==$_SESSION["carrello"][$j]['id']){
				try{
					array_splice($_SESSION['carrello'],$_SESSION["carrello"][$j][$id] , 1);
					break;
				}
				catch (Exception $e) {}
			}
		}
		print_r($_SESSION['carrello']) ;
	}
?>
	<body>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h1><i>Your shopping</i></h1>
			<table class="table table-striped">
				<tr>
					<th>Codice prodotto</th>
					<th>Descrizione</th>
					<th>Prezzo</th> 
					<th>Qnt </th>
					<th> </th>
					<th> </th>
				</tr>  
<?php
		
					try{
						//$connect=new PDO('mysql:dbname=quintaa_login;localhost','root','miomio');
						$connect=new PDO('mysql:dbname=quintaa_login;localhost','quintaa','NB7U@91A');
					}
					catch(PDOException $e){
						echo 'CONNECTION FAILED: '.$e->getMessage();
					}
					$tot=0;
					for ($i = 0; $i <sizeof($_SESSION['carrello']); $i++) {
						$sql = "SELECT idProd, descrizione, prezzo FROM products where idProd=".$_SESSION['carrello'][$i]['id'];
						$result = $connect->query($sql);
						$row = $result->fetch(PDO::FETCH_ASSOC);
						//$row = $result->fetch(PDO::FETCH_ASSOC);
						echo "<form><tr><td>".($_SESSION['carrello'][$i]['id'])."</td>";
						echo '<td>'.$row['descrizione'].'<div>';
						echo '<td>'.$row['prezzo'].'<div>';
						echo "<td>".($_SESSION["carrello"][$i]['qnt'])."</td>";
						echo '<td><div>';
						echo '<td><div>';
						$tot+=$_SESSION["carrello"][$i]['qnt']*$row['prezzo'];
?>

							<button type='submit' name="rem"  class='btn btn-warning'>Remove</button>
							<input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION['carrello'][$i]['id']); ?>" />
						</div></td></tr></form>
<?php 
					}
				echo '</table>';
?>		
				<h3>TOT € <?php echo $tot?></h3>
				<button type="button" class="btn btn-default" onclick="parent.location='reserved.php'">Back</button> 
			</div>  
			<div class="col-md-4">
<?php 
		if (isset($_SESSION['log'])) {
		echo 'Logged as '.$_SESSION['email'];
		} 
		else {
			//header("location: http://localhost/php/login.php");
			header("location: http://localhost/informatica/5A%20IA/prova_php/login.php");
		}
?>
				<button type="button" button type="button" class="btn btn-danger" id="logout" onclick="window.location='logout.php'">Log out</button>
			</div>
		</div>
	</body>
</html>