<header>
  <nav>
    <ul class="header-menu">
      <li class="header-menu__item"><a href="index.php"><img src="assets/svg/dok-logo.svg" alt="home" width="80" height="40"></a></li>
      <li><a class="header-menu__item" href="index.php?page=programma">programma</a></li>
      <li><a class="header-menu__item" href="#">over dok</a></li>
      <li><a class="header-menu__item" href="#">zones</a></li>
      <li><a class="header-menu__item" href="#">word dokbewoner</a></li>
      <li><a class="header-menu__item" href="#">contact</a></li>
    </ul>
  </nav>
</header>
<main class="detail">
<?php foreach($events as $event): ?>
  <section class="detail__info">
    <header>
      <h1 class="detail__title article__title"><?php echo $event['title']; ?></h1>
    </header>
    <section class="detail__info__basic">
      <section>
        <article class="detail__where-when">
          <article class="detail__location">
            <h2 class=" detail__specifics <?php foreach($event['locations'] as $location): echo $location['name'];?>__detail <?php endforeach;?>">waar?</h2>
              <ul><?php foreach($event['locations'] as $location): ?><li class="detail__specifics__content"><?php echo $location['name'];?></li><?php endforeach;?></ul>
          </article>
          <article class="detail__when">
            <h2 class=" detail__specifics <?php foreach($event['locations'] as $location): echo $location['name'];?>__detail  <?php endforeach;?>">wanneer?</h2>
            <div class=" detail__specifics__content detail__time detail__date">
              <p class="event__start event__start__detail"><?php echo $event['start']; ?></p>
              <p class="date__separator separator hidden">-</p>
              <p class="event__end hidden"><?php echo $event['end']; ?></p>
            </div>
            <div class=" detail__specifics__content detail__time detail__hour">
              <p class="event__starttime"><?php echo $event['start']; ?></p>
                <p class="time__separator separator">-</p>
              <p class ="event__endtime"><?php echo $event['end']; ?></p>
            </div>
          </article>
        </article>
        <article class="detail__who">
          <h2 class=" detail__specifics <?php foreach($event['locations'] as $location): echo $location['name'];?>__detail <?php endforeach;?>">organisator?</h2>
          <p class="detail__specifics__content"><?php echo $event['organiser']; ?></p>
        </article>
      </section>
      <section>
        <article class="detail__info__desc">
          <p> <?php echo $event['description']; ?> </p>
        </article>
      </section>
    </section>
  </section>
  <section class="detail__img">
    <article class="clip__1">
      <img class="image image__1" src="assets/img/<?php echo $event['img_name']; ?>1.jpg" alt="<?php $locationstr = $location['name']; $locationstr = strtolower($locationstr); echo $locationstr;?>" width="448.52" height="auto"/>
    </article>
    <article class="clip__2">
      <img class="image image__2" src="assets/img/<?php echo $event['img_name']; ?>2.jpg" alt="<?php $locationstr = $location['name']; $locationstr = strtolower($locationstr); echo $locationstr;?>" width="320" height="auto"/>
    </article>
    <?php foreach($event['locations'] as $location): ?>
      <img class="image location__svg" src="assets/svg/<?php $locationstr = $location['name']; $locationstr = strtolower($locationstr); echo $locationstr;?>.svg" alt="<?php $locationstr = $location['name']; $locationstr = strtolower($locationstr); echo $locationstr;?>" width="400" height="auto"/>
    <?php endforeach;?>
  </section>
<? endforeach;?>
</main>
