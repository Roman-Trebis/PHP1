<?php if (isset($_SESSION['logged_user']) && !empty($_SESSION['logged_user'])) : ?>

    <section class="page-post__post-comments">
        <div class="page-post__title">
            <h2 class="heading">Оставить комментарий </h2>
        </div>
        <div class="page-post__comments-post-comment">
            <div class="post-comment">
                <div class="post-comment__avatar">
                    <div class="avatar-small">
                        <?php if (!empty($_SESSION['logged_user']['avatar_small'])): ?>
                            <img src="<?= HOST ?>usercontent/avatars/<?= $_SESSION['logged_user']['avatar_small'] ?>" alt="Аватарка" />
                        <? else: ?>
                            <img src="<?= HOST ?>usercontent/avatars/no-avatar.svg" alt="Аватарка" />
                        <? endif; ?>
                    </div>
                </div>
                <form action="<?=HOST?>add-comment" method="POST" class="post-comment__form">
                    <input type="hidden" name="id" value="<?=$post['id']?>">
                    <div class="post-comment__form-textarea">
                        <textarea name="comment" class="textarea" placeholder="Введите ваш комментарий..."></textarea>
                    </div>
                    <div class="post-comment__form-button">
                        <button class="primary-button" type="submit" name="submit">Комментировать</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php endif; ?>
