<?php

/**
 * Menu ( mega & dropdown )
 * 
 * @package TienNguyen
 * @version 1.0.0
 * 
 ** Scaffold
 * .category 
 *  ul.category__list (start_lvl)
 *      li.category__item.category__item--has-mega (start_el)
 *          a.category__link 
 *              i.category__icon
 *      (end_el)
 *  (end_lvl)
 */

/**
 * Custom Menu Walker
 */
class Custom_Menu_Walker extends Walker_Nav_Menu
{
    public $isMegaMenu, $count, $col;

    public function __construct()
    {
        $this->isMegaMenu = 0;
        $this->count = 1;
        $this->row = 1;
    }

    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = str_repeat($t, $depth);

        if ($this->isMegaMenu != 0) {
            $classes = array('category__mega');
        } else {
            $classes = array('category__dropdown');
        }

        $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        if ($this->isMegaMenu != 0) {
            $output .= "{$n} {$indent}<div $class_names > {$n}";
            $output .= "{$n} {$indent}<ul class='category__mega-col' > {$n}";

            $output .= "";
        } else {
            $output .= "{$n} {$indent}<ul $class_names> {$n}";
        }
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = str_repeat($t, $depth);

        if ($this->isMegaMenu != 0) {
            $output .= "$indent</ul></div>{$n}";
        } else {
            $output .= "$indent</ul>{$n}";
        }
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $li_attributes = '';
        $class_names   = '';
        $value         = ''; // Add more custom attribute (Optional) 

        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = ($depth) ? str_repeat($t, $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        // If is mega menu
        if (!empty($item->mega) && $item->mega == '_mega') {
            $this->isMegaMenu = $item->ID;
            $classes[] = 'category__item--has-mega';
        } else {
            $this->isMegaMenu = 0;
        }

        $classes[] = 'category__item-' . $item->ID;

        // * Is mega and depth != 0 
        if ($this->isMegaMenu == $item->menu_item_parent && $item->isMegaMenu != 0 || $depth != 0) {
            // * If is break new column
            if (!empty($item->megaType) && $item->megaType == '_megaCol') {
                $output .= "</ul><ul class='category__mega-col'>{$n}";
            }

            // * IF is divider 
            if (!empty($item->megaType) && $item->megaType == '_megaDivider') {
                $output .= "<li class=\"category__mega-divider\"></li>{$n}";
            }

            // * Add a class for image
            if (!empty($item->megaType) && $item->megaType == '_megaImage') {
                $postID = url_to_postid($item->url);
                $output .= "<img class='category__mega-image' src=\" " . get_the_post_thumbnail_url($postID) . " \">";
            }

            $classes[] = 'category__mega-item';
        } else {
            $classes[] = 'category__item ';
        }

        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-submenu';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = 'class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        // ! <li>
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

        $atts = '';
        $atts .= !empty($item->attr_title) ? 'title="' . esc_attr($item->attr_title) . '"' : '';
        $atts .= !empty($item->target) ? ' target= "' . esc_attr($item->target) . '"' : '';
        $atts .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $atts .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        //  Is mega and depth != 0 
        if ($this->isMegaMenu == $item->menu_item_parent && $item->isMegaMenu != 0 || $depth != 0) {

            $atts .= 'class="' . ((!empty($item->megaCaption)) ? 'category__mega-caption' : '') . '"';
        } else {
            $atts .= 'class="category__link"' . $depth;
        }

        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters('the_title', $item->title, $item->ID);

        // ! <a>
        $item_output = $args->before;
        $item_output .= '<a' . $atts . '>';

        // ! icon 
        if (!empty($item->itemIcon)) {
            $classIcon = str_replace(',', ' ', $item->itemIcon);
            $item_output .= '<i class="' . $classIcon . ' category__icon"></i>';
        }

        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        // ! </a>

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $output .= "</li>{$n}";
    }
}

/**
 * Register A custom field for the nav menu item
 */
if (!function_exists('custom_nav_menu_item')) {
    function custom_nav_menu_item($item)
    {
        $item->mega = get_post_meta($item->ID, '_menu_item_mega', true);
        $item->megaType = get_post_meta($item->ID, '_menu_item_megaType', true);
        $item->megaCaption = get_post_meta($item->ID, '_menu_item_megaCaption', true);
        $item->itemIcon = get_post_meta($item->ID, '_menu_item_icon', true);

        return $item;
    }

    add_filter('wp_setup_nav_menu_item', 'custom_nav_menu_item');
}

/**
 * Save the user's input
 */
