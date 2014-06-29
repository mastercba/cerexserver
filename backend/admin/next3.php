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
	$out = 0;
	$inc = 1;
	//

	$result4 = mysql_query("SELECT * FROM $modulo", $conexion);	
	while($row = mysql_fetch_array($result4)){
			$tag_mad = $row['tag_madurez'];
			$cfinal =	$row['cfinal'];		
			for ($x=1; $x<=30; $x++) {
				$be="c"; $flag = $x + 1;
				$xe="$x"; $y="$flag";
				$c = $be.$xe; $ay= $be.$y;
				$res = $row[$c]; 
				$date = $row['cfinal'];

						//busca si ya se creo el ph y tds para esa fecha y tag
						//$result479 = mysql_query("SELECT * FROM phtdsm1", $conexion);	
						//while($row479 = mysql_fetch_array($result479)){
						//	$t_leido = $row479['tag'];
						//	$f_leido = $row479['fecha'];
						//		if($tag_mad == $t_leido AND $date == $f_leido){

						//		}else{
						//			// inserta una nueva fila de ph y tds con ese tag y con la fecha
						//			$res = mysql_query("SELECT * FROM phtdsm1", $conexion);
						//			$res = mysql_query(("INSERT INTO phtdsm1 (tag, fecha, pham, tdsam)
						//			VALUES('$tag_mad','$date','0','0')"), $conexion);
						//		}
						//}
						//////////////////

				if($res == 0 AND $out == 0){
					mysql_query("UPDATE $modulo SET $c='1' WHERE id = '1'");

					$cfinal = strtotime ( '+'.$inc.' day' , strtotime ( $date ) ) ;
					$cfinal = date ( 'Y-m-j' , $cfinal );
					mysql_query("UPDATE $modulo SET cfinal= '".$cfinal."' WHERE id = '1'");
					$out = 1;
				}
			}
	}

	//up to date de la tabla products
	$result04 = mysql_query("SELECT * FROM $modulo", $conexion);	
	while($row04 = mysql_fetch_array($result04)){
			$cfinal =	$row04['cfinal'];
	}		
	mysql_query("UPDATE products SET final='".$cfinal."' WHERE tag = '".$tag_mad."'");

	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';
?>