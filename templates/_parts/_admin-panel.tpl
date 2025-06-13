<?php if (isset($_SESSION['login']) && $_SESSION['login'] === 1) : ?>

    <div class="admin-panel">
        <div class="admin-panel__block-list">

            <?php if ($_SESSION['role'] === 'admin') : ?>
                <a class="admin-panel__link" href="<?=HOST?>admin">
                    <img src="<?= HOST ?>static/img/admin-panel/target.svg" alt="Перейти в админ панель">
                    <div class="span">Панель управления</div>
                </a>
            <?php endif; ?>

            <a class="admin-panel__link" href="<?= HOST ?>profile">
                <img src="<?= HOST ?>static/img/admin-panel/user.svg" alt=" Профиль">
                <div class="span">Профиль</div>
            </a>

            <?php if ($_SESSION['role'] === 'admin') : ?>
                <a class="admin-panel__link" href="<?= HOST ?>admin/messages">
                    <div class="admin-panel__message">
                        <img src="<?= HOST ?>static/img/admin-panel/mail.svg" alt=" Сообщение">

                        <?php if($messagesNewCounter > 0): ?>
                            <span class="admin-panel__message-icon">
                                <?=$messagesNewCounter?>
                            </span>
                        <?php endif; ?>

                    </div>
                    <div class="span">Сообщения</div>
                </a>

                <?php if( $uriModule === 'blog' && isset($uriGet) && $uriGet !== 'cat' ): ?>
                <a class="admin-panel__link" href="<?php echo HOST . 'admin/post-edit?id=' . $uriGet; ?>">
                    <img src="<?= HOST ?>static/img/admin-panel/edit-3.svg" alt="Редактировать эту страницу">
                    <div class="span">Редактировать</div>
                </a>
                <?php endif; ?>

            <?php endif; ?>
        </div>

        <a href="<?= HOST ?>logout" class="admin-panel__block-button">Выход</a>
    </div>

<?php else : ?>

    <div class="admin-panel">

        <div class="admin-panel__block-list">
        </div>

        <a href="<?= HOST ?>login" class="admin-panel__block-button">Вход</a>
    </div>

<?php endif; ?>
