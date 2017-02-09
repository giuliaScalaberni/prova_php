/**$(document).ready(function() {
     $('input[type="submit"]').prop('disabled', true);
     
 });**/
 function eraseText() {
    document.getElementById("nome").value = "";
    document.getElementById("cognome").value = "";	
    document.getElementById("psw2").value = "";
    document.getElementById("email").value = "";
    document.getElementById("psw").value = "";
};
  
function Modulo() {
    // Variabili associate ai campi del modulo
    
    var password = document.modulo.psw.value;
    var password2 = document.modulo.psw2.value;
   
    //Verifica l'uguaglianza tra i campi PASSWORD e CONFERMA PASSWORD
    if (password != password2) {
        alert("La password confermata è diversa da quella scelta, controllare.");
        document.modulo.psw2.value = "";
        document.modulo.psw2.focus();
        return false;
    
    }
    //INVIA IL MODULO
    else {
		return true;
        document.modulo.action = "logon.php";
		//$('input[type="submit"]').prop('disabled', false);
        //document.modulo.submit();
    }
};