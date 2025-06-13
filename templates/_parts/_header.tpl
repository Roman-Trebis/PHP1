<div class="sticky-footer-content">

<?php include ROOT . "templates/_parts/_admin-panel.tpl"; ?>

<header class="section-header">
    <div class="section-header__content">
        <a class="logo-link" href="<?=HOST?>">
            <h2 class="section-header__content-title"><?=$settings['site_title']?></h2>
            <p class="section-header__content-subtitle"><?=$settings['site_slogan']?></p>
        </a>
        <nav class="nav">
            <ul class="nav__list">
                <li class="nav__list-item"><a class="nav__list-item-link" href="<?=HOST?>">Главная</a></li>
                <li class="nav__list-item"><a class="nav__list-item-link" href="<?=HOST?>blog">Блог</a></li>
                <li class="nav__list-item"><a class="nav__list-item-link" href="<?=HOST?>contacts">Контакты</a></li>
            </ul>
        </nav>
    </div>
</header>
