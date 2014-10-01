<?php

# This file passes the content of the Readme.md file in the same directory
# through the Markdown filter. You can adapt this sample code in any way
# you like.

# Install PSR-0-compatible class autoloader
spl_autoload_register(function($class){
	require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

# Get Markdown class
use Michelf\Markdown;

# Read file and pass content through the Markdown parser

$pageN = $_GET["page"];
if($pageN == "readme"){
    $full = "readme.md";
}else{
    $full = "data/$pageN/md.md";
}

$text = file_get_contents($full);
$html = Markdown::defaultTransform($text);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>饥人谷</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/md/GitHub2.css">
    </head>
    <body>
		<?php
			# Put HTML content in the document
			echo $html;
		?>
    </body>
    <link rel="stylesheet" href="css/highlight/atelier-dune.dark.css">
    <script src="js/highlight.pack.js"></script>
    <script type="text/javascript">
        hljs.initHighlightingOnLoad();
    </script>
</html>