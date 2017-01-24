<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript">

      WebFontConfig = {
        custom: {
          families: ['HereJustNow', 'HereJustNow-Out'],
          urls: ['assets/fonts/HereJustNow/HereJustNow.css', 'assets/fonts/HereJustNow-Out/HereJustNow-Out.css']
        }
      };

      (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
          '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })();

    </script>

    <meta charset="utf-8">
    <meta name="description" content="DOK Gent - werfplek voor verpozing en creatieve manoeuvres"/>
    <meta name="author" content="Pauline Tahon"/>
    <meta name="keywords" content="DOK werfplek oudedokken Gent DOKbewoners"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DOK</title>
    <?php echo $css;?>
  </head>
  <body>

    <div class="container">
      <?php if(!empty($_SESSION['info'])): ?><div class="alert alert-success"><?php echo $_SESSION['info'];?></div><?php endif; ?>
      <?php if(!empty($_SESSION['error'])): ?><div class="alert alert-danger"><?php echo $_SESSION['error'];?></div><?php endif; ?>

      <?php echo $content; ?>
    </div>

    <?php echo $js;?>
  </body>
</html>
