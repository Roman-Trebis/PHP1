<main class="page-profile">
    <?php if (isset($userNotLoggedIn)) : ?>
        <div class="section">
            <div class="container">
                <div class="section__title">
                    <h2 class="heading mb-25">Профиль пользователя</h2>
                    <p>Чтобы посмотреть свой профиль
                        <a href="<?= HOST ?>login">войдите</a>
                        либо
                        <a href="<?= HOST ?>registration">зарегистрируйтесь</a>.</p>
                </div>
            </div>
        </div>
    <?php elseif ($user['id'] === 0) : ?>
        <div class="section">
            <div class="container">
                <div class="section__title">
                    <h2 class="heading mb-25">Такого пользователя не существует</h2>
                    <p><a href="<?= HOST ?>">Вернуться на главную</a>.</p>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="section">
            <div class="container">
                <div class="section__title">
                    <h2 class="heading">Профиль пользователя </h2>
                </div>
                <div class="section__body">

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <?php include ROOT . "templates/components/errors.tpl"; ?>
                            <?php include ROOT . "templates/components/success.tpl"; ?>
                        </div>
                    </div>

                    <?php if (empty($user->name)) : ?>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="enter-or-reg flex-column flex-column-elements-margin">
                                    <div class="enter-or-reg__text">
                                        😐 Пустой профиль
                                    </div>
                                    <?php include ROOT . "templates/profile/_parts/button-edit-profile.tpl"; ?>

                                </div>
                            </div>
                        </div>

                    <?php else : ?>
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <div class="avatar-big">

                                    <?php if (!empty($user->avatar)) : ?>
                                        <img src="<?= HOST ?>usercontent/avatars/<?= $user->avatar ?>" alt="Аватарка" />
                                    <?php else : ?>
                                        <img src="<?= HOST ?>usercontent/avatars/no-avatar.svg" alt="Аватарка" />
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="definition-list mb-20">

                                    <?php if (!empty($user->name)) : ?>
                                        <dl class="definition">
                                            <dt class="definition__term">имя и фамилия</dt>
                                            <dd class="definition__description"> <?= $user->name ?> <?= $user->surname ?></dd>
                                        </dl>
                                    <?php endif; ?>

                                    <?php if (!empty($user->country) || !empty($user->city)) : ?>
                                        <dl class="definition">
                                            <dt class="definition__term">

                                                <?php if (!empty($user->country)) : ?>
                                                    Страна
                                                <?php endif; ?>

                                                <?php if (!empty($user->country) && !empty($user->city)) : ?>
                                                    ,
                                                <?php endif; ?>

                                                <?php if (!empty($user->city)) : ?>
                                                    город
                                                <?php endif; ?>

                                            </dt>
                                            <dd class="definition__description">
                                                <?= $user->country ?>

                                                <?php if (!empty($user->country) && !empty($user->city)) : ?>
                                                    ,
                                                <?php endif; ?>

                                                <?= $user->city ?>
                                            </dd>
                                        </dl>
                                    <?php endif; ?>

                                </div>

                                <?php include ROOT . "templates/profile/_parts/button-edit-profile.tpl"; ?>

                            </div>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>


        <?php
            if (isset($comments) and !empty($comments)) {
                include ROOT . "templates/profile/_parts/user-comments.tpl";
            }
        ?>


    <?php endif; ?>

</main>
