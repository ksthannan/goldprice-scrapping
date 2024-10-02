<?php
/**
 * class Metalprice_Data
 */
if ( ! class_exists( 'Metalprice_Data' ) ) {
	class Metalprice_Data {
		public function __construct() {
			add_shortcode( 'goldprice_info_ae', array( $this, 'goldprice_info_ae' ) );
			add_shortcode( 'goldprice_info_sa', array( $this, 'goldprice_info_sa' ) );
			add_shortcode( 'goldprice_live_info_ae', array( $this, 'goldprice_live_info_ae' ) );
			add_shortcode( 'goldprice_live_info_sa', array( $this, 'goldprice_live_info_sa' ) );
		}

		/**
		 * Function goldprice_info_ae
		 */
		public function goldprice_info_ae( $atts, $content = '' ) {
			ob_start();

            $options = get_option( 'goldprice_settings' );
           
			 if(isset( $options['custom_entry_ae'] ) && $options['custom_entry_ae'] == '1'):
             ?>
                <div class="gold_price_tables price_ae">
                    <!--
                    <div class="live-gold-card-main">
                        <div class="live-gold-card-header">
                            <h2>
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['price_head_title_ae']) ? $options['price_head_title_ae'] : 'Gold price now live in UAE';?></font></font>
                            </h2>
                        </div>
                        <div class="live-gold-card-container">
                            <div class="live-gold-card">
                                <p>
                                    <strong>
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Price per ounce', 'metalprice-info');?></font></font>
                                    </strong>
                                </p>
                                <span class="price-large" id="price_ounce"><?php echo isset($options['ounce_price_ae']) ? $options['ounce_price_ae'] : '9,693.34';?></span>
                                <span class="currency">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['currency_ae']) ? $options['currency_ae'] : 'UAE Dirham';?></font></font>
                                </span>
                                <div class="price-change <?php echo isset($options['ounce_change_state_ae']) ? $options['ounce_change_state_ae'] : '';?>" id="change_ounce">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 
                                    <?php echo isset($options['ounce_change_state_ae']) && $options['ounce_change_state_ae'] == 'change-down' ? '▼' : '▲';?>    
                                    <?php echo isset($options['ounce_change_info_ae']) ? $options['ounce_change_info_ae'] : 'AED 2.09 (0.76%)';?> </font></font>
                                </div>
                            </div>
                            <div class="live-gold-card">
                                <p>
                                    <strong>
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Price of 21 karat gold per gram', 'metalprice-info');?></font></font>
                                    </strong>
                                </p>
                                <span class="price-large" id="price_21k"><?php echo isset($options['price_21k_ae']) ? $options['price_21k_ae'] : '272.69';?></span>
                                <span class="currency">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['currency_ae']) ? $options['currency_ae'] : 'UAE Dirham';?></font></font>
                                </span>
                                <div class="price-change <?php echo isset($options['21k_change_state_ae']) ? $options['21k_change_state_ae'] : '';?>" id="change_21k">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 
                                    <?php echo isset($options['21k_change_state_ae']) && $options['21k_change_state_ae'] == 'change-down' ? '▼' : '▲';?> 
                                    <?php echo isset($options['21k_change_state_ae']) ? $options['21k_change_info_ae'] : 'AED 2.09 (0.76%)';?> </font></font>
                                </div>
                            </div>
                        </div>
                    </div>
             -->
                    
                    <div class="table_price_head">
                        <h1 class="wp-block-heading has-text-align-center">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['price_title_ae']) ? $options['price_title_ae'] : 'Gold price in the Emirates today';?>, <?php
