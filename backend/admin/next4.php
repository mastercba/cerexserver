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
			$dfinal =	$row40['dfinal'];	
			for ($x=1; $x<=5; $x++) {
				$be="d"; $flag = $x + 1;
				$xe="$x"; $y="$flag";
				$d = $be.$xe; $ay= $be.$y;
				$res = $row[$d]; 
				$date = $row['dfinal'];
				if($res == 0 AND $out == 0){
					mysql_query("UPDATE $modulo SET $d='1' WHERE id = '1'");

					$dfinal = strtotime ( '+'.$inc.' day' , strtotime ( $date ) ) ;
					$dfinal = date ( 'Y-m-j' , $dfinal );
					mysql_query("UPDATE $modulo SET dfinal= '".$dfinal."' WHERE id = '1'");
					$out = 1;	
				}	
			}
	}

	$result04 = mysql_query("SELECT * FROM $modulo", $conexion);	
	while($row04 = mysql_fetch_array($result04)){
			$dfinal = $row04['dfinal'];
	}				
	mysql_query("UPDATE products SET final='".$dfinal."' WHERE tag = '".$tag_mad."'");

	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';
?>