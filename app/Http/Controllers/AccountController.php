<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function buyMessage(Request $request)
    {
        $accounts = Account::get();
        return view('admin.account.buy-message', compact('accounts'));
    }
}
