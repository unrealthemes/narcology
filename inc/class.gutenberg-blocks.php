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

        }
    }

} 