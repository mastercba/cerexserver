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

	$idventa = $_GET['veid'];
    //Recupero el monto a sumar y restar
        $result7 = mysql_query("SELECT * FROM products WHERE id='".$idventa."'", $conexion);    
        $row7 = mysql_fetch_array($result7);
        $producto = $row7['precio']*$row7['cantidad'];

    //resto a la cuenta #50 (id=50) de la tabla catalogo                    
        $result73 = mysql_query("SELECT * FROM catalogo WHERE id='50'", $conexion);    
        $row73 = mysql_fetch_array($result73);
        $valor_corregido = $row73['saldo'] - $producto;
        mysql_query("UPDATE catalogo SET saldo='".$valor_corregido."' WHERE id = '50'");

    //Borro fila de venta
		$result = mysql_query("DELETE FROM products WHERE id='".$idventa."'", $conexion);

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=admin.php">';

?>