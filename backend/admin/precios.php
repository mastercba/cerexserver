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
	$flag = 0;
	//Recupero variables
	$venta_id = $_GET['vedi'];					//id actual
	$venta_id = $_POST['ventaid']; 					
	$price = $_POST['price'];

		$result9 = mysql_query("SELECT * FROM $products", $conexion);	
		while($row9 = mysql_fetch_array($result9)){
			$products_id = $row9['id'];
			if($products_id == $venta_id){
				mysql_query("UPDATE products SET precio='".$price."' WHERE id = '".$venta_id."'");				
			}else{}
		}

	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=admin.php">';
?>