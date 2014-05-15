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

    // update 'lastvisit' date de la db
  
	//Crear variables

	//Recupero variables
		$vfecha = $_POST['ventafecha'];
		$vcant = $_POST['ventacant'];	
		$vmodulo = $_POST['ventamodulo'];
		$vbalance = $_POST['ventabalance'];
		$vprice = $vbalance * $vcant;
		$once = 11; $cincuenta = 50;

	//Update chart of account
        $result1 = mysql_query("SELECT saldo FROM catalogo WHERE id='".$once."'", $conexion);    
        $row1 = mysql_fetch_array($result1);
        $newsaldoa = $row1['saldo'];
        $newsaldoa = $newsaldoa + $vprice;

        $result2 = mysql_query("SELECT saldo FROM catalogo WHERE id='".$cincuenta."'", $conexion);    
        $row2 = mysql_fetch_array($result2);
        $newsaldode = $row2['saldo'];
        $newsaldode = $newsaldode + $vprice;


				mysql_query("UPDATE catalogo SET saldo='".$newsaldode."'
				WHERE id = '".$cincuenta."'");
				mysql_query("UPDATE catalogo SET saldo='".$newsaldoa."'
				WHERE id = '".$once."'");
	
		$result = mysql_query(("INSERT INTO products (created_at, cantidad, modulo, precio)
		 VALUES('$vfecha','$vcant','$vmodulo','$vbalance')"), $conexion);

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=production.php">';

?>