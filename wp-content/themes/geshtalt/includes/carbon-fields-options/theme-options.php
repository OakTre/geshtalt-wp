<?php

if (!defined('ABSPATH')) {
  exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('theme_options', 'Контакты')
  ->set_page_menu_position(4)
  ->set_icon('dashicons-image-filter')
  ->add_tab('Контакты', [
    Field::make('image', 'site_logo', 'Логотип')->set_width(50),
    Field::make('text', 'phone', 'Номер телефона')->set_width(50),
    Field::make('text', 'adres', 'Адрес')->set_width(50),
    Field::make('text', 'work_time', 'Время работы')->set_width(50),
    Field::make('text', 'wt', 'Ссылка на WatsUp')->set_width(50),
    Field::make('text', 'tg', 'Ссылка на Telergam')->set_width(50)
  ]);
