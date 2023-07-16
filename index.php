<?php
    include "conectar.php";
	$pdo = new conectar();

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		if(isset($_GET['matricula']))
		{
	    $sql = $pdo->prepare("SELECT * FROM alumnos WHERE matricula=:matricula");
	    $sql->bindValue(':matricula', $_GET['matricula']);
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		header("HTTP/1.1 200 Correcto");
		echo json_encode($sql->fetchAll());
		exit();
		}
		
		else
		{
		$sql = $pdo->prepare("SELECT * FROM alumnos");
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		header("HTTP/1.1 200 Correcto");
		echo json_encode($sql->fetchAll());
		exit();		
		}
    } 

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
       	$sql= "INSERT INTO alumnos (matricula, nombre, a_paterno, a_materno, edad, grupo, telefono, correo, cuatrimestre, promedio) 
		VALUES (:matricula, :nombre, :a_paterno, :a_materno, :edad, :grupo, :telefono, :correo, :cuatrimestre, :promedio)";
       	$insertar = $pdo->prepare($sql);
       	$insertar->bindValue(':matricula',$_POST['matricula']);
       	$insertar->bindValue(':nombre',$_POST['nombre']);
       	$insertar->bindValue(':a_paterno',$_POST['a_paterno']);
       	$insertar->bindValue(':a_materno',$_POST['a_materno']);
		   $insertar->bindValue(':edad',$_POST['edad']);
		   $insertar->bindValue(':grupo',$_POST['grupo']);
		   $insertar->bindValue(':telefono',$_POST['telefono']);
		   $insertar->bindValue(':correo',$_POST['correo']);
		   $insertar->bindValue(':cuatrimestre',$_POST['cuatrimestre']);
		   $insertar->bindValue(':promedio',$_POST['promedio']);
        $insertar->execute();
        exit();
    }

    if($_SERVER["REQUEST_METHOD"] == "PUT")
    {
       	$sql= "UPDATE alumnos SET matricula=:matricula, nombre=:nombre, a_paterno=:a_paterno, a_materno=:a_materno , edad=:edad, grupo=:grupo, telefono=:telefono, correo=:correo, cuatrimestre=:cuatrimestre, promedio=:promedio
		WHERE matricula=:matricula";
       	$actualizar = $pdo->prepare($sql);
       	$actualizar->bindValue(':matricula',$_GET['matricula']);
       	$actualizar->bindValue(':nombre',$_GET['nombre']);
       	$actualizar->bindValue(':a_paterno',$_GET['a_paterno']);
       	$actualizar->bindValue(':a_materno',$_GET['a_materno']);
		   $actualizar->bindValue(':edad',$_GET['edad']);
		   $actualizar->bindValue(':grupo',$_GET['grupo']);
		   $actualizar->bindValue(':telefono',$_GET['telefono']);
		   $actualizar->bindValue(':correo',$_GET['correo']);
		   $actualizar->bindValue(':cuatrimestre',$_GET['cuatrimestre']);
		   $actualizar->bindValue(':promedio',$_GET['promedio']);
        $actualizar->execute();
    }

    if($_SERVER["REQUEST_METHOD"] == "DELETE")
    {
       	$sql= "DELETE FROM alumnos WHERE matricula=:matricula";
       	$actualizar = $pdo->prepare($sql);
       	$actualizar->bindValue(':matricula',$_GET['matricula']);
       	$actualizar->execute();
    }

?>  
