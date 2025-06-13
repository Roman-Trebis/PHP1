<form enctype="multipart/form-data" method="POST" action="<?= HOST ?>contacts" class="feedback-form">
    <div class="feedback-form__heading">
        <h2 class="heading">Напишите мне </h2>
    </div>
    
    <?php include ROOT . "templates/components/errors.tpl"; ?>
    <?php include ROOT . "templates/components/success.tpl"; ?>

    <div class="feedback-form__input">
        <input name="name" class="input" type="text" placeholder="Ваше имя" />
    </div>
    <div class="feedback-form__input">
        <input name="email" class="input" type="text" placeholder="Email" />
    </div>
    <div class="feedback-form__input">
        <textarea name="message" class="textarea" placeholder="Введите сообщение"></textarea>
    </div>
    <div class="feedback-form__upload">
        <div class="block-upload">
            <div class="block-upload__description">
                <div class="block-upload__title">Прикрепить файл:</div>
                <p>jpg, png, pdf, вес до 2 Мб</p>
                <div class="block-upload__file-wrapper">
                    <input name="file" class="file-button" type="file">
                </div>
            </div>
        </div>
    </div>
    <button class="primary-button" type="submit" name="submit">Отправить</button>
</form>
