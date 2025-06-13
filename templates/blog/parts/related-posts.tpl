<section class="page-post__see-also">
    <div class="container">
        <div class="page-post__title">
            <h2 class="heading">Смотрите также </h2>
        </div>
        <div class="row">
            <?php foreach ($relatedPosts as $post) : ?>
                <div class="col-4">
                    <div class="card-post">
                        <div class="card-post__img">
                            <a href="<?= HOST ?>blog/<?= $post['id'] ?>">
                                <img src="<?= HOST ?>usercontent/blog/<?= $post['cover_small'] ?>" alt="<?= $post['title'] ?>" />
                            </a>
                        </div>
                        <h4 class="card-post__title">
                            <a href="<?= HOST ?>blog/<?= $post['id'] ?>"><?= $post['title'] ?></a>
                        </h4>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
