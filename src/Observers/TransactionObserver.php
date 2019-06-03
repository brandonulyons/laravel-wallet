<?php

namespace MannikJ\Laravel\Wallet\Observers;

use MannikJ\Laravel\Wallet\Models\Wallet;
use MannikJ\Laravel\Wallet\Models\Transaction;

class TransactionObserver
{
    public function creating($transaction)
    {
        $transaction->hash = uniqid();
    }

    public function created($transaction)
    {
        $transaction->wallet->balance += $transaction->amount;
        $transaction->wallet->save();
    }


    public function updated($transaction)
    {
        $oldAmountWithSign = $transaction->getAmountWithSign($transaction->getOriginal('amount'), $transaction->getOriginal('type'));
        if ($oldAmountWithSign != $transaction->amount) {
            // revert old balance
            $transaction->wallet->balance -= $oldAmountWithSign;
            // add new
            $transaction->wallet->balance += $transaction->amount;
            $transaction->wallet->save();
        }
    }

    public function deleted($transaction)
    {
        // revert balance
        $transaction->wallet->balance -= $transaction->amount;
        $transaction->wallet->save();
    }
}