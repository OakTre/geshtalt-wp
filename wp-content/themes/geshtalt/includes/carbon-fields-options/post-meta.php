<?php

if (!defined('ABSPATH')) {
  exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Дополнительные поля')
  ->show_on_page(6)

  ->add_tab('Первый экран', [
    Field::make('text', 'intro_heading', 'Текст-заголовок')
      ->set_width(50),
    Field::make('text', 'intro_text', 'Текст-описание')
      ->set_width(50),
    Field::make('image', 'intro_img', 'Изображение на фоне'),
    Field::make('image', 'intro_logo', 'Логотип'),
    Field::make('association', 'intro_event_items', 'Cобытия')
    ->set_types([
      [
        'type'      => 'post',
        'post_type' => 'event',
      ]
    ]),
  ])

  ->add_tab('Второй экран(О компании)', [
    Field::make('text', 'about_heading', 'Текст-заголовок')
      ->set_width(50),
    Field::make('text', 'about_text', 'Текст-описание')
      ->set_width(50),
    Field::make('image', 'about_img', 'Изображение')
  ])

  ->add_tab('Третий экран(Обучение)', [
    Field::make('text', 'index_catalog_heading', 'Текст-заголовок')
      ->set_width(50),
    Field::make('text', 'index_catalog_text', 'Текст-описание')
      ->set_width(50)
  ])

  ->add_tab('Четвертый экран(Мероприятия)', [
    Field::make('text', 'index_events_heading', 'Текст-заголовок')
      ->set_width(50),
    Field::make('text', 'index_events_text', 'Текст-описание')
      ->set_width(50),
    Field::make('association', 'index_event_items', 'Cобытия')
      ->set_types([
        [
          'type'      => 'post',
          'post_type' => 'event',
        ]
      ]),
  ])
  
  ->add_tab('Программы', [
    Field::make('association', 'index_program_items1', 'Подготовительные курсы')
      ->set_types([
        [
          'type'      => 'post',
          'post_type' => 'program',
        ]
      ]),
      Field::make('association', 'index_program_items2', 'Основные направления')
      ->set_types([
        [
          'type'      => 'post',
          'post_type' => 'program',
        ]
      ]),
      Field::make('association', 'index_program_items3', 'Специализации')
      ->set_types([
        [
          'type'      => 'post',
          'post_type' => 'program',
        ]
      ]),
  ]);


// мероприятия
Container::make('post_meta', 'Дополнительные поля')
  ->show_on_post_type('event')

  ->add_tab('Даты', [
    Field::make('text', 'event-date-start', 'Начало')->set_width(50),
    Field::make('text', 'event-date-end', 'Конец')->set_width(50),
    Field::make('text', 'event-dates', 'Дата проведения')->set_width(50),
    Field::make('image', 'event_img', 'Изображение'),
    Field::make('media_gallery', 'event-gallery', 'Галлерея')->set_type(['image']),

    Field::make('association', 'event_items', 'Другие события')
      ->set_types([
        [
          'type'      => 'post',
          'post_type' => 'event',
        ]
      ]),
  ]);


// программы
Container::make('post_meta', 'Дополнительные поля')
  ->show_on_post_type('program')

  ->add_tab('Даты', [
    Field::make('text', 'program_time', 'Срок обучения')->set_width(50),
    Field::make('text', 'program_cost', 'Стоимость')->set_width(50),
  ]);