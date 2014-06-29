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
		<li class="selected"><a href="/cerexserver/backend/admin/account.php">BALANCE GENERAL</a></li>
		<li><a href="/cerexserver/backend/admin/production.php">COSTOS de PRODUCCION</a></li>
		<li><a href="/cerexserver/backend/admin/control.php">PRODUCCION</a></li>
	</ul>
	<br />
	
<!-- MAIN CONTENT -->

	<section>
				<!-- Leo la base de datos - quick show -->
				<?php
				    $result71 = mysql_query("SELECT saldo FROM catalogo WHERE id='10'", $conexion);    
        			$row71 = mysql_fetch_array($result71);
        			$cajach = $row71['saldo'];
				    $result72 = mysql_query("SELECT saldo FROM catalogo WHERE id='11'", $conexion);    
        			$row72 = mysql_fetch_array($result72);
        			$cbanco = $row72['saldo'];
				    $result73 = mysql_query("SELECT saldo FROM catalogo WHERE id='30'", $conexion);    
        			$row73 = mysql_fetch_array($result73);
        			$capital = $row73['saldo'];
        			$result74 = mysql_query("SELECT saldo FROM catalogo WHERE id='50'", $conexion);    
        			$row74 = mysql_fetch_array($result74);
        			$ventas = $row74['saldo'];
        			$result75 = mysql_query("SELECT saldo FROM catalogo WHERE id='20'", $conexion);    
        			$row75 = mysql_fetch_array($result75);
        			$pasivocp = $row75['saldo'];
        			$result76 = mysql_query("SELECT saldo FROM catalogo WHERE id='21'", $conexion);    
        			$row76 = mysql_fetch_array($result76);
        			$pasivolp = $row76['saldo'];
        			$result78 = mysql_query("SELECT saldo FROM catalogo WHERE id='12'", $conexion);    
        			$row78 = mysql_fetch_array($result78);
        			$util = $row78['saldo'];
				?>
				<!-- End - quick show -->
	    <div id="columna_acc">
		    <div class="wrapper_overview">
		        <div class="events">
		        	<nav>
				  		<ul>
							<li>Caja Chica<span class="badge"><?php echo" ".$cajach." "; ?></span></li>
							<li>Cuenta Banco<span class="badge green"><?php echo" ".$cbanco." "; ?></span></li>
							<li>Cuenta Capital<span class="badge white"><?php echo" ".$capital." "; ?></span></li>
							<li>Ingresos Ventas<span class="badge yellow"><?php echo" ".$ventas." "; ?></span></li>
							<li>Pasivo Corto Plazo<span class="badge red"><?php echo" ".$pasivocp." "; ?></span></li>
							<li>Pasivo Largo Plazo<span class="badge red"><?php echo" ".$pasivolp." "; ?></span></li>
							<li>Utilidades<span class="badge white"><?php echo" ".$util." "; ?></span></li>
				   		</ul>
				   	</nav>
				</div>
			</div>
		</div>
		<br/>
		<div id="columna_izq_acc">
			<table border=0 width=100%>	
				<form action="change_curr_acc.php" method="POST" onChange="autoSubmit();">
					<td>Cuenta(de):</td>
						<td>
						<?php
						$result = mysql_query("SELECT * FROM catalogo order by id", $conexion);
			
						//declare the combo box
						$rows = array();
						$idx = 0;?>
						<select name="name">
							<option value="0"<?php if ($idx==0) echo 'selected="selected"';?>>all</option>;				
						<?php
						//list all of the other elements
						while ($row = mysql_fetch_array($result)){
						      $rows[$idx++] = array('value' => $row['id'], 'text' => $row['descripcion']);?>
						<option value<?php echo"= ".$row['id']." ";?><?php if ($_SESSION['current_account']==$row['id']) echo 'selected="selected"';?>><?php echo" ".$row['id']." ".$row['descripcion']." ";?></option>
						<?php
						}
						//close the combo box
						echo "</select>";
						?>
						</td>
						<td></td>
						<td><input type='image' src='img/tick.png' width='14' height='14' /></td>
					</td>
				</form>
			</table>			
		</div>
		<div id="columna_der_acc">

		</div>
	</section>

