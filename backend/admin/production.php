<?php 

	require("../config.php");

	//recupero variables

	//creo variables
 		$actual_month = $_SESSION['mes'];
		$actual_year = $_SESSION['ano'];    
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>CEREX ANDINA</title>

	<link rel="stylesheet" type="text/css" href="/cerexserver/backend/admin/css/normalize.css"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="/cerexserver/backend/admin/css/estilos_adm.css"/>
	<link rel="shortcut icon" href="/cerexserver/backend/img/favicon.ico">


	<script src="/cerexserver/backend/admin/js/prefixfree.min.js"></script>
	<script src="/cerexserver/backend/admin/js/jquery.js"></script>
	<script src="/cerexserver/backend/admin/js/fluent.js"></script>
	<script src="/cerexserver/backend/admin/js/script.js"></script> 
</head>

<body>
	<div id="top_menu"><!--<menu superior>-->
		<div id="menu">
			<a href="/cerexserver/backend/logout.php" title="Salir!">Logout</a>
		</div>        
	</div>
	<div id="logo"><!--<logo>-->
		<a style="text-decoration: none; margin-left: 12px;" href="http://www.fluentspeaking.com" title="FluentSpeaking">
		    <img style="margin-top: 2px;" height="39" src="/cerexserver/backend/admin/img/logo.png" alt="Fluent Speaking" />
		</a>
	</div>
	<br />
	<ul class="tabrow"><!--- Tabs Menu -->
		<li><a href="/cerexserver/backend/admin/admin.php">WEBPAGE</a></li>
		<li><a href="/cerexserver/backend/admin/account.php">ACCOUNTING</a></li>
		<li class="selected"><a href="/cerexserver/backend/admin/production.php">PRODUCTION COST's</a></li>
		<li><a href="/cerexserver/backend/admin/control.php">PRODUCTION CONTROL</a></li>
	</ul>
	<br />
	
	<!-- MAIN CONTENT -->
		<!-- Quick Show -->
		<!-- Leo la base de datos - quick show -->
					<?php 	$ccl_total = 118.00;	$cot_total = 500.50; $schedule_total = 330.00;$completed_total = 1000.02;$hrs_total = 265570;?>
				<!-- End - quick show -->
	    <div class="wrapper_overview">
	        <div class="events">
	        	<nav>
			  		<ul>
						<li>Energia Electrica<span class="badge"><?php echo" ".$completed_total." "; ?></span></li>
						<li>Suministro Agua<span class="badge green"><?php echo" ".$schedule_total." "; ?></span></li>
						<li>Semillas<span class="badge white"><?php echo" ".$schedule_total." "; ?></span></li>
						<li>Nutrientes<span class="badge yellow"><?php echo" ".$cot_total." "; ?></span></li>
						<li>Otros<span class="badge red"><?php echo" ".$ccl_total." "; ?></span></li>
			   		</ul>
			   	</nav>
			</div>
		</div>

<!-- Energia Electrica -->
	<section>
		<div id="table_production">
				<table border=0 width=100%>					
					<tr align=center>
						<td align=left><strong><u>ENERGIA ELECTRICA (71)</u></strong></td><tr></tr>
						<td><strong>Date & Time</strong></td>
						<td><strong>Periodo</strong></td>
						<td align=left><strong>Consumo</strong></td>
						<td align=left><strong>Account</strong></td>
						<td align=left><strong>Expense</strong></td>
						<td align=left><strong>Balance</strong></td>
						<td><strong>Actions</strong></td>
					</tr>

