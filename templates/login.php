<main>
  <nav class="nav">
    <ul class="nav__list container">
    <?php
        foreach($array['categories'] as $value) {
        ?>
            <li class="nav__item">
                <a href="all-lots.html"><?=$value?></a>
            </li>
        <?php
        }
        ?>
    </ul>
  </nav>
  <form class="form container <?php count($array['errors']) !== 0 ? print "form--invalid" : print ""; ?>" action="login.php" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
    <div class="form__item <?php isset($array['errors']['email']) ? print "form__item--invalid" : print "";?>"> <!-- form__item--invalid -->
      <label for="email">E-mail*</label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail" required value="<?=$array['login_data']['email']?>">
      <span class="form__error"><?php $array['errors']['email'] == 'Incorrect!' ? print 'Введен неверный email' : print 'Введите email!';?></span>
    </div>
    <div class="form__item form__item--last <?php isset($array['errors']['password']) ? print "form__item--invalid" : print "";?>">
      <label for="password">Пароль*</label>
      <input id="password" type="password" name="password" placeholder="Введите пароль" required value="<?=$array['login_data']['password']?>">
      <span class="form__error"><?php $array['errors']['password'] == 'Incorrect!' ? print 'Введен неверный пароль' : print 'Введите пароль!';?></span>
    </div>
    <button type="submit" class="button">Войти</button>
  </form>
</main>
