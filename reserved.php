 <?php
 session_start(); ?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php 

if (isset($_GET['sub'])){
	$i;
for ($i = 0; $i <sizeof($_SESSION['carrello']); $i++){
if ($_SESSION["carrello"][$i]['id']==$_GET['id']){
	$_SESSION["carrello"][$i]['qnt']=$_SESSION["carrello"][$i]['qnt']+$_GET['qnt'];
	break;}
}
if ($i>=sizeof($_SESSION['carrello'])){
$newdata =  array (
      'id' =>$_GET['id'],
      'qnt' => $_GET['qnt']
      
    );
	array_push($_SESSION['carrello'],$newdata);
	print_r($_SESSION['carrello']) ;
	
	}
}
?>
 <body>
 <div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Categories
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="reserved.php?cat=home" selected>Home</a></li>
    <li><a href="reserved.php?cat=outdoor">Outdoor</a></li>
  </ul>
	</div>
	
	</div>
	<div class="col-md-4">
	<br>
		<?php
		
if (isset($_SESSION['log'])) {
	echo 'Logged as '.$_SESSION['email'];
 } else {
	header("location: http://localhost/php/login.php");
	//header("location: http://localhost/informatica/5A%20IA/prova_php/login.php");
 }

 ?>
		<button type="button" button type="button" class="btn btn-danger" id="logout" onclick="window.location='logout.php'">Log out</button>
	</div>
	<br>
	<div class="row">
	<div class="col-md-4"></div>
	
<div class="col-md-4">

       
        <?php
		
		try{
	$connect=new PDO('mysql:dbname=quintaa_login;localhost','root','miomio');
	//$connect=new PDO('mysql:dbname=quintaa_login;localhost','quintaa','NB7U@91A');
}
catch(PDOException $e){
	echo 'CONNECTION FAILED: '.$e->getMessage();
}
if (!isset($_GET['cat'])){
	$_GET['cat']='home';
}
$sql = "SELECT id, Descrizione, Prezzo FROM ".$_GET['cat'];
$result = $connect->query($sql);
if ($result->rowCount() > 0) {?>
<table class="table table-striped">
	<tr>
	<th>Codice prodotto</th>
	<th>Descrizione</th>
	<th>Prezzo</th> 
	<th> </th>
	<th> </th>
	
</tr><?php
    // output data of each row
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<form><tr><td>".$row["id"]."</td>";
		 echo "<td>".$row["Descrizione"]."</td>";
		 echo "<td>".$row["Prezzo"]."</td> ";
		 echo '<td><div>'?>
  <button type="button" class="btn btn-default">+</button> 
  <button type="button" class="btn btn-default">-</button>
  <button type='submit' name="sub"  class='btn btn-info'>Add</button>
  <input type="text" class="form-control col-xs-2" name="qnt"/>
  <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" />
</div></td></tr></form>;
	<?php 
    }
	  
echo '</table>';
} else {
	
    echo mysql_error();
}?>
        <button type="button" class="btn btn-default" onclick="parent.location='shop.php'">View your shopping</button> 
       </div>  

	<div class="col-md-4"></div>
</div>
 </body>
 </html>
