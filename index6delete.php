<?php
    header("content-type:text/html;charset=utf-8");
	if($_GET['conn_id']!=""){
	$dbms='mysql';
	$host = "127.0.0.1";
	$userName = "root" ;
	$password = "yyf123";
	$dbName = "ml";
	$dsn="$dbms:host=$host;dbname=$dbName";
	echo $_GET['conn_id'];
	try{
	$pdo = new PDO($dsn,$userName,$password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo $_GET['conn_id'];
		$query="delete from tb_pdo1 where pdo_type=:id";
		echo $query;
		$result=$pdo->prepare($query);
		$result->bindParam(':id',$_GET['conn_id']);
		
		$result->execute();
		echo $query;
	}catch(PDOException $e){
		echo 'PDO Exception Caught';
		echo 'Error with the database:</br>';
		echo 'SQL Query:'.$query;
		echo '<pre>';
		echo "Error.".$e->getMessage()."<br/>";
		echo "Error.".$e->getCode()."<br/>";
		echo "Error.".$e->getFile()."<br/>";
		echo "Error.".$e->getLine()."<br/>";
		echo "Error.".$e->getTraceAsString()."<br/>";
		echo '</pre>';
		


	}
	}
?>