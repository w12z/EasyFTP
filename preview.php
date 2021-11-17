<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/shCore.css" rel="stylesheet" type="text/css" />
    <link href="css/shThemeDefault.css" rel="stylesheet" type="text/css" />
    <link href="css/readonly.css" rel="stylesheet" type="text/css" />
    <link href="css/background.css" rel="stylesheet" type="text/css"/>
    <link href="css/default.css" rel="stylesheet" type="text/css"/>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
            echo "预览 - " . $_GET["file"];
            ?></title>
</head>

<body id="back_blue">
    <?php
    function trans($chr = null)
    {
        switch ($chr) {
            case '<':
                return "&lt;";
            case '>':
                return "&gt;";
            case '#':
                return "#";
            default:
                return $chr;
        }
    }
    $Fpath = 'upl' . 'oad/' . $_GET["file"];
    $info = "";
    $Ffile = fopen($Fpath, "r") or exit("FUCK YOU AT ALL!!!");
    while (!feof($Ffile)) {
        $chr = fgetc($Ffile);
        $info .= trans($chr);
    }
    echo "<p id=\"title\">" . $_GET["file"]."</p>";
    echo "<button onclick=\"copy()\" class='button' id='copyButton'>复制</button>";
    fclose($Ffile);
    echo "<div id=\"code\">\n";
    echo "<pre>" . $info . "</pre>";
    echo "</div>";
    echo "<textarea style='display:none' id='codeprevfield'>" . $info . "</textarea>";
    ?>
    <script src="js/syntaxhighlighter/shCore.js"></script>
    <script src="js/syntaxhighlighter/shBrushCpp.js"></script>
    <script src="js/codeview/copy.js"></script>
    <script src="js/jquery-1.4.2.js"></script>
    <script>
        SyntaxHighlighter.defaults['quick-code'] = false;
        SyntaxHighlighter.all();
    </script>
</body>

</html>