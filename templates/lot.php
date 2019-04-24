<main>
    <nav class="nav">
        <ul class="nav__list container">
        <li class="nav__item">
            <a href="all-lots.html">Доски и лыжи</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Крепления</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Ботинки</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Одежда</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Инструменты</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Разное</a>
        </li>
        </ul>
    </nav>
    <section class="lot-item container">
        <h2><?=$array['lot_info']['title']?></h2>
        <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
            <img src="<?=$array['lot_info']['url']?>" width="730" height="548" alt="Сноуборд">
            </div>
            <p class="lot-item__category">Категория: <span><?=$array['lot_info']['category']?></span></p>
            <p class="lot-item__description">Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив
            снег
            мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот
            снаряд
            отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом
            кэмбер
            позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,
            просто
            посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла
            равнодушным.</p>
        </div>
        <div class="lot-item__right">
            <div class="lot-item__state">
            <div class="lot-item__timer timer">
                <?php print($array['lot_time_remaining'])?>
            </div>
            <div class="lot-item__cost-state">
                <div class="lot-item__rate">
                <span class="lot-item__amount">Текущая цена</span>
                <span class="lot-item__cost"><?=$array['lot_info']['price']?></span>
                </div>
                <div class="lot-item__min-cost">
                Мин. ставка <span>12 000 р</span>
                </div>
            </div>
            <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
                <p class="lot-item__form-item">
                <label for="cost">Ваша ставка</label>
                <input id="cost" type="number" name="cost" placeholder="12 000">
                </p>
                <button type="submit" class="button">Сделать ставку</button>
            </form>
            </div>
            <div class="history">
            <h3>История ставок (<span><?=count($array['bets'])?></span>)</h3>
            <table class="history__list">
                <?php
                foreach ($array['bets'] as $key) {
                ?>
                <tr class="history__item">
                <td class="history__name"><?=$key['name']?></td>
                <td class="history__price"><?=$key['price']?></td>
                <td class="history__time"><?=gmdate("d.m / H:i:s", $key['ts'])?></td>
                </tr>
                <?php
                }
                ?>
            </table>
            </div>
        </div>
        </div>
    </section>
</main>
