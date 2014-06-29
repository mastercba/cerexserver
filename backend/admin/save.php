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
	$flag1 = 0;

	//Recupero variables
	$content = $_POST['content']; 					//get posted data
	$ph_number = trim($content);

	$result9 = mysql_query("SELECT * FROM $modulo", $conexion);	
	while($row9 = mysql_fetch_array($result9)){
		$tag_mad = $row9['tag_madurez'];
		$cfinal =	$row9['cfinal'];
	}

	//verifica si ya existe el ph para esa fecha y ese tag...
	$result2 = mysql_query("SELECT * FROM phtdsm1", $conexion);	
	while($row2 = mysql_fetch_array($result2)){
		$t_leido = $row2['tag'];
		$f_leido = $row2['fecha'];
			if($tag_mad == $t_leido AND $cfinal == $f_leido){
				mysql_query("UPDATE phtdsm1 SET pham='".$ph_number."' WHERE fecha = '".$cfinal."'");
				$flag1 = 1;
			}else{}
			if($tag_mad != $t_leido AND $cfinal != $f_leido){
			}else{}	
	}

	if($flag1 == 0){
		// inserta una nueva fila de ph y tds con ese tag y con la fecha
		$res = mysql_query("SELECT * FROM phtdsm1", $conexion);
		$res = mysql_query(("INSERT INTO phtdsm1 (tag, fecha, pham, tdsam)
		VALUES('$tag_mad','$cfinal','".$ph_number."','0')"), $conexion);
	}
	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';
?>