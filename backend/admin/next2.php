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
			$taggy = $row['tag_inicial'];
			$bfinal =	$row40['bfinal'];	
			for ($x=1; $x<=25; $x++) {
				$be="b"; $flag = $x + 1;
				$xe="$x"; $y="$flag";
				$b = $be.$xe; $ay= $be.$y;
				$res = $row[$b]; 
				$date = $row['bfinal'];
				if($res == 0 AND $out == 0){
					mysql_query("UPDATE $modulo SET $b='1' WHERE id = '1'");

					$bfinal = strtotime ( '+'.$inc.' day' , strtotime ( $date ) ) ;
					$bfinal = date ( 'Y-m-j' , $bfinal );
					mysql_query("UPDATE $modulo SET bfinal= '".$bfinal."' WHERE id = '1'");
					$out = 1;	
				}	
			}
	}
	$result04 = mysql_query("SELECT * FROM $modulo", $conexion);	
	while($row04 = mysql_fetch_array($result04)){
			$bfinal =	$row04['bfinal'];
	}		
	mysql_query("UPDATE products SET final='".$bfinal."' WHERE tag = '".$taggy."'");

	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';
?>