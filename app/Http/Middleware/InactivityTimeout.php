<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;

    class InactivityTimeout
    {
        protected $inactivityTimeout = 60; // Default inactivity timeout in minutes

        public function handle($request, Closure $next)
        {
            $this->inactivityTimeout = config('auth.inactivity_timeout', 60);

            if (Auth::check() && !Auth::user()->is_admin) {
                if (time() - Session::get('last_activity') > $this->inactivityTimeout * 60) {
                    Auth::logout();
                    Session::flush(); // Clear the session
                    return redirect('/login')->withErrors(['inactive' => 'You have been logged out due to inactivity.']);
                }

                Session::put('last_activity', time());
            }

            return $next($request);
        }
    }
