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
		$lfecha = $_POST['luzfecha'];
		$lperiodo = $_POST['luzperiodo'];	
		$lconsumo = $_POST['luzconsumo'];
		$lcuenta = $_POST['acccuenta'];
		$legreso = $_POST['luzegreso'];
		$lsuma	= $_SESSION['luzsuma'];
		$sieteuno = 71;

	//Update chart of account
        $result1 = mysql_query("SELECT saldo FROM catalogo WHERE id='".$sieteuno."'", $conexion);    
        $row1 = mysql_fetch_array($result1);
        $newsaldoa = $row1['saldo'];
        $newsaldoa = $newsaldoa + $legreso;

        $result2 = mysql_query("SELECT saldo FROM catalogo WHERE id='".$lcuenta."'", $conexion);    
        $row2 = mysql_fetch_array($result2);
        $newsaldode = $row2['saldo'];
        $newsaldode = $newsaldode - $legreso;
				
				mysql_query("UPDATE catalogo SET saldo='".$newsaldode."'
				WHERE id = '".$lcuenta."'");
				mysql_query("UPDATE catalogo SET saldo='".$newsaldoa."'
				WHERE id = '".$sieteuno."'");

	
		$result = mysql_query(("INSERT INTO luz (created_at, periodo, consumo, egreso, de_cuenta)
		 VALUES('$lfecha','$lperiodo','$lconsumo','$legreso','$lcuenta')"), $conexion);

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=production.php">';

?>