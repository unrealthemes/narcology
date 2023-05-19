<?php

class UT_Comments {

    private static $_instance = null;

    static public function get_instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {

        if ( wp_doing_ajax() ) {
            add_action( 'wp_ajax_cloadmore', [$this, 'comments_loadmore_handler'] ); 
            add_action( 'wp_ajax_nopriv_cloadmore', [$this, 'comments_loadmore_handler'] ); 
            
            add_action( 'wp_ajax_clike', [$this, 'clike_handler'] ); 
            add_action( 'wp_ajax_nopriv_clike', [$this, 'clike_handler'] ); 
            
            add_action( 'wp_ajax_cdislike', [$this, 'cdislike_handler'] ); 
            add_action( 'wp_ajax_nopriv_cdislike', [$this, 'cdislike_handler'] ); 
        }

        add_filter( 'comment_form_default_fields', [$this, 'unset_url_field'] );
        add_filter( 'comment_form_fields', [$this, 'comment_form_fields'], 10, 1 );
    }

    public function comments_loadmore_handler() {

        // maybe it isn't the best way to declare global $post variable, but it is simple and works perfectly!
        global $post;
        $post = get_post( $_POST['post_id'] );
        setup_postdata( $post );
        // actually we must copy the params from wp_list_comments() used in our theme
        wp_list_comments( [
            'page'		  => $_POST['cpage'], 
            'per_page'    => get_option('comments_per_page'),
            'style'       => 'div', 
            'short_ping'  => true,
            'callback'	  => 'ut_comment',
        ] );
        die; // don't forget this thing if you don't want "0" to be displayed
    }

    public function clike_handler() {

        check_ajax_referer('ut_check', 'ajax_nonce');
        $id = $_POST['comment_id'];

        if ( ! $_COOKIE["vote-comment-" . $id] ) {
            $this->set_data('vote', $id, 'plus');
            wp_send_json_success();
        }

        wp_send_json_error();
    }
    
    public function cdislike_handler() {

        check_ajax_referer('ut_check', 'ajax_nonce');
        $id = $_POST['comment_id'];

        if ( ! $_COOKIE["vote-comment-" . $id] ) {
            $this->set_data('vote', $id, 'minus');
            wp_send_json_success();
        }

        wp_send_json_error();
    }

    public function set_data( $key, $id, $type ) {

        $count = get_comment_meta($id, $key, true);

        if ( $count == '' ) {
            $value = 1;
            delete_comment_meta($id, $key);
            add_comment_meta($id, $key, $value);
        } else {
            $value = ( $type == 'plus' ) ? $count + 1 : $count - 1;
            update_comment_meta($id, $key, $value);
        }
    }

    public function unset_url_field( $fields ) {

        if ( isset($fields['url']) ) {
            unset($fields['url']);
        }
        
        if ( isset($fields['cookies']) ) {
            unset($fields['cookies']);
        }

        return $fields;
    }

    public function comment_form_fields($comment_fields) {

        if ( isset($comment_fields['comment']) ) {
            $comment_field = $comment_fields['comment'];
            unset($comment_fields['comment']);
            $comment_fields['comment'] = $comment_field;
        }
    
        return $comment_fields;
    }

} 