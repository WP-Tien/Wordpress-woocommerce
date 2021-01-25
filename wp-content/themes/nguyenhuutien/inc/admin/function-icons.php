<?php

/**
 * Get icons fontawesome data via yml file.
 * 
 * @author TienNguyen
 * @version 1.0.0
 */

if (!function_exists('get_data_icons')) {
    function get_data_icons()
    {
        $file_yml = get_template_directory() . '/assets/src/fontawesome/metadata/icons.yml';
        if (file_exists($file_yml)) {
            return yaml_parse_file($file_yml);
        }
        return null;
    }
}
