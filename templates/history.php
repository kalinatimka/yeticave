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
      <h2>История просмотров</h2>
      <ul class="lots__list">
        <?php
        if (isset($array['history'])) {
            foreach ($array['history'] as $value) {
                $arr = $array['announcements'][$value];
        ?>
                <li class="lots__item lot">
                    <div class="lot__image">
                        <img src="<?= $arr['image_link']?>" width="350" height="260" alt="Сноуборд">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"><?= $arr['category']?></span>
                        <h3 class="lot__title"><a class="text-link" href="lot.php?lot=<?=$value?>"><?= $arr['name']?></a></h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <span class="lot__amount">Стартовая цена</span>
                                <span class="lot__cost"><?= $arr['start_price']?><b class="rub">р</b></span>
                            </div>
                            <div class="lot__timer timer">
                                <?=timeToClose($value['end_date'])?>
                            </div>
                        </div>
                    </div>
                </li>
        <?php
            }
        }
        else {
            print("История просмотров пуста");
        }
        ?>
      </ul>
    </section>
  </div>
</main>
