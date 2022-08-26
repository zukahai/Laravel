<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Services\AccountService;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function handle(Request $request, Closure $next)
    {
        echo  "Check login admin Middleware"."<br>";
        if (!$this->isLoginAdmin())
            return redirect(route('homeUser'))->with('warning', 'Bạn không phải là admin');

        return $next($request);
    }

    public function isLoginAdmin() {
        return $this->accountService->checkLoginByCookies() == 'admin';
    }
}
