
<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="utf-8">
    <title> 饥人谷前端课件</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!--[if lte IE 8]><link rel="stylesheet" href="css/responsive-nav.css"><![endif]-->
    <!--[if gt IE 8]><!--><link rel="stylesheet" href="css/index.css"><!--<![endif]-->
    <script>
      var doc = document, docEl = doc.documentElement;
      docEl.className = docEl.className.replace(/(^|\s)no-js(\s|$)/, " js ");
    </script>
    <script src="js/responsive-nav.js"></script>
  </head>
  <body>
    <div id="header">
      <a class="logo" href="http://www.hunger-train.com">
        <img src="img/logo.png" />
      </a>
      <h1>饥人谷</h1>
    </div>
    <div role="navigation" id="nav">
      <ul>

        <?php
          $hostdir=dirname(__FILE__) . '/data';
          echo '</br>';
          $filesnames = scandir($hostdir);

            foreach ($filesnames as $name) {
                if($name == '.' || $name == '..'){
                    continue;
                }
                $url="load.php?page=".$name;
                echo '<li class="list"><a href="javascript:void(0);" data-src="' . $url . '">' . $name . '</a></li>';
            }
        ?>
      </ul>
    </div>

    <div role="main" class="main">
      <a href="javascript:void(0);" id="code-link">下载代码</a>
      <a href="#nav" id="toggle">Menu</a>
      <iframe id="main-page" seamless src="load.php?page=readme" frameborder="0" width="100%" height="500"></iframe>
    </div>


    <script src="js/jquery-1.11.1.min.js"></script>
    <script>
        var $list = $("#nav .list a");
        $list.on('click', function(){
            var $cur = $(this);
            $("#main-page").attr('src', $cur.attr('data-src'));
        })

        var navigation = responsiveNav("#nav", {customToggle: "#toggle"});

        /*
            iframe高度
         */
        $("#main-page").load(function(){
            $(this).height($("#main-page").contents().find("body").outerHeight() + 30);
        });
        $(window).on("resize", function(){
            setTimeout(function(){
                $("#main-page").height($("#main-page").contents().find("body").outerHeight() + 30);
            },100);
           
        })
    </script>
    

  </body>
</html>
