<form class="authorization-form" method="POST" action="<?php echo HOST; ?>login">
    <div class="authorization-form__heading">
        <h2 class="heading">Вход на сайт </h2>
    </div>

    <?php include ROOT . "templates/components/errors.tpl"; ?>
    <?php include ROOT . "templates/components/success.tpl"; ?>

    <div class="authorization-form__input">
        <input name="email" class="input" type="text" placeholder="Email" />
    </div>
    <div class="authorization-form__input">
        <input name="password" class="input" type="password" placeholder="Пароль" />
    </div>
    <div class="authorization-form__button">
        <button name="login" value="login" class="primary-button" type="submit">Вход на сайт</button>
    </div>
    <div class="authorization-form__links">
        <a href="<?php echo HOST; ?>lost-password">Забыл пароль</a>
        <a href="<?php echo HOST; ?>registration">Регистрация</a>
    </div>
</form>