echo date('l, F j, Y');
?></font></font>
                        </h1>
                    </div>
                    <table class="gold-buy-sell-table">
                        <thead>
                            <tr>
                                <th>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Unity', 'metalprice-info');?></font></font>
                                </th>
                                <th>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('selling price', 'metalprice-info');?></font></font>
                                </th>
                                <th>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Purchase price', 'metalprice-info');?></font></font>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            $trc = isset($options['row_count_ae']) && ! empty($options['row_count_ae']) ? $options['row_count_ae'] : 13;
                            while ($i<$trc){
                                ?>
                            <tr>
                                <td>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['ae_unitytr'.$i]) ? $options['ae_unitytr'.$i] : '24 karat gold price per gram';?></font></font>
                                </td>
                                <td>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['ae_selling_pricetr'.$i]) ? $options['ae_selling_pricetr'.$i] : '311.65 AED';?></font></font>
                                </td>
                                <td>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['ae_purchase_pricetr'.$i]) ? $options['ae_purchase_pricetr'.$i] : '322.56 AED';?></font></font>
                                </td>
                            </tr>
                            <?php 
                            $i++;
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>

                <?php else:
                    
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
                    <!--
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
                    -->
					
					<div class="table_price_head">
						<?php echo $table_head; ?>
					</div> 
					<?php echo $table; ?>

				</div>
                <?php endif;?>
				<?php

				$content = ob_get_clean();
				return $content;
		}

		/**
		 * Function goldprice_info_sa
		 */
		public function goldprice_info_sa( $atts, $content = '' ) {
			ob_start();

            $options = get_option( 'goldprice_settings' );
           
			 if(isset( $options['custom_entry_sa'] ) && $options['custom_entry_sa'] == '1'):?>
                <div class="gold_price_tables price_sa">
                    <!--
                    <div class="live-gold-card-main">
                        <div class="live-gold-card-header">
                            <h2>
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['price_head_title_sa']) ? $options['price_head_title_sa'] : 'Gold price now live in UAE';?></font></font>
                            </h2>
                        </div>
                        <div class="live-gold-card-container">
                            <div class="live-gold-card">
                                <p>
                                    <strong>
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Price per ounce', 'metalprice-info');?></font></font>
                                    </strong>
                                </p>
                                <span class="price-large" id="price_ounce"><?php echo isset($options['ounce_price_sa']) ? $options['ounce_price_sa'] : '9,693.34';?></span>
                                <span class="currency">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['currency_sa']) ? $options['currency_sa'] : 'UAE Dirham';?></font></font>
                                </span>
                                <div class="price-change <?php echo isset($options['ounce_change_state_sa']) ? $options['ounce_change_state_sa'] : '';?>" id="change_ounce">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 
                                    <?php echo isset($options['ounce_change_state_sa']) && $options['ounce_change_state_sa'] == 'change-down' ? '▼' : '▲';?>    
                                    <?php echo isset($options['ounce_change_info_sa']) ? $options['ounce_change_info_sa'] : 'AED 2.09 (0.76%)';?> </font></font>
                                </div>
                            </div>
                            <div class="live-gold-card">
                                <p>
                                    <strong>
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Price of 21 karat gold per gram', 'metalprice-info');?></font></font>
                                    </strong>
                                </p>
                                <span class="price-large" id="price_21k"><?php echo isset($options['price_21k_sa']) ? $options['price_21k_sa'] : '272.69';?></span>
                                <span class="currency">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['currency_sa']) ? $options['currency_sa'] : 'UAE Dirham';?></font></font>
                                </span>
                                <div class="price-change <?php echo isset($options['21k_change_state_sa']) ? $options['21k_change_state_sa'] : '';?>" id="change_21k">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 
                                    <?php echo isset($options['21k_change_state_sa']) && $options['21k_change_state_sa'] == 'change-down' ? '▼' : '▲';?>     
                                    <?php echo isset($options['21k_change_info_sa']) ? $options['21k_change_info_sa'] : 'AED 2.09 (0.76%)';?> </font></font>
                                </div>
                            </div>
                        </div>
                    </div>
             -->
                    <div class="table_price_head">
                        <h1 class="wp-block-heading has-text-align-center">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['price_title_sa']) ? $options['price_title_sa'] : 'Gold price in the Emirates today';?>, <?php
