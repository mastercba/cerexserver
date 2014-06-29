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
			
			$("#save").click(function (e) {			
				var content = $('#editable').html();	
					
				$.ajax({
					url: '/cerexserver/backend/admin/save.php',
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
			
			$("#editable").click(function (e) {
				$("#save").show();
				e.stopPropagation();
			});
		
			$(document).click(function() {
				$("#save").hide();  
			});
		
		});

		$(document).ready(function() {
			
			$("#save1").click(function (e) {			
				var content = $('#editable1').html();	
					
				$.ajax({
					url: '/cerexserver/backend/admin/save1.php',
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
			
			$("#editable1").click(function (e) {
				$("#save1").show();
				e.stopPropagation();
			});
		
			$(document).click(function() {
				$("#save1").hide();  
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
		<li><a href="/cerexserver/backend/admin/admin.php">OVERVIEW</a></li>
		<li><a href="/cerexserver/backend/admin/account.php">BALANCE GENERAL</a></li>
		<li><a href="/cerexserver/backend/admin/production.php">COSTOS de PRODUCCION</a></li>
		<li class="selected"><a href="/cerexserver/backend/admin/control.php">PRODUCCION</a></li>		
	</ul>
	<br />
	
<!-- MAIN CONTENT -->
	<section>
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
		<br/>
	<!-- Fase Inicial -->
		<div id="columna">
			<table border=0 width=100%>	
				<tr align=center>
					<td align=left></td>
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
								for ($x=1; $x<=5; $x++){If($d[$x]==1){$cd = $cd + 1;}else{}}?>



					<!-- act1 && act2 estan en cero! -->
					<br/>
					<?php			
					if($act1==0 AND $act2==0) {
					  echo"	<table>
					  		  <form action='inicia.php' method='POST' id='new_one'>	
		            	        <div id='headL1'><h10><u>Fase Inicial</u></h10></div>
		                        <div id='headR1' style='font-size:16px'>
		                        	|Fecha de Inicio:<input type='date' name='fecha_emp' autofocus required></input>
		                        	|Cantidad:<input type='text' size=6 name='cantidad' required></input>
		                        	|<button form='new_one'><img src='img/add.png'/></button>
		                        	|  Tag:
		                            |
		                        </div> 
							  </form>
							</table>
							<br/><br/>
							<table border=0 width=100%>		
								<td align=left style='font-size:16px'>Act.1 Almacigo(3-5dias):</td>	  
								<td align=center style='font-size:16px'>$ainicio</td>
								<td align=center style='font-size:16px'>$afinal</td>
								<td align=center style='font-size:16px'>$ca</td>
								<td align=left style='font-size:16px'>dias</td>
								<tr></tr>
								<td align=left style='font-size:16px'>Act.2 Trasplante (16-20dias):</td>
								<td align=center style='font-size:16px'>$binicio</td>
								<td align=center style='font-size:16px'>$bfinal</td>
								<td align=center style='font-size:16px'>$cb</td>
								<td align=left style='font-size:16px'>dias</td>
							</table>";
					}
					if($act1==1 AND $act2==0) {
					  echo"	<table>
		                        <div id='headL1'><h10><u>Fase Inicial</u></h10></div>
		                        <div id='headR1' style='font-size:16px'>
		                        	|  Tag: $tag_inicial
		                            |<a href='del1and2.php'><img src='img/cross.png'></a>
		                            |
		                        </div> 
							</table>
							<table border=0 width=100%>		
								<tr align=center style='font-size:16px'>
									  <td align=left>Act.1 Almacigo(3-5dias):</td>
									  <td align=left></td>
									  <td align=center>$ainicio</td>
									  <td align=center>$afinal</td>
									  <td align=center>$ca</td><td align=left>dias</td><td></td>
									  <td> | </td><td><a href='prev1.php' ><img src='/cerexserver/backend/admin/img/previous.png' width='18' height='18'/></a></td>
									  <td> | </td><td><a href='next1.php' ><img src='/cerexserver/backend/admin/img/next.png' width='18' height='18'/></a></td>
									  <td> | </td><td><a href='2act2.php' ><img src='/cerexserver/backend/admin/img/forward.png' width='18' height='18'/></a></td>
									  <td> | </td>
									  <tr></tr>
									  <td align=left style='font-size:16px'>Act.2   Trasplante (16-20dias):</td>
									  <td align=left></td>
									  <td align=center style='font-size:16px'>$binicio</td>
									  <td align=center style='font-size:16px'>$bfinal</td>
									  <td align=center style='font-size:16px'>$cb</td><td align=left style='font-size:16px'>dias</td><td></td>
									  <tr></tr>
								</tr>
							</table>";
					}			
					if($act1==0 AND $act2==1) {
					  echo"	<table>
		                        <div id='headL'><h10><u>Fase Inicial</u></h10></div>
		                        <div id='headR' style='font-size:16px'>
		                        	|  Tag: $tag_inicial
		                            |<a href='del1and2.php'><img src='img/cross.png'></a>                        	
		                            |
		                        </div> 
							</table>
							<table border=0 width=100%>		
								<tr align=center style='font-size:16px'>
									  <td align=left>Act.1 Almacigo(3-5dias):</td>
									  <td align=left></td>
									  <td align=center>$ainicio</td>
									  <td align=center>$afinal</td>
									  <td align=center>$ca</td><td align=left>dias</td><td></td>
									  <tr></tr>
									  <td align=left style='font-size:16px'>Act.2   Trasplante (16-20dias):</td>
									  <td align=left></td>
									  <td align=center style='font-size:16px'>$binicio</td>
									  <td align=center style='font-size:16px'>$bfinal</td>
									  <td align=center style='font-size:16px'>$cb</td><td align=left style='font-size:16px'>dias</td><td></td>
									  <td> | </td><td><a href='prev2.php' ><img src='/cerexserver/backend/admin/img/previous.png' width='18' height='18'/></a></td>
									  <td> | </td><td><a href='next2.php' ><img src='/cerexserver/backend/admin/img/next.png' width='18' height='18'/></a></td>
									  <td> | </td><td><a href='2act3.php' ><img src='/cerexserver/backend/admin/img/forward.png' width='18' height='18'/></a></td>
									  <td> | </td>							  
									  <tr></tr>
								</tr>
							</table>";
					}
					?>
			</table>	
		</div>
		<br/><br/>
	<!-- Fase Madurez -->
		<div id="columna1">
			<table border=0 width=100%>				
			<?php 
				// busca los ph y tds de ese tag y con la fecha
				$result461 = mysql_query("SELECT * FROM phtdsm1", $conexion);	
				while($row461 = mysql_fetch_array($result461)){
					$tag_leido = $row461['tag'];
					$fecha_leido = $row461['fecha'];
					$ph_leido = $row461['pham'];
					$tds_leido = $row461['tdsam'];
					if($tag_madurez == $tag_leido){
						$ph_show = $ph_leido;
						$tds_show = $tds_leido;
					}else{
						$ph_show = '?';
						$tds_show = '?';
					}
				}
			?>	
			<?php			
					if($act3==0 AND $act4==0) {	
					  echo"	<table>
		                        <div id='headL'><h10><u>Fase Madurez</u></h10></div>
		                        <div id='headR' style='font-size:16px'>
		                        	|  Tag:
		                            |
		                        </div> 
							</table>
							<br/><br/>
							<table border=0 width=100%>
								<td align=left style='font-size:16px'>Act.3 Madurez(20-25dias):</td>	  
								<td align=center style='font-size:16px'>$cinicio</td>
								<td align=center style='font-size:16px'>$cfinal</td>
								<td align=center style='font-size:16px'>$cc</td>
								<td align=left style='font-size:16px'>dias</td>
							    <td align=center>PH = </td><td align=center contenteditable='true'></td>
								<td align=center>TDS = </td><td align=center contenteditable='true'></td>						  
								<tr></tr>
								<td align=left style='font-size:16px'>Act.4 Cosecha (5dias):</td>
								<td align=center style='font-size:16px'>$dinicio</td>
								<td align=center style='font-size:16px'>$dfinal</td>
								<td align=center style='font-size:16px'>$cd</td>
								<td align=left style='font-size:16px'>dias</td>
							</table>";
					}
					if($act3==1 AND $act4==0) {
					$ph_show_leido = $_SESSION['ph_show_leido'];
				    $tds_show_leido = $_SESSION['tds_show_leido'];

					// busca los ph y tds de ese tag y con la fecha
					$resultado = mysql_query("SELECT * FROM $modulo", $conexion);	
					while($fila = mysql_fetch_array($resultado)){
						$fecha_actual = $fila['cfinal'];
						$etiqueta = $fila['tag_madurez'];
					}
					//get data ph from database.
					$sql = mysql_query("SELECT pham FROM phtdsm1 WHERE tag='".$etiqueta."' AND fecha='".$fecha_actual."' ", $conexion);
					$row = mysql_fetch_array($sql);			
					$ph_leido = $row['pham'];
					//get data tds from database.
					$sql = mysql_query("SELECT tdsam FROM phtdsm1 WHERE tag='".$etiqueta."' AND fecha='".$fecha_actual."' ", $conexion);
					$row = mysql_fetch_array($sql);			
					$tds_leido = $row['tdsam'];

						echo"
							<table>
		                        <div id='headL'><h10><u>Fase Madurez</u></h10></div>
		                        <div id='headR' style='font-size:16px'>
		                        	|  Tag: $tag_madurez
		                            |<a href='del3and4.php'><img src='img/cross.png'></a>
		                            |
		                        </div> 
							</table>
							<table border=0 width=100%>
								<tr align=center style='font-size:16px'>
									  <td align=left>Act.3 Madurez(20-25dias):</td>
									  <td align=left></td>
									  <td align=center>$cinicio</td>
									  <td align=center>$cfinal</td>
									  <td align=center>$cc</td><td align=left>dias</td><td></td>
									  <td align=center>PH = </td>
									  <td>	
										<div id='wrap'>
										<div id='status'></div>
										<div id='content'>
											<div id='editable' contentEditable='true'>
												$ph_leido		
											</div>	
											<button id='save'>Save</button>
										</div>
										</div>
									  </td><td></td>	

									  <td align=center>TDS = </td>
									  <td>	
										<div id='wrap1'>
										<div id='status1'></div>
										<div id='content1'>
											<div id='editable1' contentEditable='true'>
												$tds_leido		
											</div>	
											<button id='save1'>Save</button>
										</div>
										</div>
									  </td><td></td>

									  <td> | </td><td><a href='prev3.php' ><img src='/cerexserver/backend/admin/img/previous.png' width='18' height='18'/></a></td>
									  <td> | </td><td><a href='next3.php' ><img src='/cerexserver/backend/admin/img/next.png' width='18' height='18'/></a></td>
									  <td> | </td><td><a href='2act4.php' ><img src='/cerexserver/backend/admin/img/forward.png' width='18' height='18'/></a></td>
									  <td> | </td>
									  <tr></tr>
									  <td align=left style='font-size:16px'>Act.4 Cosecha (5dias):</td>
									  <td align=left></td>
									  <td align=center style='font-size:16px'>$dinicio</td>
									  <td align=center style='font-size:16px'>$dfinal</td>
									  <td align=center style='font-size:16px'>$cd</td><td align=left style='font-size:16px'>dias</td><td></td>
									  <tr></tr>
								</tr>					
							</table>   
						";
					}
					if($act3==0 AND $act4==1) {
					$ph_show_leido = $_SESSION['ph_show_leido'];
				    $tds_show_leido = $_SESSION['tds_show_leido'];
						echo"
							<table>
		                        <div id='headL'><h10><u>Fase Madurez</u></h10></div>
		                        <div id='headR' style='font-size:16px'>
		                        	|  Tag: $tag_madurez
		                            |<a href='del3and4.php'><img src='img/cross.png'></a>
		                            |
		                        </div> 
							</table>
							<table border=0 width=100%>
								<tr align=center style='font-size:16px'>
									  <td align=left>Act.3 Madurez(20-25dias):</td>
									  <td align=left></td>
									  <td align=center>$cinicio</td>
									  <td align=center>$cfinal</td>
									  <td align=center>$cc</td><td align=left>dias</td><td></td>
									  <td align=center>PH = </td><td align=center contenteditable='true'>$ph_show_leido</td><td></td>
									  <td align=center>TDS = </td><td align=center contenteditable='true'>$tds_show_leido</td><td></td>
									  <tr></tr>
									  <td align=left style='font-size:16px'>Act.4 Cosecha (5dias):</td>
									  <td align=left></td>
									  <td align=center style='font-size:16px'>$dinicio</td>
									  <td align=center style='font-size:16px'>$dfinal</td>
									  <td align=center style='font-size:16px'>$cd</td><td align=left style='font-size:16px'>dias</td><td></td>
									  <td> | </td><td><a href='prev4.php' ><img src='/cerexserver/backend/admin/img/previous.png' width='18' height='18'/></a></td>
									  <td> | </td><td><a href='next4.php' ><img src='/cerexserver/backend/admin/img/next.png' width='18' height='18'/></a></td>
									  <td> | </td><td><a href='end.php' ><img src='/cerexserver/backend/admin/img/rate-up.png' width='18' height='18'/></a></td>
									  <td> | </td>							  
									  <tr></tr>
								</tr>					
							</table>
						";
					}	
			?>
			</table>					
		</div>
		<br/><br/>
	<!-- Telemetria -->
	 	<div id="tele">
	 	</div>		
	</section>
<!-- end content -->
		<br />
<!-- FOOTER -->
	<div id="footer">
		<p>Copyright 2014 &copy;<a href="http://www.quanticasoft.com/cerexserver">CEREX ANDINA</a>. All rights reserved.</p>
		<!--<p><strong>AdminPortal </strong> by &copy;<a href="http://www.fluentspeaking.com"> QUANTICA SOFT, LLC</a></p>-->
	</div> 
<!-- end footer -->

</body>
</html>

<!-- end webPage -->

