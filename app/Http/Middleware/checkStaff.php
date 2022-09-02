<?php

namespace App\Http\Middleware;

use App\Http\Services\AccountService;
use Closure;
use Illuminate\Http\Request;

class checkStaff
{
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function handle(Request $request, Closure $next)
    {;
        if ($this->roles() == null)
            return redirect(route('login'))->with('error', 'Bạn cần đăng nhập tài khoản nhân viên');
        else if (array_search('staff', $this->roles()) === false)
            return redirect(route('homeUser'))->with('warning', 'Bạn không phải là nhân viên');

        return $next($request);
    }

    public function roles() {
        return $this->accountService->checkLoginByCookies();
    }
}
