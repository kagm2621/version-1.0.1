<?php
	/*	
	*	Goodlayers Plugin Option File
	*/
	
	// create admin menu
	add_action('admin_menu', 'gdlr_hostel_add_admin_menu', 100);
	if( !function_exists('gdlr_hostel_add_admin_menu') ){
		function gdlr_hostel_add_admin_menu(){
			$page = add_submenu_page('hostel_option', __('Transaction', 'gdlr-hostel'), __('Transaction', 'gdlr-hostel'), 
				'edit_theme_options', 'hostel-transaction' , 'gdlr_hostel_transaction_option');			
			add_action('admin_print_styles-' . $page, 'gdlrs_transaction_option_style');	
			add_action('admin_print_scripts-' . $page, 'gdlrs_transaction_option_script');	
		}	
	}
	if( !function_exists('gdlrs_transaction_option_style') ){
		function gdlrs_transaction_option_style(){
			wp_enqueue_style('gdlr-alert-box', plugins_url('transaction-style.css', __FILE__));		
			wp_enqueue_style('font-awesome', GDLR_PATH . '/plugins/font-awesome-new/css/font-awesome.min.css');		
		}
	}
	if( !function_exists('gdlrs_transaction_option_script') ){
		function gdlrs_transaction_option_script(){
			wp_enqueue_script('gdlr-alert-box', plugins_url('transaction-script.js', __FILE__));
		}
	}
	
	add_action('after_setup_theme', 'gdlr_create_hostel_admin_option', 99);
	if( !function_exists('gdlr_create_hostel_admin_option') ){
		function gdlr_create_hostel_admin_option(){
			global $hostel_option, $gdlr_sidebar_controller;
		
			new gdlr_admin_option( 
				
				// admin option attribute
				array(
					'page_title' => __('Hostel Option', 'gdlr-hostel'),
					'menu_title' => __('Hostel Option', 'gdlr-hostel'),
					'menu_slug' => 'hostel_option',
					'save_option' => 'gdlr_hostel_option',
					'role' => 'edit_theme_options',
					'position' => 84,
				),
					  
				// admin option setting
				array(
					// general menu
					'general' => array(
						'title' => __('General', 'gdlr-hostel'),
						'icon' => GDLR_PATH . '/include/images/icon-general.png',
						'options' => array(
							
							'booking-option' => array(
								'title' => __('Booking Option', 'gdlr-hostel'),
								'options' => array(
									'booking-slug' => array(
										'title' => __('Booking Page Slug', 'gdlr-hostel'),
										'type' => 'text',	
										'default' => 'booking',
										'description' => __('Please only fill lower case character with no special character here.', 'gdlr-hostel')
									),
									'transaction-per-page' => array(
										'title' => __('Transaction Per Page', 'gdlr-hostel'),
										'type' => 'text',	
										'default' => '30',
									),
									'booking-money-format' => array(
										'title' => __('Money Display Format', 'gdlr-hostel'),
										'type' => 'text',	
										'default' => '$NUMBER',
									),
									'enable-hotel-branch' => array(
										'title' => __('Enable Hotel Branch ( Using Category )', 'gdlr-hostel'),
										'type' => 'checkbox',	
										'default' => 'disable'
									),
									'preserve-booking-room' => array(
										'title' => __('Preserve The Room After', 'gdlr-hostel'),
										'type' => 'combobox',	
										'options' => array(
											'paid' => __('Paid for room', 'gdlr-hostel'),
											'booking' => __('Booking for room', 'gdlr-hostel')
										)
									),
									'booking-price-display' => array(
										'title' => __('Booking Price Display', 'gdlr-hostel'),
										'type' => 'combobox',	
										'options' => array(
											'start-from' => __('Start From', 'gdlr-hostel'),
											'full-price' => __('Full Price', 'gdlr-hostel')
										)
									),
									'booking-vat-amount' => array(
										'title' => __('Vat Amount', 'gdlr-hostel'),
										'type' => 'text',	
										'default' => '8',
										'description' => __('Input only number ( as percent )', 'gdlr-hostel') . 
											__('Filling 0 to disable this option out.', 'gdlr-hostel'),
									),
									'block-date' => array(
										'title' => __('Block Date', 'gdlr-hostel'),
										'type' => 'textarea',	
										'default' => '',
										'description' => __('Fill the date in yyyy-mm-dd format. Use * for recurring date, separated each date using comma, use the word \'to\' for date range. Ex. *-12-25 to *-12-31 means special season is running every Christmas to New Year\'s Eve every year.', 'gdlr-hostel')
									),
									'booking-deposit-amount' => array(
										'title' => __('Deposit Amount', 'gdlr-hostel'),
										'type' => 'text',	
										'default' => '20',
										'description' => __('Allow customer to pay part of price for booking the room ( as percent ).', 'gdlr-hostel') . 
											__('Filling 0 to disable this option out.', 'gdlr-hostel'),
									),
									'payment-method' => array(
										'title' => __('Payment Method', 'gdlr-hostel'),
										'type' => 'combobox',	
										'options' => array(
											'contact' =>  __('Only Contact Form', 'gdlr-hostel'),
											'instant' =>  __('Include Instant Payment', 'gdlr-hostel'),
										)
									),
									'instant-payment-method' => array(
										'title' => __('Instant Payment Method', 'gdlr-hostel'),
										'type' => 'multi-combobox',	
										'options' => array(
											'paypal' =>  __('Paypal', 'gdlr-hostel'),
											'stripe' =>  __('Stripe', 'gdlr-hostel'),
											'paymill' =>  __('Paymill', 'gdlr-hostel'),
											'authorize' =>  __('Authorize.Net', 'gdlr-hostel'),
										),
										'wrapper-class' => 'payment-method-wrapper instant-wrapper',
										'description' => __('Leaving this field blank will display all available payment method.', 'gdlr-hostel')
									),							
									'booking-thumbnail-size' => array(
										'title' => __('Booking Thumbnail Size', 'gdlr-hostel'),
										'type'=> 'combobox',
										'options'=> gdlr_get_thumbnail_list(),
										'default'=> 'small-grid-size'
									),
									'booking-num-fetch' => array(
										'title' => __('Booking Num Fetch', 'gdlr-hostel'),
										'type' => 'text',	
										'default' => '5',
									),
									'booking-num-excerpt' => array(
										'title' => __('Booking Num Excerpt', 'gdlr-hostel'),
										'type' => 'text',	
										'default' => '34',
									),
								)
							),
							
							'booking-mail' => array(
								'title' => __('Booking Mail', 'gdlr-hostel'),
								'options' => array(
									'recipient-name' => array(
										'title' => __('Recipient Name', 'gdlr-hostel'),
										'type' => 'text'
									),
									'recipient-mail' => array(
										'title' => __('Recipient Email', 'gdlr-hostel'),
										'type' => 'text'
									),
									'booking-complete-contact' => array(
										'title' => __('Booking Complete Contact', 'gdlr-hostel'),
										'type' => 'textarea'
									),
									'booking-code-prefix' => array(
										'title' => __('Booking Code Prefix', 'gdlr-hostel'),
										'type' => 'text',
										'default' => 'GDLR'
									),
								)
							),
								
							'room-style' => array(
								'title' => __('Room Style', 'gdlr-hostel'),
								'options' => array(		
									'room-thumbnail-size' => array(
										'title' => __('Single Room Thumbnail Size', 'gdlr-hostel'),
										'type'=> 'combobox',
										'options'=> gdlr_get_thumbnail_list(),
										'default'=> 'post-thumbnail-size'
									),
								)
							),
							
							'paypal-payment-info' => array(
								'title' => __('Paypal Info', 'gdlr-hostel'),
								'options' => array(	
									'paypal-recipient-email' => array(
										'title' => __('Paypal Recipient Email', 'gdlr-hostel'),
										'type' => 'text',	
										'default' => 'testmail@test.com'
									),
									'paypal-action-url' => array(
										'title' => __('Paypal Action URL', 'gdlr-hostel'),
										'type' => 'text',
										'default' => 'https://www.paypal.com/cgi-bin/webscr'
									),
									'paypal-currency-code' => array(
										'title' => __('Paypal Currency Code', 'gdlr-hostel'),
										'type' => 'text',	
										'default' => 'USD'
									),						
								)
							),
							
							'stripe-payment-info' => array(
								'title' => __('Stripe Info', 'gdlr-hostel'),
								'options' => array(	
									'stripe-secret-key' => array(
										'title' => __('Stripe Secret Key', 'gdlr-hostel'),
										'type' => 'text'
									),
									'stripe-publishable-key' => array(
										'title' => __('Stripe Publishable Key', 'gdlr-hostel'),
										'type' => 'text'
									),	
									'stripe-currency-code' => array(
										'title' => __('Stripe Currency Code', 'gdlr-hostel'),
										'type' => 'text',	
										'default' => 'usd'
									),	
								)
							),
							
							'paymill-payment-info' => array(
								'title' => __('Paymill Info', 'gdlr-hostel'),
								'options' => array(	
									'paymill-private-key' => array(
										'title' => __('Paymill Private Key', 'gdlr-hostel'),
										'type' => 'text'
									),
									'paymill-public-key' => array(
										'title' => __('Paymill Public Key', 'gdlr-hostel'),
										'type' => 'text'
									),	
									'paymill-currency-code' => array(
										'title' => __('Paymill Currency Code', 'gdlr-hostel'),
										'type' => 'text',	
										'default' => 'usd'
									),
								)
							),
							
							'authorize-payment-info' => array(
								'title' => __('Authorize Info', 'gdlr-hostel'),
								'options' => array(	
									'authorize-live-mode' => array(
										'title' => __('Live Mode ', 'gdlr-hostel'),
										'type' => 'checkbox',
										'default' => 'disable',
										'description' => __('Please turn this option off when you\'re on test mode.','gdlr-hostel')
									),
									'authorize-api-id' => array(
										'title' => __('Authorize API Login ID ', 'gdlr-hostel'),
										'type' => 'text'
									),
									'authorize-transaction-key' => array(
										'title' => __('Authorize Transaction Key', 'gdlr-hostel'),
										'type' => 'text'
									),
									'authorize-md5-hash' => array(
										'title' => __('Authorize MD5 Hash', 'gdlr-hostel'),
										'type' => 'text'
									),
								)
							),					
						)
					)
				),
				
				$hostel_option
			);
		}
	}
?>