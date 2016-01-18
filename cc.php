<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=2.0"/>
<title>网站程序一键安装工具</title>
</head>

<!--冰封网络版权所以-->
<body>
<body style="width:320px;">
<?php

error_reporting(0);
header("Content-type: text/html; charset=utf-8");
	ignore_user_abort(true);
if(!class_exists('ZipArchive')) {
	die("调用ZipArchive类失败,你的空间不支持使用本程序 " );
	}
function zipExtract ($src, $dest)
    {
        $zip = new ZipArchive();
        if ($zip->open($src)===true)
        {
            $zip->extractTo($dest);
            $zip->close();
            return true;
        }
        return false;
      }

if (!isset($_GET['zip'])) {
echo '
</font>
<center>
	<div class="box">’;
echo '<b>在线安装：</b><br/>';
echo '<form method="get" action="?"><select name="zip"><option value="https://github.com/zhulvchao/web/archive/master.zip">爱特文件管理器最新版</option>


</select>
 <input type="submit" value="安装"><div class="w h Header">Copyright © chen Optimize view</div></div></form>';
$ymdz="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?zip=";
exit;
}

if($_GET['zip']=='https://github.com/zhulvchao/web/archive/master.zip'){echo "<center><a href='/f'>点击进入爱特文件管理器</a></center>";}
$RemoteFile = rawurldecode($_GET["zip"]);
$ZipFile = "master.zip";
$Dir = "./";
copy($RemoteFile,$ZipFile) or die("无法复制文件 <b>".$RemoteFile);
if (zipExtract($ZipFile,$Dir)) {
echo "<b>Hello！".basename($RemoteFile)."</b> 成功解压文件到当前目录,请访问你的域名进行安装!";
unlink($ZipFile);
	}
else {
echo "无法解压该文件 <b>".$ZipFile.".</b>";
if (file_exists($ZipFile)) {
unlink($ZipFile);
	}
}
?>
</div>
</body>
</html>
