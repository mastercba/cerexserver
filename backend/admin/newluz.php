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

    // update 'lastvisit' date de la db
  
	//Crear variables

	//Recupero variables
		$lfecha = $_POST['luzfecha'];
		$lperiodo = $_POST['luzperiodo'];	
		$lconsumo = $_POST['luzconsumo'];
		$lcuenta = $_POST['luzcuenta'];
		$legreso = $_POST['luzegreso'];
		$lsaldo	= $_SESSION['luzsaldo'];
	
		$lsaldo = $lsaldo + $legreso;

		$result = mysql_query(("INSERT INTO luz (created_at, periodo, consumo, egreso, saldo, de_cuenta)
		 VALUES('$lfecha','$lperiodo','$lconsumo','$legreso','$lsaldo','$lcuenta')"), $conexion);

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=production.php">';

?>