echo date('l, F j, Y');
?></font></font>
                        </h1>
                    </div>
                    <table class="gold-buy-sell-table">
                        <thead>
                            <tr>
                                <th>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Unity', 'metalprice-info');?></font></font>
                                </th>
                                <th>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('selling price', 'metalprice-info');?></font></font>
                                </th>
                                <th>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Purchase price', 'metalprice-info');?></font></font>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            $trc = isset($options['row_count_sa']) && ! empty($options['row_count_sa']) ? $options['row_count_sa'] : 13;
                            while ($i<$trc){
                                ?>
                            <tr>
                                <td>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['sa_unitytr'.$i]) ? $options['sa_unitytr'.$i] : '24 karat gold price per gram';?></font></font>
                                </td>
                                <td>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['sa_selling_pricetr'.$i]) ? $options['sa_selling_pricetr'.$i] : '311.65 AED';?></font></font>
                                </td>
                                <td>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['sa_purchase_pricetr'.$i]) ? $options['sa_purchase_pricetr'.$i] : '322.56 AED';?></font></font>
                                </td>
                            </tr>
                            <?php 
                            $i++;
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>

                <?php else:

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
				<!--
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
        -->
					
					<div class="table_price_head">
						<?php echo $table_head; ?>
					</div> 
					<?php echo $table; ?>

				</div>
				<?php
                endif;

				$content = ob_get_clean();
				return $content;
		}

        
		/**
		 * Function goldprice_live_info_ae
		 */
		public function goldprice_live_info_ae( $atts, $content = '' ) {
			ob_start();

            $options = get_option( 'goldprice_settings' );
           
			 if(isset( $options['custom_entry_ae'] ) && $options['custom_entry_ae'] == '1'):
             ?>
                <div class="gold_price_tables price_ae">
                    <div class="live-gold-card-main">
                        <div class="live-gold-card-header">
                            <h2>
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['price_head_title_ae']) ? $options['price_head_title_ae'] : 'Gold price now live in UAE';?></font></font>
                            </h2>
                        </div>
                        <div class="live-gold-card-container">
                            <div class="live-gold-card">
                                <p>
                                    <strong>
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Price per ounce', 'metalprice-info');?></font></font>
                                    </strong>
                                </p>
                                <span class="price-large" id="price_ounce"><?php echo isset($options['ounce_price_ae']) ? $options['ounce_price_ae'] : '9,693.34';?></span>
                                <span class="currency">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['currency_ae']) ? $options['currency_ae'] : 'UAE Dirham';?></font></font>
                                </span>
                                <div class="price-change <?php echo isset($options['ounce_change_state_ae']) ? $options['ounce_change_state_ae'] : '';?>" id="change_ounce">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 
                                    <?php echo isset($options['ounce_change_state_ae']) && $options['ounce_change_state_ae'] == 'change-down' ? '▼' : '▲';?>    
                                    <?php echo isset($options['ounce_change_info_ae']) ? $options['ounce_change_info_ae'] : 'AED 2.09 (0.76%)';?> </font></font>
                                </div>
                            </div>
                            <div class="live-gold-card">
                                <p>
                                    <strong>
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Price of 21 karat gold per gram', 'metalprice-info');?></font></font>
                                    </strong>
                                </p>
                                <span class="price-large" id="price_21k"><?php echo isset($options['price_21k_ae']) ? $options['price_21k_ae'] : '272.69';?></span>
                                <span class="currency">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['currency_ae']) ? $options['currency_ae'] : 'UAE Dirham';?></font></font>
                                </span>
                                <div class="price-change <?php echo isset($options['21k_change_state_ae']) ? $options['21k_change_state_ae'] : '';?>" id="change_21k">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 
                                    <?php echo isset($options['21k_change_state_ae']) && $options['21k_change_state_ae'] == 'change-down' ? '▼' : '▲';?> 
                                    <?php echo isset($options['21k_change_state_ae']) ? $options['21k_change_info_ae'] : 'AED 2.09 (0.76%)';?> </font></font>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="table_price_head">
                        <h1 class="wp-block-heading has-text-align-center">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['price_title_ae']) ? $options['price_title_ae'] : 'Gold price in the Emirates today';?>, <?php
