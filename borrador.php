****************************************************************************************************
///////////////////////////////////////////////////////////////////////////////
********************************************************************************
version completa del control.php ver anterior

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
		<a style="text-decoration: none; margin-left: 12px;" href="http://http://www.quanticasoft.com/cerexserver/formlogin.html" title="CEREX Andina">
		    <img style="margin-top: 2px;" height="39" src="/cerexserver/backend/admin/img/logo.png" alt="CEREX Andina" />
		</a>
	</div>
	<br />
	<ul class="tabrow"><!--- Tabs Menu -->
		<li><a href="/cerexserver/backend/admin/admin.php">OVERVIEW</a></li>
		<li><a href="/cerexserver/backend/admin/account.php">BALANCE GENERAL</a></li>
		<li><a href="/cerexserver/backend/admin/production.php">COSTOS de PRODUCCION</a></li>
		<li class="selected"><a href="/cerexserver/backend/admin/control.php">PRODUCCION</a></li>
	</ul>
	
	
<!-- MAIN CONTENT -->
	<!-- leo base de datos -->
	<?php 
	$result4 = mysql_query("SELECT * FROM produccionm1", $conexion);	
	while($row = mysql_fetch_array($result4)){
		$tag_inicial = $row['tag_inicial'];$tag_madurez = $row['tag_madurez'];$ainicio = $row['ainicio'];
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

	<!-- calculo las fechas finales -->
		<?php
			//$ainicio = date('Y-m-j');
			$afinal = strtotime ( '+'.$ca.' day' , strtotime ( $ainicio ) ) ;
			$afinal = date ( 'Y-m-j' , $afinal );
			mysql_query("UPDATE produccionm1 SET afinal= '".$afinal."' WHERE id = '1'");
			$binicio = $afinal;
			//$binicio = date('Y-m-j');
			$bfinal = strtotime ( '+'.$cb.' day' , strtotime ( $binicio ) ) ;
			$bfinal = date ( 'Y-m-j' , $bfinal );
			mysql_query("UPDATE produccionm1 SET bfinal= '".$bfinal."' WHERE id = '1'");

			//$cinicio = date('Y-m-j');
			$cfinal = strtotime ( '+'.$cc.' day' , strtotime ( $cinicio ) ) ;
			$cfinal = date ( 'Y-m-j' , $cfinal );
			mysql_query("UPDATE produccionm1 SET cfinal= '".$cfinal."' WHERE id = '1'");
			$dinicio = $cfinal;
			//$dinicio = date('Y-m-j');
			$dfinal = strtotime ( '+'.$cd.' day' , strtotime ( $dinicio ) ) ;
			$dfinal = date ( 'Y-m-j' , $dfinal );
			mysql_query("UPDATE produccionm1 SET dfinal= '".$dfinal."' WHERE id = '1'");
		?>

	<!-- linea de control -->
	<center>
		<table>			
			<td>
				<!--<td> | </td><td>  Inicio Actividades:</td><td><?=$inicio?></td>
				<td> | </td><td>  Final Actividades:</td><td><?=$final?></td>-->
				<td> | </td>

				<td  align=center><select name=que_mudulo>
					<option>-----MODULO-----</option>
					<option value='1'>M1</option>
					<option value='2'>M2</option>
					<option value='3'>M3</option>
					<option value='4'>M4</option>
					<option value='5'>M5</option>
    			   	<option>------------------------</option>
    			   	</select>
    			</td>

    			<td> | </td><td> M11 </td>
    			<td> | </td><td> M12 </td>
				<td> | </td><td><a href="editcont.php" ><img src="/cerexserver/backend/admin/img/pencil.png" width="18" height="18"/></a></td>
				<td> | </td>					
			</td> 
		</table>
	</center>
	<!-- end linea de control -->

	<section>
		<div id="columna">
			<table border=0 width=100%>	
				<tr align=center>
					<td align=left><strong><u>Fase Inicial</u></strong></td>
					<tr></tr>
					<td><strong>Act-Perido(dias)</strong></td>
					<td><strong>Caracteristicas</strong></td>
					<td><strong>1</strong></td>
					<td><strong>2</strong></td>
					<td><strong>3</strong></td>
					<td><strong>4</strong></td>
					<td><strong>5</strong></td>
					<td><strong>6</strong></td>
					<td><strong>7</strong></td>
					<td><strong>8</strong></td>
					<td><strong>9</strong></td>
					<td><strong>10</strong></td>
					<td><strong>11</strong></td>
					<td><strong>12</strong></td>
					<td><strong>13</strong></td>
					<td><strong>14</strong></td>
					<td><strong>15</strong></td>
					<td><strong>16</strong></td>
					<td><strong>17</strong></td>
					<td><strong>18</strong></td>
					<td><strong>19</strong></td>
					<td><strong>20</strong></td>
					<td><strong>21</strong></td>
					<td><strong>22</strong></td>
					<td><strong>23</strong></td>
					<td><strong>24</strong></td>
					<td><strong>25</strong></td>
					<td align=center><strong>Inicio</strong></td>
					<td align=center><strong>Fin</strong></td>
					<td align=center><strong>Dias</strong></td>
				</tr>	
				<tr align=center>
					<form action='demo_form.php' method='POST'>
					  <td align=left>Puesta Almacigo (3-5)</td>
					  <td align=left>Germinacion</td>
					  <?php
					  for ($x=1; $x<=5; $x++) {
					  		If($a[$x]==1){
					  			echo "<td align=center><img src='/cerexserver/backend/admin/img/tick.png' width='14' height='14'/></td>";
					  		}else{
					  			echo "<td></td>";
					  		}
					  }?>
					  <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
					  <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
					  <td></td><td></td><td></td><td></td><td></td><td></td>
					  <td align=center><?=$ainicio?></td><td align=center><?=$afinal?></td>
					  <td align=center><?=$ca?></td>

					  <tr></tr>
					  <td align=left>Trasplante (16-20)</td>
					  <td align=left>plantas con 6-8 hojas</td>
					  <?php
					  for ($x=1; $x<=25; $x++) {
					  		If($b[$x]==1){
					  			echo "<td align=center><img src='/cerexserver/backend/admin/img/tick.png' width='14' height='14'/></td>";
					  		}else{
					  			echo "<td></td>";
					  		}
					  }?>
					  <td align=center><?=$binicio?></td><td align=center><?=$bfinal?></td>					  					  					  					  					
					  <td align=center><?=$cb?></td>
					</form>
				</tr>
			</table>
		</div>
		<div id="columna1">
			<table border=0 width=100%>	
				<tr align=center>
					<td align=left><strong><u>Fase Madurez</u></strong></td>
					<tr></tr>
					<td><strong>Act-Perido(dias)</strong></td>
					<td><strong>Caracteristicas</strong></td>
					<td><strong>1</strong></td>
					<td><strong>2</strong></td>
					<td><strong>3</strong></td>
					<td><strong>4</strong></td>
					<td><strong>5</strong></td>
					<td><strong>6</strong></td>
					<td><strong>7</strong></td>
					<td><strong>8</strong></td>
					<td><strong>9</strong></td>
					<td><strong>10</strong></td>
					<td><strong>11</strong></td>
					<td><strong>12</strong></td>
					<td><strong>13</strong></td>
					<td><strong>14</strong></td>
					<td><strong>15</strong></td>
					<td><strong>16</strong></td>
					<td><strong>17</strong></td>
					<td><strong>18</strong></td>
					<td><strong>19</strong></td>
					<td><strong>20</strong></td>
					<td><strong>21</strong></td>
					<td><strong>22</strong></td>
					<td><strong>23</strong></td>
					<td><strong>24</strong></td>
					<td><strong>25</strong></td>
					<td><strong>26</strong></td>
					<td><strong>27</strong></td>
					<td><strong>28</strong></td>
					<td><strong>29</strong></td>
					<td><strong>30</strong></td>
					<td align=center><strong>Inicio</strong></td>
					<td align=center><strong>Fin</strong></td>
					<td align=center><strong>Dias</strong></td>
				</tr>
				<tr align=center>
					<form action='demo_form.php' method='POST'>
					  <td align=left>Madurez(20-25)</td>
					  <td align=left>BuenFollaje y tamano</td>
					  <?php
					  for ($x=1; $x<=30; $x++) {
					  		If($c[$x]==1){
					  			echo "<td><img src='/cerexserver/backend/admin/img/tick.png' width='14' height='14'/></td>";
					  		}else{
					  			echo "<td></td>";
					  		}
					  }?>					  
					  <td align=left><?=$cinicio?></td><td align=left><?=$cfinal?></td>
					  <td align=center><?=$cc?></td>

					  <tr></tr>
					  <td align=left>Cosecha (5)</td>
					  <td align=left>Follaje peso 100gr y tamano</td>
					  <?php
					  for ($x=1; $x<=5; $x++) {
					  		If($d[$x]==1){
					  			echo "<td><img src='/cerexserver/backend/admin/img/tick.png' width='14' height='14'/></td>";
					  		}else{
					  			echo "<td></td>";
					  		}
					  }?>
					  <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
					  <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
					  <td></td><td></td><td></td><td></td><td></td><td></td>
					  <td></td><td></td><td></td><td></td><td></td>
					  <td align=left><?=$dinicio?></td><td align=left><?=$dfinal?></td>					  					  					  					  					
					  <td align=center><?=$cd?></td>
					</form>
				</tr>

			</table> <br/>
		</div>
		<br/><br/>
		<div id="table_ph">
				<td align=center><strong><u>Sistema de Control de PH y TDS</u></strong></td><tr></tr>
				<br/>
				<td><strong>Rango PH:5.5-6.5; rango TDS:1200ppm-1500ppm</strong></td>
				<br/>
			<table border=0 width=100%>					
				<tr align=center>
					<td><strong>Fecha</strong></td>
					<td><strong>PH am</strong></td>
					<td><strong>PH pm</strong></td>
					<td><strong>TDS am</strong></td>
					<td><strong>TDS pm</strong></td>
					<td><strong>Actions</strong></td>
				</tr>
				<?php 
				$resultphtds = mysql_query("SELECT * FROM phtdsm1 order by fecha", $conexion);	
				while($row = mysql_fetch_array($resultphtds)){
				    $phtdsID = $row['id'];					
				    $fechaRD = $row['fecha'];
   				    $phAM = $row['pham'];
				    $phPM = $row['phpm'];
				    $tdsAM = $row['tdsam'];
				    $tdsPM = $row['tdspm'];

					echo"<tr align=center><td>".$fechaRD."</td>
					<td>".$phAM."</td><td>".$phPM."</td>
					<td>".$tdsAM."</td><td>".$tdsPM."</td>
					<td><a href='eliminarphtds.php?phid=".$phtdsID."'><img src='img/trash.png' width='14' height=14'></a>
					</td>
					</tr>";			
				}
				//Anadir un registro
					echo"
						<tr align=center>
							<form action='newphtds.php' method = 'POST'>
							<td><input type='date' name='fechaleida' value='' size=8></td>
							<td align=center><input type='text' name='ph_am' value='' size=3></td>
							<td align=center><input type='text' name='ph_pm' value='' size=3></td>
							<td align=center><input type='text' name='tds_am' value='' size=3></td>
							<td align=center><input type='text' name='tds_pm' value='' size=3></td>
							<td><p></p><input type='image' src='img/add.png' width='14' height=14'/></td>
							</form>
						</tr>";
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




****************************************************************************************************
///////////////////////////////////////////////////////////////////////////////
********************************************************************************
version completa del content editable



<!doctype html>
<head>
<meta charset="utf-8">
<title>Gazpo.com - HTML5 Inline text editing and saving </title>

<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
  <style>
	body {		
		font-family: Helvetica,Arial,sans-serif;
		color:#333333;
		font-size:13px;
	}
	
    h1{
		font-family: 'Droid Serif', Georgia, Times, serif;
		font-size: 28px;		
	}
	
	a{
		color: #0071D8;
		text-decoration:none;
	}
	
	a:hover{
		text-decoration:underline;
	}

	:focus {
		outline: 0;
	}
	
	#wrap{
		width: 500px;
		margin:0 auto;				
		overflow:auto;		
	}
	
	#content{
		background: #f7f7f7;
		border-radius: 10px;
	}
	
	#editable {		
		padding: 10px;		
	}
	
	#status{
		display:none; 
		margin-bottom:15px; 
		padding:5px 10px; 
		border-radius:5px;
	}
	
	.success{
		background: #B6D96C;
	}
	
	.error{
		background: #ffc5cf; 
	}
	
	#footer{
		margin-top:15px;
		text-align: center;
	}
	
	#save{	
		display: none;
		margin: 5px 10px 10px;		
		outline: none;
		cursor: pointer;	
		text-align: center;
		text-decoration: none;
		font: 12px/100% Arial, Helvetica, sans-serif;
		font-weight:700;	
		padding: 5px 10px;	
		-webkit-border-radius: 5px; 
		-moz-border-radius: 5px;
		border-radius: 5px;	
		color: #606060;
		border: solid 1px #b7b7b7;	
		background: #fff;
		background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#ededed));
		background: -moz-linear-gradient(top,  #fff,  #ededed);
		filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed');
	}	
	
	#save:hover
	{
        background: #ededed;
		background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#dcdcdc));
		background: -moz-linear-gradient(top,  #fff,  #dcdcdc);
		filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#dcdcdc');
	}
	
    </style>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
		
		$("#save").click(function (e) {			
			var content = $('#editable').html();	
				
			$.ajax({
				url: 'save.php',
				type: 'POST',
				data: {
                content: content
				},				
				success:function (data) {
							
					if (data == '1')
					{
						$("#status")
						.addClass("success")
						.html("Data saved successfully")
						.fadeIn('fast')
						.delay(3000)
						.fadeOut('slow');	
					}
					else
					{
						$("#status")
						.addClass("error")
						.html("An error occured, the data could not be saved")
						.fadeIn('fast')
						.delay(3000)
						.fadeOut('slow');	
					}
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

</script>
</head>
<body>
	<div id="wrap">
		<h1><a href="http://gazpo.com/2011/09/contenteditable/" > HTML5 Inline text editing and saving </a></h1>
		
		<h4>The demo to edit the data with html5 <i>contentEditable</i>, and saving the changes to database with PHP and jQuery.</h4>
		
		<div id="status"></div>
		
		<div id="content">
		
		<div id="editable" contentEditable="true">
		<?php
			//get data from database.
			include("db.php");
			$sql = mysql_query("select text from content where element_id='1'");
			$row = mysql_fetch_array($sql);			
			echo $row['text'];
		?>		
		</div>	
		
		<button id="save">Save</button>
		</div>
		
		<div id="footer">
		<a href="http://gazpo.com/">Tutorial by gazpo.com</a> 
		</div>
	</div>
</body>
</html>
****************************************************************************************************
///////////////////////////////////////////////////////////////////////////////
********************************************************************************
content editable

	<div id="wrap">
		
	
		<div id="status"></div>
		
		<div id="content">
		
		<div id="editable" contentEditable="true">
		<?php
			//get data from database.
			$sql = mysql_query("SELECT pham FROM phtdsm1 WHERE tag='6093'", $conexion);
			$row = mysql_fetch_array($sql);			
			echo $row['pham'];
		?>		
		</div>	
		
		<button id="save">Save</button>
		</div>
		
	</div>
****************************************************************************************************
///////////////////////////////////////////////////////////////////////////////
********************************************************************************

h10{							/*Titulos de profile*/
	color: #595e72;
	margin: 0 0 0 1em;
	font-size: 1.5em;
}


/* Profile
   ===================================================== */
	#headL{
			float: left;
			display: inline-block;
			margin: 0 0 0 0;
			padding: 0 0 0 0;
			font-size: 0.9em;
	}
	#headR{
			float: right;
			display: inline-block;
			margin: 0 4em 0 0;
			padding: 0.3em 0 0 0;
			font-size: 0.9em;
	}
	#line{
			position: absolute;
			overflow: hidden;
			margin: 0 0 0 0;
			padding: 0 0 0 0;
	}
	#headL, #headR
	{
		display: inline-block;
		vertical-align: top;
	}
	.details{
		width: 100%;
		float: left;
		height: 200px;
		/*vertical-align: bottom;*/
	}
	.lista_profile{
		margin: 1em 0 0.5em 0;
		padding: 0.5em 0 0.5em 0;
		list-style: none;
		text-decoration: none	
	}

	#ctry{	
		margin: 2.2em 0 0 0;
		padding: 0 0 0 0;
	}

	.pfl_izq{
		display: inline-block;
		float: left;
		text-align: left;
		margin: 0 1em .5em 3em;
		padding: 0.5em 0 0 0;
	}
	.pfl_der{
		display: inline-block;
		float: left;
		text-align: left;
		margin: 0 1em 0.5em 0;
		padding: 0.5em 0 0 0;
	}

	#pfl_izq, #pfl_der
	{
		display: inline-block;
		vertical-align: top;
	}
	.pfl_izq .lista_profile li{	margin: 0.5em 0 0 0;padding: 0 0 0 0;}
	.pfl_der .lista_profile li{	margin: 0.5em 0 0 0;padding: 0 0 0 0;}

****************************************************************************************************
///////////////////////////////////////////////////////////////////////////////
********************************************************************************

<!-- MAIN CONTENT -->

    <div id="content">
        <table border="0" align=center>
            <tr style="height:250px;">
                <td style="width:500px;"><!-- Picture Profile -->
                    <div style="height:250px; width: 500px;">
                        <div id="headL"><h10>Picture Profile</h10></div><div id="headR">
                            <input type="image" form="form1" src="img/tick.png" onclick="location.href='profile.php';">
                            |<a href="profile.php"><img src="img/backward.png"></a></div>                        
                        <br /><div id="line"><img src="img/raya.png"></div>
                        <div class="details">
                            <div class="pfl_izq">
                                <ul class="lista_profile">

                                </ul>               
                            </div>
                        </div>
                    </div>
                </td>
                <td style="width:500px;"><!-- Location -->
                    <div style="height:250px; width: 500px; overflow:auto;">
                        <div id="headL"><h10>Location</h10></div><div id="headR"><a href="eprofile3.php"><img src="img/edit.png"></a></div>
                        <br /><div id="line"><img src="img/raya.png"></div>
                        <div class="details">
                            <div class="pfl_izq">
                                <ul class="lista_profile">
                                    <li>Address :</li>
                                    <li id="ctry">Country :</li>
                                    <li>Time Zone :</li>
                                </ul>               
                            </div>
                            <div class="pfl_der">
                                <ul class="lista_profile">
                                    <li style="height:45px; width: 300px; overflow:auto;"><b><?=$_SESSION['saddr']?></b></li>
                                    <li><b><?=$_SESSION['scountry']?></b></li>
                                    <li style="height:50px; width: 300px; overflow:auto;"><b><?=$_SESSION['stzone']?></b></li>
                                </ul>                       
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr style="height:250px;">    
                <td style="width:500px;"><!-- Basic Information -->
                    <div style="height:250px; width: 500px;">
                        <div id="headL"><h10>Basic Information</h10></div><div id="headR">
                            <input type="image" form="form2" src="img/tick.png" onclick="location.href='profile.php';">
                            |<a href="profile.php"><img src="img/backward.png"></a></div>
                        <br /><div id="line"><img src="img/raya.png"></div>
                        <div class="details">
                            <div class="pfl_izq">
                                <ul class="lista_profile">
                                    <li>First Name :</li>
                                    <li>Last Name :</li>
                                    <li>Password :</li>
                                    <li>Date of birth :</li>
                                    <li>Gender :</li>
                                    <li>Language :</li>
                                </ul>               
                            </div>
                            <div class="pfl_der">
                                <form action='sp2.php' method = 'POST' id="form2">
                                    <ul class="lista_profile">
                                        <li><b><?=$_SESSION['snombre']?></b></li>
                                        <li><b><?=$_SESSION['sapellido']?></b></li>
                                        <li><b>*******</b></li>
                                        <li><b><input type="date" name="nsbirth" value="<?=$_SESSION['sbirth']?>"></b></li>
                                        <li><b>
                                                <input type="radio" name="nsgender" value=" ">Male
                                                <input type="radio" name="nsgender" value=" ">Female
                                            </b></li>
                                        <li><b>
                                                <select name="nslang">
                                                  <option value="English">English</option>
                                                  <option value="Spanish">Spanish</option>
                                                  <option value="German">German</option>
                                                </select>
                                            </b></li>
                                    </ul>
                                </form>
                            </div>
                        </div>    
                    </div>
                </td>
                <td style="width:500px;"><!-- Media -->
                    <div style="height:250px; width: 500px;">
                        <div id="headL"><h10>Media</h10></div><div id="headR"><a href="eprofile4.php"><img src="img/edit.png"></a></div>
                        <br /><div id="line"><img src="img/raya.png"></div>
                        <div class="details">   
                            <div class="pfl_izq">
                                <ul class="lista_profile">
                                    <li>Phone :</li>
                                    <li>Mobile :</li>
                                    <li>Skype :</li>
                                    <li>e-mail :</li>
                                </ul>               
                            </div>
                            <div class="pfl_der">
                                <ul class="lista_profile">
                                    <li><b><?=$_SESSION['stelefono']?></b></li>
                                    <li><b><?=$_SESSION['scelular']?></b></li>
                                    <li><b><?=$_SESSION['sskype']?></b></li>
                                    <li><b><?=$_SESSION['semail']?></b></li>
                                </ul>                       
                            </div>
                        </div>    
                    </div>
                </td>             
            </tr>
        </table>    
    </div>
<!-- FOOTER -->
    <div id="footer">
            <p>Copyright 2012 &copy;<a href="http://www.fluentspeaking.de">FLUENTSPEAKING</a>. All rights reserved.</p>
    </div> 

</body>
</html>

<!-- end webPage -->


*****************************************************************************

//////////////////////////////////////////////////////////////////////////////
otros para produccion!!!!!

<!-- otros -->
	<section>
		<div id="table_production">
				<table border=0 width=100%>					
					<tr align=center>
						<td align=left><strong><u>OTROS</u></strong></td><tr></tr>
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
		$result3 = mysql_query("SELECT * FROM otros", $conexion);	
		$otrosuma = 0;
		$otroaddstock = 0;
		$otroreststock = 0;
		while($row3 = mysql_fetch_array($result3)){
				    $otroid = $row3['id'];
				    $otroegreso = $row3['egreso'];
				    $otrodesp = $row3['descripcion'];
				    $otrofecha = $row3['created_at'];
				    $otrocuenta = $row3['de_cuenta'];
				    $otrobuy = $row3['cant_buy'];
				    $otroused = $row3['cant_used'];
				    

				    $otrosuma = $otrosuma + $otroegreso; 
				    $_SESSION['otrosuma'] = $otrosuma;

				    $otroaddstock = $otroaddstock + $otrobuy; 
				    $_SESSION['otroaddstock'] = $otroaddstock;
				    $otroreststock = $otroreststock + $otroused; 
				    $_SESSION['otroreststock'] = $otroreststock;				    				    
				    $otrostock = $otroaddstock - $otroreststock;
				    $_SESSION['otrostock'] = $otroaddstock - $otroreststock;	


			echo"<tr align=center><td>".$otrofecha."</td><td>".$otrodesp."</td>
			<td align=left>".$otrobuy."</td><td align=left>".$otroused."</td><td align=left>".$otrostock."</td>
			<td align=left>".$otrocuenta."</td><td align=left>".$otroegreso."</td><td align=left>".$otrosuma."</td>
			<td><a href='editotro.php?otroid=".$otroid."'><img src='img/pencil.png' width='14' height=14'></a>
			|<a href='eliminarotro.php?otroid=".$otroid."'><img src='img/trash.png' width='14' height=14'></a>
			</td>
			</tr>";				
		}
	//Anadir un registro
			echo"
				<tr align=center>
					<form action='newotro.php' method = 'POST'>
					<td><input type='date' name='otrofecha' value='' size=8></td>
					<td  align=center><input type='text' name='otrodescripcion' value='' size=15></td>
					<td  align=left><input type='text' name='otrobuy' value='' size=10></td>
					<td></td><td></td>
					<td  align=left><select name=otrocuenta>
						<option>-----Select-----</option>
						<option value='10'>Caja Chica</option>
						<option value='11'>Caja de Ahorro Banco</option>
    			    	<option>----------</option>
    			    	</select>
    			    </td>
					<td align=left><input type='text' name='otroegreso' value='' size=7></td>
					<td></td>
					<td><p></p><input type='image' src='img/add.png' width='14' height=14'/></td>
					</form>
				</tr>";
	//Usar un registro
			echo"
				<tr align=center>
					<form action='usedotro.php' method = 'POST'>
					<td><input type='date' name='otrofecha' value='' size=8></td>
					<td  align=center><input type='text' name='otrodescripcion' value='' size=15></td>
					<td></td>
					<td  align=left><input type='text' name='otroused' value='' size=10></td>
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



/////////////////////////////////////////////////////////////////////////////////
	//$ainicio = date('Y-m-j'); lee la fecha actual 
	$afinal = strtotime ( '+'.$ca.' day' , strtotime ( $ainicio ) ) ;
	$afinal = date ( 'Y-m-j' , $afinal );
	mysql_query("UPDATE produccionm1 SET afinal= '".$afinal."' WHERE id = '1'");
//////////////////////////////////////////////////////////////////////////////////
							  	<td><input type="checkbox" name="a1" value="1"
							  		<?php if ($a1==1) echo"checked";?>>
							  	</td>



					<td align=left>Puesta Almacigo (3-5)</td>
					<td align=left>Germinacion</td>
					<?php
					for($x=1; $x<=3; $x++) {
						echo"<tr align=center>
							<form action='save.php' method='POST'>


								<td>1</td><td>3</td><td>6</td><td>7</td>
								<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
								<td></td><td></td><td></td><td></td>
							</form>
						</tr>";	    
					}?>
					<td align=left><?.$ainicio.?></td><td align=left><?.$afinal.?></td>
					<?


/////////////////////////////////////////////////////////////////////////////////////////////////
		mysql_query("UPDATE units_asigned SET status_unit='".$estado."'
		WHERE idstudent=".$addeidstudent." AND idunit=".$addunit."");
/////////////////////////////////////////////////////////////////////////////////////////////////
$query = "select * from units_asigned where idstudent = $filter_student AND status_unit = 0 order by id

/////////////////////////////////////////////////////////////////////////////////////////////////
					<td>
						<?php
						$result = mysql_query('SELECT * FROM catalogo order by id', $conexion);
						
						$rows = array();
						$idx = 0;?>

						<select name='name'>
  						<?php
  							while ($row = mysql_fetch_array($result)){?>
  								<option value='volvo'>V1</option>
							    <?php $rows[$idx++] = array('value' => $row['id'], 'text' => $row['descripcion']);?>

								<option value<?php echo'= '.$row['id'].' ';?>
								<?php if ($_SESSION['current_account']==$row['id']) echo 'selected="selected"';?>
								>
								<?php echo" ".$row['id']." ".$row['descripcion']." ";?></option>

  							<?}?>	
						</select>
					</td>




/////////////////////////////////////////////////////////////////////////////////////
this code is working........... mayo 8 2014
			<table border=0 width=100%>	
				<form action="change_curr_acc.php" method="POST">
			
						<td>Cuenta:</td>
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
							<td></td>
							<td><input type='image' src='img/tick.png' width='14' height='14' /></td>

						</td>
				</form>			
			</table>			


////////////////////////////////////////////////////////////////////////////////////////////////////
select llena de la base de datos


			<td>
				<form action="filter.php" method="POST">
			
			<td>Student:</td>
			<td>
						<?php
						$con = mysql_connect("localhost","quantid0_marco","~marco");
						if (!$con)  {
						    die('Could not connect: ' . mysql_error());
						}
						mysql_select_db("quantid0_fluent",$con);
						$query = "select * from students where asig = $teacherid order by apellido";//$teacherid
						$result = mysql_query($query);
		
						//declare the combo box
						$rows = array();
						$idx = 0;?>
						<select name="name">
							<option value="0"<?php if ($idx==0) echo 'selected="selected"';?>>all</option>;				
						<?php
						//list all of the other elements
						while ($row = mysql_fetch_array($result)){
						      $rows[$idx++] = array('value' => $row['id'], 'text' => $row['apellido']);?>
						<option value<?php echo"= ".$row['id']." ";?><?php if ($filter_student==$row['id']) echo 'selected="selected"';?>><?php echo" ".$row['nombre']." ".$row['apellido']." ";?></option>
						<?php
						}
						//close the combo box
						echo "</select>";
						//close db
						mysql_close($con);
						?>
					</td><td></td><td><input type='image' src='../images/tick.png' width='14' height='14' /></td>
				</form>			
			</td>

////////////////////////////////////////////////////////////////////////////////////////////////























<?php 
	session_start();

//echo" ".$_SESSION['usuario']." ".$_SESSION['password']." ";
	if(($_SESSION['adlogin'])=="si"){

	//Crear variables
	//$usuario = $_SESSION['usuario'];
	//$password = $_SESSION['password'];
	//$teacherid = $_SESSION['teacherid'];

	$filter_student = $_SESSION['filterStudent'];
?>
<!---------- start webPage ---------------->
<!DOCTYPE HTML>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ADMIN-PORTAL</title>
	
	<!-- Stylesheets -->
	<!--<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>-->
	<link rel="stylesheet" href="../css/adm_style.css">
	<LINK REL="SHORTCUT ICON" HREF="/backend/images/favicon.ico">

	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<script src="../js/jquery.js"></script>
	<script src="../js/script.js"></script> 
	<script src="../js/jquery-1.4.2.min.js"></script>

	<!-- script para el menu tabs -->
	<script>
		$(function() {
			$("li").click(function() {
			  e.preventDefault();
			  $("li").removeClass("selected");
			  $(this).addClass("selected");
			});
		});
	</script>

	<!-- end script para el menu tabs -->
 
</head>
<body>
<!------------------------------------------ TOP BAR ----------------------------------->

	<div id="top-bar">
		
		<div class="page-full-width cf">

			<a href="#" id="company-branding" class="fl">
			<img src="/backend/images/logo2.png" alt="Fluent Speaking" /></a>	

			<div id="tools_2" class="fr">
			<a href="/backend/logout.php" title="Salir!">Logout</a>
			</div>

		</div> <!-- end full-width -->	
	
	</div>

<!---------------------------------------- END TOP BAR -------------------------------->	
	
	<!--------- HEADER TABS -------->
<!------------------------------------------------------------------------ Tabs Menu -->
	<ul class="tabrow">
		<li><a href="../index.php">General OVERVIEW</a></li>
		<li><a href="trainer.php">TRAINERs</a></li>
		<li class="selected"><a href="#">STUDENTs</a></li>
	</ul>
<!-------------------------------------------------------------------- end Tabs Menu -->
	<!--------- END HEADER -------->
	
	
	<!-- MAIN CONTENT -->
	

<!---------------------------------------------------------------- linea de control -->
<br />
<center>
	<table>			
	<!--<h1 class="fl">STUDENT Profile</h1><br /><br />
	<td width='200'><h7>STUDENT Summary</h7></td>-->
	<td>
		 Trainer:</td><td>

		<form action="filterteacher.php" method="POST">
				<?php
						$con = mysql_connect("localhost","quantid0_marco","~marco");
						if (!$con)  {
						    die('Could not connect: ' . mysql_error());
						}
						mysql_select_db("quantid0_fluent",$con);
						$query = "select * from trainers order by apellido";//$teacherid
						$result = mysql_query($query);
		
						//declare the combo box
						$rows = array();
						$idx = 0;?>
						<select name="name">
							<!--<option value="0"<?php if ($idx==0) echo 'selected="selected"';?>>all</option>;-->				
						<?php
						//list all of the other elements
						while ($row = mysql_fetch_array($result)){
						      $rows[$idx++] = array('value' => $row['id'], 'text' => $row['apellido']);?>
						<option value<?php echo"= ".$row['id']." ";?><?php if ($filter_student==$row['id']) echo 'selected="selected"';?>><?php echo" ".$row['nombre']." ".$row['apellido']." ";?></option>
						<?php
						}
						//close the combo box
						echo "</select>";
						//close db
						mysql_close($con);
						?>
				<input type='image' src='../images/tick.png' width='14' height=14' />	
		</form>
	</td><td>
		|  Student:</td><td>

		<form action="filterstudent.php" method="POST">
				<?php
						$con = mysql_connect("localhost","quantid0_marco","~marco");
						if (!$con)  {
						    die('Could not connect: ' . mysql_error());
						}
						mysql_select_db("quantid0_fluent",$con);
						$query = "select * from students order by apellido";//$teacherid
						$result = mysql_query($query);
		
						//declare the combo box
						$rows = array();
						$idx = 0;?>
						<select name="name">
							<!--<option value="0"<?php if ($idx==0) echo 'selected="selected"';?>>all</option>;-->				
						<?php
						//list all of the other elements
						while ($row = mysql_fetch_array($result)){
						      $rows[$idx++] = array('value' => $row['id'], 'text' => $row['apellido']);?>
						<option value<?php echo"= ".$row['id']." ";?><?php if ($filter_student==$row['id']) echo 'selected="selected"';?>><?php echo" ".$row['nombre']." ".$row['apellido']." ";?></option>
						<?php
						}
						//close the combo box
						echo "</select>";
						//close db
						mysql_close($con);
						?>
				<input type='image' src='../images/tick.png' width='14' height=14' />	
		</form>
	</td><td>

	| <a href="addstudent.php" ><img src="../images/add.png" width="14" height="14"/></a>
	| <a href="editstud.php" ><img src="../images/pencil.png" width="14" height="14"/></a>
	| <a href="delstudent.php"><img src="../images/trash.png" width="14" height="14"></a>
	
	<!--<a href="#"><img src="../images/money.png" width="16" height="16"></a>-->
<!--	| <a href="#"><img src="../images/mail.png" width="14" height="14"></a>-->
	| <a href="#"><img src="../images/pdf.png" width="14" height="14"></a>
<!--	| <a href="#"><img src="../images/print.gif" width="14" height="14"></a>-->	
	</td> 
	</table>
</center>
<!------------------------------------------------------------ end linea de control -->


<!----------------------------------------------------------------------- Tabs Menu -->
	<ul class="tabrow">
		<li class="selected"><a href="#">General Information</a></li>
		<li><a href="sbooking.php">Booking Information</a></li>
		<li><a href="scredit.php">Credit Summary</a></li>
		<li><a href="sunit.php">Units</a></li>
		<li><a href="sagenda.php">Training Agenda/Report</a></li>
	</ul>
<!------------------------------------------------------------------- end Tabs Menu -->

<!------------------------------------------------------------ leo base de datos ----->
<?php
	//conexion
		$conexion = mysql_connect("localhost","quantid0_marco","~marco");
		if(!$conexion){
		die ("No he podido conectar por la siguiente razon: ".mysql_error());
		}	
		mysql_select_db("quantid0_fluent",$conexion); 
		$result = mysql_query("SELECT * FROM students", $conexion);	
	
		while($row = mysql_fetch_array($result)){
			if($row['id'] == $filter_student){

					$_SESSION['sid']=$row['id'];
					$_SESSION['susuario']=$row['usuario'];
					$_SESSION['spassword']=$row['password'];
					$_SESSION['snombre']=$row['nombre'];
					$_SESSION['sapellido']=$row['apellido'];
					$_SESSION['sbirth']=$row['birth'];
					$_SESSION['sgender']=$row['gender'];			
					$_SESSION['shtown']=$row['htown'];
					$_SESSION['saddr']=$row['addr'];
					$_SESSION['snlang']=$row['nlang'];
					$_SESSION['scity']=$row['city'];
					$_SESSION['stzone']=$row['tzone'];
					$_SESSION['sawork']=$row['awork'];
					$_SESSION['stelefono']=$row['telefono'];
					$_SESSION['scelular']=$row['celular'];
					$_SESSION['semail']=$row['email'];
					$_SESSION['sskype']=$row['skype'];
					$_SESSION['scountry']=$row['country'];			
					$_SESSION['scode']=$row['code'];
					//$_SESSION['sposition']=$row['teacher_asig'];    //student position
					$_SESSION['sasig']=$row['asig'];

//recupera el nombre del entrenador

				$query4 = "select * from trainers"; 
				$result4 = mysql_query($query4);
				while($row4 = mysql_fetch_array($result4)){
					if($_SESSION['sasig'] == $row4['id']){
						$tname = $row4['nombre'];
						$tapellido = $row4['apellido'];	
						$_SESSION['sasig'] = "".$tname." ".$tapellido."";
						//$sasig = "".$tname." ".$tapellido."";
					}else{}
				}

				    //$sasig = $row['asig'];
			}else{}
		}

		$result2 = mysql_query("SELECT * FROM users", $conexion);	
	
		while($row2 = mysql_fetch_array($result2)){
			if($row2['id'] == 2){

					$_SESSION['user_id']=$row2['id'];
					$_SESSION['user_firstname']=$row2['first_name'];
					$_SESSION['user_lastname']=$row2['last_name'];
					$_SESSION['user_celular']=$row2['celular'];
					$_SESSION['user_email']=$row2['email'];

			}else{}
			if($row2['id'] == 3){

					$_SESSION['user_dos_id']=$row2['id'];
					$_SESSION['user_dos_firstname']=$row2['first_name'];
					$_SESSION['user_dos_lastname']=$row2['last_name'];
					$_SESSION['user_dos_email']=$row2['email'];

			}else{}
		}
$_SESSION['user_coord'] = $_SESSION['user_firstname']." ".$_SESSION['user_lastname'];
$_SESSION['user_dos'] = $_SESSION['user_dos_firstname']." ".$_SESSION['user_dos_lastname'];



//cerrar conexion
	mysql_close($conexion);
?>

<?php

	//inicio variables
	//	
	$add = 0;
	$ccl = 0;
	$used = 0;
	$ava = 0;
	$cot = 0;
	$sche = 0;

	//conexion
		$conexion = mysql_connect("localhost","quantid0_marco","~marco");
		if(!$conexion){
		die ("No he podido conectar por la siguiente razon: ".mysql_error());
		}	
		mysql_select_db("quantid0_fluent",$conexion); 
	//credit
		$query51 = "select * from credit_summary"; 
		$result51 = mysql_query($query51);
			while($row51 = mysql_fetch_array($result51)){
				if($filter_student == $row51['idstudent']){
					$add = $add + $row51['credit']; 				
				}else{}
			}
		$ava = $add;
	//events
		$result = mysql_query("SELECT * FROM events order by event_date", $conexion);
		$event = mysql_fetch_array($result);		
		do{
		   if($event['idstudent'] == $filter_student){

					$length = $event['hrs'];
					$status = $event['idstatus'];

			switch ($status) {
			   case "CCL":
				$ava = $ava-$length;
				$ccl = $ccl + $length;
				 break;
			   case "COT":
				$cot = $cot + 1;
				 break;
			   case "SCHEDULE":
				$ava = $ava-$length;
				$sche = $sche + $length;
				 break;
			   case "DONE":
				$ava = $ava-$length;
				$used = $used + $length;
				 break;
			}
		   }
		}while($event = mysql_fetch_array($result));

		//$ava = -$ava;

	//cerrar conexion
	mysql_close($conexion);
?>

<!------------------------------------------------------------- BASIC INFO ------------>
<center>
	<table border=0 width=85%>					
		<tr align = center>
			<td width=55% align=left><h9>BASIC INFORMATION</h9><table border=1 width=85%></table></td><br />
			<td align=left><h9>SETTINGS</h9><table border=1 width=85%></table></td>

		</tr>
		<tr><td> </td></tr>		
		<tr><td><h10>First Name :  </h10><h9><b><?=$_SESSION['snombre']?></b></h9></td><td><h10>Native Language :  </h10><h9><b><?=$_SESSION['snlang']?></b></h9></td></tr>
		<tr><td><h10>Last Name :  </h10><h9><b><?=$_SESSION['sapellido']?></b></h9></td><td><h10>City :  </h10><h9><b><?=$_SESSION['scity']?></b></h9></td></tr>
		<tr><td><h10>Date :  </h10><h9><b><?=$_SESSION['sbirth']?></b></h9></td><td><h10>Country :  </h10><h9><b><?=$_SESSION['scountry']?></b></h9></td></tr>
		<tr><td><h10>Gender :  </h10><h9><b><?=$_SESSION['sgender']?></b></h9></td><td><h10>Time Zone :  </h10><h9><b><?=$_SESSION['stzone']?></b></h9></td></tr>
		<tr><td><h10>HomeTown :  </h10><h9><b><?=$_SESSION['shtown']?></b></h9></td><td><h10>Actual Work :  </h10><h9><b><?=$_SESSION['sawork']?></b></h9></td></tr>
		<tr><td><h10>Address :  </h10><h9><b><?=$_SESSION['saddr']?></b></h9></td><td></td></tr>
		<tr><td><h10>_</h10></td><td></td></tr>

		<tr>
			<td width=50% align=left><h9>MEDIA SETTINGS</h9><table border=1 width=85%></table></td><br />
			<td align=left><h9>LOGIN & PASSWORD</h9><table border=1 width=85%></table></td>
		</tr>
		<tr><td><h10>Phone :  </h10><h9><b><?=$_SESSION['stelefono']?></b></h9></td><td><h10>User :  </h10><h9><b><?=$_SESSION['susuario']?></b></h9></td></tr>
		<tr><td><h10>Mobile phone :  </h10><h9><b><?=$_SESSION['scelular']?></b></h9></td><td><h10>Password :  </h10><h9><b><?=$_SESSION['spassword']?></b></h9></td></tr>
		<tr><td><h10>Skype :  </h10><h9><b><?=$_SESSION['sskype']?></b></h9></td><td><h10>Current Trainer : </h10><h9><b><?=$_SESSION['sasig']?></b></h9></td></tr>
		<tr><td><h10>e-mail :  </h10><h9><b><?=$_SESSION['semail']?></b></h9></td><td><h10>Code :  </h10><h9><b><?=$_SESSION['scode']?></b></h9></td></tr>
		<tr><td><h10></h10></td><td><h10>Event Coordinator :  </h10><h9><b><?=$_SESSION['user_coord']?></b></h9></td></tr>
		<tr><td><h10>_</h10></td><td><h10>Director of Studies :  </h10><h9><b><?=$_SESSION['user_dos']?></b></h9></td></tr>

	</table>
</center>
<!------------------------------------------------------------- end BASIC INFO -------->

</tr>			
	</div> <!-- end content -->

	
	<!-- FOOTER -->
	<div id="footer">

		<p>Copyright 2012 &copy;<a href="http://www.languacom.de">LANGUACOM</a>. All rights reserved.</p>
		<!--<p><strong>AdminPortal </strong> by &copy;<a href="http://www.fluentspeaking.com"> QUANTICA SOFT, LLC</a></p>-->
	
	</div> <!-- end footer -->

</body>
</html>
<!---------- end webPage ---------------->
<?php	

//	$_SESSION['adlogin'] = "no";
	}else{

	echo '<meta http-equiv="REFRESH" content="0,url=../formlogin.html">';

	}
?>





////////////////
fecha y horas

            $dia = date(j);
            $mes = date(n);
            $anho= date(Y);
            $fechita1 = $dia . '/' . $mes . '/' . $anho;

            
            http://www.alaingarcia.net/weird/date_php.php

//////////////////////////////////////
newadm.php

<?php 
	session_start();

	if(($_SESSION['adlogin'])=="si" && $_SESSION['level'] == "0"){

	//Crear variables

	//Recupero variables	
		$adduser = $_POST['aduser'];
		$addpassword = $_POST['adpassword'];
		$addname = $_POST['adname'];
		$addlast = $_POST['adlast'];
		$addlevel = $_POST['adlevel'];
		$addlastvisit = $_POST['adlastvisit'];
		$addstatus = $_POST['adstatus'];

	//conexion
		$conexion = mysql_connect("localhost","dbo469629526","~marco123");
		if(!$conexion){
			die ("No he podido conectar por la siguiente razon: ".mysql_error());
		}	
		mysql_select_db("db469629526",$conexion); 
		$result = mysql_query(("INSERT INTO administra (user, password, name, last, level, status)
		 VALUES('$adduser','$addpassword','$addname','$addlast','$addlevel','$addstatus')"), $conexion);

	//cerrar
		mysql_close($conexion);

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=admins.php">';

	}else{

	echo '<meta http-equiv="REFRESH" content="0,url=/fluent/formlogin.html">';

	}
?>




login.php
<?php session_start();?>
<?php

	//inicializar variables
	$flag = 0;
	$_SESSION['adlogin'] = "no";

	//Recupero variables
		$usuariorecibido = $_POST['user'];
		$passwordrecibido = $_POST['password'];

//check si es admin	
	//conexion
	$conexion = mysql_connect("localhost","dbo469629526","~marco123");
	if(!$conexion){
	die ("No he podido conectar por la siguiente razon: ".mysql_error());
	}	
	mysql_select_db("db469629526",$conexion); 
	$result = mysql_query("SELECT * FROM administra", $conexion);

	while ($row = mysql_fetch_array($result)){
		$iddb = $row['id'];
		$userdb = $row['user'];	
		$passworddb = $row['password'];
		$namedb = $row['name'];
		$lastdb = $row['last'];
		$leveldb = $row['level'];
		$statusdb = $row['status'];

		if($userdb == $usuariorecibido AND $passworddb == $passwordrecibido){
			$flag++;
			$_SESSION['adlogin'] = "si";
			$_SESSION['whos'] = "adm";

			$_SESSION['admid'] = $iddb;
			$_SESSION['admuser'] = $userdb;		
			$_SESSION['admpassword'] = $passworddb;		
			$_SESSION['admlevel'] = $leveldb;
			$_SESSION['admstatus'] = $statusdb;

		}else{
			//$flag = 0;
			//$_SESSION['adlogin'] = "no";
			//$_SESSION['whos'] = "";
		}

	}

	if ($flag == 1){
	//cerrar
	//			mysql_close($conexion);	
	//echo '<meta http-equiv="REFRESH" content="0,url=../formlogin.html">';
		if(($_SESSION['admstatus']) == 1){
			echo '<meta HTTP-EQUIV="REFRESH" content="0,url=key.php">';
		}else{	
			echo '<meta http-equiv="REFRESH" content="0,url=../formlogin.html">';
		}		
	}else{
		echo '<meta http-equiv="REFRESH" content="0,url=../formlogin.html">';
	}

?>


//////////////////////////////////////////////////////////////////////////////////////////////////











login.php
<?php session_start();?>
<?php

	//inicializar variables
	$flag = 0;
	$_SESSION['adlogin'] = "no";
	$_SESSION['whos'] = " ";

			$_SESSION['admid'] = "";
			$_SESSION['admuser'] = "";	
			$_SESSION['admpassword'] = "";		
			$_SESSION['admlevel'] = "";
			$_SESSION['admstatus'] = 0;	

	//Recupero variables
		$usuariorecibido = $_POST['user'];
		$passwordrecibido = $_POST['password'];
//check si es admin	
	//conexion
	$conexion = mysql_connect("localhost","dbo469629526","~marco123");
	if(!$conexion){
	die ("No he podido conectar por la siguiente razon: ".mysql_error());
	}	
	mysql_select_db("db469629526",$conexion); 
	$result = mysql_query("SELECT * FROM administra", $conexion);

	while ($row = mysql_fetch_array($result)){
		$iddb = $row['id'];
		$userdb = $row['user'];	
		$passworddb = $row['password'];
		$namedb = $row['name'];
		$lastdb = $row['last'];
		$leveldb = $row['level'];
		$statusdb = $row['status'];

		if($userdb == $usuariorecibido AND $passworddb == $passwordrecibido){
			$flag++;
			$_SESSION['adlogin'] = "si";
			$_SESSION['whos'] = "adm";

			$_SESSION['admid'] = $iddb;
			$_SESSION['admuser'] = $userdb;		
			$_SESSION['admpassword'] = $passworddb;		
			$_SESSION['admlevel'] = $leveldb;
			$_SESSION['admstatus'] = $statusdb;

		}else{
			//$flag = 0;
			//$_SESSION['adlogin'] = "no";
			//$_SESSION['whos'] = "";
		}

	}

	if ($flag == 1){
	//cerrar
	//			mysql_close($conexion);	
	//echo '<meta http-equiv="REFRESH" content="0,url=../formlogin.html">';
			if(($_SESSION['admstatus']) == 1){

				echo '<meta HTTP-EQUIV="REFRESH" content="0,url=key.php">';
				
			}else{	
				echo '<meta http-equiv="REFRESH" content="0,url=../formlogin.html">';
			}		
	}else{

	//check si es teacher	
		//conexion
		$conexion = mysql_connect("localhost","dbo469629526","~marco123");
		if(!$conexion){
		die ("No he podido conectar por la siguiente razon: ".mysql_error());
		}	
		mysql_select_db("db469629526",$conexion); 
		$result = mysql_query("SELECT * FROM trainers", $conexion);

		while ($row = mysql_fetch_array($result)){
			$iddb = $row['id'];
			$statusdb = $row['status'];	
			$usuariodb = $row['usuario'];
			$passworddb = $row['password'];

			if($usuariodb == $usuariorecibido AND $passworddb == $passwordrecibido){
				$flag++;
				$_SESSION['adlogin'] = "si";
				$_SESSION['whos'] = "";

				$_SESSION['tid'] = $iddb;
				$_SESSION['tstatus'] = $statusdb;
				$_SESSION['tusuario'] = $usuariodb;		
				$_SESSION['tpassword'] = $passworddb;		
				$_SESSION['tnombre'] = $nombredb;
				$_SESSION['tapellido'] = $apellidodb;
				$_SESSION['tcelular'] = $celulardb;
				$_SESSION['temail'] = $emaildb;
				$_SESSION['tskype'] = $skypedb;
				$_SESSION['tolp'] = $olpdb;
				$_SESSION['tcountry'] = $countrydb;

			}else{
				//$flag = 0;
				//$_SESSION['adlogin'] = "no";
				//$_SESSION['whos'] = "";
			}

		}

		if ($flag == 1){
			if(($_SESSION['tstatus']) == 1){
				echo '<meta HTTP-EQUIV="REFRESH" content="0,url=key.php">';
			}else{	
				echo '<meta http-equiv="REFRESH" content="0,url=../formlogin.html">';
			}
		}else{

		}	

		echo '<meta http-equiv="REFRESH" content="0,url=../formlogin.html">';
	}

?>




key.php
<?php 
	session_start();

	//recupero variables
		$niv = 0; //$_SESSION['admlevel'];
		$whois = $_SESSION['whos'];
	//creo variables
		$str_hoy = date("d/m/Y");
		$fecha_hoy = (explode('/', $str_hoy, 3));
		//valido dia
		$dia_hoy = $fecha_hoy[0];
		$mes_hoy = $fecha_hoy[1];
		$ano_hoy = $fecha_hoy[2];
		//inicia variables fechas
		$_SESSION['mes'] = $mes_hoy;
		$_SESSION['ano'] = $ano_hoy;		
			
	if(($_SESSION['adlogin'])=="si"){
		if($whois == "adm"){

			if($niv == 0){
				echo '<meta http-equiv="REFRESH" content="0,url=/fluent/backend/admin/admin.php">';//ok!

			}else{
				echo '<meta http-equiv="REFRESH" content="0,url=/fluent/backend/admin/admin1.php">';//ok!
			}

		}else{
			echo '<meta http-equiv="REFRESH" content="0,url=/fluent/backend/teacher/php/overview.php">';//ok!
		}
	}else{
		echo '<meta http-equiv="REFRESH" content="0,url=/fluent/indexes.php">';//ok!
	}
?>







<?php 
session_start();

	//inicializar variables
	$flag = 0;
	$_SESSION['adlogin'] = "no";

	//Recupero variables
		$usuariorecibido = $_POST['user'];
		$passwordrecibido = $_POST['password'];
//check si es admin	
	//conexion
		$conexion = mysql_connect("localhost","dbo469629526","~marco123");
		if(!$conexion){
			die ("No he podido conectar por la siguiente razon: ".mysql_error());
		}	
		mysql_select_db("db469629526",$conexion); 
		$result = mysql_query("SELECT * FROM administra", $conexion);

		while($row = mysql_fetch_array($result)){
				$iddb = $row['id'];
				$userdb = "ad";//$row['user'];	
				$passworddb = "ad";//$row['password'];
				$nombredb = $row['name'];
				$apellidodb = $row['last'];
				$leveldb = 0;//$row['level'];
				$lastvisitdb = $row['lastvisit'];
				$statusdb = 1;//$row['status'];

			if($userdb == $usuariorecibido AND $passworddb == $passwordrecibido){
				$_SESSION['adlogin'] = "si";
				$flag++;
				$_SESSION['whos'] = "adm";
				if($statusdb == 1){
					$_SESSION['level'] = $leveldb;
					echo '<meta HTTP-EQUIV="REFRESH" content="0,url=key.php">';
				}else{	
					echo '<meta http-equiv="REFRESH" content="0,url=../formlogin.html">';
				}
			}else{
				$flag = 0;
				$_SESSION['adlogin'] = "no";
				$_SESSION['whos'] = "";
			//cerrar
			//			mysql_close($conexion);	
				echo '<meta http-equiv="REFRESH" content="0,url=../formlogin.html">';
			}		    

		}
	echo '<meta http-equiv="REFRESH" content="0,url=../formlogin.html">';	
?>