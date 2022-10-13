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
  ])

  ->add_tab('Новости', [
    Field::make('association', 'news_items_index', 'Другие новости')
      ->set_types([
        [
          'type'      => 'post',
          'post_type' => 'news',
        ]
      ])
  ]);

// архив программы
Container::make('post_meta', 'Дополнительные поля')
  ->show_on_page(66)

  ->add_tab('Мероприятия', [
    Field::make('text', 'catalog_events_heading', 'Текст-заголовок')
      ->set_width(50),
    Field::make('text', 'catalog_events_text', 'Текст-описание')
      ->set_width(50),
    Field::make('association', 'catalog_event_items', 'Cобытия')
      ->set_types([
        [
          'type'      => 'post',
          'post_type' => 'event',
        ]
      ]),
  ]);

// архив новостей
Container::make('post_meta', 'Дополнительные поля')
  ->show_on_page(64)

  ->add_tab('Главная новость', [
    Field::make('association', 'news_main_items', 'Главная новость')
      ->set_types([
        [
          'type'      => 'post',
          'post_type' => 'news',
        ]
      ]),
  ]);

// о компании
Container::make('post_meta', 'Дополнительные поля')
  ->show_on_page(79)

  ->add_tab('Первый экран', [
    Field::make('image', 'about_intro_img', 'Изображение на фоне'),
  ])

  ->add_tab('Второй экран', [
    Field::make('text', 'about_heading', 'Заголовок'),
    Field::make('rich_text', 'about_heading_text', 'Текст-описание'),
    Field::make('media_gallery', 'about_gallery', 'Галлерея изображений')->set_type(['image']),
    Field::make('rich_text', 'about_descr', 'Текст-описание под галереей'),
    Field::make('rich_text', 'about_descr_small', 'Текст-описание под галереей(small)'),
  ])

  ->add_tab('Третий экран', [
    Field::make('text', 'about_mission_heading', 'Заголовок'),
    Field::make('rich_text', 'about_mission_content', 'Текст-описание'),
    Field::make('image', 'about_mission_img', 'Изображение'),
  ])

  ->add_tab('Четвертый экран', [
    Field::make('complex', 'about_feautures', 'Наши преимущества')
      ->add_fields([
        Field::make('image', 'image', 'Изображение')->set_width(50),
        Field::make('rich_text', 'text', 'Описание')->set_width(50),
      ]),
  ])

  ->add_tab('Пятый экран', [
    Field::make('rich_text', 'about_qoute_text', 'Заголовок'),
    Field::make('image', 'about_qoute_img', 'Изображение'),
  ])

  ->add_tab('Шестой экран', [
    Field::make('complex', 'about_docs', 'Документы')
      ->add_fields([
        Field::make('text', 'doc_name', 'Название'),
        Field::make('file', 'doc', 'Документ')
          ->set_value_type('id')
      ]),
  ]);

// список литературы
Container::make('post_meta', 'Дополнительные поля')
  ->show_on_page(96)

  ->add_tab('Документы', [
    Field::make('complex', 'bibliography_parts', 'Секция')
      ->add_fields([
        Field::make('text', 'heading', 'Заголовок'),
        Field::make('complex', 'bibliography_docs', 'Документы')
          ->add_fields([
            Field::make('text', 'doc_link', 'Ссылка на файл'),
            Field::make('text', 'doc_name', 'Название'),
            Field::make('text', 'doc_descr', 'Описание'),
            Field::make('file', 'doc', 'Документ')
              ->set_value_type('id')
          ]),
      ]),

  ]);


// мероприятия
Container::make('post_meta', 'Дополнительные поля')
  ->show_on_post_type('event')

  ->add_tab('Даты', [
    Field::make('text', 'event-type', 'Тип мероприятия')->set_width(50),
    Field::make('text', 'event-date-start', 'Начало')->set_width(50),
    Field::make('text', 'event-date-end', 'Конец')->set_width(50),
    Field::make('text', 'event-dates', 'Дата проведения')->set_width(50),
    Field::make('text', 'event_link', 'Ссылка на мероприятие')->set_width(50),
    Field::make('text', 'event_link_name', 'Имя ссылки')->set_width(50),
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
    Field::make('text', 'program_caption', 'Описание-тег')->set_width(50),
    Field::make('rich_text', 'program_themes', 'Основные темы'),
    Field::make('complex', 'program_feautures', 'Чему вы научитесь')
      ->add_fields([
        Field::make('text', 'title', 'В процессе прохождения экспериентального уровня обучающиеся')->set_width(50),
        Field::make('rich_text', 'text', 'Описание')->set_width(50),
      ]),
    Field::make('association', 'program_items', 'Преподаватели')
      ->set_types([
        [
          'type'      => 'post',
          'post_type' => 'teacher',
        ]
      ]),
    Field::make('media_gallery', 'program_gallery', 'Галлерея')->set_type(['image']),
  ]);

// Преподаватели
Container::make('post_meta', 'Дополнительные поля')
  ->show_on_post_type('teacher')

  ->add_tab('Даты', [
    Field::make('rich_text', 'teacher_descr', 'Специализации')
  ]);

// новости
Container::make('post_meta', 'Дополнительные поля')
  ->show_on_post_type('news')

  ->add_tab('Даты', [
    Field::make('checkbox', 'news_item_main', 'Выделить новость'),
    Field::make('association', 'news_items', 'Другие новости')
      ->set_types([
        [
          'type'      => 'post',
          'post_type' => 'news',
        ]
      ]),
  ]);
