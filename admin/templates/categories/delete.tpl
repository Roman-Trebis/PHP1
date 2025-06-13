<div class="admin-page__content-form">

    <form class="admin-form" method="POST" action="<?= HOST ?>admin/category-delete?id=<?=$cat['id']?>">

        <?php include ROOT . 'admin/templates/components/errors.tpl'; ?>
        <?php include ROOT . 'admin/templates/components/success.tpl'; ?>

        <div class="admin-form__item">
            <h2 class="heading">Удалить категорию</h2>
        </div>
        <div class="admin-form__item">
            <p>Вы действительно хотите удалить категорию <strong>"<?=$cat['title']?>"</strong>?</p>
        </div>
        <div class="admin-form__item buttons">
            <button name="submit" class="primary-button primary-button--red" type="submit">Удалить</button>
            <a class="secondary-button" href="<?= HOST ?>admin/category">Отмена</a>
        </div>
        <div class="admin-form__item"></div>
        <div class="admin-form__item"></div>
    </form>
</div>
