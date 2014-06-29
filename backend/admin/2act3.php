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
	$actChar = '1-2-3';
   	date_default_timezone_set("America/New_York");
	$str_hoy = date("Y/m/d");

	$result333 = mysql_query("SELECT * FROM $modulo", $conexion);
	while($row333 = mysql_fetch_array($result333)){
		$act3 = $row333['act3']; $act4 = $row333['act4'];
	}
	if($act3==0 AND $act4==0){ //verifica si estan ocupados los tubos
	$_SESSION['ph_show_leido'] = '0';
	$_SESSION['tds_show_leido'] = '0';	
	//

		$result3 = mysql_query("SELECT * FROM $modulo", $conexion);

		while($row = mysql_fetch_array($result3)){
			$ainiciov = $row['ainicio']; //para guardar en produccion&ventas info
			$taginicialv = $row['tag_inicial']; //para guardar en produccion&ventas info 
			$bfinal = $row['bfinal'];
			$cinicion = $bfinal;
			$cfinaln  = $cinicion;

			mysql_query("UPDATE $modulo SET act1='0' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET act2='0' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET act3='1' WHERE id = '1'");
					
		mysql_query("UPDATE $modulo SET cinicio='".$cinicion."'	WHERE id = '1'");
		mysql_query("UPDATE $modulo SET cfinal='".$cfinaln."'	WHERE id = '1'");

		//inicio actividad 3
		$tag12 = $row['tag_inicial'];
		mysql_query("UPDATE $modulo SET tag_madurez='".$tag12."'	WHERE id = '1'");
		}
		
	//guardo datos de las actividades 1&2, en produccion y ventas
	//$estadoa = 'en proceso..';
	//mysql_query("UPDATE products SET inicio='".$ainiciov."' WHERE tag = '".$tag12."'");
	//mysql_query("UPDATE products SET final='".$actChar."' WHERE tag = '".$tag12."'");
	mysql_query("UPDATE products SET actividades='".$actChar."' WHERE tag = '".$tag12."'");
	

	//borro y preparo la actividad 1&2.
		$result47 = mysql_query("SELECT * FROM $modulo", $conexion);	
		while($row = mysql_fetch_array($result47)){
			mysql_query("UPDATE $modulo SET tag_inicial=' ' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET act1='0' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET act2='0' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET ainicio='".$str_hoy."'	WHERE id = '1'");
			mysql_query("UPDATE $modulo SET afinal='".$str_hoy."'	WHERE id = '1'");
			mysql_query("UPDATE $modulo SET a1='0' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET a2='0' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET a3='0' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET a4='0' WHERE id = '1'");												
			mysql_query("UPDATE $modulo SET a5='0' WHERE id = '1'");

			mysql_query("UPDATE $modulo SET binicio='0000-00-00'WHERE id = '1'");
			mysql_query("UPDATE $modulo SET bfinal='0000-00-00'WHERE id = '1'");

			mysql_query("UPDATE $modulo SET dinicio='0000-00-00'WHERE id = '1'");
			mysql_query("UPDATE $modulo SET dfinal='0000-00-00'WHERE id = '1'");

			for ($x=1; $x<=25; $x++) {
				$be="b";
				$xe="$x";
				$b = $be.$xe; 
				mysql_query("UPDATE $modulo SET $b='0' WHERE id = '1'");
			}		
		}

			//creo row en phtdsm1 para la fecha y tag que vienen de la act2 pham=manual y phpm= automatizado
			$result774 = mysql_query("SELECT * FROM phtdsm1", $conexion);
			$result774 = mysql_query(("INSERT INTO phtdsm1 (tag, fecha, pham, tdsam)
			VALUES('$tag12','$cinicion','0','0')"), $conexion);

	}else{
		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';
	}
		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';

?>