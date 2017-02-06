 <?php
 session_start(); ?>
<html>


<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
	
</tr><?php
$j=0;
    for ($i = 0; $i <sizeof($_SESSION['carrello']); $i++) {
		
        echo "<form><tr><td>".($_SESSION['carrello'][$i][$j])."</td>";
		 //echo "<td>".($_SESSION["carrello"][$i])."</td>";
		 //echo "<td>".($_SESSION["carrello"][$i])."</td> ";
		  //echo "<td>".print_r($_SESSION["carrello"])."</td> ";
		 echo '<td><div>';
		 echo '<td><div>';
		 echo '<td><div>';
		  echo '<td><div>';?>
  <button type="button" class="btn btn-default">+</button> 
  <button type="button" class="btn btn-default">-</button>
  <button type='submit' name="sub"  class='btn btn-info'>Add</button>
  <input type="text" class="form-control col-xs-2" name="qnt"/>
  <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" />
</div></td></tr></form>
	<?php 
	$j++;
   }
	  
echo '</table>';

?>
        <button type="button" class="btn btn-default" onclick="parent.location='reserved.php'">Back</button> 
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