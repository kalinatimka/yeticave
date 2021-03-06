<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="category.php?id=1">Доски и лыжи</a>
            </li>
            <li class="promo__item promo__item--attachment">
                <a class="promo__link" href="category.php?id=2">Крепления</a>
            </li>
            <li class="promo__item promo__item--boots">
                <a class="promo__link" href="category.php?id=3">Ботинки</a>
            </li>
            <li class="promo__item promo__item--clothing">
                <a class="promo__link" href="category.php?id=4">Одежда</a>
            </li>
            <li class="promo__item promo__item--tools">
                <a class="promo__link" href="category.php?id=5">Инструменты</a>
            </li>
            <li class="promo__item promo__item--other">
                <a class="promo__link" href="category.php?id=6">Разное</a>
            </li>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
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
                        <div class="lot__timer timer <?=$value['timer'] < $array['tf'] ? 'timer--finishing': '';?>">
                            <?=timeToClose($value['timer'])?>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </ul>
    </section>
    <?php print(template('templates/pagination.php', $array));?>
</main>
