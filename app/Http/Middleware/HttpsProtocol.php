<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;

    class HttpsProtocol
    {
        /**
         * Handle an incoming request.
         *
         * @param \Illuminate\Http\Request $request
         * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
         * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
         */
        public function handle($request, Closure $next)
        {
            // Check if the request is not secure (HTTP)
            if (!$request->secure() && app()->environment() === 'production') {
                // Redirect to the HTTPS URL
                return redirect()->secure($request->getRequestUri());
            }

            return $next($request);
        }
    }
