<?php

namespace App\Http\Services;

use App\Models\Account;

class AccountService
{
    public static function getAll() {
        return Account::all();
    }

}