<?php 
		$result = mysql_query("SELECT * FROM luz", $conexion);	
	
		while($row = mysql_fetch_array($result)){
				    $luzid = $row['id'];
				    $luzegreso = $row['egreso'];
				    $_SESSION['luzsaldo'] = $row['saldo'];
				    $luzsaldo = $row['saldo'];
				    $luzperiodo = $row['periodo'];
				    $luzfecha = $row['created_at'];
				    $luzcuenta = $row['de_cuenta'];
				    $luzconsumo = $row['consumo'];

			echo"<tr align=center><td>".$luzfecha."</td><td>".$luzperiodo."</td>
			<td align=left>".$luzconsumo."</td><td align=left>".$luzcuenta."</td>
			<td align=left>".$luzegreso."</td><td align=left>".$luzsaldo."</td>
			<td><a href='editacc.php?luid=".$luzid."'><img src='img/pencil.png' width='14' height=14'></a>
			|<a href='eliminarluz.php?luid=".$luzid."'><img src='img/trash.png' width='14' height=14'></a>
			</td>
			</tr>";			
		}
	//Anadir un registro
			echo"
				<tr align=center>
					<form action='newluz.php' method = 'POST'>
					<td><input type='date' name='luzfecha' value='' size=8></td>
					<td  align=center><input type='text' name='luzperiodo' value='' size=15></td>
					<td  align=left><input type='text' name='luzconsumo' value='' size=10></td>
					<td  align=left><select name=luzcuenta>
						<option>select</option>
	    				<option>---------</option>
	    				<option>10-Caja Chica</option>
	    				<option>10</option>
	    				<option>20-Banco</option>
    			    	<option>20</option>
    			    	<option>---------</option>
    			    	</select></td>
					<td align=left><input type='text' name='luzegreso' value='' size=7></td>
					<td></td>
					<td><p></p><input type='image' src='img/add.png' width='14' height=14'/></td>
				</tr>";

		//mysql_close($conexion);
?>
				</table>

		</div>
	</section>

<!-- Suministro de Agua -->
	<section>
		<div id="table_production">
				<table border=0 width=100%>					
					<tr align=center>
						<td align=left><strong><u>SUMINISTRO AGUA (72)</u></strong></td><tr></tr>
						<td><strong>Date & Time</strong></td>
						<td><strong>Periodo</strong></td>
						<td align=left><strong>Consumo</strong></td>
						<td align=left><strong>Account</strong></td>
						<td align=left><strong>Expense</strong></td>
						<td align=left><strong>Balance</strong></td>
						<td><strong>Actions</strong></td>
					</tr>

<?php 
		$result1 = mysql_query("SELECT * FROM agua", $conexion);	

		while($row1 = mysql_fetch_array($result1)){
				    $aguaid = $row1['id'];
				    $aguaegreso = $row1['egreso'];
				    $_SESSION['aguasaldo'] = $row1['saldo'];
				    $aguasaldo = $row1['saldo'];
				    $aguaperiodo = $row1['periodo'];
				    $aguafecha = $row1['created_at'];
				    $aguacuenta = $row1['de_cuenta'];
				    $aguaconsumo = $row1['consumo'];

			echo"<tr align=center><td>".$aguafecha."</td><td>".$aguaperiodo."</td>
			<td align=left>".$aguaconsumo."</td><td align=left>".$aguacuenta."</td>
			<td align=left>".$aguaegreso."</td><td align=left>".$aguasaldo."</td>
			<td><a href='editacc.php?aguid=".$aguaid."'><img src='img/pencil.png' width='14' height=14'></a>
			|<a href='eliminaragua.php?aguid=".$aguaid."'><img src='img/trash.png' width='14' height=14'></a>
			</td>
			</tr>";			
		}
	//Anadir un registro
			echo"
				<tr align=center>
					<form action='newluz.php' method = 'POST'>
					<td><input type='date' name='luzfecha' value='' size=8></td>
					<td  align=center><input type='text' name='luzperiodo' value='' size=15></td>
					<td  align=left><input type='text' name='luzconsumo' value='' size=10></td>
					<td  align=left><select name=luzcuenta>
						<option>select</option>
	    				<option>---------</option>
	    				<option>10-Caja Chica</option>
	    				<option>10</option>
	    				<option>20-Banco</option>
    			    	<option>20</option>
    			    	<option>---------</option>
    			    	</select></td>
					<td align=left><input type='text' name='luzegreso' value='' size=7></td>
					<td></td>
					<td><p></p><input type='image' src='img/add.png' width='14' height=14'/></td>
				</tr>";

		//mysql_close($conexion);
