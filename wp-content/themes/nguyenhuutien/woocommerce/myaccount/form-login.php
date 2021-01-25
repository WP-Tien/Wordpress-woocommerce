<?php

/**
 * Login Form
 *
 * @package WooCommerce\Templates
 * 
 * @author TienNguyen - customizer
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

customizer_woocommerce_breadcrumb();

do_action('woocommerce_before_customer_login_form');

?>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

	<div class="row" id="customer_login">

		<div class="col col-wide-6 col-tiny-12">

		<?php endif; ?>

		<h2 class="m-t-10"><?php esc_html_e('Đăng nhập', THEME_DOMAIN); ?></h2>

		<form class="woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action('woocommerce_login_form_start'); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username"><?php esc_html_e('Tên tài khoản/ Địa chỉ email', THEME_DOMAIN); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																															?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password"><?php esc_html_e('Mật khẩu', THEME_DOMAIN); ?>&nbsp;<span class="required">*</span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
			</p>

			<?php do_action('woocommerce_login_form'); ?>

			<p class="form-row">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Ghi nhớ tài khoản', THEME_DOMAIN); ?></span>
				</label>
				<div style="align-items: flex-end; display: flex; flex-direction: row;">
					<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
					<button type="submit" class="btn btn--primary btn--small" name="login" value="<?php esc_attr_e('Đăng nhập', THEME_DOMAIN); ?>"><?php esc_html_e('Đăng nhập', THEME_DOMAIN); ?></button>
					<p class="m-l-15 woocommerce-LostPassword lost_password">
						<a style="font-size: 1.4rem; color: #333333;" href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Quên mật khẩu?', THEME_DOMAIN); ?></a>
					</p>
				</div>
			</p>

			<?php do_action('woocommerce_login_form_end'); ?>

		</form>

		<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

		</div>

		<div class="col col-wide-6 col-tiny-12">

			<h2 class="m-t-10"><?php esc_html_e('Đăng ký', THEME_DOMAIN); ?></h2>

			<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

				<?php do_action('woocommerce_register_form_start'); ?>

				<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_username"><?php esc_html_e('Tài khoản', THEME_DOMAIN); ?>&nbsp;<span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																		?>
					</p>

				<?php endif; ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_email"><?php esc_html_e('Địa chỉ Email', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
					<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																														?>
				</p>

				<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_password"><?php esc_html_e('Mật khẩu', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
					</p>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_password"><?php esc_html_e('Xác nhận mật khẩu', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="passwordConfirmation" id="reg_passwordConfirmation" />
					</p>

				<?php else : ?>
					<p><?php esc_html_e('Mật khẩu sẽ được gửi qua địa chỉ email của bạn.', THEME_DOMAIN); ?></p>
				<?php endif; ?>

				<?php do_action('woocommerce_register_form'); ?>

				<p class="woocommerce-form-row form-row">
					<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
					<button type="submit" class="btn btn--primary btn--small btn--outline-primary" name="register" value="<?php esc_attr_e('Đăng ký', THEME_DOMAIN); ?>"><?php esc_html_e('Đăng ký', THEME_DOMAIN); ?></button>
				</p>

				<?php do_action('woocommerce_register_form_end'); ?>

			</form>
		</div>
	</div>
<?php endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>