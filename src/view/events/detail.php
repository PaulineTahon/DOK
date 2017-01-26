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
    <section>
      <header>
        <h1 class="detail__title article__title"><?php echo $event['title']; ?></h1>
      </header>
      <article class="detail__location">
        <h2 class=" detail__specifics <?php foreach($event['locations'] as $location): echo $location['name'];?>__detail <?php endforeach;?>">waar?</h2>
          <ul><?php foreach($event['locations'] as $location): ?><li><?php echo $location['name'];?></li><?php endforeach;?></ul>
      </article>
      <article class="detail__when">
        <h2 class=" detail__specifics <?php foreach($event['locations'] as $location): echo $location['name'];?>__detail  <?php endforeach;?>">wanneer?</h2>
        <div class="detail__time detail__date">
          <p class="event__start article__title"><?php echo $event['start']; ?></p>
          <p class="date_separator hidden">-</p>
          <p class="event__end article__title hidden"><?php echo $event['end']; ?></p>
        </div>
        <div class="detail__time detail__hour">
          <p class="event__starttime"><?php echo $event['start']; ?></p>
          <p class ="event__endtime"><?php echo $event['end']; ?></p>
        </div>
      </article>
      <article class="">
        <h2 class=" detail__specifics <?php foreach($event['locations'] as $location): echo $location['name'];?>__detail <?php endforeach;?>">organisator?</h2>
        <p><?php echo $event['organiser']; ?></p>
      </article>
    </section>
    <section>
      <article class="detail__desc">
        <p> <?php echo $event['description']; ?> </p>
      </article>
    </section>
  </section>
  <section>
    <?php foreach($event['locations'] as $location): ?>
      <img src="assets/svg/<?php $locationstr = $location['name']; $locationstr = strtolower($locationstr); echo $locationstr;?>.svg" alt="<?php echo $locationstr?>" width="400" height="200"/>
    <?php endforeach;?>
    <?php foreach($event['locations'] as $location): ?>
      <img src="assets/svg/<?php $locationstr = $location['name']; $locationstr = strtolower($locationstr); echo $locationstr;?>.svg" alt="<?php echo $locationstr?>" width="400" height="200"/>
    <?php endforeach;?>
    <?php foreach($event['locations'] as $location): ?>
      <img src="assets/svg/<?php $locationstr = $location['name']; $locationstr = strtolower($locationstr); echo $locationstr;?>.svg" alt="<?php echo $locationstr?>" width="400" height="200"/>
    <?php endforeach;?>
  </section>
<? endforeach;?>
</main>
