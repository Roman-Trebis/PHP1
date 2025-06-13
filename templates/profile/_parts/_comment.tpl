<div class="comment">
    <div class="comment__avatar">
        <div class="avatar-small">
            <?php if (!empty($user['avatar_small'])): ?>
                <img src="<?= HOST ?>usercontent/avatars/<?= $user['avatar_small'] ?>" alt="Аватарка" />
            <? else: ?>
                <img src="<?= HOST ?>usercontent/avatars/no-avatar.svg" alt="Аватарка" />
            <? endif; ?>
        </div>
    </div>
    <div class="comment__data">
        <div class="comment__user-info">
            <div class="comment__username"><?= $user['name'] ?></div>
            <div class="comment__date">
                <img src="<?= HOST ?>static/img/favicons/clock.svg" alt="Дата публикации" />
                <?php echo rus_date("j F Y, H:i", $comment['timestamp']); ?>
                <a href="<?= HOST ?>blog/<?= $comment['post'] ?>">к записи <?= $comment['title'] ?></a>
            </div>
        </div>
        <div class="comment__text">
            <?= $comment['text'] ?>
        </div>
    </div>
</div>
