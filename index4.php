<?php
    header("content-type:text/html;charset=utf-8");
	$dbms='mysql';
	$host = "127.0.0.1";
	$userName = "root" ;
	$password = "yyf123";
	$dbName = "ml";
	$dsn="$dbms:host=$host;dbname=$dbName";
	try{
	    $pdo = new PDO($dsn,$userName,$password);
		echo "PDO 连接mysql成功";
	}catch(Exception $e){
	    echo $e->getMessage()."<br>";
	}

?>