<?php

class UT_Blog {

    private static $_instance = null;

    public static function get_instance() {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {

        if (wp_doing_ajax()) {
            add_action("wp_ajax_infinite_scroll", [$this, "infinite_scroll_ajax_handler"]);
            add_action("wp_ajax_nopriv_infinite_scroll", [$this, "infinite_scroll_ajax_handler"]);
        }

        add_filter("get_the_archive_title", [$this, "archive_title"]);
    }

    public function archive_title($title) {

        if (is_category()) {
            $title = single_cat_title("", false);
        } elseif (is_tag()) {
            $title = single_tag_title("", false);
        } elseif (is_author()) {
            $title = '<span class="vcard">' . get_the_author() . "</span>";
        } elseif (is_tax()) {
            //for custom post types
            $title = sprintf(__('%1$s'), single_term_title("", false));
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title("", false);
        }
        return $title;
    }

    public function infinite_scroll_ajax_handler() {

        $posts_html = "";
        //$args["paged"] = (int)$_POST["page"] + 1; // we need next page to be loaded
        $args["post_status"] = "publish";
        $args["post_type"] = "post";
        $args["post__not_in"] =  $_POST['post__not_in']; // get_option( 'sticky_posts' );
        $args["posts_per_page"] = get_option('posts_per_page');

        if ($_POST["taxonomy"] && $_POST["slug"]) {
            $args["tax_query"] = [
                [
                    "taxonomy" => $_POST["taxonomy"],
                    "field" => "slug",
                    "terms" => $_POST["slug"],
                ],
            ];
        }

        if ($_POST["order"] == "alphabet_a_z") {
            $args["orderby"] = "title";
            $args["order"] = "ASC";
        } elseif ($_POST["order"] == "alphabet_z_a") {
            $args["orderby"] = "title";
            $args["order"] = "DESC";
        } elseif ($_POST["order"] == "date") {
            $args["orderby"] = [
                "date" => "DESC",
                "menu_order" => "ASC",
            ];
        } elseif ($_POST["order"] == "popularity") {
            $args["orderby"] = "meta_value_num";
            $args["order"] = "DESC";
            $args["meta_key"] = "post_views";
        } elseif ($_POST["order"] == "rating") {
            $args["orderby"] = "meta_value_num";
            $args["order"] = "DESC";
            $args["meta_key"] = "rating";
        }

        $query = new WP_Query($args);
        ob_start();

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                get_template_part("template-parts/content", get_post_type());
            }
        } else {
            // get_template_part("template-parts/content", "none");
        }
        wp_reset_query();
        $posts_html = ob_get_clean();

        wp_send_json_success([
            "paged" => $args["paged"],
            "posts_html" => $posts_html,
        ]);
    }

    public function sort_posts_ajax_handler() {

        $posts_html = "";
        $args["paged"] = $_POST["page"];
        $args["post_status"] = "publish";
        $args["post_type"] = "post";

        if ($_POST["taxonomy"] && $_POST["slug"]) {
            $args["tax_query"] = [
                [
                    "taxonomy" => $_POST["taxonomy"],
                    "field" => "slug",
                    "terms" => $_POST["slug"],
                ],
            ];
        }

        if ($_POST["order"] == "alphabet_a_z") {
            $args["orderby"] = "title";
            $args["order"] = "ASC";
        } elseif ($_POST["order"] == "alphabet_z_a") {
            $args["orderby"] = "title";
            $args["order"] = "DESC";
        } elseif ($_POST["order"] == "date") {
            $args["orderby"] = [
                "date" => "DESC",
                "menu_order" => "ASC",
            ];
        } elseif ($_POST["order"] == "popularity") {
            $args["orderby"] = "meta_value_num";
            $args["order"] = "DESC";
            $args["meta_key"] = "post_views";
        } elseif ($_POST["order"] == "rating") {
            $args["orderby"] = "meta_value_num";
            $args["order"] = "DESC";
            $args["meta_key"] = "rating";
        }

        $query = new WP_Query($args);
        ob_start();

        if ($query->have_posts()) {
            while ($query->have_posts()):
                $query->the_post();
                get_template_part("template-parts/content", get_post_type());
            endwhile;
        } else {
            get_template_part("template-parts/content", "none");
        }

        wp_reset_query();
        $posts_html = ob_get_clean();

        wp_send_json_success([
            "paged" => $args["paged"],
            "posts_html" => $posts_html,
        ]);
    }
}