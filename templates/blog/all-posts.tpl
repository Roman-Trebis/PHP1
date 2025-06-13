<main class="page-blog">
    <div class="container">
        <div class="page-blog__header">
            <?php if (isset($catTitle)) : ?>
                <h2 class="heading"><?= $catTitle ?></h2>
            <?php else : ?>
                <h2 class="heading">Блог</h2>
            <?php endif; ?>

        </div>
        <div class="page-blog__posts">

            <?php foreach ($posts as $post) : ?>
                <div class="card-post">
                    <div class="card-post__img">
                        <a href="<?php echo HOST . "blog/{$post['id']}"; ?>">
                            <img src="<?= HOST ?>usercontent/blog/<?php echo empty($post['cover_small']) ? 'no-photo.jpg' : $post['cover_small']; ?>" alt="<?= $post['title'] ?>" />
                        </a>
                    </div>
                    <h4 class="card-post__title">
                        <a href="<?php echo HOST . "blog/{$post['id']}"; ?>"><?= $post['title'] ?></a>
                    </h4>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="page-blog__pagination">
            <?php include ROOT . "templates/_parts/pagination/_pagination.tpl" ?>
        </div>
    </div>
</main>