echo date('l, F j, Y');
?></font></font>
                        </h1>
                    </div>
                    <table class="gold-buy-sell-table">
                        <thead>
                            <tr>
                                <th>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Unity', 'metalprice-info');?></font></font>
                                </th>
                                <th>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('selling price', 'metalprice-info');?></font></font>
                                </th>
                                <th>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Purchase price', 'metalprice-info');?></font></font>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            $trc = isset($options['row_count_ae']) && ! empty($options['row_count_ae']) ? $options['row_count_ae'] : 13;
                            while ($i<$trc){
                                ?>
                            <tr>
                                <td>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['ae_unitytr'.$i]) ? $options['ae_unitytr'.$i] : '24 karat gold price per gram';?></font></font>
                                </td>
                                <td>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['ae_selling_pricetr'.$i]) ? $options['ae_selling_pricetr'.$i] : '311.65 AED';?></font></font>
                                </td>
                                <td>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['ae_purchase_pricetr'.$i]) ? $options['ae_purchase_pricetr'.$i] : '322.56 AED';?></font></font>
                                </td>
                            </tr>
                            <?php 
                            $i++;
                            }
                            ?>
                            
                        </tbody>
                    </table>
                        -->
                </div>

                <?php else:
                    
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
					<!--
					<div class="table_price_head">
						<?php echo $table_head; ?>
					</div> 
					<?php echo $table; ?>
                    -->

				</div>
                <?php endif;?>
				<?php

				$content = ob_get_clean();
				return $content;
		}

		/**
		 * Function goldprice_live_info_sa
		 */
		public function goldprice_live_info_sa( $atts, $content = '' ) {
			ob_start();

            $options = get_option( 'goldprice_settings' );
           
			 if(isset( $options['custom_entry_sa'] ) && $options['custom_entry_sa'] == '1'):?>
                <div class="gold_price_tables price_sa">
                    <div class="live-gold-card-main">
                        <div class="live-gold-card-header">
                            <h2>
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['price_head_title_sa']) ? $options['price_head_title_sa'] : 'Gold price now live in UAE';?></font></font>
                            </h2>
                        </div>
                        <div class="live-gold-card-container">
                            <div class="live-gold-card">
                                <p>
                                    <strong>
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Price per ounce', 'metalprice-info');?></font></font>
                                    </strong>
                                </p>
                                <span class="price-large" id="price_ounce"><?php echo isset($options['ounce_price_sa']) ? $options['ounce_price_sa'] : '9,693.34';?></span>
                                <span class="currency">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['currency_sa']) ? $options['currency_sa'] : 'UAE Dirham';?></font></font>
                                </span>
                                <div class="price-change <?php echo isset($options['ounce_change_state_sa']) ? $options['ounce_change_state_sa'] : '';?>" id="change_ounce">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 
                                    <?php echo isset($options['ounce_change_state_sa']) && $options['ounce_change_state_sa'] == 'change-down' ? '▼' : '▲';?>    
                                    <?php echo isset($options['ounce_change_info_sa']) ? $options['ounce_change_info_sa'] : 'AED 2.09 (0.76%)';?> </font></font>
                                </div>
                            </div>
                            <div class="live-gold-card">
                                <p>
                                    <strong>
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Price of 21 karat gold per gram', 'metalprice-info');?></font></font>
                                    </strong>
                                </p>
                                <span class="price-large" id="price_21k"><?php echo isset($options['price_21k_sa']) ? $options['price_21k_sa'] : '272.69';?></span>
                                <span class="currency">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['currency_sa']) ? $options['currency_sa'] : 'UAE Dirham';?></font></font>
                                </span>
                                <div class="price-change <?php echo isset($options['21k_change_state_sa']) ? $options['21k_change_state_sa'] : '';?>" id="change_21k">
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 
                                    <?php echo isset($options['21k_change_state_sa']) && $options['21k_change_state_sa'] == 'change-down' ? '▼' : '▲';?>     
                                    <?php echo isset($options['21k_change_info_sa']) ? $options['21k_change_info_sa'] : 'AED 2.09 (0.76%)';?> </font></font>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="table_price_head">
                        <h1 class="wp-block-heading has-text-align-center">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['price_title_sa']) ? $options['price_title_sa'] : 'Gold price in the Emirates today';?>, <?php
echo date('l, F j, Y');
?></font></font>
                        </h1>
                    </div>
                    <table class="gold-buy-sell-table">
                        <thead>
                            <tr>
                                <th>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Unity', 'metalprice-info');?></font></font>
                                </th>
                                <th>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('selling price', 'metalprice-info');?></font></font>
                                </th>
                                <th>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php _e('Purchase price', 'metalprice-info');?></font></font>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            $trc = isset($options['row_count_sa']) && ! empty($options['row_count_sa']) ? $options['row_count_sa'] : 13;
                            while ($i<$trc){
                                ?>
                            <tr>
                                <td>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['sa_unitytr'.$i]) ? $options['sa_unitytr'.$i] : '24 karat gold price per gram';?></font></font>
                                </td>
                                <td>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['sa_selling_pricetr'.$i]) ? $options['sa_selling_pricetr'.$i] : '311.65 AED';?></font></font>
                                </td>
                                <td>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo isset($options['sa_purchase_pricetr'.$i]) ? $options['sa_purchase_pricetr'.$i] : '322.56 AED';?></font></font>
                                </td>
                            </tr>
                            <?php 
                            $i++;
                            }
                            ?>
                            
                        </tbody>
                    </table>
                        -->
                </div>

                <?php else:

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
					
                    <!--
					<div class="table_price_head">
						<?php echo $table_head; ?>
					</div> 
					<?php echo $table; ?>
        -->

				</div>
				<?php
                endif;

				$content = ob_get_clean();
				return $content;
		}
	}

	// instantiate class Metalprice_Data
	new Metalprice_Data();
}
