<link href="css/background.css" rel="stylesheet" type="text/css" />
<link href="css/default.css" rel="stylesheet" type="text/css" />

<body id="back_green">
    <p id="title">Easy FTP</p>
    <?php
    echo "<html>
<head>
<meta charset=\"utf-8\">
<title>EASY FTP</title>
</head>
<body>
<form action=\"upload_file.php\" method=\"post\" enctype=\"multipart/form-data\" id=\"centre\">
    <label for=\"file\"></label>
    <input type=\"file\" name=\"file\" id=\"file\" ><br>
    <input type=\"submit\" name=\"submit\" value=\"提交\" class='button'>
</form>
";
    echo "<div id='back_red'>";
    $previewList = array('png', 'pdf', 'jpg', 'bmp', 'txt', 'cpp', 'js', 'html', 'svg', 'css', 'xml', 'py', 'in', 'out');
    $previewText = array('txt', 'xml', 'in', 'out', 'js', 'py');
    $url = "./upload/";
    $lj = opendir($url);
    while (($filename = readdir($lj)) != false) {
        $_tmp = strripos($filename, '.');
        $extname = substr($filename, $_tmp + 1);
        if ($filename == "." || $filename == "..") continue;
        $element = "<div><span>$filename</span>
    <a  href='upload/$filename' download='upload/$filename'>下载</a>";

        if ($extname == "cpp") {
            $element .= "<button onclick=window.location.href=\"/preview_code.php?file=$filename\">预览</button>";
        } else if (in_array($extname, $previewList)) {
            if (in_array($extname, $previewText)) {
                $element = $element .
                    "<button onclick=window.location.href=\"/preview.php?file=$filename\">预览</button>";
            } else {
                $element .= "<button onclick=window.location.href='/upload/$filename'>预览</button>";
            }
        }
        echo $element . "</div>\n";
    }
    closedir($lj);
    echo "</div>\n";
    ?>
</body>
</html>