<?php

/**
 * Header file
 * 
 * @package TienNguyen
 * @version 1.0.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo("charset") ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    wp_body_open();
    ?>
    <div class="wrap">
        <?php
        /**
         * @ tpl_header - 5
         * @ tpl_category_tablet -  10
         * @ tpl_lift_nav - 15
         */
        do_action('tpl_header');
        ?>

        <main class="main ">
            <div class="container">