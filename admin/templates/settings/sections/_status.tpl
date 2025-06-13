<h3 class="admin-section-title">Секция "Статус"</h3>

<div class="admin-form__item">
    <label class="checkbox__item">
        <input
            class="checkbox__btn"
            type="checkbox"
            name="status_on"
            <?php echo !empty($settings['status_on']) ? 'checked' : NULL;  ?>
        >
        <span class="checkbox__label"><strong>Показывать секцию статус</strong></span>
    </label>
</div>

<div class="admin-form__item">
    <label class="input__label">
        Текст на кнопке
        <input name="status_label" class="input input--width-label" type="text" placeholder="Заголовок секции" value="<?= $settings['status_label'] ?>" />
    </label>
</div>

<div class="admin-form__item">
    <label class="input__label">
        Текст справа
        <input name="status_text" class="input input--width-label" type="text" placeholder="Заголовок секции" value="<?= $settings['status_text'] ?>" />
    </label>
</div>

<div class="admin-form__item">
    <label class="input__label">
        Ссылка
        <input name="status_link" class="input input--width-label" type="text" placeholder="Заголовок секции" value="<?= $settings['status_link'] ?>" />
    </label>
</div>
