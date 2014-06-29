<?php 

	require("../config.php");

	//recupero variables

	//creo variables
  
    // At the top of the page we check to see whether the user 
    if(empty($_SESSION['usuario'])){ //is logged in or not 
        // If they are not, we redirect them to the login page. 
        header("Location: /cerexserver/formlogin.html");          
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to /cerexserver/formlogin.html"); 
    }     
    // Everything below this point in the file is secured by the login system

	//Recupero variables	
		$ainicio = $_POST['ainicio_new'];
		$binicio = $_POST['binicio_new'];
		$cinicio = $_POST['cinicio_new'];
		$dinicio = $_POST['dinicio_new'];

	$a[1] = $_POST['a1'];$a[2] = $_POST['a2'];$a[3] = $_POST['a3'];
	$a[4] = $_POST['a4'];$a[5] = $_POST['a5'];

	$b[1] = $_POST['b1'];$b[2] = $_POST['b2'];$b[3] = $_POST['b3'];
	$b[4] = $_POST['b4'];$b[5] = $_POST['b5'];$b[6] = $_POST['b6'];
	$b[7] = $_POST['b7'];$b[8] = $_POST['b8'];$b[9] = $_POST['b9'];
	$b[10] = $_POST['b10'];$b[11] = $_POST['b11'];$b[12] = $_POST['b12'];
	$b[13] = $_POST['b13'];$b[14] = $_POST['b14'];$b[15] = $_POST['b15'];
	$b[16] = $_POST['b16'];$b[17] = $_POST['b17'];$b[18] = $_POST['b18'];
	$b[19] = $_POST['b19'];$b[20] = $_POST['b20'];
	$b[21] = $_POST['b21'];$b[22] = $_POST['b22'];$b[23] = $_POST['b23'];
	$b[24] = $_POST['b24'];$b[25] = $_POST['b25'];

	$c[1] = $_POST['c1'];$c[2] = $_POST['c2'];$c[3] = $_POST['c3'];
	$c[4] = $_POST['c4'];$c[5] = $_POST['c5'];$c[6] = $_POST['c6'];
	$c[7] = $_POST['c7'];$c[8] = $_POST['c8'];$c[9] = $_POST['c9'];
	$c[10] = $_POST['c10'];$c[11] = $_POST['c11'];$c[12] = $_POST['c12'];
	$c[13] = $_POST['c13'];$c[14] = $_POST['c14'];$c[15] = $_POST['c15'];
	$c[16] = $_POST['c16'];$c[17] = $_POST['c17'];$c[18] = $_POST['c18'];
	$c[19] = $_POST['c19'];$c[20] = $_POST['c20'];$c[21] = $_POST['c21'];
	$c[22] = $_POST['c22'];$c[23] = $_POST['c23'];$c[24] = $_POST['c24'];
	$c[25] = $_POST['c25'];
	$c[26] = $_POST['c26'];$c[27] = $_POST['c27'];$c[28] = $_POST['c28'];
	$c[29] = $_POST['c29'];$c[30] = $_POST['c30'];

	$d[1] = $_POST['d1'];$d[2] = $_POST['d2'];$d[3] = $_POST['d3'];
	$d[4] = $_POST['d4'];$d[5] = $_POST['d5'];

if (isset($_POST['a1'])) {$a[1]=1;}else{$a[1]=0;}
if (isset($_POST['a2'])) {$a[2]=1;}else{$a[2]=0;}
if (isset($_POST['a3'])) {$a[3]=1;}else{$a[3]=0;}
if (isset($_POST['a4'])) {$a[4]=1;}else{$a[4]=0;}
if (isset($_POST['a5'])) {$a[5]=1;}else{$a[5]=0;}

if (isset($_POST['b1'])) {$b[1]=1;}else{$b[1]=0;}
if (isset($_POST['b2'])) {$b[2]=1;}else{$b[2]=0;}
if (isset($_POST['b3'])) {$b[3]=1;}else{$b[3]=0;}
if (isset($_POST['b4'])) {$b[4]=1;}else{$b[4]=0;}
if (isset($_POST['b5'])) {$b[5]=1;}else{$b[5]=0;}
if (isset($_POST['b6'])) {$b[6]=1;}else{$b[6]=0;}
if (isset($_POST['b7'])) {$b[7]=1;}else{$b[7]=0;}
if (isset($_POST['b8'])) {$b[8]=1;}else{$b[8]=0;}
if (isset($_POST['b9'])) {$b[9]=1;}else{$b[9]=0;}
if (isset($_POST['b10'])) {$b[10]=1;}else{$b[10]=0;}
if (isset($_POST['b11'])) {$b[11]=1;}else{$b[11]=0;}
if (isset($_POST['b12'])) {$b[12]=1;}else{$b[12]=0;}
if (isset($_POST['b13'])) {$b[13]=1;}else{$b[13]=0;}
if (isset($_POST['b14'])) {$b[14]=1;}else{$b[14]=0;}
if (isset($_POST['b15'])) {$b[15]=1;}else{$b[15]=0;}
if (isset($_POST['b16'])) {$b[16]=1;}else{$b[16]=0;}
if (isset($_POST['b17'])) {$b[17]=1;}else{$b[17]=0;}
if (isset($_POST['b18'])) {$b[18]=1;}else{$b[18]=0;}
if (isset($_POST['b19'])) {$b[19]=1;}else{$b[19]=0;}
if (isset($_POST['b20'])) {$b[20]=1;}else{$b[20]=0;}
if (isset($_POST['b21'])) {$b[21]=1;}else{$b[21]=0;}
if (isset($_POST['b22'])) {$b[22]=1;}else{$b[22]=0;}
if (isset($_POST['b23'])) {$b[23]=1;}else{$b[23]=0;}
if (isset($_POST['b24'])) {$b[24]=1;}else{$b[24]=0;}
if (isset($_POST['b25'])) {$b[25]=1;}else{$b[25]=0;}


