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
		<li class="selected"><a href="/cerexserver/backend/admin/admin.php">OVERVIEW</a></li>
		<li><a href="/cerexserver/backend/admin/account.php">BALANCE GENERAL</a></li>
		<li><a href="/cerexserver/backend/admin/production.php">COSTOS de PRODUCCION</a></li>
		<li><a href="/cerexserver/backend/admin/control.php">PRODUCCION</a></li>		
	</ul>
	<br />
	
	<!-- MAIN CONTENT -->
	<section>
				<!-- Leo la base de datos - quick show -->
				<?php
				    $result1 = mysql_query("SELECT saldo FROM catalogo WHERE id='10'", $conexion);    
        			$row1 = mysql_fetch_array($result1);
        			$cach = $row1['saldo'];
				    $result2 = mysql_query("SELECT saldo FROM catalogo WHERE id='11'", $conexion);    
        			$row2 = mysql_fetch_array($result2);
        			$cuba = $row2['saldo'];
				    $result3 = mysql_query("SELECT saldo FROM catalogo WHERE id='12'", $conexion);    
        			$row3 = mysql_fetch_array($result3);
        			$gare = $row3['saldo'];
        			$result4 = mysql_query("SELECT saldo FROM catalogo WHERE id='20'", $conexion);    
        			$row4 = mysql_fetch_array($result4);
        			$copl = $row4['saldo'];
        			$result5 = mysql_query("SELECT saldo FROM catalogo WHERE id='21'", $conexion);    
        			$row5 = mysql_fetch_array($result5);
        			$lapl = $row5['saldo'];
        			$result6 = mysql_query("SELECT saldo FROM catalogo WHERE id='30'", $conexion);    
        			$row6 = mysql_fetch_array($result6);
        			$cuca = $row6['saldo'];
        			$result7 = mysql_query("SELECT saldo FROM catalogo WHERE id='40'", $conexion);    
        			$row7 = mysql_fetch_array($result7);
        			$inv = $row7['saldo'];
        			$result8 = mysql_query("SELECT saldo FROM catalogo WHERE id='50'", $conexion);    
        			$row8 = mysql_fetch_array($result8);
        			$inve = $row8['saldo'];
        			$result9 = mysql_query("SELECT saldo FROM catalogo WHERE id='60'", $conexion);    
        			$row9 = mysql_fetch_array($result9);
        			$gage = $row9['saldo'];
        			$result10 = mysql_query("SELECT saldo FROM catalogo WHERE id='70'", $conexion);    
        			$row10 = mysql_fetch_array($result10);
        			$copr = $row10['saldo'];
        			$result11 = mysql_query("SELECT saldo FROM catalogo WHERE id='71'", $conexion);    
        			$row11 = mysql_fetch_array($result11);
        			$enel = $row11['saldo'];
        			$result12 = mysql_query("SELECT saldo FROM catalogo WHERE id='72'", $conexion);    
        			$row12 = mysql_fetch_array($result12);
        			$suag = $row12['saldo'];
        			$result13 = mysql_query("SELECT saldo FROM catalogo WHERE id='73'", $conexion);    
        			$row13 = mysql_fetch_array($result13);
        			$semi = $row13['saldo'];
        			$result14 = mysql_query("SELECT saldo FROM catalogo WHERE id='74'", $conexion);    
        			$row14 = mysql_fetch_array($result14);
        			$nutr = $row14['saldo'];
        			$result15 = mysql_query("SELECT saldo FROM catalogo WHERE id='77'", $conexion);    
        			$row15 = mysql_fetch_array($result15);
        			$otro = $row15['saldo'];
				?>
		<div id="col_catalogo">		
			<div class="wrapper_overview">
			    <div class="events">
			       	<nav>
				  		<ul>
							<li>Caja Chica<span class="badge"><?php echo" ".$cach." "; ?></span></li>
							<li>Caja Ahorro Banco<span class="badge green"><?php echo" ".$cuba." "; ?></span></li>
							<li>Cuenta Ganancias Retenidas<span class="badge green"><?php echo" ".$gare." "; ?></span></li>
							<li>Pasivo a Corto Plazo<span class="badge green"><?php echo" ".$copl." "; ?></span></li>
							<li>Pasivo a Largo Plazo<span class="badge green"><?php echo" ".$lapl." "; ?></span></li>
							<li>Cuenta Capital<span class="badge white"><?php echo" ".$cuca." "; ?></span></li>
							<li>Inversion<span class="badge green"><?php echo" ".$inv." "; ?></span></li>
							<li>Ingresos Ventas<span class="badge yellow"><?php echo" ".$inve." "; ?></span></li>
							<br /><br />
							<li>Gastos Generales Menores<span class="badge red"><?php echo" ".$gage." "; ?></span></li>
							<li>Costos de Produccion Menores<span class="badge red"><?php echo" ".$copr." "; ?></span></li>
							<li>Energia Electrica<span class="badge white"><?php echo" ".$enel." "; ?></span></li>
							<li>Suministro Agua<span class="badge white"><?php echo" ".$suag." "; ?></span></li>
							<li>Semilla insumo<span class="badge white"><?php echo" ".$semi." "; ?></span></li>
							<li>Nutriente insumo<span class="badge white"><?php echo" ".$nutr." "; ?></span></li>
							<li>Otros Produccion<span class="badge white"><?php echo" ".$otro." "; ?></span></li>
				   		</ul>
				   	</nav>
				</div>
			</div>
		</div>		
		<div id="columna_izq">
			<table border=0 width=100%>
				<tr align=center>
					<td align=left><strong><u>TELEMETRIA</u></strong></td>
					<tr></tr>
				</tr>	
			</table>
		</div>
		<div id="columna_der">
			<table border=0 width=100%>
				<tr align=center>
					<td align=left><strong><u>PRODUCCION</u></strong></td>
					<tr></tr>
				</tr>				
			</table>
		</div>
		<br /><br />
		<div id="table_web_stats">
			<center>					
				<table border=0 width=100%>					
					<tr align=center>
						<td><strong>ID</strong></td>
						<td><strong>IP</strong></td>
						<td><strong>Date</strong></td>
						<td><strong>Time</strong></td>
					</tr>
<?php
	//conexion
		//$conexion = mysql_connect("localhost","dbo469629526","~marco123");
		//if(!$conexion){
		//	die ("No he podido conectar por la siguiente razon: ".mysql_error());
		//}	
		//mysql_select_db("db469629526",$conexion); 
		$result = mysql_query("SELECT * FROM visitas", $conexion);	
	
		while($row = mysql_fetch_array($result)){
				    $webid = $row['id'];
				    $webip = $row['ip'];
				    $webfecha = $row['fecha'];
				    $webhora = $row['hora'];

			echo"<tr align=center><td>".$webid."</td><td>".$webip."</td><td>".$webfecha."</td>
			<td>".$webhora."</td></tr>";			
		}		   	
		//mysql_close($conexion);
?>
				</table>					
			</center>			
		</div> <!-- end content -->			
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

