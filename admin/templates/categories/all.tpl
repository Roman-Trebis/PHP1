<div class="admin-page__content-form">
    <div class="admin-form" style="width: 900px;">

        <?php include ROOT . 'admin/templates/components/errors.tpl'; ?>
        <?php include ROOT . 'admin/templates/components/success.tpl'; ?>

        <div class="admin-form__item d-flex justify-content-between mb-20">
            <h2 class="heading">Категории</h2>
            <a class="secondary-button" href="<?= HOST ?>admin/category-new">Создать новую категорию</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach ($cats as $cat) : ?>
                    <tr>
                        <td><?= $cat['id'] ?></td>
                        <td>
                            <a href="<?php echo HOST . "admin/"; ?>category-edit?id=<?= $cat['id'] ?>">
                                <?= $cat['title'] ?>
                            </a>
                        </td>
                        <td>
                            <a
                                href="<?php echo HOST . "admin/"; ?>category-delete?id=<?= $cat['id'] ?>"
                                class="icon-delete"
                            ></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
