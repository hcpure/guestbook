<?php
//开启session
session_start();
//设置错误报告的级别
error_reporting(E_ALL^E_NOTICE^E_STRICT^E_DEPRECATED);
//设置默认时区
date_default_timezone_set("PRC");
/*配置smarty  */
//项目的根目录;
define("ROOT", dirname(__FILE__));
//导入smarty类
include ROOT."/libs/smarty/Smarty.class.php";
//导入配置文件
include ROOT."/application/configs/config.php";
$smarty=new Smarty();
/* echo "<pre>";
var_dump($smarty);
echo "</pre>"; */

//自定义模板目录
$smarty->template_dir=ROOT."/application/views";
//自定义编译目录
$smarty->compile_dir=ROOT."/application/run";
?>