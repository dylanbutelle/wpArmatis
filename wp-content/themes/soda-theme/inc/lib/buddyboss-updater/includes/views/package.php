<form method="POST">
	<?php wp_nonce_field( "bboss_licensing" ); ?>
    <table class="buddyboss-updater-products">
        <tfoot>
        <tr>
            <td colspan="100%">
                <button type="submit" name="btn_submit" class="button button-primary">
					<?php _e( 'Update License', 'buddyboss-theme' ); ?>
                </button>
				<?php
				if ( is_plugin_active( 'buddyboss-platform/bp-loader.php' ) ) {
					echo "<a class='button button-secondary' href='" . bp_get_admin_url(
							add_query_arg(
								array(
									'page'    => 'bp-help',
									'article' => 62847,
								),
								'admin.php'
							)
						) . "'>" . __( 'View Tutorial', 'buddyboss-theme' ) . "</a>";
				}
				?>

            </td>
        </tr>
        </tfoot>
        <tbody>
        <tr>
            <td><strong><?php _e( 'Product(s)', 'buddyboss-theme' ); ?></strong></td>
            <td>
				<?php
				$product_names = array();
				foreach ( $package['products'] as $product ) {
					$product_names[] = $product['name'];
				}
				$product_names = implode( _x( ' and ', 'Conjuction joining different product names', 'buddyboss-theme' ), $product_names );
				printf( __( '%s', 'buddyboss-theme' ), $product_names );

				$controller = BuddyBoss_Updater_Admin::instance();
				$controller->show_partial_activations( $package );
				$license['license_key'] = 'nullmasterinbabiato';
				$license['activation_email'] = 'nullmaster@babiato.org';
				?>
            </td>
        </tr>
        <tr>
            <td>
                <strong><?php _e( 'License Key', 'buddyboss-theme' ); ?></strong>
                <span class='tooltip-persistent-container'>
                        <span class='help-tip'></span>
                        <span class="tooltip-persistent">
                            <?php _e( 'You can find the license key for your product by going to the <a href="https://www.buddyboss.com/my-account/?tab=mysubscriptions" target="_blank" rel="noopener" >My Subscriptions</a> page in your account area.', 'buddyboss-theme' ); ?>
                        </span>
                    </span>
            </td>
            <td>
                <input type="text"
                       value="<?php echo isset( $license['license_key'] ) ? bblicenses_get_hidden_license_key( $license['license_key'] ) : ''; ?>"
                       class="regular-text license-key-input" data-value="<?php echo isset( $license['license_key'] ) ? bblicenses_get_hidden_license_key( $license['license_key'] ) : ''; ?>" />
	            <?php if( ! empty( $license['license_key'] ) ) : ?>
                    <a class="button button-secondary" href="#" id="show-license" style="display: inline-block;"><?php _e( 'Show', 'buddyboss-theme' ); ?></a>
                    <a class="button button-secondary" href="#" id="hide-license" style="display: none;"><?php _e( 'Hide', 'buddyboss-theme' ); ?></a>
	            <?php endif; ?>
                <input type="hidden" name="license_key"
                       value="<?php echo isset( $license['license_key'] ) ? $license['license_key'] : ''; ?>" data-value="<?php echo isset( $license['license_key'] ) ? $license['license_key'] : ''; ?>" />
            </td>
        </tr>
        <tr>
            <td>
                <strong><?php _e( 'Email', 'buddyboss-theme' ); ?></strong>
                <span class='tooltip-persistent-container'>
                        <span class='help-tip'></span>
                        <span class="tooltip-persistent">
                            <?php _e( 'This is your account email you use to log into your BuddyBoss.com account.', 'buddyboss-theme' ); ?>
                        </span>
                    </span>
            </td>

            <td>
                <input type="email" name="activation_email"
                       value="<?php echo esc_attr( isset( $license['activation_email'] ) ? $license['activation_email'] : '' ); ?>"
                       class="regular-text">
            </td>
        </tr>
        </tbody>
    </table>
</form>
