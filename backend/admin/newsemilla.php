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

	//Recupero variables
		$sfecha = $_POST['semifecha'];
		$sdescripcion = $_POST['semidescripcion'];	
		$sbuy = $_POST['semibuy'];
		$scuenta = $_POST['semicuenta'];
		$segreso = $_POST['semiegreso'];

	//Crear variables
		$ssuma	= $_SESSION['semisuma'];
		$sstock = $_SESSION['semistock'];

	//Update chart of account
        $result1 = mysql_query("SELECT saldo FROM catalogo WHERE id='73'", $conexion);    
        $row1 = mysql_fetch_array($result1);
        $newsaldoa = $row1['saldo'];
        $newsaldoa = $newsaldoa + $ssuma;

        $result2 = mysql_query("SELECT saldo FROM catalogo WHERE id='".$scuenta."'", $conexion);    
        $row2 = mysql_fetch_array($result2);
        $newsaldode = $row2['saldo'];
        $newsaldode = $newsaldode - $ssuma;
				
				mysql_query("UPDATE catalogo SET saldo='".$newsaldode."'
				WHERE id = '".$scuenta."'");
				mysql_query("UPDATE catalogo SET saldo='".$newsaldoa."'
				WHERE id = '73'");		



		$result3 = mysql_query(("INSERT INTO semillas (created_at, descripcion, cant_buy, cant_stock, egreso, de_cuenta)
		 VALUES('$sfecha','$sdescripcion','$sbuy','$sstock','$segreso','$scuenta')"), $conexion);

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=production.php">';

?>