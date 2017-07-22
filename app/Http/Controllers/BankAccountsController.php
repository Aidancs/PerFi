<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class BankAccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
        // may need to add bankacccount here
        //->withBankAccount($bank_account);
    }

    public function store()
    {
        return view('setup');
    }
}