if (!function_exists('update_custom_nav_menu_item')) {
    function update_custom_nav_menu_item($menu_id = 0, $menu_item_db_id = 0, $menu_item_data = [])
    {
        update_post_meta_mega($menu_item_db_id, '_menu_item_mega', $_POST, 'menu-item-mega');
        update_post_meta_mega($menu_item_db_id, '_menu_item_megaType', $_POST, 'menu-item-megaType');
        update_post_meta_mega($menu_item_db_id, '_menu_item_megaCaption', $_POST, 'menu-item-megaCaption');
        update_post_meta_mega($menu_item_db_id, '_menu_item_icon', $_POST, 'menu-item-icon');
    }

    add_action('wp_update_nav_menu_item', 'update_custom_nav_menu_item', 10, 3);
}


if (!function_exists('update_post_meta_mega')) {
    /**
     * @internal
     * @param $post_id | $menu_item_db_id 
     * @param $meta_name
     * @param $post | The post receives from $_POST
     * @param $post_name 
     */
    function update_post_meta_mega($post_id, $meta_name, $post, $post_name)
    {
        if (isset($post[$post_name]) && !empty($post[$post_name][$post_id])) {
            if (is_array($post[$post_name]) && isset($post[$post_name][$post_id])) {

                $value = sanitize_text_field($post[$post_name][$post_id]);

                update_post_meta($post_id, $meta_name, $value);

                return $post[$post_name][$post_id];
            }
        } else {
            update_post_meta($post_id, $meta_name, null);

            return null;
        }
    }
}


