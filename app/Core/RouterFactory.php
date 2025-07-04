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

        // Redirecty z anglických URL na české
        $router->addRoute('privacy', 'Landing:privacyRedirect');
        $router->addRoute('terms', 'Landing:termsRedirect');
        $router->addRoute('about', 'Landing:aboutRedirect');

        // Hlavní Landing page routes
        $router->addRoute('', 'Landing:default');
        $router->addRoute('funkce', 'Landing:funkce');
        $router->addRoute('cenik', 'Landing:cenik');
        $router->addRoute('kontakt', 'Landing:kontakt');

        // Obsahové a právní stránky
        $router->addRoute('ochrana-osobnich-udaju', 'Landing:privacy');
        $router->addRoute('obchodni-podminky', 'Landing:terms');
        $router->addRoute('faq', 'Landing:faq');
        $router->addRoute('o-qrdokladu', 'Landing:about');

        // Podpůrné stránky
        $router->addRoute('status', 'Landing:status');
        $router->addRoute('napoveda', 'Landing:help');
        $router->addRoute('blog', 'Landing:blog');

        // API a dokumentace (pro budoucí použití)
        $router->addRoute('api', 'Landing:api');
        $router->addRoute('dokumentace', 'Landing:docs');

        // Status a incidenty
        $router->addRoute('status', 'Landing:status');
        $router->addRoute('status/incidenty', 'Landing:incidents');

        // Fallback route
        $router->addRoute('<presenter>/<action>[/<id>]', 'Landing:default');

        return $router;
    }
}
