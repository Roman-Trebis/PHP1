<main class="page-post">
	<section class="page-post__post">
		<div class="section-posts">
			<div class="section-posts__title">
				<h1 class="heading"><?= $post['title'] ?></h1>
			</div>
			<div class="section-posts__info">
				<span>
					<?php echo rus_date("j F Y", $post['timestamp']); ?>
				</span>
				<?php if (!empty($post['cat_title'])) : ?>
					<a href="<?= HOST ?>blog/cat/<?= $post['cat'] ?>" class="badge"><?= $post['cat_title'] ?></a>
				<?php endif; ?>
			</div>

			<?php if (!empty($post['cover'])) : ?>
				<div class="section-posts__img">
					<img src="<?= HOST ?>usercontent/blog/<?= $post['cover'] ?>" alt="<?= $post['title'] ?>" />
				</div>
			<?php endif; ?>

			<div class="section-posts__content">
				<?= $post['content'] ?>
			</div>
		</div>

		<?php include ROOT . "templates/blog/parts/post-nav.tpl"; ?>

	</section>

	<?php include ROOT . "templates/blog/parts/comments.tpl"; ?>
	<?php include ROOT . "templates/blog/parts/comments-form.tpl"; ?>
	<?php include ROOT . "templates/blog/parts/related-posts.tpl"; ?>

</main>
