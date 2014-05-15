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
		$afecha = $_POST['aguafecha'];
		$aperiodo = $_POST['aguaperiodo'];	
		$aconsumo = $_POST['aguaconsumo'];
		$acuenta = $_POST['aguacuenta'];
		$aegreso = $_POST['aguaegreso'];
		$asuma	= $_SESSION['aguasuma'];
		$sieteuno = 72;

	//Update chart of account
        $result1 = mysql_query("SELECT saldo FROM catalogo WHERE id='".$sieteuno."'", $conexion);    
        $row1 = mysql_fetch_array($result1);
        $newsaldoa = $row1['saldo'];
        $newsaldoa = $newsaldoa + $aegreso;

        $result2 = mysql_query("SELECT saldo FROM catalogo WHERE id='".$acuenta."'", $conexion);    
        $row2 = mysql_fetch_array($result2);
        $newsaldode = $row2['saldo'];
        $newsaldode = $newsaldode - $aegreso;
				
				mysql_query("UPDATE catalogo SET saldo='".$newsaldode."'
				WHERE id = '".$acuenta."'");
				mysql_query("UPDATE catalogo SET saldo='".$newsaldoa."'
				WHERE id = '".$sieteuno."'");		



		$result2 = mysql_query(("INSERT INTO agua (created_at, periodo, consumo, egreso, de_cuenta)
		 VALUES('$afecha','$aperiodo','$aconsumo','$aegreso','$acuenta')"), $conexion);

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=production.php">';

?>