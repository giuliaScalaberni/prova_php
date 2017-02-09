 <?php session_start(); ?>
<html>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php 
	if (isset($_GET['sub'])&&($_GET['qnt']!='')){
		$i;
		for ($i = 0; $i <sizeof($_SESSION['carrello']); $i++){
			if ($_SESSION["carrello"][$i]['id']==$_GET['id']){
				$_SESSION["carrello"][$i]['qnt']=$_SESSION["carrello"][$i]['qnt']+$_GET['qnt'];
				if($_SESSION["carrello"][$i]['qnt']<=0){
					array_splice($_SESSION['carrello'],$_SESSION["carrello"][$i][$_GET['id']] , 1);
				}
			break;
			}
		}
		if (($i>=sizeof($_SESSION['carrello']))&& ($_GET['qnt']>0)){
			$newdata =  array ('id' =>$_GET['id'], 'qnt' => $_GET['qnt']);
			array_push($_SESSION['carrello'],$newdata);
		}
		print_r($_SESSION['carrello']) ;
	}
?>
	<body>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<h2 class="text-center">e-commerce</h2>
				<div  class="dropdown">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						Categories 
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li><a href="reserved.php?cat=1"selected>Home</a></li>
						<li><a href="reserved.php?cat=2">Outdoor</a></li>
						<li><a href="reserved.php?cat=3">Kitchen</a></li>	
					</ul>
				</div>
			</div>
			<div class="col-md-4">
			<br>
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
		<br>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
<?php
	
			try{
				//$connect=new PDO('mysql:dbname=quintaa_login;localhost','root','miomio');
				$connect=new PDO('mysql:dbname=quintaa_login;localhost','quintaa','NB7U@91A');
			}
			catch(PDOException $e){
				echo 'CONNECTION FAILED: '.$e->getMessage();
			}
			if (!isset($_GET['cat'])){
				$_GET['cat']='1';
			}
			/*$sql2 = "SELECT idProd, descrizione, prezzo FROM categories where Categories_idCat=".$_GET['cat'];
			$result2 = $connect2->query($sql2);*/
			$sql = "SELECT idProd, descrizione, prezzo FROM products where Categories_idCat=".$_GET['cat'];
			$result = $connect->query($sql);
			if ($result->rowCount() > 0) {
?>
				<table class="table table-striped">
					<tr>
						<th>Codice prodotto</th>
						<th>Descrizione</th>
						<th>Prezzo</th> 
						<th> </th>
						<th> </th>
						
					</tr>
<?php
				// output data of each row
				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
					echo "<form><tr><td>".$row["idProd"]."</td>";
					echo "<td>".$row["descrizione"]."</td>";
					echo "<td>".$row["prezzo"]."</td> ";
					echo '<td><div>'?>
					<div class="input-group">
						<input type="text"  name='qnt' class="form-control" placeholder="-x for delete">
						<span class="input-group-btn">
							<button type='submit' name="sub"  class='btn btn-info'>Add</button>
							<input type="hidden" name="id" value="<?php echo htmlspecialchars($row['idProd']);?>"/>
						</span>
					</div><!-- /input-group -->
				</div></td></tr></form>
<?php 
				}
  
				echo '</table>';
			}					 
			else {
				echo mysql_error();
			}
?>
				<button type="button" class="btn btn-default" onclick="parent.location='shop.php'">View your shopping</button> 
			</div>  
			<div class="col-md-4"></div>
		</div>
</body>
</html>
