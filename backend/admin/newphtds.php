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
		$lfechaleida = $_POST['fechaleida'];
		$lph_am = $_POST['ph_am'];	
		$lph_pm = $_POST['ph_pm'];
		$ltds_am = $_POST['tds_am'];
		$ltds_pm = $_POST['tds_pm'];

	//Update table:phtds
	
		$result = mysql_query(("INSERT INTO phtdsm1 (fecha, pham, phpm, tdsam, tdspm)
		 VALUES('$lfechaleida','$lph_am','$lph_pm','$ltds_am','$ltds_pm')"), $conexion);

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';

?>