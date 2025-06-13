<div class="admin-page__content-form">

    <form enctype="multipart/form-data" class="admin-form" method="POST"
    action="<?= HOST ?>admin/post-delete?id=<?=$post['id']?>">

        <?php include ROOT . 'admin/templates/components/errors.tpl'; ?>
        <?php include ROOT . 'admin/templates/components/success.tpl'; ?>

        <div class="admin-form__item">
            <h2 class="heading">Удалить пост</h2>
        </div>
        <div class="admin-form__item">
            <p><strong>Вы действительно хотите удалить пост?</strong></p>
            <p><strong>id:</strong>
                <?=$post['id']?>
            </p>
            <p><strong>Название:</strong>
                <?=$post['title']?>
            </p>
        </div>

        <div class="admin-form__item buttons">
            <button name="post-delete" class="primary-button primary-button--red" type="submit">Удалить</button>
            <a class="secondary-button" href="<?= HOST ?>admin/blog">Отмена</a>
        </div>
        <div class="admin-form__item"></div>
        <div class="admin-form__item"></div>
    </form>
</div>
