<!DOCTYPE html>
<html>
  <head>

    <script type="text/javascript">

      WebFontConfig = {
        custom: {
          families: ['HereJustNow', 'HereJustNow-Out', 'Verlag'],
          urls: ['assets/fonts/HereJustNow/HereJustNow.css', 'assets/fonts/HereJustNow-Out/HereJustNow-Out.css', 'assets/fonts/Verlag/Verlag.css']
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

  </head>
  <body>
    <header>
      <nav>
        <ul class="header-menu">
          <li class="header-menu__item"><a href="index.php"><img src="assets/svg/dok-logo.svg" alt="home" width="80" height="40"></a></li>
          <li><a class="header-menu__item active" href="index.php?page=programma">programma</a></li>
          <li><a class="header-menu__item" href="#">over dok</a></li>
          <li><a class="header-menu__item" href="#">zones</a></li>
          <li><a class="header-menu__item" href="#">word dokbewoner</a></li>
          <li><a class="header-menu__item" href="#">contact</a></li>
        </ul>
      </nav>
      <div class="page-header">
        <div class="page__title">
          <img src="assets/svg/dok-logo.svg" alt="DOK logo" width="120" height="60"/>
          <h1 class="page__title__text">Programma</h1>
        </div>
        <p class="page__desc">Het DOKseizoen is nog niet begonnen, maar wij zijn al volop aan het plannen om er een onvergetelijke editie van te maken! Filter het DOKprogramma of browse naar hartelustom te zien wat je te wachten staat!</p>
      </div>
    </header>
    <main>
      <section class="selectors">
          <article class="selector selector__zones">
            <h1 class="selector__title">zones</h1>
            <p class="selector__desc">DOK heeft voor elk wat wils. Het telt 6 zones waar telkens iets anders te beleven valt. Ontdek ze hier!</p>
            <div class="dropdown">
              <ul class="zones">
                <li class="zone zone__terras">
                  <img src="assets/svg/dok-terras.svg" alt="DOK terras" width="400" height="200"/>
                </li>
                <li class="zone zone__strand">
                  <img src="assets/svg/dok-strand.svg" alt="DOK strand" width="400" height="200"/>
                </li>
                <li class="zone zone__voortuin">
                  <img src="assets/svg/dok-voortuin.svg" alt="DOK voortuin" width="400" height="200"/>
                </li>
                <li class="zone zone__kantine">
                  <img src="assets/svg/dok-kantine.svg" alt="DOK kantine" width="400" height="200"/>
                </li>
                <li class="zone zone__box">
                  <img src="assets/svg/dok-box.svg" alt="DOK box" width="400" height="280"/>
                </li>
                <li class="zone zone__markt">
                  <img src="assets/svg/dok-markt.svg" alt="DOK markt" width="400" height="200"/>
                </li>
              </ul>
              <img class="dropdown-arrow" src="assets/svg/dropdown-arrow.svg" alt="dropdown arrow" width="50" height="50"/>
            </div>
          </article>
          <article class="selector selector__tags">
            <h1 class="selector__title">tags</h1>
            <p class="selector__desc"> Zoek door de DOKprogramma met de tags om zo snel mogelijk te vinden wat zoekt!</p>
            <form class="selector__form tags__form" action="index.html" method="post">
              <div class="select-style">
                <select class="selector__item tags" name="day">
                  <option value="tag">SELECTEER TAGS</option>
                </select>
              </div>
            </form>
          </article>
          <article class="selector selector__date">
            <h1 class="selector__title">datum</h1>
            <p class="selector__desc">Wil je te weten komen wat er op een specifieke dag of maand op DOK te beleven valt? Zoek het hier!</p>
            <form class="selector__form date__form" action="index.html" method="post">
              <div class="select-style date-style">
                <select class="selector__item date-day" name="date-day">
                  <option value="DAG">DAG</option>
                </select>
              </div>
              <div class="select-style">
                <select class="selector__item date-day" name="date-day">
                <option value="MAAND">MAAND</option>
                </select>
              </div>
            </form>
          </article>
      </section>
      <section class="regulars">
        <header>
          <h1>Dok's vaste waarden</h1>
        </header>
        <article class="regular koffie">
          <h2 class="regular__day">Elke zondag</h2>
          <h3 class="regular__event">Koffie, taart &mp; gazetten</h3>
          <p class="regular__time">10:00 - 19:00</p>
          <img src="assets/svg/" alt="">
        </article>
        <article class="regular koffie">
          <h2 class="regular__day">Elke zondag</h2>
          <h3 class="regular__event">Dok(rommel)markt</h3>
          <p class="regular__time">10:00 - 19:00</p>
          <img src="assets/svg/" alt="">
        </article>
        <article class="regular koffie">
          <h2 class="regular__day">Elke zondag</h2>
          <h3 class="regular__event">Gezellige dj - cosy cozy</h3>
          <p class="regular__time">14:00 - 19:00</p>
          <img src="assets/svg/" alt="">
        </article>
      </section>
      <section class="events">
        <h1 class="events__month">Events</h1>
        <?php foreach($events as $event): ?>
          <article class="events__event event">
            <header class="event__title"><h2><?php echo $event['title']; ?></h2></header>
            <dl class="event__info">
              <dt class="event__start">start</dt><dd><?php echo $event['start'];?></dd>
              <dt class="event__end">end</dt><dd><?php echo $event['end'];?></dd>
              <dt class="event__organiser">organiser</dt><dd><?php echo $event['organiser'];?></dd>
              <dt class="event__title">title</dt><dd><?php echo $event['title'];?></dd>
              <dt class="event__locations">locations</dt><dd><ul><?php foreach($event['locations'] as $location): ?><li><?php echo $location['name'];?></li><?php endforeach;?></ul></dd>
              <dt class="event__tags">tags</dt><dd><ul><?php foreach($event['tags'] as $tag): ?><li><?php echo $tag['tag'];?></li><?php endforeach;?></ul></dd>
              <dt class="event__desc">description</dt><dd><pre><?php echo $event['description'];?></pre></dd>
            </dl>
          </article>
        <? endforeach;?>
      </section>
    </main>
  </body>