if (!class_exists('Custom_Menu_Walker_Edit')) {
    /**
     * Set up a new walker for the edit menu tree
     * 
     * @see wp-admin/includes/class-walker-nav-menu-edit.php
     */

    add_filter('wp_edit_nav_menu_walker', function ($class) {

        return 'Custom_Menu_Walker_Edit';
    });

    /**
     * * Notice ! Removed start-lvl && end-lvl.
     */
    class Custom_Menu_Walker_Edit extends Walker_Nav_Menu
    {
        public function start_lvl(&$output, $depth = 0, $args = null)
        {
        }
        public function end_lvl(&$output, $depth = 0, $args = null)
        {
        }

        public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
        {
            global $_wp_nav_menu_max_depth;
            $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

            ob_start();
            $item_id      = esc_attr($item->ID);
            $removed_args = array(
                'action',
                'customlink-tab',
                'edit-menu-item',
                'menu-item',
                'page-tab',
                '_wpnonce',
            );

            $original_title = false;

            if ('taxonomy' === $item->type) {
                $original_object = get_term((int) $item->object_id, $item->object);
                if ($original_object && !is_wp_error($original_object)) {
                    $original_title = $original_object->name;
                }
            } elseif ('post_type' === $item->type) {
                $original_object = get_post($item->object_id);
                if ($original_object) {
                    $original_title = get_the_title($original_object->ID);
                }
            } elseif ('post_type_archive' === $item->type) {
                $original_object = get_post_type_object($item->object);
                if ($original_object) {
                    $original_title = $original_object->labels->archives;
                }
            }

            $classes = array(
                'menu-item menu-item-depth-' . $depth,
                'menu-item-' . esc_attr($item->object),
                'menu-item-edit-' . ((isset($_GET['edit-menu-item']) && $item_id == $_GET['edit-menu-item']) ? 'active' : 'inactive'),
            );

            $title = $item->title;

            if (!empty($item->_invalid)) {
                $classes[] = 'menu-item-invalid';
                /* translators: %s: Title of an invalid menu item. */
                $title = sprintf(__('%s (Invalid)'), $item->title);
            } elseif (isset($item->post_status) && 'draft' === $item->post_status) {
                $classes[] = 'pending';
                /* translators: %s: Title of a menu item in draft status. */
                $title = sprintf(__('%s (Pending)'), $item->title);
            }

            $title = (!isset($item->label) || '' === $item->label) ? $title : $item->label;

            $submenu_text = '';
            if (0 == $depth) {
                $submenu_text = 'style="display: none;"';
            }
?>
            <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes); ?>">
                <div class="menu-item-bar">
                    <div class="menu-item-handle">
                        <span class="item-title"><span class="menu-item-title"><?php echo esc_html($title); ?></span> <span class="is-submenu" <?php echo $submenu_text; ?>><?php _e('sub item'); ?></span></span>
                        <span class="item-controls">
                            <?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
                            ?>
                            <span class="item-type show-if-mega"> <?php esc_html_e('Mega Menu', THEME_DOMAIN) ?> </span>
                            <span class="item-type show-if-item"> <?php esc_html_e('Mega Item', THEME_DOMAIN) ?> </span>
                            <span class="item-type"><?php echo esc_html($item->type_label); ?></span>
                            <?php # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
                            ?>
                            <span class="item-order hide-if-js">
                                <?php
                                printf(
                                    '<a href="%s" class="item-move-up" aria-label="%s">&#8593;</a>',
                                    wp_nonce_url(
                                        add_query_arg(
                                            array(
                                                'action'    => 'move-up-menu-item',
                                                'menu-item' => $item_id,
                                            ),
                                            remove_query_arg($removed_args, admin_url('nav-menus.php'))
                                        ),
                                        'move-menu_item'
                                    ),
                                    esc_attr__('Move up')
                                );
                                ?>
                                |
                                <?php
                                printf(
                                    '<a href="%s" class="item-move-down" aria-label="%s">&#8595;</a>',
                                    wp_nonce_url(
                                        add_query_arg(
                                            array(
                                                'action'    => 'move-down-menu-item',
                                                'menu-item' => $item_id,
                                            ),
                                            remove_query_arg($removed_args, admin_url('nav-menus.php'))
                                        ),
                                        'move-menu_item'
                                    ),
                                    esc_attr__('Move down')
                                );
                                ?>
                            </span>
                            <?php
                            if (isset($_GET['edit-menu-item']) && $item_id == $_GET['edit-menu-item']) {
                                $edit_url = admin_url('nav-menus.php');
                            } else {
                                $edit_url = add_query_arg(
                                    array(
                                        'edit-menu-item' => $item_id,
                                    ),
                                    remove_query_arg($removed_args, admin_url('nav-menus.php#menu-item-settings-' . $item_id))
                                );
                            }

                            printf(
                                '<a class="item-edit" id="edit-%s" href="%s" aria-label="%s"><span class="screen-reader-text">%s</span></a>',
                                $item_id,
                                $edit_url,
                                esc_attr__('Edit menu item'),
                                __('Edit')
                            );
                            ?>
                        </span>
                    </div>
                </div>

                <div class="menu-item-settings wp-clearfix" id="menu-item-settings-<?php echo $item_id; ?>">
                    <?php if ('custom' === $item->type) : ?>
                        <p class="field-url description description-wide">
                            <label for="edit-menu-item-url-<?php echo $item_id; ?>">
                                <?php _e('URL'); ?><br />
                                <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->url); ?>" />
                            </label>
                        </p>
                    <?php endif; ?>
                    <p class="description description-wide">
                        <label for="edit-menu-item-title-<?php echo $item_id; ?>">
                            <?php _e('Navigation Label'); ?><br />
                            <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->title); ?>" />
                        </label>
                    </p>
                    <p class="field-title-attribute field-attr-title description description-wide">
                        <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
                            <?php _e('Title Attribute'); ?><br />
                            <input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->post_excerpt); ?>" />
                        </label>
                    </p>
                    <p class="field-link-target description">
                        <label for="edit-menu-item-target-<?php echo $item_id; ?>">
                            <input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]" <?php checked($item->target, '_blank'); ?> />
                            <?php _e('Open link in a new tab'); ?>
                        </label>
                    </p>
                    <p class="field-css-classes description description-thin">
                        <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
                            <?php _e('CSS Classes (optional)'); ?><br />
                            <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr(implode(' ', $item->classes)); ?>" />
                        </label>
                    </p>
                    <p class="field-xfn description description-thin">
                        <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
                            <?php _e('Link Relationship (XFN)'); ?><br />
                            <input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->xfn); ?>" />
                        </label>
                    </p>
                    <p class="field-description description description-wide">
                        <label for="edit-menu-item-description-<?php echo $item_id; ?>">
                            <?php _e('Description'); ?><br />
                            <textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]">
                                <?php echo esc_html($item->description); // textarea_escaped 
                                ?>
                            </textarea>
                            <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.'); ?></span>
                        </label>
                    </p>
                    <!-- 
                        # ------------------------------------- ICONS -------------------------------------
                     -->
                    <p data-item="<?php echo esc_attr($item_id); ?>" class="field-menu-item-icon description description-wide show-if-screen-options-icon <?php echo (empty($item->itemIcon)) ? 'empty' : ''; ?>">
                        <label>
                            <?php _e('Icon', THEME_DOMAIN) ?><br />
                            <button style="vertical-align: baseline;" class="button" data-action="mega-menu-pick-icon">
                                <span class="inline-if-empty"> <?php _e('Add icons'); ?> </span>
                                <span class="hide-if-empty"> <?php _e('Edit icons'); ?> </span>
                            </button>

                            <span data-action="mega-menu-pick-icon" class="mega-menu-icon-frame hide-if-empty">
                                <span class="mega-menu-icon-selected">
                                    <?php if (!empty($item->itemIcon)) { ?>
                                        <i class="<?php echo esc_attr($item->itemIcon); ?>"> </i>
                                    <?php } ?>
                                </span>
                                <a href="#" class="mega-menu-icon-remove dashicons dashicons-dismiss" data-action="mega-menu-remove-icon" title="<?php esc_attr_e('Remove Icon', THEME_DOMAIN) ?>"></a>
                            </span>

                            <span class="menu-item-icon-frame inline-if-empty" data-action="mega-menu-pick-icon">
                                <i class="fas fa-cog fa-lg" style="position: relative; top: -1px;"></i>
                            </span>

                            <input type="hidden" id="edit-menu-item-icon-<?php echo $item_id; ?>" name="menu-item-icon[<?php echo $item_id; ?>]" value="<?php echo !empty($item->itemIcon) ? $item->itemIcon : ''; ?>" />
                        </label>
                    </p>
                    <!--
                        # ------------------------------------- END ICONS -------------------------------------
                    -->

                    <!-- 
                        # ------------------------------------- MEGA MENU  -------------------------------------
                    -->
                    <p class="description description-wide show-if-mega-menu">
                        <label for="edit-menu-item-mega-<?php echo $item_id; ?>">
                            <input class="mega-menu__checkbox" type="checkbox" id="edit-menu-item-mega-<?php echo $item_id; ?>" value="_mega" name="menu-item-mega[<?php echo $item_id; ?>]" <?php checked($item->mega, '_mega') ?> />
                            <?php _e('Use as Mega Menu', THEME_DOMAIN); ?>
                        </label>
                    </p>
                    <!-- 
                        # ------------------------------------- END MEGA MENU -------------------------------------
                    -->

                    <!--
                        # ------------------------------------- USE CAPTION MENU -------------------------------------
                    -->
                    <p class="description description-wide">
                        <label for="edit-sidebar-item-caption-<?php echo $item_id; ?>">
                            <input type="checkbox" id="edit-sidebar-item-caption-<?php echo $item_id; ?>" value="_megaCaption" name="menu-item-megaCaption[<?php echo $item_id; ?>]" <?php checked($item->megaCaption, '_megaCaption') ?> />
                            <?php _e('Use as caption Menu', THEME_DOMAIN); ?>
                        </label>
                    </p>
                    <!--
                        # ------------------------------------- END CAPTION MENU -------------------------------------
                    -->

                    <!-- 
                        # ------------------------------------- MEGA OPTIONS ------------------------------------- 
                    -->
                    <p class="description description-wide show-if-mega-menu-type">
                        <!-- Normal -->
                        <label for="edit-menu-item-megaDef-<?php echo $item_id; ?>">
                            <input type="radio" id="edit-menu-item-megaDef-<?php echo $item_id; ?>" value="_megaDef" name="menu-item-megaType[<?php echo $item_id; ?>]" <?php echo (empty($item->megaType)) ? "checked='checked'" : checked($item->megaType, '_megaDef'); ?> />
                            <?php _e('Default', THEME_DOMAIN); ?>
                        </label>
                        &nbsp;
                        <!-- Break a new column -->
                        <label for="edit-menu-item-megaCol-<?php echo $item_id; ?>">
                            <input type="radio" id="edit-menu-item-megaCol-<?php echo $item_id; ?>" value="_megaCol" name="menu-item-megaType[<?php echo $item_id; ?>]" <?php checked($item->megaType, '_megaCol') ?> />
                            <?php _e('Break a Column', THEME_DOMAIN); ?>
                        </label>
                        &nbsp;
                        <!-- Divider -->
                        <label for="edit-menu-item-megaDivider-<?php echo $item_id; ?>">
                            <input type="radio" id="edit-menu-item-megaDivider-<?php echo $item_id; ?>" value="_megaDivider" name="menu-item-megaType[<?php echo $item_id; ?>]" <?php checked($item->megaType, '_megaDivider') ?> />
                            <?php _e('Divider', THEME_DOMAIN); ?>
                        </label>
                        &nbsp;
                        <!-- Image -->
                        <label for="edit-menu-item-megaImage-<?php echo $item_id; ?>">
                            <input type="radio" id="edit-menu-item-megaImage-<?php echo $item_id; ?>" value="_megaImage" name="menu-item-megaType[<?php echo $item_id; ?>]" <?php checked($item->megaType, '_megaImage') ?> />
                            <?php _e('Image', THEME_DOMAIN); ?>
                        </label>
                    </p>
                    <!-- 
                        # ------------------------------------- END MEGA OPTIONS -------------------------------------
                    -->

                    <?php
                    /**
                     * Fires just before the move buttons of a nav menu item in the menu editor.
                     *
                     * @since 5.4.0
                     *
                     * @param int      $item_id Menu item ID.
                     * @param WP_Post  $item    Menu item data object.
                     * @param int      $depth   Depth of menu item. Used for padding.
                     * @param stdClass $args    An object of menu item arguments.
                     * @param int      $id      Nav menu ID.
                     */
                    do_action('wp_nav_menu_item_custom_fields', $item_id, $item, $depth, $args, $id);
                    ?>

                    <fieldset class="field-move hide-if-no-js description description-wide">
                        <span class="field-move-visual-label" aria-hidden="true"><?php _e('Move'); ?></span>
                        <button type="button" class="button-link menus-move menus-move-up" data-dir="up"><?php _e('Up one'); ?></button>
                        <button type="button" class="button-link menus-move menus-move-down" data-dir="down"><?php _e('Down one'); ?></button>
                        <button type="button" class="button-link menus-move menus-move-left" data-dir="left"></button>
                        <button type="button" class="button-link menus-move menus-move-right" data-dir="right"></button>
                        <button type="button" class="button-link menus-move menus-move-top" data-dir="top"><?php _e('To the top'); ?></button>
                    </fieldset>

                    <div class="menu-item-actions description-wide submitbox">
                        <?php if ('custom' !== $item->type && false !== $original_title) : ?>
                            <p class="link-to-original">
                                <?php
                                /* translators: %s: Link to menu item's original object. */
                                printf(__('Original: %s'), '<a href="' . esc_attr($item->url) . '">' . esc_html($original_title) . '</a>');
                                ?>
                            </p>
                        <?php endif; ?>

                        <?php
                        printf(
                            '<a class="item-delete submitdelete deletion" id="delete-%s" href="%s">%s</a>',
                            $item_id,
                            wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action'    => 'delete-menu-item',
                                        'menu-item' => $item_id,
                                    ),
                                    admin_url('nav-menus.php')
                                ),
                                'delete-menu_item_' . $item_id
                            ),
                            __('Remove')
                        );
                        ?>
                        <span class="meta-sep hide-if-no-js"> | </span>
                        <?php
                        printf(
                            '<a class="item-cancel submitcancel hide-if-no-js" id="cancel-%s" href="%s#menu-item-settings-%s">%s</a>',
                            $item_id,
                            esc_url(
                                add_query_arg(
                                    array(
                                        'edit-menu-item' => $item_id,
                                        'cancel'         => time(),
                                    ),
                                    admin_url('nav-menus.php')
                                )
                            ),
                            $item_id,
                            __('Cancel')
                        );
                        ?>
                    </div>

                    <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
                    <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->object_id); ?>" />
                    <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->object); ?>" />
                    <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->menu_item_parent); ?>" />
                    <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->menu_order); ?>" />
                    <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->type); ?>" />
                </div><!-- .menu-item-settings-->
                <ul class="menu-item-transport"></ul>
            <?php
            $output .= ob_get_clean();
        }
    }
}

/**
 * Create modal for admin page
 */

global $pagenow;

if ($pagenow == 'nav-menus.php') {
    /**
     * wp_footer
     */

    if (!function_exists('admin_menu_icons_modal')) {
        function admin_menu_icons_modal()
        {
            ?>
                <div class="admin-menu-icons-modal" data-item="" data-class="">
                    <div class="media-modal" style="z-index: 100003">
                        <button class="media-modal-close"> </button>
                        <div class="media-modal-inner">
                            <div class="media-frame-title">
                                <h1>Select icons</h1>
                            </div>
                            <div class="media-frame-content">
                                <div class="option-modal-icons">
                                    <div class="admin-label">
                                        <label>Select Icon</label>
                                    </div>
                                    <div class="admin-icon-selector">
                                    </div>
                                </div>
                            </div>
                            <div class="media-frame-toolbar">
                                <div class="media-toolbar">
                                    <div class="media-toolbar-primary search-form">
                                        <button type="button" id="admin-save-icon" class="button media-button button-primary button-large">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media-modal-backdrop" style="z-index: 100002"></div>
                </div>
    <?php
        }
        add_action('admin_footer', 'admin_menu_icons_modal');
    }
}
