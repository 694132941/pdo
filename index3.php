<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk2312">
<title>无标题文档</title>

<script language="javascript">


</script>
<style type="text/css">
.m_td {
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #CCCCCC;
	border-right-width: 1px;
	border-left-width: 1px;
	border-right-style: solid;
	border-left-style: solid;
	border-right-color: #CCCCCC;
	border-left-color: #CCCCCC;

</style>

</head>

<body>

<table width="400"  border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="center">id</td>
    <td align="center">名称</td>
    <td align="center">密码</td>
    <td align="center">地址</td>
	<td align="center">操作</td>
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
		$query = "select * from tb_u";
		$result = $pdo->prepare($query);
		$result->execute();
		$res=$result->fetchAll(PDO::FETCH_ASSOC);
		for($i=0;$i<count($res);$i++){

?>

			<tr>
				<td height="22" align="center" valign="middle"><?php echo $res[$i]['id'];?></td>
				<td height="22" align="center" valign="middle"><?php echo $res[$i]['user'];?></td>
				<td height="22" align="center" valign="middle"><?php echo $res[$i]['pwd'];?></td>
				<td height="22" align="center" valign="middle"><?php echo $res[$i]['address'];?></td>
                <td height="22" align="center" valign="middle"><a href='#'>删除</a></td>
			
	        </tr>


<?php
	
		}
	
	}catch(PDOException $e){
	    die("Error!:".$e->getMessage()."<br/>");
	}

?>
	</table>
</body>
</html>
