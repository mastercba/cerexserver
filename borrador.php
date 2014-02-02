
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