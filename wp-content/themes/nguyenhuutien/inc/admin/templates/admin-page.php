<h1>Theme Options</h1>
<?php settings_errors(); ?>
<?php require_once('static-nav.php'); ?>

<form method="post" action="options.php" class="">
    <?php settings_fields('search-settings-group'); ?>
    <?php do_settings_sections('admin_menu'); ?>
    <?php submit_button(); ?>
</form>