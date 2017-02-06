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
    var nome = document.modulo.nome.value;
    var cognome = document.modulo.cognome.value;
    var password = document.modulo.psw.value;
    var password2 = document.modulo.psw2.value;
    var email = document.modulo.email.value;
 
    // Espressione regolare dell'email
    var email_reg_exp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]{2,})+\.)+([a-zA-Z0-9]{2,})+$/;
      
    //Effettua il controllo sul campo NOME
    if ((nome == "") || (nome == "undefined")) {
        alert("Il campo Nome è obbligatorio.");
        document.modulo.nome.focus();
        return false;
    }
    //Effettua il controllo sul campo COGNOME
    else if ((cognome == "") || (cognome == "undefined")) {
        alert("Il campo Cognome è obbligatorio.");
        document.modulo.cognome.focus();
        return false;
    }
    //Effettua il controllo sul campo PASSWORD
    else if ((password == "") || (password == "undefined")) {
        alert("Il campo Password è obbligatorio.");
        document.modulo.psw.focus();
        return false;
    }
    //Effettua il controllo sul campo CONFERMA PASSWORD
    else if ((password2 == "") || (password2 == "undefined")) {
        alert("Il campo Conferma password è obbligatorio.");
        document.modulo.psw2.focus();
        return false;
    }
    //Verifica l'uguaglianza tra i campi PASSWORD e CONFERMA PASSWORD
    else if (password != password2) {
        alert("La password confermata è diversa da quella scelta, controllare.");
        document.modulo.psw2.value = "";
        document.modulo.psw2.focus();
        return false;
    }
	//EMAIL
    else if (!email_reg_exp.test(email) || (email == "") || (email == "undefined")) {
        alert("Inserire un indirizzo email corretto.");
        document.modulo.email.select();
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