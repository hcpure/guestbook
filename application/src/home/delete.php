<?php
//导入smarty配置文件
include '../../../smarty.init.php';
$pdo=new PDO("mysql:host=".HOST.";dbname=".DBNAME,USERNAME,PWD);
$pdo->query("set names utf8");
if($_GET['id']){
	$sql="delete from member where id=".$_GET['id'];
	$result=$pdo->exec($sql);
	if($result){
		header("location:home.php");
	}else{
		echo "删除失败";
	}
}else{
	header("location:home.php");
}
?>