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
                    'slug'  => 'example_slug',
                    'title' => 'Example Category',
                    'icon'  => 'example_icon',
                )
            );
        }
        return $block_categories;
    }

    public function acf_init_block_types() {

        if ( function_exists('acf_register_block_type') ) {
    
            acf_register_block_type([
                'name'              => 'title',
                'title'             => 'Заглавие H1',
                'description'       => __('A custom description.'),
                'render_template'   => 'template-parts/gutenberg-blocks/title.php',
                'category'          => 'example_slug',
                'icon'              => 'example_icon',
                'keywords'          => [ 'Заглавие', 'H1' ],
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