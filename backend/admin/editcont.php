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
		<li><a href="/cerexserver/backend/admin/production.php">COSTOS de PRODUCCION</a></li>
		<li class="selected"><a href="/cerexserver/backend/admin/control.php">PRODUCCION</a></li>
	</ul>
	
	
<!-- MAIN CONTENT -->
	<!-- leo base de datos -->
	<?php 
	$result48 = mysql_query("SELECT * FROM produccionm1", $conexion);	
	while($row = mysql_fetch_array($result48)){
		$inicio = $row['inicio'];$final = $row['final'];$ainicio = $row['ainicio'];
		$afinal = $row['afinal'];$a[1] = $row['a1'];$a[2] = $row['a2'];
		$a[3] = $row['a3'];$a[4] = $row['a4'];$a[5] = $row['a5'];
		$binicio = $row['binicio'];$bfinal = $row['bfinal'];$b[1] = $row['b1'];
		$b[2] = $row['b2'];$b[3] = $row['b3'];$b[4] = $row['b4'];
		$b[5] = $row['b5'];$b[6] = $row['b6'];$b[7] = $row['b7'];
		$b[8] = $row['b8'];$b[9] = $row['b9'];$b[10] = $row['b10'];
		$b[11] = $row['b11'];$b[12] = $row['b12'];$b[13] = $row['b13'];
		$b[14] = $row['b14'];$b[15] = $row['b15'];$b[16] = $row['b16'];
		$b[17] = $row['b17'];$b[18] = $row['b18'];$b[19] = $row['b19'];
		$b[20] = $row['b20'];$cinicio = $row['cinicio'];$cfinal = $row['cfinal'];
		$c[1] = $row['c1'];$c[2] = $row['c2'];$c[3] = $row['c3'];$c[4] = $row['c4'];    
		$c[5] = $row['c5'];$c[6] = $row['c6'];$c[7] = $row['c7'];$c[8] = $row['c8'];    
		$c[9] = $row['c9'];$c[10] = $row['c10'];$c[11] = $row['c11'];$c[12] = $row['c12'];    
		$c[13] = $row['c13'];$c[14] = $row['c14'];$c[15] = $row['c15'];$c[16] = $row['c16'];    
		$c[17] = $row['c17'];$c[18] = $row['c18'];$c[19] = $row['c19'];$c[20] = $row['c20'];    
		$c[21] = $row['c21'];$c[22] = $row['c22'];$c[23] = $row['c23'];$c[24] = $row['c24'];    
		$c[25] = $row['c25'];
		$dinicio = $row['dinicio'];$dfinal = $row['dfinal'];$d[1] = $row['d1'];
		$d[2] = $row['d2'];$d[3] = $row['d3'];$d[4] = $row['d4'];$d[5] = $row['d5'];    
	}
	?>
	<!-- cuento dias -->
		<?php
			$ca=0;$cb=0;$cc=0;$cd=0;
			for ($x=1; $x<=5; $x++){If($a[$x]==1){$ca = $ca + 1;}else{}}
			for ($x=1; $x<=20; $x++){If($b[$x]==1){$cb = $cb + 1;}else{}}
			for ($x=1; $x<=25; $x++){If($c[$x]==1){$cc = $cc + 1;}else{}}
			for ($x=1; $x<=5; $x++){If($d[$x]==1){$cd = $cd + 1;}else{}}?>

	<!-- calculo las fechas finales -->
		<?php
			//$ainicio = date('Y-m-j'); lee la fecha actual 
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
			<td><td> | </td>
				<td></td><td><button form="form1"><img src="/cerexserver/backend/admin/img/save4.jpg" width="24" height="24"/></button></td>
				<td></td><td> | </td>					
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
					<td align=center><strong>Inicio</strong></td>
					<td align=center><strong>Fin</strong></td>
				</tr>	
				<tr align=center>
					<form action='saveControl.php' method='POST' id="form1">
					  <td align=left>Puesta Almacigo (3-5)</td>
					  <td align=left>Germinacion</td>
					  <td><input type="checkbox" name="a1" value=""<?php if ($a[1]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="a2" value=""<?php if ($a[2]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="a3" value=""<?php if ($a[3]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="a4" value=""<?php if ($a[4]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="a5" value=""<?php if ($a[5]==1){echo"checked";}else{}?>></td>
					  <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
					  <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
					  <td></td>
					  <td align=center><input type='date' name='ainicio_new' value<?php echo'= '.$ainicio.' ';?>></td>
					  <td><?=$afinal?></td>

					  <tr></tr>
					  <td align=left>Trasplante (16-20)</td>
					  <td align=left>plantas con 6a8 hojas</td>
					  <td><input type="checkbox" name="b1" value="1"<?php if ($b[1]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b2" value="1"<?php if ($b[2]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b3" value="1"<?php if ($b[3]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b4" value="1"<?php if ($b[4]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b5" value="1"<?php if ($b[5]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b6" value="1"<?php if ($b[6]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b7" value="1"<?php if ($b[7]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b8" value="1"<?php if ($b[8]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b9" value="1"<?php if ($b[9]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b10" value="1"<?php if ($b[10]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b11" value="1"<?php if ($b[11]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b12" value="1"<?php if ($b[12]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b13" value="1"<?php if ($b[13]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b14" value="1"<?php if ($b[14]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b15" value="1"<?php if ($b[15]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b16" value="1"<?php if ($b[16]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b17" value="1"<?php if ($b[17]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b18" value="1"<?php if ($b[18]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b19" value="1"<?php if ($b[19]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="b20" value="1"<?php if ($b[20]==1){echo"checked";}else{}?>></td>
  					  <td align=center><input type='date' name='binicio_new' value<?php echo'= '.$binicio.' ';?>></td>
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
					<td align=center><strong>Inicio</strong></td>
					<td align=center><strong>Fin</strong></td>
				</tr>
				<tr align=center>
					  <td align=left>Madurez(20-25)</td>
					  <td align=left>Follaje y tamano</td>
					  <td><input type="checkbox" name="c1" value="1"<?php if ($c[1]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c2" value="1"<?php if ($c[2]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c3" value="1"<?php if ($c[3]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c4" value="1"<?php if ($c[4]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c5" value="1"<?php if ($c[5]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c6" value="1"<?php if ($c[6]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c7" value="1"<?php if ($c[7]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c8" value="1"<?php if ($c[8]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c9" value="1"<?php if ($c[9]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c10" value="1"<?php if ($c[10]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c11" value="1"<?php if ($c[11]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c12" value="1"<?php if ($c[12]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c13" value="1"<?php if ($c[13]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c14" value="1"<?php if ($c[14]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c15" value="1"<?php if ($c[15]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c16" value="1"<?php if ($c[16]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c17" value="1"<?php if ($c[17]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c18" value="1"<?php if ($c[18]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c19" value="1"<?php if ($c[19]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c20" value="1"<?php if ($c[20]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c21" value="1"<?php if ($c[16]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c22" value="1"<?php if ($c[17]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c23" value="1"<?php if ($c[18]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c24" value="1"<?php if ($c[19]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="c25" value="1"<?php if ($c[20]==1){echo"checked";}else{}?>></td>
					  <td align=center><input type='date' name='cinicio_new' value<?php echo'= '.$cinicio.' ';?>></td>
					  <tr></tr>
					  <td align=left>Cosecha (5)</td>
					  <td align=left>Follaje peso 100gr y tamano</td>
					  <td><input type="checkbox" name="d1" value="1"<?php if ($d[1]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="d2" value="1"<?php if ($d[2]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="d3" value="1"<?php if ($d[3]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="d4" value="1"<?php if ($d[4]==1){echo"checked";}else{}?>></td>
					  <td><input type="checkbox" name="d5" value="1"<?php if ($d[5]==1){echo"checked";}else{}?>></td>
					  <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
					  <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
					  <td></td><td></td><td></td><td></td><td></td><td></td>
  					  <td align=center><input type='date' name='dinicio_new' value<?php echo'= '.$dinicio.' ';?>></td>
					</form>
				</tr>

			</table> <br/>
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