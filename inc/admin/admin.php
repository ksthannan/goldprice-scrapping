<?php
add_action( 'admin_menu', 'goldprice_admin_menu' );
function goldprice_admin_menu() {
	$parent_slug = 'options-general.php';
	$capability  = 'manage_options';
	add_menu_page( __( 'Gold Price Settings', 'metalprice-info' ), esc_html( 'Gold Price Settings', 'metalprice-info' ), $capability, 'gold-price-settings', 'goldprice_plugin_settings' );
}

function goldprice_plugin_settings() {
	?>
<div class="documentations">
	<div class="doc_content">
		<p>Gold price will display by this shortcode <code> [goldprice_info_ae] </code> and <code>[goldprice_info_sa]</code></p>
	</div>
</div>

<form method="POST" action="options.php" name="goldprice_ae" class="goldprice_form">
	<?php
	settings_fields( 'goldprice_plugin_opt' );
	do_settings_sections( 'goldprice_plugin_opt' );

	submit_button();
	?>
</form>



	<?php
}

/***  */
add_action( 'admin_init', 'goldprice_settings_init' );
function goldprice_settings_init() {
	register_setting( 'goldprice_plugin_opt', 'goldprice_settings' );

	add_settings_section(
		'goldprice_plugin_opt_section',
		__( 'Gold Price Settings', 'metalprice-info' ),
		'goldprice_settings_section_callback',
		'goldprice_plugin_opt'
	);

	add_settings_field(
		'goldprice_info_option',
		__( 'Gold Price', 'metalprice-info' ),
		'goldprice_info_option_render',
		'goldprice_plugin_opt',
		'goldprice_plugin_opt_section'
	);
}

function goldprice_settings_section_callback() {
	return;
}

