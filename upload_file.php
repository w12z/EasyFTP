<?php
// 允许上传的图片后缀
$filename=$_FILES["file"]["name"];
$_tmp = strripos($filename, '.');
$extname = substr($filename, $_tmp + 1);
echo $_FILES["file"]["size"];
if ($_FILES["file"]["size"] < 2048000000)   // 小于 200 kb
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：FUCK YOU RUBBISH". "<br>";
    }
    else
    {
        echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
        echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
        echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        
        // 判断当前目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if (file_exists("upload/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " 文件已经存在。 ";
        }
        else
        {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            $name=$_FILES["file"]["name"];
            $name=str_replace(" ","_",$name);
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $name);
        }
    }
}
echo "一秒后退回根目录"."<br>";
echo "<script>setTimeout(() => { window.location.href = '/'; }, 1000);</script>";
?>