?>
				</table>

		</div>
	</section>

<!-- Semillas -->
	<section>
		<div id="table_production">
				<table border=0 width=100%>					
					<tr align=center>
						<td align=left><strong><u>SEMILLA (73)</u></strong></td><tr></tr>
						<td><strong>Date & Time</strong></td>
						<td><strong>Decription</strong></td>
						<td align=left><strong>Qtty BUY</strong></td>
						<td align=left><strong>Qtty USED</strong></td>
						<td align=left><strong>Qtty STOCK</strong></td>
						<td align=left><strong>Account</strong></td>
						<td align=left><strong>Expense</strong></td>
						<td align=left><strong>Balance</strong></td>
						<td><strong>Actions</strong></td>
					</tr>

<?php 
		$result2 = mysql_query("SELECT * FROM semillas", $conexion);	

		while($row2 = mysql_fetch_array($result2)){
				    $semiid = $row2['id'];
				    $semiegreso = $row2['egreso'];
				    $_SESSION['semisaldo'] = $row2['saldo'];
				    $semisaldo = $row2['saldo'];
				    $semibuy = $row2['cant_buy'];
				    $semiused = $row2['cant_used'];
				    $semistock = $row2['cant_stock'];
				    $semifecha = $row2['created_at'];
				    $semicuenta = $row2['de_cuenta'];
				    $semidesp = $row2['descripcion'];

			echo"<tr align=center><td>".$semifecha."</td><td>".$semidesp."</td>
			<td align=left>".$semibuy."</td><td align=left>".$semiused."</td><td align=left>".$semistock."</td>
			<td align=left>".$semicuenta."</td><td align=left>".$semiegreso."</td><td align=left>".$semisaldo."</td>
			<td><a href='editacc.php?aguid=".$semiid."'><img src='img/pencil.png' width='14' height=14'></a>
			|<a href='eliminarsemi.php?aguid=".$semiid."'><img src='img/trash.png' width='14' height=14'></a>
			</td>
			</tr>";			
		}
	//Anadir un registro
			echo"
				<tr align=center>
					<form action='newluz.php' method = 'POST'>
					<td><input type='date' name='luzfecha' value='' size=8></td>
					<td  align=center><input type='text' name='luzperiodo' value='' size=15></td>
					<td  align=left><input type='text' name='luzconsumo' value='' size=10></td>
					<td></td><td></td>
					<td  align=left><select name=luzcuenta>
						<option>select</option>
	    				<option>---------</option>
	    				<option>10-Caja Chica</option>
	    				<option>10</option>
	    				<option>20-Banco</option>
    			    	<option>20</option>
    			    	<option>---------</option>
    			    	</select></td>
					<td align=left><input type='text' name='luzegreso' value='' size=7></td>
					<td></td>
					<td><p></p><input type='image' src='img/add.png' width='14' height=14'/></td>
				</tr>";
	//Usar un registro
			echo"
				<tr align=center>
					<form action='newluz.php' method = 'POST'>
					<td><input type='date' name='luzfecha' value='' size=8></td>
					<td  align=center><input type='text' name='luzperiodo' value='' size=15></td>
					<td></td>
					<td  align=left><input type='text' name='luzconsumo' value='' size=10></td>
					<td></td>
    			    <td></td>	
					<td></td>
					<td></td>
					<td><p></p><input type='image' src='img/cross.png' width='14' height=14'/></td>
				</tr>";

		//mysql_close($conexion);
?>
				</table>

		</div>
	</section>