<!-- Muestra la TABLA PRINCIPAL de Movimiento en las cuentas - DIARIO GENERAL -->

	<section>
		<div id="table_account">
			<center>					
				<table border=0 width=100%>					
					<tr align=center>
						<td><strong>ID</strong></td>
						<td><strong>Fecha</strong></td>
						<td></td>
						<td align=left><strong>Descripcion</strong></td>
						
						<td align=left><strong>Cuenta</strong></td>
						<!--<td><strong>Income</strong></td>-->
						<!--<td><strong>Expense</strong></td>-->
						<td><strong>Monto(Bs.)</strong></td>
						<td><strong>Acciones</strong></td>
					</tr>
<?php 
		$result = mysql_query("SELECT * FROM account order by created_at", $conexion);	
	
		while($row = mysql_fetch_array($result)){
				    $accid = $row['id'];
				    $accfecha = $row['created_at'];
				    $accdetalle = $row['descripcion'];
				    //$accingresos = $row['ingreso'];
				    //$accegresos = $row['egreso'];
				    $accsaldo = $row['saldo'];
				    //$accsaldo = $accsaldo + ($row['ingreso'] - $row['egreso']);
				    $acccuenta = $row['cuenta'];
				    $acc_curr_cuenta = $row['curr_cuenta'];

					
				    $result20 = mysql_query("SELECT * FROM catalogo WHERE id='".$acccuenta."'", $conexion);    
        			$row20 = mysql_fetch_array($result20);
        			$acccuenta = $row20['descripcion'];
        			

			echo"<tr align=center><td>".$accid."</td><td>".$accfecha."</td>
			<td align=left>".$acc_curr_cuenta."</td>
			<td align=left>".$accdetalle."</td>

			<td align=left>".$acccuenta."</td>
			<td align=right>".$accsaldo."</td>

			<td><a href='#?acid=".$accid."'><img src='img/pencil.png' width='14' height=14'></a>
			|<a href='eliminaracc.php?acid=".$accid."'><img src='img/trash.png' width='14' height=14'></a>
			</td>
			</tr>";			
		}
	//Anadir un registro
			$current_account = $_SESSION['current_account'];
			echo"
				<tr align=center>
					<form action='newacc.php' method = 'POST'>
					<td></td>
					<td><input type='date' name='accfecha' value='' size=8></td>
					<td>$current_account</td>
					<td  align=left><input type='text' name='accdetalle' value='' size=45></td>
					<td  align=left><select name='acccuenta'>
						<option>-----Select-----</option>
						<option value='10'>10-Caja Chica</option>
						<option value='11'>11-Caja de Ahorro Banco</option>
						<option value='12'>12-Cuenta Ganacias Retenidas</option>
						<option value='20'>20-Pasivo a Corto Plazo</option>
						<option value='21'>21-Pasivo a Largo Plazo</option>
						<option value='30'>30-Capital</option>
						<option value='40'>40-Inversion</option>
						<option value='50'>50-Ingreso Ventas</option>
						<option value='60'>60-Gastos Generales Menores</option>
						<option value='70'>70-Costos de Producción Menores</option>
						<option value='71'>71-Energía Electrica</option>
						<option value='72'>72-Suministro Agua</option>
						<option value='73'>73-Semilla</option>
						<option value='74'>74-Nutriente</option>
						<option value='77'>77-Otros</option>
    			    	<option>----------</option>
    			    	</select>
    			    </td>
					<td align=right><input type='text' name='accsaldo' value='' size=7></td>
					<td><p></p><input type='image' src='img/add.png' width='14' height='14'/></td>
				</tr>";

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

