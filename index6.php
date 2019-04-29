<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>使用警告模式——PDO：：ERRMODE_WARNING捕获SQL中的错误</title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
-->
</style></head>

<body>
<table id="__01" width="464" height="336" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="3">
			<img src="images/mysql_01.gif" width="464" height="139" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/mysql_02.gif" width="78" height="136" alt=""></td>
		<td width="312" height="136" valign="top"><table width="310" border="1" cellpadding="0" cellspacing="0">
          <tr>
            <td height="30" align="center"><strong>PDO</strong></td>
            <td align="center"><strong>数据库</strong></td>
            <td align="center"><strong>时间</strong></td>
			 <td align="center"><strong>操作</strong></td>
          </tr>
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
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
		$query="select * from tb_pdo";
		$result=$pdo->prepare($query);
		$result->execute();
		while($res=$result->fetch(PDO::FETCH_ASSOC)){
		
?>
		
		    <tr>
			<td height="22" align="center" valign="middle"><?php echo $res['pdo_type'];?></td>
			<td align="center" valign="middle"><?php echo $res['db_name'];?></td>
			<td align="center" valign="middle"><?php echo $res['dates'];?></td>
			<td align="center" valign="middle"><a href="index6delete.php?action=del&conn_id=<?php echo $res['pdo_type']; ?>">删除</a></td>
			</tr>

<?php
	
	}
	    }catch(PDOException $e){
		    die("Error!".$e->getMessage()."<br/>");
		}
	
?>


</table>
</body>
</html>
