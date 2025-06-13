<h3 class="admin-section-title">Общие</h3>

<div class="admin-form__item">
    <label class="input__label">
        Название сайта
        <input
            name="site_title"
            class="input input--width-label"
            type="text"
            placeholder="Заголовок секции" value="<?= $settings['site_title'] ?>" />
    </label>
</div>

<div class="admin-form__item">
    <label class="input__label">
        Слоган
        <input
            name="site_slogan"
            class="input input--width-label"
            type="text"
            placeholder="Заголовок секции"
            value="<?= $settings['site_slogan'] ?>"
        />
    </label>
</div>
