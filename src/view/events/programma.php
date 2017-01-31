
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
    <main class="programme__sections">
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
            <div class="dropdown-arrow">
              <img src="assets/svg/dropdown-arrow.svg" alt="dropdown-arrow" width="40" height="40"/>
            </div>
          </article>
          <article class="selector selector__tags">
            <h1 class="selector__title">tags</h1>
            <p class="selector__desc"> Zoek door de DOKprogramma met de tags om zo snel mogelijk te vinden wat zoekt!</p>
            <form class="selector__form tags__form" action="index.html" method="post">
              <div class="selector__style">
                <img class="selector__img" src="assets/svg/icon-select.svg" alt="dropdown arrow" width="20" height="20"/>
                <select class="selector__item tags" name="day">
                  <option class="selector__option" value=" ">SELECTEER TAGS</option>
                  <option class="selector__option" value="circus">circus</option>
                  <option class="selector__option" value="concert">concert</option>
                  <option class="selector__option" value="cosycozy">Cosy Cozy</option>
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
                  <option class="selector__option" value=" ">DAG</option>
                  <option class="selector__option" value="01">1</option>
                  <option class="selector__option" value="02">2</option>
                  <option class="selector__option" value="03">3</option>
                  <option class="selector__option" value="04">4</option>
                  <option class="selector__option" value="05">5</option>
                  <option class="selector__option" value="06">6</option>
                  <option class="selector__option" value="07">7</option>
                  <option class="selector__option" value="08">8</option>
                  <option class="selector__option" value="09">9</option>
                  <option class="selector__option" value="10">10</option>
                  <option class="selector__option" value="11">11</option>
                  <option class="selector__option" value="12">12</option>
                  <option class="selector__option" value="13">13</option>
                  <option class="selector__option" value="14">14</option>
                  <option class="selector__option" value="15">15</option>
                  <option class="selector__option" value="16">16</option>
                  <option class="selector__option" value="17">17</option>
                  <option class="selector__option" value="18">18</option>
                  <option class="selector__option" value="19">19</option>
                  <option class="selector__option" value="20">20</option>
                  <option class="selector__option" value="22">21</option>
                  <option class="selector__option" value="23">23</option>
                  <option class="selector__option" value="24">24</option>
                  <option class="selector__option" value="25">25</option>
                  <option class="selector__option" value="26">26</option>
                  <option class="selector__option" value="27">27</option>
                  <option class="selector__option" value="28">28</option>
                  <option class="selector__option" value="29">29</option>
                  <option class="selector__option" value="30">30</option>
                  <option class="selector__option" value="31">31</option>
                </select>
              </div>
              <div class="selector__style">
                <img class="selector__img" src="assets/svg/icon-select.svg" alt="dropdown arrow" width="20" height="20"/>
                <select class="selector__item date-month" name="date-month">
                  <option class="selector__option" value=" ">MAAND</option>
                  <option class="selector__option" value="05">mei</option>
                  <option class="selector__option" value="06">juni</option>
                  <option class="selector__option" value="07">juli</option>
                  <option class="selector__option" value="08">augustus</option>
                  <option class="selector__option" value="09">september</option>
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
        <article class="article__events">
          <header class="events__header">
            <img class="previous" src="assets/svg/dropdown-arrow.svg" alt="previous month" width="40" height="40"/>
            <h1 class="article__start-event__title"></h1>
            <img class="next" src="assets/svg/dropdown-arrow.svg" alt="next month" width="40" height="40"/>
          </header>
          <img class="error__img" src="assets/svg/error-message.svg" alt="errormessage" width="100" height="200"/>
          <div class="events__month">
          <?php foreach($events as $event): ?>
            <article class="events__month__event event <?php foreach($event['locations'] as $location): echo $location['name'];?> <?php endforeach;?> <?php foreach($event['tags'] as $location): echo $location['tag'];?> <?php endforeach;?>">
              <a href="index.php?page=detail&amp;id=<?php echo $event["id"] ?>" class="event__info">
                <section class="">
                  <p class="event__start"><?php echo $event['start'];?></p>
                  <p class="date__separator hidden">-</p>
                  <p class="event__end article__desc hidden"><?php echo $event['end'];?></p>
                  <img class="event__img" src="assets/img/<?php echo $event['img_name'];?>.jpg" alt="<?php echo $event['img_name'];?>" width="80" height="80"/>
                </section>
                <section class="event__specifics">
                  <header class="event__title"><h2><?php echo $event['title']; ?></h2></header>
                  <div class="event__time">
                    <p class="event__starttime"><?php echo $event['start'];?></p>
                    <p class="time__separator">-</p>
                    <p class="event__endtime article__desc"><?php echo $event['end'];?></p>
                  </div>
                </section>
              </a>
            </article>
          <? endforeach;?>
          </div>
        </article>
      </section>
    </main>
