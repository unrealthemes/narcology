<input type="hidden" name="infinite_scroll_page" value="1">
<input type="hidden" name="infinite_scroll_start" value="on">
<div class="post-grid__filters" style="display:none;"> 
    <div class="filters__item js-select">
        <div class="js-select-toggler">
            <div class="js-select-toggler_value">По дате</div>
            <div class="js-select-toggler_btn">
                <svg>
                    <use xlink:href="<?= DIST_URI ?>/images/icons/svg-sprite.svg#accordion-arrow"></use>
                </svg>
            </div>
        </div>
        <ul class="js-select-list">
            <li data-value="alphabet_a_z">A - Я</li>
            <li data-value="alphabet_z_a">Я - А</li>
            <li data-value="popularity">По популярности</li>
            <li data-value="rating">По рейтингу</li>
            <li data-value="date">По дате</li>
        </ul>
        <input type="hidden" name="order" value="date">
    </div>
</div>