<div class="admin-page__content-form">

    <form class="admin-form" method="POST" action="<?= HOST ?>admin/category-new">

        <?php include ROOT . 'admin/templates/components/errors.tpl'; ?>
        <?php include ROOT . 'admin/templates/components/success.tpl'; ?>

        <div class="admin-form__item">
            <h2 class="heading">Новая категория</h2>
        </div>
        <div class="admin-form__item">
            <label class="input__label">
                Введите название категории
                <input name="title" class="input input--width-label" type="text" placeholder="Название категории" />
            </label>
        </div>
        <div class="admin-form__item buttons">
            <button name="submit" class="primary-button" type="submit">Создать</button>
            <a class="secondary-button" href="<?= HOST ?>admin/category">Отмена</a>
        </div>
        <div class="admin-form__item"></div>
        <div class="admin-form__item"></div>
    </form>
</div>
