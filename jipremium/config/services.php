<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
	
	'jipremium' => [
    	'secret_key'         => env('API_SECRET_KEY'),
    	'external_base_url'  => env('JIPREMIUM_EXTERNAL_BASE_URL'),
	],

	'kreen' => [
    	'api_secret_key'     => env('KREEN_API_SECRET_KEY'),
    	'erp_bearer_token'   => env('KREEN_ERP_BEARER_TOKEN'),
    	'erp_api_key_user'   => env('KREEN_ERP_API_KEY_USER'),
    	// Local only: answer Kreen order calls with a fake response so testing never creates real orders.
    	'fake_order_api'     => env('KREEN_FAKE_ORDER_API', false),
	],

];
