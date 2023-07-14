<?php
    include "conectar.php";
	$pdo = new conectar();

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		if(isset($_GET['matricula']))
		{
	    $sql = $pdo->prepare("SELECT * FROM datosws WHERE matricula=:matricula");
	    $sql->bindValue(':matricula', $_GET['matricula']);
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		header("HTTP/1.1 200 Correcto");
		echo json_encode($sql->fetchAll());
		exit();
		}
		
		else
		{
		$sql = $pdo->prepare("SELECT * FROM datosws");
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		header("HTTP/1.1 200 Correcto");
		echo json_encode($sql->fetchAll());
		exit();		
		}
    } 

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
       	$sql= "INSERT INTO datosws (matricula, nombre, a_paterno, a_materno) VALUES (:matricula, :nombre, :a_paterno, :a_materno)";
       	$insertar = $pdo->prepare($sql);
       	$insertar->bindValue(':matricula',$_POST['matricula']);
       	$insertar->bindValue(':nombre',$_POST['nombre']);
       	$insertar->bindValue(':a_paterno',$_POST['a_paterno']);
       	$insertar->bindValue(':a_materno',$_POST['a_materno']);
        $insertar->execute();
        exit();
    }

    if($_SERVER["REQUEST_METHOD"] == "PUT")
    {
       	$sql= "UPDATE datosws SET matricula=:matricula, nombre=:nombre, a_paterno=:a_paterno, a_materno=:a_materno WHERE matricula=:matricula";
       	$actualizar = $pdo->prepare($sql);
       	$actualizar->bindValue(':matricula',$_GET['matricula']);
       	$actualizar->bindValue(':nombre',$_GET['nombre']);
       	$actualizar->bindValue(':a_paterno',$_GET['a_paterno']);
       	$actualizar->bindValue(':a_materno',$_GET['a_materno']);
        $actualizar->execute();
    }

    if($_SERVER["REQUEST_METHOD"] == "DELETE")
    {
       	$sql= "DELETE FROM datosws WHERE matricula=:matricula";
       	$actualizar = $pdo->prepare($sql);
       	$actualizar->bindValue(':matricula',$_GET['matricula']);
       	$actualizar->execute();
    }

?>  
