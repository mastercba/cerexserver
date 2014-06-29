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
   	date_default_timezone_set("America/New_York");
   	$str_hoy = date("Y/m/d");

	//

		$result4 = mysql_query("SELECT * FROM $modulo", $conexion);	
		while($row = mysql_fetch_array($result4)){
			$tag1 = $row['tag_madurez'];
			mysql_query("UPDATE $modulo SET tag_madurez=' ' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET act3='0' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET act4='0' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET cinicio='0000-00-00'	WHERE id = '1'");
			mysql_query("UPDATE $modulo SET cfinal='0000-00-00'	WHERE id = '1'");
			mysql_query("UPDATE $modulo SET dinicio='0000-00-00'	WHERE id = '1'");
			mysql_query("UPDATE $modulo SET dfinal='0000-00-00'	WHERE id = '1'");
					 
			for ($x=1; $x<=30; $x++) {
				$be="c";
				$xe="$x";
				$c = $be.$xe; 
				mysql_query("UPDATE $modulo SET $c='0' WHERE id = '1'");
			}
			for ($x=1; $x<=5; $x++) {
				$be="d";
				$xe="$x";
				$d = $be.$xe; 
				mysql_query("UPDATE $modulo SET $d='0' WHERE id = '1'");
			}		
		}

		// borra la fila de la tabla de ph y tds de ese tag
		$result10 = mysql_query("SELECT * FROM phtdsm1", $conexion);	
		while($row10 = mysql_fetch_array($result10)){
			$id = $row10['id'];
			$tag_leido = $row10['tag'];
			if($tag1 == $tag_leido){
		        mysql_query("DELETE FROM phtdsm1 WHERE id='".$id."'");
			}
		}
		// borra la fila de la tabla de ph y tds de ese tag
		$result110 = mysql_query("SELECT * FROM products", $conexion);	
		while($row110 = mysql_fetch_array($result110)){
			$id = $row110['id'];
			$tag_leido1 = $row110['tag'];
			if($tag1 == $tag_leido1){
		        mysql_query("DELETE FROM products WHERE id='".$id."'");
			}
		}

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';
?>