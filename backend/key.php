<?php 
	
	require("config.php");

	//recupero variables

	//creo variables
    $idusuario = $_SESSION['id_usr_actual'];

    // At the top of the page we check to see whether the user 
    if(empty($_SESSION['usuario'])){ //is logged in or not 
        // If they are not, we redirect them to the login page. 
        header("Location: /cerexserver/formlogin.html");          
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to /cerexserver/formlogin.html"); 
    }     
    // Everything below this point in the file is secured by the login system     

//Inicia variables
    date_default_timezone_set("America/New_York");
    $_SESSION['otrosuma'] = 0;
    $_SESSION['ventasuma'] = 0;
    $_SESSION['luzsuma'] = 0;
    $_SESSION['aguasuma'] = 0;
    $_SESSION['semistock'] = 0;
    $_SESSION['nutristock'] = 0;
    $_SESSION['otrostock'] = 0;
    $_SESSION['current_account'] = 10;
    $_SESSION['moduloxDefecto'] = 'M1'; 
    $_SESSION['ph_show_leido'] = 0;
    $_SESSION['tds_show_leido'] = 0;

    //    $id = mysql_query("SELECT id FROM students ORDER BY id DESC LIMIT 1");
    //    $id = mysql_fetch_array($id);
    //$_SESSION['filterStudent'] = $id['id'];

    $_SESSION['FilterTrainer'] = 0;
    $_SESSION['FilterStudent'] = 0;
    $_SESSION['mesfilter'] = 0;

        //$fecha_actual = date("d/m/Y");
        //$str = '4/11/2012';
        $str_hoy = date("d/m/Y");
        //$time = 
        $fecha_hoy = (explode('/', $str_hoy, 3));
        //valido dia
        $dia_hoy = $fecha_hoy[0];
        $mes_hoy = $fecha_hoy[1];
        $ano_hoy = $fecha_hoy[2];

        //inicia variables fechas
        $_SESSION['dia'] = $dia_hoy;
        $_SESSION['mes'] = $mes_hoy;
        $_SESSION['ano'] = $ano_hoy;
        $_SESSION['fecha'] = $str_hoy;

        // lee el tipo de cuenta que tiene el usuario.
            $query = " 
                SELECT 
                    id_usuario,
                    superadm_tipo,
                    adm_tipo,
                    teacher_tipo,
                    student_tipo  
                FROM tipo
                WHERE
                    id_usuario = :idusuario 
            ";
            $query_params = array( 
                ':idusuario' => $idusuario 
            );             
            try 
            { 
                $stmt = $db->prepare($query); 
                $result = $stmt->execute($query_params); 
            } 
            catch(PDOException $ex) 
            {  
                die("Failed to run query: " . $ex->getMessage()); 
            } 
            $row = $stmt->fetch();


    //quien es? : superadm? admin? or teacher?        
        
            if($row['superadm_tipo'] == 1){

                // user's IP address!.                  
                $ip = getenv("REMOTE_ADDR");
                $ip1 = $_SERVER["REMOTE_ADDR"];
                // and save it to visitas db-table
                $result = mysql_query(("INSERT INTO visitas (ip, fecha)
                VALUES('$ip1','$str_hoy')"), $conexion);

                // superadm!. 
                header("Location: /cerexserver/backend/admin/admin.php"); 
                die("Redirecting to: /cerexserver/backend/admin/admin.php"); 
            }else{}
            if($row['adm_tipo'] == 1){
                // adm!. 
                header("Location: /cerexserver/backend/admin/admin1.php"); 
                die("Redirecting to: /cerexserver/backend/admin/admin1.php"); 
            }else{}
            if($row['teacher_tipo'] == 1){
                // tacher!. 
                header("Location: /cerexserver/backend/teacher/overview.php"); 
                die("Redirecting to: /cerexserver/backend/teacher/overview.php"); 
            }else{}
            if($row['student_tipo'] == 1){
                // student!. 
                header("Location: /cerexserver/backend/student/home.php"); 
                die("Redirecting to: /cerexserver/backend/student/home.php"); 
            }else{}

        //no encontro que es.....
            header("Location: /cerexserver/formlogin.html"); 
            die("Redirecting to: /cerexserver/formlogin.html");





            $new_idtipo = $row['id_tipo']; //para tabla admins





































        $query = "
            SELECT 
                id_tipo,
                id_usuario, 
                superadm_tipo,
                adm_tipo,
                teacher_tipo,
                student_tipo 
            FROM tipo 
        ";    
        try{
            // These two statements run the query against your database table. 
            $stmt = $db->prepare($query); 
            $stmt->execute(); 
            } 
        catch(PDOException $ex){
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage()); 
            } 

    // Finally, we can retrieve all of the found rows into an array using fetchAll 
        $rows = $stmt->fetchAll();
        //$row = $stmt->fetch(); 
        $_SESSION['tipo'] = $rows; 

    //actualizo la ultima fecha de ingreso de la tabla admins        
            $fechita = date("d/m/Y");
            mysql_query("UPDATE admins SET lastvisit_admins='".$fechita."'
            WHERE id_admins = ".$_SESSION['id_usr_actual']." ");

    //quien es? : superadm? admin? or teacher?        
        
        foreach($rows as $row1): 

            if($_SESSION['id_usr_actual'] == $row1['id_usuario'] AND $row1['superadm_tipo'] == 1){
                // Redirect the user to the private members-only page. 
                header("Location: /fluent/backend/admin/admin.php"); 
                die("Redirecting to: /fluent/backend/admin/admin.php"); 
            }else{}
            if($_SESSION['id_usr_actual'] == $row1['id_usuario'] AND $row1['adm_tipo'] == 1){
                // Redirect the user to the private members-only page. 
                header("Location: /fluent/backend/admin/admin1.php"); 
                die("Redirecting to: /fluent/backend/admin/admin1.php"); 
            }else{}
            if($_SESSION['id_usr_actual'] == $row1['id_usuario'] AND $row1['teacher_tipo'] == 1){
                // Redirect the user to the private members-only page. 
                header("Location: /fluent/backend/teacher/admin.php"); 
                die("Redirecting to: /fluent/backend/teacher/admin.php"); 
            }else{}

        endforeach;


?> 








