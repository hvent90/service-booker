<?php

return array(

	/**
	 * You may wish for all e-mails sent with Mailgun to be sent from
	 * the same address. Here, you may specify a name and address that is
	 * used globally for all e-mails that are sent by Mailgun.
	 *
	 */
	'from' => array(
		'address' => 'postmaster@sandboxdafcb2ecfe9b47bcbc38dc391a578e51.mailgun.org',
		'name'    => 'Henry Ventura'
	),


	/**
	 * Global reply-to e-mail address
	 *
	 */
	'reply_to' => 'postmaster@sandboxdafcb2ecfe9b47bcbc38dc391a578e51.mailgun.org',


	/**
	 * Mailgun (private) API key
	 *
	 */
	'api_key' => 'key-2039f5636c7f36cfcd5670e85134507b',

	/**
	 * Mailgun public API key
	 *
	 */
	'public_api_key' => 'pubkey-c9259c98bdc702a6729aa0221d5a7ccc',

	/**
	 * Domain name registered with Mailgun
	 *
	 */
	'domain' => 'sandboxdafcb2ecfe9b47bcbc38dc391a578e51.mailgun.org',

	/**
	 * Force the from address
	 *
	 * When your `from` e-mail address is not from the domain specified some
	 * e-mail clients (Outlook) tend to display the from address incorrectly
	 * By enabling this setting Mailgun will force the `from` address so the
	 * from address will be displayed correctly in all e-mail clients.
	 *
	 * Warning:
	 * This parameter is not documented in the Mailgun documentation
	 * because if enabled, Mailgun is not able to handle soft bounces
	 *
	 */
	'force_from_address' => false,


	/**
	 * Testing
	 *
	 * Catch All address
	 *
	 * Specify an email address that receives all emails send with Mailgun
	 * This email address will overwrite all email addresses within messages
	 */
	'catch_all' => "",


	/**
	 * Testing
	 *
	 * Mailgun's testmode
	 *
	 * Send messages in test mode by setting this setting to true.
	 * When you do this, Mailgun will accept the message but will
	 * not send it. This is useful for testing purposes.
	 *
	 * Note: Mailgun does charge your account for messages sent in test mode.
	 */
	'testmode' => true
);