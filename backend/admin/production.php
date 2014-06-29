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
		<li><a href="/cerexserver/backend/admin/admin.php">OVERVIEW</a></li>
		<li><a href="/cerexserver/backend/admin/account.php">BALANCE GENERAL</a></li>
		<li class="selected"><a href="/cerexserver/backend/admin/production.php">COSTOS de PRODUCCION</a></li>
		<li><a href="/cerexserver/backend/admin/control.php">PRODUCCION</a></li>
	</ul>
	<br />
	
	<!-- MAIN CONTENT -->
<!-- Quick Show -->
		<!-- Leo la base de datos - quick show -->
			<?php 	
        $result121 = mysql_query("SELECT saldo FROM catalogo WHERE id='50'", $conexion);    
        $row121 = mysql_fetch_array($result121);
        $ventas = $row121['saldo'];
        $result122 = mysql_query("SELECT saldo FROM catalogo WHERE id='71'", $conexion);    
        $row122 = mysql_fetch_array($result122);
        $luz_total = $row122['saldo'];
        $result123 = mysql_query("SELECT saldo FROM catalogo WHERE id='72'", $conexion);    
        $row123 = mysql_fetch_array($result123);
        $agua_total = $row123['saldo'];
        $result124 = mysql_query("SELECT saldo FROM catalogo WHERE id='73'", $conexion);    
        $row124 = mysql_fetch_array($result124);
        $semilla_total = $row124['saldo'];
        $result125 = mysql_query("SELECT saldo FROM catalogo WHERE id='74'", $conexion);    
        $row125 = mysql_fetch_array($result125);
        $nutriente_total = $row125['saldo'];
        $result126 = mysql_query("SELECT saldo FROM catalogo WHERE id='77'", $conexion);    
        $row126 = mysql_fetch_array($result126);
        $otross = $row126['saldo'];

			//$ventas = $_SESSION['ventasuma']; 
			//	$luz_total = $_SESSION['luzsuma'];	$agua_total = $_SESSION['aguasuma']; 
			//	$semilla_total = $_SESSION['semistock'];  $nutriente_total = $_SESSION['nutristock'];
			?>
<!-- End - quick show -->
	    <div class="wrapper_overview">
	        <div class="events">
	        	<nav>
			  		<ul>
			  			<li>Ingresos Ventas<span class="badge"><?php echo" ".$ventas." "; ?></span></li>
						<li>Energia Electrica<span class="badge yellow"><?php echo" ".$luz_total." "; ?></span></li>
						<li>Suministro Agua<span class="badge green"><?php echo" ".$agua_total." "; ?></span></li>
						<li>Semillas<span class="badge white"><?php echo" ".$semilla_total." "; ?></span></li>
						<li>Nutrientes<span class="badge red"><?php echo" ".$nutriente_total." "; ?></span></li>
						<li>Otros Produccion<span class="badge blue"><?php echo" ".$otross." "; ?></span></li>
			   		</ul>
			   	</nav>
			</div>
		</div>

