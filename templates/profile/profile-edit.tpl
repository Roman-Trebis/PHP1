<main class="page-profile">

    <?php if ($user['id'] === 0) : ?>
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
            <div class="section__title">
                <div class="container">
                    <h2 class="heading">Редактировать профиль </h2>

                </div>
            </div>
            <div class="section__body">

                <?php if (isset($uriArray[1])) : ?>
                    <form enctype="multipart/form-data" action="<?= HOST ?>profile-edit/<?= $uriArray[1] ?>" method="POST">
                    <?php else : ?>
                        <form enctype="multipart/form-data" action="<?= HOST ?>profile-edit" method="POST">
                        <?php endif; ?>

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <?php include ROOT . "templates/components/errors.tpl"; ?>
                                    <?php include ROOT . "templates/components/success.tpl"; ?>

                                    <div class="form-group">
                                        <label class="input__label">Введите имя
                                            <input class="input input--width-label" type="text" placeholder="Имя" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $user->name;   ?>" />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="input__label">Введите фамилию
                                            <input class="input input--width-label" type="text" placeholder="Фамилия" name="surname" value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : $user->surname;   ?>" />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="input__label">Введите email
                                            <input class="input input--width-label" type="text" placeholder="Email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $user->email; ?>" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center pt-40 pb-40">
                                <div class="col-2">


                                    <div class="avatar-big">

                                        <?php if (!empty($user->avatar)) : ?>
                                            <img src="<?= HOST ?>usercontent/avatars/<?= $user->avatar ?>" alt="Аватарка" />
                                        <?php else : ?>
                                            <img src="<?= HOST ?>usercontent/avatars/no-avatar.svg" alt="Аватарка" />
                                        <?php endif; ?>

                                    </div>


                                </div>
                                <div class="col-6">
                                    <div class="block-upload">
                                        <div class="block-upload__description">
                                            <div class="block-upload__title">Фотография</div>
                                            <p>Изображение jpg или png, рекомендуемая ширина 160px и больше, высота от 160px и более. Вес до 4Мб.</p>
                                            <div class="block-upload__file-wrapper">
                                                <input name="avatar" class="file-button" type="file">
                                            </div>
                                        </div>
                                    </div>

                                    <?php if (!empty($user->avatar)) : ?>
                                        <label class="checkbox__item mt-15">
                                            <input class="checkbox__btn" type="checkbox" name="delete-avatar">
                                            <span class="checkbox__label">Удалить фотографию</span>
                                        </label>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="input__label">Введите страну
                                            <input class="input input--width-label" type="text" placeholder="Страна" name="country" value="<?php echo isset($_POST['country']) ? $_POST['country'] : $user->country;   ?>" />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="input__label">Введите город
                                            <input class="input input--width-label" type="text" placeholder="Город" name="city" value="<?php echo isset($_POST['city']) ? $_POST['city'] : $user->city; ?>" />
                                        </label>
                                    </div>
                                    <div class="form-group form-group--buttons-left">
                                        <button name="updateProfile" class="primary-button" type="submit">Сохранить</button>
                                        <a class="secondary-button" href="<?= HOST ?>profile">Отмена</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
            </div>
        </div>
    <?php endif; ?>

</main>
