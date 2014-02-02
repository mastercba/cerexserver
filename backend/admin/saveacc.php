<?php 

	require("../config.php");

	//recupero variables

	//creo variables
  
    // At the top of the page we check to see whether the user 
    if(empty($_SESSION['usuario'])){ //is logged in or not 
        // If they are not, we redirect them to the login page. 
        header("Location: /cerexserver/formlogin.html");          
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to /cerexserver/formlogin.html"); 
    }     
    // Everything below this point in the file is secured by the login system

	//Recupero variables	
	//$sid = $_POST['sid'];
	$accfecha = $_POST['nfecha'];
	$accdetalle = $_POST['ndetalle'];

	$accingresos = $_POST['ningresos'];
	$accegresos = $_POST['negresos'];
	$accsaldo = $_POST['nsaldo'];



	$accidantiguo = $_SESSION['idacc'];

		mysql_query("UPDATE account SET created_at='".$accfecha."', 
		descripcion='".$accdetalle."', 
		ingreso='".$accingresos."', egreso='".$accegresos."', 
		saldo='".$accsaldo."'
		WHERE id=".$accidantiguo."");

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=account.php">';

?>