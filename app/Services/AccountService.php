<?php

namespace App\Services;

use App\Models\Account;

class AccountService
{
    public static function getAll() {
        return Account::all();
    }
}