<!-- Nutrientes -->
	<section>
		<div id="table_production">
				<table border=0 width=100%>					
					<tr align=center>
						<td align=left><strong><u>NUTRIENTE (74)</u></strong></td><tr></tr>
						<td><strong>Date & Time</strong></td>
						<td><strong>Decription</strong></td>
						<td align=left><strong>Qtty BUY</strong></td>
						<td align=left><strong>Qtty USED</strong></td>
						<td align=left><strong>Qtty STOCK</strong></td>
						<td align=left><strong>Account</strong></td>
						<td align=left><strong>Expense</strong></td>
						<td align=left><strong>Balance</strong></td>
						<td><strong>Actions</strong></td>
					</tr>

<?php 
		$result3 = mysql_query("SELECT * FROM nutriente", $conexion);	

		while($row3 = mysql_fetch_array($result3)){
				    $nutriid = $row3['id'];
				    $nutriegreso = $row3['egreso'];
				    $_SESSION['semisaldo'] = $row3['saldo'];
				    $nutrisaldo = $row3['saldo'];
				    $nutribuy = $row3['cant_buy'];
				    $nutriused = $row3['cant_used'];
				    $nutristock = $row3['cant_stock'];
				    $nutrifecha = $row3['created_at'];
				    $nutricuenta = $row3['de_cuenta'];
				    $nutridesp = $row3['descripcion'];

			echo"<tr align=center><td>".$nutrifecha."</td><td>".$nutridesp."</td>
			<td align=left>".$nutribuy."</td><td align=left>".$nutriused."</td><td align=left>".$nutristock."</td>
			<td align=left>".$nutricuenta."</td><td align=left>".$nutriegreso."</td><td align=left>".$nutrisaldo."</td>
			<td><a href='editacc.php?aguid=".$nutriid."'><img src='img/pencil.png' width='14' height=14'></a>
			|<a href='eliminarsemi.php?aguid=".$nutriid."'><img src='img/trash.png' width='14' height=14'></a>
			</td>
			</tr>";			
		}
	//Anadir un registro
			echo"
				<tr align=center>
					<form action='newluz.php' method = 'POST'>
					<td><input type='date' name='luzfecha' value='' size=8></td>
					<td  align=center><input type='text' name='luzperiodo' value='' size=15></td>
					<td  align=left><input type='text' name='luzconsumo' value='' size=10></td>
					<td></td><td></td>
					<td  align=left><select name=luzcuenta>
						<option>select</option>
	    				<option>---------</option>
	    				<option>10-Caja Chica</option>
	    				<option>10</option>
	    				<option>20-Banco</option>
    			    	<option>20</option>
    			    	<option>---------</option>
    			    	</select></td>
					<td align=left><input type='text' name='luzegreso' value='' size=7></td>
					<td></td>
					<td><p></p><input type='image' src='img/add.png' width='14' height=14'/></td>
				</tr>";
	//Usar un registro
			echo"
				<tr align=center>
					<form action='newluz.php' method = 'POST'>
					<td><input type='date' name='luzfecha' value='' size=8></td>
					<td  align=center><input type='text' name='luzperiodo' value='' size=15></td>
					<td></td>
					<td  align=left><input type='text' name='luzconsumo' value='' size=10></td>
					<td></td>
    			    <td></td>	
					<td></td>
					<td></td>
					<td><p></p><input type='image' src='img/cross.png' width='14' height=14'/></td>
				</tr>";

		//mysql_close($conexion);
?>
				</table>

		</div>
	</section>

	
<!-- FOOTER -->
	<div id="footer">
		<p>Copyright 2014 &copy;<a href="http://www.quanticasoft.com/cerexserver">CEREX ANDINA</a>. All rights reserved.</p>
		<!--<p><strong>AdminPortal </strong> by &copy;<a href="http://www.fluentspeaking.com"> QUANTICA SOFT, LLC</a></p>-->
	</div> 
<!-- end footer -->

</body>
</html>

<!-- end webPage -->