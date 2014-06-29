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
	$out = 0;
	$inc = 1;
	$_SESSION['ph_show_leido'] = 0;
	$_SESSION['tds_show_leido'] = 0;
	//

	$result4 = mysql_query("SELECT * FROM $modulo", $conexion);	
	while($row = mysql_fetch_array($result4)){
			$tag_mad = $row['tag_madurez'];
			//$cfinal =	$row40['cfinal'];	
			for ($x=1; $x<=30; $x++) {
				$be="c"; if($x==1){$flag = $x;}else{$flag = $x - 1;}
				$xe="$x"; $y="$flag";
				$c = $be.$xe; $ay= $be.$y;
				$res = $row[$c]; $yres = $row[$ay];
				$date = $row['cfinal'];
				$dateInit = $row['cinicio'];
				if($res == 0 AND $out == 0 AND $c != 'c1'){
					mysql_query("UPDATE $modulo SET $ay='0' WHERE id = '1'");

					$cfinal = strtotime ( '-'.$inc.' day' , strtotime ( $date ) ) ;
					$cfinal = date ( 'Y-m-j' , $cfinal );
					mysql_query("UPDATE $modulo SET cfinal= '".$cfinal."' WHERE id = '1'");
					$out = 1;	
				}
				if($res == 1 AND $out == 0 AND $c == 'c30'){
					mysql_query("UPDATE $modulo SET $c='0' WHERE id = '1'");

					$cfinal = strtotime ( '-'.$inc.' day' , strtotime ( $date ) ) ;
					$cfinal = date ( 'Y-m-j' , $cfinal );
					mysql_query("UPDATE $modulo SET cfinal= '".$cfinal."' WHERE id = '1'");
					$out = 1;	
				}
				if($res == 0 AND $out == 0 AND $c == 'c1'){
					mysql_query("UPDATE $modulo SET $c='0' WHERE id = '1'");

					$cfinal = strtotime ( '-'.$inc.' day' , strtotime ( $date ) ) ;
					$cfinal = date ( 'Y-m-j' , $cfinal );
					mysql_query("UPDATE $modulo SET cfinal= '".$dateInit."' WHERE id = '1'");
					$out = 1;	
				}	
			}
	}

//	// busca los ph y tds de ese tag y con la fecha
//	$result9 = mysql_query("SELECT * FROM $modulo", $conexion);	
//	while($row9 = mysql_fetch_array($result9)){
//		$fecha_actual = $row9['cfinal'];
//		$tag_prev = $row9['tag_madurez'];
//	}	

//	$result10 = mysql_query("SELECT * FROM phtdsm1", $conexion);	
//	while($row10 = mysql_fetch_array($result10)){
//		$tag_leido = $row10['tag'];
//		$fecha_leido = $row10['fecha'];
//		$ph_leido = $row10['pham'];
//		$tds_leido = $row10['tdsam'];
//		$ph_aqua = $row10['phpm'];
//		$tds_aqua = $row10['tdspm'];
//		if($tag_prev == $tag_leido AND $fecha_leido == $fecha_actual){
//			$_SESSION['ph_show_leido'] = $ph_leido;
//		    $_SESSION['tds_show_leido'] = $tds_leido;
//		}	
//	}

	$result04 = mysql_query("SELECT * FROM $modulo", $conexion);	
	while($row04 = mysql_fetch_array($result04)){
			$cfinal =	$row04['cfinal'];
	}		
	mysql_query("UPDATE products SET final='".$cfinal."' WHERE tag = '".$tag_mad."'");

	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';
?>