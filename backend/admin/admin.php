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
	<script src="/cerexserver/backend/admin/js/cerex.js"></script>
	<script src="/cerexserver/backend/admin/js/script.js"></script> 
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>

	<script>
	    $(document).ready(function() {
			
			$("#save2").click(function (e) {			
				var content = $('#editable2').html();	
					
				$.ajax({
					url: '/cerexserver/backend/admin/save2.php',
					type: 'POST',
					data: {
	                content: content
					},				
					success:function (data) {
								
						//if (data == '0')
						//{
						//	$("#status")
						//	.addClass("success")
						//	.html("Data saved successfully")
						//	.fadeIn('fast')
						//	.delay(3000)
						//	.fadeOut('slow');	
						//}
						//else
						//{
						//	$("#status")
						//	.addClass("error")
						//	.html("An error occured, the data could not be saved")
						//	.fadeIn('fast')
						//	.delay(3000)
						//	.fadeOut('slow');	
						//}
					}
				});   
				
			});
			
			$("#editable2").click(function (e) {
				$("#save2").show();
				e.stopPropagation();
			});
		
			$(document).click(function() {
				$("#save2").hide();  
			});
		
		});
	</script>

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
	<!-- Accounts overview -->
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

	<!-- linea de control -->
		<center>
			<table align=center>			
				<td>
					<td> | </td>
					<td  align=center>
					<select>
						<option>-----MODULO-----</option>
						<option value="M1" <?php if ($_SESSION['moduloxDefecto']== 'M1') echo 'selected="selected"';?>>Modulo 1</option>
						<option value="M2" <?php if ($_SESSION['moduloxDefecto']== 'M2') echo 'selected="selected"';?>>Modulo 2</option>
						<option value="M3" <?php if ($_SESSION['moduloxDefecto']== 'M3') echo 'selected="selected"';?>>Modulo 3</option>
						<option value="M4" <?php if ($_SESSION['moduloxDefecto']== 'M4') echo 'selected="selected"';?>>Modulo 4</option>
						<option value="M5" <?php if ($_SESSION['moduloxDefecto']== 'M5') echo 'selected="selected"';?>>Modulo 5</option>
	    				<option>------------------------</option>
    			   	</select>
	    			</td><td> | </td>				
				</td> 
			</table>
		</center>
	<!-- end linea de control -->
	<br />
	<!-- caja izquierda -->
		<div id="overview_prod_izq">
			<table border=0 width=100%>
				<tr align=center>
					<td align=left></td>
					<tr></tr>
				</tr>	
			</table>
		</div>

	<!-- caja derecha -->
		<div id="overview_prod_der">
			<!-- leo base de datos -->
			<?php
			//preparo que modulo voy a usar......! poner switch...ojooooooo
			if($_SESSION['moduloxDefecto'] == 'M1'){$modulo = 'produccionm1'; $_SESSION['modulo'] = $modulo;} 
 			//leo base de datos
			$result4 = mysql_query("SELECT * FROM $modulo", $conexion);	
			while($row = mysql_fetch_array($result4)){
				$tag_inicial = $row['tag_inicial'];$tag_madurez = $row['tag_madurez'];
				$act1 = $row['act1'];$act2 = $row['act2'];
				$act3 = $row['act3'];$act4 = $row['act4'];
				$ainicio = $row['ainicio'];
				$afinal = $row['afinal'];$a[1] = $row['a1'];$a[2] = $row['a2'];
				$a[3] = $row['a3'];$a[4] = $row['a4'];$a[5] = $row['a5'];
				$binicio = $row['binicio'];$bfinal = $row['bfinal'];$b[1] = $row['b1'];
				$b[2] = $row['b2'];$b[3] = $row['b3'];$b[4] = $row['b4'];
				$b[5] = $row['b5'];$b[6] = $row['b6'];$b[7] = $row['b7'];
				$b[8] = $row['b8'];$b[9] = $row['b9'];$b[10] = $row['b10'];
				$b[11] = $row['b11'];$b[12] = $row['b12'];$b[13] = $row['b13'];
				$b[14] = $row['b14'];$b[15] = $row['b15'];$b[16] = $row['b16'];
				$b[17] = $row['b17'];$b[18] = $row['b18'];$b[19] = $row['b19'];
				$b[20] = $row['b20'];
				$b[21] = $row['b21'];$b[22] = $row['b22'];$b[23] = $row['b23'];
				$b[24] = $row['b24'];$b[25] = $row['b25'];
				$cinicio = $row['cinicio'];$cfinal = $row['cfinal'];
				$c[1] = $row['c1'];$c[2] = $row['c2'];$c[3] = $row['c3'];$c[4] = $row['c4'];    
				$c[5] = $row['c5'];$c[6] = $row['c6'];$c[7] = $row['c7'];$c[8] = $row['c8'];    
				$c[9] = $row['c9'];$c[10] = $row['c10'];$c[11] = $row['c11'];$c[12] = $row['c12'];    
				$c[13] = $row['c13'];$c[14] = $row['c14'];$c[15] = $row['c15'];$c[16] = $row['c16'];    
				$c[17] = $row['c17'];$c[18] = $row['c18'];$c[19] = $row['c19'];$c[20] = $row['c20'];    
				$c[21] = $row['c21'];$c[22] = $row['c22'];$c[23] = $row['c23'];$c[24] = $row['c24'];    
				$c[25] = $row['c25'];
				$c[26] = $row['c26'];$c[27] = $row['c27'];$c[28] = $row['c28'];$c[29] = $row['c29'];
				$c[30] = $row['c30'];

				$dinicio = $row['dinicio'];$dfinal = $row['dfinal'];$d[1] = $row['d1'];
				$d[2] = $row['d2'];$d[3] = $row['d3'];$d[4] = $row['d4'];$d[5] = $row['d5'];    
			}
			?>
			<!-- cuento dias -->
			<?php
				$ca=0;$cb=0;$cc=0;$cd=0;
				for ($x=1; $x<=5; $x++){If($a[$x]==1){$ca = $ca + 1;}else{}}
				for ($x=1; $x<=25; $x++){If($b[$x]==1){$cb = $cb + 1;}else{}}
				for ($x=1; $x<=30; $x++){If($c[$x]==1){$cc = $cc + 1;}else{}}
				for ($x=1; $x<=5; $x++){If($d[$x]==1){$cd = $cd + 1;}else{}}
			?>			
		<!-- Ingresos x Ventas -->					
			<br/>
			<div id="saleControl1">
				<table>
	                <div id="headL"><h10><u>Produccion & Ventas</u></h10></div>
	                <div id="headR" style="font-size:14px"></div> 
				</table>
				<table border=0 width=100%>					
					<tr align=center>
						<td>#</td>
						<td>Estado</td>
						<td>Actividades</td>
						<td>Inicio</td>
						<td>Final</td>
						<td>Dias</td>
						<td>Cantidad</td>
						<td>Precio</td>
						<td>Actions</td>
					</tr><tr></tr><tr></tr>

				<?php 
				$resultsale = mysql_query("SELECT * FROM products", $conexion);	
				//$venta = 0;
				while($rowsa = mysql_fetch_array($resultsale)){
					$flag = $rowsa['flag'];
				    $ventaid = $rowsa['id'];
				    $ventaestado = $rowsa['estado'];
	   			    $ventaprecio = $rowsa['precio'];
				    $ventatag = $rowsa['tag'];
				    $ventainicio = $rowsa['inicio'];
				    $ventafinal = $rowsa['final'];
	   			    $ventacantidad = $rowsa['cantidad'];
				    $ventaactividades = $rowsa['actividades'];
				    //calcula los dias que pasaron desde que se inicio
				  
				    $totdias = strtotime($ventafinal) - strtotime($ventainicio);
				    $totdias = $totdias / (60 * 60 * 24);
				    $totdias = abs($totdias);
				    $totdias = floor($totdias); 

		   			switch ($flag) {
						case "0":
							echo"<tr align=center><td>".$ventatag."</td><td>".$ventaestado."</td>
							<td>".$ventaactividades."</td>
							<td align=center>".$ventainicio."</td><td align=center>".$ventafinal."</td>
							<td align=center>".$totdias."</td><td align=center>".$ventacantidad."</td>
							<td align=center>".$ventaprecio."</td>
							<td>|<a href='eliminarventa.php?veid=".$ventaid."'><img src='img/trash.png' width='14' height=14'></a>
							|</td>
							</tr>";
							break;
						case "2":
							echo"<tr align=center><td>".$ventatag."</td><td>".$ventaestado."</td>
							<td>".$ventaactividades."</td>
							<td align=center>".$ventainicio."</td><td align=center>".$ventafinal."</td>
							<td align=center>".$totdias."</td><td align=center>".$ventacantidad."</td><td></td>
							<td>|<a href='editventa.php?veid=".$ventaid."'><img src='img/pencil.png' width='14' height=14'></a>
							|<a href='guardar.php?veid=".$ventaid."'><img src='img/save4.jpg' width='14' height=14'></a>
							|<a href='eliminarventa.php?veid=".$ventaid."'><img src='img/trash.png' width='14' height=14'></a>
							|</td>
							</tr>";
							break;
						case "1":
							echo"<tr align=center><td>".$ventatag."</td><td>".$ventaestado."</td>
							<td>".$ventaactividades."</td>
							<td align=center>".$ventainicio."</td><td align=center>".$ventafinal."</td>
							<td align=center>".$totdias."</td><td align=center>".$ventacantidad."</td>
								<td>	
									<div id='wrap2'>
									<div id='status2'></div>
									<div id='content2'>
									<div id='editable2' contentEditable='true'>
										$ventaprecio		
									</div>	
									<button id='save2'>Save</button>
									</div>
									</div>
								</td>
							<td>|<a href='#?veid=".$ventaid."'><img src='img/pencil.png' width='14' height=14'></a>
							|</td>
							</tr>";
							break;
						case "3":
							echo"<tr align=center><td>".$ventatag."</td><td>".$ventaestado."</td>
							<td>".$ventaactividades."</td>
							<td align=center>".$ventainicio."</td><td align=center>".$ventafinal."</td>
							<td align=center>".$totdias."</td><td align=center>".$ventacantidad."</td>
								<td>	
									<div id='wrap2'>
									<div id='status2'></div>
									<div id='content2'>
									<div id='editable2' contentEditable='true'>
										$ventaprecio		
									</div>	
									<button id='save2'>Save</button>
									</div>
									</div>
								</td>							
							<td>|<a href='#?veid=".$ventaid."'><img src='img/pencil.png' width='14' height=14'></a>
							|<a href='guardar.php?veid=".$ventaid."'><img src='img/save4.jpg' width='14' height=14'></a>
							|<a href='eliminarventa.php?veid=".$ventaid."'><img src='img/trash.png' width='14' height=14'></a>
							|</td>
							</tr>";
							break;
						case "5":
							echo"<tr align=center><td>".$ventatag."</td><td>".$ventaestado."</td>
							<td>".$ventaactividades."</td>
							<td align=center>".$ventainicio."</td><td align=center>".$ventafinal."</td>
							<td align=center>".$totdias."</td><td align=center>".$ventacantidad."</td>
							<td align=center>".$ventaprecio."</td>
							</tr>";
							break;	
					}			
				}

				?>
				</table>
			</div>
		</div>	
		<br />
		<br />
		
	</section>
<!-- end content -->
	
<!-- FOOTER -->
	<div id="footer">
		<p>Copyright 2014 &copy;<a href="http://www.quanticasoft.com/cerexserver">CEREX ANDINA</a>. All rights reserved.</p>
		<!--<p><strong>AdminPortal </strong> by &copy;<a href="http://www.fluentspeaking.com"> QUANTICA SOFT, LLC</a></p>-->
	</div> 
<!-- end footer -->

</body>
</html>

<!-- end webPage -->

