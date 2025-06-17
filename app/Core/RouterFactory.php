<?php

declare(strict_types=1);

namespace App\Core;

use Nette\Application\Routers\RouteList;

final class RouterFactory
{
    public static function createRouter(): RouteList
    {
        $router = new RouteList;

        // SEO routes
        $router->addRoute('sitemap.xml', 'Landing:sitemap');
        
        // Landing page routes
        $router->addRoute('', 'Landing:default');
        $router->addRoute('funkce', 'Landing:funkce');
        $router->addRoute('cenik', 'Landing:cenik');
        $router->addRoute('kontakt', 'Landing:kontakt');
        
        // Fallback route
        $router->addRoute('<presenter>/<action>[/<id>]', 'Landing:default');

        return $router;
    }
}