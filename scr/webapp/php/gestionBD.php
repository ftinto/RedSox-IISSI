<?php

function crearConexionBD()
{
	$host="oci:dbname=localhost/XE;charset=UTF8";
	$usuario="iissi2";
	$password="uiui";

	try{
		/* Indicar que las sucesivas conexiones se puedan reutilizar */	
		$conexion=new PDO($host,$usuario,$password,array(PDO::ATTR_PERSISTENT => true));
	    /* Indicar que se disparen excepciones cuando ocurra un error*/
    	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conexion;
	}catch(PDOException $e){
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
}

function cerrarConexionBD($conexion){
	$conexion=null;
}

function consultaPaginada( $conn, $query, $pag_num, $pag_size )
{
    try {
        $primera = ( $pag_num - 1 ) * $pag_size + 1;
        $ultima  = $pag_num * $pag_size;
        $consulta_paginada =
            "SELECT * FROM ( "
            ."SELECT ROWNUM RNUM, AUX.* FROM ( $query ) AUX "
            ."WHERE ROWNUM <= :ultima"
            .") "
            ."WHERE RNUM >= :primera";

        $stmt = $conn->prepare( $consulta_paginada );
        $stmt->bindParam( ':primera', $primera );
        $stmt->bindParam( ':ultima',  $ultima  );
        $stmt->execute();
        return $stmt;
    }
    catch ( PDOException $e ) {
        $_SESSION['excepcion'] = $e->GetMessage();
        header("Location: excepcion.php");
    }
}

function totalConsulta( $conn, $query )
{
    try {
        $total_consulta = "SELECT COUNT(*) AS TOTAL FROM ($query)";

        $stmt = $conn->query($total_consulta);
        $result = $stmt->fetch();
        $total = $result['TOTAL'];
        return  $total;
    }
    catch ( PDOException $e ) {
        $_SESSION['excepcion'] = $e->GetMessage();
        header("Location: excepcion.php");
    }
}



?>