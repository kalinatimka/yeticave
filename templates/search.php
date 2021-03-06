<main>
  <nav class="nav">
    <ul class="nav__list container">
    <?php
    foreach($array['categories'] as $value) {
    ?>
        <li class="nav__item">
            <a href="category.php?id=<?=$value['id']?>"><?=$value['title']?></a>
        </li>
    <?php
    }
    ?>
    </ul>
  </nav>
  <div class="container">
    <section class="lots">
      <h2>Результаты поиска по запросу «<span><?=$array['search']?></span>»</h2>
      <?php
      if (count($array['announcements']) > 0) {
      ?>
      <ul class="lots__list">
      <?php
          foreach($array['announcements'] as $key => $value) {
      ?>
      <li class="lots__item lot">
          <div class="lot__image">
              <img src="<?= $value['image_link']?>" width="350" height="260" alt="Сноуборд">
          </div>
          <div class="lot__info">
              <span class="lot__category"><?= $value['category']?></span>
              <h3 class="lot__title"><a class="text-link" href="lot.php?lot=<?=$value['id']?>"><?= $value['name']?></a></h3>
              <div class="lot__state">
                  <div class="lot__rate">
                      <span class="lot__amount">Стартовая цена</span>
                      <span class="lot__cost"><?= $value['start_price']?><b class="rub">р</b></span>
                  </div>
                  <div class="lot__timer timer">
                      <?=timeToClose($value['end_date'])?>
                  </div>
              </div>
          </div>
      </li>
      <?php
          }
      ?>
      </ul>
      <?php
      } else {
      ?>
      <h3 style="margin-top: 120px; margin-bottom: 170px;">По данному запросу ничего не найдено</h3>
      <?php
      }
      ?>
    </section>
    <?php print(template('templates/pagination.php', $array))?>
  </div>
</main>