if (isset($_POST['c1'])) {$c[1]=1;}else{$c[1]=0;}
if (isset($_POST['c2'])) {$c[2]=1;}else{$c[2]=0;}
if (isset($_POST['c3'])) {$c[3]=1;}else{$c[3]=0;}
if (isset($_POST['c4'])) {$c[4]=1;}else{$c[4]=0;}
if (isset($_POST['c5'])) {$c[5]=1;}else{$c[5]=0;}
if (isset($_POST['c6'])) {$c[6]=1;}else{$c[6]=0;}
if (isset($_POST['c7'])) {$c[7]=1;}else{$c[7]=0;}
if (isset($_POST['c8'])) {$c[8]=1;}else{$c[8]=0;}
if (isset($_POST['c9'])) {$c[9]=1;}else{$c[9]=0;}
if (isset($_POST['c10'])) {$c[10]=1;}else{$c[10]=0;}
if (isset($_POST['c11'])) {$c[11]=1;}else{$c[11]=0;}
if (isset($_POST['c12'])) {$c[12]=1;}else{$c[12]=0;}
if (isset($_POST['c13'])) {$c[13]=1;}else{$c[13]=0;}
if (isset($_POST['c14'])) {$c[14]=1;}else{$c[14]=0;}
if (isset($_POST['c15'])) {$c[15]=1;}else{$c[15]=0;}
if (isset($_POST['c16'])) {$c[16]=1;}else{$c[16]=0;}
if (isset($_POST['c17'])) {$c[17]=1;}else{$c[17]=0;}
if (isset($_POST['c18'])) {$c[18]=1;}else{$c[18]=0;}
if (isset($_POST['c19'])) {$c[19]=1;}else{$c[19]=0;}
if (isset($_POST['c20'])) {$c[20]=1;}else{$c[20]=0;}
if (isset($_POST['c21'])) {$c[21]=1;}else{$c[21]=0;}
if (isset($_POST['c22'])) {$c[22]=1;}else{$c[22]=0;}
if (isset($_POST['c23'])) {$c[23]=1;}else{$c[23]=0;}
if (isset($_POST['c24'])) {$c[24]=1;}else{$c[24]=0;}
if (isset($_POST['c25'])) {$c[25]=1;}else{$c[25]=0;}
if (isset($_POST['c26'])) {$c[26]=1;}else{$c[26]=0;}
if (isset($_POST['c27'])) {$c[27]=1;}else{$c[27]=0;}
if (isset($_POST['c28'])) {$c[28]=1;}else{$c[28]=0;}
if (isset($_POST['c29'])) {$c[29]=1;}else{$c[29]=0;}
if (isset($_POST['c30'])) {$c[30]=1;}else{$c[30]=0;}


if (isset($_POST['d1'])) {$d[1]=1;}else{$d[1]=0;}
if (isset($_POST['d2'])) {$d[2]=1;}else{$d[2]=0;}
if (isset($_POST['d3'])) {$d[3]=1;}else{$d[3]=0;}
if (isset($_POST['d4'])) {$d[4]=1;}else{$d[4]=0;}
if (isset($_POST['d5'])) {$d[5]=1;}else{$d[5]=0;}

		mysql_query("UPDATE produccionm1 SET ainicio= '".$ainicio."',
			cinicio= '".$cinicio."',

a1='".$a[1]."',a2='".$a[2]."',a3='".$a[3]."',a4='".$a[4]."',a5='".$a[5]."',

b1='".$b[1]."',b2='".$b[2]."',b3='".$b[3]."',b4='".$b[4]."',b5='".$b[5]."',
b6='".$b[6]."',b7='".$b[7]."',b8='".$b[8]."',b9='".$b[9]."',b10='".$b[10]."',
b11='".$b[11]."',b12='".$b[12]."',b13='".$b[13]."',b14='".$b[14]."',b15='".$b[15]."',
b16='".$b[16]."',b17='".$b[17]."',b18='".$b[18]."',b19='".$b[19]."',b20='".$b[20]."',b21='".$b[21]."',b22='".$b[22]."',b23='".$b[23]."',b24='".$b[24]."',b25='".$b[25]."',

c1='".$c[1]."',c2='".$c[2]."',c3='".$c[3]."',c4='".$c[4]."',c5='".$c[5]."',
c6='".$c[6]."',c7='".$c[7]."',c8='".$c[8]."',c9='".$c[9]."',c10='".$c[10]."',
c11='".$c[11]."',c12='".$c[12]."',c13='".$c[13]."',c14='".$c[14]."',c15='".$c[15]."',
c16='".$c[16]."',c17='".$c[17]."',c18='".$c[18]."',c19='".$c[19]."',c20='".$c[20]."',
c21='".$c[21]."',c22='".$c[22]."',c23='".$c[23]."',c24='".$c[24]."',c25='".$c[25]."',c26='".$c[26]."',c27='".$c[27]."',c28='".$c[28]."',c29='".$c[29]."',c30='".$c[30]."',


d1='".$d[1]."',d2='".$d[2]."',d3='".$d[3]."',d4='".$d[4]."',d5='".$d[5]."'

		WHERE id = '1'");

		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=control.php">';

?>