<!-- Energia Electrica -->
	<section>
		<div id="table_production">
				<table border=0 width=100%>					
					<tr align=center>
						<td align=left><strong><u>ENERGIA ELECTRICA</u></strong></td><tr></tr>
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
		$luzsuma = 0;
		while($row = mysql_fetch_array($result)){
				    $luzid = $row['id'];
				    $luzegreso = $row['egreso'];
				    $luzsuma = $luzsuma + $luzegreso; 

				    $_SESSION['luzsuma'] = $luzsuma;

				    $luzperiodo = $row['periodo'];
				    $luzfecha = $row['created_at'];
				    $luzcuenta = $row['de_cuenta'];
				    $luzconsumo = $row['consumo'];

			echo"<tr align=center><td>".$luzfecha."</td><td>".$luzperiodo."</td>
			<td align=left>".$luzconsumo."</td><td align=left>".$luzcuenta."</td>
			<td align=left>".$luzegreso."</td><td align=left>".$luzsuma."</td>
			<td><a href='editluz.php?luid=".$luzid."'><img src='img/pencil.png' width='14' height=14'></a>
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
					<td  align=left><select name='acccuenta'>
						<option>-----Select-----</option>
						<option value='10'>Caja Chica</option>
						<option value='11'>Caja de Ahorro Banco</option>
    			    	<option>----------</option>
    			    	</select>
    			    </td>
					<td align=left><input type='text' name='luzegreso' value='' size=7></td>
					<td></td>
					<td><p></p><input type='image' src='img/add.png' width='14' height=14'/></td>
					</form>
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
						<td align=left><strong><u>SUMINISTRO AGUA</u></strong></td><tr></tr>
						<td><strong>Date & Time</strong></td>
						<td><strong>Periodo</strong></td>
						<td align=left><strong>Consumo</strong></td>
						<td align=left><strong>Account</strong></td>
						<td align=left><strong>Expense</strong></td>
						<td align=left><strong>Balance</strong></td>
						<td><strong>Actions</strong></td>
					</tr>

<?php 
		$result11 = mysql_query("SELECT * FROM agua", $conexion);	
		$aguasuma = 0;
		while($row11 = mysql_fetch_array($result11)){
				    $aguaid = $row11['id'];
				    $aguaegreso = $row11['egreso'];

				    $aguasuma = $aguasuma + $aguaegreso;
				    $_SESSION['aguasuma'] = $aguasuma;

				    $aguaperiodo = $row11['periodo'];
				    $aguafecha = $row11['created_at'];
				    $aguacuenta = $row11['de_cuenta'];
				    $aguaconsumo = $row11['consumo'];

			echo"<tr align=center><td>".$aguafecha."</td><td>".$aguaperiodo."</td>
			<td align=left>".$aguaconsumo."</td><td align=left>".$aguacuenta."</td>
			<td align=left>".$aguaegreso."</td><td align=left>".$aguasuma."</td>
			<td><a href='editagua.php?aguid=".$aguaid."'><img src='img/pencil.png' width='14' height=14'></a>
			|<a href='eliminaragua.php?aguid=".$aguaid."'><img src='img/trash.png' width='14' height=14'></a>
			</td>
			</tr>";			
		}
	//Anadir un registro
			echo"
				<tr align=center>
					<form action='newagua.php' method = 'POST'>
					<td><input type='date' name='aguafecha' value='' size=8></td>
					<td  align=center><input type='text' name='aguaperiodo' value='' size=15></td>
					<td  align=left><input type='text' name='aguaconsumo' value='' size=10></td>
					<td  align=left><select name='aguacuenta'>
						<option>-----Select-----</option>
						<option value='10'>Caja Chica</option>
						<option value='11'>Caja de Ahorro Banco</option>
    			    	<option>----------</option>
    			    	</select>
    			    </td>
					<td align=left><input type='text' name='aguaegreso' value='' size=7></td>
					<td></td>
					<td><p></p><input type='image' src='img/add.png' width='14' height=14'/></td>
					</form>
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
						<td align=left><strong><u>SEMILLA</u></strong></td><tr></tr>
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
		$semisuma = 0;
		$semiaddstock = 0;
		$semireststock = 0;
		while($row2 = mysql_fetch_array($result2)){
				    $semiid = $row2['id'];
				    $semiegreso = $row2['egreso'];
				    $semidesp = $row2['descripcion'];
				    $semifecha = $row2['created_at'];
				    $semicuenta = $row2['de_cuenta'];
				    $semibuy = $row2['cant_buy'];
				    $semiused = $row2['cant_used'];
				    

				    $semisuma = $semisuma + $semiegreso; 
				    $_SESSION['semisuma'] = $semisuma;

				    $semiaddstock = $semiaddstock + $semibuy; 
				    $_SESSION['semiaddstock'] = $semiaddstock;
				    $semireststock = $semireststock + $semiused; 
				    $_SESSION['semireststock'] = $semireststock;				    				    
				    $semistock = $semiaddstock - $semireststock;
				    $_SESSION['semistock'] = $semiaddstock - $semireststock;				    

			echo"<tr align=center><td>".$semifecha."</td><td>".$semidesp."</td>
			<td align=left>".$semibuy."</td><td align=left>".$semiused."</td><td align=left>".$semistock."</td>
			<td align=left>".$semicuenta."</td><td align=left>".$semiegreso."</td><td align=left>".$semisuma."</td>
			<td><a href='editsemi.php?semiid=".$semiid."'><img src='img/pencil.png' width='14' height=14'></a>
			|<a href='eliminarsemi.php?semiid=".$semiid."'><img src='img/trash.png' width='14' height=14'></a>
			</td>
			</tr>";			
		}
	//Anadir un registro
			echo"
				<tr align=center>
					<form action='newsemilla.php' method = 'POST'>
					<td><input type='date' name='semifecha' value='' size=8></td>
					<td  align=center><input type='text' name='semidescripcion' value='' size=15></td>
					<td  align=left><input type='text' name='semibuy' value='' size=10></td>
					<td></td><td></td>
					<td  align=left><select name=semicuenta>
						<option>-----Select-----</option>
						<option value='10'>Caja Chica</option>
						<option value='11'>Caja de Ahorro Banco</option>
    			    	<option>----------</option>
    			    	</select>
    			    </td>
					<td align=left><input type='text' name='semiegreso' value='' size=7></td>
					<td></td>
					<td><p></p><input type='image' src='img/add.png' width='14' height=14'/></td>
					</form>
				</tr>";
	//Usar un registro
			echo"
				<tr align=center>
					<form action='usedsemilla.php' method = 'POST'>
					<td><input type='date' name='semifecha' value='' size=8></td>
					<td  align=center><input type='text' name='semidescripcion' value='' size=15></td>
					<td></td>
					<td  align=left><input type='text' name='semiused' value='' size=10></td>
					<td></td>
    			    <td></td>	
					<td></td>
					<td></td>
					<td><p></p><input type='image' src='img/cross.png' width='14' height=14'/></td>
					</form>
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
						<td align=left><strong><u>NUTRIENTE</u></strong></td><tr></tr>
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
		$nutrisuma = 0;
		$nutriaddstock = 0;
		$nutrireststock = 0;
		while($row3 = mysql_fetch_array($result3)){
				    $nutriid = $row3['id'];
				    $nutriegreso = $row3['egreso'];
				    $nutridesp = $row3['descripcion'];
				    $nutrifecha = $row3['created_at'];
				    $nutricuenta = $row3['de_cuenta'];
				    $nutribuy = $row3['cant_buy'];
				    $nutriused = $row3['cant_used'];
				    

				    $nutrisuma = $nutrisuma + $nutriegreso; 
				    $_SESSION['nutrisuma'] = $nutrisuma;

				    $nutriaddstock = $nutriaddstock + $nutribuy; 
				    $_SESSION['nutriaddstock'] = $nutriaddstock;
				    $nutrireststock = $nutrireststock + $nutriused; 
				    $_SESSION['nutrireststock'] = $nutrireststock;				    				    
				    $nutristock = $nutriaddstock - $nutrireststock;
				    $_SESSION['nutristock'] = $nutriaddstock - $nutrireststock;	


			echo"<tr align=center><td>".$nutrifecha."</td><td>".$nutridesp."</td>
			<td align=left>".$nutribuy."</td><td align=left>".$nutriused."</td><td align=left>".$nutristock."</td>
			<td align=left>".$nutricuenta."</td><td align=left>".$nutriegreso."</td><td align=left>".$nutrisuma."</td>
			<td><a href='editnutri.php?nutriid=".$nutriid."'><img src='img/pencil.png' width='14' height=14'></a>
			|<a href='eliminarnutri.php?nutriid=".$nutriid."'><img src='img/trash.png' width='14' height=14'></a>
			</td>
			</tr>";				
		}
	//Anadir un registro
			echo"
				<tr align=center>
					<form action='newnutri.php' method = 'POST'>
					<td><input type='date' name='nutrifecha' value='' size=8></td>
					<td  align=center><input type='text' name='nutridescripcion' value='' size=15></td>
					<td  align=left><input type='text' name='nutribuy' value='' size=10></td>
					<td></td><td></td>
					<td  align=left><select name=nutricuenta>
						<option>-----Select-----</option>
						<option value='10'>Caja Chica</option>
						<option value='11'>Caja de Ahorro Banco</option>
    			    	<option>----------</option>
    			    	</select>
    			    </td>
					<td align=left><input type='text' name='nutriegreso' value='' size=7></td>
					<td></td>
					<td><p></p><input type='image' src='img/add.png' width='14' height=14'/></td>
					</form>
				</tr>";
	//Usar un registro
			echo"
				<tr align=center>
					<form action='usednutriente.php' method = 'POST'>
					<td><input type='date' name='nutrifecha' value='' size=8></td>
					<td  align=center><input type='text' name='nutridescripcion' value='' size=15></td>
					<td></td>
					<td  align=left><input type='text' name='nutriused' value='' size=10></td>
					<td></td>
    			    <td></td>	
					<td></td>
					<td></td>
					<td><p></p><input type='image' src='img/cross.png' width='14' height=14'/></td>
					</form>
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