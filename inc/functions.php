<?php
/**
 * class Metalprice_Data
 */
if ( ! class_exists( 'Metalprice_Data' ) ) {
	class Metalprice_Data {
		public function __construct() {
			add_shortcode( 'goldprice_info_ae', array( $this, 'goldprice_info_ae' ) );
			add_shortcode( 'goldprice_info_sa', array( $this, 'goldprice_info_sa' ) );
		}




		/**
		 * Function goldprice_info_ae
		 */
		public function goldprice_info_ae( $atts, $content = '' ) {
			ob_start();

			// Get the last run time from the database
			$last_run = get_option( 'update_data_ae_last_run' );

			// If it's the first time or 10 minutes have passed
			if ( $last_run === false || ( time() - $last_run ) > 600 ) { // 600 seconds = 10 minutes

				$ch = curl_init();
				curl_setopt( $ch, CURLOPT_URL, 'https://ae-gold.com/' );
				curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
				curl_setopt( $ch, CURLOPT_POSTFIELDS, 'request=ae-gold' );
				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
				$error = curl_error( $ch );
				if ( ! $error ) {
					$result = curl_exec( $ch );
					// Update the last run timestamp
					update_option( 'update_data_ae_last_run', time() );
					// Run your function to update the option
					update_option( 'update_data_ae', $result );
				}
			}

				$result = get_option( 'update_data_ae', true );
				// var_dump( $result );

				// Price Table
				$table_start = strpos( $result, '<table class="gold-buy-sell-table">' );
				$table_end   = strpos( $result, '</table>', $table_start ) + 8;

				$table = substr( $result, $table_start, ( $table_end - $table_start ) );

				// Price ounce
				$price_ounce_start = strpos( $result, '<span class="price-large" id="price_ounce">' );
				$price_ounce_end   = strpos( $result, '</span>', $price_ounce_start ) + 7;
				$price_ounce       = substr( $result, $price_ounce_start, ( $price_ounce_end - $price_ounce_start ) );

				// Price 21k
				$price_21k_start = strpos( $result, '<span class="price-large" id="price_21k">' );
				$price_21k_end   = strpos( $result, '</span>', $price_21k_start ) + 7;
				$price_21k       = substr( $result, $price_21k_start, ( $price_21k_end - $price_21k_start ) );

				// Currency
				$currency_start = strpos( $result, '<span class="currency">' );
				$currency_end   = strpos( $result, '</span>', $currency_start ) + 7;
				$currency       = substr( $result, $currency_start, ( $currency_end - $currency_start ) );

				// change_ounce
				$change_ounce_start = strpos( $result, '<div class="price-change change-down" id="change_ounce">' ) == false ? strpos( $result, '<div class="price-change change-up" id="change_ounce">' ) : strpos( $result, '<div class="price-change change-down" id="change_ounce">' );
				$change_ounce_end   = strpos( $result, '</div>', $change_ounce_start ) + 6;
				$change_ounce       = substr( $result, $change_ounce_start, ( $change_ounce_end - $change_ounce_start ) );

				// change_21k
				$change_21k_start = strpos( $result, '<div class="price-change change-down" id="change_21k">' ) == false ? strpos( $result, '<div class="price-change change-up" id="change_21k">' ) : strpos( $result, '<div class="price-change change-down" id="change_21k">' );

				$change_21k_end = strpos( $result, '</div>', $change_21k_start ) + 6;
				$change_21k     = substr( $result, $change_21k_start, ( $change_21k_end - $change_21k_start ) );

				// card header
				$card_header_start = strpos( $result, '<div class="live-gold-card-header">' );
				$card_header_end   = strpos( $result, '</div>', $card_header_start ) + 6;
				$card_header       = substr( $result, $card_header_start, ( $card_header_end - $card_header_start ) );

				// Table header
				$table_start = strpos( $result, '<h1 class="wp-block-heading has-text-align-center">' );
				$table_end   = strpos( $result, '</h1>', $table_start ) + 5;
				$table_head  = substr( $result, $table_start, ( $table_end - $table_start ) );

			?>
				<div class="gold_price_tables price_ae">
				
					<div class="live-gold-card-main">
						<?php echo $card_header; ?>
						<div class="live-gold-card-container">
							<div class="live-gold-card">
								<p><strong><?php _e( 'سعر الأونصة' ); ?></strong></p>
								<?php echo $price_ounce; ?>
								<?php echo $currency; ?>
								<?php echo $change_ounce; ?>
							</div>
							<div class="live-gold-card">
								<p><strong><?php _e( 'سعر جرام الذهب عيار 21', 'metalprice-info' ); ?></strong></p>
								<?php echo $price_21k; ?>
								<?php echo $currency; ?>
								<?php echo $change_21k; ?>
							</div>
						</div>
					</div>
					
					<div class="table_price_head">
						<?php echo $table_head; ?>
					</div> 
					<?php echo $table; ?>

				</div>
				<?php

				$content = ob_get_clean();
				return $content;
		}

		/**
		 * Function goldprice_info_sa
		 */
		public function goldprice_info_sa( $atts, $content = '' ) {
			ob_start();

			// Get the last run time from the database
			$last_run = get_option( 'update_data_sa_last_run' );

			// If it's the first time or 10 minutes have passed
			if ( $last_run === false || ( time() - $last_run ) > 600 ) { // 600 seconds = 10 minutes

				$ch = curl_init();
				curl_setopt( $ch, CURLOPT_URL, 'https://sa-goldprice.com/' );
				curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
				curl_setopt( $ch, CURLOPT_POSTFIELDS, 'request=sa-goldprice' );
				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
				$error = curl_error( $ch );
				if ( ! $error ) {
					$result = curl_exec( $ch );
					// Update the last run timestamp
					update_option( 'update_data_sa_last_run', time() );
					// Run your function to update the option
					update_option( 'update_data_sa', $result );
				}
			}

			$result = get_option( 'update_data_sa', true );
				// var_dump( $result );

				// Price Table
				$table_start = strpos( $result, '<table class="gold-buy-sell-table">' );
				$table_end   = strpos( $result, '</table>', $table_start ) + 8;
				$table       = substr( $result, $table_start, ( $table_end - $table_start ) );

				// Price ounce
				$price_ounce_start = strpos( $result, '<span class="price-large" id="price_ounce">' );
				$price_ounce_end   = strpos( $result, '</span>', $price_ounce_start ) + 7;
				$price_ounce       = substr( $result, $price_ounce_start, ( $price_ounce_end - $price_ounce_start ) );

				// Price 21k
				$price_21k_start = strpos( $result, '<span class="price-large" id="price_21k">' );
				$price_21k_end   = strpos( $result, '</span>', $price_21k_start ) + 7;
				$price_21k       = substr( $result, $price_21k_start, ( $price_21k_end - $price_21k_start ) );

				// Currency
				$currency_start = strpos( $result, '<span class="currency">' );
				$currency_end   = strpos( $result, '</span>', $currency_start ) + 7;
				$currency       = substr( $result, $currency_start, ( $currency_end - $currency_start ) );

				// change_ounce
				$change_ounce_start = strpos( $result, '<div class="price-change change-down" id="change_ounce">' ) == false ? strpos( $result, '<div class="price-change change-up" id="change_ounce">' ) : strpos( $result, '<div class="price-change change-down" id="change_ounce">' );
				$change_ounce_end   = strpos( $result, '</div>', $change_ounce_start ) + 6;
				$change_ounce       = substr( $result, $change_ounce_start, ( $change_ounce_end - $change_ounce_start ) );

				// change_21k
				$change_21k_start = strpos( $result, '<div class="price-change change-down" id="change_21k">' ) == false ? strpos( $result, '<div class="price-change change-up" id="change_21k">' ) : strpos( $result, '<div class="price-change change-down" id="change_21k">' );

				$change_21k_end = strpos( $result, '</div>', $change_21k_start ) + 6;
				$change_21k     = substr( $result, $change_21k_start, ( $change_21k_end - $change_21k_start ) );

				// card header
				$card_header_start = strpos( $result, '<div class="live-gold-card-header">' );
				$card_header_end   = strpos( $result, '</div>', $card_header_start ) + 6;
				$card_header       = substr( $result, $card_header_start, ( $card_header_end - $card_header_start ) );

				// Table header
				$table_start = strpos( $result, '<h2 class="wp-block-heading has-text-align-center">' );
				$table_end   = strpos( $result, '</h2>', $table_start ) + 5;
				$table_head  = substr( $result, $table_start, ( $table_end - $table_start ) );

			?>
				<div class="gold_price_tables price_sa">
				
					<div class="live-gold-card-main">
						<?php echo $card_header; ?>
						<div class="live-gold-card-container">
							<div class="live-gold-card">
								<p><strong><?php _e( 'سعر الأونصة' ); ?></strong></p>
								<?php echo $price_ounce; ?>
								<?php echo $currency; ?>
								<?php echo $change_ounce; ?>
							</div>
							<div class="live-gold-card">
								<p><strong><?php _e( 'سعر جرام الذهب عيار 21', 'metalprice-info' ); ?></strong></p>
								<?php echo $price_21k; ?>
								<?php echo $currency; ?>
								<?php echo $change_21k; ?>
							</div>
						</div>
					</div>
					
					<div class="table_price_head">
						<?php echo $table_head; ?>
					</div> 
					<?php echo $table; ?>

				</div>
				<?php

				$content = ob_get_clean();
				return $content;
		}
	}

	// instantiate class Metalprice_Data
	new Metalprice_Data();
}
