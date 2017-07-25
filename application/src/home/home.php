<?php
//导入smarty配置文件
include '../../../smarty.init.php';
$pdo=new PDO("mysql:host=".HOST.";dbname=".DBNAME,USERNAME,PWD);
$pdo->query("set names utf8");
//var_dump($pdo);

/////////////////////分页//////////////
//总记录数
$total=$pdo->query("select * from member")->rowCount();
//echo $total;
//每页显示数据的条数
$pagesize=3;
//总页数
$pageTotal=ceil($total/$pagesize);
//echo $pageTotal;
if($_GET['page']){
	$page=$_GET['page'];
	//当前页大于总页数的话,就等于总页数
	if($page>=$pageTotal){
		$page=$pageTotal;
	}
}else {
	$page=1;
}

////////分页结束//////////


$sql="select * from member order by id desc limit ".($page-1)*$pagesize.",".$pagesize;
$result=$pdo->query($sql);
$data=$result->fetchAll(PDO::FETCH_OBJ);
//根据总页数循环出每一页
$str="<ul class='pagination pagination-lg'>";
//上一页
if($page==1){
	$str.='<li class="disabled"><a href="?page='.($page-1).'"><span>&laquo;</span></a><li>';
}else{
	$str.='<li><a href="?page='.($page-1).'"><span>&laquo;</span></a><li>';
}
for($i=1;$i<=$pageTotal;$i++){
	//如果$page==$i就是当前页
	if($page==$i){
		$str.="<li class='active'><a href='?page=".$i."'>".$i."</a></li>";
	}else{
		$str.="<li ><a href='?page=".$i."'>".$i."</a></li>";
	}
}
//下一页
if($page==$pageTotal){
	$str.='<li class="disabled"><a href="?page='.($page+1).'"><span>&raquo;</span></a><li>';
}else{
	$str.='<li><a href="?page='.($page+1).'"><span>&raquo;</span></a><li>';
}
$str.="</ul>";
//把分页字符串赋给模板
$smarty->assign("page", $str);
//var_dump($data);
//把数据赋给变量
$smarty->assign("data", $data);
//指定要显示的静态页面
$smarty->display("home/home.html");
?>