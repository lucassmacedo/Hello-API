<?php

namespace App\Containers\Authentication\Providers;

use App\Containers\Authentication\Middlewares\VisitorsAuthentication;
use App\Containers\Authentication\Middlewares\WebAuthentication;
use App\Port\Middleware\Providers\PortMiddlewareServiceProvider;
use Tymon\JWTAuth\Middleware\GetUserFromToken;
use Tymon\JWTAuth\Middleware\RefreshToken;

/**
 * Class MiddlewareServiceProvider
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class MiddlewareServiceProvider extends PortMiddlewareServiceProvider
{

    protected $middleware = [

    ];

    protected $middlewareGroups = [
        'web' => [

        ],
        'api' => [

        ],
    ];

    protected $routeMiddleware = [
        // JWT Package middleware's
        'jwt.auth'         => GetUserFromToken::class,
        'jwt.refresh'      => RefreshToken::class,

        // Hello API Visitor User Authentication middleware
        'api.auth.visitor' => VisitorsAuthentication::class,
        // Hello API User Authentication middleware for Web Pages
        'web.auth'         => WebAuthentication::class,
    ];

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->loadContainersInternalMiddlewares();
    }

    /**
     * Register anything in the container.
     */
    public function register()
    {

    }
}
