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
  
	//Crear variables	

	$phtdsid = $_GET['phid'];

    //Borro fila de account
        $result = mysql_query("DELETE FROM phtdsm1 WHERE id='".$phtdsid."'", $conexion);
    

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';

?>