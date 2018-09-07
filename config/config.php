<?php

return [
/**
 * Change this if you extend the default Wallet Model
 */
    'wallet_model' => env('WALLET_MODEL', 'Depsimon\Wallet\Wallet'),

    /**
     * Change this if you extend the default Transaction Model
     */
    'transaction_model' => env('WALLET_TRANSACTION_MODEL', 'Depsimon\Wallet\Transaction'),
];