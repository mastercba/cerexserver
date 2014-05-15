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
		$nfecha = $_POST['nutrifecha'];
		$ndescripcion = $_POST['nutridescripcion'];	
		$nbuy = $_POST['nutribuy'];
		$ncuenta = $_POST['nutricuenta'];
		$negreso = $_POST['nutriegreso'];

	//Crear variables
		$nsuma	= $_SESSION['nutrisuma'];
		$nstock = $_SESSION['nutristock'];

		$sieteuno = 74;

	//Update chart of account
        $result1 = mysql_query("SELECT saldo FROM catalogo WHERE id='74'", $conexion);    
        $row1 = mysql_fetch_array($result1);
        $newsaldoa = $row1['saldo'];
        $newsaldoa = $newsaldoa + $nsuma;

        $result2 = mysql_query("SELECT saldo FROM catalogo WHERE id='".$ncuenta."'", $conexion);    
        $row2 = mysql_fetch_array($result2);
        $newsaldode = $row2['saldo'];
        $newsaldode = $newsaldode - $nsuma;
				
				mysql_query("UPDATE catalogo SET saldo='".$newsaldode."'
				WHERE id = '".$ncuenta."'");
				mysql_query("UPDATE catalogo SET saldo='".$newsaldoa."'
				WHERE id = '74'");	


		$result3 = mysql_query(("INSERT INTO nutriente (created_at, descripcion, cant_buy, cant_stock, egreso, de_cuenta)
		 VALUES('$nfecha','$ndescripcion','$nbuy','$nstock','$negreso','$ncuenta')"), $conexion);

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=production.php">';

?>