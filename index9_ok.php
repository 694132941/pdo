<?php
    header("content-type:text/html;charset=utf-8");
	if(isset($_POST['Submit']) && $_POST['Submit']!=""){
	$dbms='mysql';
	$host = "127.0.0.1";
	$userName = "root" ;
	$password = "yyf123";
	$dbName = "ml";
	$dsn="$dbms:host=$host;dbname=$dbName";
	try{
	$pdo = new PDO($dsn,$userName,$password);
	$pdo->query("set names utf8");
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$a=$_POST['pdo'];
	$b=$_POST['db_name'];
	$c=$_POST['dates'];
	$query = "call pro_reg('$a','$b','$c')";
	$result = $pdo->prepare($query);
	if($result->execute()){
	    echo "添加数据成功！";
	}else{
	    echo '添加数据失败！';
	}


	}catch(PDOException $e){
		echo 'PDO Exception Caugx`ht';
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