function goldprice_info_option_render() {
	$options = get_option( 'goldprice_settings' );
	?>
<h2 style="margin-bottom:5px;" class="price_table"><?php _e('Gold Price table AE', 'metalprice-info');?></h2>
<label for="custom_entry_ae">
    <p><?php _e('Activate custom entry', 'metalprice-info');?></p>
    <input type="checkbox" name="goldprice_settings[custom_entry_ae]" id="custom_entry_ae" value="1" <?php checked( isset( $options['custom_entry_ae'] ) && $options['custom_entry_ae'] == '1' ); ?>>
</label>
<label for="price_head_title_ae">
    <p><?php _e('Price head title AE', 'metalprice-info');?></p>
    <input style="margin-top:10px;" type="text" name="goldprice_settings[price_head_title_ae]" id="price_head_title_ae" class="regular-text" placeholder="Gold price now live in UAE" value="<?php echo isset($options['price_head_title_ae']) ? $options['price_head_title_ae'] : '';?>">
</label>
<label for="ounce_price_ae">
    <p><?php _e('Price per ounce', 'metalprice-info');?></p>
    <input style="margin-top:10px;" type="text" name="goldprice_settings[ounce_price_ae]" id="ounce_price_ae" class="regular-text" placeholder="e.g., AED 9,693.34" value="<?php echo isset($options['ounce_price_ae']) ? $options['ounce_price_ae'] : '';?>">
</label>
<label for="ounce_change_info_ae" style="margin-top:10px;">
    <p><?php _e('Ounce change info', 'metalprice-info');?></p>
    <input style="margin-top:10px;" type="text" name="goldprice_settings[ounce_change_info_ae]" id="ounce_change_info_ae" class="regular-text" placeholder="Example: AED 74.33 (0.76%)" value="<?php echo isset($options['ounce_change_info_ae']) ? $options['ounce_change_info_ae'] : '';?>">
    <br>
    <br>
    <select name="goldprice_settings[ounce_change_state_ae]" class="regular-text" id="ounce_change_state_ae">
        <option value="change-up" <?php isset($options['ounce_change_state_ae']) && selected( $options['ounce_change_state_ae'], 'change-up' ); ?>><?php _e('Change up', 'metalprice-info');?></option>
    <option value="change-down" <?php isset($options['ounce_change_state_ae']) && selected( $options['ounce_change_state_ae'], 'change-down' ); ?>><?php _e('Change down', 'metalprice-info');?></option>
    </select>
</label>
<label for="price_21k_ae" style="margin-top:10px;">
    <p><?php _e('21 karat gold per gram', 'metalprice-info');?></p>
    <input style="margin-top:10px;" type="text" name="goldprice_settings[price_21k_ae]" id="price_21k_ae" class="regular-text" placeholder="e.g., AED 272.69" value="<?php echo isset($options['price_21k_ae']) ? $options['price_21k_ae'] : '';?>">
</label>
<label for="21k_change_info_ae" style="margin-top:10px;">
    <p><?php _e('21k change info', 'metalprice-info');?></p>
    <input style="margin-top:10px;" type="text" name="goldprice_settings[21k_change_info_ae]" id="21k_change_info_ae" class="regular-text" placeholder="Example: AED 74.33 (0.76%)" value="<?php echo isset($options['21k_change_info_ae']) ? $options['21k_change_info_ae'] : '';?>">
    <br>
    <br>
    <select name="goldprice_settings[21k_change_state_ae]" class="regular-text" id="21k_change_state_ae">
        <option value="change-up" <?php isset($options['21k_change_state_ae']) && isset($options['21k_change_state_ae']) && selected( $options['21k_change_state_ae'], 'change-up' ); ?>><?php _e('Change up', 'metalprice-info');?></option>
        <option value="change-down" <?php isset($options['21k_change_state_ae']) && selected( $options['21k_change_state_ae'], 'change-down' ); ?>><?php _e('Change down', 'metalprice-info');?></option>
    </select>
</label>
<label for="currency_ae" style="margin-top:10px;">
    <p><?php _e('Currency UAE', 'metalprice-info');?></p>
    <input style="margin-top:10px;" type="text" name="goldprice_settings[currency_ae]" id="currency_ae" class="regular-text" placeholder="Example: UAE Dirham" value="<?php echo isset($options['currency_ae']) ? $options['currency_ae'] : '';?>">
</label>


<p style="margin-top:20px;margin-bottom:5px;" class="price_table"><?php _e('Price table AE', 'metalprice-info');?></p>
<label for="price_title_ae">
    <p><?php _e('Price head title', 'metalprice-info');?></p>
    <input style="margin-top:10px;" type="text" name="goldprice_settings[price_title_ae]" id="price_title_ae" class="regular-text" placeholder="Gold price in the Emirates today, Monday, September 30, 2024" value="<?php echo isset($options['price_title_ae']) ? $options['price_title_ae'] : '';?>">
</label>

<label for="unitytr1" style="margin-top:10px;">
    <p><?php _e('Table row 1', 'metalprice-info');?></p>
    <label for="row_count_ae" style="margin-top:10px;">
        <p><?php _e('Table row count', 'metalprice-info');?></p>
        <input style="margin-top:10px;" type="text" name="goldprice_settings[row_count_ae]" id="row_count_ae" class="regular-text" placeholder="12" value="<?php echo isset($options['row_count_ae']) ? $options['row_count_ae'] : '';?>">
    </label>
    <div class="trow">
        <div class="trd">
            <p><?php _e('Unity', 'metalprice-info');?></p>
            <input style="margin-top:10px;" type="text" name="goldprice_settings[ae_unitytr1]" id="ae_unitytr1" class="regular-text" placeholder="24 karat gold price per gram" value="<?php echo isset($options['ae_unitytr1']) ? $options['ae_unitytr1'] : '';?>">
        </div>
        <div class="trd">
            <p><?php _e('Selling price', 'metalprice-info');?></p>
            <input style="margin-top:10px;" type="text" name="goldprice_settings[ae_selling_pricetr1]" id="ae_selling_pricetr1" class="regular-text" placeholder="311.65 AED" value="<?php echo isset($options['ae_selling_pricetr1']) ? $options['ae_selling_pricetr1'] : '';?>">
        </div>
        <div class="trd">
            <p><?php _e('Purchase price', 'metalprice-info');?></p>
            <input style="margin-top:10px;" type="text" name="goldprice_settings[ae_purchase_pricetr1]" id="ae_purchase_pricetr1" class="regular-text" placeholder="322.56 AED" value="<?php echo isset($options['ae_purchase_pricetr1']) ? $options['ae_purchase_pricetr1'] : '';?>">
        </div>
    </div>
    <?php 
    $i = 2;
    $trc = isset($options['row_count_ae']) && ! empty($options['row_count_ae']) ? $options['row_count_ae'] : 12;
    while ($i<$trc){
        ?>
        <div class="trow">
            <div class="trd">
                <input style="margin-top:10px;" type="text" name="goldprice_settings[ae_unitytr<?php echo $i;?>]" id="ae_unitytr<?php echo $i;?>" class="regular-text" placeholder="Price of 22 karat gold per gram" value="<?php echo isset($options['ae_unitytr'.$i]) ? $options['ae_unitytr'.$i] : '';?>">
            </div>
            <div class="trd">
                <input style="margin-top:10px;" type="text" name="goldprice_settings[ae_selling_pricetr<?php echo $i;?>]" id="ae_selling_pricetr<?php echo $i;?>" class="regular-text" placeholder="311.65 AED" value="<?php echo isset($options['ae_selling_pricetr'.$i]) ? $options['ae_selling_pricetr'.$i] : '';?>">
            </div>
            <div class="trd">
                <input style="margin-top:10px;" type="text" name="goldprice_settings[ae_purchase_pricetr<?php echo $i;?>]" id="ae_purchase_pricetr<?php echo $i;?>" class="regular-text" placeholder="322.56 AED" value="<?php echo isset($options['ae_purchase_pricetr'.$i]) ? $options['ae_purchase_pricetr'.$i] : '';?>">
            </div>
        </div>
        <?php 
        $i++;
    }
    ?>
</label>
<!-- =========================================
========================================= -->
<h2 style="margin-top:20px;margin-bottom:5px;" class="price_table"><?php _e('Gold Price table SA', 'metalprice-info');?></h2>
<label for="custom_entry_sa">
    <p><?php _e('Activate custom entry', 'metalprice-info');?></p>
    <input type="checkbox" name="goldprice_settings[custom_entry_sa]" id="custom_entry_sa" value="1" <?php checked( isset( $options['custom_entry_sa'] ) && $options['custom_entry_sa'] == '1' ); ?>>
</label>
<label for="price_head_title_sa">
    <p><?php _e('Price head title SA', 'metalprice-info');?></p>
    <input style="margin-top:10px;" type="text" name="goldprice_settings[price_head_title_sa]" id="price_head_title_sa" class="regular-text" placeholder="Gold price now live in SA" value="<?php echo isset($options['price_head_title_sa']) ? $options['price_head_title_sa'] : '';?>">
</label>
<label for="ounce_price_sa">
    <p><?php _e('Price per ounce', 'metalprice-info');?></p>
    <input style="margin-top:10px;" type="text" name="goldprice_settings[ounce_price_sa]" id="ounce_price_sa" class="regular-text" placeholder="e.g., SAR 9,693.34" value="<?php echo isset($options['ounce_price_sa']) ? $options['ounce_price_sa'] : '';?>">
</label>
<label for="ounce_change_info_sa" style="margin-top:10px;">
    <p><?php _e('Ounce change info', 'metalprice-info');?></p>
    <input style="margin-top:10px;" type="text" name="goldprice_settings[ounce_change_info_sa]" id="ounce_change_info_sa" class="regular-text" placeholder="Example: SAR 74.33 (0.76%)" value="<?php echo isset($options['ounce_change_info_sa']) ? $options['ounce_change_info_sa'] : '';?>">
    <br>
    <br>
    <select name="goldprice_settings[ounce_change_state_sa]" class="regular-text" id="ounce_change_state_sa">
        <option value="change-up" <?php isset($options['ounce_change_state_sa']) && selected( $options['ounce_change_state_sa'], 'change-up' ); ?>><?php _e('Change up', 'metalprice-info');?></option>
    <option value="change-down" <?php isset($options['ounce_change_state_sa']) && selected( $options['ounce_change_state_sa'], 'change-down' ); ?>><?php _e('Change down', 'metalprice-info');?></option>
    </select>
</label>
<label for="price_21k_sa" style="margin-top:10px;">
    <p><?php _e('21 karat gold per gram', 'metalprice-info');?></p>
    <input style="margin-top:10px;" type="text" name="goldprice_settings[price_21k_sa]" id="price_21k_sa" class="regular-text" placeholder="e.g., SAR 272.69" value="<?php echo isset($options['price_21k_sa']) ? $options['price_21k_sa'] : '';?>">
</label>
<label for="21k_change_info_sa" style="margin-top:10px;">
    <p><?php _e('21k change info', 'metalprice-info');?></p>
    <input style="margin-top:10px;" type="text" name="goldprice_settings[21k_change_info_sa]" id="21k_change_info_sa" class="regular-text" placeholder="Example: SAR 74.33 (0.76%)" value="<?php echo isset($options['21k_change_info_sa']) ? $options['21k_change_info_sa'] : '';?>">
    <br>
    <br>
    <select name="goldprice_settings[21k_change_state_sa]" class="regular-text" id="21k_change_state_sa">
        <option value="change-up" <?php isset($options['21k_change_state_sa']) && isset($options['21k_change_state_sa']) && selected( $options['21k_change_state_sa'], 'change-up' ); ?>><?php _e('Change up', 'metalprice-info');?></option>
        <option value="change-down" <?php isset($options['21k_change_state_sa']) && selected( $options['21k_change_state_sa'], 'change-down' ); ?>><?php _e('Change down', 'metalprice-info');?></option>
    </select>
</label>
<label for="currency_sa" style="margin-top:10px;">
    <p><?php _e('Currency SA', 'metalprice-info');?></p>
    <input style="margin-top:10px;" type="text" name="goldprice_settings[currency_sa]" id="currency_sa" class="regular-text" placeholder="Example: Saudi Riyals" value="<?php echo isset($options['currency_sa']) ? $options['currency_sa'] : '';?>">
</label>
<label for="price_title_sa">
    <p><?php _e('Price head title', 'metalprice-info');?></p>
    <input style="margin-top:10px;" type="text" name="goldprice_settings[price_title_sa]" id="price_title_sa" class="regular-text" placeholder="Gold price in the Emirates today, Monday, September 30, 2024" value="<?php echo isset($options['price_title_sa']) ? $options['price_title_sa'] : '';?>">
</label>

<label for="unitytr1" style="margin-top:10px;">
    <p><?php _e('Table row 1', 'metalprice-info');?></p>
    <label for="row_count_sa" style="margin-top:10px;">
        <p><?php _e('Table row count', 'metalprice-info');?></p>
        <input style="margin-top:10px;" type="text" name="goldprice_settings[row_count_sa]" id="row_count_sa" class="regular-text" placeholder="12" value="<?php echo isset($options['row_count_sa']) ? $options['row_count_sa'] : '';?>">
    </label>
    <div class="trow">
        <div class="trd">
            <p><?php _e('Unity', 'metalprice-info');?></p>
            <input style="margin-top:10px;" type="text" name="goldprice_settings[sa_unitytr1]" id="sa_unitytr1" class="regular-text" placeholder="24 karat gold price per gram" value="<?php echo isset($options['sa_unitytr1']) ? $options['sa_unitytr1'] : '';?>">
        </div>
        <div class="trd">
            <p><?php _e('Selling price', 'metalprice-info');?></p>
            <input style="margin-top:10px;" type="text" name="goldprice_settings[sa_selling_pricetr1]" id="sa_selling_pricetr1" class="regular-text" placeholder="311.65 SAR" value="<?php echo isset($options['sa_selling_pricetr1']) ? $options['sa_selling_pricetr1'] : '';?>">
        </div>
        <div class="trd">
            <p><?php _e('Purchase price', 'metalprice-info');?></p>
            <input style="margin-top:10px;" type="text" name="goldprice_settings[sa_purchase_pricetr1]" id="sa_purchase_pricetr1" class="regular-text" placeholder="322.56 SAR" value="<?php echo isset($options['sa_purchase_pricetr1']) ? $options['sa_purchase_pricetr1'] : '';?>">
        </div>
    </div>
    <?php 
    $i = 2;
    $trc = isset($options['row_count_sa']) && ! empty($options['row_count_sa']) ? $options['row_count_sa'] : 12;
    while ($i<$trc){
        ?>
        <div class="trow">
            <div class="trd">
                <input style="margin-top:10px;" type="text" name="goldprice_settings[sa_unitytr<?php echo $i;?>]" id="sa_unitytr<?php echo $i;?>" class="regular-text" placeholder="Price of 22 karat gold per gram" value="<?php echo isset($options['sa_unitytr'.$i]) ? $options['sa_unitytr'.$i] : '';?>">
            </div>
            <div class="trd">
                <input style="margin-top:10px;" type="text" name="goldprice_settings[sa_selling_pricetr<?php echo $i;?>]" id="sa_selling_pricetr<?php echo $i;?>" class="regular-text" placeholder="311.65 SAR" value="<?php echo isset($options['sa_selling_pricetr'.$i]) ? $options['sa_selling_pricetr'.$i] : '';?>">
            </div>
            <div class="trd">
                <input style="margin-top:10px;" type="text" name="goldprice_settings[sa_purchase_pricetr<?php echo $i;?>]" id="sa_purchase_pricetr<?php echo $i;?>" class="regular-text" placeholder="322.56 SAR" value="<?php echo isset($options['sa_purchase_pricetr'.$i]) ? $options['sa_purchase_pricetr'.$i] : '';?>">
            </div>
        </div>
        <?php 
        $i++;
    }
    ?>
</label>

<style>
.goldprice_form label{
    display: block;
    overflow: hidden;
}
.trow {
    display: flex;
    flex-wrap: wrap;
}
.trow .trd {
    width: 25%;
    margin-right: 10px;
}
.trow .trd input {
    max-width: 100%;
}
</style>
	<?php
}
