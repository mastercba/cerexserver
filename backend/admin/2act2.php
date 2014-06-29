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
	//Recupero variables
	$modulo = $_SESSION['modulo'];
	$str_hoy = date("Y/m/d");
	$actChar = '1-2';

	//

		$result3 = mysql_query("SELECT * FROM $modulo", $conexion);

		while($row = mysql_fetch_array($result3)){
			$taggy = $row['tag_inicial'];
			$afinal = $row['afinal'];
			$binicion = $afinal;
			$bfinaln  = $binicion;

			mysql_query("UPDATE $modulo SET act1='0' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET act2='1' WHERE id = '1'");
		mysql_query("UPDATE $modulo SET binicio='".$binicion."'	WHERE id = '1'");
		mysql_query("UPDATE $modulo SET bfinal='".$bfinaln."'	WHERE id = '1'");
	
		}	
		mysql_query("UPDATE products SET actividades='".$actChar."' WHERE tag = '".$taggy."'");

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';
?>