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
			$afinal =	$row40['afinal'];	
			for ($x=1; $x<=5; $x++) {
				$be="a"; $flag = $x + 1;
				$xe="$x"; $y="$flag";
				$a = $be.$xe; $ay= $be.$y;
				$res = $row[$a]; 
				$date = $row['afinal'];
				if($res == 0 AND $out == 0){
					mysql_query("UPDATE $modulo SET $a='1' WHERE id = '1'");

					$afinal = strtotime ( '+'.$inc.' day' , strtotime ( $date ) ) ;
					$afinal = date ( 'Y-m-j' , $afinal );
					mysql_query("UPDATE $modulo SET afinal= '".$afinal."' WHERE id = '1'");
					$out = 1;	
				}	
			}
	}
	$result04 = mysql_query("SELECT * FROM $modulo", $conexion);	
	while($row04 = mysql_fetch_array($result04)){
		$afinal = $row04['afinal'];	
	}		
	mysql_query("UPDATE products SET final='".$afinal."' WHERE tag = '".$taggy."'");

	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';
?>