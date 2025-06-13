<div class="admin-page__content-form">
    <div class="admin-form" style="width: 900px;">

        <?php include ROOT . 'admin/templates/components/errors.tpl'; ?>
        <?php include ROOT . 'admin/templates/components/success.tpl'; ?>

        <div class="admin-form__item d-flex justify-content-between mb-20">
            <h2 class="heading">Сообщения</h2>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Отправитель</th>
                    <th>Email</th>
                    <th>Текст</th>
                    <th>Время</th>
                    <th>Файл</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($messages as $message) : ?>
                    <tr <?php echo $message['status'] === 'new' ? 'class="message-new"' : NULL; ?>>
                        <td><?= $message['id'] ?></td>
                        <td>
                            <a href="<?= HOST ?>admin/message?id=<?= $message['id'] ?>">
                                <?= $message['name'] ?>
                            </a>
                        </td>
                        <td><?= $message['email'] ?></td>
                        <td><a href="<?= HOST ?>admin/message?id=<?= $message['id'] ?>"><?= $message['message'] ?></a></td>
                        <td><?php echo rus_date("j.m.Y H:i", $message['time']); ?></td>
                        <td><?= $message['file_name_original'] ?></td>
                        <td>
                            <a href="<?php echo HOST . "admin/"; ?>messages?action=delete&id=<?= $message['id'] ?>" class="icon-delete"></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
