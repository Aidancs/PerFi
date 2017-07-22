<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'checking_credits' => 0,
        'savings_credits' => 0,
        'other_credits' => 0,
        'checking_debits' => 0,
        'savings_debits' => 0,
        'other_debits' => 0,
        'checking_total' => 0,
        'savings_total' => 0,
        'other_total' => 0,
        'total' => 0,
    ];

    protected $casts = [
        'checking_credits' => 'integer',
        'savings_credits' => 'integer',
        'other_credits' => 'integer',
        'checking_debits' => 'integer',
        'savings_debits' => 'integer',
        'other_debits' => 'integer',
        'checking_total' => 'integer',
        'savings_total' => 'integer',
        'other_total' => 'integer',
        'total' => 'integer',
    ];

    public function creditTotal($credits)
    {
        foreach ($credits as $credit) {
            $this->credit_total += $credit;
        }

        return $this->credit_total;
    }

    public function debitTotal($debits)
    {
        foreach ($debits as $debit) {
            $this->debit_total += $debit;
        }

        return $this->debit_total;
    }

    public function getAccountTotal($credits, $debits)
    {
        return $this->creditTotal($credits) - $this->debitTotal($debits);
    }
}
