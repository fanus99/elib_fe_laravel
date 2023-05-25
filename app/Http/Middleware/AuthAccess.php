<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use App\Http\Controllers\AuthController;
use Session;

class AuthAccess
{
    private $authController;

    public function __construct(AuthController $authController)
    {
        $this->authController = $authController;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = session()->get('access_token');
        $key = env('JWT_SECRET');

        if(!$token) {
            return redirect()->route('logout');
        }

        try {
            JWT::$leeway = 6000;
            $credentials = JWT::decode($token, new Key($key, 'HS256'));
        } catch(ExpiredException $e) {
            $refreshToken = $this->authController->refreshToken();
            if($refreshToken != 200){
                return redirect()->route('logout');
            }
        } catch(Exception $e) {
            return redirect()->route('logout');
        }

        return $next($request);
    }
}
