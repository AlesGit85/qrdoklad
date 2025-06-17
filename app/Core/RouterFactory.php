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
        
        // Obsahové stránky
        $router->addRoute('ochrana-osobnich-udaju', 'Landing:privacy');
        $router->addRoute('obchodni-podminky', 'Landing:terms');
        $router->addRoute('faq', 'Landing:faq');
        $router->addRoute('o-nas', 'Landing:about');
        
        // Fallback route
        $router->addRoute('<presenter>/<action>[/<id>]', 'Landing:default');

        return $router;
    }
}