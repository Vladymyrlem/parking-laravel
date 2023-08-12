<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;
    use Illuminate\Auth\Middleware\Authenticate;

    class InactivityTimeout
    {
        protected $inactivityTimeout = 60; // Default inactivity timeout in minutes

        public function handle($request, $next)
        {
            $this->inactivityTimeout = config('auth.inactivity_timeout', 60);

            if ($this->auth->check() && !$this->auth->user()->is_admin) {
                if (time() - session('last_activity') > $this->inactivityTimeout * 60) {
                    auth()->logout();
                    return redirect('/login')->withErrors(['inactive' => 'You have been logged out due to inactivity.']);
                }

                session(['last_activity' => time()]);
            }

            return $next($request);
        }
    }
