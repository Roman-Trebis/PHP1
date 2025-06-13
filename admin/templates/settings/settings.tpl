<div class="admin-page__content-form">

    <form class="admin-form" method="POST" action="<?= HOST ?>admin/settings">

        <?php include ROOT . 'admin/templates/components/errors.tpl'; ?>
        <?php include ROOT . 'admin/templates/components/success.tpl'; ?>

        <div class="admin-form__item">
            <h2 class="heading">Настройки сайта</h2>
        </div>

        <?php include ROOT . 'admin/templates/settings/sections/_general.tpl' ?>
        <?php include ROOT . 'admin/templates/settings/sections/_copyright.tpl' ?>
        <?php include ROOT . 'admin/templates/settings/sections/_status.tpl' ?>
        <?php include ROOT . 'admin/templates/settings/sections/_socials.tpl' ?>

        <div class="admin-form__item buttons">
            <button name="submit" class="primary-button" type="submit">
                Сохранить изменения
            </button>
            <a class="secondary-button" href="<?= HOST ?>admin">Отмена</a>
        </div>

    </form>
</div>
