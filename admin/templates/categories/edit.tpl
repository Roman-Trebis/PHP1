<div class="admin-page__content-form">

    <form class="admin-form" method="POST" action="<?= HOST ?>admin/category-edit?id=<?=$cat['id']?>">

        <?php include ROOT . 'admin/templates/components/errors.tpl'; ?>
        <?php include ROOT . 'admin/templates/components/success.tpl'; ?>

        <div class="admin-form__item">
            <h2 class="heading">Редактировать категорию</h2>
        </div>
        <div class="admin-form__item">
            <label class="input__label">
                Название категории
                <input
                    name="title"
                    class="input input--width-label"
                    type="text"
                    placeholder="Название категории"
                    value="<?=$cat['title']?>"
                />
            </label>
        </div>
        <div class="admin-form__item buttons">
            <button name="submit" class="primary-button" type="submit">Сохранить</button>
            <a class="secondary-button" href="<?= HOST ?>admin/category">Отмена</a>
        </div>
        <div class="admin-form__item"></div>
        <div class="admin-form__item"></div>
    </form>
</div>
