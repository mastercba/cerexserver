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
    	$modulo = $_SESSION['modulo'];
    	date_default_timezone_set("America/New_York");
		$str_hoy = date("Y/m/d");
		$newTag = mt_rand(1000,10000);
		$actChar = '1';


	//Recupero variables
		$user_begin_date = $_POST['fecha_emp'];
		$user_qtty = $_POST['cantidad'];

	//Verifica si estan ocupados act1 &act2
	$result333 = mysql_query("SELECT * FROM $modulo", $conexion);
	while($row333 = mysql_fetch_array($result333)){
		$act1 = $row333['act1']; $act2 = $row333['act2'];
	}
	if($act1==0 AND $act2==0){ //verifica si estan ocupados los tubos
	
	//inicia un nuevo proceso....
		$result3 = mysql_query("SELECT * FROM $modulo", $conexion);
		while($row = mysql_fetch_array($result3)){

			mysql_query("UPDATE $modulo SET tag_inicial='".$newTag."' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET act1='1' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET act2='0' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET ainicio='".$user_begin_date."'	WHERE id = '1'");
			mysql_query("UPDATE $modulo SET afinal='".$user_begin_date."'	WHERE id = '1'");
			mysql_query("UPDATE $modulo SET a1='0' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET a2='0' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET a3='0' WHERE id = '1'");
			mysql_query("UPDATE $modulo SET a4='0' WHERE id = '1'");												
			mysql_query("UPDATE $modulo SET a5='0' WHERE id = '1'");

			mysql_query("UPDATE $modulo SET binicio='0000-00-00'WHERE id = '1'");
			mysql_query("UPDATE $modulo SET bfinal='0000-00-00'WHERE id = '1'");
					 
			for ($x=1; $x<=25; $x++) {
				$be="b";
				$xe="$x";
				$b = $be.$xe; 
				mysql_query("UPDATE $modulo SET $b='0' WHERE id = '1'");
			}		
		}

	//inserto en products la nueva plantacion para produccion y ventas
		$estadoa = 'en proceso..';	
		$result377 = mysql_query("SELECT * FROM products", $conexion);
		$result377 = mysql_query(("INSERT INTO products (flag, tag, estado, inicio, final, actividades, cantidad)
		VALUES('5','$newTag','$estadoa','$user_begin_date','$user_begin_date','$actChar','$user_qtty')"), $conexion);




	}else{
		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';
	}
		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';

?>