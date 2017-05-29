<?php

	include_once("../model/Persistencia.class.php");
	$con = new Persistencia;

	$user=$_POST['user'];
	$password=$_POST['password'];

	$sql="select count(*) as amount from user where user_user = '".$user."' and user_password='".$password."'";
	$resultado = $con->getResult($sql);
	$idusuario=0;

	while($row = $resultado->fetch_assoc()){
		$cant = $row['amount'];

		if($cant==1){
			session_start();
			$_SESSION['count'] = 1;
			header('Location: ../view/index.php');
		}else{
			header('Location: ../view/login.php');
		}
	}


?>