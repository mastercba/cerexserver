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
	$modulo = $_SESSION['modulo'];

	//Recupero variables
	$content = $_POST['content']; 					//get posted data
	$precio = trim($content);

	$result9 = mysql_query("SELECT * FROM products", $conexion);	
	while($row9 = mysql_fetch_array($result9)){
		$id_leido = $row9['id'];
		$flag_leido =	$row9['flag'];
		if($flag_leido == 1 OR $flag_leido == 3){
			//inserto el precio
			mysql_query("UPDATE products SET precio='".$precio."' WHERE id = '".$id_leido."'");
			//flag =3: puede editar y/o archiar
			mysql_query("UPDATE products SET flag='3' WHERE id = '".$id_leido."'");
		}else{}
	}

	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=admin.php">';
?>