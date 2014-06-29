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

	//Recupero variables
	$id_venta = $_GET['veid'];
	//Recupero el precio y la cantidad para obtener el ingreso x venta
	$result99 = mysql_query("SELECT * FROM products", $conexion);	
	while($row99 = mysql_fetch_array($result99)){
		$id_leido = $row99['id'];
		$precio_leido = $row99['precio'];
		$cantidad_leido = $row99['cantidad'];
		if($id_leido == $id_venta){$ingreso_tot = $precio_leido*$cantidad_leido;}
		else{}
	}

	//flag =0: archivado
	mysql_query("UPDATE products SET flag='0' WHERE id = '".$id_venta."'");

	//sumo a la cuenta el monto vendido cuenta #50
	$result9 = mysql_query("SELECT * FROM catalogo", $conexion);	
	while($row9 = mysql_fetch_array($result9)){
		$id_leido = $row9['id'];
		$saldo_antiguo = $row9['saldo'];
		if($id_leido == '50'){$nuevo_saldo = $saldo_antiguo + $ingreso_tot;}else{}
	}	
	mysql_query("UPDATE catalogo SET saldo='".$nuevo_saldo."' WHERE id = '50'");

	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=admin.php">';
?>