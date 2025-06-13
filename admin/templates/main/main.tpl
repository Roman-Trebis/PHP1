<div class="admin-page__content-form">
    <div class="admin-form" style="width: 900px;">

    <?php include ROOT . 'admin/templates/components/errors.tpl'; ?>
    <?php include ROOT . 'admin/templates/components/success.tpl'; ?>

    <div class="admin-form__item d-flex justify-content-between mb-20">
        <h1>Админ панель</h1>
    </div>

        <div class="dashboard">

            <section class="dashboard-item">
                <div class="dashboard-item__title">
                    <a href="<?= HOST ?>admin/blog">Записей в блоге</a>
                </div>
                <div class="dashboard-item__value"><?=$postsCount?></div>
                <div class="dashboard-item__action">
                    <a class="secondary-button" href="<?= HOST ?>admin/post-new">Добавить пост</a>
                </div>
            </section>

            <section class="dashboard-item">
                <div class="dashboard-item__title">
                    <a href="<?= HOST ?>admin/category">Категории в блоге</a>
                </div>
                <div class="dashboard-item__value"><?=$categoriesCount?></div>
                <div class="dashboard-item__action">
                    <a class="secondary-button" href="<?= HOST ?>admin/category-new">Добавить категорию</a>
                </div>
            </section>

            <section class="dashboard-item">
                <div class="dashboard-item__title">Комментариев</div>
                <div class="dashboard-item__value"><?=$commentsCount?></div>
            </section>

            <section class="dashboard-item">
                <div class="dashboard-item__title">Пользователей</div>
                <div class="dashboard-item__value"><?=$usersCount?></div>
            </section>

            <section class="dashboard-item">
                <div class="dashboard-item__title">
                    <a href="<?= HOST ?>admin/messages">Сообщений</a>
                </div>
                <div class="dashboard-item__value"><?=$messagesTotalCount?></div>
            </section>

        </div>
    </div>
</div>
