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
	
	//archiva las actividades 3 y 4 de ese tag, en products
		$result40 = mysql_query("SELECT * FROM $modulo", $conexion);	
		while($row40 = mysql_fetch_array($result40)){
			$tmadurez = $row40['tag_madurez'];
			$dfinal =	$row40['dfinal'];
			$acts = '1-2-3-4';
			$estadoa = 'finalizado';
		}
		mysql_query("UPDATE products SET final='".$dfinal."' WHERE tag = '".$tmadurez."'");
		mysql_query("UPDATE products SET actividades='".$acts."' WHERE tag = '".$tmadurez."'");
		mysql_query("UPDATE products SET estado='".$estadoa."' WHERE tag = '".$tmadurez."'");
		mysql_query("UPDATE products SET flag='1' WHERE tag = '".$tmadurez."'");


	//borra y prepara para una nueva plantacion de la fase de madurez
		$result4 = mysql_query("SELECT * FROM $modulo", $conexion);	
		while($row = mysql_fetch_array($result4)){
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

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';
?>