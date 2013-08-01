
<!DOCTYPE html>
<html>
<head>
<title>跑在浏览器上的linux，php版</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
.term {
    font-family: courier,fixed,swiss,monospace,sans-serif;
    font-size: 14px;
    color: #f0f0f0;
    background: #000000;
}

.termReverse {
    color: #000000;
    background: #00ff00;
}
#note {
    font-size: 12px;
}
#copyright {
    font-size: 10px;
}
#clipboard {
    font-size: 12px;
}
</style>
</head>
<body onload="start()">
<?php
//echo $_SERVER[HTTP_USER_AGENT]."</br>";
?>
跑在浏览器上的linux，php版
（建议使用chrome浏览器，ie9以下肯定是跑不起来了）
<table border="0">
<tr valign="top"><td>
<script type="text/javascript" src="a.js" charset='utf-8'></script>
<script type="text/javascript" src="utils.js"></script>
<script type="text/javascript" src="term.js"></script>
<script type="text/javascript" src="cpux86.js"></script>
<script type="text/javascript" src="jslinux.js"></script>
<script type="text/javascript" ">
//alert("b");
</script>
<div id="copyright">&copy; 2012, 
</br>联系我：
</br>微博:<a href='http://weibo.com/killinux'>http://weibo.com/killinux</a>
</br>博客:<a href='http://haoningabc.iteye.com'>http://haoningabc.iteye.com</a> 
</br>电子邮件:frenchleaf@gmail.com haoningabc@163.com
</div>
<td><!--<input type="button" value="Clear clipboard" onclick="clear_clipboard();"><br><textarea row="4" cols="16" id="text_clipboard"></textarea-->
</table>
</body>
</html>
<?php      
 function GetIP()  {
		 if(!empty($_SERVER["HTTP_CLIENT_IP"]))
				 $cip = $_SERVER["HTTP_CLIENT_IP"];
		 else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))  
				 $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];  
		 else if(!empty($_SERVER["REMOTE_ADDR"]))     
				 $cip = $_SERVER["REMOTE_ADDR"];  
		 else
				 $cip = "无法获取！";  
		 return $cip;
 } 
 $thisip=GetIP() ;
 //echo $thisip." <br>"; 
?>
<?php
$liulanqi=$_SERVER[HTTP_USER_AGENT];
$name = $_GET['name'];
echo $name;
$content = $_POST['content']; 
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT']; 
if (!file_exists("$DOCUMENT_ROOT/liuyan/fangwen.txt")) { //注意你的站点的实际路径 
		$fp = fopen("$DOCUMENT_ROOT/liuyan/fangwen.txt",'ab'); //以二进制追加方式打开文件,没文件就创建 
		$id = 1; 
		$col ="$id"."\t"."$name"."\t"."$content"."\t"."$thisip"."\t"."\n"; //记录赋值 
		fwrite($fp, $col, strlen($col)); //插入第一条记录 
		fclose($fp); //关闭文件 
		echo "创建文件成功并添加了一条记录"; 
} else { 
	if($name!='haoning'){
		if (!$fp = fopen("$DOCUMENT_ROOT/liuyan/fangwen.txt",'r')) { 
				echo '文件访问出错222'; 
				exit; 
		} 
		while (!feof($fp)) 
		{ 
				$co[] = fgets($fp,4096); 
		} 
		$numco = count($co); 
		$strco = $co[$numco-2]; 
		$exco = explode(' ',$strco); 
		$id = $exco[0]+1; 
		fclose($fp); 
		$fp = fopen("$DOCUMENT_ROOT/liuyan/fangwen.txt",'ab'); 
		$col ="$id"."\t"."$name"."\t"."$content"."\t"."$thisip"."\t".date('Y-m-d H:i:s')."\t"."$liulanqi"."\n"; 
		fwrite($fp, $col, strlen($col)); 
		fclose($fp); 
		//echo '您是第:'.$numco.'位来访者，<a target="_blank" href="http://www.killinux.com/liuyan/liuyan.php">去给宁哥留言？</a>';
	}
}
?>
</br>
<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes" height='400' width='500' src="http://www.killinux.com/liuyan/liuyan.php" ></iframe>
