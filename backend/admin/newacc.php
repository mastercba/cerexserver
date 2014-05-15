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
    	$addcurr_cuenta = $_SESSION['current_account'];
	//Recupero variables
		$addfecha = $_POST['accfecha'];
		$adddetalle = $_POST['accdetalle'];
		
		$addcuenta = $_POST['acccuenta'];
		//$addingresos = $_POST['accingresos'];
		//$addegresos = $_POST['accegresos'];
	    $addsaldo = $_POST['accsaldo'];		
	
	//Update chart of account
		$result3 = mysql_query("SELECT * FROM catalogo", $conexion);	
		$newsaldode = 0;	$newsaldoa = 0;
		while($row = mysql_fetch_array($result3)){
			if( $addcurr_cuenta == $row['id']){
				$newsaldode = $row['saldo'] - $addsaldo;
				mysql_query("UPDATE catalogo SET saldo='".$newsaldode."'
				WHERE id = '".$addcurr_cuenta."'");
			}
			if( $addcuenta == $row['id']){
				$newsaldoa = $row['saldo'] + $addsaldo;
				mysql_query("UPDATE catalogo SET saldo='".$newsaldoa."'
				WHERE id = '".$addcuenta."'");
			}
		}	

		//$_SESSION['current_account'] = - $addsaldo;	
		
 
		$result = mysql_query(("INSERT INTO account (created_at, descripcion, saldo, curr_cuenta, cuenta)
		 VALUES('$addfecha','$adddetalle','$addsaldo','$addcurr_cuenta','$addcuenta')"), $conexion);

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=account.php">';

?>