<main>
  <nav class="nav">
    <ul class="nav__list container">
    <?php
    foreach ($array['categories'] as $value) {
    ?>
        <li class="nav__item">
            <a href="all-lots.html"><?= $value['title']?></a>
        </li>
    <?php
    }
    ?>
    </ul>
  </nav>
  <form class="form container <?php empty($array['errors']) == true ? print "" : print "form--invalid";?>" action="sign-up.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Регистрация нового аккаунта</h2>
    <div class="form__item <?php empty($array['errors']['email']) == true ? print "" : print "form__item--invalid";?>"> <!-- form__item--invalid -->
      <label for="email">E-mail*</label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail"  value="<?=$array['sign_up_data']['email']?>">
      <span class="form__error"><?php $array['errors']['email'] == "Duplicate!" ? print "Этот email занят!" : print "Введите e-mail"?></span>
    </div>
    <div class="form__item <?php empty($array['errors']['password']) == true ? print "" : print "form__item--invalid";?>">
      <label for="password">Пароль*</label>
      <input id="password" type="text" name="password" placeholder="Введите пароль"  value="<?=$array['sign_up_data']['password']?>">
      <span class="form__error">Введите пароль</span>
    </div>
    <div class="form__item <?php empty($array['errors']['name']) == true ? print "" : print "form__item--invalid";?>">
      <label for="name">Имя*</label>
      <input id="name" type="text" name="name" placeholder="Введите имя"  value="<?=$array['sign_up_data']['name']?>">
      <span class="form__error">Введите имя</span>
    </div>
    <div class="form__item <?php empty($array['errors']['message']) == true ? print "" : print "form__item--invalid";?>">
      <label for="message">Контактные данные*</label>
      <textarea id="message" name="message" placeholder="Напишите как с вами связаться" ><?=$array['sign_up_data']['message']?></textarea>
      <span class="form__error">Напишите как с вами связаться</span>
    </div>
    <div class="form__item form__item--file form__item--last">
      <label>Аватар</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" value="" name="file">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Зарегистрироваться</button>
    <a class="text-link" href="login.php">Уже есть аккаунт</a>
  </form>
</main>
