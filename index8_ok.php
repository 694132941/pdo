<?php
    header("content-type:text/html;charset=utf-8");
	if($_POST['Submit']=="提交" && $_POST['pdo']!=""){
	$dbms='mysql';
	$host = "127.0.0.1";
	$userName = "root" ;
	$password = "yyf123";
	$dbName = "ml";
	$dsn="$dbms:host=$host;dbname=$dbName";
	try{
	$pdo = new PDO($dsn,$userName,$password);
    $pdo->beginTransaction();
	$query = "insert into tb_pdo(pdo_type,db_name,dates)values('$_POST[pdo]','$_POST[dbmame]','$_POST[dates]')";
	$result = $pdo->prepare($query);
	if($result->execute()){
	    echo "添加数据成功！";
	}else{
	    echo '添加数据失败！';
	}
	$pdo->commit();

	}catch(PDOException $e){
	    die("Error!:".$e->getMessage()."<br>");
		$pdo->rollBack();
	
	
	}

	}

?>