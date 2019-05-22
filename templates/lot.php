<?php
    require_once('functions.php');
?>
<main>
    <nav class="nav">
        <ul class="nav__list container">
        <?php
        foreach ($array['categories'] as $value) {
        ?>
            <li class="nav__item">
                <a href="category.php?id=<?=$value['id']?>"><?= $value['title']?></a>
            </li>
        <?php
        }
        ?>
        </ul>
    </nav>
    <section class="lot-item container">
        <h2><?=$array['lot_info']['name']?></h2>
        <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
            <img src="<?=$array['lot_info']['image_link']?>" width="730" height="548" alt="Сноуборд">
            </div>
            <p class="lot-item__category">Категория: <span><?=$array['lot_info']['category']?></span></p>
            <p class="lot-item__description"><?=$array['lot_info']['description']?></p>
        </div>
        <div class="lot-item__right">
            <?php
            if (!empty($_SESSION['user'])) {
            ?>
            <div class="lot-item__state">
            <div class="lot-item__timer timer">
                <?=timeToClose($array['lot_info']['timer'])?>
            </div>
            <div class="lot-item__cost-state">
                <div class="lot-item__rate">
                <span class="lot-item__amount">Текущая цена</span>
                <span class="lot-item__cost"><?php isset($array['lot_info']['cur_price']) == true ? print $array['lot_info']['cur_price'] : print $array['lot_info']['start_price']?></span>
                </div>
                <div class="lot-item__min-cost">
                Мин. ставка <span><?=$array['min_bet']?> р</span>
                </div>
            </div>
            <form class="lot-item__form" action="lot.php" method="post">
                <p class="lot-item__form-item">
                <label for="cost">Ваша ставка</label>
                <input id="cost" type="number" name="cost" placeholder="<?=$array['min_bet']?>" min="<?=$array['min_bet']?>" required>
                <input type="hidden" name="id" value="<?=$array['lot_info']['id']?>">
                </p>
                <button type="submit" class="button" <?=$_SESSION['user']['id'] == $array['lot_info']['id_creator'] || $array['lot_info']['id_winner'] != null ? 'disabled' : ''?>>Сделать ставку</button>
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
                <td class="history__time"><?=showDate($key['dateNtime'])?></td>
                </tr>
                <?php
                }
                ?>
            </table>
            </div>
            <?php
            }
            ?>
        </div>
        </div>
    </section>
</main>
