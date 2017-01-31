<!DOCTYPE html>
<html manifest="manifest.appcache">
  <head>
    <script type="text/javascript">

      WebFontConfig = {
        custom: {
          families: ['herejustnow', 'herejustnowout'],
          urls: ['assets/fonts/herejustnow/herejustnow.css', 'assets/fonts/herejustnowout/herejustnowout.css']
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
    <link rel="icon" type="image/png" href="assets/img/favicon.png"/>
    <title>DOK</title>
    <?php echo $css;?>
  </head>
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0">
      <defs>
        <clipPath id="clippath__1">
            <path class="cls-1" d="M419.64,214.83c-15.08,12.19-25.71,8.81-35.8,5a88.09,88.09,0,0,0-24-5.32,89.07,89.07,0,0,0-16.73,4.69c-7.57,3-12.81,5.48-19.93,12.52a95.09,95.09,0,0,1-7.26,6.48c-4.87,4.81-9.78,9.56-14.82,13.78-2.49,2.08-5,4.06-7.58,6a28.11,28.11,0,0,1-4.8,3.52c-3.15,2.27-6.3,4.47-9.41,6.69-3.45,2.46-6.85,3.74-9.72,3.81a38.17,38.17,0,0,1-16.75,2.46c-14.45-1.38-27.5-7.55-39.92-12.68S189,249.37,177.05,243.19C153.55,231,127,224.09,100.59,216.93c-13.57-3.68-27.12-7.39-40.27-11.83s-26.61-8.86-37.6-16.78C7.88,177.63-2,157.23,1.27,130.55A60.76,60.76,0,0,1,12,91.67a36.51,36.51,0,0,1,3.9-6.92c20.19-28.6,46.49-42,69.2-47.19,10.85-2.49,21.34-3.52,32.5-7.16C127.9,27,138.39,19.65,149,13.1,161.81,5.12,173.53.62,184.73.63c10.93,0,20.28,4.28,28.81,8.71A86.91,86.91,0,0,1,238,28.51c7.15,7.91,12.6,17.52,18.56,26.8C268,73.12,289,75.61,310.65,76.82c22.24,1.24,45.5.23,66.85,3.44,19.69,3,38.08,9.68,51.15,23.34,12.51,13.08,23.48,33.71,19.18,61.35C445.17,182.06,435.09,202.35,419.64,214.83Z"/>
        </clipPath>
        <clipPath id="clippath__2">
          <path class="cls-1" d="M296.75,74.28c1.46,9.42-3.44,32.12.09,41.8,7.26,19.94,20,27.45,18.93,48.34-.79,16-4,31.86-11.7,45.23-8.83,15.26-21.5,26.1-35.62,35.63l-.94.63a41.28,41.28,0,0,0-4,3.08c-47.72,41.09-115.64,55.67-179.13,39.17a61.31,61.31,0,0,1-8-2.26c-1.08-.33-2.17-.63-3.25-1a30.7,30.7,0,0,1-9.52-5.2c-1.41-.89-2.8-1.81-4.16-2.81-18.45-13.6-34-31.53-46-51.48C.46,204-6.77,174.63,12,154.92c8.32-8.73,19.36-44,38.2-89.13C77.31.95,141.56-17.32,214.49,19.07h0c11.78,5.88,23.35,8.7,33.79,8a33.66,33.66,0,0,1,21.41,6.17c.62.33,1.25.64,1.87,1C286.52,43.18,294.27,58.24,296.75,74.28Z"/>
        </clipPath>
      </defs>
    </svg>

    <div class="container">
      <?php if(!empty($_SESSION['info'])): ?><div class="alert alert-success"><?php echo $_SESSION['info'];?></div><?php endif; ?>
      <?php if(!empty($_SESSION['error'])): ?><div class="alert alert-danger"><?php echo $_SESSION['error'];?></div><?php endif; ?>

      <?php echo $content; ?>
    </div>

    <?php echo $js;?>
  </body>
</html>
