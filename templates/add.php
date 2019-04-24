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
    <form class="form form--add-lot container <?php count($array['error']) !== 0 ? print "form--invalid" : print ""; ?>" action="add.php" method="post" enctype="multipart/from-data"> <!-- form--invalid -->
        <h2>Добавление лота</h2>
        <div class="form__container-two">
        <div class="form__item <?php isset($array['error']['lot-name']) ? print "form__item--invalid" : print ""; ?>"> <!-- form__item--invalid -->
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота"  value="<?=$array['temp_data']['lot-name']?>">
            <span class="form__error"><?=$array['error']['lot-name']?></span>
        </div>
        <div class="form__item <?php isset($array['error']['category']) ? print "form__item--invalid" : print ""; ?>">
            <label for="category">Категория</label>
            <select id="category" name="category"  value="<?=$array['temp_data']['category']?>">
            <option>Выберите категорию</option>
            <option>Доски и лыжи</option>
            <option>Крепления</option>
            <option>Ботинки</option>
            <option>Одежда</option>
            <option>Инструменты</option>
            <option>Разное</option>
            </select>
            <span class="form__error">Выберите категорию</span>
        </div>
        </div>
        <div class="form__item form__item--wide <?php isset($array['error']['message']) ? print "form__item--invalid" : print ""; ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота" ><?=$array['temp_data']['message']?></textarea>
        <span class="form__error">Напишите описание лота</span>
        </div>
        <div class="form__item form__item--file <?php isset($array['error']['lot-file']) ? print "form__item--uploaded" : print ""; ?>"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
            <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="photo2" value="" name="lot-file">
            <label for="photo2">
            <span>+ Добавить</span>
            </label>
        </div>
        </div>
        <div class="form__container-three">
        <div class="form__item form__item--small <?php isset($array['error']['lot-rate']) ? print "form__item--invalid" : print ""; ?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="lot-rate" placeholder="0"  value="<?=$array['temp_data']['lot-rate']?>">
            <span class="form__error">Введите начальную цену</span>
        </div>
        <div class="form__item form__item--small <?php isset($array['error']['lot-step']) ? print "form__item--invalid" : print ""; ?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot-step" placeholder="0"  value="<?=$array['temp_data']['lot-step']?>">
            <span class="form__error">Введите шаг ставки</span>
        </div>
        <div class="form__item <?php isset($array['error']['lot-date']) ? print "form__item--invalid" : print ""; ?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot-date"  value="<?=$array['temp_data']['lot-date']?>">
            <span class="form__error">Введите дату завершения торгов</span>
        </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button">Добавить лот</button>
    </form>
</main>
