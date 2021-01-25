<?php

/**
 * Widgets theme
 * 
 * @package TienNguyen
 * @version 1.0.0
 */

if (!function_exists('set_widget_classes')) {
    /**
     * Add class for widgets
     */
    function set_widget_classes($params)
    {
        global $sidebars_widgets;

        $sidebars_widgets_count = apply_filters('sidebars_widgets', $sidebars_widgets);

        if (isset($params[0]['id']) && strpos($params[0]['before_widget'], 'dynamic-classes')) {
            $sidebar_id   = $params[0]['id'];
            $widget_count = count($sidebars_widgets_count[$sidebar_id]);

            $widget_classes = "widget-footer";
            $widget_classes .= ' widget-footer__count-' . $widget_count;

            if (5 === $widget_count) {
                $widget_classes .= ' col col-wide-2-12 col-large-3 col-medium-3 col-supersmall-4 col-tiny-12';
            } elseif (4 === $widget_count) {
                $widget_classes .= ' col col-wide-3';
            } elseif (3 === $widget_count) {
                $widget_classes .= ' col col-wide-4';
            } elseif (2 === $widget_count) {
                $widget_classes .= ' col col-wide-6';
            } elseif (1 === $widget_count) {
                $widget_classes .= ' col col-wide-12';
            }

            $params[0]['before_widget'] = str_replace('dynamic-classes', $widget_classes, $params[0]['before_widget']);
        }

        return $params;
    }
}
