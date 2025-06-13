<form class="authorization-form" method="POST" action="<?php echo HOST; ?>lost-password">
    <div class="authorization-form__heading">
        <h2 class="heading">Восстановить пароль</h2>
    </div>

    <?php include ROOT . "templates/components/errors.tpl"; ?>
    <?php include ROOT . "templates/components/success.tpl"; ?>

    <div class="authorization-form__input">
        <input name="email" class="input" type="text" placeholder="Email" />
    </div>

    <div class="authorization-form__button">
        <button name="lost-password" value="lost-password" class="primary-button" type="submit">
            Восстановить пароль
        </button>
    </div>
    <div class="authorization-form__links">
        <a href="<?php echo HOST; ?>login">Войти на сайт</a>
        <a href="<?php echo HOST; ?>registration">Регистрация</a>
    </div>
</form>
