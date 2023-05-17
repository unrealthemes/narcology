<?php

class UT_Guneberg_Blocks {

    private static $_instance = null; 

    static public function get_instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {

        add_filter( 'block_categories_all', [$this, 'filter_block_categories_when_post_provided'], 10, 2 );
        add_action( 'acf/init', [$this, 'acf_init_block_types'] );
    }

    public function filter_block_categories_when_post_provided( $block_categories, $editor_context ) {

        if ( ! empty( $editor_context->post ) ) {
            array_push(
                $block_categories,
                array(
                    'slug'  => 'narcology',
                    'title' => 'Нарколог',
                    'icon'  => 'narcology_icon',
                )
            );
        }
        return $block_categories;
    }

    public function acf_init_block_types() {

        if ( function_exists('acf_register_block_type') ) {
    
            acf_register_block_type([
                'name'              => 'info_banner',
                'title'             => 'Информационный баннер',
                // 'description'       => __('A custom description.'),
                'render_template'   => 'template-parts/gutenberg-blocks/info-banner.php',
                'category'          => 'narcology',
                'icon'              => 'narcology_icon',
                'keywords'          => [ 'Баннер' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'img_blocks',
                'title'             => 'Блоки с изображениями',
                // 'description'       => __('A custom description.'),
                'render_template'   => 'template-parts/gutenberg-blocks/img-blocks.php',
                'category'          => 'narcology',
                'icon'              => 'narcology_icon',
                'keywords'          => [ 'Блоки', 'Изображение' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'steps',
                'title'             => 'Шаги',
                // 'description'       => __('A custom description.'),
                'render_template'   => 'template-parts/gutenberg-blocks/steps.php',
                'category'          => 'narcology',
                'icon'              => 'narcology_icon',
                'keywords'          => [ 'Блоки', 'Шаги' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'steps-percent',
                'title'             => 'Шаги (проценты)',
                // 'description'       => __('A custom description.'),
                'render_template'   => 'template-parts/gutenberg-blocks/steps-percent.php',
                'category'          => 'narcology',
                'icon'              => 'narcology_icon',
                'keywords'          => [ 'Блоки', 'Шаги', 'Проценты' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'price',
                'title'             => 'Цены',
                // 'description'       => __('A custom description.'),
                'render_template'   => 'template-parts/gutenberg-blocks/price.php',
                'category'          => 'narcology',
                'icon'              => 'narcology_icon',
                'keywords'          => [ 'Блоки', 'Цена' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'order-form',
                'title'             => 'Форма заказа',
                // 'description'       => __('A custom description.'),
                'render_template'   => 'template-parts/gutenberg-blocks/order-form.php',
                'category'          => 'narcology',
                'icon'              => 'narcology_icon',
                'keywords'          => [ 'Форма' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'support',
                'title'             => 'Помощь',
                // 'description'       => __('A custom description.'),
                'render_template'   => 'template-parts/gutenberg-blocks/support.php',
                'category'          => 'narcology',
                'icon'              => 'narcology_icon',
                'keywords'          => [ 'Помощь' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'info-blocks',
                'title'             => 'Инфо блоки',
                // 'description'       => __('A custom description.'),
                'render_template'   => 'template-parts/gutenberg-blocks/info-blocks.php',
                'category'          => 'narcology',
                'icon'              => 'narcology_icon',
                'keywords'          => [ 'Инфо блоки' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'doctors',
                'title'             => 'Врачи',
                // 'description'       => __('A custom description.'),
                'render_template'   => 'template-parts/gutenberg-blocks/doctors.php',
                'category'          => 'narcology',
                'icon'              => 'narcology_icon',
                'keywords'          => [ 'Врачи' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'certificates',
                'title'             => 'Сертификаты',
                // 'description'       => __('A custom description.'),
                'render_template'   => 'template-parts/gutenberg-blocks/certificates.php',
                'category'          => 'narcology',
                'icon'              => 'narcology_icon',
                'keywords'          => [ 'Сертификаты' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'faq',
                'title'             => 'Вопрос-Ответ',
                // 'description'       => __('A custom description.'),
                'render_template'   => 'template-parts/gutenberg-blocks/faq.php',
                'category'          => 'narcology',
                'icon'              => 'narcology_icon',
                'keywords'          => [ 'Вопрос', 'Ответ' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'info-modal',
                'title'             => 'Информационный блок',
                // 'description'       => __('A custom description.'),
                'render_template'   => 'template-parts/gutenberg-blocks/info-modal.php',
                'category'          => 'narcology',
                'icon'              => 'narcology_icon',
                'keywords'          => [ 'Инфо', 'Блок' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'reviews',
                'title'             => 'Отзывы',
                // 'description'       => __('A custom description.'),
                'render_template'   => 'template-parts/gutenberg-blocks/reviews.php',
                'category'          => 'narcology',
                'icon'              => 'narcology_icon',
                'keywords'          => [ 'Отзывы' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);

        }
    }

} 