<div class="page-post__post-pagination">
    <div class="post-pagination">
        <?php if (!empty($prevId)) : ?>
            <a class="post-pagination__button" href="<?php echo HOST . "blog/" . $prevId; ?>">Назад</a>
        <?php endif; ?>

        <?php if (!empty($nextId)) : ?>
            <a class="post-pagination__button post-pagination__button--forward" href="<?php echo HOST . "blog/" . $nextId; ?>">Вперед</a>
        <?php endif; ?>
    </div>
</div>
