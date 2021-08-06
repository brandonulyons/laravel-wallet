<?php

namespace MannikJ\Laravel\Wallet\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MannikJ\Laravel\Wallet\Models\Wallet
 */
class WalletFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'wallet';
    }
}
