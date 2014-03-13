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
		$addfecha = $_POST['accfecha'];
		$adddetalle = $_POST['accdetalle'];
		
		$addcuenta = $_POST['acccuenta'];
		$addingresos = $_POST['accingresos'];
		$addegresos = $_POST['accegresos'];
		$addsaldo = $_POST['accsaldo'];		
		
		
 
		$result = mysql_query(("INSERT INTO account (created_at, descripcion, ingreso, egreso, saldo, cuenta)
		 VALUES('$addfecha','$adddetalle','$addingresos','$addegresos','$addsaldo','$addcuenta')"), $conexion);

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=account.php">';

?>