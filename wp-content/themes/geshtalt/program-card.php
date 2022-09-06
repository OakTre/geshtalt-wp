<?php
    $events_id = get_the_ID();
?>


<div class="card"><span class="card__tag">caption</span>
    <h3 class="card__heading"><?php the_title(); ?></h3>
    <div class="card__info">
        <ul class="card__info-list">
            <li class="card__info-item">
                <span class="card__info-legend">Срок обучения</span>
                <span class="card__info-text"><?php echo carbon_get_post_meta($events_id, 'program_time'); ?></span>
            </li>
            <li class="card__info-item">
                <span class="card__info-legend">Стоимость</span>
                <span class="card__info-text"><?php echo carbon_get_post_meta($events_id, 'program_cost'); ?></span>
            </li>
        </ul>
        <div class="card__info-descr"><?php the_excerpt(); ?></div>
    </div>
    <div class="card__btns">
        <button class="button card__btn" data-path="program">Записаться</button>
        <button class="button card__btn mod-transparent mod-black"><span class="card__btn-txt">Подробнее</span>
        </button>
    </div>
</div>