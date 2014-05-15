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
		$sfecha = $_POST['semifecha'];
		$sdescripcion = $_POST['semidescripcion'];	
		$sused = $_POST['semiused'];

	//Crear variables
		$sstock = $_SESSION['semistock'];

		$result2 = mysql_query(("INSERT INTO semillas (created_at, descripcion, cant_used, cant_stock)
		 VALUES('$sfecha','$sdescripcion','$sused','$sstock')"), $conexion);

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=production.php">';

?>