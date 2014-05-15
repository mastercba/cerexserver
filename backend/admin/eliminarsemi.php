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

	$idsemilla = $_GET['semiid'];

    $once = 73; 
    //Recupero el monto a sumar y restar
        $result7 = mysql_query("SELECT * FROM semillas WHERE id='".$idsemilla."'", $conexion);    
        $row7 = mysql_fetch_array($result7);
        $monto = $row7['egreso'];
        $de = $row7['de_cuenta'];

    if($monto == 0){
    //Borro fila de agua         
        $result = mysql_query("DELETE FROM semillas WHERE id='".$idsemilla."'", $conexion);

        echo '<meta HTTP-EQUIV="REFRESH" content="0; url=production.php">';

    }else{
  
    //Update chart of account
        $result1 = mysql_query("SELECT saldo FROM catalogo WHERE id='".$once."'", $conexion);    
        $row1 = mysql_fetch_array($result1);
        $newsaldoa = $row1['saldo'];
        $newsaldoa = $newsaldoa - $monto;

        $result2 = mysql_query("SELECT saldo FROM catalogo WHERE id='".$de."'", $conexion);    
        $row2 = mysql_fetch_array($result2);
        $newsaldode = $row2['saldo'];
        $newsaldode = $newsaldode + $monto;
                
                mysql_query("UPDATE catalogo SET saldo='".$newsaldode."'
                WHERE id = '".$de."' ");
                mysql_query("UPDATE catalogo SET saldo='".$newsaldoa."'
                WHERE id = '".$once."'");

    //Borro fila de agua     
		$result = mysql_query("DELETE FROM semillas WHERE id='".$idsemilla."'", $conexion);

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=production.php">';
    }      
?>