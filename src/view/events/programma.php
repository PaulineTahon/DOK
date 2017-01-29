
    <header class="page">
      <nav class="header-menu">
        <a  class="header-menu__home" href="index.php"><img src="assets/svg/dok-logo.svg" alt="home" width="60" height="40"></a>
        <ul class="header-menu__nav">
          <li><a class="header-menu__item" href="index.php?page=programma">programma</a></li>
          <li><a class="header-menu__item" href="#">over dok</a></li>
          <li><a class="header-menu__item" href="#">zones</a></li>
          <li><a class="header-menu__item" href="#">word dokbewoner</a></li>
          <li><a class="header-menu__item" href="#">contact</a></li>
        </ul>
      </nav>
      <section class="page__header">
        <article class="page__title">
          <img src="assets/svg/dok-logo.svg" alt="DOK logo" width="100" height="52"/>
          <h1 class="page__title__text">Programma</h1>
        </article>
        <p class="page__desc">Het DOKseizoen is nog niet begonnen, maar wij zijn al volop aan het plannen om er een onvergetelijke editie van te maken! Filter het DOKprogramma of browse naar hartelust om te zien wat je te wachten staat!</p>
      </section>
    </header>
    <main>
      <section class="selectors">
          <article class="selector selector__zones">
            <h1 class="selector__title">zones</h1>
            <p class="selector__desc">DOK heeft voor elk wat wils. Het telt 6 zones waar telkens iets anders te beleven valt. Ontdek ze hier!</p>
            <div class="dropdown">
              <div class="zones">
                <form class="form" action="index.php?page=programma&mp;locations=DOKTerras" class="zone zone__terras">
                  <input class="data" type="hidden" name="locations" value="DOKTerras">
                  <input class="submit" type="image" name="submit" src="assets/svg/dokterras.svg" alt="DOK terras" width="300" height="200"/>
                </form>
                <form class="form" action="index.php?page=programma&amp;locations=DOKStrand" class="zone zone__strand">
                  <input class="data" type="hidden" name="locations" value="DOKStrand">
                  <input class="submit" type="image" name="submit" src="assets/svg/dokstrand.svg" alt="DOK strand" width="300" height="200"/>
                </form>
                <form class="form" action="index.php?page=programma&amp;locations=DOKVoortuin" class="zone zone__voortuin">
                  <input class="data" type="hidden" name="locations" value="DOKVoortuin">
                  <input class="submit" type="image" name="submit" src="assets/svg/dokvoortuin.svg" alt="DOK voortuin" width="300" height="200"/>
                </form>
                <form class="form" action="index.php?page=programma&amp;locations=DOKKantine" class="zone zone__kantine">
                  <input class="data" type="hidden" name="locations" value="DOKKantine">
                  <input class="submit" type="image" name="submit" src="assets/svg/dokkantine.svg" alt="DOK kantine" width="300" height="200"/>
                </form>
                <form class="form" action="index.php?page=programma&amp;locations=DOKBox" class="zone zone__box">
                  <input class="data" type="hidden" name="locations" value="DOKBox">
                  <input class="submit" type="image" name="submit" src="assets/svg/dokbox.svg" alt="DOK box" width="300" height="280"/>
                </form>
                <form class="form" action="index.php?page=programma&amp;locations=DOKMarkt" class="zone zone__markt">
                  <input class="data" type="hidden" name="location" value="DOKMarkt">
                  <input class="submit" type="image" name="submit" src="assets/svg/dokmarkt.svg" alt="DOK markt" width="300" height="200"/>
                </form>
              </div>
            </div>
            <img class="dropdown-arrow" src="assets/svg/dropdown-arrow.svg" alt="dropdown arrow" width="40" height="40"/>
          </article>
          <article class="selector selector__tags">
            <h1 class="selector__title">tags</h1>
            <p class="selector__desc"> Zoek door de DOKprogramma met de tags om zo snel mogelijk te vinden wat zoekt!</p>
            <form class="selector__form tags__form" action="index.html" method="post">
              <div class="selector__style">
                <img class="selector__img" src="assets/svg/icon-select.svg" alt="dropdown arrow" width="20" height="20"/>
                <select class="selector__item tags" name="day">
                  <option class="selector__option" value="tag">SELECTEER TAGS</option>
                  <option class="selector__option" value="circus">circus</option>
                  <option class="selector__option" value="concert">concert</option>
                  <option class="selector__option" value="Cosy Cozy">Cosy Cozy</option>
                  <option class="selector__option" value="dj">dj</option>
                  <option class="selector__option" value="expo">expo</option>
                  <option class="selector__option" value="film">film</option>
                  <option class="selector__option" value="gastvrijheid">gastvrijheid</option>
                  <option class="selector__option" value="moestuin">moestuin</option>
                  <option class="selector__option" value="rommelmarkt">rommelmarkt</option>
                  <option class="selector__option" value="voorstelling">voorstelling</option>
                  <option class="selector__option" value="werkgroep">werkgroep</option>
                  <option class="selector__option" value="zondag">zondag</option>
                </select>
              </div>
            </form>
          </article>
          <article class="selector selector__date">
            <h1 class="selector__title">datum</h1>
            <p class="selector__desc">Wil je te weten komen wat er op een specifieke dag of maand op DOK te beleven valt? Zoek het hier!</p>
            <form class="selector__form date__form" action="index.html" method="post">
              <div class="selector__style date-style">
                <img class="selector__img" src="assets/svg/icon-select.svg" alt="dropdown arrow" width="20" height="20"/>
                <select class="selector__item date-day" name="date-day">
                  <option class="selector__option" value="DAG">DAG</option>
                </select>
              </div>
              <div class="selector__style">
                <img class="selector__img" src="assets/svg/icon-select.svg" alt="dropdown arrow" width="20" height="20"/>
                <select class="selector__item date-day" name="date-day">
                  <option class="selector__option" value="MAAND">MAAND</option>
                </select>
              </div>
            </form>
          </article>
      </section>
      <section class="regulars">
        <header>
          <h1 class="regulars__vast">Dok's<br />vaste<br /> waarden</h1>
        </header>
        <article class="regular regular__koffie">
          <div class="regular__text">
            <h2 class="regular__day">Elke zondag</h2>
            <h3 class="regular__event">Koffie, taart &amp; gazetten</h3>
            <p class="regular__time">10:00 - 19:00</p>
          </div>
          <img class="regular__img" src="assets/svg/koffie-vast.svg" alt="koffie - vaste waarden" width="450" height="250"/>
        </article>
        <article class="regular regular__markt">
          <div class="regular__text">
            <h2 class="regular__day">Elke zondag</h2>
            <h3 class="regular__event">Dok(rommel)markt</h3>
            <p class="regular__time">10:00 - 19:00</p>
          </div>
          <img class="regular__img" src="assets/svg/markt-vast.svg" alt="(rommel)markt - vaste waarden" width="450" height="330"/>
        </article>
        <article class="regular regular__cosy">
          <header class="hidden">
            <h1>Dj Cosy Cozy</h1>
          </header>
          <div class="regular__text">
            <h2 class="regular__day">Elke zondag</h2>
            <h3 class="regular__event">Gezellige dj - cosy cozy</h3>
            <p class="regular__time">14:00 - 19:00</p>
          </div>
          <img class="regular__img" src="assets/svg/cosy-vast.svg" alt="Dj cosy cozy - vaste waarden" width="440" height="250"/>
        </article>
      </section>
      <section class="events">
        <article class="article__events article__upcoming">
          <header>
            <h1 class="article__start-event__title"></h1>
          </header>
          <div class="events__month">
          <?php foreach($events as $event): ?>
            <article class="events__month__event event <?php foreach($event['locations'] as $location): echo $location['name'];?> <?php endforeach;?>">
              <a href="index.php?page=detail&amp;id=<?php echo $event["id"] ?>" class="event__info">
                <div class="">
                  <p class="event__start article__desc"><?php echo $event['start'];?></p>
                  <p class="date__separator hidden">-</p>
                  <p class="event__end article__desc hidden"><?php echo $event['start'];?></p>
                  <img class="event__img" src="assets/img/<?php echo $event['img_name'];?>.jpg" alt="<?php echo $event['img_name'];?>" width="80" height="80"/>
                </div>
                <div class="event__specifics">
                  <header class="event__title"><h2><?php echo $event['title']; ?></h2></header>
                  <div class="event__time">
                    <p class="event__starttime article__desc"><?php echo $event['start'];?></p>
                    <p class="time__separator">-</p>
                    <p class="event__endtime article__desc"><?php echo $event['end'];?></p>
                  </div>
                </div>
              </a>
            </article>
          <? endforeach;?>
          </div>
        </article>
      </section>
    </main>
