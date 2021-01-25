<?php

/**
 * Functions for theme
 * 
 * @package TienNguyen
 * @version 1.0.0
 */

if (!function_exists("get_class_cols_product")) {
    /**
     * Get product columns
     * 
     * @param int Number of cols to get
     * @return string Number of class columns
     */
    function get_class_cols_product(int $cols)
    {
        if ($cols) {
            switch ($cols) {
                case 2:
                    return "6";
                case 3:
                    return "4";
                case 4:
                    return "3";
                case 5:
                    return "4-2";
                case 6:
                    return "2";
            }
        } else {
            return false;
        }
    }
}

if (!function_exists('get_attachment')) {
    /**
     * Get attachment function
     * If no post_thumbnail get attachments ( maybe it lie on the_content )
     * Remember this function must be inside the loop wp. 
     * 
     * @param int Number of attachment, default is 1
     * @return string Url of attachment 
     */
    function get_attachment($num = 1)
    {
        $output =  '';
        if (has_post_thumbnail() && $num == 1) {
            $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
        } else {
            $attachments = get_posts(
                [
                    'post_type' => 'attachment',
                    'posts_per_page' => $num,
                    'post_parent' => get_the_ID(),
                ]
            );

            if ($attachments && $num == 1) {
                foreach ($attachments as $attachment) {
                    $output = wp_get_attachment_url($attachment->ID);
                }
            } elseif ($attachments && $num > 1) {
                $output = $attachments;
            }

            wp_reset_postdata();
        }

        return $output;
    }
}

if (!function_exists('get_post_footer')) {
    /**
     * Get post footer
     */
    function get_post_footer($onlyComments = false)
    {
        $comments_num = get_comments_number();
        if (comments_open()) {
            if ($comments_num == 0) {
                $comments = _e('No Comments', THEME_DOMAIN);
            } elseif ($comments_num > 1) {
                $comments = $comments_num . _e('Comments', THEME_DOMAIN);
            } else {
                $comments = _e('1 Comment', THEME_DOMAIN);
            }

            $comments = '<a class="comments-link"> ' . get_comments_link() . '<i class="icon"></i></a>';
        } else {
            $comments = _e('Comments are closed', THEME_DOMAIN);
        }

        if ($onlyComments) {
            return $comments;
        }

        return '<div class="post__footer">' . get_the_tag_list('<div class="tag-list">', '', '</div>') . '</div>' . $comments;
    }
}

if (!function_exists('get_breadcrumb')) {
    /**
     * Breadcrumb
     * 
     * @param boolean Show the breadcrumb on homepage
     * @param string  Delimiter between crumbs
     * @param string  The text for homepage link
     * @param boolean Show the current post/page title in breadcrumbs
     * @param string  Tag before the current crumb     
     * @param string  Tag after tge current crumb
     * 
     * @return string Breadcrumb
     */
    function get_breadcrumb($showOnHome = 1, $delimiter = '/', $home = 'Home', $showCurrent = 1, $before = '<li class="active">', $after = '</li>')
    {
        global $post, $wp_query;
        $homelink = get_bloginfo('url');

        if (is_home() || is_front_page()) {
            if ($showOnHome == 1) echo '<ul class="breadcrumb-post"><li><a href="' . $homelink . '"> ' . $home  . ' </a></li></ul>';
        } else {
            echo '<ul class="breadcrumb-post"><li><a href="' . $homelink . '"> ' . $home . ' / </a></li>';

            if (is_category()) {
                $cat_obj = $wp_query->get_queried_object();
                $thisCat = $cat_obj->term_id;
                $thisCat = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);
                // $thisCat->parent != 0 
                if (!is_wp_error($parentCat)) {
                    echo $before . get_category_parents($parentCat, true, ' ' . $delimiter . ' ') . $after;
                }
                echo $before . _e('Hiển thị theo danh mục "', THEME_DOMAIN) . single_cat_title('', false) . '"' . $after;
            } elseif (is_search()) {
                echo $before . _e('Kết quả tìm kiếm cho "', THEME_DOMAIN) . get_search_query() . '"' . $after;
            } elseif (is_day()) {
                echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
                echo $before . get_the_time('d') . $after;
            } elseif (is_month()) {
                echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo $before . get_the_time('F') . $after;
            } elseif (is_year()) {
                echo $before . get_the_time('Y') . $after;
            } elseif (is_single() && !is_attachment()) {
                if (get_post_type() != 'post') {
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    echo '<a href="' . $homelink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
                    if ($showCurrent == 1) echo $before . get_the_title() . $after;
                } else {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                    if ($showCurrent == 0) $cats = preg_replace("/^(.+)\s$delimiter\s$/", "$1", $cats);
                    echo $cats;
                    if ($showCurrent == 1) echo $before . get_the_title() . $after;
                }
            } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
                $post_type = get_post_type_object(get_post_type());
                echo $before . $post_type->labels->singular_name . $after;
            } elseif (is_attachment()) {
                $parent = get_post($post->post_parent);
                $cat = get_the_category($parent->ID);
                $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            } elseif (is_page() && !$post->post_parent) {
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            } elseif (is_page() && $post->post_parent) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_post($parent_id);
                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            } elseif (is_tag()) {
                echo $before . _e('Tag bài viết "', THEME_DOMAIN) . single_tag_title('', false) . '"' . $after;
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                echo $before . _e('Bài viết được đăng vào ', THEME_DOMAIN) . $userdata->display_name . $after;
            } elseif (is_404()) {
                echo $before . _e('Error 404', THEME_DOMAIN) . $after;
            }

            if (get_query_var('paged')) {
                if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
                echo __('Page') . ' ' . get_query_var('paged');
                if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
            }

            echo  '</ul>';
        }
    }
}

if (!function_exists('the_breadcrumb')) {
    /**
     * Output the breadcrumb, use it for shortcut.
     * @see apply_filters('get_breadcrumb', $showOnHome = 1, $delimiter = '/', $home = 'Home', $showCurrent = 1, $before = '<li class="active">', $after = '</li>')
     * 
     * @return string Breadcrumb
     */
    function the_breadcrumb($showOnHome = 1, $delimiter = '/', $home = 'Home', $showCurrent = 1, $before = '<li class="active">', $after = '</li>')
    {
        echo get_breadcrumb($showOnHome, $delimiter, $home, $showCurrent, $before, $after);
    }
}
