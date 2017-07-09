<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Enviroment
    |--------------------------------------------------------------------------
    |
    | Please provide the enviroment you would like to use for braintree.
    | This can be either 'sandbox' or 'production'.
    |
    */
	'environment' => env('ENVIRONEMENT_BRAINTREE', 'sandbox'),

	/*
    |--------------------------------------------------------------------------
    | Merchant ID
    |--------------------------------------------------------------------------
    |
    | Please provide your Merchant ID.
    |
    */
	'merchantId' => env('MERCHANT_ID', 'rqwxyg33g8bcmvkv'),

	/*
    |--------------------------------------------------------------------------
    | Public Key
    |--------------------------------------------------------------------------
    |
    | Please provide your Public Key.
    |
    */
	'publicKey' => env('PUBLIC_KEY', 'yz4tcsz2dy4jsj5y'),

	/*
    |--------------------------------------------------------------------------
    | Private Key
    |--------------------------------------------------------------------------
    |
    | Please provide your Private Key.
    |
    */
	'privateKey' => env('PRIVATE_KEY', 'e930ce6a850a3a87207779692495a7cd'),

	/*
    |--------------------------------------------------------------------------
    | Client Side Encryption Key
    |--------------------------------------------------------------------------
    |
    | Please provide your CSE Key.
    |
    */
	'clientSideEncryptionKey' => env('CSE_KEY', 'MIIBCgKCAQEA4MlYzFeHBKcwOndQKtf5uEwGy6bdSUwPeVfmIM922utGLMI1F28z3QyMKKk9VgcSZDzIQbFyu3gT8Y+oR8XyTKPCxhVjmzUvt8qxiiWAP62BeWmgNlRxqPAqFasuPkhTkM74oMluRhgdT45vvZPmt7wBZ91WtsJ8l2miWBZj5HGYDXEOaN/XTpy6seJEkan7s8gDv/HYMIrKGOcXJpT+Yin0yCYnZx/C4KG2UlinA0Ndc1YsOhOIJGD4IA7wWMWPGvb9JRPHLDPbeBh9fyP2JfwFZ493nauZW6nEIwQ2hl3TV1edM87+05rjDQNeWl2UL4CxTrU+Uit2qy4TNTZLXwIDAQAB'),
	
];