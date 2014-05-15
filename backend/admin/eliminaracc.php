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

	$idacc = $_GET['acid'];

    //Recupero el monto a sumar y restar
        $result7 = mysql_query("SELECT saldo FROM account WHERE id='".$idacc."'", $conexion);    
        $row7 = mysql_fetch_array($result7);
        $addsaldo = $row7['saldo'];
    //Busca las 2 cuentas
        $result5 = mysql_query("SELECT curr_cuenta FROM account WHERE id='".$idacc."'", $conexion);    
        $row5 = mysql_fetch_array($result5);
        $sumar = $row5['curr_cuenta'];
        $result6 = mysql_query("SELECT cuenta FROM account WHERE id='".$idacc."'", $conexion);    
        $row6 = mysql_fetch_array($result6);
        $restar = $row6['cuenta'];        
    //Update chart of account
        $result4 = mysql_query("SELECT * FROM catalogo", $conexion);    
        $newsaldode = 0;    $newsaldoa = 0;
        while($row = mysql_fetch_array($result4)){
            if( $restar == $row['id']){
                $newsaldode = $row['saldo'] - $addsaldo;
                mysql_query("UPDATE catalogo SET saldo='".$newsaldode."'
                WHERE id = '".$restar."'");
            }
            if( $sumar == $row['id']){
                $newsaldoa = $row['saldo'] + $addsaldo;
                mysql_query("UPDATE catalogo SET saldo='".$newsaldoa."'
                WHERE id = '".$sumar."'");
            }
        }
    //Borro fila de account
        $result = mysql_query("DELETE FROM account WHERE id='".$idacc."'", $conexion);
    

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=account.php">';

?>