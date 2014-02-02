<?php 

	require("../config.php");

	//recupero variables

	//creo variables
    
    // At the top of the page we check to see whether the user 
    if(empty($_SESSION['usuario'])){ //is logged in or not 
        // If they are not, we redirect them to the login page. 
        header("Location: /cerex/formlogin.html");          
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to /cerex/formlogin.html"); 
    }     
    // Everything below this point in the file is secured by the login system

	//Recupero Variables	
	$idacc = $_GET['acid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>CEREX ANDINA</title>

	<link rel="stylesheet" type="text/css" href="/cerex/backend/admin/css/normalize.css"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="/cerex/backend/admin/css/estilos_adm.css"/>
	<link rel="shortcut icon" href="/cerex/frontend/img/favicon.ico">

	<script src="/cerex/backend/admin/js/prefixfree.min.js"></script>
	<script src="/cerex/backend/admin/js/jquery.js"></script>
	<script src="/cerex/backend/admin/js/fluent.js"></script>
	<script src="/cerex/backend/admin/js/script.js"></script> 
</head>

<body>
	<div id="top_menu"><!--<menu superior>-->
		<div id="menu">
			<a href="/cerex/backend/logout.php" title="Salir!">Logout</a>
		</div>        
	</div>
	<div id="logo"><!--<logo>-->
		<a style="text-decoration: none; margin-left: 12px;" href="http://www.fluentspeaking.com" title="FluentSpeaking">
		    <img style="margin-top: 2px;" height="39" src="/cerex/backend/admin/img/logo_last.png" alt="Fluent Speaking" />
		</a>
	</div>
	<br />
	<ul class="tabrow"><!--- Tabs Menu -->
		<li><a href="/cerex/backend/admin/admin.php">WEBPAGE</a></li>
		<li class="selected"><a href="/cerex/backend/admin/account.php">ACCOUNTING</a></li>
		<li><a href="/cerex/backend/admin/admins.php">ADMINs</a></li>
		<li><a href="/cerex/backend/admin/trainer.php">TRAINERs</a></li>
		<li><a href="#">STUDENTs</a></li>
		<li><a href="#">UNITs</a></li>
	</ul>
	<br />
	
	<!-- MAIN CONTENT -->
	<section>
		<div id="table_trainer">
			<center>					
				<table border=0 width=100%>					
					<tr align=center>
						<td><strong>ID</strong></td>
						<td><strong>Date & Time</strong></td>
						<td align=left><strong>Description</strong></td>
						
						<td><strong>Income</strong></td>
						<td><strong>Expense</strong></td>
						<td><strong>Balance</strong></td>
	
						<td><strong>Actions</strong></td>
					</tr>
<?php
		$result = mysql_query("SELECT * FROM account", $conexion);

		while($row = mysql_fetch_array($result)){
				$accid = $row['id'];
			if($idacc == $accid){
			
				    $accid = $row['id'];
				echo"<tr align=center>
				<form action='saveacc.php' method = 'POST'>
				<td>".$accid."</td>
				<td><input type='text' name='nfecha' value='".$row['created_at']."' size=8></td>
				<td align=left><input type='text' name='ndetalle' value='".$row['descripcion']."' size=45></td>

				<td><input type='text' name='ningresos' value='".$row['ingreso']."' size=7></td>
				<td><input type='text' name='negresos' value='".$row['egreso']."' size=7></td>
				<td><input type='text' name='nsaldo' value='".$row['saldo']."' size=7></td>


			    <td><input type='image' src='img/tick.png' width='14' height=14'/>
				|<a href='account.php'><img src='img/backward.png' width='14' height=14'></a></td>
				</form>
				</tr>";
		
		$_SESSION['idacc'] = $idacc;
//		break;

//		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=trainer.php">';

			}else{}

		}		   			 
?>
				</table>					
			</center>			
		</div> <!-- end content -->
	<br /><br />
	</section>
	
<!-- FOOTER -->
	<div id="footer">
		<p>Copyright 2014 &copy;<a href="http://www.quanticasoft.com/cerex">CEREX ANDINA</a>. All rights reserved.</p>
		<!--<p><strong>AdminPortal </strong> by &copy;<a href="http://www.fluentspeaking.com"> QUANTICA SOFT, LLC</a></p>-->
	</div> 
<!-- end footer -->

</body>
</html>
<!-- end webPage -->
