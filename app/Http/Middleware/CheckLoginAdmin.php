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
//        dd($this->isLoginAdmin());
//        echo  "Check login admin Middleware"."<br>";
        if (array_search('admin', $this->isLoginAdmin()) == false)
            return redirect(route('homeUser'))->with('warning', 'Bạn không phải là admin');
        else if ($this->isLoginAdmin() == null)
            return redirect(route('login'))->with('error', 'Bạn cần đăng nhập tài khoản admin');

        return $next($request);
    }

    public function isLoginAdmin() {
        return $this->accountService->checkLoginByCookies();
    }
}
