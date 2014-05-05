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
		<li class="selected"><a href="/cerexserver/backend/admin/account.php">ACCOUNTING</a></li>
		<li><a href="/cerexserver/backend/admin/production.php">PRODUCTION COST's</a></li>
		<li><a href="/cerexserver/backend/admin/control.php">PRODUCTION CONTROL</a></li>
	</ul>
	<br />
	
	<!-- MAIN CONTENT -->

				<!-- Leo la base de datos - quick show -->
					<?php 	$ccl_total = 118.00;	$cot_total = 500.50; $schedule_total = 330.00;$completed_total = 1000.02;$hrs_total = 265570;?>
				<!-- End - quick show -->
	    <div class="wrapper_overview">
	        <div class="events">
	        	<nav>
			  		<ul>
						<li>A1.CajaChica<span class="badge"><?php echo" ".$completed_total." "; ?></span></li>
						<li>A2.Banco<span class="badge green"><?php echo" ".$schedule_total." "; ?></span></li>
						<li>A3.Utilidades Retenidas<span class="badge white"><?php echo" ".$schedule_total." "; ?></span></li>
						<li>Total INGRESO(Bs.)<span class="badge yellow"><?php echo" ".$cot_total." "; ?></span></li>
						<li>Total EGRESO(Bs.)<span class="badge red"><?php echo" ".$ccl_total." "; ?></span></li>
						<li>TOTAL(Bs.)<span class="badge white"><?php echo" ".$hrs_total." "; ?></span></li>
			   		</ul>
			   	</nav>
			</div>
		</div>



	<section>
		<div id="table_account">
			<center>					
				<table border=0 width=100%>					
					<tr align=center>
						<td><strong>ID</strong></td>
						<td><strong>Date & Time</strong></td>
						<td align=left><strong>Description</strong></td>
						
						<td><strong>Account OUT</strong></td>
						<td><strong>Account IN</strong></td>
						<td><strong>Income</strong></td>
						<td><strong>Expense</strong></td>
						<td><strong>Balance</strong></td>
	
						<td><strong>Actions</strong></td>
					</tr>
<?php 
		$result = mysql_query("SELECT * FROM account", $conexion);	
	
		$accsaldo = 0;
		while($row = mysql_fetch_array($result)){
				    $accid = $row['id'];
				    $accfecha = $row['created_at'];
				    $accdetalle = $row['descripcion'];

				    $accingresos = $row['ingreso'];
				    $accegresos = $row['egreso'];
				    //$accsaldo = $row['saldo'];
				    
				    $accsaldo = $accsaldo + ($row['ingreso'] - $row['egreso']);
				    $acccuenta = $row['cuenta'];


			echo"<tr align=center><td>".$accid."</td><td>".$accfecha."</td>
			<td align=left>".$accdetalle."</td><td align=left>".$acccuenta."</td>
			<td align=left>".$acccuenta."</td>
			<td align=right>".$accingresos."</td><td align=right>".$accegresos."</td>
			<td align=right>".$accsaldo."</td>

			<td><a href='editacc.php?acid=".$accid."'><img src='img/pencil.png' width='14' height=14'></a>
			|<a href='eliminaracc.php?acid=".$accid."'><img src='img/trash.png' width='14' height=14'></a>
			</td>
			</tr>";			
		}
	//Anadir un registro
			echo"
				<tr align=center>
					<form action='newacc.php' method = 'POST'>
					<td></td>
					<td><input type='date' name='accfecha' value='' size=8></td>
					<td  align=left><input type='text' name='accdetalle' value='' size=45></td>

					<td><select name=acccuenta>
						<option>select</option>
	    				<option>---------</option>
	    				<option>A1-Caja Chica</option>
	    				<option>A2-Banco</option>
	    				<option>A3-Utilidades Retenidas</option>
    			    	<option>---------------</option>
    			    	<option>P1-Pasivo a Corto Plazo</option>
    			    	<option>P2-Pasivo a Largo Plazo</option>
    			    	<option>-----------------------</option>
    			    	<option>C1-Capital Contable</option>
    			    	<option>-------------------</option>
    			    	<option>V1-Ingreso Ventas</option>
    			    	<option>-----------------</option>
						<option>T1-Costo de Produccion</option>
						<option>-----------------</option>
						<option>G1-Gasto de Venta</option>
						<option>G2-Gastos Generales</option>
						<option>-----------------</option>
						<option>I1-Impuestos</option>
						<option>------------</option>
						<option>O1-Cuenta Deudora</option>
						<option>O2-Cuenta Acreedora</option>
    			    	</select></td>

    			    <td><select name=acccuenta>
						<option>select</option>
	    				<option>---------</option>
	    				<option>A1-Caja Chica</option>
	    				<option>A2-Banco</option>
	    				<option>A3-Utilidades Retenidas</option>
    			    	<option>---------------</option>
    			    	<option>P1-Pasivo a Corto Plazo</option>
    			    	<option>P2-Pasivo a Largo Plazo</option>
    			    	<option>-----------------------</option>
    			    	<option>C1-Capital Contable</option>
    			    	<option>-------------------</option>
    			    	<option>V1-Ingreso Ventas</option>
    			    	<option>-----------------</option>
						<option>T1-Costo de Produccion</option>
						<option>-----------------</option>
						<option>G1-Gasto de Venta</option>
						<option>G2-Gastos Generales</option>
						<option>-----------------</option>
						<option>I1-Impuestos</option>
						<option>------------</option>
						<option>O1-Cuenta Deudora</option>
						<option>O2-Cuenta Acreedora</option>
    			    	</select></td>	

					<td align=right><input type='text' name='accingresos' value='' size=7></td>
					<td align=right><input type='text' name='accegresos' value='' size=7></td>
					<td></td>
		
					<td><p></p><input type='image' src='img/add.png' width='14' height=14'/></td>
				</tr>";

		mysql_close($conexion);
?>
				</table>					
			</center>			
		</div> <!-- end content -->
	<br /><br />
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

