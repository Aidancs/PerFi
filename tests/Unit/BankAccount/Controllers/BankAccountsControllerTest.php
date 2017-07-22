<?php

namespace Tests\Unit;

use App\BankAccount;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TestViewBankAccountTotal extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function view_bank_account_total()
    {
        $checking_account = BankAccount::create([]);
        $savings_account = BankAccount::create([]);
        $bank_account_total = BankAccount::create([]);

        $checking_credits = [
            $credit1 = 100,
            $credit2 = 100,
            $credit3 = 100,
            $credit4 = 100,
        ];

        $checking_debits = [
            $debit1 = 50,
            $debit2 = 50,
            $debit3 = 50,
            $debit4 = 50,
        ];

        $savings_credits = [
            $credit1 = 100,
            $credit2 = 100,
            $credit3 = 100,
            $credit4 = 100,
        ];

        $savings_debits = [
            $debit1 = 50,
            $debit2 = 50,
            $debit3 = 50,
            $debit4 = 50,
        ];

        $credits_total = array_merge($checking_credits, $savings_credits);
        $debits_total = array_merge($checking_debits, $savings_debits);

        $this->assertSame($savings_account->getAccountTotal($savings_credits, $savings_debits), 200);
        $this->assertSame($checking_account->getAccountTotal($checking_credits, $checking_debits), 200);
        $this->assertSame($bank_account_total->getAccountTotal($credits_total, $debits_total), 400);
        $this->assertSame(3, BankAccount::count());
    }
}
