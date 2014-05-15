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
    $once = 11; $cincuenta = 50;
    //Recupero el monto a sumar y restar
        $result7 = mysql_query("SELECT * FROM products WHERE id='".$idventa."'", $conexion);    
        $row7 = mysql_fetch_array($result7);
        $producto = $row7['precio']*$row7['cantidad'];

    //Update chart of account
        $result1 = mysql_query("SELECT saldo FROM catalogo WHERE id='".$once."'", $conexion);    
        $row1 = mysql_fetch_array($result1);
        $newsaldoa = $row1['saldo'];
        $newsaldoa = $newsaldoa - $producto;

        $result2 = mysql_query("SELECT saldo FROM catalogo WHERE id='".$cincuenta."'", $conexion);    
        $row2 = mysql_fetch_array($result2);
        $newsaldode = $row2['saldo'];
        $newsaldode = $newsaldode - $producto;

                mysql_query("UPDATE catalogo SET saldo='".$newsaldode."'
                WHERE id = '".$cincuenta."' ");
                mysql_query("UPDATE catalogo SET saldo='".$newsaldoa."'
                WHERE id = '".$once."'");

    //Borro fila de account
		$result = mysql_query("DELETE FROM products WHERE id='".$idventa."'", $conexion);

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=production.php">';

?>