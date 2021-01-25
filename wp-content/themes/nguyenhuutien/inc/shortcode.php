<?php

/**
 * Contact Form Shortcode
 * 
 * [contact_form]
 */
function custom_contact_form($atts, $content = null)
{
    // get the attributes
    $atts = shortcode_atts(
        [],
        $atts,
        'contact_form'
    );

    // return HTML 
    // return 'This is the contact form generated HTML';
    ob_start();

    include_once 'templates/contact-form.php';

    return ob_get_clean();
}

add_shortcode('contact_form', 'custom_contact_form');
